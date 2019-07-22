
<hr class="mt-4">
@foreach ($comments as $comment)
    
        <div class="row">
            <div class="col-5">
                <strong class="text-secondary">{{ $comment->user->username }}</strong>
            </div>
            <div class="col-7 d-flex justify-content-end text-muted">
                Posted on {{ $comment->created_at }}
            </div>
        </div>
        <div class="text-justify mt-2 long-text">{{ $comment->body }}</div>
    <hr>
@endforeach