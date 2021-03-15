<!-- Modal -->
<div class="modal fade" id="add_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="add_edit_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_edit_modal_label">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="studentForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone no">
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="department">
                            <option>-- Select Department --</option>
                            <option>CSE</option>
                            <option>EEE</option>
                            <option>BBA</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cancelButton" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="saveButton">Save</button>
                    <button type="submit" class="btn btn-success d-none" id="updateButton">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>