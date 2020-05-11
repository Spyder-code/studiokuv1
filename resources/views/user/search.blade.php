@extends('layouts/user')
@section('main')

    <div class="container-fluid">
        <div class="row" >
            <div class="col col-12">
                <div class="card mt-5 mr-5 ml-5 mb-5">
                    <form action="{{'search'}}" method="GET">
                        @csrf
                    <div class="row ml-3 mr-3 mt-3 mb-3">
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
                <hr>
                <div class="row">
                    <div class="col col-3 border-right">
                        <div class="text-center mb-3">
                            <i class="fas fa-filter text-warning"></i><label class="ml-2">Katalog</label>
                        </div>
                        <form id="katalog">
                            <div class="form-group ml-3">
                                <input type="radio" class="katalog" value="1" name="all" id="all">
                                <i class="fas fa-building text-primary" style=" font-size:30px"></i><label class="ml-2">Select all studio</label>
                            </div>
                            <div class="form-group ml-3">
                                <input type="radio" class="katalog" value="studio latihan" name="all" id="all">
                                <i class="fas fa-guitar text-primary" style=" font-size:30px"></i><label class="ml-2">Studio Latihan</label>
                            </div>
                            <div class="form-group ml-3">
                                <input type="radio" class="katalog" value="studio rekaman" name="all" id="all">
                                <i class="fas fa-microphone-alt text-primary" style=" font-size:30px"></i><label class="ml-2">Studio Rekaman</label>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center mb-3">
                            <i class="fas fa-map-marked-alt text-warning"></i><label class="ml-2">Kota</label>
                        </div>

                        <div class="form-group ml-3 justify-center">
                            <input type="radio" name="all" id="all">
                            <label class="ml-2">Surabaya</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" name="all" id="all">
                            <label class="ml-2">Jakarta</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" name="all" id="all">
                            <label class="ml-2">Yogyakarta</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" name="all" id="all">
                            <label class="ml-2">Bandung</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" name="all" id="all">
                            <label class="ml-2">Bali</label>
                        </div>

                    </div>
                    <div class="col col-9">
                        <div class="row">
                        @if (count($data))
                    @foreach ($data as $item)
                    <div class="col col-4">
                        <div class="card ml-3 mb-3">
                            <img src="{{ asset('image/'.$item->nama_mitra.'/'.$item->image) }}" class="img-thumbnail" style="height:200px;">
                            <div class="card-body">
                                <div><span class="badge badge-warning">Medium </span><small class="ml-2"> {{$item->kategori}}</small></div>
                                <h5 class="card-title mt-2">{{$item->nama_studio}}</h5>
                                <div class="place_review">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <span>(210 review)</span>
                                </div>
                                <p class="card-text font-weight-bold mt-2">Rp. {{number_format($item->harga,2,',','.')}} <small>per jam</small></p>
                                <a href="{{url('studio/'.$item->id)}}" class="btn btn-secondary btn-sm">Booking studio</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                <div class="col mt-3">
                    <div class="alert alert-danger alert-block">
                        <strong>Pencarian tidak ditemukan!</strong>
                    </div>
                </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(function(){
        $('.katalog').on('click',function(){
            var nama = $(this).val();
                    // event.preventDefault();
                    $.ajax({
                        url:"katalog",
                        type:"POST",
                        data:{nama:nama},
                        success:function (data) {
                            console.log("success");
                            console.log(data);

                        }
                    })
                    // end of ajax call
        });


    })
</script>









@endsection
