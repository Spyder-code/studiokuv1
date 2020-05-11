@extends('layouts.user')
@section('notif',$notif)
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-3 border-right mt-5">
                <div class="form-group mt-4">
                    <a href="{{url('account')}}" class="btn btn-primary" style="width:200px;"><i class="fas fa-user mr-3"></i>Profile</a>
                    <hr>
                    <a href="{{url('pesanan-saya')}}" class="btn btn-success" style="width:200px;"><i class="fas fa-shopping-cart mr-3"></i>Pesanan saya</a>
                    <hr>
                    <a href="{{url('notifikasi')}}" class="btn btn-warning" style="width:200px;"><i class="fas fa-bell mr-3"></i>Notifikasi</a>
                    <hr>
                    <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-secondary" style="width:200px;"><i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
                    <hr>
                </div>
            </div>
            <div class="col col-9 mb-5">
                <div class="container">
                    @error('images')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    @error('pass1')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    @error('pass2')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
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
                    <div class="row">
                        <div class="col text-center">
                            @foreach ($user as $item)
                            <div class="card mt-3 ml-5">
                                <img class="img-thumbnail ml-5 mr-5 mt-3" src="{{ asset('image/'.$item->image) }}" style="height:260px">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->name}}</h5>
                                    <ul class="list-group text-left">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="address">Email</label>
                                                </div>
                                                <div class="col">
                                                    <label for="">:</label>
                                                </div>
                                                <div class="col">
                                                    {{$item->email}}
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                                <div class="col mt-3">
                                    <h4>Foto Profil</h4>
                                    <hr>
                                <form  method="post" action="{{url('changeImage')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="img" class="file" name="images"/>
                                    <input type="hidden" name="nama" value="{{ $item->name }}">
                                    <input type="hidden" name="img" value="{{ $item->image }}">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-success float-right mr-5">Change</button>
                                </form>
                                <h4 class="mt-5">Ganti Password</h4>
                                <hr>
                                <form class="form-row"  method="post" action="{{url('changePasswordUser')}}">
                                    @csrf
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pass1">Old Password</label>
                                            <input type="password" class="form-control" name="pass1">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pass2">New Password</label>
                                            <input type="password" class="form-control" name="pass2">
                                        </div>
                                        <button type="submit" class="btn btn-success mb-2 float-right mr-5">Change</button>
                                    </div>
                                </form>

                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
