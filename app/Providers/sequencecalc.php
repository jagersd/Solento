<?php

function get_item_stats($outfit_item_id){
    if($outfit_item_id !== 0){
        $item_id = App\user_item::where('id',$outfit_item_id)->first('item_id');
        $item_stats= App\Item::where('id',$item_id->item_id)->first();
    } else {
        $item_stats= App\Item::where('id',0)->first();
    }
    return $item_stats;
}

class outfit_class{
    //properties
    public $front_line=[];
    public $center_line=[];
    public $back_line=[];
    public $front_line_winner=0;
    public $center_line_winner=0;
    public $back_line_winner=0;
    public $playername;
    public $outfit_ids=[];
    public $trait_ids=[];

    //methods

    public function set_stats($outfit){
        //set frontline
        $outfit_hp=[];
        $outfit_strength=[];
        $outfit_armor=[];
        $outfit_intellect=[];
        $outfit_magic_defence=[];
        $outfit_speed=[];

        foreach($outfit as $unit){
            if($unit->position == 1){
                $item1 = get_item_stats($unit->item1_id);
                $item2 = get_item_stats($unit->item2_id);
                $item3 = get_item_stats($unit->item3_id);
                
                array_push($outfit_hp, $unit->current_hp +( $item1->item_hp + $item2->item_hp + $item3->item_hp ));
                array_push($outfit_strength, $unit->base_details->strength +( $item1->item_strength + $item2->item_strength + $item3->item_strenth ));
                array_push($outfit_armor, $unit->base_details->armor +( $item1->item_armor + $item2->item_armor + $item3->item_armor ));
                array_push($outfit_intellect, $unit->base_details->intellect +( $item1->item_intellect + $item2->item_intellect + $item3->item_intellect ));
                array_push($outfit_magic_defence, $unit->base_details->magic_defence +( $item1->item_magic_defence + $item2->item_magic_defence + $item3->item_magic_defence ));
                array_push($outfit_speed, $unit->base_details->speed +( $item1->item_speed + $item2->item_speed + $item3->item_speed ));
            }
        }
        $this->front_line['hp'] = array_sum($outfit_hp);
        $this->front_line['strength'] = array_sum($outfit_strength);
        $this->front_line['armor'] = array_sum($outfit_armor);
        $this->front_line['intellect'] = array_sum($outfit_intellect);
        $this->front_line['magic_defence'] = array_sum($outfit_magic_defence);
        $this->front_line['speed'] = array_sum($outfit_speed);

        //set center line
        $outfit_hp=[];
        $outfit_strength=[];
        $outfit_armor=[];
        $outfit_intellect=[];
        $outfit_magic_defence=[];
        $outfit_speed=[];

        foreach($outfit as $unit){
            if($unit->position == 2){
                $item1 = get_item_stats($unit->item1_id);
                $item2 = get_item_stats($unit->item2_id);
                $item3 = get_item_stats($unit->item3_id);

                array_push($outfit_hp, $unit->current_hp +( $item1->item_hp + $item2->item_hp + $item3->item_hp ));
                array_push($outfit_strength, $unit->base_details->strength +( $item1->item_strength + $item2->item_strength + $item3->item_strenth ));
                array_push($outfit_armor, $unit->base_details->armor +( $item1->item_armor + $item2->item_armor + $item3->item_armor ));
                array_push($outfit_intellect, $unit->base_details->intellect +( $item1->item_intellect + $item2->item_intellect + $item3->item_intellect ));
                array_push($outfit_magic_defence, $unit->base_details->magic_defence +( $item1->item_magic_defence + $item2->item_magic_defence + $item3->item_magic_defence ));
                array_push($outfit_speed, $unit->base_details->speed +( $item1->item_speed + $item2->item_speed + $item3->item_speed ));
            }
        }
        $this->center_line['hp'] = array_sum($outfit_hp);
        $this->center_line['strength'] = array_sum($outfit_strength);
        $this->center_line['armor'] = array_sum($outfit_armor);
        $this->center_line['intellect'] = array_sum($outfit_intellect);
        $this->center_line['magic_defence'] = array_sum($outfit_magic_defence);
        $this->center_line['speed'] = array_sum($outfit_speed);

        //set back line
        $outfit_hp=[];
        $outfit_strength=[];
        $outfit_armor=[];
        $outfit_intellect=[];
        $outfit_magic_defence=[];
        $outfit_speed=[];

        foreach($outfit as $unit){
            if($unit->position == 3){
                $item1 = get_item_stats($unit->item1_id);
                $item2 = get_item_stats($unit->item2_id);
                $item3 = get_item_stats($unit->item3_id);

                array_push($outfit_hp, $unit->current_hp +( $item1->item_hp + $item2->item_hp + $item3->item_hp ));
                array_push($outfit_strength, $unit->base_details->strength +( $item1->item_strength + $item2->item_strength + $item3->item_strenth ));
                array_push($outfit_armor, $unit->base_details->armor +( $item1->item_armor + $item2->item_armor + $item3->item_armor ));
                array_push($outfit_intellect, $unit->base_details->intellect +( $item1->item_intellect + $item2->item_intellect + $item3->item_intellect ));
                array_push($outfit_magic_defence, $unit->base_details->magic_defence +( $item1->item_magic_defence + $item2->item_magic_defence + $item3->item_magic_defence ));
                array_push($outfit_speed, $unit->base_details->speed +( $item1->item_speed + $item2->item_speed + $item3->item_speed ));
            }
        }
        $this->back_line['hp'] = array_sum($outfit_hp);
        $this->back_line['strength'] = array_sum($outfit_strength);
        $this->back_line['armor'] = array_sum($outfit_armor);
        $this->back_line['intellect'] = array_sum($outfit_intellect);
        $this->back_line['magic_defence'] = array_sum($outfit_magic_defence);
        $this->back_line['speed'] = array_sum($outfit_speed);

        //add traits to array
        foreach($outfit as $unit){
            $add_to_traits = DB::table('unit_stats')->where('unit_id',$unit->unit_id)->get('dev_code');
            foreach($add_to_traits as $id){
                array_push($this->trait_ids,$id->dev_code);
            }
        }

        //add oufit_id to array
        foreach($outfit as $unit){
            array_push($this->outfit_ids,$unit->id);
        }
        
    }
}

//setup
$battle_lines =[];
$battle_logs=[];

$outfit1_calc = new outfit_class();
$outfit1_calc->set_stats($outfit1);
$outfit1_calc->playername=$username1;

$outfit2_calc = new outfit_class();
$outfit2_calc->set_stats($outfit2);
$outfit2_calc->playername=$username2;


/*
|
|
Calculation of unit's special traits
|
|
*/
require_once('strait_calculator.php');

array_push($battle_logs,"Complete battle logs for: $username1");

foreach ($outfit1_calc->trait_ids as $special_trait){
    $special_trait($outfit1_calc, $outfit2_calc,$battle_logs);
}

array_push($battle_logs,"Complete battle logs for: $username2");

foreach ($outfit2_calc->trait_ids as $special_trait){
    $special_trait($outfit2_calc, $outfit1_calc,$battle_logs);
}

/*
|
|
Actual outcome calculation
|
|
*/

//frontline
$speed_check_front_line = compare($outfit1_calc->front_line['speed'],$outfit2_calc->front_line['speed']);
if($speed_check_front_line > 0){
    $battle_lines += [1=>$username1." is quickest on the frontline"];
    //calculation if player1 is quickest on the front line
    $hp_remain = $outfit2_calc->front_line['hp'] - ($outfit1_calc->front_line['strength'] - $outfit2_calc->front_line['armor']);
    $hp_remain -= ($outfit1_calc->front_line['intellect'] - $outfit2_calc->front_line['magic_defence']);
    
    if($hp_remain < 0){
        $outfit1_calc->front_line_winner=1;
        $battle_lines += [2=>$username1." wins the battle on the front line"];
    } else {
        $outfit2_calc->front_line_winner=1;
        $battle_lines += [2=>$username2." wins the battle on the front line"];
    }

}   elseif ($speed_check_front_line < 0) {
    $battle_lines += [1=>$username2." is quickest on the frontline"];
    //calculation if player 2 is quickest
    $hp_remain = $outfit1_calc->front_line['hp'] - ($outfit2_calc->front_line['strength'] - $outfit1_calc->front_line['armor']);
    $hp_remain -= $outfit2_calc->front_line['intellect'] - $outfit1_calc->front_line['magic_defence'];

    if($hp_remain < 0){
        $outfit2_calc->front_line_winner=1;
        $battle_lines += [2=>$username2." wins the battle on the front line"];
    } else {
        $outfit1_calc->front_line_winner=1;
        $battle_lines += [2=>$username1." wins the battle on the front line"];
    }
}   else {
    $battle_lines += [1=>"Both players are equally slow in the frontline"];
    //calculation if both players have same speed on the front line
    $hp_remain1=$outfit1_calc->front_line['hp'] + ($outfit1_calc->front_line['armor']-$outfit2_calc->front_line['strength']) + ($outfit1_calc->front_line['intellect'] - $outfit2_calc->front_line['magic_defence']);
    $hp_remain2=$outfit2_calc->front_line['hp'] + ($outfit2_calc->front_line['armor']-$outfit1_calc->front_line['strength']) + ($outfit2_calc->front_line['intellect'] - $outfit1_calc->front_line['magic_defence']);

    if($hp_remain1>$hp_remain2){
        $outfit1_calc->front_line_winner=1;
        $battle_lines += [2=>$username1." wins the battle on the front line"];
    } elseif($hp_remain2>$hp_remain1){
        $outfit2_calc->front_line_winner=1;
        $battle_lines += [2=>$username2." wins the battle on the front line"];
    } else {
        $battle_lines += [2=>"The battle on the frontline ended in a stalemate"];
    }
}


//centerline
$speed_check_center_line = compare($outfit1_calc->center_line['speed'],$outfit2_calc->center_line['speed']);
if($speed_check_center_line > 0){
    $battle_lines += [10=>$username1." is quickest on the center line"];
    //calculation if player1 is quickest on the center line
    $hp_remain = $outfit2_calc->center_line['hp'] - ($outfit1_calc->center_line['strength'] - $outfit2_calc->center_line['armor']);
    $hp_remain -= $outfit1_calc->center_line['intellect'] - $outfit2_calc->center_line['magic_defence'];

    if($hp_remain < 0){
        $outfit1_calc->center_line_winner=1;
        $battle_lines += [11=>$username1." wins the battle on the center line"];
    } else {
        $outfit2_calc->center_line_winner=1;
        $battle_lines += [11=>$username2." wins the battle on the center line"];
    }

}   elseif ($speed_check_center_line < 0) {
    $battle_lines += [10=>$username2." is quickest on the center line"];
    //calculation if player 2 is quickest
    $hp_remain = $outfit1_calc->center_line['hp'] - ($outfit2_calc->center_line['strength'] - $outfit1_calc->center_line['armor']);
    $hp_remain -= $outfit2_calc->center_line['intellect'] - $outfit1_calc->center_line['magic_defence'];

    if($hp_remain < 0){
        $outfit2_calc->center_line_winner=1;
        $battle_lines += [11=>$username2." wins the battle on the center line"];
    } else {
        $outfit1_calc->center_line_winner=1;
        $battle_lines += [11=>$username1." wins the battle on the center line"];
    }
}   else {
    $battle_lines += [10=>"Both players are equally slow in the center line"];
    //calculation if both players have same speed on the center line
    $hp_remain1=$outfit1_calc->center_line['hp'] + ($outfit1_calc->center_line['armor']-$outfit2_calc->center_line['strength']) + ($outfit1_calc->center_line['intellect'] - $outfit2_calc->center_line['magic_defence']);
    $hp_remain2=$outfit2_calc->center_line['hp'] + ($outfit2_calc->center_line['armor']-$outfit1_calc->center_line['strength']) + ($outfit2_calc->center_line['intellect'] - $outfit1_calc->center_line['magic_defence']);

    if($hp_remain1>$hp_remain2){
        $outfit1_calc->center_line_winner=1;
        $battle_lines += [11=>$username1." wins the battle on the center line"];
    } elseif($hp_remain2>$hp_remain1){
        $outfit2_calc->center_line_winner=1;
        $battle_lines += [11=>$username2." wins the battle on the center line"];
    } else {
        $battle_lines += [11=>"The battle on the center line ended in a stalemate"];
    }
}

//backline
$speed_check_back_line = compare($outfit1_calc->back_line['speed'],$outfit2_calc->back_line['speed']);
if($speed_check_back_line > 0){
    $battle_lines += [20=>$username1." is quickest on the back line"];
    //calculation if player1 is quickest on the back line
    $hp_remain = $outfit2_calc->back_line['hp'] - ($outfit1_calc->back_line['strength'] - $outfit2_calc->back_line['armor']);
    $hp_remain -= $outfit1_calc->back_line['intellect'] - $outfit2_calc->back_line['magic_defence'];

    if($hp_remain < 0){
        $outfit1_calc->back_line_winner=1;
        $battle_lines += [21=>$username1." wins the battle on the back line"];
    } else {
        $outfit2_calc->back_line_winner=1;
        $battle_lines += [21=>$username2." wins the battle on the back line"];
    }

}   elseif ($speed_check_back_line < 0) {
    $battle_lines += [20=>$username2." is quickest on the back line"];
    //calculation if player 2 is quickest
    $hp_remain = $outfit1_calc->back_line['hp'] - ($outfit2_calc->back_line['strength'] - $outfit1_calc->back_line['armor']);
    $hp_remain -= $outfit2_calc->back_line['intellect'] - $outfit1_calc->back_line['magic_defence'];

    if($hp_remain < 0){
        $outfit2_calc->back_line_winner=1;
        $battle_lines += [21=>$username2." wins the battle on the back line"];
    } else {
        $outfit1_calc->back_line_winner=1;
        $battle_lines += [21=>$username1." wins the battle on the back line"];
    }dd($battlecode);
}   else {
    $battle_lines += [20=>"Both players are equally slow in the back line"];
    //calculation if both players have same speed on the back line
    $hp_remain1=$outfit1_calc->back_line['hp'] + ($outfit1_calc->back_line['armor']-$outfit2_calc->back_line['strength']) + ($outfit1_calc->back_line['intellect'] - $outfit2_calc->back_line['magic_defence']);
    $hp_remain2=$outfit2_calc->back_line['hp'] + ($outfit2_calc->back_line['armor']-$outfit1_calc->back_line['strength']) + ($outfit2_calc->back_line['intellect'] - $outfit1_calc->back_line['magic_defence']);

    if($hp_remain1>$hp_remain2){
        $outfit1_calc->back_line_winner=1;
        $battle_lines += [21=>$username1." wins the battle on the back line"];
    } elseif($hp_remain2>$hp_remain1){
        $outfit2_calc->back_line_winner=1;
        $battle_lines += [21=>$username2." wins the battle on the back line"];
    } else {
        $battle_lines += [21=>"The battle on the back line ended in a stalemate"];
    }
}

$player1_score = ($outfit1_calc->front_line_winner + $outfit1_calc->center_line_winner + $outfit1_calc->back_line_winner);
$player2_score = ($outfit2_calc->front_line_winner + $outfit2_calc->center_line_winner + $outfit2_calc->back_line_winner);

function compare($value1, $value2){
    return $value1 - $value2;
}

/*
|
|
Processing results and awards
|
|
*/

unit_reward($battlecode);
item_reward($battlecode);

if($player1_score > $player2_score){
    $battle_lines[100]=$outfit1_calc->playername." has come out victorious in this match";
    DB::table('battles')->where('battlecode',$battlecode)->update([
        'result'=>$battle_details->player1
    ]);

    process_victorypoints($battle_details->player1, $battle_details->player2);
    
} else {
    $battle_lines[100]=$outfit2_calc->playername." has come out victorious in this match";
    DB::table('battles')->where('battlecode',$battlecode)->update([
        'result'=>$battle_details->player2
    ]);

    process_victorypoints($battle_details->player2, $battle_details->player1);
}


function process_victorypoints($winner, $loser){
    $vp_winner = DB::table('stocks')->where('user_id',$winner)->first('victory_points')->victory_points;
    $vp_winner =ceil($vp_winner * 1.05);
    $vp_loser = DB::table('stocks')->where('user_id',$loser)->first('victory_points')->victory_points;
    $vp_loser =ceil($vp_loser * 0.95);
    
    DB::table('stocks')->where('user_id',$winner)->update(['victory_points'=>$vp_winner]);
    DB::table('stocks')->where('user_id',$loser)->update(['victory_points'=>$vp_loser]);
}

function unit_reward($battlecode){
    $chance = random_int(1,100);
    $unit_id = random_int(1,27);
    if($chance > 95){
        DB::table('battles')->where('battlecode',$battlecode)->update([
            'awarded_unit' => $unit_id
        ]);
    }
}

function item_reward($battlecode){
    $chance = random_int(1,100);
    $item_id = random_int(1,4);
    if($chance > 85){
        DB::table('battles')->where('battlecode',$battlecode)->update([
            'awarded_item' => $item_id
        ]);
    }
}

?>