<?php
// setup
// class abilities{

//     public function __call($method, $args){
//         if(isset($this->$method)){
//             $func = $this->$method;
//             return call_user_func_array($func, $args);
//         }
//     }
    
// }

// $excutable_ablities = new abilities();

// // call functions

// $excutable_ablities->aoes1 = function(){
    
//     $chance = random_int(1,100);

// };

function aoes1($outfit1_calc, $outfit2_calc){
    $chance = random_int(1,100);
    if($chance > 50){
        $outfit1_calc->center_line["hp"] = $outfit1_calc->center_line["hp"] -50;
    }
}
