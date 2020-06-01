@extends('layouts.battle_layout')

@section('content')

<div id="waiter">
    <div id="player2">{{$battle_details->player2}}</div>
    <div style="visibility:hidden;" id="code">{{$battle_details->battlecode}}</div>
    <script src="{{ asset('js/waitingroom.js') }}"></script>
    <div class="container-flex">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 waitingroom" id="waitingroom">
                <div class="waitingroomtext">{{auth::user()->name}}, you are on the lookout for an opponant.<br>
                
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>

                </div>   
            </div>
        </div>
    </div>
</div>
@endsection
