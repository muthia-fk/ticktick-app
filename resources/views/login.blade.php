@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h2>Login ke TickTick</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif
@endsection
