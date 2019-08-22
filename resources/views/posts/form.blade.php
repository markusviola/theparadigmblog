
<div class="form-group">
    <input
        class="form-control mt-4 @error('title') is-invalid @enderror"
        type="text"
        id="title"
        placeholder="Make a good title..."
        name="title" value="{{ old('title') ?? $post->title  }}"
        onkeyup="mirrorTitle(this)"
    >
    @error('title')
        <span class="invalid-feedback mb-4" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <textarea
        onkeyup="mirrorMarkDown(this)"
        class="preserve-breaks form-control @error('body') is-invalid @enderror"
        placeholder="Write your thoughts here..."
        name="body"
        id="body"
        cols="30"
        rows="29"
    >{{ old('body') ?? $post->body ?? view('posts.template')->render() }}</textarea>
    @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@csrf
