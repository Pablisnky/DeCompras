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
    function llamar_verificaCorreo(id, Afiliado){
        A = document.getElementById(id).value;
        var url="../Registro_C/VerificarCorreo/" + A + "/" + Afiliado;
        http_request.open('GET',url,true);     
        peticion.onreadystatechange = respuesta_verificaCorreo;
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
        peticion.send("null");
    }                                                           
    function respuesta_verificaCorreo(){
        if (peticion.readyState == 4){
            if(peticion.status == 200){
                document.getElementById('Mostrar_verificaCorreo').innerHTML = peticion.responseText;
            } 
            else{
                alert('Hubo problemas con la petición en L_VeCo.');
            }
        }
    }

//-------------------------------------------------------------------------------------------------
function llamar_verificaClave(Clave, Afiliado){
    if(Clave == ""){
        return
    }
    // A = document.getElementById("Clave").value
    var url="../Registro_C/VerificarClave/" + Clave + "/" + Afiliado;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_verificaClave;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_verificaClave(){
    if (peticion.readyState == 4){
        if (peticion.status == 200){
           document.getElementById('Mostrar_verificaClave').innerHTML = peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición en L_VeCl.');
        }
    }
}

//-------------------------------------------------------------------------------------------------
function llamar_verificarNombreTienda(NombreTienda){
    // console.log("_____Desde llamar_verificarNombreTienda()_____", + NombreTienda);
    var url="../Registro_C/verificarNombreTienda/" + NombreTienda;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_verificarNombreTienda;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_verificarNombreTienda(){
    if (peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById('Mostrar_verificarNombreTienda').innerHTML = peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición en L_VeNoTi.');
        }
    }
}

//-------------------------------------------------------------------------------------------------
function llamar_verificarNombreMayorista(NombreMayorista){
    console.log("_____Desde llamar_verificarNombreMayorista()_____", + NombreMayorista);
    var url="../Registro_C/verificarNombreMayorista/" + NombreMayorista;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_verificarNombreMayorista;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_verificarNombreMayorista(){
    if (peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById('Mostrar_verificarNombreMayorista').innerHTML = peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición en L_VeNoTi.');
        }
    }
}

//-------------------------------------------------------------------------------------------------
// function Llamar_eliminar_Sesion_CorreoExiste(){
//     console.log("_____Desde Llamar_eliminar_Sesion_CorreoExiste()_____");
//     var url="../Registro_C/borrar_Sesion_CorreoExiste/";
//     http_request.open('GET',url,true);     
//     peticion.onreadystatechange = respuesta_eliminar_Sesion_CorreoExiste;
//     peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
//     peticion.send("null");
// }                                                           
// function respuesta_eliminar_Sesion_CorreoExiste(){
//     if (peticion.readyState == 4){
//         if(peticion.status == 200){
//             console.log("Resiviendo respuesta")
//             document.getElementById('Mostrar_verifica').innerHTML = peticion.responseText;
//         } 
//         else{
//             alert('Hubo problemas con la petición en L_ElSeCo.');
//         }
//     }
// }