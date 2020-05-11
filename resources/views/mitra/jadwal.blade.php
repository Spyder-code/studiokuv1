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

    <div id="evoCalendar" class="mt-5"></div>

    <script>
        $(function(){
        //     myEvents = [
        // { name: "New Year", date: "Wed Jan 01 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
        // { name: "Valentine's Day", date: "Fri Feb 14 2020 00:00:00 GMT-0800 (Pacific Standard Time)", type: "holiday", everyYear: true },
        // { name: "Birthday", date: "February/3/2020", type: "birthday" },
        // { name: "Author's Birthday", date: "February/15/2020", type: "birthday", everyYear: true },
        // { name: "Holiday", date: "February/15/2020", type: "event" },
        // {name:"yo wes band, 07.00-08.00", date:"May/03/2020 07:00:00 GMT-0800 (Pacific Standard Time)", type:"birthday"},
        // {name:"yo wes, 07.00-08.00", date:"May/03/2020 07:00:00 GMT-0800 (Pacific Standard Time)", type:"birthday"},
        // {name:"yo, 07.00-08.00", date:"May/03/2020 07:00:00 GMT-0800 (Pacific Standard Time)", type:"birthday"},
        // ],

        var request = $.get('/data');
        request.done(function(response) {
            console.log(response[0].kode);

            myEvents = [
        { name: response[0].nama_band, date: response[0].tanggal_main, type: "birthday"},
        ],

        $('#evoCalendar').evoCalendar({
        calendarEvents: myEvents,
        format: 'mm/dd/yyyy',
        titleFormat: 'MM yyyy',
        eventHeaderFormat: 'MM d, yyyy'
        });

        $('#evoCalendar').on('selectEvent', function() {
            console.log("ok");
        });

        $('#evoCalendar').on('selectDate', function() {

        });
        });

        })
    </script>

</div>
@endsection
