<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- font awesome -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('js/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('css/selectize.css')}}">

    <!-- my css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mdb.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mdb.lite.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}">
    <link href="{{asset('css/mdtimepicker.css')}}" rel="stylesheet">
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/standalone/selectize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/mdtimepicker.js')}}" type="text/javascript"></script>



    <title>Studioku</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-light">
      <div class="container">
        <img src="{{asset('image/Studioku.png')}}" class="rounded-circle mr-sm-2" style="width: 50px; height: 50px; color:white">
        <a class="navbar-brand text-dark" href="/mitra">Mitra Studioku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav ml-auto">
            <a class="text-secondary mr-2 tombol font-weight-normal" href="{{url('/mitra')}}">Home</a>
        </div>
        <div class="navbar-nav ml-auto">
            <a class="text-secondary mr-5 tombol font-weight-normal" href="{{url('/')}}">Cari Studio</a>
        </div>
            <div class="navbar-nav ml-auto">
                <a class="btn btn-outline-primary text-secondary mr-1 tombol font-weight-normal" href="{{url('mitra/registrasi')}}">Registrasi</a>
            </div>
            <div class="navbar-nav">
                <a class="btn btn-outline-primary text-secondary mr-3 tombol font-weight-normal" href="{{url('mitra/login')}}">Login</a>
            </div>
            {{-- <span class="mr-2 d-none d-lg-inline text-light-600" data-toggle="modal" data-target="#modalLRForm" style="color:white">Login</span> --}}
        </div>
      </div>
    </nav>

    @yield('main')

    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">Tentang Kami</h2>
              <h2><img src="{{asset('image/Studioku.png')}}" class="rounded-circle mr-sm-2" style="width: 79px; height: 70px;">Studioku</h2>
                  <p>Kami menyediakan berbagai fitur untuk mempermudah para musisi saat ingin memesan studio musik dan membantu para pemilik studio untuk memasarkan studionya</p>
            </div>
            <div class="col-lg-8 ml-auto">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Quick Links</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Kota</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">Surabaya</a></li>
                    <li><a href="#">Jakarta</a></li>
                    <li><a href="#">Yogyakarta</a></li>
                    <li><a href="#">Bali</a></li>
                    <li><a href="#">Bandung</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Jenis Studio</h2>
                  <ul class="list-unstyled">
                    <li><a href="#">Ruang latihan</a></li>
                    <li><a href="#">Ruang podcastm</a></li>
                    <li><a href="#">Studio kecil</a></li>
                    <li><a href="#">Studio menengah</a></li>
                    <li><a href="#">Studio premium</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Quick Links</h2>
                  <ul class="list-unstyled">
                    <li><a href="#"><i class="fab fa-facebook-square"></i>    Facebook</a></li>
                    <li><a href="#"><i class="fab fa-instagram-square"></i>   Instagram</a></li>
                    <li><a href="#"><i class="fab fa-twitter-square"></i>    Twitter</a></li>
                    <li><a href="#"><i class="fab fa-whatsapp-square"></i>    0898-8767-988</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <div class="border-top pt-5">
                <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Studioku</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
              </div>
            </div>

          </div>
        </div>
      </footer>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  </body>
</html>
