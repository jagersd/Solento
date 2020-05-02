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
                                <h4>{{$race->name}}</h4><hr>
                                    <div class="list-group">
                                        @foreach ($race->base_units as $unit)
                                        <a href="units/{{$unit->id}}" class="list-group-item list-group-item-action list-group-item-dark ">
                                            {{$unit->name}} {{$unit->description}} {{$unit->cost}}
                                        </a>   
                                        @endforeach
                                    </div>
                            @endforeach
                        </div>
                    
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection
