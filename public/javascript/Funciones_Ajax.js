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
          	// else{
            //     alert("Instancia creada exitosamente ok")
            // }
            return http_request
        } 


//-------------------------------------------------------------------------------------------------
    //invocada desde funcionesVarias.js por medio de la funcion Pre_decremento()
    function Llamar_AlertPersonalizado(){
        var url="../../Vitrina_C/alertPersonal/"
        http_request.open('GET', url, true);    
        peticion.onreadystatechange = respuesta_AlertPersonalizado;
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                           
    function respuesta_AlertPersonalizado(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){            
                document.getElementById("Mostrar_Alert").style.display = "block"
                window.scroll(0, 0)
                document.getElementById('Mostrar_Alert').innerHTML = peticion.responseText
            } 
            else{
                alert('Hubo problemas con la petición.')
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
        }
    }
    
//-------------------------------------------------------------------------------------------------
    // invocada desde cuenta_editar_V.php 
    function Llamar_categorias(){
        var url = "../Cuenta_C/Categorias/"
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_categorias
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                           
    function respuesta_categorias(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){    
                document.getElementById("Mostrar_Categorias").style.display = "block"
                document.getElementById('Mostrar_Categorias').innerHTML = peticion.responseText
            } 
            else{
                alert('Hubo problemas con la petición.')
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
        }
    }

//-------------------------------------------------------------------------------------------------
   