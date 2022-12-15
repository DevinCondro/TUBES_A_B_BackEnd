@section('content')
<div class="w-5 center border rounded px-3 py-3 mx-auto">
        <h1>Login</h1>
        <form action="/sesi/login" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name= "email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Email</label>
                <input type="password" name= "password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection
@extends('dashboard')
