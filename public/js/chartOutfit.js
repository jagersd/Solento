
// let statHP = document.getElementById('stat_hp').innerText.split(',');
// let statSTR = document.getElementById('stat_strength').innerText.split(',');
// let statARM = document.getElementById('stat_armor').innerText.split(',');
// let statINT = document.getElementById('stat_intellect').innerText.split(',');
// let statMD = document.getElementById('stat_magic_defence').innerText.split(',');
// let statSP = document.getElementById('stat_speed').innerText.split(',');


// console.log(typeof statHP[0]);


  
// let radarChart = new Chart(statChart, {
//   type: 'radar',
//   data: {
//     labels: ["HP", "Strength ", "Armor", "Intellect", "Magic Defence", "Speed"],
//     datasets: [
//       {
//       label: "Base Stats",
//       backgroundColor: "rgba(0,72,86,1)",
//       data: [statHP[0], statSTR[0], statARM[0], statINT[0], statMD[0], statSP[0]]
//     },{
//         label: "Stats including items",
//         backgroundColor: "rgba(135,162,171,1)",
//         data: [statHP[1], statSTR[1], statARM[1], statINT[1], statMD[1], statSP[1]]
//     }
//   ]
//   },
//   options:{
//     legend: {
//       display: true,
//     },
//     scale: {
//       ticks:{
//         beginAtZero: true,
//         max:100,
//         min: 0,
//         stepSize: 10,
//         display: false
//       },
//       pointLabels:{
//         fontSize: 14
//       }
//     },
//     borderJoinStyle:"round"
//   }
// });

let factionNamesNode = document.querySelectorAll('#factionName');
let factionNamesArray= [].slice.call(factionNamesNode);
let factionNames = [];
let ctx = document.getElementById('factionChart').getContext("2d");

let i;
for (i=0; i < factionNamesArray.length; i++){
  factionNames.push(factionNamesArray[i].innerText);
}

function label_data_contructor(arr) {
  var a = [], b = [], prev;

  arr.sort();
  for ( var i = 0; i < arr.length; i++ ) {
      if ( arr[i] !== prev ) {
          a.push(arr[i]);
          b.push(1);
      } else {
          b[b.length-1]++;
      }
      prev = arr[i];
  }
  return [a, b];
}

let factionData = label_data_contructor(factionNames);

function backgroundColorCreator(factionsarray, arr) {
  let c = 86;
  for (var i=0; i < factionsarray.length; i++){
    arr.push('rgba(0,72,'+c+',0.7)');
    c-= (76/factionsarray.length); 
  }
}

let backgroundColors=[];
backgroundColorCreator(factionData[0], backgroundColors);

var factionChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels:factionData[0],
    datasets: [
      {
          fill: true,
          backgroundColor: backgroundColors,
          data: factionData[1],
          borderColor: 'white',
          borderWidth: 1,
      }
  ]
  },
  options:{
        legend: {
          display: false,
        },
        plugins: {
          labels: {
            render: 'label',
            fontColor: 'white',
            fontSize: 14
          },
        },


      }
});