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
let battleLogCount=document.getElementsByClassName("battle-logs").length;
for (let i=0; i < battleLogCount; i++){
    let log=document.getElementById('ability_log'+i);
    log.style.opacity=0;
    log.style.color='crimson';
    let timeout = i * 2000;

    if(log.style.opacity== 0 && log.innerText.includes('Complete') == false ){
        setTimeout(function(){
            log.style.opacity=1;
        }, timeout);
        setTimeout(function(){
            log.style.opacity=0;
        }, timeout*2);
    }
}

function showHide(element){
    element.style.display= 'none';
    element.style.transition= '2s';
    if (element.style.display == 'none'){
        setTimeout(function() {
            element.style.display = 'block';
        }, 5000);
    }
}

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
