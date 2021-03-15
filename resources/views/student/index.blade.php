@extends('layouts.master')

@section('content')

<div class="row" style="margin-top: 50px;">
    <marquee width="60%" direction="left" scrollamount="12" height="60px" style="color:red; font-size:35px; margin-left:20%; margin-right: 20%;">
        Laravel Crud Using Single Modal And Ajax
    </marquee>
</div>

@include('student.add_and_edit_modal')

<div class="container">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Laravel Crud Using Single Modal
            </div>
            <div class="card-body">
                <div class="row">
                    <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#add_edit_modal">
                        Add Student
                    </button>
                </div>
                <table id="example" class="table table-dark">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Department</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

    allData();

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{route('student.allData')}}",
            success: function(response) {
                console.log(response);
                var data = "";
                $.each(response, function(key, value) {
                  data += "<tr>",
                  data += "<td>" + value.id + "</td>",
                  data += "<td>" + value.name + "</td>",
                  data += "<td>" + value.email + "</td>",
                  data += "<td>" + value.phone + "</td>",
                  data += "<td>" + value.department + "</td>",
                  data += "<td>",
                  data += "<button class='btn btn-success float-left m-2' id='editButton' data-toggle='modal' data-target='#add_edit_modal' data-id=' " + value.id +" ' >Edit</button>"
                  data += "<button class='btn btn-danger float-left m-2' id='deleteButton' data-token='{{ csrf_token() }}' data-id=' " + value.id +" ' >Delete</button>"
                  data += "</td>"
                  data += "</tr>"
                });
                $('tbody').html(data);
            }
        });
    }


    $(document).on('click', '#editButton', function() {
        console.log('edit button clicked.');
        $tr = $(this).closest('tr');
        var data = $tr.children('td').map(function() {
            return $(this).text();
        }).get();
        $('#saveButton').addClass('d-none');
        $('#updateButton').removeClass('d-none');
        $('add_edit_modal').modal('show');
        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#email').val(data[2]);
        $('#phone').val(data[3]);
        $('#department').val(data[4]);
    });

    $('#studentForm').submit(function(e) {
        e.preventDefault();

        let id = $('#id').val();
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let department = $('#department').val();
        let _token = $("input[name=_token]").val();

        console.log(name);
        console.log(email);
        console.log(phone);
        console.log(department);

        $.ajax({
            type: "PUT",
            dataType: "json",
            url: "{{route('student.update')}}",
            data: {
                id: id,
                name: name,
                email: email,
                phone: phone,
                department: department,
                _token: _token
            },
            success: function(response) {
                $("#add_edit_modal").modal('hide');
                $("#id").val('');
                $("#name").val('');
                $("#email").val('');
                $("#phone").val('');

                allData();
            },
            error: function(error) {
                console.log(error.responseJSON);
                alert("Data not updated!!!");
            }
        });
    });

</script>


@endsection