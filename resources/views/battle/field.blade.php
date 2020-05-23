@extends('layouts.battle_layout')

@section('content')

<div id="waiter">
@if ($battle_details->player2 == null)
<script src="{{ asset('js/waitingroom.js') }}"></script>
@include('battle/waitingroom')
    
@endif
</div>
@endsection
