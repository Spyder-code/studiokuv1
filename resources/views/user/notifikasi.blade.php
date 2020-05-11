@extends('layouts.user')
@section('main')
    <div class="container-fluid" style="height:500px">
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
                @if (count($notif))
                <div class="row">
                    @foreach ($notif as $item)
                    <div class="col col-12 mt-2">
                                <!-- Earnings (Monthly) Card Example -->
                        <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{$item->title}}</div>
                                <div class="h5 mb-0 ml-4" style="color:grey"> {{$item->isi}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-secondary"></i>
                            </div>
                            </div>
                        </div>
                        </div>
                        {{-- <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-3 border-right bg-primary">
                                        <small>Image</small>
                                    </div>
                                    <div class="col col-9 bg-light">
                                        {{$item->isi}}
                                    </div>
                                </div>
                            </li>
                        </ul> --}}
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
