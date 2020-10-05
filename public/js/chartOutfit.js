let outfitHP = document.getElementById('outfitHP').innerText;
let outfitStrength = document.getElementById('outfitStrength').innerText;  
let outfitArmor = document.getElementById('outfitArmor').innerText;  
let outfitIntellect = document.getElementById('outfitIntellect').innerText;  
let outfitMagicDefence = document.getElementById('outfitMagicDefence').innerText;
let outfitSpeed = document.getElementById('outfitSpeed').innerText;  



let radarChart = new Chart(outfitStatChart, {
  type: 'radar',
  data: {
    labels: ["HP", "Strength ", "Armor", "Intellect", "Magic Defence", "Speed"],
    datasets: [
      {
      backgroundColor: "rgba(255,255,255,0.5)",
      data: [outfitHP, outfitStrength, outfitArmor, outfitIntellect, outfitMagicDefence, outfitSpeed]
    },
  ]
  },
  options:{
    legend: {
      display: false,
    },
    scale: {
      ticks:{
        beginAtZero: true,
        min: 0,
        stepSize: 10,
        display: false
      },
      pointLabels:{
        fontSize: 14,
        fontColor: 'white'
      }
    },
    borderJoinStyle:"round"
  }
});

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