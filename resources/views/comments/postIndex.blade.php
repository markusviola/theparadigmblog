
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
            <div class="col-{{ Auth::user() !== null && Auth::user()->isAdmin == 1 ? '11' : 'auto' }}
                 text-justify mt-2 long-text align-content-center">{{ $comment->body }}
            </div>
            @if(Auth::user() !== null && Auth::user()->isAdmin == 1)
                <button class="col-1 trans-btn delete-modal row align-content-center mx-0 px-0" 
                    data-toggle="modal" 
                    data-target="#delete-confirm" 
                    data-id="{{ $comment->id }}" 
                    data-type="comment" 
                    data-on-post="true" 
                ><i class="col text-right delete-post-alt fas fa-times fa-lg"></i>
                </button>
            @endif
        </div>
    <hr>
@endforeach