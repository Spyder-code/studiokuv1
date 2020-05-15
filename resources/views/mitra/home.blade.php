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
<section class="bg-light">
    <div class="jumbotron jumbotron-mitra jumbotron-fluid text-center" style="background-image: url({{asset('image/studiorekaman.jpg')}});">
        <div class="container">
        <h6 class="display-4"><span>Tingkatkan Penyewa</span> Studio Musik <br>Anda dengan <span>Mendaftarkan</span><br> Studio Musik Anda</h6>
        <a href="{{url('mitra/registrasi')}}" class="btn btn-secondary tombol-daftar shadow-lg">Di Sini</a>
        </div>
</div>
</section>
<!-- akhir jumbotron -->

<div class="container">

<!-- form pencarian -->
<div class="row justify-content-center">
<!-- Section Title Start -->

<div class="col-lg-12 mb-5 mt-3 pt-3">
<div class="section-title  text-center">
    <h3>Mengapa di Studioku ?</h3>
    <span class="title-line"><i class="fa fa-music" ></i></span>
    <p>Apakah Anda siap untuk menjangkau lebih dari sebelumnya ? </p>
</div>
</div>
<!-- Section Title End -->

<!-- layanan -->

<div class="row">
<div class="col-lg-4">
<div class="service-1">
  <span class="service-1-icon">
    <span class="flaticon-car-1"><i class="fa fa-bolt" style="color: #17a2b8"></i></span>
  </span>
  <div class="service-1-contents">
    <h3>Mudah</h3>
    <p>Studioku membantu dan memudahkan Anda dalam menawarkan penyewaan studio music yang Anda miliki agar orang bisa melihatnya kapanpun.</p>
    <p>Proses pendaftaran sebagai mitra sangat mudah, anda bisa menjadi mitra hanya dalam beberapa menit saja.</p>
  </div>
</div>
</div>
<div class="col-lg-4">
<div class="service-1">
  <span class="service-1-icon">
    <span class="flaticon-traffic"><i class="fa fa-sun" style="color: #17a2b8"></i></span>
  </span>
  <div class="service-1-contents">
    <h3>Menarik</h3>
    <p>Studio music Anda dapat dilihat banyak orang yang ingin menyewanya dengan Studioku</p>
            <p>Customer yang ingin menyewa studio dapat melihat semua informasi keunggulan studio anda</p>
  </div>
</div>
</div>
<div class="col-lg-4">
<div class="service-1">
  <span class="service-1-icon">
    <span class="flaticon-valet"><i class="fa fa-fw fa-smile-wink" style="color: #17a2b8"></i></span>
  </span>
  <div class="service-1-contents">
    <h3>Lebih baik</h3>
    <p>Berkembang menjadi studio music yang lebih baik dengan system rating di Studioku.</p>
    <p>Studioku juga membantu Anda dalam penjadwalan sewa.</p>
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
    <h2>Cara kerja</h2>
    <span class="title-line"><i class="fa fa-music" ></i></span>
    <p>Dibutuhkan beberapa menit untuk menjadi mitra kami !</p>
</div>
</div>
<!-- Section Title End -->

    <div class="row mt-5">
        <div class="col-lg-4">
        <div class="service-1">
            <span class="service-1-icon">
            <span class="flaticon-car-1" style="color: #17a2b8">1</span>
            </span>
            <div class="service-1-contents">
            <h4>Daftar Akun</h4>
            <p>Kemudian masuk ke halaman daftar studio dan lengkapi data studio Anda</p>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="service-1">
            <span class="service-1-icon">
            <span class="flaticon-traffic" style="color: #17a2b8">2</span>
            </span>
            <div class="service-1-contents">
            <h4>Unggah Studio</h4>
            <p>Harap login ke mitra center Anda dan unggah fasilitas studio Anda </p>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
        <div class="service-1">
            <span class="service-1-icon">
            <span class="flaticon-valet" style="color: #17a2b8">3</span>
            </span>
            <div class="service-1-contents ">
            <h4>Mulai Menyewakan Studio</h4>
            <p>Berproses bersama berkembang dengan Studioku </p>
            </div>
        </div>
        </div>
    </div>

<hr>
<!-- artikel -->
      <!-- Section Title Start -->
      <div class="site-section bg-light">
        <div class="container">
        <div class="col-lg-12 mb-4 mt-5">
            <div class="section-title  text-center mt-5">
                <h3>Apakah ada pertanyaan lain? </h3>
                <span class="title-line"><i class="fa fa-music" ></i></span>
                <p>Kunjungi Pusat Bantuan Studioku sekarang untuk informasi yang Anda perlukan</p>

            </div>
        </div>
        <!-- Section Title End -->

        <div class="row mb-5 justify-content-center pt-5">
          <div class="col-10">
            <div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header bg-info" id="headingOne">
        <h3 class="mb-0">
            <button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Sewa studio musik secara online di Studioku.com
            </button>
        </h3>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
        Teknologi berkembang dengan pesat dan banyak kemudahan yang didapatkan. Hal itu terlihat jelas saat ini platform online, dimana salah satunya adalah penyewaan online yang memberikan manfaat bagi orang yang menggunakannya. Semua kebutuhan yang diperlukan sekarang mudah untuk didapatkan hanya dengan smartphone atau laptop dan internet. Tidak hanya customer saja yang merasakan kemudahan dengan hadirnya platform penyewaan online ini, tetapi juga mereka yang memiliki usaha dan ingin menyewakan fasilitas studionya. Studioku.com sebagai e-commerce menawarkan kerjasama untuk Anda untuk bergabung menjadi mitra dengan berbagai keuntungan yang didapatkan.
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-info" id="headingTwo">
        <h3 class="mb-0">
            <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Peluang bisnis online yang mudah
            </button>
        </h3>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
            Mengamati perkembangan bisnis online sekarang terlihat sangat pesat yang membuka peluang untuk Anda yang sudah memiliki studio untuk mencoba menyewakannya secara online. Dengan menyewakannya secara online, hal ini sangat membantu Anda karena itu cara yang efektif. Studioku adalah salah satu wadah online yang berguna untuk Anda. Dengan dukungan pemasarannya akan membuat Anda lebih mudah untuk menyewakan dan menawarkan fasilitas studio yang Anda miliki. Segera manfaatkan peluang bisnis penyewaan online dan rasakan pengalaman menyewakan studio secara online lebih baik dengan bermitra dengan Studioku.com
        </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-info" id="headingThree">
        <h3 class="mb-0">
            <button class="btn btn-link collapsed text-light" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Mengapa menyewakan studio musik secara online di Studioku?
            </button>
        </h3>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
            Studioku sebagai platform penyewaan studio music menjalankan proses bisnis customer to customer. Studioku.com membantu dengan cara mewadahi semua perusahaan maupun perseorangan yang mempunyai studio music dapat memasarkan studio musiknya dengan efisien  yakni dengan menginputkan data studio musiknya di Studioku agar bisa diketahui oleh orang yang ingin menyewa studio music, meningkatkan pemesanan dan pendapatan Anda dan menjadikan bisnis Anda diluar jangkauan apa yang sebelumnya mungkin. Selanjutnya Studioku juga membantu mengatur jadwal studio. Kemudian untuk customer  yang ingin menyewa studio music bisa melihat dulu studio music yang bisa disewa pada waktu tertentu serta mengetahui semua informasi mengenai studio music tertentu, termasuk fasilitas dan kebijakan peralatan selama menyewa studio music.
        </div>
        </div>
    </div>
    </div>
            </div>
        </div>


    <!-- akhir artikel -->
</div>
      </div>
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
