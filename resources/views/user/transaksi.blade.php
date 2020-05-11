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
                    <li class="breadcrumb-item active" aria-current="page">Transaksi Booking Studio</li>
                </ol>
            </nav>
        </section>


        <!--================End Home Banner Area =================-->

    <div class="container mb-5">
        <div class="row mt-3">
            @foreach ($transaksi as $item)
                @if ($item->status==0)
                <div class="col col-7">
                    <div class="card">
                      <h5 class="card-header">Transaksi</h5>
                      <div class="card-body">
                          <h5 class="card-title"><i class="fas fa-user" style="color: #17a2b8"></i>  Penyewa : {{$item->nama_user}}</h5>
                          <hr>
                          @error('status')
                          <div class="alert alert-danger">Anda harus menyetujui persetujuan agar dapat melanjutkan transaksi!</div>
                          @enderror
                      <div class="form-check">
                          <form action="{{url('verifikasi')}}" method="post">
                              @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="ruang" value="{{$item->nama_ruangan}}">
                            <input type="hidden" name="studio" value="{{$item->nama_studio}}">
                            <input type="hidden" name="kode" id="code">
                            <input class="form-check-input" type="checkbox" value="1" name="status">
                            <label class="form-check-label mb-3" for="defaultCheck1">
                                Saya setuju dengan syarat dan ketentuan penyewaan studio, dan menyatakan saya mengetahui kemungkinan batasan atau biaya tambahan terkait usia (lebih dari 17 tahun), saya sudah memiliki KTP.
                            </label>
                            <button type="submit" class="btn btn-success" onclick="return confirm('are you sure?')">Lanjutkan</button>
                        </div>
                        </form>
                        <i>Keterangan metode pembayaran ada pada langkah berikutnya</i>
                      </div>
                    </div>
                </div>
                @else
                    <div class="col col-4">
                        <a href="{{url('pembayaran')}}" class="btn btn-primary">Lihat pembayaran</a>
                    </div>
                @endif
          <div class="col mb-4">
              <div class="card">
                <img src="{{ asset('image/'.$item->nama_mitra.'/'.$item->image) }}" class="img-thumbnail" style="height:300px">
                <div class="card-body">
                  <div><span class="badge badge-warning">Premium </span><small> {{$item->kategori}}</small></div>
                  <h5 class="card-title mt-2">Ruangan {{$item->nama_ruangan}}</h5>
                  <div class="place_review">
                      <a href="#"><i class="fas fa-star"></i></a>
                      <a href="#"><i class="fas fa-star"></i></a>
                      <a href="#"><i class="fas fa-star"></i></a>
                      <a href="#"><i class="fas fa-star"></i></a>
                      <a href="#"><i class="fas fa-star"></i></a>
                      <span>(210 review)</span>
                  </div>
                  <ul class="list-group text-left">
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col col-5">
                                  <label for="address">Nama band</label>
                              </div>
                              <div class="col col-2">
                                  <label for="">:</label>
                              </div>
                              <div class="col col-5">
                                  {{$item->nama_band}}
                              </div>
                          </div>
                      </li>
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
                                  <label for="address">Waktu mulai</label>
                              </div>
                              <div class="col col-2">
                                  <label for="">:</label>
                              </div>
                              <div class="col col-5">
                                  {{$item->waktu_main}}
                              </div>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col col-5">
                                  <label for="address">Waktu selesai</label>
                              </div>
                              <div class="col col-2">
                                  <label for="">:</label>
                              </div>
                              <div class="col col-5">
                                  {{$item->waktu_selesai}}
                              </div>
                          </div>
                      </li>
                      <li class="list-group-item">
                          <div class="row">
                              <div class="col col-5">
                                  <label for="address">Total harga</label>
                              </div>
                              <div class="col col-2">
                                  <label for="">:</label>
                              </div>
                              <div class="col col-5">
                                  Rp. {{number_format($item->harga,2,',','.')}}
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
                  </ul>
                </div>
                @endforeach
              </div>
        </div>
      </div>
      </div>

        <script>
            $(function(){
                let r = Math.random().toString(36).substring(7);
                var code = r.toUpperCase();
                $('#code').val(code);
                console.log(code);

            });
        </script>
@endsection
