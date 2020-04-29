@extends('layouts.app')

@section('content')
<a href="/home"><--- Go Back</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Units Catalogue</div>

                @foreach ($allraces as $race)
                    <h4>{{$race->name}}</h4>
                        @foreach ($race->base_units as $unit)
                            <p><b>{{$unit->name}}</b> {{$unit->description}}</p>
                            <p>HP: {{$unit->hp}}</p>
                            <p>Armor: {{$unit->armor}}</p>
                            <p>Strenth: {{$unit->strength}}</p>
                        @endforeach
                @endforeach                

            </div>
        </div>
    </div>
</div>

@endsection
