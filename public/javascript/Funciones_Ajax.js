var http_request = false;
    var peticion= conexionAJAX();
    function conexionAJAX(){
        http_request = false;
        if(window.XMLHttpRequest){ // Mozilla, Safari,...
            http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType){
                http_request.overrideMimeType('text/xml');
            }
        }
        else if(window.ActiveXObject){ // IE
            try{
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            }
                catch(e){
                    try{
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } 
                    catch(e){}
                }
            }
            if(!http_request){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          	// else{
            //     alert("Instancia creada exitosamente ok");
            // }
            return http_request;
        } 

//-------------------------------------------------------------------------------------------------
    //Este set de seis funciones son invocadas desde incio_V.php
    // document.getElementById('H2_1').addEventListener('click', Llamar_ComidaRapida, false);
    // document.getElementById('H2_2').addEventListener('click', Llamar_Supermercado, false);
    // document.getElementById('H2_3').addEventListener('click', Llamar_Bar, false);
    // document.getElementById('H2_4').addEventListener('click', Llamar_Alimentos, false);
    // document.getElementById('H2_5').addEventListener('click', Llamar_Productos, false);
    // document.getElementById('H2_6').addEventListener('click', Llamar_Maquinas, false);

//-------------------------------------------------------------------------------------------------
function llamar_Opciones(ID_Tienda, NombreProducto, agregacion, Contenedor_Padre, Contenedor_A_Clonar){//Es llamada desde vitrina_V.php
    window.localStorage.setItem('ID_Tienda', ID_Tienda);
    window.localStorage.setItem('NombreProducto', NombreProducto);
    window.localStorage.setItem('Aniadeagregacion', agregacion);
    window.localStorage.setItem('ID_contenedor_padre', Contenedor_Padre);
    window.localStorage.setItem('ID_contenedor_a_clonar', Contenedor_A_Clonar);
    let A = localStorage.getItem("ID_Tienda");
    let B = localStorage.getItem("NombreProducto");
    let C = localStorage.getItem("Aniadeagregacion");
    let D = localStorage.getItem("ID_contenedor_padre");
    let E = localStorage.getItem("ID_contenedor_a_clonar");
    var url="../../Opciones_C/index/" + A + "/" + B + "/" + C + "/" + D + "/" + E;
    http_request.open('GET', url, true);    
    peticion.onreadystatechange = respuesta_Opciones;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_Opciones(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){
            document.getElementById("Mostrar_Opciones").style.display = "block";
            document.getElementById('Mostrar_Opciones').innerHTML = peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición.');
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
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_PedidoEnCarrito(){
    if(peticion.readyState == 4){
        if(peticion.status == 200){            
            document.getElementById("Mostrar_TodoPedido").style.display = "block"
            window.scroll(0, 0);
            document.getElementById('Mostrar_TodoPedido').innerHTML = peticion.responseText;
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
    else{ //en caso contrario, mostramos un gif simulando una precarga
        // document.getElementById('Mostrar_Maquinas').innerHTML='Cargando registros';
    }
    
    PedidoEnCarrito()
}