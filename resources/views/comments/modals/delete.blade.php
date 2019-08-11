<div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Delete Comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to proceed?
        </div>
        <div class="modal-footer">
            <form id="confirm-delete-comment">
                <button class="btn btn-link text-danger" type="submit" href="#">
                    <strong>Confirm</strong>
                </button>
                @csrf
            </form>
        </div>
        </div>
    </div>
</div>
