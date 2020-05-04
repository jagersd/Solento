@extends('layouts.app')

@section('content')
<a href="/home"><--- Go Back</a>
<div class="container">
    <div class="row">
        <div class="col-6">
            @foreach ($units as $unit)
            <div class="card">
                <div class="card-header">{{$unit->name}} <button type="button" class="btn btn-info">Change unit name</button> </div>

                <p>Unit: {{$unit->base_details->name}}</p>
                <ul>Gear equipped:
                    <li>ruimte voor equiped items</li>
                </ul>

            </div>    
            @endforeach
        </div>
        <div class="col-6">
            <p>ruimte voor formatie index</p>
        </div>

    </div>
</div>











@endsection
