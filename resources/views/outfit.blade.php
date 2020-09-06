@extends('layouts.app')

@section('content')
<span class="return">
    <a href="/home">Go Back</a>
</span><br><br>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="light-header">Active outfit size: {{$units->sum('outfit_weight')}} / {{$max_outfit}}</h4>
            <hr>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="light-header">Front line</h2>
            @foreach ($units as $unit)
                @if ($unit->position == 1)
                    <?php $parameter =['id' =>$unit->id,]; $parameter= Crypt::encrypt($parameter);?>
                    <div class="card">
                        <div class="card-header outfit-unit">{{$unit->name}} <button class="btn btn-dark btn-sm" href="#signupModal{{$unit->id}}" data-toggle="modal" type="submit"  id="confirmation_request">Change unit name</button></div>
                        <a href="{{url('outfit/details',$parameter)}}" class="dark-list-group-item list-group-item-action">
                            Class: {{$unit->base_details->name}}<br>
                            Race: {{$unit->base_details->race->name}}<br>
                            Exp points: {{$unit->exp}}    <br><br>
                            Geared up: @if ($unit->item1_id !== 0 OR $unit->item2_id !==0 OR $unit->item3_id !==0) yes @else no @endif  
                        </a>
                    </div>
                    <br>  
                @endif 
            @endforeach
            <h2 class="light-header">Army center</h2>
            @foreach ($units as $unit)
                @if ($unit->position == 2)
                    <?php $parameter =['id' =>$unit->id,]; $parameter= Crypt::encrypt($parameter);?>
                    <div class="card">
                        <div class="card-header outfit-unit">{{$unit->name}} <button class="btn btn-dark btn-sm" href="#signupModal{{$unit->id}}" data-toggle="modal" type="submit"  id="confirmation_request">Change unit name</button></div>
                        <a href="{{url('outfit/details',$parameter)}}" class="dark-list-group-item list-group-item-action">
                            Class: {{$unit->base_details->name}}<br>
                            Race: {{$unit->base_details->race->name}}<br>
                            Exp points: {{$unit->exp}}    <br><br>
                            Geared up: @if ($unit->item1_id !== 0 OR $unit->item2_id !==0 OR $unit->item3_id !==0) yes @else no @endif  
                        </a>
                    </div>
                    <br>   
                @endif 
            @endforeach
            <h2 class="light-header">Firing range and support</h2>
            @foreach ($units as $unit)
                @if ($unit->position == 3)
                    <?php $parameter =['id' =>$unit->id,]; $parameter= Crypt::encrypt($parameter);?>
                    <div class="card">
                        <div class="card-header outfit-unit">{{$unit->name}} <button class="btn btn-dark btn-sm" href="#signupModal{{$unit->id}}" data-toggle="modal" type="submit"  id="confirmation_request">Change unit name</button></div>
                        <a href="{{url('outfit/details',$parameter)}}" class="dark-list-group-item list-group-item-action">
                            Class: {{$unit->base_details->name}}<br>
                            Race: {{$unit->base_details->race->name}}<br>
                            Exp points: {{$unit->exp}}    <br><br>
                            Geared up: @if ($unit->item1_id !== 0 OR $unit->item2_id !==0 OR $unit->item3_id !==0) yes @else no @endif  
                        </a>
                    </div>
                    <br>   
                @endif 
            @endforeach
        </div>
        <div class="col-6">
            <h4 class="light-header">Unequipped items:</h4>
            @foreach ($user_items as $user_item)
            @if($user_item->assigned==0)
            <div class="card">
                <div class="card-header">                    
                    {{$user_item->item->item_name}}        
                </div>
            </div>
            @endif
            @endforeach
            <h4 class="light-header">Equipped items:</h4>
            @foreach ($user_items as $user_item)
            @if($user_item->assigned==1)
            <div class="card">
                <div class="card-header">                    
                    {{$user_item->item->item_name}}        
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</div>


<!--POP-UP MODEL-->
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
