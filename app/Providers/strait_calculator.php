<?php


function aoes1($self, $opponant, &$battle_logs){
    $chance = random_int(1,100);

    if($chance > 50){
        $self->front_line["hp"] -= 35;
        $log="Wreckless Cannons hit its own allies for 35 hp";
        array_push($battle_logs,$log);
    } 
}

function aoestat2($self, $opponant, &$battle_logs){
    $unit_with_this_stat= DB::table('unit_stats')->where('dev_code','aoestat2')->first('unit_id')->unit_id;
    
    $position_check = DB::table('outfits')
    ->where('unit_id',$unit_with_this_stat)
    ->WhereIn('id',$self->outfit_ids)->first('position')->position;
    
    switch($position_check){
        case 1:
            $self->front_line["strength"]-=40;
            $log = 'The pine defender is not able to attack';
            array_push($battle_logs,$log);
        break;
        case 2:
            $self->center_line["strength"]-=40;
            $log = 'The pine defender is not able to attack';
            array_push($battle_logs,$log);
        break;
    }

}

function aoestat3($self, $opponant, &$battle_logs){

    $unit_with_this_stat= DB::table('unit_stats')->where('dev_code','aoestat3')->first('unit_id')->unit_id;
    
    $position_check = DB::table('outfits')
    ->where('unit_id',$unit_with_this_stat)
    ->WhereIn('id',$self->outfit_ids)->first('position')->position;

    if($position_check == 3){
        $boost= 35 * count($self->outfit_ids);
        echo $boost;
        $self->front_line["magic_defence"]+= ($boost / 3);
        $self->center_line["magic_defence"]+= ($boost / 3);
        $log = 'Boosting shouts bumped up the magic defence of the army by '.$boost;
        array_push($battle_logs,$log);
    }

}