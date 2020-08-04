<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Race;
use App\User_race;
use Auth;
use Carbon\Carbon;

class User_racesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $userraces= DB::table('user_races')
        ->leftjoin('races', 'user_races.race_id','=','races.id')
        ->where('user_races.user_id','=', Auth::id())
        ->get('races.name');

        $allraces= Race::all();

        $online_count = DB::table('users')->where('last_action', '>', Carbon::now()->subMinutes(5))->count();
        $match_searches = DB::table('battles')->where('player2',null)->count();
        $total_matches_today = DB::table('battles')->where('created_at', '>', Carbon::now()->subDays(1))->count();

        return view('home', [
            'userraces'=>$userraces,
            'allraces'=>$allraces,
            'online_count'=>$online_count,
            'match_searches'=>$match_searches,
            'total_matches_today'=>$total_matches_today,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $data)
    {
            User_race::create([
            'user_id'=>$data['user_id'],
            'race_id'=>$data['race_choice'],
        ]);

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
