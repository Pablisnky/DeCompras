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
    function Llamar_clientesVen(ID_Minorista){
        var url="../CuentaVendedor_C/detallesClientesVen/" + ID_Minorista;
        http_request.open('GET',url,true);     
        peticion.onreadystatechange = respuesta_clientesVen;
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
        peticion.send("null");
    }                                                           
    function respuesta_clientesVen(){
        if (peticion.readyState == 4){
            if(peticion.status == 200){
                document.getElementById('Mostrar_cliente').style.display = "block"
                document.getElementById('Mostrar_cliente').innerHTML = peticion.responseText;
            } 
            else{
                alert('Hubo problemas con la petición');
            }
        }
    }

//-------------------------------------------------------------------------------------------------