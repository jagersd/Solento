@extends('layouts.app')

@section('content')
<a href="/home"><--- Go Back</a>
<div class="container">
    <div class="row">
        <div class="col-6">
            @foreach ($units as $unit)
            <?php $parameter =['id' =>$unit->id,]; $parameter= Crypt::encrypt($parameter);?>
            <div class="card">
                <div class="card-header">{{$unit->name}} <button class="btn btn-dark" href="#signupModal{{$unit->id}}" data-toggle="modal" type="submit"  id="confirmation_request">Change unit name</button> </div>

                <a href="{{url('outfit/details',$parameter)}}" class="dark-list-group-item list-group-item-action">Unit: {{$unit->base_details->name}}
                    <br><br>
                    <ul>Gear equipped:
                        <li>ruimte voor equiped items</li>
                    </ul>
                    <ul>Position in formation:
                        <li>{{$unit->formation->position}}</li>
                    </ul>
                </a>

            </div>    
            @endforeach
        </div>
        <div class="col-6">
            <p>ruimte voor formatie index</p>
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
