@extends('layouts.battle_layout')

@section('content')

<div id="waiter">
    <div id="player2">{{$battle_details->player2}}</div>
    <div style="visibility:hidden;" id="code">{{$battle_details->battlecode}}</div>
    @if ($battle_details->player2 == null)
    <script src="{{ asset('js/waitingroom.js') }}"></script>
    @include('battle/waitingroom')   
    @endif
</div>
@endsection
