@extends('layouts.mitraHome')
@section('main')
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="row">
            <div class="col mt-3">
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="row">
            <div class="col mt-3">
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    @endif
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
                <h1 class="text-center text-primary mt-4">Lupa Password</h1>
                <hr>
                <form action="{{ url('resetPass') }}" method="post">
                    @csrf
                <div class="md-form form-sm mb-5">
                    <i class="fas fa-envelope prefix text-secondary"></i>
                    <input type="email" id="modalLRInput10" placeholder="Email" name="email" class="form-control form-control-sm validate">
                </div>
                <div class="text-center mt-2">
                    <button class="btn btn-success" type="submit">Kirim <i class="fas fa-sign-in ml-1"></i></button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
