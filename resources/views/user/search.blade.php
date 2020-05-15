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
                            <input type="text" name="kota" id="kota" class="form-control" placeholder="Kota">
                            {{-- <select name="kota" id="kota" placeHolder="Cari berdasarkan kota">
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
                            </script> --}}
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
                            <i class="fas fa-filter text-warning"></i><label class="ml-3">Katalog</label>
                        </div>
                        <form action="{{'searchKatalog'}}" method="GET" id="katalog">
                            <input type="hidden" name="kota" id="city" value="{{session()->get('kota')}}">
                            <div class="form-group ml-3">
                                <input type="radio" class="katalog" value="1" name="katalog" id="katalog1">
                                <i class="fas fa-building text-primary"></i><label class="ml-2 kota">Select all category</label>
                            </div>
                            <div class="form-group ml-3">
                                <input type="radio" class="katalog" value="Studio latihan" name="katalog" id="katalog2">
                                <i class="fas fa-guitar text-primary"></i><label class="ml-2 kota">Studio Latihan</label>
                            </div>
                            <div class="form-group ml-3">
                                <input type="radio" class="katalog" value="Studio rekaman" name="katalog" id="katalog3">
                                <i class="fas fa-microphone-alt text-primary"></i><label class="ml-2 kota">Studio Rekaman</label>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center mb-3">
                            <i class="fas fa-map-marked-alt text-warning"></i><label class="ml-3">Kota</label>
                        </div>
                        <form action="{{'searchKatalog'}}" method="GET" id="formKota">
                            <input type="hidden" name="katalog" id="kategori" value="{{session()->get('katalog')}}">
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" class="kota" value="surabaya" name="kota" id="kota1">
                            <label class="ml-2 kota">Surabaya</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" class="kota" value="jakarta" name="kota" id="kota2">
                            <label class="ml-2 kota">Jakarta</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" class="kota" value="yogyakarta" name="kota" id="kota3">
                            <label class="ml-2 kota">Yogyakarta</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" class="kota" value="bandung" name="kota" id="kota4">
                            <label class="ml-2 kota">Bandung</label>
                        </div>
                        <div class="form-group ml-3 justify-center">
                            <input type="radio" class="kota" value="bali" name="kota" id="kota5">
                            <label class="ml-2 kota">Bali</label>
                        </div>
                        </form>
                    </div>
                    <div class="col col-9">
                        <div class="row">
                        @if (count($data))
                    @foreach ($data as $item)
                    <div class="col col-sm-4 mr-3 sec">
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
                    <div class="alert alert-danger alert-block mr-3">
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
        // $('.katalog').on('click',function(){
        //     var nama = $(this).val();
        //             // event.preventDefault();
        //             $.ajax({
        //                 url:"katalog",
        //                 type:"POST",
        //                 data:{nama:nama},
        //                 success:function (data) {
        //                     console.log("success");
        //                     console.log(data);

        //                 }
        //             })
        //             // end of ajax call
        // });

        $(".katalog").on('click',function(){
            $('#katalog').submit();
            var a = $(this).val();
            console.log(a);
        });

        $(".kota").on('click',function(){
            $('#formKota').submit();
            var a = $(this).val();
            console.log(a);
        });

        var katalog = $("#kategori").val();
        var kota = $("#city").val();
        console.log(kota);
        console.log(katalog);

    if(katalog=="Studio latihan"){
        $("#katalog2").prop('checked', true);
    }else if(katalog=="Studio rekaman"){
        $("#katalog3").prop('checked', true);
    }else{
        $("#katalog1").prop('checked', true);
    }

    if(kota=="surabaya"){
        $("#kota1").prop('checked', true);
    }else if(kota=="jakarta"){
        $("#kota2").prop('checked', true);
    }else if(kota=="yogyakarta"){
        $("#kota3").prop('checked', true);
    }else if(kota=="bandung"){
        $("#kota4").prop('checked', true);
    }else if(kota=="bali"){
        $("#kota5").prop('checked', true);
    }


    })
</script>









@endsection
