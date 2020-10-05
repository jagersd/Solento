let checker = true;
document.getElementById('left-nav-card').addEventListener("click", navToggler);

function navToggler(){
    let el = document.getElementById('left-nav-card');
    el.style.left = checker ? "10px" : "";
    el.style.border = checker ? "2px solid black" : "";
    checker = !checker;
}