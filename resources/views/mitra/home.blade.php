@extends('layouts/mitraHome')
@section('main')


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

<!-- akhir jumbotron -->

<div class="container">

<!-- form pencarian -->
<div class="row justify-content-center">
<!-- Section Title Start -->

<div class="col-lg-12 mb-5 mt-3 pt-3">
<div class="section-title  text-center">
    <h2>Layanan yang Kami Berikan</h2>
    <span class="title-line"><i class="fa fa-music" ></i></span>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto.</p>

</div>
</div>
<!-- Section Title End -->

<!-- layanan -->

<div class="row">
<div class="col-lg-4">
<div class="service-1">
  <span class="service-1-icon">
    <span class="flaticon-car-1"><i class="fa fa-laptop" style="color: #17a2b8"></i></span>
  </span>
  <div class="service-1-contents">
    <h3>Info Studio</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
  </div>
</div>
</div>
<div class="col-lg-4">
<div class="service-1">
  <span class="service-1-icon">
    <span class="flaticon-traffic"><i class="fa fa-laptop" style="color: #17a2b8"></i></span>
  </span>
  <div class="service-1-contents">
    <h3>Pesan Studio</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
  </div>
</div>
</div>
<div class="col-lg-4">
<div class="service-1">
  <span class="service-1-icon">
    <span class="flaticon-valet"><i class="fa fa-fw fa-laptop" style="color: #17a2b8"></i></span>
  </span>
  <div class="service-1-contents">
    <h3>Management Studio</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
  </div>
</div>
</div>
</div>
</div>
</div>

<!-- akhir layanan -->

<!-- sub judul -->

<!-- artikel -->
<!-- Section Title Start -->
<div class="site-section bg-light">
<div class="container">
<div class="col-lg-12 mb-4 mt-5 pt-3">
<div class="section-title  text-center">
    <h2>Jenis Studio</h2>
    <span class="title-line"><i class="fa fa-music" ></i></span>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto.</p>

</div>
</div>
<!-- Section Title End -->

<div class="row mb-5">
<div class="col-lg  figur">
<a href="#office1"><img class="thumblr" src="{{asset('image/band.jpg')}}" alt="office 1">
<span>Ruang Latihan</span>
</a>
</div>
<div class="col-lg  figur">
<a href="#office1"><img class="thumblr" src="{{asset('image/podcast.jpg')}}" alt="office 1">
<span>Ruang Podcast</span>
</a>
</div>
<div class="col-lg  figur">
<a href="#office1"><img class="thumblr" src="{{asset('image/menengah.jpg')}}" alt="office 1">
<span>Studio Menengah</span>
</a>
</div>
<div class="col-lg  figur">
<a href="#office1"><img class="thumblr" src="{{asset('image/premium.jpg')}}" alt="office 1">
<span>Studio Premium</span>
</a>
</div>
</div>


<!-- akhir artikel -->
<!-- akhir sub judul -->
</div>





<!-- pendaftaran -->

<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog cascading-modal" role="document">
<!--Content-->
<div class="modal-content">

<!--Modal cascading tabs-->
<div class="modal-c-tabs">

<!-- Nav tabs -->
<ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
    <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1" style="color:black"> Login</i>
        </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1" style="color:black"> Register</i>
        </a>
    </li>
</ul>

<!-- Tab panels -->
<div class="tab-content">
    <!--Panel 7-->
    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

    <!--Body-->
    <div class="modal-body mb-1">
        <form action="{{ url('loginMitra') }}" method="post">
            @csrf

        <div class="md-form form-sm mb-5">
            <i class="fas fa-envelope prefix"></i>
            <input type="email" id="modalLRInput10" placeholder="Email" name="email" class="form-control form-control-sm validate">

        </div>

        <div class="md-form form-sm mb-4">
            <i class="fas fa-lock prefix"></i>
            <input type="password" placeholder="Your password" id="modalLRInput11" name="password" class="form-control form-control-sm validate">

        </div>
        <div class="text-center mt-2">
            <button class="btn btn-info" type="submit">Log in <i class="fas fa-sign-in ml-1"></i></button>
        </div>
        </form>
    </div>
    <!--Footer-->
    <div class="modal-footer">
        <div class="options text-center text-md-right mt-1">
            <a href="{{ url('auth/google') }}" style="margin-top: 20px;"><img src="{{asset('image/google.png')}}" class="img-thumbail" style="width:50px; height:50px">
                <strong>Login With Google</strong>
            </a>
        </div>
        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
    </div>

    </div>
    <!--/.Panel 7-->

    <!--Panel 8-->
    <div class="tab-pane fade" id="panel8" role="tabpanel">

    <!--Body-->
    <form action="{{ url('registerMitra') }}" method="post">
        @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col">
                <div class="md-form form-sm">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" placeholder="Nama lengkap" id="modalLRInput12" class="form-control form-control-sm validate" name="name">
                </div>
            </div>
            <div class="col">
                <div class="md-form form-sm mb-3">
                    <i class="fas fa-phone-alt prefix"></i>
                    <input type="text" placeholder="Phone" id="modalLRInput12" name="phone" class="form-control form-control-sm validate">
                </div>
            </div>
        </div>

        <div class="md-form form-sm mb-5">
            <i class="fas fa-map-marked-alt prefix"></i>
            <input type="text" placeholder="Alamat" id="modalLRInput12" name="alamat" class="form-control form-control-sm validate">
        </div>

        <div class="md-form form-sm mb-5">
            <i class="fas fa-envelope prefix"></i>
            <input type="email" placeholder="Email" id="modalLRInput12" name="email" class="form-control form-control-sm validate">
        </div>

        <div class="md-form form-sm mb-5">
            <i class="fas fa-lock prefix"></i>
            <input type="password" placeholder="Your password" id="modalLRInput13" name="password" class="form-control form-control-sm validate">
        </div>

        <div class="md-form form-sm mb-4">
            <i class="fas fa-lock prefix"></i>
            <input type="password" placeholder="Repeat password" id="modalLRInput14" name="password_confirmation" class="form-control form-control-sm validate">
        </div>

        <div class="text-center form-sm mt-2">
            <button class="btn btn-info" type="submit">Sign up <i class="fas fa-sign-in ml-1"></i></button>
        </div>
    </form>
    </div>
    <!--Footer-->
    <div class="modal-footer">
        <div class="options text-right">
        <p class="pt-1">Already have an account? <a href="#panel7" data-toggle="tab" role="tab" class="blue-text">Log In</a></p>
        </div>
        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
    </div>
    </div>
    <!--/.Panel 8-->
</div>

</div>
</div>
<!--/.Content-->
</div>
</div>
<!--Modal: Login / Register Form-->



<!-- akhir pendaftaran -->


@endsection
