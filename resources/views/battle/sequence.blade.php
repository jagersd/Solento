@extends('layouts.battle_layout')

@section('content')
<?php include '../resources/logic/sequencecalc.php' ; ?>

<div class="container-fluid sequence-intro">
    <div class="row flex-column flex-md-row">
        <div class="col-5 text-center player-intro">
            <h1>{{$username1}}</h1>
            <br><br>
            <div class="frontline"><h3>Front line:</h3>
                @foreach ($outfit1 as $unit)
                @if($unit->position == 1) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
            <div class="frontline"><h3>Center line:</h3>
                @foreach ($outfit1 as $unit)
                @if($unit->position == 2) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                
            </div>
            <div class="frontline"><h3>Firing range and support:</h3>
                @foreach ($outfit1 as $unit)
                @if($unit->position == 3) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                
            </div>
        </div>
        <div class="col-2 text-center vsdevider">
            VS
        </div>
        <div class="col-5 text-center player-intro">
            <h1>{{$username2}}</h1>
            <br><br>
            <div class="frontline"><h3>Front line:</h3>
                @foreach ($outfit2 as $unit)
                @if($unit->position == 1) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
            <div class="frontline"><h3>Center line:</h3>
                @foreach ($outfit2 as $unit)
                @if($unit->position == 2) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
            <div class="frontline"><h3>Firing range and support:</h3>
                @foreach ($outfit2 as $unit)
                @if($unit->position == 3) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection