$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    let player2 = document.getElementById("player2").innerHTML;

    if(player2 !== null){
        
        var checker = setInterval(function() {
            let player2 = document.getElementById("player2").innerHTML;
                $.ajax({
                url: $(this).data('url'),
                success:function(data)
                {
                $('#waiter').html(data);
                    if(player2 != ''){
                    clearInterval(checker);
                    let battleCode= document.getElementById("code").innerHTML; 
                    window.location.replace('/battle/sequence/'+battleCode);
                    }
                }
            });
            
        }, 2500);
    }
});
        