/*
Redirection from waitingroom
*/

let player2 = document.getElementById("player2").innerHTML;

if(player2 !== '' && player2 !== null){
    let battleCode= document.getElementById("code").innerHTML; 
    window.location.replace('/battle/sequence/'+battleCode);
}

