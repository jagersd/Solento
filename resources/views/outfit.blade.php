@extends('layouts.app')

@section('content')
<span class="return">
    <a href="/home">Go Back</a>
</span><br>

<div class="statGraphSource" style="display: none">
<ul>
    <li id="outfitHP">{{$outfit_stats['hp']}}</li>
    <li id="outfitStrength">{{$outfit_stats['strength']}}</li>
    <li id="outfitArmor">{{$outfit_stats['armor']}}</li>
    <li id="outfitIntellect">{{$outfit_stats['intellect']}}</li>
    <li id="outfitMagicDefence">{{$outfit_stats['magic_defence']}}</li>
    <li id="outfitSpeed">{{$outfit_stats['speed']}}</li>
</ul>
</div>

<div class="container">
    <div class="row flex-column">
        <div class="col-12 text-center">
            @if ($active_weight > $max_outfit)
            <h4 class="light-header" style="color:crimson;">Active outfit size: {{$active_weight}} / {{$max_outfit}}</h4>
            @else
            <h4 class="light-header">Active outfit size: {{$active_weight}} / {{$max_outfit}}</h4>
            @endif
            <hr>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row flex-column flex-md-row">
        <div class="col-md-6">
            <h4 class="light-header">Front line</h4>
            @foreach ($units as $unit)
                @if ($unit->position == 1)
                    <?php $parameter =['id' =>$unit->id,]; $parameter= Crypt::encrypt($parameter);?>
                    <div class="card">
                        <div class="card-header outfit-unit">{{$unit->name}} <button class="btn btn-dark btn-sm" href="#signupModal{{$unit->id}}" data-toggle="modal" type="submit"  id="confirmation_request">Change unit name</button></div>
                        <a href="{{url('outfit/details',$parameter)}}" class="dark-list-group-item list-group-item-action">
                            <p id="baseUnitName">{{$unit->base_details->name}}</p>
                            <p id="factionName">{{$unit->base_details->race->name}}</p>
                            Exp points: {{$unit->exp}}<br>
                            Geared up: @if ($unit->item1_id !== 0 OR $unit->item2_id !==0 OR $unit->item3_id !==0) yes @else no @endif  
                        </a>
                    </div>
                    <br>  
                @endif 
            @endforeach
            <h4 class="light-header">Army center</h4>
            @foreach ($units as $unit)
                @if ($unit->position == 2)
                    <?php $parameter =['id' =>$unit->id,]; $parameter= Crypt::encrypt($parameter);?>
                    <div class="card">
                        <div class="card-header outfit-unit">{{$unit->name}} <button class="btn btn-dark btn-sm" href="#signupModal{{$unit->id}}" data-toggle="modal" type="submit"  id="confirmation_request">Change unit name</button></div>
                        <a href="{{url('outfit/details',$parameter)}}" class="dark-list-group-item list-group-item-action">
                            <p id="baseUnitName">{{$unit->base_details->name}}</p>
                            <p id="factionName">{{$unit->base_details->race->name}}</p>
                            Exp points: {{$unit->exp}}<br>
                            Geared up: @if ($unit->item1_id !== 0 OR $unit->item2_id !==0 OR $unit->item3_id !==0) yes @else no @endif  
                        </a>
                    </div>
                    <br>   
                @endif 
            @endforeach
            <h4 class="light-header">Firing range and support</h4>
            @foreach ($units as $unit)
                @if ($unit->position == 3)
                    <?php $parameter =['id' =>$unit->id,]; $parameter= Crypt::encrypt($parameter);?>
                    <div class="card">
                        <div class="card-header outfit-unit">{{$unit->name}} <button class="btn btn-dark btn-sm" href="#signupModal{{$unit->id}}" data-toggle="modal" type="submit"  id="confirmation_request">Change unit name</button></div>
                        <a href="{{url('outfit/details',$parameter)}}" class="dark-list-group-item list-group-item-action">
                            <p id="baseUnitName">{{$unit->base_details->name}}</p>
                            <p id="factionName">{{$unit->base_details->race->name}}</p>
                            Exp points: {{$unit->exp}}<br>
                            Geared up: @if ($unit->item1_id !== 0 OR $unit->item2_id !==0 OR $unit->item3_id !==0) yes @else no @endif  
                        </a>
                    </div>
                    <br>   
                @endif 
            @endforeach
        </div>
        <div class="col-md-6">
            <h4 class="light-header">Outfit balance</h4>
            <canvas class="chart" id="outfitStatChart" width="400" height="400"></canvas>
            <h4 class="light-header">Faction mix</h4>
            <canvas class="chart" id="factionChart" width="400" height="400"></canvas>
            <h4 class="light-header">Unequipped items:</h4>
            @foreach ($user_items as $user_item)
            @if($user_item->assigned==0)
            <div class="card">
                <div class="item-list">                    
                    <p>{{$user_item->item->item_name}}</p>
                </div>
            </div>
            @endif
            @endforeach
            <h4 class="light-header">Equipped items:</h4>
            @foreach ($user_items as $user_item)
            @if($user_item->assigned==1)
            <div class="card">
                <div class="item-list">                    
                    <p>{{$user_item->item->item_name}}</p>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</div>


<!--CHANGE NAME POP-UP MODEL-->
@foreach ($units as $unit)
<div class="modal" id="signupModal{{$unit->id}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <!-- Modal root -->
            <div class="m-header"> 
                <h2 class="myModalLabel"> Which name shall you give this {{$unit->name}} </h2> 
            </div> 


            <!-- Modal footer -->
            <div class="footer"> 
                <form method="POST" action="{{ action('OutfitsController@namechange') }}">
                {{ csrf_field() }}
                <input type="text" id="outfit_id" name="outfit_name">
                <input type="hidden" id="outfit_id" name="outfit_id" value="{{$unit->id}}"> 
                <button class="btn btn-dark" type="submit">Confirm</button>
                <button class="btn btn-dark" data-toggle="modal" data-dismiss="modal" >Return</button>
                </form>
            </div> 

        </div> 
    </div> 
</div> 
@endforeach

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
<script type="text/javascript" src="{{ asset('js/chartOutfit.js') }}" charset="utf-8" defer></script>
@stop