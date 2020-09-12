@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home Dash</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (count($userraces) > 0)
                        <p> Welkom {{auth::user()->name}}! You are a proud member of the {{$userraces[0]->name}} </p>
                        <h4>Live battle field status:</h4>
                        <ul>
                            <li>Current outfit leaders online: <b>{{$online_count}}</b></li>
                            <li>Outfits looking for a match: <b>{{$match_searches}}</b></li>
                            <li>Messages in your inbox: <b>0</b></li>
                            <li>Total matches played today by all outfit leaders: <b>{{$total_matches_today}}</b></li>
                        </ul>

                    @else
                    <form method="POST" action="{{ action('User_racesController@create') }}">
                        {{ csrf_field() }}
                        @foreach ($allraces as $race)
                            <input class= "race_selector" type="radio" id="race_choice" name="race_choice" value="{{$race->id}}">   {{$race->name}}
                            <label for="race_choice"> <i>{{$race->description}}</i></label><br><br>
                        @endforeach
                            <input type="hidden" id="user_id" name="user_id" value="{{auth::user()->id}}">
                        <button type="submit" class="btn btn-primary">Lock your choice</button>
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

@if (count($userraces) > 0)
<div class="container">
    <div class="row flex-column flex-md-row links">
        <a href="/unit_store" class="fase_link text-center col-3" style="background-image: url('/images/unit_catelogue.png')">Unit Catelogue</a>

        <a href="/item_store" class="fase_link text-center col-3" style="background-image: url('/images/item_catelogue.png')">Item Catelogue</a>

        <a href="/outfit" class="fase_link text-center col-3" style="background-image: url('/images/check_outfit.png')">Check Outfit</a>

        <a href="/battle/prepare" class="fase_link text-center col-3" style="background-image: url('/images/to_battle.png')">To Battle!</a>

    </div>
</div>
@endif


@endsection
