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
function llamar_PedidoEnCarrito(ID_Tienda){
    // console.log("______Desde llamar_PedidoEnCarrito()______",ID_Tienda)
    var url="../../Carrito_C/index/" + ID_Tienda
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_PedidoEnCarrito;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null");
}                                                           
function respuesta_PedidoEnCarrito(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){            
            document.getElementById("Mostrar_Orden").style.display = "block"
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)
            document.getElementById('Mostrar_Orden').innerHTML = peticion.responseText 
    
            PedidoEnCarrito()           
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
function llamar_Opciones(ID_Tienda, ID_Seccion, OpcionSeleccionada = 'NoAplica'){
    var url="../../Opciones_C/index/" + ID_Tienda + "/" + ID_Seccion  + "/" + OpcionSeleccionada
    http_request.open('GET', url, true)
    //Se define que función va hacer invocada cada vez que cambie onreadystatechange
    peticion.onreadystatechange = respuesta_Opciones
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")    
}                                                           
function respuesta_Opciones(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            //Se verifica si se coloca la tapa cuando se viene desde el buscador para no mostrar la vista vitrina
            if(document.getElementById("Tapa_1")){
                document.getElementById("Tapa_1").style.display = "none"
            }

            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)

            //Se recibe la respuesta el servidor
            document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
                        
            //Se consulta el alto de la página vitrina, este tamaño varia segun las secciones que tenga un tienda
            AltoVitrina = document.body.scrollHeight

            //Este alto se estable al div padre en opciones_V para garantizar que cubra todo el contenido de vitrina_V ya que opciones_V es un contenedor coloca via Ajax en vitrina_V y debe sobreponerse sobre todo lo que hay en vitrina_V.php
            document.getElementById("Contenedor_13Js").style.minHeight = AltoVitrina + "px"
            
            //la función es llamada tres veces si se coloca fuera (No se porque)
            ProductosEnCarrito()
        } 
        else{
            alert('Hubo problemas con la petición en llamar_Opciones()')
        }
    }
    // else{ //en caso contrario, mostramos un gif simulando una precarga
    //     document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';    
    // }    
}

//****************************************************************************************************
function Llamar_UsuarioRegistrado(cedula){
    console.log("______Desde Llamar_UsuarioRegistrado()______", cedula)
    var url="../../Carrito_C/UsuarioRegistrado/" + cedula
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_UsuarioRegistrado;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null");

}                                                         
function respuesta_UsuarioRegistrado(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){                        
            //Coloca el cursor en el top de la pagina
            // window.scroll(0, 0)

            // Se recibe desde php (Carrito_C/UsuarioRegistrado()) una cadena de texto que se guarda en A,
            var A = peticion.responseText 

            // Lavariable A se convierte en un Array
            A = A.split(','); 

            // E caso de que el usuario no este registrado se recibira un string con "Usuario no registado"
            if(A[0] == "Usuario no registrado"){
                alert("Usuario no registrado")        
                document.getElementById("Cedula_Usuario").value = "";
                document.getElementById("Cedula_Usuario").focus();
                return
            }
            else{
                document.getElementById("Mostrar_Cedula").style.display = "none"
                document.getElementById("ModalTipoUsuario").style.display = "none"

                document.getElementById('NombreUsuario').value =  A[0];  
                document.getElementById('ApellidoUsuario').value =  A[1]; 
                document.getElementById('CedulaUsuario').value =  A[2]; 
                document.getElementById('TelefonoUsuario').value =  A[3]; 
                document.getElementById('CorreoUsuario').value =  A[4];  
                document.getElementById('Estado').value =  A[5];      
                document.getElementById('Ciudad').value =  A[6];    
                document.getElementById('DireccionUsuario').value =  A[7];  
                document.getElementById('ID_Usuario').value =  A[8];  
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