<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Auth;
Use App\outfit;
Use App\battle;
Use App\user_item;
Use App\Item;
Use App\Stock;
Use App\Base_unit;


class BattlesController extends Controller
{
    /**
     * Provides an overview before going into a match. Also checks if the max outfit weight allows the player to find a match. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $outfit_overview = outfit::where('user_id' , auth::user()->id)->where('active',1)->where('deleted',0)->get(['position','name']);
        $outfit_weight = outfit::where('user_id' , auth::user()->id)->where('active', 1)->where('deleted',0)->sum('outfit_weight');
        
        
        if($outfit_weight > auth::user()->stock->first('max_outfit')){
            return redirect()->action('OutfitsController@index');
        } else{
            return view('battle/prepare', compact('outfit_overview'));
        }  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sequence($battlecode)
    {   
        $battle_details = battle::where('battlecode',$battlecode)->first();
        $username1 = DB::table('users')->where('id',$battle_details->player1)->first()->name;
        $username2 = DB::table('users')->where('id',$battle_details->player2)->first()->name;
        $outfit1 = outfit::where('user_id',$battle_details->player1)->where('active',1)->where('deleted',0)->get();
        $outfit2 = outfit::where('user_id',$battle_details->player2)->where('active',1)->where('deleted',0)->get();
        $faction1 = DB::table('races')->leftJoin('user_races','races.id','=','user_races.race_id')->where('user_races.user_id',$battle_details->player1)->first()->name;
        $faction2 = DB::table('races')->leftJoin('user_races','races.id','=','user_races.race_id')->where('user_races.user_id',$battle_details->player2)->first()->name;
        $complete_code = substr(str_shuffle('123456789'),1,5);
        $field = DB::table('fields')->where('id',$battle_details->field_id)->first();
        battle::where('battlecode',$battlecode)->update(['closed'=>$complete_code]);

        include_once(app_path() . '/Providers/sequencecalc.php');

        return view('battle/sequence', compact('battlecode','battle_details','username1','username2','outfit1','outfit2','outfit1_calc','outfit2_calc','battle_lines','battle_logs','complete_code','field','faction1','faction2'));
    }

    /**
     * Create or update new battle record
     *
     * @return \Illuminate\Http\Response
     */
    public function create_or_update(Request $request)
    {   
        $joinchecker = battle::where('player2', null)->first('battlecode');

        if ( $joinchecker == null){
            $battlecode= substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,50);
            $max_fields= DB::table('fields')->count();
            $field= random_int(1,$max_fields);

            battle::create([
                'player1'=>auth::user()->id,
                'battlecode'=>$battlecode,
                'field_id'=>$field
            ]);
            return redirect()->action('BattlesController@battle', ['battlecode'=>$battlecode]);
        } else {
            $battlecode = $joinchecker->battlecode;
            battle::where('battlecode',$battlecode)
            ->update(['player2'=>auth::user()->id]);
            return redirect()->action('BattlesController@battle', ['battlecode'=>$battlecode]);
        }       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete_sequence($complete_code)
    {   
        $claimed_checker = battle::where('closed',$complete_code)->first('claimed')->claimed;
        if($claimed_checker == 0){
            $battle_result = battle::where('closed', $complete_code)->first();
            
            //add gold_reward
            $stock = Stock::where('user_id',$battle_result->result)->first();
            $stock->gold_amount += $battle_result->awarded_gold;
            $stock->save();

            //add won unit to outfit
            if($battle_result->awarded_unit != null){
                $won_unit = Base_unit::where('id',$battle_result->awarded_unit)->first();
                outfit::create([
                    'user_id'=>$battle_result->result,
                    'unit_id'=>$won_unit->id,
                    'current_hp'=>$won_unit->hp,
                    'name'=>$won_unit->name,
                    'position'=>$won_unit->preferred_position,
                    'outfit_weight'=>$won_unit->outfit_weight,
                    'sell_price'=>$won_unit->cost / 2
                ]);
            } else $won_unit = '';

            //add item to user_item
            if($battle_result->awarded_item != null){
                $won_item = Item::where('id',$battle_result->awarded_item)->first();
                user_item::create([
                    'user_id'=>$battle_result->result,
                    'item_id'=>$won_item->id    
                ]);
            } else $won_item = '';


            battle::where('battlecode',$battle_result->battlecode)->update(['claimed'=>1]);


            return view('battle/complete', compact('battle_result','won_unit','won_item'));
        } else {
            return view('message/loot_claimed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function battle($battlecode)
    {   
        $battle_details = battle::where('battlecode',$battlecode)->first();
        return view('battle/field', compact('battlecode','battle_details'));
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
