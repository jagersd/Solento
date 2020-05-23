<div class="container-flex">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 waitingroom" id="waitingroom">
            {{auth::user()->name}}, you are on the lookout for an opponant.
            
            {{$battle_details->player1}}
    
            {{$battle_details->player2}}
        </div>
    </div>
</div>
