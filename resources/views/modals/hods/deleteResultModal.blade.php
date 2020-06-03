<!-- Delete Student Modal -->
<div class="modal fade" id="deleteResultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="alert alert-warning">Are you sure, you want to delete this result?</h5>
                <form action="{{ route('hod.results.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="delete_id" id="delete_id">

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
