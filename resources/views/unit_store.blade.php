@extends('layouts.app')

@section('content')
<span class="return">
    <a href="/home">Go Back</a>
</span><br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Units Catalogue for {{auth::user()->name}} who has <b id="gold_amount">{{$gold_amount->gold_amount}}</b> gold to spend!</div>
                    <div class="container card-body">
                        @foreach ($allraces as $race)
                            <div class="card-header unit_store"><a data-toggle="collapse" href="#a{{$race->id}}" aria-expanded="false" aria-controls="a{{$race->id}}" role="button">{{$race->name}}</a></div>
                                <div class="collapse" id="a{{$race->id}}">
                                    <div class="list-group">
                                        @foreach ($race->base_units->sortBy('cost') as $unit)
                                            <a href="units/{{$unit->id}}" class="list-group-item list-group-item-action">
                                            {{$unit->name}} @if($unit->race_id == auth::user()->user_race_combination->race_id)
                                            {{$unit->cost}} @else {{ceil($unit->cost * 1.5)}} @endif
                                            </a>   
                                        @endforeach
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>



@endsection
