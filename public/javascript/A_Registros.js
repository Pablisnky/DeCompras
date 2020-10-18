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
    //Es llamada desde registroCom_V.php
    function llamar_verificaCorreo(){
        console.log("_____Desde llamar_verificaCorreo()_____")
        A = document.getElementById("CorreoAfiCom").value;
        var url="../Registro_C/VerificarCorreo/" + A;
        http_request.open('GET',url,true);     
        peticion.onreadystatechange = respuesta_verificaCorreo;
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
        peticion.send("null");
    }                                                           
    function respuesta_verificaCorreo(){
        if (peticion.readyState == 4){
            if (peticion.status == 200){
                document.getElementById('Mostrar_verificaCorreo').innerHTML = peticion.responseText;
            } 
            else{
                alert('Hubo problemas con la petición.');
            }
        }
    }

//-------------------------------------------------------------------------------------------------
//Es llamada desde registroCom_V.php
function llamar_verificaClave(){
    console.log("_____Desde llamar_verificaClave()_____")
    A = document.getElementById("Clave").value;
    var url="../Registro_C/VerificarClave/" + A;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_verificaClave;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_verificaClave(){
    if (peticion.readyState == 4){
        if (peticion.status == 200){
            console.log(peticion.status)
           document.getElementById('Mostrar_verificaClave').innerHTML = peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
}
