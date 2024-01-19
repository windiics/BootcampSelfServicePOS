@extends('layouts2/aplikasi')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto"></div>    
    <h1>Login&#128064</h1>
    <form action="/sesi/login" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ Session::get('email') }}" name="email"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password"  class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button name="submit" type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>

    <div class="mb-3 d-grid">
        <a href="/sesi/register" type="button" class="btn btn-secondary">Register via Sesi</a>
    </div>
@endsection
