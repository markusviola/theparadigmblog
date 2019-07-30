
<hr class="mt-4">
@include('comments.modals.delete')
<div id="post-comments">
    @foreach ($comments as $comment)
        <div class="row">
            <div class="col-5">
                <strong class="text-secondary">
                    @if ($comment->user->isAdmin == 0)
                    <a class="neutral" href="{{ route('profile', $comment->user->url) }}">
                        <div>
                            {{ $comment->user->username }}
                            <i class="fas fa-user fa-sm ml-1"></i>
                        </div>
                    </a>     
                    @else
                        <div class="admin-text">
                            {{ $comment->user->username }}
                            <i class="fas fa-user-cog fa-sm ml-1"></i>
                        </div>
                    @endif
                </strong>
            </div>
            <div class="col d-flex justify-content-end text-muted">
                Posted on {{ $comment->created_at }}
            </div>
        </div>
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
</div>
