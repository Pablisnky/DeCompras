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
// Invocada desde removerProductoVen_V.php
function Llamar_EliminarProducto(ID_DetallePedido){
    var url="../../CuentaVendedor_C/eliminar_productoVen/" + ID_DetallePedido;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_EliminarProducto;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
    
    //se almacen en una variable el elemento que contiene el producto, para ocultarlo
    localStorage.setItem('Producto_A_Eliminar', ID_DetallePedido) 
}                                                           
function respuesta_EliminarProducto(){
    if (peticion.readyState == 4){
        if(peticion.status == 200){
            //Coloca el cursor en el top de la pagina
            window.scroll(0, 0)

            //No trae ninguna respuesta porque solo ejecuta una oreden en el servidor
            // document.getElementById('Mostrar_detallepedidosVen').style.display = "block"
            // document.getElementById('BORRAR').innerHTML = peticion.responseText;

            // se encuentra en removeProductoVen_V.php
            Producto_A_Eliminar = localStorage.getItem('Producto_A_Eliminar')

            Regresa_A_Pedido_2(Producto_A_Eliminar)
        } 
        else{
            alert('Hubo problemas con la petición');
        }
    }
} 
