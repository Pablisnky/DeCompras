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
    //Elimina una seccion
    function Llamar_EliminarSeccion(ID_Seccion, CantSeccion){
        // console.log("______Desde Llamar_EliminarSeccion()______", ID_Seccion + " / " + CantSeccion)

        //Si hay una sola sección se detiene elproceso de eliminación
        if(CantSeccion == 1){
            return
        }

        var url = "../Cuenta_C/eliminarSeccion/" + ID_Seccion + "/" + CantSeccion
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_EliminarSeccion
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                                        
    function respuesta_EliminarSeccion(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){  
                document.getElementById('ReadOnly').innerHTML = peticion.responseText                
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
        //Elimina una seccion
        function Llamar_ActualizarSeccion(Seccion, ID_Seccion){
            // console.log("______Desde Llamar_ActualizarSeccion()______",Seccion + " / "  + ID_Seccion)
    
            var url = "../Cuenta_C/ActualizarSeccion/" + Seccion + "/" + ID_Seccion
            http_request.open('GET', url, true)  
            peticion.onreadystatechange = respuesta_ActualizarSeccion
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
            peticion.send("null")
        }                                                                        
        function respuesta_ActualizarSeccion(){
            if(peticion.readyState == 4){
                if(peticion.status == 200){  
                    // document.getElementById('ReadOnly').innerHTML = peticion.responseText 

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
    //Verifica si la tienda puede mostrarse al publico
    function llamar_publicarTienda(){
        // console.log("______Desde llamar_publicarTienda()______")

        var url = "../Cuenta_C/publicarTienda/"
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_publicarTienda
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                                        
    function respuesta_publicarTienda(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){  
                document.getElementById('Mostrar_tienda').innerHTML = peticion.responseText 
                // document.getElementById('Publicar').checked = false
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