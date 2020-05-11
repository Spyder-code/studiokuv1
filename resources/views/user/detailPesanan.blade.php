@extends('layouts.user')
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
                <div class="row">
                    <div class="col col-8">
                        @foreach ($transaksi as $item)
                <div class="card mt-4 mb-4">
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
                      </ul>
                    </div>
                    @endforeach
                </div>
                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <i class="fas fa-comment-dots float-right fixed-bottom text-success" style="margin-left:90%; font-size:60px;" data-toggle="modal" data-target="#centralModalSuccess"><h6>Chat pemilik studio</h6>
    </i>

    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-side modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
            <p class="heading lead">{{$item->nama_studio}}</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
            </div>

            <!--Body-->
            <div class="modal-body chating">
            <div class="text-center">
                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="{{asset('image/default.jpg')}}" class="rounded-circle user_img_msg">
                    </div>
                    <div class="msg_cotainer">
                        Hi, how are you samim?
                        <span class="msg_time">8:40 AM, Today</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-4">
                    <div class="msg_cotainer_send">
                        Hi Khalid i am good tnx how about you?
                        <span class="msg_time_send">8:55 AM, Today</span>
                    </div>
                    <div class="img_cont_msg">
                <img src="{{asset('image/user.jpg')}}" class="rounded-circle user_img_msg">
                    </div>
                </div>
            </div>
            </div>

            <!--Footer-->
            <div class="card-footer">
                <form id="chat">
                    <input type="hidden" name="id_mitra" value="">
                    <input type="hidden" name="id_user" value="">

                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->

@endsection
