@extends('layouts.battle_layout')

@section('content')

<!-- Player Introduction -->
<div class="container-fluid sequence-intro">
    <div class="row flex-column flex-md-row">
        <div class="col-5 text-center player-intro">
            <h1>{{$username1}}</h1>
            <br><br>
            <div class="position"><h3>Front line:</h3>
                @foreach ($outfit1 as $unit)
                @if($unit->position == 1) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
            <div class="position"><h3>Center line:</h3>
                @foreach ($outfit1 as $unit)
                @if($unit->position == 2) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                
            </div>
            <div class="position"><h3>Firing range and support:</h3>
                @foreach ($outfit1 as $unit)
                @if($unit->position == 3) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                
            </div>
        </div>
        <div class="col-2 text-center vsdevider">
            VS (player-intro)
        </div>
        <div class="col-5 text-center player-intro">
            <h1>{{$username2}}</h1>
            <br><br>
            <div class="position"><h3>Front line:</h3>
                @foreach ($outfit2 as $unit)
                @if($unit->position == 1) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
            <div class="position"><h3>Center line:</h3>
                @foreach ($outfit2 as $unit)
                @if($unit->position == 2) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
            <div class="position"><h3>Firing range and support:</h3>
                @foreach ($outfit2 as $unit)
                @if($unit->position == 3) <p>Name: {{$unit->name}} / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
            </div>
        </div>
    </div>
</div>
<hr>
<!-- Formation calculation -->
<div class="container-fluid sequence-intro">
    <div class="row flex-column flex-md-row">
        <div class="col-5 text-center formation-match">
            <div class="position"><h3>Front line:</h3>
            @foreach ($outfit1_calc->front_line as $stat_name=>$stat_value)
                <p>{{$stat_name}} : {{$stat_value}}</p>
            @endforeach
            </div>
            <div class="position"><h3>Center line:</h3>
                @foreach ($outfit1_calc->center_line as $stat_name=>$stat_value)
                    <p>{{$stat_name}} : {{$stat_value}}</p>
                @endforeach
            </div>
            <div class="position"><h3>Firing range and support:</h3>
                @foreach ($outfit1_calc->back_line as $stat_name=>$stat_value)
                    <p>{{$stat_name}} : {{$stat_value}}</p>
                @endforeach
            </div>
        </div>

        <div class="col-2 text-center vsdevider">
            VS (formation-match)<br>
            {{$battle_lines[1]}}<br>
            {{$battle_lines[2]}}<br>
            {{$battle_lines[10]}}<br>
            {{$battle_lines[11]}}<br>
            {{$battle_lines[20]}}<br>
            {{$battle_lines[21]}}<br><br>
            {{$battle_lines[100]}}<br>
        </div>

        <div class="col-5 text-center formation-match">
            <div class="position"><h3>Front line:</h3>
            @foreach ($outfit2_calc->front_line as $stat_name=>$stat_value)
                <p>{{$stat_name}} : {{$stat_value}}</p>
            @endforeach
            </div>
            <div class="position"><h3>Center line:</h3>
                @foreach ($outfit2_calc->center_line as $stat_name=>$stat_value)
                    <p>{{$stat_name}} : {{$stat_value}}</p>
                @endforeach
            </div>
            <div class="position"><h3>Firing range and support:</h3>
                @foreach ($outfit2_calc->back_line as $stat_name=>$stat_value)
                    <p>{{$stat_name}} : {{$stat_value}}</p>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection