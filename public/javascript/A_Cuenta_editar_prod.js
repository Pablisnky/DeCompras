var http_request = false
var peticion= conexionAJAX()
function conexionAJAX(){
    http_request = false
    if(window.XMLHttpRequest){ // Mozilla, Safari,...
        http_request = new XMLHttpRequest()
        if (http_request.overrideMimeType){
            http_request.overrideMimeType('text/xml')
        }
    }
    else if(window.ActiveXObject){ // IE
        try{
            http_request = new ActiveXObject("Msxml2.XMLHTTP")
        }
            catch(e){
                try{
                    http_request = new ActiveXObject("Microsoft.XMLHTTP")
                } 
                catch(e){}
            }
        }
        if(!http_request){
            alert('No es posible crear una instancia XMLHTTP')
            return false
        }
        //   else{
        //     alert("Instancia creada exitosamente ok")
        // }
        return http_request
    } 

//-------------------------------------------------------------------------------------------------
//No he podido llamar esta funcion con este metodo porque pasa un argumento que es dinamico
// document.getElementById("Seccion").addEventListener('click', Llamar_seccion, false)

//-------------------------------------------------------------------------------------------------
function Llamar_seccion(ID_Producto){
    // console.log("______Desde Llamar_seccion()______")
    
    var url = "../../Cuenta_C/Secciones/" + ID_Producto
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_seccion
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_seccion(){
    console.log(peticion.readyState)
    if(peticion.readyState == 4){
        if(peticion.status == 200){ 
            //Se remueve el contenido añadido al contenedor_47 (especificamente el preloder)
            let ElementoPadre = document.getElementById('Contenedor_47')
            let ElementoEliminar = document.getElementsByClassName('preloderTapa')[0]
            if(ElementoEliminar){
                ElementoPadre.removeChild(ElementoEliminar)
            }

            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)

            //Se reemplaza el valor del contenedor_80 con lo que se obtenga en el archivo de la url
            document.getElementById("Contenedor_80").innerHTML = peticion.responseText
        } 
        else{
            alert('Problemas con la petición.')
        }
    }
    else if(peticion.readyState == 2){//El valor 2 de la prodiedad readyState indica que se ha invocado el método send, pero el servidor aún no ha respondido, mientras esto sucede se muestra el preloader

        // Se añade contenido al contenedor_47 sin sobreescribir su contenido previo
        document.getElementById('Contenedor_47').innerHTML += "<div class='preloderTapa'><div class='preloder'></div></div>"
    }
}

//-------------------------------------------------------------------------------------------------
//Elimina una imagen de la BD y muestra el boton de añadir imagen en caso de que existan menos de cinco
function Llamar_EliminarImagenSecundaria(ID_Imagen, ID_Producto){
    // console.log("______Desde EliminarImagenSecundaria()______ ", ID_Imagen + " / " + ID_Producto)

    var url = "../../Cuenta_C/eliminarImagen/" + ID_Imagen + " / " + ID_Producto
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_EliminarImagenSecundaria
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                                        
function respuesta_EliminarImagenSecundaria(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){  
            //Se reemplaza el valor del contenedor_80 con lo que se obtenga en el archivo de la url
            document.getElementById("Contenedor_49").innerHTML = peticion.responseText
        } 
        else{
            alert('Problemas con la petición.')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
}        
//-------------------------------------------------------------------------------------------------
//Verifica que no se hayan añadido más de cinco imagenes
// function Llamar_VerificarCantidad(){
//     console.log("______Desde Llamar_VerificarCantidad()______ ")
//     return
//     var url = "../../Cuenta_C/eliminarImagen/" + ID_Imagen + " / " + ID_Producto
//     http_request.open('GET', url, true)  
//     peticion.onreadystatechange = respuesta_EliminarImagenSecundaria
//     peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
//     peticion.send("null")
// }                                                                        
// function respuesta_EliminarImagenSecundaria(){
//     if(peticion.readyState == 4){
//         if(peticion.status == 200){  
//             //Se reemplaza el valor del contenedor_80 con lo que se obtenga en el archivo de la url
//             document.getElementById("Contenedor_114").innerHTML = peticion.responseText
//         } 
//         else{
//             alert('Problemas con la petición.')
//         }
//     }
//     else{ //en caso contrario, mostramos un gif simulando una precarga
//         // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
//     }
// }        
//-------------------------------------------------------------------------------------------------