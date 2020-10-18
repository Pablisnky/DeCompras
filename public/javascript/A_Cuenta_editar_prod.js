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
    if(peticion.readyState == 4){
        if(peticion.status == 200){    
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)
            document.getElementById("Contenedor_80").innerHTML = peticion.responseText
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
 //Elimina una imagen
function Llamar_EliminarImagenSecundaria(ID_Imagen){
    // console.log("______Desde EliminarImagenSecundaria()______")

    var url = "../../Cuenta_C/eliminarImagen/" + ID_Imagen
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_EliminarImagenSecundaria
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                                        
function respuesta_EliminarImagenSecundaria(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){  
              
        } 
        else{
            alert('Problemas con la petición.')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
}        