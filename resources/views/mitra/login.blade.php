@extends('layouts.mitraHome')
@section('main')
    <div class="container">
        <div class="row mt-5">
            <div class="col" style="height:700px;">
                @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h1 class="text-center text-primary mt-4">Login</h1>
                <hr>
                <form action="{{ url('loginMitra') }}" method="post">
                    @csrf
                <div class="md-form form-sm mb-5">
                    <i class="fas fa-envelope prefix text-secondary"></i>
                    <input type="email" id="modalLRInput10" placeholder="Email" name="email" class="form-control form-control-sm validate">
                </div>
                <div class="md-form form-sm mb-2">
                    <i class="fas fa-lock prefix text-secondary"></i>
                    <input type="password" placeholder="Your password" id="modalLRInput11" name="password" class="form-control form-control-sm validate">
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-success" type="submit">Log in <i class="fas fa-sign-in ml-1"></i></button>
                    <a class="btn btn-warning" href="#">Forgot email or password <i class="fas fa-sign-in ml-1"></i></a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
