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
                <ul>
                    <li>HP: {{$unit->hp}}</li>
                    <li>Strenght: {{$unit->strength}}</li>
                    <li>Armor: {{$unit->armor}}</li>
                    <li>Intellect: {{$unit->intellect}}</li>
                    <li>Magic defence: {{$unit->magic_defence}}</li>
                    <li>Speed: {{$unit->speed}}</li>
                </ul>
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
