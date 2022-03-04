//Muestra la pagina del mayorista, invocada desde mayorista_V.php
function mayorista(ID_Mayorista, Nombre_Mayorista){  
    window.open(`VitrinaMayorista_C/vitrina_Mayorista/${ID_Mayorista},${Nombre_Mayorista}`,"_self") 
}

//************************************************************************************************
//Voltea la tarjeta de mayorista para mostrar el reverso
// function AtrasTarjeta(ID_Tienda){ 
    // document.getElementById(ID_Tienda).style.transform = "rotateY(180deg)" //Gira la tarjeta
    // document.getElementById(ID_Tienda).style.transformStyle = "preserve-3d" //Voltea para poder leer el lado de atras cuando se pase al frente
    // document.getElementById(ID_Tienda).style.transition = ".5s ease" 
    // document.getElementById(ID_Tienda).style.perspective = "600px"
// }

//************************************************************************************************
//Voltea la tarjeta de mayorista para mostrar nuevamente el frente
// function FrenteTarjeta(ID_Tienda){ 
    // document.getElementById(ID_Tienda).style.transform = "rotateY(0deg)"; //Gira la tarjeta
    // document.getElementById(ID_Tienda).style.transformStyle = "preserve-3d"; //Voltae para poder leer el lado de atras cuando se pase al frente
    // document.getElementById(ID_Tienda).style.transition = ".5s ease";
    // document.getElementById(ID_Tienda).style.perspective = "600px";
// }