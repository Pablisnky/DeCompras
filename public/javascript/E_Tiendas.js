//Muestra la pagina de la tienda solicitada
function tiendas(ID_Tienda, NombreTienda, NoNecesario_1, NoNecesario_2, Disponibilidad, ProximoApertura, HoraApertura){  
    // console.log("______Desde tiendas()______")
    window.open(`../../Vitrina_C/index/${ID_Tienda},${NombreTienda},${NoNecesario_1},${NoNecesario_2},${Disponibilidad},${ProximoApertura},${HoraApertura}`,"_self") 
}