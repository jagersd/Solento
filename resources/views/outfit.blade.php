@extends('layouts.app')

@section('content')
<a href="/home"><--- Go Back</a>
<div class="container">
    @foreach ($units as $unit)
    <div class="card">
        <div class="card-header">{{$unit->name}} <button type="button" class="btn btn-info">Change unit name</button> </div>

        <p>Unit: {{$unit->base_details->name}}</p>
        <ul>
            <li>Base hp: {{$unit->base_details->hp}} // Current hp: {{$unit->current_hp}}</li>
            <li>Strenth: {{$unit->base_details->strength}}</li>
            <li>Armor: {{$unit->base_details->armor}}</li>
            <li>Intellect: {{$unit->base_details->intellect}}</li>
            <li>Speed: {{$unit->base_details->speed}}</li>
        </ul>


    </div>    
    @endforeach
</div>











@endsection
