<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Base_unit;
use Auth;
use App\outfit;
use App\user_item; 
use App\Item;
use App\Stock;

class OutfitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $max_outfit = auth::user()->stock->first('max_outfit')->max_outfit;
        $units = outfit::where('user_id', auth::user()->id)->where('deleted',0)->get();
        $active_weight= outfit::where('user_id', auth::user()->id)->where('deleted',0)->where('active',1)->sum('outfit_weight');
        $user_items = user_item::where('user_id', auth::user()->id)->get();

        $outfit_stats = array('hp'=>0, 'strength'=>0, 'armor'=>0, 'intellect'=>0, 'magic_defence'=>0, 'speed'=>0);

        foreach($units as $unit){
            $stat_calc_array = Base_unit::where('id',$unit->unit_id)->select('hp','armor','strength','intellect','magic_defence','speed')->first();
            $outfit_stats['hp'] += $stat_calc_array['hp'];
            $outfit_stats['strength'] += $stat_calc_array['strength'];
            $outfit_stats['armor'] += $stat_calc_array['armor'];
            $outfit_stats['intellect'] += $stat_calc_array['intellect'];
            $outfit_stats['magic_defence'] += $stat_calc_array['magic_defence'];
            $outfit_stats['speed'] += $stat_calc_array['speed'];
        }

        foreach($user_items as $item){
            $stat_calc_array = Item::where('id',$item->item_id)->select('item_hp','item_armor','item_strength','item_intellect','item_magic_defence','item_speed')->first();
            $outfit_stats['hp'] += $stat_calc_array['item_hp'];
            $outfit_stats['strength'] += $stat_calc_array['item_strength'];
            $outfit_stats['armor'] += $stat_calc_array['item_armor'];
            $outfit_stats['intellect'] += $stat_calc_array['item_intellect'];
            $outfit_stats['magic_defence'] += $stat_calc_array['item_magic_defence'];
            $outfit_stats['speed'] += $stat_calc_array['item_speed'];
        }

        return view('outfit', compact('units','user_items','max_outfit','active_weight','outfit_stats'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailindex($id)
    {
        $data = Crypt::decrypt($id);
        $unit_stats = outfit::where('id', $data)->first();
        $user_items = user_item::where('user_id', auth::user()->id)->get();

        if($unit_stats->item1_id != 0){
            $item1 = Item::where('id', user_item::where('id' ,$unit_stats->item1_id)->first('item_id')->item_id)->first();
        }   else $item1 = Item::where('id' , '=' , 0)->first();
        if($unit_stats->item2_id != 0){
            $item2 = Item::where('id', user_item::where('id',$unit_stats->item2_id)->first('item_id')->item_id)->first();
        } else $item2 = Item::where('id' , '=' , 0)->first();
        if($unit_stats->item3_id != 0){
            $item3 = Item::where('id', user_item::where('id',$unit_stats->item3_id)->first('item_id')->item_id)->first();
        } else $item3 = Item::where('id' , '=' , 0)->first();
        
        return view('outfit/details', compact('id', 'unit_stats','user_items','item1','item2','item3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function editPosition(Request $request)
    {
        if($request->position_on_field){
            outfit::where('id', $request->outfit_id)
            ->update(['position'=>$request->position_on_field]);
        }

        if(isset($request->active_inactive)){
            outfit::where('id', $request->outfit_id)
            ->update(['active'=>$request->active_inactive]);
        }
        return redirect()->back();
    }

    /**
     * Update unit name
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function namechange(Request $request)
    {
        outfit::where('id',$request->outfit_id)
            ->update(array('name'=>$request->outfit_name));

        return redirect()->action('OutfitsController@index');
    }

    /**
     * Update records required for updating items
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function equipItems(Request $request)
    {   
        $unit = outfit::where('id', $request->outfit_id)->first();

        if($request->available_item1){
            if($unit->item1_id != 0){
                outfit::where('id', $request->outfit_id)
                ->update(['item1_id'=> 0]);
                user_item::where('id', $unit->item1_id)
                ->update(['assigned'=>0]);
            }

            outfit::where('id', $request->outfit_id)
            ->update(['item1_id'=>$request->available_item1]);

            user_item::where('id',$request->available_item1)
            ->update(['assigned'=>1]);
        }

        if($request->available_item2){
            if($unit->item2_id != 0){
                outfit::where('id', $request->outfit_id)
                ->update(['item2_id'=> 0]);
                user_item::where('id', $unit->item2_id)
                ->update(['assigned'=>0]);
            }
            outfit::where('id', $request->outfit_id)
            ->update(['item2_id'=>$request->available_item2]);

            user_item::where('id',$request->available_item2)
            ->update(['assigned'=>1]);
        }

        if($request->available_item3){
            if($unit->item3_id != 0){
                outfit::where('id', $request->outfit_id)
                ->update(['item3_id'=> 0]);
                user_item::where('id', $unit->item3_id)
                ->update(['assigned'=>0]);
            }
            outfit::where('id', $request->outfit_id)
            ->update(['item3_id'=>$request->available_item3]);

            user_item::where('id',$request->available_item3)
            ->update(['assigned'=>1]);
        }
        return redirect()->back();
    }

    /**
     * Update records required for updating items
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function unequipItems(Request $request)
    {   
        $unit = outfit::where('id', $request->outfit_id)->first();

        user_item::where('id', $unit->item1_id)->update(['assigned'=>0]);
        user_item::where('id', $unit->item2_id)->update(['assigned'=>0]);
        user_item::where('id', $unit->item3_id)->update(['assigned'=>0]);

        outfit::where('id', $request->outfit_id)
        ->update([
        'item1_id'=>0,
        'item2_id'=>0,
        'item3_id'=>0,
        ]);

        return redirect()->back();
    }

    /**
     * Update records required for updating items
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function sell_unit(Request $request)
    {   
        $unit = outfit::where('id', $request->outfit_id)->first();

        user_item::where('id', $unit->item1_id)->update(['assigned'=>0]);
        user_item::where('id', $unit->item2_id)->update(['assigned'=>0]);
        user_item::where('id', $unit->item3_id)->update(['assigned'=>0]);

        outfit::where('id', $request->outfit_id)
        ->update([
        'item1_id'=>0,
        'item2_id'=>0,
        'item3_id'=>0,
        'deleted'=>1
        ]);

        $user_id_checker = outfit::where('id',$request->outfit_id)->first('user_id')->user_id;
        
        if($user_id_checker == Auth::user()->id){
        
            $new_stock = Stock::where('user_id', Auth::user()->id)->first('gold_amount')->gold_amount + $request->sell_price;

            Stock::where('user_id', Auth::user()->id)
            ->update([
                'gold_amount'=>$new_stock
            ]);

            
        }

        return redirect()->action('OutfitsController@index');

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
