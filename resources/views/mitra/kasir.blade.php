@extends('layouts/mitra')
@section('kasir','active')
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

    <div class="row">
        <div class="col">
            <h1 class="text-center mt-2">{{date('d M Y')}}</h1>
            <hr>
            <form action="{{url('kode')}}" method="POST" id="formKode">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col col-8">
                            <h4 for="Kode pembayaran">Kode pembayaran</h4>
                            <input type="text" autofocus name="kode" id="kode" class="form-control text-center" style="text-transform: uppercase;">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success d-inline mt-4">Submit</button>
                        </div>
                    </div>
                    <hr>
                </div>
            </form>
        </div>
    </div>

    <h1 id="result" class="text-center"></h1>

    <div id="nota">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">Booking</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-5">
                                        <label for="address">Nama band</label>
                                    </div>
                                    <div class="col col-2">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col col-5">
                                        <div id="namaBand"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-5">
                                        <label for="address">Tanggal main</label>
                                    </div>
                                    <div class="col col-2">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col col-5">
                                        <div id="tgl"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-5">
                                        <label for="address">Waktu main</label>
                                    </div>
                                    <div class="col col-2">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col col-5">
                                        <div id="awal"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-5">
                                        <label for="address">waktu selesai</label>
                                    </div>
                                    <div class="col col-2">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col col-5">
                                        <div id="akhir"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col col-5">
                                        <label for="address">Harga</label>
                                    </div>
                                    <div class="col col-2">
                                        <label for="">:</label>
                                    </div>
                                    <div class="col col-5">
                                        <div class="harga"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col" id="kasir">
                <form action="{{url('pembayaranKode')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="idPemesanan">
                    <input type="hidden" name="harga" id="hargaBooking">
                    <div class="row">
                        <div class="col">
                            <h3 class="text-center">Total biaya: <div class="harga"></div></h3>
                            <hr>
                            <label for="uang">Jumlah uang</label>
                            <input type="text" name="uang" id="uang" data-a-sign="Rp. " data-a-dec="," data-a-sep="." class="form-control">
                            <label for="kembalian">Kembalian</label>
                            <p id="kembalian"></p>
                            <hr>
                            <button type="submit" class="btn btn-success">Bayar</button>
                        </div>
                    </div>
                </form>
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
        $("#nota").hide();
        $('#formKode').submit(function(event) {
        event.preventDefault();
        var kode = $('#kode').val();
        $.ajax({
            url:"kode",
            type:"POST",
            data:{kode:kode},
            success:function (data) {
                if(data=="Transaksi sudah dibayar" || data=="Kode salah" ){
                    $("#result").html(data);
                }else{
                $("#nota").show();
                    $("#uang").keyup(function(e){
                        $(this).val(format($(this).val()));
                        var uang = $(this).val();
                        var newValue = uang.replace(',', '');
                        var a = parseInt(newValue);
                        $("#kembalian").html("Rp. "+format(a - data[0].harga));
                    });

                    var bilangan = data[0].harga;
                    var	reverse = bilangan.toString().split('').reverse().join(''),
                        ribuan 	= reverse.match(/\d{1,3}/g);
                        ribuan	= ribuan.join('.').split('').reverse().join('');

                $("#namaBand").html(data[0].nama_band);
                $("#tgl").html(data[0].tanggal_main);
                $("#awal").html(data[0].waktu_main);
                $("#akhir").html(data[0].waktu_selesai);
                $(".harga").html("Rp."+ribuan);
                $("#idPemesanan").val(data[0].id);
                $("#hargaBooking").val("Rp."+ribuan);

                var format = function(num){
                var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
                if(str.indexOf(".") > 0) {
                    parts = str.split(".");
                    str = parts[0];
                }
                str = str.split("").reverse();
                for(var j = 0, len = str.length; j < len; j++) {
                    if(str[j] != ",") {
                    output.push(str[j]);
                    if(i%3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                    }
                }
                formatted = output.reverse().join("");
                return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
                };
                }

                console.log(data);
            }
        })
        // end of ajax call
    });
    });
</script>
@endsection
