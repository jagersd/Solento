@extends('layouts.app')

@section('content')

<a href="/home"><--- Go back home</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Well done!</h1>
            <h4>Now lets have a look at the spoils</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <p>You have laid claim to <b>{{$battle_result->awarded_gold}}</b> gold!</p>
    </div>
    @if ($won_unit)
    <div class="row justify-content-center">
        <p>Great news, a <b> {{$won_unit->name}} </b> has joined your outfit after hearing about your victory</p>
    </div>    
    @endif
    @if ($won_item)
    <div class="row justify-content-center">
        <p>One of your units have found <b> {{$won_item->item_name}} </b> on its way back to the town's tavern. It now resides in your unequipped item stash.</p> 
    </div>    
    @endif
</div>


@endsection
