@extends('layouts.user')
@section('notif',$notif)
@section('main')
 <!--================Home Banner Area =================-->
 <section class="banner_area mb-5">
    <div class="banner_inner d-flex align-items-center">
      <div class=" container">
        <div class="banner_content mt-5 ">
            <h2 class="text-center">Transaksi Booking</h2>
        </div>
      </div>
    </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb cont pl-4">
          <li class="breadcrumb-item"><a href="#">Cari Studio</a></li>
          <li class="breadcrumb-item"><a href="#">Detail Studio</a></li>
          <li class="breadcrumb-item"><a href="#">Transaksi Booking</a></li>
          <li class="breadcrumb-item active" aria-current="page">Keterangan Booking Booking</li>
        </ol>
      </nav>

  </section>


  <!--================End Home Banner Area =================-->

  <div class="container mb-5">
    <div class="row mt-3">
      <div class="col">
        <div class="card">
            @foreach ($data as $item)
            <h5 class="card-header">Total pembayaran Rp. {{number_format($item->harga,2,',','.')}}</h5>
            <div class="card-body">
                <p>Kode sewa:</p>
                <div class="text-center">
                    <button class="btn btn-secondary disabled text-center"><h1>{{$item->kode}}</h1></button>
                </div>
                <p class="mt-5 text-center">Gunakan kode diatas untuk melakukan pembayaran</p>
                <b>Bayar DP untuk booking studio terkait max 2 jam sebelum pemakaian.</b>
                <b>jika terjadi kendala waktu pembayaran DP, harap menghubungi pihak studio terkait!.</b>
                <hr>
                <b class="text-center"><i>Jika melanggar booking dapat di cancel</i></b>
            </div>
            <div class="card-footer">
                <a href="{{url('pesanan-saya')}}">Lihat pesanan saya</a>
            </div>
            @endforeach
            </div>
      </div>
  </div>
</div>

@endsection
