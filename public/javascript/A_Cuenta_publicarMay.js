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

//************************************************************************************************
document.getElementById("SeccionPublicarMay").addEventListener('click', Llamar_seccionesDisponibleMay, false)
document.getElementById("SeccionPublicarMay").addEventListener('keydown', Llamar_seccionesDisponibleMay, false)

//************************************************************************************************
function Llamar_seccionesDisponibleMay(){
    var url = "../../Mayorista_C/SeccionesDisponiblesMay"
    http_request.open('GET', url, true)  
    peticion.onreadystatechange = respuesta_seccionMay
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_seccionMay(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){    
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)
            
            document.getElementById("Mostrar_Secciones").innerHTML = peticion.responseText
        } 
        else{
            alert('Problemas con la petición en "seccionesDisponibleMay"')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
}