@extends('layouts/mitra')
@section('profil','active')
@section('img',$image)
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
    <div class="row">
        <div class="col text-center">
            @foreach ($user as $item)
            <div class="card mt-3 ml-5">
                <img class="img-thumbnail ml-5 mr-5 mt-3" src="{{ asset('image/'.$item->image) }}" style="height:260px" alt="{{$nama}}">
                <div class="card-body">
                    <h5 class="card-title">{{$nama}}</h5>
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
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <label for="address">Alamat</label>
                                </div>
                                <div class="col">
                                    <label for="">:</label>
                                </div>
                                <div class="col">
                                    {{$item->alamat}}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <label for="address">Phone</label>
                                </div>
                                <div class="col">
                                    <label for="">:</label>
                                </div>
                                <div class="col">
                                    {{$item->nomor}}
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
                <form  method="post" action="{{url('changeImageAdmin')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="img" class="file" name="images"/>
                    <span class="text-danger">{{ $errors->first('images') }}</span>
                    <input type="hidden" name="nama" value="{{ $item->nama }}">
                    <input type="hidden" name="img" value="{{ $item->image }}">
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-success float-right mr-5">Change</button>
                </form>
                <h4 class="mt-5">Ganti Password</h4>
                <hr>
                <form class="form-row"  method="post" action="{{url('changePasswordAdmin')}}">
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
@endsection
