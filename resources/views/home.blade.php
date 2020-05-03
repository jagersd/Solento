@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (count($userraces) > 0)
                        <p> Welkom {{auth::user()->name}}! You are a proud member of the {{$userraces[0]->name}} </p>
                    @else
                    <form method="POST" action="{{ action('User_racesController@create') }}">
                        {{ csrf_field() }}

                        <p> Welkom {{auth::user()->name}} please pick your origin</p>
                        @foreach ($allraces as $race)
                            <input type="radio" id="race_choice" name="race_choice" value="{{$race->id}}">
                            <label for="race_choice">{{$race->name}} - {{$race->description}}</label><br>
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
<div class="d-flex justify-content-center">

    <div class="links">
        <a href="/unit_store">Unit Catelogue |</a>
        <a href="/item_store">| Item Catelogue |</a>
        <a href="/outfit">| Check outfit |</a>
        <a href="/unit_store">| Into Battle</a>
    </div>
    
</div>
@endsection
