<div class="modal fade" id="post-deletion-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title alt-anti-neutral">Delete Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-secondary">
            Are you sure you want to proceed?
        </div>
        <div class="modal-footer">
            <form id="confirm-delete-post">
                <button class="btn btn-link text-danger" type="submit" href="#">
                    <strong>Confirm</strong>
                </button>
                @csrf
            </form>
        </div>
        </div>
    </div>
</div>
