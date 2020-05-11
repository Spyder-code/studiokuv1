@extends('layouts/mitra')
@section('studio','active')
@section('img',$image)
@section('main')
<div class="container">
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
    @if ($message = Session::get('danger'))
        <div class="row">
            <div class="col mt-3">
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        </div>
    @endif

        <!-- Button trigger modal-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbandonedCart"><i class="fas fa-plus mr-3 prefix"></i>Tambah studio</button>

    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
            <p class="heading">Data studio</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
            </div>

            <!--Body-->
            <div class="modal-body">

            <div class="row">
                <div class="col-12">
                <form action="{{url('addStudio')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-building prefix"></i>
                        <input type="text" id="modalLRInput10" placeholder="Company name" name="nama" class="form-control form-control-sm validate">
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-map-marked-alt prefix"></i>
                        <input type="text" id="modalLRInput10" placeholder="Address" name="alamat" class="form-control form-control-sm validate">
                    </div>

                    <div class="md-form form-sm mb-3">
                        <i class="fas fa-phone prefix"></i>
                        <input type="text" id="modalLRInput10" placeholder="phone" name="phone" class="form-control form-control-sm validate">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="md-form form-sm mb-3">
                                <i class="fas fa-clock prefix"></i>
                                <input type="text" id="timepicker" placeholder="Open" name="open" class="form-control form-control-sm validate">
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form form-sm mb-3">
                                <i class="fas fa-clock prefix"></i>
                                <input type="text" id="closeTime" placeholder="Closed" name="closed" class="form-control form-control-sm validate">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="provinsi">Provinsi</label>
                            <div class="form-sm">
                                <select name="provinsi" id="provinsi" placeHolder="Provinsi">
                                    <option value="">Select a state...</option>
                                    @foreach ($provinsi as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label for="kota">Kabupaten/Kota</label>
                            <div class="form-sm">
                                <select name="kota" class="form-control" id="kota" style="border-radius:4px;">
                                    <option value="" disabled selected>Kabupaten/Kota</option>
                                </select>
                            </div>
                            <script>
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $(document).ready(function () {
                                    $('#provinsi').selectize({
                                    sortField: 'text'
                                    });
                                    $('#provinsi').change(function(){
                                        var id = $(this).val();
                                            $.ajax({
                                                url:"{{url('provinsi')}}",
                                                type:"POST",
                                                data:{idProvinsi:id},
                                                success:function (data) {
                                                    $('#kota').html(data);
                                                }
                                            })
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <hr>


                    <div class="md-form">
                        <i class="fas fa-pencil-alt prefix"></i>
                        <textarea id="form10" class="md-textarea form-control" placeholder="Information" rows="3" name="informasi"></textarea>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                            </div>
                            <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" name="image" id="inputGroupFile01" onchange="loadFile(event)" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                    </div>

                    <img id="output" class="img-thumbnail mt-3" />
                    <script>
                    var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                        }
                    };
                    </script>


                </div>
            </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success">Save</button>
        </form>
            <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
            </div>
        </div>
        <!--/.Content-->
        </div>
    </div>
    <!-- Modal: modalAbandonedCart-->
    <hr>
    <div class="container">
        <div class="row">
            @foreach ($studio as $item)
            <div class="col">
                <div class="card mt-3 ml-5">
                    <img class="img-thumbnail ml-5 mr-5 mt-3" src="{{ asset('image/'.$nama.'/'.$item->image) }}" style="height:260px" alt="{{$item->name}}">
                    <div class="card-body">
                        <h1 class="card-title text-center">{{$item->name}}</h1>
                        <ul class="list-group text-left">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col">
                                        {{$item->address}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <label for="address">Phone</label>
                                    </div>
                                    <div class="col">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col">
                                        {{$item->phone}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <label for="address">Time</label>
                                    </div>
                                    <div class="col">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col">
                                        {{$item->open}} - {{$item->closed}}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <label for="address">Description</label>
                                    </div>
                                    <div class="col">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col">
                                        {{$item->description}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{'ruangan/'.$item->id}}" method="get">
                            @csrf
                            <input type="hidden" name="idStudio" value="{{$item->id}}">
                            <button type="submit" class="btn btn-outline-primary">Lihat Studio</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        $(function(){
            $('#timepicker').mdtimepicker({

            // format of the time value (data-time attribute)
            timeFormat: 'hh:mm:ss.000',

            // format of the input value
            format: 'hh:mm:ss',

            // theme of the timepicker
            // 'red', 'purple', 'indigo', 'teal', 'green'
            theme: 'blue',

            // determines if input is readonly
            readOnly: true,

            // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
            hourPadding: false

            });
            $('#closeTime').mdtimepicker({

            // format of the time value (data-time attribute)
            timeFormat: 'hh:mm:ss.000',

            // format of the input value
            format: 'hh:mm:ss',

            // theme of the timepicker
            // 'red', 'purple', 'indigo', 'teal', 'green'
            theme: 'blue',

            // determines if input is readonly
            readOnly: true,

            // determines if display value has zero padding for hour value less than 10 (i.e. 05:30 PM); 24-hour format has padding by default
            hourPadding: false

            });

        });
    </script>
@endsection
