@extends('layouts.app')

@section('content')
<a href="/home"><--- Go Back</a>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Units Catalogue for {{auth::user()->name}} who has <b id="gold_amount">{{$gold_amount->gold_amount}}</b> gold to spend!</div>
                    <div class="container">
                        @foreach ($allraces as $race)
                            <a class="card-body" data-toggle="collapse" href="#a{{$race->id}}" aria-expanded="false" aria-controls="a{{$race->id}}" role="button">{{$race->name}}</a><hr>
                                <div class="collapse" id="a{{$race->id}}">
                                    <div class="list-group">
                                        @foreach ($race->base_units->sortBy('cost') as $unit)
                                            <a href="units/{{$unit->id}}" class="list-group-item list-group-item-action list-group-item-dark ">
                                                {{$unit->name}} {{$unit->cost}}
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
