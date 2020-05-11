$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function(){
    $('#form').submit(function(event) {
        event.preventDefault();
        var nama = $('#nama').val();
        $.ajax({
            url:"search",
            type:"POST",
            data:{nama:nama},
            success:function (data) {
                console.log("success");
                console.log(data);
                $('#nama').val("");
                $('#japan').html(data);
            }
        })
        // end of ajax call
    });

});
