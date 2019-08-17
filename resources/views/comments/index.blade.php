@extends('layouts/app')

@section('content')
<div class="row justify-content-center">
    <div class="col-11">
        <h1 class="alt-anti-neutral">Comment Control</h1>
        <hr class="divider">
        <div class="text-muted">Post comments can be <strong>deleted</strong>.
        <p>
        @include('comments.modals.delete')
        <table id="admin-post-comments" class="table">
            <thead class="alt-anti-neutral">
                <tr class="d-flex">
                <th class="col-1" scope="col">ID</th>
                <th class="col-1 px-0" scope="col">Article ID</th>
                <th class="col-2" scope="col">User</th>
                <th class="col-5" scope="col">Comment</th>
                <th class="col-2" scope="col">Date Created</th>
                <th class="col-1 text-center" scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr class="d-flex text-dark">
                        <th class="col-1 d-flex align-items-center" scope="row">{{ $comment->id }}</th>
                        <td class="col-1 px-0 d-flex justify-content-center align-items-center">{{ $comment->blog_post_id }}</td>
                        <td class="col-2 d-flex align-items-center">
                            <a class="neutral" href="{{ route('profile', $comment->user->url) }}">
                                {{ $comment->user->username }}
                            </a>
                        </td>
                        <td class="col-5 d-flex align-items-center long-text">{{ mb_strimwidth($comment->body, 0, 75, "...")  }}</td>
                        <td class="col-2 d-flex align-items-center">{{ $comment->created_at }}</td>
                        <td class="col-1 align-middle text-center">
                            <button class="btn-trans delete-modal"
                                onclick="prepareDeletion(this)"
                                data-toggle="modal"
                                data-target="#comment-deletion-modal"
                                data-id="{{ $comment->id }}"
                                data-type="comment"
                                data-on-post="false"
                            ><i class="delete-post fas fa-minus-circle fa-lg"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 d-flex justify-content-center my-3">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
