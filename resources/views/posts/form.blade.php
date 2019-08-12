<div>{{ $errors->first('title') }}</div>
<div class="form-group">
    <input
        class="form-control my-4"
        type="text"
        id="title"
        placeholder="Make a good title..."
        name="title" value="{{ old('title') ?? $post->title  }}"
        onkeyup="mirrorTitle(this)"
    >
</div>

<div>{{ $errors->first('body') }}</div>
<div class="form-group">
    <textarea
        onkeyup="mirrorMarkDown(this)"
        class="preserve-breaks form-control"
        placeholder="Write your thoughts here..."
        name="body"
        id="body"
        cols="30"
        rows="29"
    >{{ old('body') ?? $post->body }}</textarea>
</div>
@csrf
