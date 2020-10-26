@extends('layouts.app')

@section('content')
<span class="return">
    <a href="/home">Go Back</a>
</span>

<div class="container">
    <div class="row align-items-center">
        <div class="col-12 text-center">
            <h2 style="color:snow;">Are you.....prepared?</h2>
        </div>
    </div>
    
    <div class="row align-items-center formation-total">
        <div class="col-md-2 text-center formation-section">
            <p class="mobile-header">support and firing range</p>
            @foreach ($outfit_overview as $unit)
                @if ($unit->position==3)
                <p class="formation-unit">{{$unit->name}}</p>
                @endif
            @endforeach
        </div>
        <div class="col-md-2 text-center formation-section">
            <p class="mobile-header">Army Center</p>
            @foreach ($outfit_overview as $unit)
            @if ($unit->position==2)
            <p class="formation-unit">{{$unit->name}}</p>
            @endif
        @endforeach
        </div>
        <div class="col-md-2 text-center formation-section">
            <p class="mobile-header">Front Guards</p>
            @foreach ($outfit_overview as $unit)
            @if ($unit->position==1)
            <p class="formation-unit">{{$unit->name}}</p>
            @endif
        @endforeach
        </div>
        <div class="col-md-6 text-center" style="border-left: 1px solid snow;">
            <form method="POST" action="{{ action('BattlesController@create_or_update') }}">
                {{ csrf_field() }}
            <button type="submit" class="btn" id="btl-btn">To battle!</button>
            </form>
        </div>
    </div>
</div>

@endsection
