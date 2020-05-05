<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;
use App\Base_unit;
use App\Stock;
use Auth;
use App\outfit;


class Unit_storeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $allraces = Race::all();
        $gold_amount = Stock::where('user_id',auth::user()->id)->first('gold_amount');
        return view('unit_store', compact('allraces','gold_amount'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unit_index($id)
    {   
        Base_unit::findOrFail($id);
        $unit=Base_unit::where('id',$id)->first();
        $gold_amount = Stock::where('user_id',auth::user()->id)->first('gold_amount');
        return view('units', compact('id','unit','gold_amount'));
    }

    /**
     * Purchasing units execution.
     *
     * @return \Illuminate\Http\Response
     */
    public function buy_unit(Request $request)
    {   //fetch required elements
        $data = $request->all();
        $purchaseUnit = Base_unit::where('id',$data['unit_id'])->first();

        $current_stock=Stock::where('user_id',auth::user()->id)->first('gold_amount');
        $new_gold_amount = $current_stock->gold_amount - $purchaseUnit->cost;

        //execute purchase after if statement for security
        if($purchaseUnit->cost <= $current_stock->gold_amount){

            outfit::create([
                'user_id'=>auth::user()->id,
                'unit_id'=>$data['unit_id'],
                'current_hp'=>$purchaseUnit->hp,
                'name'=>$purchaseUnit->name,
                'position'=>$purchaseUnit->preferred_position,
                'outfit_weight'=>$purchaseUnit->outfit_weight
            ]);
            
            Stock::where('user_id',auth::user()->id)
            ->update(array('gold_amount'=>$new_gold_amount));    
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
