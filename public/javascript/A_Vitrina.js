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
// document.getElementById("Label_13").addEventListener('click', Llamar_categorias, false)    

//-------------------------------------------------------------------------------------------------
//invocada desde vitrina_V.php 
function llamar_PedidoEnCarrito(){
    console.log("______Desde llamar_PedidoEnCarrito()______")
    var url="http://localhost/proyectos/PidoRapido/Carrito_C/index/";
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_PedidoEnCarrito;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null");
}                                                           
function respuesta_PedidoEnCarrito(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){            
            document.getElementById("Mostrar_TodoPedido").style.display = "block"
            //Coloca el cursor en el top de la pagina
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
    //console.log("______Desde llamar_Opciones() -> respuesta_Opciones______") 
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)
            document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
            
            //Se consulta el alto de la página vitrina, este tamaño varia segun las secciones que tenga un tienda
            AltoVitrina = document.body.scrollHeight

            //Este alto se estable al div padre en opciones_V para garantizar que cubra todo el contenido de vitrina_V ya que opciones_V es un contenedor coloca via Ajax en vitrina_V
            document.getElementById("Contenedor_13Js").style.height = AltoVitrina + "px"
            
            //la función es llamada tres veces si se coloca fuera (No se porque)
            ProductosEnCarrito()
        } 
        else{
            alert('Hubo problemas con la petición.')
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';    
    }    
}
