$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    setInterval(function() {
        $.ajax({
        url: $(this).data('url'),
        
        success:function(data)
        {
        $('#waiter').html(data);
        }
        });
    }, 1000);
});