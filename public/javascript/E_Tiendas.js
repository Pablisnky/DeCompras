//Muestra la pagina de la tienda solicitada, invocada desde tiendas_V.php
function tiendas(ID_Tienda, NombreTienda, NoNecesario_1, NoNecesario_2, Disponibilidad, ProximoApertura, HoraApertura){  
    // console.log("______Desde tiendas()______")
    window.open(`../../Vitrina_C/index/${ID_Tienda},${NombreTienda},${NoNecesario_1},${NoNecesario_2},${Disponibilidad},${ProximoApertura},${HoraApertura}`,"_self") 
}

//************************************************************************************************
//Voltea la tarjeta de tiendas para mostrar el reverso
function AtrasTarjeta(ID_Tienda){ 
    document.getElementById(ID_Tienda).style.transform = "rotateY(180deg)" //Gira la tarjeta
    document.getElementById(ID_Tienda).style.transformStyle = "preserve-3d" //Voltea para poder leer el lado de atras cuando se pase al frente
    document.getElementById(ID_Tienda).style.transition = ".5s ease" 
    document.getElementById(ID_Tienda).style.perspective = "600px"
}

//************************************************************************************************
//Voltea la tarjeta para mostrar nuevamente el frente
function FrenteTarjeta(ID_Tienda){ 
    document.getElementById(ID_Tienda).style.transform = "rotateY(0deg)"; //Gira la tarjeta
    document.getElementById(ID_Tienda).style.transformStyle = "preserve-3d"; //Voltae para poder leer el lado de atras cuando se pase al frente
    document.getElementById(ID_Tienda).style.transition = ".5s ease";
    document.getElementById(ID_Tienda).style.perspective = "600px";
}