<h6 class="text-muted mt-3 mb-3">Leave a comment</h6>
<form id="comment-form" action="{{ route('comments.store') }}">
    <input type="hidden" name="blogPostId" value="{{ $post->id }}">
    <div class="text-danger">{{ $errors->first('body') }}</div>
    <div class="form-group mt-2">
        <textarea class="form-control" name="body" placeholder="Write your thoughts here..." id="body" rows="4">{{ old('body') }}</textarea>
    </div>
    <div class="row">
        <div class="col text-secondary">
                {{ Auth::check() ? 'Comment as ' . Auth::user()->username : 'You are not registered yet.' }}
        </div>
        <div id="comment-btn" class="col d-flex justify-content-end">
            <button class="d-flex align-items-center btn text-white btn-anti-neutral" type="submit">
                <div 
                    id="button-progress"
                    class="spinner-border spinner-border-sm text-white mr-2" 
                    role="status">
                </div>
                <div class="">Post Comment</div>
            </button>
        </div>
    </div>
    @csrf
</form>