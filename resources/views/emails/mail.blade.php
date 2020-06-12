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

    <!-- my css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/mdb.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mdb.lite.css')}}">
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>




    <title>Forgot Passwod</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>Forgot password Account studioku.spydercode.site</h1>
                <hr>
                <h3>Dear {{$customer_details['nama']}}</h3>
                <br>
                <p>Silahkan klik link berikut untuk mengubah password anda!</p>
                <br>
                <a href="{{url('forgotPassword/'.$customer_details['password'])}}" class="btn btn-primary">{{url('forgotPassword/'.$customer_details['password'])}}</a>
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
