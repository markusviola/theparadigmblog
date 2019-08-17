@extends('layouts/app')

@section('content')
<div class="row justify-content-center">
    <div class="col-11">
        <h1 class="alt-anti-neutral">User Control</h1>
        <hr class="divider">
        <div class="text-muted">
            User status can be toggled <strong>Active</strong> or <strong>Inactive</strong>.
        </div>
        <p>
        <table class="table">
            <thead class="alt-anti-neutral">
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
                    <tr class="d-flex text-dark">
                        <th class="col-1 d-flex align-items-center">{{ $user->id }}</th>
                        <td class="col-3 d-flex align-items-center">
                            <a class="neutral" href="{{ route('profile', $user->url) }}">
                                {{ $user->username }}
                            </a>
                        </td>
                        <td class="col-4 d-flex align-items-center">{{ $user->email }}</td>
                        <td class="col-2 d-flex align-items-center">{{ $user->created_at }}</td>
                        <td class="col-2 d-flex align-items-center justify-content-center">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @method('PATCH')
                                <button
                                    class="btn btn-user-status
                                        btn-{{ $user->status == "Active" ? "neutral" : "danger" }} text-white"
                                    type="submit"
                                    name="status"
                                    value="{{ $user->status }}"
                                >{{ $user->status }}
                                </button>
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 d-flex justify-content-center my-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
