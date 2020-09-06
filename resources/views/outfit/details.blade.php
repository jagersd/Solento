@extends('layouts.app')

@section('content')

<span class="return">
    <a href="/outfit">Go Back</a>
</span>
<br><br>

<div class="container">
    <div class="row flex-column flex-md-row">
        <div class="col-md-4" id="artwork">
            <p>Space reserved for artwork and description</p>
            <i class="light-header">{{$unit_stats->base_details->description}}</i>
        </div>
        <div class="col-md-4" id="all-stats">
            <div class="card">
            <h3 class="card-header">{{$unit_stats->name}}</h3>
                <div class="card-body">
                    <p>HP: {{$unit_stats->base_details->hp}} + {{ $item1->item_hp + $item2->item_hp + $item3->item_hp}} </p>
                    <p>Strength: {{$unit_stats->base_details->strength}} + {{ $item1->item_stength + $item2->item_stength + $item3->item_stength}}</p>
                    <p>Armor: {{$unit_stats->base_details->armor}} + {{ $item1->item_armor + $item2->item_armor + $item3->item_armor}}</p>
                    <p>Intellect: {{$unit_stats->base_details->intellect}} + {{ $item1->item_intellect + $item2->item_intellect + $item3->item_intellect}}</p>
                    <p>Magic defence: {{$unit_stats->base_details->magic_defence}} + {{ $item1->item_magic_defence + $item2->item_magic_defence + $item3->item_magic_defence}}</p>
                    <p>Speed: {{$unit_stats->base_details->speed}} + {{ $item1->item_speed + $item2->item_speed + $item3->item_speed}}</p>
                    <p>Can be sold for: {{$unit_stats->sell_price}} gold</p>
                </div>
            </div>
            
            <br><br>
            <form method="POST" action="{{ action('OutfitsController@equipItems') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">
                <div class="card">
                    <h5 class="card-header">Equipped items</h5>
                    <div class="card-body">
                        <p>First item slot:  @if($item1) {{$item1->item_name}} @else --slot free-- @endif </p>
                        <select id="available_item_list" name="available_item1">
                            <option></option>
                            @foreach ($user_items as $user_item)
                                @if($user_item->assigned==0)
                            <option value="{{$user_item->id}}">{{$user_item->item->item_name}}</option>
                            @endif
                            @endforeach
                        </select>
                        <p>Second item slot: @if($item2) {{$item2->item_name}} @else --slot free-- @endif  </p>
                        <select id="available_item_list" name="available_item2">
                            <option></option>
                            @foreach ($user_items as $user_item)
                                @if($user_item->assigned==0)
                                <option value="{{$user_item->id}}">{{$user_item->item->item_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <p>Third item slot: @if($item3) {{$item3->item_name}} @else --slot free-- @endif  </p>
                        <select id="available_item_list" name="available_item3">
                            <option></option>
                            @foreach ($user_items as $user_item)
                                @if($user_item->assigned==0)
                                <option value="{{$user_item->id}}">{{$user_item->item->item_name}}</option>
                                @endif
                            @endforeach
                        </select><br>
                    </div>
                </div>
                <br><br>
                <div class="card">                
                    <h5 class="card-header">Position on the field or benched</h5>
                    <div class="card-body">
                        <select name="position_on_field" id="position_on_field">
                            <option value="" selected disabled hidden>{{$unit_stats->formation->position}}</option>
                            <option value="1">Front Guard</option>
                            <option value="2">Center Line</option>
                            <option value="3">Support / Firing range</option>
                        </select>   <br><br>
                        <select name="active_inactive" id="active_inactive">
                            <option value="" selected disabled hidden>@if ($unit_stats->active == 1) Active @else Benched @endif</option>
                            <option value="1">Active</option>
                            <option value="0">Bench</option>
                        </select>   

                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Lock configuration</button>
                <br><br>
                <form method="POST" action="{{ action('OutfitsController@unequipItems') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">
                    <button type="submit" class="btn btn-primary">Unequip all items</button><br><br>
                </form>
                <button class="btn btn-primary" href="#signupModal" data-toggle="modal" type="submit"  id="confirmation_request">Sell unit</button>
            </form>
            <br>

        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Your item stash</h5>
                @foreach ($user_items as $user_item)
                    <div class="card-body">
                        <div>
                            {{$user_item->item->item_name}} @if ($user_item->assigned == 1) : already equipped @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="row flex-column flex-md-row">
        <div class="col-6">
            <h4 class="card-header">Special traits by nature</h4>
            @foreach ($unit_stats->base_details->abilities as $ability)
                <h5 class="light-header">-{{$ability->stat_name}}</h5>
                <p class="light-header">{{$ability->stat_description}}</p>
            @endforeach
        </div>
        <div class="col-6">
            <h4 class="card-header">Special traits gained by equipped items</h4>
            @foreach ($item1->abilities as $item_trait)
                <h5 class="light-header">-{{$item_trait->item_stat_name}}</h5>
                <p class="light-header">{{$item_trait->item_stat_description}}</p>
            @endforeach
            @foreach ($item2->abilities as $item_trait)
                <h5 class="light-header">-{{$item_trait->item_stat_name}}</h5>
                <p class="light-header">{{$item_trait->item_stat_description}}</p>
            @endforeach
            @foreach ($item3->abilities as $item_trait)
                <h5 class="light-header">-{{$item_trait->item_stat_name}}</h5>
                <p class="light-header">{{$item_trait->item_stat_description}}</p>
            @endforeach
            
        </div>
    </div>
</div>

<div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <!-- Modal root -->
            <div class="m-header"> 
                <h2 class="myModalLabel"> Are you sure you want to sell this unit for {{$unit_stats->sell_price}} gold? </h2> 
            </div> 

            <!-- Modal footer -->
            <div class="footer"> 
                <form method="POST" action="{{ action('OutfitsController@sell_unit') }}">
                {{ csrf_field() }}
                <input type="hidden" id="outfit_id" name="outfit_id" value="{{$unit_stats->id}}">
                <input type="hidden" id="sell_price" name="sell_price" value="{{$unit_stats->sell_price}}">
                <button class="btn btn-dark" type="submit">Confirm</button>
                <button class="btn btn-dark" data-toggle="modal" data-dismiss="modal" >Return</button>
                </form>
            </div> 

        </div> 
    </div> 
</div> 

@endsection
