//Escucha en cuenta_publicar_V.php                          
// document.getElementById("Label_1").addEventListener('click', function(){
//     // CerrarModal_X("Ejemplo_Secciones")
//     console.log("ENTRO")
// });

document.addEventListener("keydown", contarDes, false);//contar() se encuentra en Funciones_varias.js 
document.addEventListener("keyup", contarDes, false);//contar() se encuentra en Funciones_varias.js 
document.addEventListener("keydown", valida_LongitudDes, false);//valida_Longitud() se encuentra en Funciones_varias.js 
document.addEventListener("keyup", valida_LongitudDes, false);//valida_Longitud() se encuentra en 
document.addEventListener("keydown", contar, false);//contar() se encuentra en Funciones_varias.js 
document.addEventListener("keyup", contar, false);//contar() se encuentra en Funciones_varias.js 
document.addEventListener("keydown", valida_Longitud, false);//valida_Longitud() se encuentra en Funciones_varias.js 
document.addEventListener("keyup", valida_Longitud, false);//valida_Longitud() se encuentra en 
//************************************************************************************************

///Escucha en cuenta_publicar_V.php por medio de delegación de eventos debido a que el evento no esta cargado en el DOM por ser una solicitud Ajax   
document.getElementById('Contenedor_80').addEventListener('click',function(event){    
    if(event.target.id == 'Span_5'){
        CerrarModal_X('MostrarSeccion')
    }
}, false);

//************************************************************************************************
    //Llamada desde cuenta_publicar_V.php
    function mostrarSecciones(){
        document.getElementById("Ejemplo_Secciones").style.display = "grid"
    }   

//************************************************************************************************
//indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
function contar(){
    var max = 30; 
    var cadena = document.getElementById("ContenidoPro").value; 
    var longitud = cadena.length; 

        if(longitud <= max) { 
             document.getElementById("ContadorPro").value = max-longitud; 
        } else { 
             document.getElementById("ContenidoPro").value = cadena.subtring(0, max);
        } 
} 

// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
var contenido_producto = "";    
function valida_Longitud(){  
    var num_caracteres_permitidos = 30;

    //se averigua la cantidad de caracteres escritos
    num_caracteres = document.forms[0].producto.value.length; 

    if(num_caracteres > num_caracteres_permitidos){ 
        document.forms[0].producto.value = contenido_producto; 
    }
    else{ 
        contenido_producto = document.forms[0].producto.value; 
    } 
} 

//************************************************************************************************
// indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
function contarDes(){
    var max = 50; 
    var cadena = document.getElementById("ContenidoDes").value; 
    var longitud = cadena.length; 

        if(longitud <= max) { 
             document.getElementById("ContadorDes").value = max-longitud; 
        } else { 
             document.getElementById("ContenidoDes").value = cadena.subtring(0, max);
        } 
} 

// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
var contenido_descripcion = "";    
    function valida_LongitudDes(){  
    var num_caracteres_permitidos = 50;

    //se averigua la cantidad de caracteres escritos
    num_caracteres = document.forms[0].descripcion.value.length; 

    if(num_caracteres > num_caracteres_permitidos){ 
        document.forms[0].descripcion.value = contenido_descripcion; 
    }
    else{ 
        contenido_descripcion = document.forms[0].descripcion.value; 
    } 
} 