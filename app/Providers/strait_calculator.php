<?php


function aoes1($self, $opponant, &$battle_logs){
    $chance = random_int(1,100);

    if($chance > 75){
        $self->front_line["hp"] -= 35;
        $log="$self->playername's own units where hit by wreckless cannons for 35hp";
        array_push($battle_logs,$log);
    } 
}

function aoes2($self, $opponant, &$battle_logs){
    $chance = random_int(1,100);

    if($chance > 75){
        $damage = DB::table('unit_stats')->where('dev_code','aoes2')->first('stat_value')->stat_value;
        $self->back_line["hp"] -= $damage;
        $log="The army of ".$self->playername." was hit with its own firy plays";
        array_push($battle_logs,$log);
    } 
}


function aoe1($self, $opponant, &$battle_logs){

    $log = 'The code for "Succesfull emergancy landing" still has to be written'; 
    array_push($battle_logs,$log);
}

function aoestat1($self, $opponant, &$battle_logs){

    $opponant->front_line['armor']-=(count($opponant->outfit_ids)*5);
    $log = 'Speed of shadows greatly decreases the '.$opponant->playername.' front line armor';
    array_push($battle_logs,$log);

}

function aoestat2($self, $opponant, &$battle_logs){
    $unit_with_this_stat= DB::table('unit_stats')->where('dev_code','aoestat2')->first('unit_id')->unit_id;
    
    $position_check = DB::table('outfits')
    ->where('unit_id',$unit_with_this_stat)
    ->WhereIn('id',$self->outfit_ids)->first('position')->position;
    
    switch($position_check){
        case 1:
            $self->front_line["strength"]-=40;
            $log = $self->playername."'s Pine defender is not able to attack";
            array_push($battle_logs,$log);
        break;
        case 2:
            $self->center_line["strength"]-=40;
            $log = $self->playername."'s Pine defender is not able to attack";
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
        $self->front_line["magic_defence"]+= ($boost / 3);
        $self->center_line["magic_defence"]+= ($boost / 3);
        $log = "Boosting shouts bumped up the magic defence of ".$self->playername."'s army by ".$boost;
        array_push($battle_logs,$log);
    }

}