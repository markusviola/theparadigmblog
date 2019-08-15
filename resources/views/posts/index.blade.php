@extends('layouts/app')

@section('content')
<div class="row justify-content-center">
    <div class="col-11">
        <h1 class="alt-anti-neutral">Article Post Control</h1>
        <hr class="divider">
        <div class="text-muted">Article posts can be <strong>edited</strong> or be <strong>deleted</strong>.
        <p>
        @include('posts.modals.delete')
        <table id="admin-posts" class="table">
            <thead class="alt-anti-neutral">
                <tr class="d-flex">
                <th class="col-1" scope="col">ID</th>
                <th class="col-5" scope="col">Title</th>
                <th class="col-2" scope="col">Date Created</th>
                <th class="col-2" scope="col">Date Modified</th>
                <th class="col-1 text-center" scope="col">Edit</th>
                <th class="col-1 text-center" scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="d-flex text-dark">
                        <th class="col-1 align-middle" scope="row">{{ $post->id }}</th>
                        <td class="col-5 align-middle">
                            <a class="text-dark" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                        </td>
                        <td class="col-2 align-middle">{{ $post->created_at }}</td>
                        <td class="col-2 align-middle">{{ $post->updated_at }}</td>
                        <td class="col-1 align-middle text-center">
                            <a class="trans-btn"  href="{{ route('posts.edit', $post->id) }}"><i class="edit-post fas fa-pencil-alt fa-lg"></i></a>
                        </td>
                        <td class="col-1 align-middle text-center">
                            <button class="trans-btn delete-modal"
                                onclick="prepareDeletion(this)"
                                data-toggle="modal"
                                data-target="#post-deletion-modal"
                                data-id="{{ $post->id }}"
                                data-type="post"
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

