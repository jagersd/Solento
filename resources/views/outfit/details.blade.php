@extends('layouts.app')

@section('page_style')
<link href="{{ asset('css/outfit_details.css') }}" rel="stylesheet">
@stop

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
            <!-- Stats section -->
                <div class="card-body">
                    <ul style="display: none;">
                    <li id="stat_hp">{{$unit_stats->base_details->hp}},{{$unit_stats->base_details->hp + $item1->item_hp + $item2->item_hp + $item3->item_hp}} </li>
                    <li id="stat_strength">{{$unit_stats->base_details->strength}},{{$unit_stats->base_details->strength + $item1->item_stength + $item2->item_stength + $item3->item_stength}}</li>
                    <li id="stat_armor">{{$unit_stats->base_details->armor}},{{$unit_stats->base_details->armor + $item1->item_armor + $item2->item_armor + $item3->item_armor}}</li>
                    <li id="stat_intellect">{{$unit_stats->base_details->intellect}},{{$unit_stats->base_details->intellect + $item1->item_intellect + $item2->item_intellect + $item3->item_intellect}}</li>
                    <li id="stat_magic_defence">{{$unit_stats->base_details->magic_defence}},{{$unit_stats->base_details->magic_defence + $item1->item_magic_defence + $item2->item_magic_defence + $item3->item_magic_defence}}</li>
                    <li id="stat_speed">{{$unit_stats->base_details->speed}},{{$unit_stats->base_details->speed + $item1->item_speed + $item2->item_speed + $item3->item_speed}}</li>
                    </ul>
                    <canvas class="chart" id="statChart" width="400" height="400"></canvas>
                    <p>Can be sold for: {{$unit_stats->sell_price}} gold</p>
                    <button class="btn btn-primary" href="#signupModal" data-toggle="modal" type="submit"  id="confirmation_request">Sell unit</button>
                </div>
            </div>
            
            <br><br>

            <!-- Equipment section -->
                <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">
                <div class="card">
                    <h5 class="card-header">Equipped items</h5>
                    <div class="card-body">
                        <p>Slot 1:  @if($item1->id != 0) {{$item1->item_name}} 
                            @else <button class="btn btn-link" href="#equipModal" data-toggle="modal" type="submit" id="slot1btn">Select item</button> 
                            @endif 
                        </p>
                        <p>Slot 2:  @if($item2->id != 0) {{$item2->item_name}} 
                            @else <button class="btn btn-link" href="#equipModal" data-toggle="modal" type="submit" id="slot2btn">Select item</button> 
                            @endif 
                        </p>
                        <p>Slot 3:  @if($item3->id != 0) {{$item3->item_name}} 
                            @else <button class="btn btn-link" href="#equipModal" data-toggle="modal" type="submit" id="slot3btn">Select item</button> 
                            @endif 
                        </p>
                        <form method="POST" action="{{ action('OutfitsController@unequipItems') }}">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">
                            <button type="submit" class="btn btn-primary">Unequip all items</button><br><br>
                        </form>
                    </div>
                </div>
                <br>
            <!-- Position section -->
            <form method="POST" action="{{ action('OutfitsController@editPosition') }}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">
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
                        <br><br>   
                        <button type="submit" class="btn btn-primary">Lock position</button>
                    </div>
                </div>   
            </form>
            <br>

        </div>
        <!-- stats chart -->
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
    <!-- Traits sections -->
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

<!-- Equip items model -->
<div class="modal" id="equipModal" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <!-- Modal root -->
            <div class="m-header"> 
                <h2 class="myModalLabel2"> Which item would suit best in this slot? </h2> 
            </div> 

            <!-- Modal footer -->
            <div class="footer"> 
                <form method="POST" action="{{ action('OutfitsController@equipItems') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$unit_stats->id}}" name="outfit_id">
                <div class="form-check">
                @foreach ($user_items as $user_item)
                    @if ($user_item->assigned == 0)
                    <input class="form-check-input position-static" type="radio" id="item_input" name="" value="{{$user_item->id}}">{{$user_item->item->item_name}}<br>     
                    @endif
                @endforeach
                </div>
                
                <button class="btn btn-primary" type="submit">Confirm</button>
                <button class="btn btn-dark" data-toggle="modal" data-dismiss="modal">Return</button>
                </form>
            </div> 

        </div> 
    </div> 
</div>


<!-- Sell unit Modal root -->
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
                <button class="btn btn-dark" data-toggle="modal" data-dismiss="modal">Return</button>
                </form>
            </div> 

        </div> 
    </div> 
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/chartUnitDetail.js') }}" charset="utf-8" defer></script>
@stop

