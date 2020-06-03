<!-- Delete Student Modal -->
<div class="modal fade" id="deleteLecturerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Lecturer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="alert alert-warning">Are you sure, you want to delete this lecturer?</h5>
                <form action="{{ route('admin.lecturer.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="delete_id" id="delete_id">

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
