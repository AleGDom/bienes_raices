document.addEventListener('DOMContentLoaded',()=>{
    eventListeners();
    darkMode();
    comprobar();
});

function comprobar(){
    
    if(localStorage.getItem('darkMode')==='on'){
        document.body.classList.add("dark-mode");
    } else{
        document.body.classList.remove("dark-mode");
    }

    console.log(localStorage.getItem('darkMode'));
}
function darkMode(){
    const darkModeBtn=document.querySelector('.dark-mode-boton');
    darkModeBtn.addEventListener('click',function(){
        document.body.classList.toggle('dark-mode');
        if(document.body.classList.contains("dark-mode")){
            localStorage.setItem("darkMode", "on");
        } else{
            localStorage.setItem("darkMode", "off");
        }
    })
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',navegacionResponsive);
}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle("mostrar");
}