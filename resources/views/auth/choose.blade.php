@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <a class="login-button login-button--github" href="{{ url('login/github') }}">Login with GitHub</a>
@endsection
