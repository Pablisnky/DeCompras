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
//Escucha desde cuenta_editar_V.php 
document.getElementById('Label_13').addEventListener('click', Llamar_categorias, false)

//Escucha en inicio_V.php                            
// document.getElementById("Input_9").addEventListener('keyup', function(){Llamar_buscador(this.value)})

//Escucha en cuenta_publicar.php                            
document.getElementById("Producto").addEventListener('keyup', function(){Llamar_producto(this.value)})
//-------------------------------------------------------------------------------------------------
//Es llamada desde vitrina_V.php no agrega clon
function llamar_Opciones_1(ID_Tienda, NombreProducto, ID_Cont_Dinamico, agregacion, Contenedor_Padre, Contenedor_A_Clonar){
    window.localStorage.setItem('ID_Tienda', ID_Tienda)
    window.localStorage.setItem('NombreProducto', NombreProducto)
    window.localStorage.setItem('ID_Cont_Dinamico', ID_Cont_Dinamico)
    window.localStorage.setItem('Aniadeagregacion', agregacion)
    window.localStorage.setItem('ID_contenedor_padre', Contenedor_Padre)
    window.localStorage.setItem('ID_contenedor_a_clonar', Contenedor_A_Clonar)
    let A = localStorage.getItem("ID_Tienda")
    let B = localStorage.getItem("NombreProducto")
    ID_Cont_Dinamico = localStorage.getItem("ID_Cont_Dinamico")
    let C = localStorage.getItem("Aniadeagregacion")
    let D = localStorage.getItem("ID_contenedor_padre")
    let E = localStorage.getItem("ID_contenedor_a_clonar")
    var url="../../Opciones_C/index/" + A + "/" + B + "/" + C + "/" + D + "/" + E
    http_request.open('GET', url, true)
    //Se define que función va hacer llamada cada vez que cuando cambie onreadystatechange
    peticion.onreadystatechange = respuesta_Opciones_1
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
    Cont_Din = document.getElementsByClassName("contenedor_60").id = localStorage.getItem('ID_Cont_Dinamico')
}                                                           
function respuesta_Opciones_1(){
    if(document.getElementById(Cont_Din).style.backgroundColor != "rgba(51, 51, 51, 0.3)"){
        if(peticion.readyState == 4){
            if(peticion.status == 200){
                document.getElementById("Mostrar_Opciones").style.display = "block";
                document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
            } 
            else{
                alert('Hubo problemas con la petición.')
            }
        }
        else{ //en caso contrario, mostramos un gif simulando una precarga
            // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
        }
    }
}
 
//-------------------------------------------------------------------------------------------------
//Es llamada desde vitrina_V.php agrega un clon
function llamar_Opciones_2(ID_Tienda, NombreProducto, agregacion, Contenedor_Padre, Contenedor_A_Clonar){
    window.localStorage.setItem('ID_Tienda', ID_Tienda)
    window.localStorage.setItem('NombreProducto', NombreProducto)
    window.localStorage.setItem('Aniadeagregacion', agregacion)
    window.localStorage.setItem('ID_contenedor_padre', Contenedor_Padre)
    window.localStorage.setItem('ID_contenedor_a_clonar', Contenedor_A_Clonar)
    let A = localStorage.getItem("ID_Tienda")
    let B = localStorage.getItem("NombreProducto")
    let C = localStorage.getItem("Aniadeagregacion")
    let D = localStorage.getItem("ID_contenedor_padre")
    let E = localStorage.getItem("ID_contenedor_a_clonar")
    var url="../../Opciones_C/index/" + A + "/" + B + "/" + C + "/" + D + "/" + E
    http_request.open('GET', url, true)
    //Se define que función va hacer llamada cada vez que cuando cambie onreadystatechange
    peticion.onreadystatechange = respuesta_Opciones
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
    peticion.send("null")
}                                                           
function respuesta_Opciones(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById("Mostrar_Opciones").style.display = "block";
            document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
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
//llamada desde funcionesVarias.js por medio de PedidoEnCarrito()
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
    //Llamada desde funcionesVarias.js por medio de la funcion Pre_decremento()
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
    // Llamada desde Publicacion_V.php 
    function Llamar_BuscarOpciones(){
        var A= document.getElementById("Categoria_pro").value//se inserta el precio del inmueble 
        var url = "../../Publicacion_C/ConsultarOpciones/" + A
        http_request.open('GET', url, true)  
        peticion.onreadystatechange = respuesta_BuscarOpciones
        peticion.setRequestHeader("content-type","application/x-www-form-urlencoded")
        peticion.send("null")
    }                                                           
    function respuesta_BuscarOpciones(){
        if(peticion.readyState == 4){
            if(peticion.status == 200){    
                document.getElementById('Descripcion_pro').innerHTML = peticion.responseText
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
    // Llamada desde Publicacion_V.php 
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
    // Llamada desde inicio_V.php 
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
    // Llamada desde cuenta_publicar_V.php 
    // Busca un producto segun lo que escriba el usuario en el input
    function Llamar_producto(nombre){
        // var divContenedor = document.getElementById("Buscar_Pedido")//se recibe desde inicio_V.php 
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
            xmlhttp.open("GET", "Buscador_C/buscarProducto/" + nombre, true)
            //se envia la informacion cargada en el input por el usuario al servidor, true, significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.               
            xmlhttp.send()
        }
    }