@extends('layouts.app')

@section('content')
<span class="return">
    <a href="/unit_store">Go Back</a>
</span>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$unit->name}}</div>
                <p>{{$unit->description}}</p>
                <ul style="display: none;">
                    <li id="stat_hp">{{$unit->hp}}</li>
                    <li id="stat_strength">{{$unit->strength}}</li>
                    <li id="stat_armor">{{$unit->armor}}</li>
                    <li id="stat_intellect">{{$unit->intellect}}</li>
                    <li id="stat_magic_defence">{{$unit->magic_defence}}</li>
                    <li id="stat_speed">{{$unit->speed}}</li>
                </ul>
                <div id="unitStoreChart">
                <canvas id="statChart" width="400" height="400"></canvas>
                </div>
                <hr>
                <p>Special traits:</p>
                @if(count($unit->abilities)>0)
                    
                        @foreach ($unit->abilities as $ability)
                        <u>{{$ability['stat_name']}}:</u>
                        <p>{{$ability['stat_description']}}</p>
                        @endforeach
                @else
                
                <p>This unit does not have special traits. What you see is what you get, and it's good.</p>
                    
                @endif
                <div class="card-footer">Cost: @if($unit->race_id == auth::user()->user_race_combination->race_id)
                    {{$unit->cost}} @else {{ceil($unit->cost * 1.5)}} @endif<br>
                    Gold to spend: {{$gold_amount->gold_amount}}
                    <br>
                    @if($unit->cost <= $gold_amount->gold_amount)
                    <button class="btn btn-dark" href="#signupModal" data-toggle="modal" type="submit"  id="confirmation_request">Add unit to your roster</button>
                    @endif
                    <button class="btn btn-dark" onclick="location.href='/unit_store'" type="button">back to unit overview</button>
                </div>      
            </div>
        </div>
    </div>
</div>


<div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <!-- Modal root -->
            <div class="m-header"> 
                <h2 class="myModalLabel"> Are you sure you want to spend your gold on the {{$unit->name}} </h2> 
            </div> 


            <!-- Modal footer -->
            <div class="footer"> 
                <form method="POST" action="{{ action('Unit_storeController@buy_unit') }}">
                {{ csrf_field() }}
                <input type="hidden" id="unit_id" name="unit_id" value="{{$unit->id}}">
                <button class="btn btn-dark" type="submit">Confirm</button>
                <button class="btn btn-dark" data-toggle="modal" data-dismiss="modal" >Return</button>
                </form>
            </div> 

        </div> 
    </div> 
</div> 


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/charts.js') }}" charset="utf-8" defer></script>
@stop