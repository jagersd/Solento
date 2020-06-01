<?php

class outfit_class{
    //properties
    public $front_line=[];
    public $center_line=[];
    public $back_line=[];

    //methods
    function set_stats($outfit){
        //set frontline
        $outfit_hp=[];
        $outfit_strength=[];
        $outfit_armor=[];
        $outfit_intellect=[];
        $outfit_magic_defence=[];
        $outfit_speed=[];

        foreach($outfit as $unit){
            if($unit->position == 1){
            array_push($outfit_hp, $unit->current_hp);
            array_push($outfit_strength, $unit->base_details->strength);
            array_push($outfit_armor, $unit->base_details->armor);
            array_push($outfit_intellect, $unit->base_details->intellect);
            array_push($outfit_magic_defence, $unit->base_details->magic_defence);
            array_push($outfit_speed, $unit->base_details->speed);
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
            array_push($outfit_hp, $unit->current_hp);
            array_push($outfit_strength, $unit->base_details->strength);
            array_push($outfit_armor, $unit->base_details->armor);
            array_push($outfit_intellect, $unit->base_details->intellect);
            array_push($outfit_magic_defence, $unit->base_details->magic_defence);
            array_push($outfit_speed, $unit->base_details->speed);
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
            array_push($outfit_hp, $unit->current_hp);
            array_push($outfit_strength, $unit->base_details->strength);
            array_push($outfit_armor, $unit->base_details->armor);
            array_push($outfit_intellect, $unit->base_details->intellect);
            array_push($outfit_magic_defence, $unit->base_details->magic_defence);
            array_push($outfit_speed, $unit->base_details->speed);
            }
        }
        $this->back_line['hp'] = array_sum($outfit_hp);
        $this->back_line['strength'] = array_sum($outfit_strength);
        $this->back_line['armor'] = array_sum($outfit_armor);
        $this->back_line['intellect'] = array_sum($outfit_intellect);
        $this->back_line['magic_defence'] = array_sum($outfit_magic_defence);
        $this->back_line['speed'] = array_sum($outfit_speed);

    }

}

$outfit1_calc = new outfit_class();
$outfit1_calc->set_stats($outfit1);

$outfit2_calc = new outfit_class();
$outfit2_calc->set_stats($outfit2);

$front_line_hp_vs= $outfit1_calc->front_line['hp'] - $outfit2_calc->front_line['hp'];

?>