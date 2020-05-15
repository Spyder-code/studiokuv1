@extends('layouts/mitra')
@section('pesanan','active')
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
            <div class="col mt-5">
                <h2>Booking</h2>
                <hr>
                @if ($data->count()>0)
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Atas nama</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Nama band</th>
                            <th scope="col">Tanggal main</th>
                            <th scope="col">Waktu main</th>
                            <th scope="col">Waktu selesai</th>
                            <th scope="col">Total harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->namaRuangan}}</td>
                            <td>{{$item->nama_band}}</td>
                            <td>{{$item->tanggal_main}}</td>
                            <td>{{$item->waktu_main}}</td>
                            <td>{{$item->waktu_selesai}}</td>
                            <td>{{$item->harga}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                        @else
                            <tr>
                                <h1 class="text-grey text-center">Data kosong!</h1>
                            </tr>
                        @endif


                <h2 class="mt-5">Pembayaran</h2>
                <hr>
                @if ($dataPembayaran->count()>0)
                <table class="table table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama band</th>
                            <th scope="col">Total biaya</th>
                            <th scope="col">Uang tunai</th>
                            <th scope="col">Uang kembalian</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->nama_band}}</td>
                            <td>{{$item->total_biaya}}</td>
                            <td>{{$item->uang}}</td>
                            <td>{{$item->kembalian}}</td>
                            <td>{{ date('d-M-y', strtotime($item->created_at)) }}</td>
                        </tr>
                    </tbody>
                </table>
                @else
                <tr>
                    <h1 class="text-grey text-center">Data kosong!</h1>
                </tr>
                @endif
            </div>
        </div>

</div>
@endsection
