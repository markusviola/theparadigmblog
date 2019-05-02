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
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Date Registered</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td> <button class="btn btn-primary">{{ $user->status }}</button> </td>
                        </tr>    
                    @endforeach
                    
                   
                </tbody>
            </table>
        </div>

        
    </div>
@endsection