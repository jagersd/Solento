<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
Use App\outfit;
Use App\battle;

class BattlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('battle/prepare');
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
