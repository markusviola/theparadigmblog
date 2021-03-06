
<hr class="mt-4 divider">
@include('comments.modals.delete')
<div id="post-comments">
    @foreach ($post->comments->reverse() as $comment)
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
            <div class="preserve-breaks col-{{ Auth::check() && (Auth::user()->isAdmin == 1 ||
                 Auth::user()->id == $comment->user->id) ? '11' : 'auto' }}
                 text-justify mt-2 long-text align-content-center text-dark">{{ $comment->body }}
            </div>
            @if(Auth::check() && (Auth::user()->isAdmin == 1 || Auth::user()->id == $comment->user->id))
                <button class="col-1 btn-trans delete-modal row align-content-center mx-0 px-0"
                    onclick="prepareDeletion(this)"
                    data-toggle="modal"
                    data-target="#comment-deletion-modal"
                    data-id="{{ $comment->id }}"
                    data-type="comment"
                    data-on-post="true"
                ><i class="col text-right delete-post-alt fas fa-times fa-lg"></i>
                </button>
            @endif
        </div>
        <hr class="divider">
    @endforeach
</div>
