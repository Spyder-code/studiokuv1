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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Atas nama</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Nama band</th>
                            <th scope="col">Waktu main</th>
                            <th scope="col">Waktu selesai</th>
                            <th scope="col">Total harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Almi</td>
                            <td>F01</td>
                            <td>Band A</td>
                            <td>07.00 13-05-2020</td>
                            <td>08.00 13-05-2020</td>
                            <td>Rp. 50.000</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>luay</td>
                            <td>F02</td>
                            <td>Band B</td>
                            <td>07.00 14-05-2020</td>
                            <td>08.00 14-05-2020</td>
                            <td>Rp. 50.000</td>
                        </tr>
                    </tbody>
                </table>

                <h2 class="mt-5">Transaksi</h2>
                <hr>
                <table class="table table-bordered">
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
                            <th scope="row">1</th>
                            <td>Band A</td>
                            <td>Rp.50.000</td>
                            <td>Rp.70.000</td>
                            <td>Rp.20.000</td>
                            <td>08.00 13-05-2020</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Band B</td>
                            <td>Rp.50.000</td>
                            <td>Rp.100.000</td>
                            <td>Rp.50.000</td>
                            <td>08.00 13-05-2020</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

</div>
@endsection
