@extends('layouts.battle_layout')

@section('content')

@if (empty($battle_details->player2))
@include('battle/waitingroom')
@endif

@endsection
