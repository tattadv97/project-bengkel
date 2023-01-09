@extends('template.layout')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit User</h1>

        <div class="card shadow mb-4">
            <div class="card-header" py-3>
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
                <form action="/user_access/{{ $user->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="@error('name') is-invalid @enderror form-control"
                            id="name" name="name" value="{{ old('name', $user->name) }}">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="@error('username') is-invalid @enderror form-control"
                            id="username" name="username" value="{{ old('username', $user->username) }}">

                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="@error('password') is-invalid @enderror form-control"
                            id="password" name="password" value="{{ old('password', $user->password) }}">

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Edit User</button>
                    <a href="/user_access" class="btn btn-danger ">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection