@extends('layouts.battle_layout')

@section('content')

<!-- Sequence container -->
<div class="sequence-bg">
    <!-- Actual Sequence -->
    <div class="container" id="showcase" style="background-image:radial-gradient(transparent,#004656 30%), url('/images/fields/{{$field->background_file}}');">
        <div class="row align-items-center">
            <div class="col-4 text-left">
                <h4 id="seq-username">{{$username1}}</h4>
                <h5 id="seq-faction">Representing the <u>{{$faction1}}</u></h5>
                <br><br>
                <div class="seq-formation">
                @foreach ($outfit1 as $unit)
                    @if($unit->position == 1) <p id="seq-unit"> <b>{{$unit->name}}</b> / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                </div>
                <div class="seq-formation">
                @foreach ($outfit1 as $unit)
                    @if($unit->position == 2) <p id="seq-unit"> <b>{{$unit->name}}</b> / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                </div>
                <div class="seq-formation">
                @foreach ($outfit1 as $unit)
                    @if($unit->position == 3) <p id="seq-unit"> <b>{{$unit->name}}</b> / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                </div>
                
            </div>
            <div class="col-4 text-center">
                <br><br>
                <h4 id="field-name">{{$field->name}}</h4>
                <h5 id="field-desc"><i>{{$field->description}}</i></h5>
                <br>
                <h5 id="result-line">{{$battle_lines[100]}}</h5>
            </div>
            <div class="col-4 text-right">
                <h4 id="seq-username">{{$username2}}</h4>
                <h5 id="seq-faction">Representing the <u>{{$faction2}}</u></h5>
                <br><br>
                <div class="seq-formation">
                @foreach ($outfit2 as $unit)
                    @if($unit->position == 1) <p id="seq-unit"> <b>{{$unit->name}}</b> / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                </div>
                <div class="seq-formation">
                @foreach ($outfit2 as $unit)
                    @if($unit->position == 2) <p id="seq-unit"> <b>{{$unit->name}}</b> / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                </div>
                <div class="seq-formation">
                @foreach ($outfit2 as $unit)
                    @if($unit->position == 3) <p id="seq-unit"> <b>{{$unit->name}}</b> / Class: {{$unit->base_details->name}}</p> @endif  
                @endforeach
                </div>
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-3 text-center">
                <p id="flavour-line1"><i>{{$battle_lines[$flavour_line_index['1']]}}</i></p>
                <p id="flavour-line2"><i>{{$battle_lines[$flavour_line_index['2']]}}</i></p>
                <p id="flavour-line3"><i>{{$battle_lines[$flavour_line_index['3']]}}</i></p>
            </div>
            <div class="col-6 text-center">
                @for($i=0; $i < count($battle_logs); $i++)
                    <p class="battle-logs"  id="ability_log{{$i}}"><b>{{$battle_logs[$i]}}</b></p>
                @endfor
                
            </div>
            <div class="col-3 text-center">
                <p id="flavour-line4"><i>{{$battle_lines[$flavour_line_index['4']]}}</i></p>
                <p id="flavour-line5"><i>{{$battle_lines[$flavour_line_index['5']]}}</i></p>
                <p id="flavour-line6"><i>{{$battle_lines[$flavour_line_index['6']]}}</i></p>
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="container fixed-bottom" id="resultButton">
        <div class="row flex-column flex-md-row result_button">
            @if (auth::user()->id == DB::table('battles')->where('battlecode',$battlecode)->first('result')->result)
            <div class="col-12 text-center">
                <a href="/battle/complete/{{$complete_code}}"><button type="submit" class="btn btn-success">Claim loot!</button></a>
            </div>
            @else
            <div class="col-12 text-center">
                <a href="/home"><button type="submit" class="btn btn-success">Better luck next time</button></a>
            </div>
            @endif
        </div>
        <div class="row flex-column flex-md-row">
            <div class="col-12 text-center">
                <br>
                <button type="submit" class="btn" id="log-button">Toggle complete logs</button>
            </div>
        </div>
    </div>

    


    <!-- Complete Logs-->
    <div id="complete-logs">
    <div class="container-fluid sequence-intro">
        <div class="row flex-column flex-md-row">
            <div class="col-5 text-center player-intro">
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
            <div class="col-4 text-center formation-match">
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

            <div class="col-4 text-center vsdevider">
                <h4>VS (formation-match)</h4>
                {{$battle_lines[1]}}<br>
                {{$battle_lines[2]}}<br>
                {{$battle_lines[10]}}<br>
                {{$battle_lines[11]}}<br>
                {{$battle_lines[20]}}<br>
                {{$battle_lines[21]}}<br><br>
                {{$battle_lines[100]}}<br><br><br>
                <h4>Complete battle logs:</h4>
                @foreach ($battle_logs as $log)
                <p>{{$log}}</p>
                @endforeach
            </div>

            <div class="col-4 text-center formation-match">
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
    </div>
</div>

@endsection