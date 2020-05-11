@extends('layouts/user')
@section('main')


    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{asset('image/studiorekaman.jpg')}});">
        <div class="container">
          <h6 class="display-4">Temukan studio musik <br> yang ingin kamu kunjungi</h6>
        </div>
      </div>

    <!-- akhir jumbotron -->

<div class="container">

       <!-- form pencarian -->
       <div class="row justify-content-center">
        <div class="col-lg-10 form-pencarian">
        <form action="{{'search'}}" method="get">
            @csrf
        <div class="row">
            <div class="col-lg">
                <label for="pencarian">Kota Studio</label>
                <select name="kota" id="kota" placeHolder="Cari berdasarkan kota">
                    <option value="">Select a state...</option>
                    @foreach ($studio as $item)
                        <option value="{{$item->kota}}">{{$item->kota}}</option>
                    @endforeach
                </select>
                <script>
                    $(function(){
                        $('#kota').selectize({
                            sortField: 'text'
                        });
                    });
                </script>
            </div>
            <div class="col-lg-3">
                <label for="exampleFormControlSelect1">Jenis Studio</label>
                <select class="form-control" id="jenis" name="jenis">
                    <option value="Studio latihan">Studio Latihan</option>
                    <option value="Studio rekaman">Studio Rekaman</option>
                </select>
            </div>
            <div class="col col-lg-2 mt-3">
                <button type="submit" class="btn btn-info font-weight-bolder tombol-pencarian " href="#">CARI</i></button>
            </div>
        </form>
            </div>
            </div>


    <!-- akhir form pencarian -->

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




@endsection
