let ctx = document.getElementById('statChart').getContext("2d");
let statHP = document.getElementById('stat_hp').innerText.split(',');
let statSTR = document.getElementById('stat_strength').innerText.split(',');
let statARM = document.getElementById('stat_armor').innerText.split(',');
let statINT = document.getElementById('stat_intellect').innerText.split(',');
let statMD = document.getElementById('stat_magic_defence').innerText.split(',');
let statSP = document.getElementById('stat_speed').innerText.split(',');

  
let radarChart = new Chart(statChart, {
  type: 'radar',
  data: {
    labels: ["HP", "Strength ", "Armor", "Intellect", "Magic Defence", "Speed"],
    datasets: [
      {
      label: "Base Stats",
      backgroundColor: "rgba(0,72,86,1)",
      data: [statHP[0], statSTR[0], statARM[0], statINT[0], statMD[0], statSP[0]]
    },{
        label: "Stats including items",
        backgroundColor: "rgba(135,162,171,1)",
        data: [statHP[1], statSTR[1], statARM[1], statINT[1], statMD[1], statSP[1]]
    }
  ]
  },
  options:{
    legend: {
      display: true,
    },
    scale: {
      ticks:{
        beginAtZero: true,
        max:100,
        min: 0,
        stepSize: 10,
        display: false
      },
      pointLabels:{
        fontSize: 14
      }
    },
    borderJoinStyle:"round"
  }
});

/*
|
Equip items section
|
*/

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
