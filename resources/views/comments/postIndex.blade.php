
<hr class="mt-4">
@include('comments.modals.delete')
@foreach ($comments as $comment)
        <div class="row">
            <div class="col-5">
                <strong class="text-secondary">{{ $comment->user->username }}</strong>
            </div>
            <div class="col d-flex justify-content-end text-muted">
                Posted on {{ $comment->created_at }}
            </div>
        </div>
        {{-- need to adjust appropriately when switching account types --}}
        <div class="row">
            <div class="col-11 text-justify mt-2 long-text">{{ $comment->body }}</div>
            @if(Auth::user() !== null && Auth::user()->isAdmin == 1)
                <button class="col-1 trans-btn delete-modal" 
                    data-toggle="modal" 
                    data-target="#delete-confirm" 
                    data-id="{{ $comment->id }}" 
                    data-type="comment" 
                ><i class="delete-post fas fa-minus-circle fa-lg"></i>
                </button>
            @endif
        </div>
    <hr>
@endforeach