$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function(){
    // $('#result').hide();
    // $('#cari').on('click',function(){
    //     var kota = $('#pencarian').val();
    //     var jenis = $('#jenis').val();
    //     event.preventDefault();
    //     var kota = $('#penacarian').val();
    //     var jenis = $('#jenis').val();
    //     $.ajax({
    //         url:"searchStudio",
    //         type:"post",
    //         data:{kota:kota,jenis:jenis},
    //         success:function (data) {
    //             $('#layanan').hide();
    //             $('#result').show();
    //             // $('#header').html('<h1>'+data[0].address+'</h1>')
    //             $('#hasil').html(data);

    //         }
    //     })

    // });

});
