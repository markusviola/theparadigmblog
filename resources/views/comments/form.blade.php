<h6 class="text-muted mt-3 mb-3">Leave a comment</h6>
<form action="{{ route('comments.store') }}" method="POST">
    <div class="text-danger">{{ $errors->first('body') }}</div>
    <div class="form-group mt-2">
        <textarea class="form-control" name="body" placeholder="Write your thoughts here..." id="body" rows="4">{{ old('body') }}</textarea>
    </div>
    <div class="row">
        <div class="col text-secondary">
                {{ Auth::user() !== null ? 'Comment as ' . Auth::user()->username : 'You are not registered yet.' }}
        </div>
        <div class="col d-flex justify-content-end">
            <button class="btn text-white btn-anti-neutral" name="blog_post_id" value="{{ $post->id }}" type="submit">Post Comment</button>
        </div>
    </div>
    @csrf
</form>