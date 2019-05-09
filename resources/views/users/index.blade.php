@extends('layouts/app')

@section('title','User Control')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11">
            <h1>User Control</h1>
            <hr>
            <div class="text-muted">User status can be toggled <strong>Active</strong> or <strong>Inactive</strong>.</div>
            <p>
            <table class="table">
                <thead>
                    <tr class="d-flex">
                    <th class="col-1" scope="col">ID</th>
                    <th class="col-3" scope="col">Username</th>
                    <th class="col-4" scope="col">Email Address</th>
                    <th class="col-2" scope="col">Date Registered</th>
                    <th class="col-2 text-center" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="d-flex">
                            <th class="col-1 align-middle" scope="row">{{ $user->id }}</th>
                            <td class="col-3 align-middle">{{ $user->username }}</td>
                            <td class="col-4 align-middle">{{ $user->email }}</td>
                            <td class="col-2 align-middle">{{ $user->created_at }}</td>
                            <td class="col-2 align-middle text-center"> 
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @method('PATCH')
                                    <button class="btn btn-{{ $user->status == "Active" ? "primary" : "danger" }}" type="submit" name="status" value="{{ $user->status }}">{{ $user->status }}</button> 
                                    @csrf
                                </form>    
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection