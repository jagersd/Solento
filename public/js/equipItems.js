
const button1 = document.getElementById("slot1btn");
const button2 = document.getElementById("slot2btn");
const button3 = document.getElementById("slot3btn");

let toChange = document.querySelectorAll("#item_input");

if(button1){
    button1.addEventListener("click", function(){

        let i;
        for (i=0; i < toChange.length; i++){
            toChange[i].setAttribute("name", "available_item1")
        }
    });
}

if(button2){
    button2.addEventListener("click", function(){

        let i;
        for (i=0; i < toChange.length; i++){
            toChange[i].setAttribute("name", "available_item2")
        }
    });
}

if(button3){
    button3.addEventListener("click", function(){

        let i;
        for (i=0; i < toChange.length; i++){
            toChange[i].setAttribute("name", "available_item3")
        }
    });
}

