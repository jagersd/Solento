@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Show formation / equipped items / outfit etc / no functionlity</h1>
            <form method="POST" action="{{ action('BattlesController@create_or_update') }}">
                {{ csrf_field() }}
            <button type="submit" class="btn btn-dark">To battle!</button>
                {{$outfit_overview}}
            </form>
        </div>
    </div>
</div>
@endsection
