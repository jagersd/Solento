<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Auth;
Use App\outfit;
Use App\battle;
Use App\user_item;
Use App\Item;


class BattlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outfit_overview = outfit::where('user_id' , auth::user()->id)->where('active',1)->get(['position','name']);
        return view('battle/prepare', compact('outfit_overview'));
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
        $outfit1 = outfit::where('user_id',$battle_details->player1)->where('active',1)->get();
        $outfit2 = outfit::where('user_id',$battle_details->player2)->where('active',1)->get();

        include_once(app_path() . '/Providers/sequencecalc.php');

        return view('battle/sequence', compact('battlecode','battle_details','username1','username2','outfit1','outfit2','outfit1_calc','outfit2_calc','battle_lines','battle_logs'));
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

            battle::create([
                'player1'=>auth::user()->id,
                'battlecode'=>$battlecode
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
