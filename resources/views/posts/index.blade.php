@extends('layouts/app')

@section('content')
<div class="row justify-content-center">
    <div class="col-11">
            <h1>Article Post Control</h1>
            <hr>
            <div class="text-muted">Article posts can be <strong>edited</strong> or be <strong>deleted</strong>.
            <p>
            <table class="table">
                <thead>
                    <tr class="d-flex">
                    <th class="col-1" scope="col">ID</th>
                    <th class="col-5" scope="col">Title</th>
                    <th class="col-2" scope="col">Date Created</th>
                    <th class="col-2" scope="col">Date Modified</th>
                    <th class="col-1 text-center" scope="col">Edit</th>
                    <th class="col-1 text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="d-flex">
                            <th class="col-1 align-middle" scope="row">{{ $post->id }}</th>
                            <td class="col-5 align-middle">{{ $post->title }}</td>
                            <td class="col-2 align-middle">{{ $post->created_at }}</td>
                            <td class="col-2 align-middle">{{ $post->updated_at }}</td>
                            <td class="col-1 align-middle text-center"> 
                                <button class="trans-btn"><i class="edit-post fas fa-pencil-alt fa-lg text-info"></i></button>
                                {{-- <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @method('PATCH') --}}
                                    {{-- <button class="btn btn-{{ $user->status == "Active" ? "primary" : "danger" }}" type="submit" name="status" value="{{ $user->status }}">{{ $user->status }}</button>  --}}
                                    {{-- @csrf
                                </form>     --}}
                            </td>
                            <td class="col-1 align-middle text-center"> 
                                    <button class="trans-btn"><i class="fas fa-minus-circle fa-lg text-danger"></i></button>
                                    {{-- <form action="{{ route('users.update', $user->id) }}" method="POST">
                                        @method('PATCH') --}}
                                        {{-- <button class="btn btn-{{ $user->status == "Active" ? "primary" : "danger" }}" type="submit" name="status" value="{{ $user->status }}">{{ $user->status }}</button>  --}}
                                        {{-- @csrf
                                    </form>     --}}
                                </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

