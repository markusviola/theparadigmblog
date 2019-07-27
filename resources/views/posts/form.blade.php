<div>{{ $errors->first('title') }}</div>
<div class="form-group">
    <label for="title">{{ Auth::user()->isAdmin == 1 ? "Announcement" : "Post" }} Title</label>
    <input class="form-control" type="text" placeholder="Make a good title..." name="title" value="{{ old('title') ?? $post->title  }}">
</div>

<div>{{ $errors->first('body') }}</div>
<div class="form-group">
    <label for="body">Content</label>
    <textarea class="form-control" name="body" placeholder="Write your thoughts here..." id="body" cols="30" rows="20">{{ old('body') ?? $post->body  }}</textarea>
</div>
@csrf