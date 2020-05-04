@extends('layouts.app')

@section('content')
<a href="/item_store"><--- Go Back</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$item->item_name}}</div>
                <p>{{$item->item_description}}</p>
                <ul>
                    <li>HP: {{$item->item_hp}}</li>
                    <li>Strenght:{{$item->item_strength}}</li>
                    <li>Armor:{{$item->item_armor}}</li>
                    <li>Intellect:{{$item->item_intellect}}</li>
                    <li>Defence to magic: {{$item->item_magic_defence}}</li>
                    <li>Speed:{{$item->item_speed}}</li>
                </ul>
                <hr>
                <p>Special traits:</p>
                
                @if(count($item->abilities)>0)
                    
                        @foreach ($item->abilities as $ability)
                        <u>{{$ability['item_stat_name']}}:</u>
                        <p>{{$ability['item_stat_description']}}</p>
                        @endforeach
                @else
                
                <p>This item does not have special traits. What you see is what you get, and it's good.</p>
                    
                @endif
                
                <div class="card-footer">Cost: {{$item->item_cost}}<br>
                    Gold to spend: {{$gold_amount->gold_amount}}
                    <br>
                    @if($item->item_cost <= $gold_amount->gold_amount)
                    <button class="btn btn-dark" href="#signupModal" data-toggle="modal" type="submit"  id="confirmation_request">Add item to your stash</button>
                    @endif
                    <button class="btn btn-dark" onclick="location.href='/item_store'" type="button">back to item overview</button>
                </div>      
            </div>
        </div>
    </div>
</div>


<div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 

            <!-- Modal root -->
            <div class="m-header"> 
                <h2 class="myModalLabel"> Are you sure you want to spend your gold on the {{$item->item_name}} </h2> 
            </div> 


            <!-- Modal footer -->
            <div class="footer"> 
                <form method="POST" action="{{ action('Item_storeController@buy_item') }}">
                {{ csrf_field() }}
                <input type="hidden" id="item_id" name="item_id" value="{{$item->id}}">
                <button class="btn btn-dark" type="submit">Confirm</button>
                <button class="btn btn-dark" data-toggle="modal" data-dismiss="modal" >Return</button>
                </form>
            </div> 

        </div> 
    </div> 
</div> 


@endsection
