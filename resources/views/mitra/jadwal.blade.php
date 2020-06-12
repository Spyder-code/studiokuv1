@extends('layouts/mitra')
@section('jadwal','active')
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

    <div class="container mt-5 mb-4">
        <div class="row text-center">
            <div class="col-sm">
                <div class="form-group">
                    <h5 for="tanggal">Cari berdasarkan Tanggal</h5>
                    <input type="text" class="form-control text-center d-inline search" name="tanggal" id="datepicker">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
<div class="table-responsive">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Ruangan</th>
            <th scope="col">Nama band</th>
            <th scope="col">Tanggal main</th>
            <th scope="col">Waktu main</th>
            <th scope="col">Waktu selesai</th>
          </tr>
        </thead>
        <tbody>
         <div id="ta">
            @foreach ($data as $item)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$item->namaRuangan}}</td>
              <td>{{$item->nama_band}}</td>
              <td>{{$item->tanggal_main}}</td>
              <td>{{$item->waktu_main}}</td>
              <td>{{$item->waktu_selesai}}</td>
            </tr>
            @endforeach
         </div>
        </tbody>
      </table>
</div>

    <script>
            $( "#datepicker" ).datepicker({
                dateFormat: "dd MM yy",
                onSelect: function() {
                    $value=$(this).val();
                    $.ajax({
                    type : 'get',
                    url : '{{url('searchJadwal')}}',
                    data:{'search':$value},
                    success:function(data){
                        $('#ta').remove();
                        $('tbody').html(data);
                        console.log("success");
                }
                });
                }
                });
    </script>

</div>
@endsection
