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
//Muestra la orden de compra
function llamar_PedidoEnCarrito(ID_Mayorista, ValorDolar){
    // console.log("______Desde llamar_PedidoEnCarrito()______",ID_Mayorista + "/" + ValorDolar)
    var url="../../CarritoMayorista_C/index/" + ID_Mayorista
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_PedidoEnCarrito;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null");
    
    localStorage.setItem('ValorDolarHoy', ValorDolar)         
    Local_ValorDolarHoy = localStorage.getItem('ValorDolarHoy')
}                                                           
function respuesta_PedidoEnCarrito(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){            
            document.getElementById("Mostrar_Orden").style.display = "block"
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)
            document.getElementById('Mostrar_Orden').innerHTML = peticion.responseText 
    
            PedidoEnCarrito(Local_ValorDolarHoy)           
        } 
        else{
            alert('Hubo problemas con la petición en llamar_PedidoEnCarrito()')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }    
}

//****************************************************************************************************
//Muestra los productos que tiene una sección
function llamar_OpcionesMayorista(ID_Mayorista, ID_Seccion){
    // console.log( ID_Mayorista + "/" + ID_Seccion);
    var url="../../Opciones_Mayorista_C/index/" + ID_Mayorista + "/" + ID_Seccion;
    http_request.open('GET', url, true);
    //Se define que función va hacer invocada cada vez que cambie onreadystatechange
    peticion.onreadystatechange = respuesta_OpcionesMayorista;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");    
}                                                           
function respuesta_OpcionesMayorista(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)

            //Se recibe la respuesta el servidor
            document.getElementById('Mostrar_Opciones_Mayorista').innerHTML = peticion.responseText;
                        
            //Se consulta el alto de la página vitrina, este tamaño varia segun las secciones que tenga un tienda
            AltoVitrina = document.body.scrollHeight

            //Este alto se estable al div padre en opciones_Mayorista_V para garantizar que cubra todo el contenido de vitrina_V ya que opciones_V es un contenedor coloca via Ajax en vitrina_V y debe sobreponerse sobre todo lo que hay en vitrina_V.php
            document.getElementById("Contenedor_14Js").style.minHeight = AltoVitrina + "px"
            
            //la función es llamada tres veces si se coloca fuera (No se porque)
            ProductosEnCarrito()
        } 
        else{
            alert('Hubo problemas con la petición en llamar_Opciones_Mayorista()')
        }
    }
    // else{ //en caso contrario, mostramos un gif simulando una precarga
    //     document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';    
    // }    
}

//****************************************************************************************************
function Llamar_datosMinorista(CodigoDespacho){
    var url="../../CarritoMayorista_C/informacionMinorista/" + CodigoDespacho
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_datosMinorista;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null");

}                                                         
function respuesta_datosMinorista(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){                        
            //Coloca el cursor en el top de la pagina
            // window.scroll(0, 0)

            var A = peticion.responseText 

            // Lavariable A se convierte en un Array
            A = A.split(','); 
            console.log(A)
           
            // E caso de que el usuario no este registrado se recibira un string con "Usuario no registado"
            if(A[0] == "Minorista no registrado"){
                alert("Código de despacho no registrado")        
                document.getElementById("CodigoDespacho").value = "";
                document.getElementById("CodigoDespacho").focus();
                return
            }
            else{
                document.getElementById("Muestra_datosMinorista").style.display = "block"
                // document.getElementById("Contenedor_26").style.display = "none"

                document.getElementById('NombreMinorista').value =  A[0];  
                document.getElementById('RifMinorista').value =  A[1]; 
                document.getElementById('TelefonoMinorista').value =  A[2]; 
                document.getElementById('CorreoMinorista').value =  A[3]; 
                document.getElementById('ZonaMinorista').value =  A[4];  
                document.getElementById('CodigoMinorista').value =  A[5];      
                document.getElementById('DireccionMinorista').value =  A[6]; 
            }
        } 
        else{
            alert('Hubo problemas con la petición en llamar_UsuarioRegistrado()')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }    
}