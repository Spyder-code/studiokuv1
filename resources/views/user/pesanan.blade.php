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
            <div class="col col-9">
                @if (count($pesanan))
                <div class="row">
                    @foreach ($pesanan as $item)
                    <div class="col col-6 mb-3 mt-2">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="card">
                                    <img src="{{ asset('image/'.$item->nama_mitra.'/'.$item->image) }}" class="img-thumbnail" style="height:300px">
                                    <div class="card-body">
                                        <ul class="list-group text-left">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col col-5">
                                                        <label for="address">Tanggal main</label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <label for="">:</label>
                                                    </div>
                                                    <div class="col col-5">
                                                        {{$item->tanggal_main}}
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col col-5">
                                                        <label for="address">Status</label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <label for="">:</label>
                                                    </div>
                                                    <div class="col col-5">
                                                        @if ($item->status==0)
                                                            Booking studio belum diverifikasi
                                                        @else
                                                            Sudah terverifikasi
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col col-5">
                                                        <label for="address">Kode pembayaran</label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <label for="">:</label>
                                                    </div>
                                                    <div class="col col-5">
                                                       <button class="btn btn-secondary">{{$item->kode}}</button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item text-center">
                                                <a href="{{url('pesanan-saya/'.$item->id)}}" class="btn btn-success d-block">Detail</a>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                @else
                    <h1 class="text-center" style="color:grey; margin-top:200px">Kosong</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
