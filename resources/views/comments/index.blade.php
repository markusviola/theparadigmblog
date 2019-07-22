@extends('layouts/app')

@section('content')
<div class="row justify-content-center">
    <div class="col-11">
        <h1>Comment Control</h1>
        <hr>
        <div class="text-muted">Post comments can be <strong>deleted</strong>.
        <p>
        @include('comments.modals.delete')
        <table class="table">
            <thead>
                <tr class="d-flex">
                <th class="col-1" scope="col">ID</th>
                <th class="col-1 article-id" scope="col">Article ID</th>
                <th class="col-2" scope="col">User</th>
                <th class="col-5" scope="col">Comment</th>
                <th class="col-2" scope="col">Date Created</th>
                <th class="col-1 text-center" scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr class="d-flex">
                        <th class="col-1 align-middle" scope="row">{{ $comment->id }}</th>
                        <td class="col-1 article-id align-middle">{{ $comment->blog_post_id }}</td>
                        <td class="col-2 align-middle">{{ $comment->user->username }}</td>
                        <td class="col-5 align-middle long-text">{{ mb_strimwidth($comment->body, 0, 75, "...")  }}</td>
                        <td class="col-2 align-middle">{{ $comment->created_at }}</td>
                        <td class="col-1 align-middle text-center"> 
                            <button class="trans-btn delete-modal" 
                                data-toggle="modal" 
                                data-target="#delete-confirm" 
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
    </div>
</div>
@endsection