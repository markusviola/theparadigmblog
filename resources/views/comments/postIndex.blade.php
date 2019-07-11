
<hr class="mt-4">
@foreach ($comments as $comment)
    <div class="row">
        <div class="col">
            <strong class="text-secondary">{{ $comment->user->username }}</strong>
        </div>
        <div class="col d-flex justify-content-end text-muted">
            Posted on {{ $comment->created_at }}
        </div>
    </div>
    <div> {{ $comment->body }}</div>
    <hr>
@endforeach