@extends('layouts.app')

@section('content')
<span class="return">
<a href="/home">Go Back</a>
</span><br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Item Catalogue for {{auth::user()->name}} who has <b id="gold_amount">{{$gold_amount->gold_amount}}</b> gold to spend!</div>
                    <div class="container">
                        <div class="list-group">
                        @foreach ($allitems as $item)
                        <a href="/items/{{$item['id']}}" class="list-group-item list-group-item-action">{{$item['item_name']}} {{$item['item_cost']}}</a>
                            
                        @endforeach
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

@endsection
