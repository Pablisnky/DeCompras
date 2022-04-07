// window.addEventListener("click", function(e){   
//     var click = e.target
//     console.log("Se hizo click en: ", click)
// }, false)

//ELIMINAR PEDIDO
//Por medio de delegación de eventos, devido a que el elemento que detecta el evento es cargado via AJAX 
window.addEventListener('click', function(e){

    //Se ubica el id del elemento seleccionado
    let ID_ElementoSeleccionado = e.target.id
    // console.log("ID Elemento seleccionado = ", ID_ElementoSeleccionado)
    
    if(ID_ElementoSeleccionado == "Cerrar_js"){
        let ConfirmaEliminar = confirm("Se eliminará el pedido")
        
        let ElementoPadre = document.getElementById(ID_ElementoSeleccionado).parentElement;
        console.log("ElementoPadre = ", ElementoPadre)

        // let ID_ElementoPadre = ElementoPadre.id

        let ElementoHermanoInferior = ElementoPadre.nextElementSibling;
        // console.log("Hermano inferior de elemento seleecionado= ", ElementoHermanoInferior)

        let Nro_Orden_Eliminar = ElementoHermanoInferior.value
        // console.log("Nro de Oreden a eliminar= ", Nro_Orden_Eliminar)

        if(ConfirmaEliminar == true){               
            //Se oculta el pedido a eliminar, esto es para que no aparezca en el frontEnd .
            document.getElementById(Nro_Orden_Eliminar).style.display = "none"

            //Se procede a eliminar elpedido del servidor
            Llamar_EliminarPedido(Nro_Orden_Eliminar)
            ocultarPedido()
        }  
    }  
}, false)

//************************************************************************************************
function ocultarPedido(){   
    //Coloca el cursor en el top de la pagina
    window.scroll(0, 0)    
    document.getElementById("Mostrar_detallepedidosVen").style.display = "none";
}   

//************************************************************************************************
function ProductosEnPedido(NroOrden){
    window.open(`../../CuentaVendedor_C/removerProductoAPedido/${NroOrden}`, "ventana1", "width=1300,height=650,scrollbars=YES")   
}
