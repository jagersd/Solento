@extends('layouts.app')

@section('content')

<a href="/outfit"><--- Go Back</a>

<div class="container-flex">
    <div class="row flex-column flex-md-row">
        <div class="col-md-4" id="artwork">
            <p>Space reserved for artwork and description</p>
            <i>{{$unit_stats->base_details->description}}</i>
        </div>
        <div class="col-md-4" id="all-stats">
            <h4>{{$unit_stats->name}}</h4>
            <p>HP: {{$unit_stats->base_details->hp}}</p>
            <p>Strength: {{$unit_stats->base_details->strength}}</p>
            <p>Armor: {{$unit_stats->base_details->armor}}</p>
            <p>Intellect: {{$unit_stats->base_details->intellect}}</p>
            <p>Magic defence: {{$unit_stats->base_details->magic_defence}}</p>
            <p>Speed: {{$unit_stats->base_details->speed}}</p>
            <p>Can be sold for: {{$unit_stats->base_details->cost * 0.5}} gold</p>

            <form method="POST" action="{{ action('OutfitsController@equipItems') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">

                <h5>Equipped items</h5>
                <p>First item slot:  @if($item_name1) {{$item_name1->item_name}} @else --slot free-- @endif </p>
                <select id="available_item_list" name="available_item1">
                    <option></option>
                    @foreach ($user_items as $user_item)
                        @if($user_item->assigned==0)
                    <option value="{{$user_item->id}}">{{$user_item->item->item_name}}</option>
                    @endif
                    @endforeach
                </select>
                <p>Second item slot: @if($item_name2) {{$item_name2->item_name}} @else --slot free-- @endif  </p>
                <select id="available_item_list" name="available_item2">
                    <option></option>
                    @foreach ($user_items as $user_item)
                        @if($user_item->assigned==0)
                        <option value="{{$user_item->id}}">{{$user_item->item->item_name}}</option>
                        @endif
                    @endforeach
                </select>
                <p>Third item slot: @if($item_name3) {{$item_name3->item_name}} @else --slot free-- @endif  </p>
                <select id="available_item_list" name="available_item3">
                    <option></option>
                    @foreach ($user_items as $user_item)
                        @if($user_item->assigned==0)
                        <option value="{{$user_item->id}}">{{$user_item->item->item_name}}</option>
                        @endif
                    @endforeach
                </select><br><br>
                <button type="submit" class="btn btn-dark">Lock items</button>
            </form>
            <br>
            <form method="POST" action="{{ action('OutfitsController@unequipItems') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">
                <button type="submit" class="btn btn-dark">Unequip all items</button>
            </form>
        </div>
        <div class="col-md-4">
            <h4>Your item stash</h4>
            @foreach ($user_items as $user_item)
            <div class="card">
                <div class="card-header">
                    
                    {{$user_item->item->item_name}} @if ($user_item->assigned == 1) : already equipped @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
    <br>
    <div class="row flex-column flex-md-row">
        <div class="col-6">
            <h4>Special traits by nature</h4>
            @foreach ($unit_stats->base_details->abilities as $ability)
                <h5>{{$ability->stat_name}}</h5>
                <p>{{$ability->stat_description}}</p>
            @endforeach
        </div>
        <div class="col-6">
            <h4>Special traits gained by equipped items</h4>
        </div>
    </div>
</div>



@endsection
