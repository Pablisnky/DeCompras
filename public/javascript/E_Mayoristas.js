//Muestra la pagina del mayorista, invocada desde mayorista_V.php
function mayorista(ID_Mayorista, Nombre_Mayorista, Foto_Mayorista){ 
    
    //Se genera un token para informar que viene de este controlador, debido a que el controlador al que se va a redirigir tambien es solicitdo por otros medios 
    let Token_B = false;
    
    window.open(`VitrinaMayorista_C/vitrina_Mayorista/${ID_Mayorista},${Nombre_Mayorista},${Foto_Mayorista},${Token_B}`, "_self") 
}

//************************************************************************************************
//Voltea la tarjeta de mayorista para mostrar el reverso
function AtrasTarjetaMayorista(ID_Mayorista){ 
    document.getElementById(ID_Mayorista).style.transform = "rotateY(180deg)" //Gira la tarjeta
    document.getElementById(ID_Mayorista).style.transformStyle = "preserve-3d" //Voltea para poder leer el lado de atras cuando se pase al frente
    document.getElementById(ID_Mayorista).style.transition = ".5s ease" 
    document.getElementById(ID_Mayorista).style.perspective = "600px"
}

//************************************************************************************************
//Voltea la tarjeta de mayorista para mostrar nuevamente el frente
function FrenteTarjetaMayorista(ID_Mayorista){ 
    document.getElementById(ID_Mayorista).style.transform = "rotateY(0deg)"; //Gira la tarjeta
    document.getElementById(ID_Mayorista).style.transformStyle = "preserve-3d"; //Voltae para poder leer el lado de atras cuando se pase al frente
    document.getElementById(ID_Mayorista).style.transition = ".5s ease";
    document.getElementById(ID_Mayorista).style.perspective = "600px";
}