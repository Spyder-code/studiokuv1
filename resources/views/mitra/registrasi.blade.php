@extends('layouts.mitraHome')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col">
                @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <h1 class="text-center text-primary mt-4">Registrasi</h1>
                <hr>
                <form action="{{ url('registerMitra') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="md-form form-sm">
                                <i class="fas fa-user prefix text-secondary"></i>
                                <input type="text" placeholder="Nama lengkap" id="modalLRInput12" class="form-control form-control-sm validate" name="name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form form-sm mb-3">
                                <i class="fas fa-phone-alt prefix text-secondary"></i>
                                <input type="text" placeholder="Phone" id="modalLRInput12" name="phone" class="form-control form-control-sm validate">
                            </div>
                        </div>
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-map-marked-alt prefix text-secondary"></i>
                        <input type="text" placeholder="Alamat" id="modalLRInput12" name="alamat" class="form-control form-control-sm validate">
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-envelope prefix text-secondary"></i>
                        <input type="email" placeholder="Email" id="modalLRInput12" name="email" class="form-control form-control-sm validate">
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-lock prefix text-secondary"></i>
                        <input type="password" placeholder="Your password" id="modalLRInput13" name="password" class="form-control form-control-sm validate">
                    </div>

                    <div class="md-form form-sm mb-4">
                        <i class="fas fa-lock prefix text-secondary"></i>
                        <input type="password" placeholder="Repeat password" id="modalLRInput14" name="password_confirmation" class="form-control form-control-sm validate">
                    </div>

                    <div class="text-center form-sm mt-2">
                        <button class="btn btn-success" type="submit">Sign up <i class="fas fa-sign-in ml-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
