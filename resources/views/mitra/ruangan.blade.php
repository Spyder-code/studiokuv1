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

<div class="container">
    <div class="row">
        <div class="col">
    <a href="{{url('studio')}}" class="btn btn-primary d-inline"><i class="fas fa-undo mr-3 prefix"></i>Kembali ke studio</a>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAbandonedCart"><i class="fas fa-plus mr-3 prefix"></i>Tambah ruangan</button>
        </div>
    </div>
</div>


    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
            <p class="heading">Data ruangan</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
            </div>

            <!--Body-->
            <div class="modal-body">

            <div class="row">
                <div class="col-12">
                <form action="{{url('addRuangan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="idStudio" value="{{$id}}">
                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-building prefix"></i>
                        <input type="text" id="modalLRInput10" placeholder="Nama ruangan" name="nama" class="form-control form-control-sm validate">
                    </div>

                    <div class="md-form form-sm mb-5">
                        <select class="browser-default custom-select" name="kategori">
                            <option selected disabled>Kategori studio</option>
                            <option value="Studio rekaman">Studio rekaman</option>
                            <option value="Studio latihan">Studio latihan</option>
                        </select>
                    </div>

                    <div class="md-form form-sm mb-5">
                        <i class="fas fa-coins prefix"></i>
                        <input type="text" id="modalLRInput10" placeholder="Rp. " name="harga" class="form-control form-control-sm validate">
                    </div>

                    <div class="md-form">
                        <i class="fas fa-clipboard-list prefix"></i>
                        <textarea id="form10" class="md-textarea form-control" placeholder="Fasilitas" rows="3" name="fasilitas"></textarea>
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
            @foreach ($ruangan as $item)
            <div class="col col-sm-5 mb-5">
                <div class="card ml-5">
                    <img class="img-thumbnail mt-3" src="{{ asset('image/'.$nama.'/'.$item->image) }}" style="height:260px" alt="{{$item->nama}}">
                    <div class="card-body">
                        <h1 class="card-title text-center">{{$item->nama}}</h1>
                    </div>
                </div>
            </div>
            <div class="col col-sm-7">
                <ul class="list-group text-left">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <label for="address">Studio</label>
                            </div>
                            <div class="col">
                                <label for="">:</label>
                            </div>
                            <div class="col">
                                {{$namaStudio}}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <label for="address">Kategori</label>
                            </div>
                            <div class="col">
                                <label for="">:</label>
                            </div>
                            <div class="col">
                                {{$item->kategori}}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <label for="address">Fasilitas</label>
                            </div>
                            <div class="col">
                                <label for="">:</label>
                            </div>
                            <div class="col">
                                {{$item->fasilitas}}
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <label for="address">Harga/jam</label>
                            </div>
                            <div class="col">
                                <label for="">:</label>
                            </div>
                            <div class="col">
                                Rp. {{$item->harga}}
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col">
                                <a data-toggle="modal" data-target="#ubah-{{$item->id}}" class="btn btn-primary">Ubah</a>
                        </div>
                        <div class="col">
                            <form action="{{url('hapusRuang')}}" method="post">
                                @csrf
                                <input type="hidden" name="idRuang" value="{{$item->id}}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal nomor --}}
            <div class="modal fade" id="ubah-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Data {{$item->nama}}</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-row"  method="post" action="{{url('updateRuang')}}">
                                <input type="hidden" name="idRuang" value="{{$item->id}}">
                                @csrf
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" value="{{$item->nama}}">
                                    </div>
                                    <div class="form-group">
                                        <select type="text" class="form-control" name="kategori">
                                            <option value="Studio latihan">Studio latihan</option>
                                            <option value="Studio rekaman">Studio rekaman</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fasilitas" value="{{$item->fasilitas}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="harga" value="{{$item->harga}}">
                                    </div>
                                </div>
                        </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Ganti</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col text-center">
                {{ $ruangan->links() }}
            </div>
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
