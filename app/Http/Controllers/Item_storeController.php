<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use App\Stock;
Use App\Item;
USE App\user_item;

class Item_storeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $allitems = Item::select('id','item_name','item_cost')->where('in_store','=', 1)-> get();
        $gold_amount = Stock::where('user_id',auth::user()->id)->first('gold_amount');

        return view('item_store', compact('gold_amount', 'allitems'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item_index($id)
    {
        Item::findOrFail($id);
        $item=Item::where('id',$id)->first();
        $gold_amount = Stock::where('user_id',auth::user()->id)->first('gold_amount');   

        return view('items', compact('id','item','gold_amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buy_item(Request $request)
    {
        //fetch required elements
        $data = $request->all();
        $purchaseItem = Item::where('id',$data['item_id'])->first();

        $current_stock=Stock::where('user_id',auth::user()->id)->first('gold_amount');
        $new_gold_amount = $current_stock->gold_amount - $purchaseItem->item_cost;

        //execute purchase after if statement for security
        if($purchaseItem->item_cost <= $current_stock->gold_amount){

            user_item::create([
                'user_id'=>auth::user()->id,
                'item_id'=>$data['item_id'],
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
