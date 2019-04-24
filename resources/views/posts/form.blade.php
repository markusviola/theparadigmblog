<div>{{ $errors->first('title') }}</div>
<div class="form-group">
    <label for="title">Post Title</label>
    <input class="form-control" type="text" placeholder="Make a good title title..." name="title" value="{{ old('title') }}">
</div>

<div>{{ $errors->first('body') }}</div>
<div class="form-group">
    <label for="body">Content</label>
    <textarea class="form-control" name="body" placeholder="Write your thoughts here..." id="body" cols="30" rows="10">{{ old('body') }}</textarea>
</div>

@csrf