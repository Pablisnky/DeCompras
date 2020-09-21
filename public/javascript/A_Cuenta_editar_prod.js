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
// document.getElementById("Seccion").addEventListener('click', Llamar_seccion, false)

//-------------------------------------------------------------------------------------------------
function Llamar_seccion(ID_Producto){
    console.log("______Desde Llamar_seccion()______")
    var url = "http://localhost/proyectos/PidoRapido/Cuenta_C/Secciones/" + ID_Producto
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_seccion
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_seccion(){
    if(peticion.readyState == 4){
        console.log(peticion.readyState)
        if(peticion.status == 200){    
            console.log(peticion.status)
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
