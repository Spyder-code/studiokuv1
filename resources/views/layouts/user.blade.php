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

    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
      <div class="container">
        <img src="{{asset('image/Studioku.png')}}" class="rounded-circle mr-sm-2" style="width: 50px; height: 50px; color:white">
        <a class="navbar-brand" href="{{url('/')}}">Studioku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            @if (Auth::check())
            <ul class="navbar-nav ml-auto float-right">
                <!-- Nav Item - User Information -->
                <li class="nav-item mt-4">
                    <a href="{{url('notifikasi')}}" style="width:200px; color:white; font-size:18px"><i class="fas fa-bell mr-3"></i><span class="badge badge-light">@yield('notif')</span> Notifikasi |</a>
                    {{-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Action</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div> --}}
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-light-600">{{Auth::user()->name}}</span>
                    <img class="img-profile rounded-circle mr-2" src="{{asset('image/'.Auth::user()->image)}}" style="width: 60px; height: 60px; ">
                    </a>
                <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{url('account')}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Account
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                    </div>
                </li>
            </ul>
            @else
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="navbar-nav ml-auto">
                <a class="btn btn btn-outline-info text-light mr-3 tombol font-weight-normal" href="{{url('mitra')}}">Mitra Studio</a>
                <a class="btn btn btn-outline-info text-light mr-3 tombol font-weight-normal" data-toggle="modal" data-target="#modalLRForm" href="#">login</a>
                {{-- <img class="img-profile rounded-circle mr-1" data-toggle="modal" data-target="#modalLRForm" href="#" src="{{asset('image/default.jpg')}}" style="width: 60px; height: 60px; "> --}}
            </div>
            </div>
            @endif
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
                    <form action="{{ route('login') }}" method="post">
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
                <form action="{{ route('register') }}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-user prefix"></i>
                        <input type="text" placeholder="Name" id="modalLRInput12" class="form-control form-control-sm validate" name="name">
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

    <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>

        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  </body>
</html>
