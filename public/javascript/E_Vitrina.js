
//Se busca el alto del body de la pagina para garantizar que el alto del contenedor  a cargar  id="Mostrar_Opciones"cubra toda la pagina en caso de que este ultimo sea mas pequeño
//Cuando carga la página se registran los listener de clic para toda la ventana
document.addEventListener("click", function(event){
    if(event.target.id == 'Section_4'){
        AltoVitrina = document.body.scrollHeight
        console.log(AltoVitrina)
        document.getElementById("contenedor_13").style.height =AltoVitrina +"px"
        document.getElementById("contenedor_13").style.backgroundColor ="red"
    }
}, false)
 
//Escucha desde opciones_V.php, archivo que se carga en vitrina_V.php desde Ajax; por medio de delegación de eventos, donde dentro de la función identificas cual fue el objetivo del click, ya sea por id o por clase o por etiqueta según sea tu necesidadtoma la etiqueta span donde se hace click
document.addEventListener('click', function(event){
    if(event.target.id == 'Span_3'){
        CerrarModal_X('Section_3')
    }
})

// *****************************************************************************************************
 //Funcion anonima para ocultar el menu en responsive
 window.addEventListener("click", function(e){
     // console.log("_____Desde función anonima para ocultar menu_____")
     //obtiendo informacion del DOM del elemento donde se hizo click 
     var click = e.target
    //  console.log(click)
 }, false)

// *****************************************************************************************************
//seleccionar si el despacho sera enviado o recogido en tienda por medio de delegación de eventos
document.getElementById('Mostrar_TodoPedido').addEventListener('click', function(event){ 
    console.log("Iniciando delegando eventos")
    if((event.target.id == "Domicilio_No") || (event.target.id == "Domicilio_Si")){  
        console.log("¡Delegaste el evento!")
        console.log("______Desde forma_Entrega______")
        console.log(TotalDisplayCarrito)
        console.log(ComisionAplicacion)
        let porNombre = document.getElementsByName("entrega")
        //Se recorren todos los valores del radio button para encontrar el seleccionado
        for(var i=0; i<porNombre.length; i++){
            if(porNombre[i].checked){
                E= porNombre[i].value;
            }
        }
        //Se muestra la condicion de despacho
        if(E == "Domicilio_No"){
            document.getElementById("Despacho").innerHTML = "Recoger pedido en tienda:<input type='text' class='input_6' value='0' readonly='readondly'/> Bs."
            
            //Se cambia el monto total del pedido incluyendo comision y envio
            MontoTotal = Number(TotalDisplayCarrito) + Number(ComisionAplicacion)
            
            //Se muestra el monto de total de la compra incluyendo comision y envio
            document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
        }
        else{
            // <h2 class='h2_2' id="Despacho">Entrega a domicilio:<input type='text' class='input_6' value='3.000' readonly="readondly"/> Bs.</h2>
            document.getElementById("Despacho").innerHTML = "Entrega a domicilio:<input type='text' class='input_6' value='3.000' readonly='readondly'/> Bs."
            
            //Se cambia el monto total del pedido incluyendo comision y envio
            MontoTotal = Number(TotalDisplayCarrito) + Number(ComisionAplicacion) + Number(3000)
            
            //Se muestra el monto de total de la compra incluyendo comision y envio
            document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
        }
    }
}, false);
// *****************************************************************************************************
