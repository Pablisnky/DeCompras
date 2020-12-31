document.addEventListener('DOMContentLoaded', nobackbutton, false)

//Desactiva el boton de volver atras del navegador
function nobackbutton(){
    // console.log("______Desde nobackbutton()______")
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange = function(){window.location.hash="no-back-button";}
}