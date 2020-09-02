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


//Escucha en inicio_V.php                            
// document.getElementById("Input_9").addEventListener('keyup', function(){Llamar_buscador(this.value)})

//-------------------------------------------------------------------------------------------------
//Es invocada desde vitrina_V.php muestra los productos que tiene una sección
function llamar_Opciones(ID_Tienda, NombreProducto){
    console.log("______Desde llamar_Opciones()______") 
    window.localStorage.setItem('ID_Tienda', ID_Tienda)
    window.localStorage.setItem('NombreProducto', NombreProducto)
    let A = localStorage.getItem("ID_Tienda")
    let B = localStorage.getItem("NombreProducto")

    var url="http://localhost/proyectos/PidoRapido/Opciones_C/index/" + A + "/" + B 
    http_request.open('GET', url, true)
    //Se define que función va hacer invocada cada vez que cuando cambie onreadystatechange
    peticion.onreadystatechange = respuesta_Opciones
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_Opciones(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
            // AltoVitrina = document.body.scrollHeight
            // console.log(AltoVitrina)
            // document.getElementById("contenedor_13").style.height =AltoVitrina +"px"
            // document.getElementById("contenedor_13").style.backgroundColor ="red"
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
//invocada desde vitrina_V.php 
function llamar_PedidoEnCarrito(){
    var url="../../Carrito_C/index/";
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_PedidoEnCarrito;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null");
}                                                           
function respuesta_PedidoEnCarrito(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){            
            document.getElementById("Mostrar_TodoPedido").style.display = "block"
            window.scroll(0, 0)
            document.getElementById('Mostrar_TodoPedido').innerHTML = peticion.responseText
        } 
        else{
            alert('Hubo problemas con la petición.')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }    
    PedidoEnCarrito()
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
  
    // invocada desde inicio_V.php 
    // Busca un pedido segun lo que escriba el usuario en el input
    function Llamar_buscador(nombre){
        var divContenedor = document.getElementById("Buscar_Pedido")//se recibe desde inicio_V.php 
        console.log(divContenedor)       
        var xmlhttp
        if(window.XMLHttpRequest){ //Mozilla, Safari, Chrome...
            xmlhttp = new XMLHttpRequest()
            console.log(xmlhttp)
        } 
        else{ 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
            if(!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP')
                return false
            }
            else{
                alert("Instancia creada exitosamente")
            }     
        }
        
        if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML = ""
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status === 200){
                    divContenedor.innerHTML = xmlhttp.responseText
                    console.log(xmlhttp.readyState)
                }  
            }          
            document.getElementById("Buscar_Pedido").style.display = "grid"
            xmlhttp.open("GET", "Buscador_C/buscarPedido/" + nombre, true)
            //se envia la informacion cargada en el input por el usuario al servidor, true, significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.               
            xmlhttp.send()
        }
    }

//-------------------------------------------------------------------------------------------------
   