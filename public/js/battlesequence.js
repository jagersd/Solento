/*
Redirection from waitingroom
*/
if(document.getElementById("player2")){
let player2 = document.getElementById("player2").innerHTML;
    if(player2 !== '' && player2 !== null){
        let battleCode= document.getElementById("code").innerHTML; 
        window.location.replace('/battle/sequence/'+battleCode);
    }
}


/*
Sequencing
*/


/*
View log button
*/
let checker = true;
document.getElementById('log-button').addEventListener("click", logToggler);

function logToggler(){
    let el = document.getElementById('complete-logs');
    el.style.display = checker ? "block" : "";
    checker = !checker;
}
