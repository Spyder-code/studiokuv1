@extends('layouts/mitra')
@section('profil','active')
@section('img',$image)
@section('main')
<div class="container">
    @error('nomor')
    <div class="alert alert-danger mt-3">{{ $message }}</div>
    @enderror
    @error('alamat')
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
                @if ($item->image!="default.jpg")
                <img class="img-thumbnail ml-5 mr-5 mt-3" src="{{ asset('image/'.$item->nama.'/'.$item->image) }}" style="height:260px" alt="{{$nama}}">
                @else
                <img class="img-thumbnail ml-5 mr-5 mt-3" src="{{ asset('image/default.jpg') }}" style="height:260px" alt="{{$nama}}">
                @endif
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
                                    <a href="#" data-toggle="modal" data-target="#alamat" class="badge badge-primary">Change</a>
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
                                    <a href="#" data-toggle="modal" data-target="#nomor" class="badge badge-primary">Change</a>
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
                <form  method="post" action="{{url('changeImageMitra')}}" enctype="multipart/form-data">
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
                <form class="form-row"  method="post" action="{{url('changePasswordMitra')}}">
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
                <hr>

                {{-- modal alamat --}}
                <div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ganti alamat</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-row"  method="post" action="{{url('changeAlamat')}}">
                                    @csrf
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="alamat" value="{{$item->alamat}}">
                                        </div>
                                    </div>
                            </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Ganti</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>

                {{-- modal nomor --}}
                <div class="modal fade" id="nomor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ganti nomor telp.</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-row"  method="post" action="{{url('changeNomor')}}">
                                    @csrf
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nomor" value="{{$item->nomor}}">
                                        </div>
                                    </div>
                            </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Ganti</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>
@endsection
