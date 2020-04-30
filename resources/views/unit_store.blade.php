@extends('layouts.app')

@section('content')
<a href="/home"><--- Go Back</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Units Catalogue for {{auth::user()->name}} who has <b id="gold_amount">{{$gold_amount->gold_amount}}</b> gold to spend!</div>
                    <form action="?" methode="POST">
                        <div class="container-flex">
                            @foreach ($allraces as $race)
                                <h4>{{$race->name}}</h4>
                                    <div class="row store_unit">
                                        @foreach ($race->base_units as $unit)
                                        <div class="col-4">
                                                <p><b>{{$unit->name}}</b></p>
                                                <p class="unit_description">{{$unit->description}}</p>
                                                <p id="unit_cost">Price: {{$unit->cost}} gold</p>
                                        </div>
                                        <div class="col-4">
                                            <ul class="unit_stat_list">
                                                <li class="unit_stats">HP: {{$unit->hp}}</li>
                                                <li class="unit_stats">Armor: {{$unit->armor}}</li>
                                                <li class="unit_stats">Strenth: {{$unit->strength}}</li>
                                                <li class="unit_stats">Intellect: {{$unit->intellect}}</li>
                                                <li class="unit_stats">Speed: {{$unit->speed}}</li>
                                            </ul>  
                                        </div>
                                        <div class="justify-content-center col-4">
                                            <label for="unit_selector">Consider adding this unit to your roster?</label>
                                            <input type="checkbox" id="unit_selector" name="unit_selector" value="?">
                                        </div>    
                                        @endforeach
                                    </div>
                            @endforeach
                        </div>
                    </form>  
                </div>                
            </div>
        </div>
    </div>
</div>

<script>


var selector = document.querySelector("input[name=unit_selector]");

selector.addEventListener('change', function () {
  
    let goldAmount=document.getElementById("gold_amount").innerText;
    let price= parseInt(document.getElementById("unit_cost").innerText.replace(/[^0-9\.]/g, ''));

    
    
    if (this.checked){
        goldAmount=goldAmount-price;
        console.log('event!');
    } else {
        goldAmount=goldAmount+price;
    }
})



</script>

@endsection
