@extends('layouts.user')
@if (Auth::check())
@section('notif',$notif)
@endif
@section('main')
        <!--================Home Banner Area =================-->
        <section class="banner_area mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb cont pl-4">
                <li class="breadcrumb-item"><a href="#">Cari Studio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Studio</li>
                </ol>
            </nav>

        </section>
        <!--================End Home Banner Area =================-->

        <div class="container mb-5">
            <hr>
        <div class="row justify-content-center mb-4 mt-4">
            @foreach ($data as $item)
            <div class="col col-6">
                <img src="{{ asset('image/'.$item->nama_mitra.'/'.$item->image) }}" class="img-thumbnail" style="width:100%; height:530px">
            </div>
            <div class="col col-6 border-right">

                <h1 class="c">{{$item->nama_studio}}</h1>
                <span class="btn btn-primary disabled">Ruang : {{$item->nama}} </span>
                <div><span class="badge badge-warning">Premium </span><small class="ml-2">{{$item->kategori}}</small></div>
                <div class="place_review">
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <a href="#"><i class="fas fa-star"></i></a>
                    <span>(210 review)</span>
                </div>
                <p class="card-text text-light font-weight-bold mt-2" style="font-size: 26px;">Rp. {{number_format($item->harga,2,',','.')}} <small>per jam</small></p>
                <div><p> Minimal booking 2 jam</p></div>
                <div class="card" style="width: 25rem;">
        <div class="card-body">
            @if ($message = Session::get('danger'))
            <div class="row">
                <div class="col mt-3">
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                        <button class="btn btn-primary text-center" data-toggle="modal" data-target="#modalLRForm">Click here to login!</button>
                    </div>
                </div>
            </div>
            @endif
            @error('band')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('tanggal')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('mulai')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('selesai')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <form action="{{url('booking')}}" method="post">
                @csrf
                <input type="hidden" name="id_ruang" value="{{$item->id}}">
                <input type="hidden" name="harga" value="{{$item->harga}}">
                <div class="form-group">
                    <label for="band">Nama band</label>
                    <input type="text" class="form-control" name="band" placeholder="">
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal booking</label>
                    <input type="text" class="form-control" name="tanggal" id="datepicker">
                </div>
                    <div class="row">
                        <div class="col-lg">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Waktu mulai</label>
                                <input type="text" id="mulai"  name="mulai" class="form-control form-control-sm validate text-center">
                            </div>
                        </div>
                    <div class="col-lg">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Waktu selesai</label>
                            <input type="text" id="selesai"  name="selesai" class="form-control form-control-sm validate text-center">
                        </div>
                    </div>
                </div>
                        <button type="submit" class="btn btn-info">Booking</button>
            </form>

        </div>
        </div>
            </div>
        </div>

        <!-- deskripsi studio -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true" style="color:black"><i class="fa fa-home"></i> Deskripsi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="false"><i class="fa fa-image"></i> Fasilitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                aria-selected="false"><i class="fa fa-phone"></i> Review</a>
            </li>
        </ul>
        <div class="tab-content mb-5 mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>Raw denim you
                    probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master
                    cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
                    keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                    placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi
                    qui.</p>
                <h5>Alamat</h5>
                <p>{{$item->address}}</p>
                <h5>Jam kerja</h5>
                <p>Open: {{$item->open}}, Closed: {{$item->closed}}</p>
                <h5>Phone</h5>
                <p>{{$item->phone}}</p>
            </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Food truck fixie
                locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit,
                blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum
                PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS
                salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
                sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Etsy mixtape
                wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
                lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
                stumptown. Pitchfork sustainable tofu synth chambray yr.</div>
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
                        <img src="{{asset('image/user.png')}}" class="rounded-circle user_img_msg">
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
            @endforeach
        <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $(function(){
                console.log("ok");

                $('#mulai').mdtimepicker({

                // format of the time value (data-time attribute)
                timeFormat: 'hh:mm:ss.000',

                // format of the input value
                format: 'hh:mm',

                // theme of the timepicker
                // 'red', 'purple', 'indigo', 'teal', 'green'
                theme: 'blue',

                // determines if input is readonly
                readOnly: true,

                // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
                hourPadding: false

                });
                $('#selesai').mdtimepicker({

                // format of the time value (data-time attribute)
                timeFormat: 'hh:mm:ss.000',

                // format of the input value
                format: 'hh:mm',

                // theme of the timepicker
                // 'red', 'purple', 'indigo', 'teal', 'green'
                theme: 'blue',

                // determines if input is readonly
                readOnly: true,

                // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
                hourPadding: false

                });
                $( "#datepicker" ).datepicker({
                    dateFormat: "dd MM yy"
                });

                // $('#chat').submit(function(event) {
                //     event.preventDefault();
                //     var nama = $('#nama').val();
                //     $.ajax({
                //         url:"search",
                //         type:"POST",
                //         data:{nama:nama},
                //         success:function (data) {
                //             console.log("success");
                //             console.log(data);
                //             $('#nama').val("");
                //             $('#japan').html(data);
                //         }
                //     })
                //     // end of ajax call
                // });


            });
        </script>
@endsection
