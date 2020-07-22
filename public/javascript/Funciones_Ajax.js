var http_request = false;
    var peticion= conexionAJAX();
    function conexionAJAX(){
        http_request = false;
        if(window.XMLHttpRequest){ // Mozilla, Safari,...
            http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType){
                http_request.overrideMimeType('text/xml');
            }
        }
        else if(window.ActiveXObject){ // IE
            try{
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            }
                catch(e){
                    try{
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } 
                    catch(e){}
                }
            }
            if(!http_request){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          	// else{
            //     alert("Instancia creada exitosamente ok");
            // }
            return http_request;
        } 

//-------------------------------------------------------------------------------------------------
//Llamada desde inicio_V.php
// window.addEventListener('load', inicializarEventosAjax, false);

// function inicializarEventosAjax(){
    document.getElementById('H2_1').addEventListener('click', Llamar_Delivery, false);
    document.getElementById('H2_2').addEventListener('click', Llamar_Ropa, false);
    document.getElementById('H2_3').addEventListener('click', Llamar_Bar, false);
    document.getElementById('H2_4').addEventListener('click', Llamar_Alimentos, false);
    document.getElementById('H2_5').addEventListener('click', Llamar_Productos, false);
    document.getElementById('H2_6').addEventListener('click', Llamar_Maquinas, false);
// }

//-------------------------------------------------------------------------------------------------

    function Llamar_Delivery(){//Es llamada desde inicio_V.php
        var url="Vitrina_C/Delivery";
        http_request.open('GET',url,true);    
        peticion.onreadystatechange = respuesta_Delivery;
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
        peticion.send("null");
    }                                                           
    function respuesta_Delivery(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){
                document.getElementById('Mostrar_Delivery').innerHTML=peticion.responseText;
                // document.getElementById('Loading').style.display = 'none';
            } 
            else{
                alert('Hubo problemas con la petición.');
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            // document.getElementById('Mostrar_Delivery').innerHTML='Cargando registros';
        }
    }
    
//-------------------------------------------------------------------------------------------------
    function Llamar_Ropa(){//Es llamada desde inicio_V.php
        var url="Vitrina_C/Ropa";
        http_request.open('GET',url,true);    
        peticion.onreadystatechange = respuesta_Ropa;
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
        peticion.send("null");
    }                                                           
    function respuesta_Ropa(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){
                document.getElementById('Mostrar_Ropa').innerHTML=peticion.responseText;
                // document.getElementById('Loading').style.display = 'none';
            } 
            else{
                alert('Hubo problemas con la petición.');
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            // document.getElementById('Mostrar_Ropa').innerHTML='Cargando registros';
        }
    }
    
//-------------------------------------------------------------------------------------------------
function Llamar_Bar(){//Es llamada desde inicio_V.php
    var url="Vitrina_C/Bar";
    http_request.open('GET',url,true);    
    peticion.onreadystatechange = respuesta_Bar;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_Bar(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById('Mostrar_Bar').innerHTML=peticion.responseText;
            // document.getElementById('Loading').style.display = 'none';
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Bar').innerHTML='Cargando registros';
    }
}

//-------------------------------------------------------------------------------------------------
function Llamar_Alimentos(){//Es llamada desde inicio_V.php
    var url="Vitrina_C/Alimentos";
    http_request.open('GET',url,true);    
    peticion.onreadystatechange = respuesta_Alimentos;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_Alimentos(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById('Mostrar_Alimentos').innerHTML=peticion.responseText;
            // document.getElementById('Loading').style.display = 'none';
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Alimentos').innerHTML='Cargando registros';
    }
}

//-------------------------------------------------------------------------------------------------
function Llamar_Productos(){//Es llamada desde inicio_V.php
    var url="Vitrina_C/Productos";
    http_request.open('GET',url,true);    
    peticion.onreadystatechange = respuesta_Productos;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_Productos(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById('Mostrar_Productos').innerHTML=peticion.responseText;
            // document.getElementById('Loading').style.display = 'none';
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Productos').innerHTML='Cargando registros';
    }
}

//-------------------------------------------------------------------------------------------------
function Llamar_Maquinas(){//Es llamada desde inicio_V.php
    var url="Vitrina_C/Maquinas";
    http_request.open('GET',url,true);    
    peticion.onreadystatechange = respuesta_Maquinas;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_Maquinas(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById('Mostrar_Maquinas').innerHTML=peticion.responseText;
            // document.getElementById('Loading').style.display = 'none';
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
}

//-------------------------------------------------------------------------------------------------
function llamar_Opciones(Departamento, NombreProducto, agregacion, Contenedor_Padre, Contenedor_A_Clonar){//Es llamada desde inicio_V.php
    window.localStorage.setItem('Departamento', Departamento);
    window.localStorage.setItem('NombreProducto', NombreProducto);
    window.localStorage.setItem('Aniadeagregacion', agregacion);
    window.localStorage.setItem('ID_contenedor_padre', Contenedor_Padre);
    window.localStorage.setItem('ID_contenedor_a_clonar', Contenedor_A_Clonar);
    let A = localStorage.getItem("Departamento");
    let B = localStorage.getItem("NombreProducto");
    let C = localStorage.getItem("Aniadeagregacion");
    let D = localStorage.getItem("ID_contenedor_padre");
    let E = localStorage.getItem("ID_contenedor_a_clonar");
    var url="Opciones_C/index/" + A + "/" + B + "/" + C + "/" + D + "/" + E;
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_Opciones;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_Opciones(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById("Mostrar_Opciones").style.display = "block";
            // document.getElementsByTagName("html")[0].style.overflow = "hidden";
            document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
            // document.getElementById('Loading').style.display = 'none';
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
}

// //-------------------------------------------------------------------------------------------------
// function llamar_agregar_Opciones(Departamento, NombreProducto){//Es llamada desde inicio_V.php
//     window.localStorage.setItem('Departamento', Departamento);
//     window.localStorage.setItem('NombreProducto', NombreProducto);
//     let A = localStorage.getItem("Departamento");
//     let B = localStorage.getItem("NombreProducto");
//     var url="Opciones_C/agregar/" + A + "/" + B;
//     http_request.open('GET', url, true);    
//     peticion.onreadystatechange = respuesta_Opciones;
//     peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
//     peticion.send("null");
// }                                                           
// function respuesta_Opciones(){
//     if(peticion.readyState == 4){
//         if(peticion.status == 200){
//             document.getElementById("Mostrar_Opciones").style.display = "block";
//             document.getElementsByTagName("html")[0].style.overflow = "hidden";
//             document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
//             // document.getElementById('Loading').style.display = 'none';
//         } 
//         else{
//             alert('Hubo problemas con la petición.');
//         }
//     }
//     else{ //en caso contrario, mostramos un gif simulando una precarga
//         // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
//     }
// }