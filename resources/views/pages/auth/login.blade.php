@extends('layout.default')


@section('title')
    Login
@endsection


@section('content')
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <h1>Login</h1>
        <p>Signin to your account.</p>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Enter email" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter password" required />
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    @include('components.errors')
    @include('components.status')
@endsection
