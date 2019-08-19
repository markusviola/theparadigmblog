<div class="side-wrapper mb-3">
    <div class="card shadow-sm side-card neutral-round bg-light">
        <div class="search-header d-flex align-items-center justify-content-between">
            <strong class="text-white ml-3">Search Posts</strong>
            <i class="text-white fas fa-search fa-lg mr-3"></i>
        </div>
        <div class="search-body">
            <hr class="mt-2 mb-2">
            <div class="px-3">
                <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <input
                            class="form-control"
                            type="text"
                            id="search"
                            placeholder="Enter a post title..."
                            name="search"
                        >
                    </div>
                    <div class="d-flex">
                        <div class="form-group form-check mr-3">
                            <input
                                name="searchAnnounce"
                                type="checkbox"
                                class="form-check-input"
                                id="announcement"
                            >
                            <label class="form-check-label text-secondary" for="announcement">Announcements</label>
                        </div>
                        <div class="form-group form-check">
                            <input
                                name="searchArticle"
                                type="checkbox"
                                class="form-check-input"
                                id="articles"
                            >
                            <label class="form-check-label text-secondary" for="articles">Article Posts</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="topic-header d-flex align-items-center justify-content-between">
            <strong class="text-white ml-3">Hot Topics</strong>
            <i class="text-white fab fa-hotjar fa-lg mr-3"></i>
        </div>
        <div class="topic-body">
            <hr class="mt-2 mb-2">
            <div class="px-3 pb-4">
                <div class="mt-3">
                    @foreach ($hotPosts as $post)
                        <a class="anti-neutral"
                            href="{{ route('posts.show', $post->id) }}"
                        >{{ mb_strimwidth($post->title, 0, 70, "...") }}</a>
                        <div class="d-flex justify-content-between pr-1 mt-2 ml-2">
                            <div class="d-flex justify-content-end">
                                <div class="d-flex mr-3">
                                    <i class="d-flex align-items-center like-post fas fa-heart fa-sm mr-2"></i>
                                    <div class="d-flex align-items-center"><strong class="text-secondary">{{ $post->likes->count() }}</strong></div>
                                </div>
                                <div class="d-flex">
                                    <i class="d-flex align-items-center comment-post fas fa-comment fa-sm mr-2"></i>
                                    <div class="d-flex align-items-center"><strong class="text-secondary">{{ $post->comments->count() }}</strong></div>
                                </div>
                            </div>
                            <h6 class="d-flex align-items-center text-muted m-0">
                                <div class="topic-author">{{ $post->user->username }}</div>
                            </h6>
                        </div>
                        <hr class="mt-2">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
