let ctx = document.getElementById('statChart').getContext("2d");
let statHP = document.getElementById('stat_hp').innerText;
let statSTR = document.getElementById('stat_strength').innerText;
let statARM = document.getElementById('stat_armor').innerText;
let statINT = document.getElementById('stat_intellect').innerText;
let statMD = document.getElementById('stat_magic_defence').innerText;
let statSP = document.getElementById('stat_speed').innerText;



  
let radarChart = new Chart(statChart, {
  type: 'radar',
  data: {
    labels: ["HP", "Strength ", "Armor", "Intellect", "Magic Defence", "Speed"],
    datasets: [
      {
      label: "Base Stats",
      backgroundColor: "rgba(0,72,86,0.5)",
      data: [statHP, statSTR, statARM, statINT, statMD, statSP]
    }
  ]
  },
  options:{
    legend:{
      display: false,
    },
    legend: {
      display: false,
    },
    scale: {
      ticks:{
        beginAtZero: true,
        max:100,
        min: 0,
        stepSize: 10
      },
      pointLabels:{
        fontSize: 14
      }
    },
    borderJoinStyle:"round"
  }
});

