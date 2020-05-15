@extends('layouts/mitra')
@section('kasir','active')
@section('img',$image)
@section('main')
<div id="print">
    <div class="container">
        <div class="row">
            <div class="col col-sm-12">
                <div class="card mt-5 mr-5 ml-5">
                    @foreach ($data as $item)
                    <div class="card-header">{{$item->namaRuangan}}</div>
                    <div class="card-body">
                        <pre>Nama band     : {{$item->nama_band}}</pre>
                        <pre>Tanggal main  : {{$item->tanggal_main}}</pre>
                        <pre>Waktu mulai   : {{$item->waktu_main}}</pre>
                        <pre>Waktu selesai : {{$item->waktu_selesai}}</pre>
                        <hr>
                        <pre class="ml-5">Total biaya     : {{$item->harga}}</pre>
                        <pre class="ml-5">Uang            : {{$item->uang}}</pre>
                        <hr style="width:70%;" class="text-left">
                        <pre class="ml-5">Kembalian       : {{$item->kembalian}}</pre>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <button class="btn btn-grey mt-4" onclick="printDiv('print')">Print</button>
        </div>
    </div>
</div>

<script>
function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}

</script>

@endsection
