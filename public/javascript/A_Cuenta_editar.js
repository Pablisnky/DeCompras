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

// *************************************************************************************************
    //Muestra todas las categorias que existen; invocada desde E_Cuenta_editar.js por medo de función anonima
    function Llamar_categorias(){
        var url = "../CuentaComerciante_C/Categorias/"
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

// *************************************************************************************************
    //Elimina una seccion
    function Llamar_EliminarSeccion(ID_Seccion, CantSeccion){
        // console.log("______Desde Llamar_EliminarSeccion()______", ID_Seccion + " / " + CantSeccion)
        
        //Si hay una sola sección se detiene el proceso de eliminación
        if(CantSeccion == 1){
            return
        }
        else{
            var url = "../CuentaComerciante_C/eliminarSeccion/" + ID_Seccion + "/" + CantSeccion
            http_request.open('GET', url, true)  
            peticion.onreadystatechange = respuesta_EliminarSeccion
            peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
            peticion.send("null")
        }
    }                                                                        
    function respuesta_EliminarSeccion(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){  
                //No hace falta traer una respuesta del servidor, la operacion se hace y ya
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

// *************************************************************************************************
    //Cambia el nombre de una sección cuando se avandona el foco
    function Llamar_ActualizarSeccion(Seccion, ID_Seccion){
        // console.log("______Desde Llamar_ActualizarSeccion()______",Seccion + " / "  + ID_Seccion)

        var url = "../CuentaComerciante_C/ActualizarSeccion/" + Seccion + "/" + ID_Seccion
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_ActualizarSeccion
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                                        
    function respuesta_ActualizarSeccion(){
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

// *************************************************************************************************
    //Verifica si la tienda puede mostrarse al publico
    // function llamar_publicarTienda(){
    //     // console.log("______Desde llamar_publicarTienda()______")

    //     var url = "../CuentaComerciante_C/publicarTienda/"
    //     http_request.open('GET', url, true)  
    //     peticion.onreadystatechange = respuesta_publicarTienda
    //     peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    //     peticion.send("null")
    // }                                                                        
    // function respuesta_publicarTienda(){
    //     if(peticion.readyState == 4){
    //         if(peticion.status == 200){  
    //             document.getElementById('Mostrar_tienda').innerHTML = peticion.responseText 
    //             // document.getElementById('Publicar').checked = false
    //         } 
    //         else{
    //             alert('Problemas con la petición.')
    //         }
    //     }
    //     else{ //en caso contrario, mostramos un gif simulando una precarga
    //         // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    //     }
    // }

// *************************************************************************************************