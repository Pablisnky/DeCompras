//Declarar el array que contiene los ID_Opcion que se añaden al carrito
//Verificar para que sirve, creo que solo es util en la función decremento
PedidoCarrito = []

//Declarar el array que contiene los detalles de cada producto pedido (cantidad, producto, precio, total) cada detalle se inserta al array como un objeto JSON, es usado para alimentar "Tu Orden" en carrito_V.php
AlCarro = []

//Declarar el array que contiene los detalles de las leyendas y la ubicación de la misma dentro de una sección, cada detalle se inserta al array como un objeto JSON, es usado en opciones_V.php
AlContenedor = []

//Guarda cada precio de los productos pedidos 
DisplayCarrito = []  

//Guarda la suma del monto total del pedido que se muestra en el display del carrito de compras
TotalDisplayCarrito = []  

//Guarda los contenedores que muestran productos que han sido cargados al carrito
ProductoEnCarrito = []

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito, este objeto alimenta al array AlCarro[]
function PedidoCar(Seccion, Producto, Cantidad, Opcion, Precio, Total){
    this.Seccion = Seccion
    this.Producto = Producto
    this.Cantidad = Cantidad
    this.Opcion = Opcion
    this.Precio = Precio
    this.Total = Total
}

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito,este objeto alimenta al array AlContenedor[]
function ContenedorCar(Cont_Seccion, Cont_Leyenda, ID_Input_Leyenda, ID_Boton_Agregar, ID_InputCantidad, ID_InputProducto, ID_InputOpcion, ID_InputPrecio, ID_InputTotal, ID_InputDisplayCant, Cantidad, Producto, Opcion, Precio,Total){
    this.Cont_Seccion = Cont_Seccion
    this.Cont_Leyenda = Cont_Leyenda  
    this.ID_Input_Leyenda = ID_Input_Leyenda
    this.ID_Boton_Agregar = ID_Boton_Agregar
    this.ID_InputCantidad = ID_InputCantidad
    this.ID_InputProducto = ID_InputProducto
    this.ID_InputOpcion = ID_InputOpcion
    this.ID_InputPrecio = ID_InputPrecio
    this.ID_InputTotal = ID_InputTotal
    this.ID_InputDisplayCant = ID_InputDisplayCant
    this.Cantidad = Cantidad
    this.Producto = Producto
    this.Opcion = Opcion
    this.Precio = Precio
    this.Total = Total
}

// ************************************************************************************************** 
//Cuando carga la página vitrina_V.php se registran listener para el evento clic en toda la ventana, es decir, cada vez que se hace click en esa página se esta llamanado a la función Pre_incremento  y Pre_decremento 
document.addEventListener("click", Pre_decremento)
document.addEventListener("click", Pre_incremento)

// *****************************************************************************************************
//Se busca el alto del body de la página para garantizar que el alto del contenedor a cargar  id="Mostrar_Opciones"cubra toda la pagina en caso de que este ultimo sea mas pequeño
//Cuando carga la página se registran los listener de clic para toda la ventana
document.addEventListener("click", function(event){
    if(event.target.id == 'Section_4'){
        // console.log("______Desde funcion anonima que establece alto de body()______")
        AltoVitrina = document.body.scrollHeight
        // console.log(AltoVitrina)
        document.getElementById("contenedor_13").style.height = AltoVitrina +"px"
    }
}, false)
 
// *****************************************************************************************************
//Escucha desde opciones_V.php, archivo que se carga en vitrina_V.php desde Ajax; por medio de delegación de eventos, donde dentro de la función identificas cual fue el objetivo del click, ya sea por id o por clase o por etiqueta según sea tu necesidadtoma la etiqueta span donde se hace click
document.addEventListener('click', function(event){
    if(event.target.id == 'Span_3' || event.target.id == 'Label_9'){
        TransferirPedido()
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
document.getElementById('Mostrar_Orden').addEventListener('click', function(event){ 
    // console.log("Iniciando delegando eventos")
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

//************************************************************************************************
    // invocada desde carrito_V.php
    function verTransferenciaBancaria(){
        // console.log("______Desde verTransferenciaBancaria()______") 
        document.getElementById("Contenedor_60a").style.display = "block"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "none"
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoMovil(){
        // console.log("______Desde verPagoMovil()______") 
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "block"
        document.getElementById("Contenedor_60c").style.display = "none"
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoDestino(){
        // console.log("______Desde verPagoDestino()______") 
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "block"
    }
    //invocada desde carrito.php 
    function MuestraEnvioFactura(){
        console.log("______Desde MuestraEnvioFactura()______") 
        document.getElementById("MuestraEnvioFactura").style.display = "block"
        document.getElementById("Contenedor_26").style.display = "none"
    }
    
//************************************************************************************************
    //Parapadeo display carrito, invocada desde Pre_incremento - Pre_decremento - transferirOpcion - AgregaOpcion
    function DisplayDestello(){    
        // console.log("______Desde DisplayDestello()______")
        document.getElementById("Mostrar_Carrito").classList.add('Blink')

        setTimeout(function(){
            document.getElementById("Mostrar_Carrito").classList.remove('Blink')
        }, 3000);
    }

//************************************************************************************************
    //invocada desde opciones_V.php añade un producto al carrito   
    function agregarOpcion(form, ID_Etiqueta, ID_Cont_Leyenda, ID_InputCantidad, Seccion, ID_InputSeccion, ID_InputProducto, ID_InputOpcion, ID_InputPrecio, ID_InputTotal, ID_InputLeyenda, ID_Cont_Producto, ID_InputDisplayCan){
        // console.log("______Desde agregarOpcion()______") 
        // console.log(form)    
        // console.log(ID_Etiqueta)   
        // console.log(ID_Cont_Leyenda)   
        // console.log(ID_InputCantidad)   
        // console.log(Seccion)   
        // console.log(ID_InputSeccion)   
        // console.log(ID_InputProducto)   
        // console.log(ID_InputOpcion)   
        // console.log(ID_InputPrecio)   
        // console.log(ID_InputTotal)   
        // console.log(ID_InputLeyenda)
        // console.log(ID_Cont_Producto)
        // console.log(ID_InputDisplayCan)
        
        //Se recibe el control del formulario con el nombre "opcion"
        Opcion = form.opcion

        // En el caso que la seccion tenga un solo producto, se añade un input radio, sino se añade el Opcion.legth sera undefined y no entrará en el ciclo for
        if(Opcion.length == undefined){
        //Se añade una opcion al input tipo radio para que existan al menos dos opciones, cuando es uno el valor de Opcion.length es undefined lo que impide que se ejecute el ciclo for más adelante, esto sucede cuando solo existe un producto en una seccción
            //Se crea un input tipo radio que pertenezca a los de name="opcion"
            var NuevoElemento = document.createElement("input")

            //Se dan valores a la propiedades del nuevo elemento 
            NuevoElemento.name = "opcion"
            NuevoElemento.setAttribute("type", "radio");

            //Se especifica el elemento donde se va a insertar el nuevo elemento
            var ElementoPadre = document.getElementById("Formulario")

            //Se inserta en el DOM el input creado
            inputNuevo = ElementoPadre.appendChild(NuevoElemento) 

            //Se renombra la variable Opcion
            Opcion = form.opcion
        }

        //Se recibe el ID de la etiqueta donde se hizo click
        LabelClick = ID_Etiqueta
        localStorage.setItem('BotonAgregar', LabelClick) 
        LS_ID_BotonAgregar = localStorage.getItem('BotonAgregar')

        //Se recibe el ID del contenedor de la leyenda del producto donde se hizo click
        Cont_Leyenda_Click = ID_Cont_Leyenda
        localStorage.setItem('ID_cont_LeyendaDinamico',Cont_Leyenda_Click) 
        LS_ID_Cont_Leyenda = localStorage.getItem('ID_cont_LeyendaDinamico')
        
        //Se recibe el ID del input que va a mostrar la cantidad del producto donde se hizo click
        Input_CantidadClick = ID_InputCantidad
        localStorage.setItem('ID_InputCantidad', Input_CantidadClick)
        LS_ID_InputCantidad = localStorage.getItem('ID_InputCantidad')

        //Se recibe la seccion del producto donde se hizo click         
        localStorage.setItem('Seccion', Seccion) 
        Seccion_tienda = localStorage.getItem('Seccion')

        //Se recibe el ID del input que va a mostrar el producto donde se hizo click
        Input_ProductoClick = ID_InputProducto
        localStorage.setItem('ID_InputProducto', Input_ProductoClick)
        LS_ID_InputProducto = localStorage.getItem('ID_InputProducto')    

        //Se recibe el ID del input que va a mostrar la opcion del producto donde se hizo click
        Input_OpcionClick = ID_InputOpcion
        localStorage.setItem('ID_InputOpcion', Input_OpcionClick)
        LS_ID_InputOpcion = localStorage.getItem('ID_InputOpcion')  
        
        //Se recibe el ID del input que va a mostrar el precio del producto donde se hizo click
        Input_PrecioClick = ID_InputPrecio
        localStorage.setItem('ID_InputPrecio', Input_PrecioClick)
        LS_ID_InputPrecio = localStorage.getItem('ID_InputPrecio')

        //Se recibe el ID del input que va a mostrar el total del producto donde se hizo click
        Input_TotalClick = ID_InputTotal
        localStorage.setItem('ID_InputTotal',Input_TotalClick)
        LS_ID_InputTotal = localStorage.getItem('ID_InputTotal')

        //Se recibe el ID del input que va a mostrar la leyenda del producto donde se hizo click
        Input_LeyendaClick = ID_InputLeyenda
        localStorage.setItem('ID_InputLeyenda',Input_LeyendaClick)
        LS_ID_InputLeyenda = localStorage.getItem('ID_InputLeyenda')

        //Se recibe el ID del contenedor que muestra el producto donde se hizo click
        ID_ContenedorProducto = ID_Cont_Producto
        localStorage.setItem('ID_ContenedorProductoDina',ID_ContenedorProducto)
        
        //Se recibe el ID del input que va a mostrar la leyenda del producto donde se hizo click
        Input_DisplayCantClick = ID_InputDisplayCan
        localStorage.setItem('ID_InputDisplay',Input_DisplayCantClick)
        LS_ID_InputDisplayCant = localStorage.getItem('ID_InputDisplay')

        //Se recorren las opciones del producto 
        for(let i = 0; i < Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion = Opcion[i].value 
                            
                //La Opcion seleccionada contiene el ID_Opcion(asignado en BD), el producto, la opcion y el precio separados por un _ (guion bajo) es necesario separar estos valores, para convertirlos en un array
                let Separado = Opcion.split("_")  

                //Se eliminan las comas al final de cada elemento del array
                Separado[0] = Separado[0].slice(0,-1)//Seccion
                Separado[1] = Separado[1].slice(0,-1)//ID_Opcion
                Separado[2] = Separado[2].slice(0,-1)//Producto
                Separado[3] = Separado[3].slice(0,-1)//Opcion

                //Se oculta el boton "Agregar" del elemento donde se hizo click
                document.getElementById(LabelClick).style.display = "none"
   
                //Se muestra el contenedor donde irá la leyenda donde se hizo click
                document.getElementById(Cont_Leyenda_Click).style.display = "block"

                //Se muestra la seccion de la tienda donde se entro
                document.getElementById(ID_InputSeccion).value = Seccion_tienda  

                //Se muestra la cantidad de producto donde se hizo click
                A = document.getElementById(Input_CantidadClick).value = 1

                //Se muestra el ID_Opcion en BD donde se hizo click
                document.getElementById(Input_ProductoClick).value = Separado[1]
                
                //Se muestra el producto donde se hizo click
                document.getElementById(Input_ProductoClick).value = Separado[2]             
                                
                //Se muestra la opcion de producto donde se hizo click
                document.getElementById(Input_OpcionClick).value = Separado[3]

                //Se muestra el precio del producto donde se hizo click
                Precio = document.getElementById(Input_PrecioClick).value = Separado[4]
                                
                //Si un producto se eliminó en una entrada anterior es necesario activar nuevamente el input donde ira la leyenda y los botones de más y menos
                document.getElementById(Input_LeyendaClick).style.display = "block"          

                //Se muestra la leyenda del producto donde se hizo click
                InputLeyenda = document.getElementById(Input_LeyendaClick)
                InputLeyenda.value = 1 + ' ' + Separado[2] + ' ' + Separado[3] + ' = ' + Separado[4] + ' Bs.'

                //Se cambia el formato del precio, solo numeros sin separador de miles
                Precio = Precio.replace(".","")
                Precio = Number(Precio)
                
                //Se añade el producto carrito(no lo suma), basta con añadir el id_dinamico(ID_Opcion) por cada unidad de produto añadida
                // PedidoCarrito.push(Separado[0])

                //Se ingresa el monto del nuevo pedido al array que contiene todos los precios del pedido,                   
                DisplayCarrito.push(Precio) 

                //Suma todos los precios del pedido, este es el monto que se muestra en el display del carrito e informa al usuario de como va la cuenta  
                TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b)

                //Muestra el monto del pedido en el display carrito(se encuentra en vitrina_V.php)
                MontoCarrito = document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
              
                //Se añade el producto al array que contiene el carrito de compras
                PedidoAtomico = new PedidoCar(Separado[0], Separado[2], 1, Separado[3], Separado[4], Separado[4])
                AlCarro.push(PedidoAtomico) 

                //Se muestra el div que contiene el icono del carrito en vitrina_V.php
                document.getElementById("Contenedor_61").style.visibility = "visible"
                        
                //Detectar el contenedor de la seccion vitrina_V.php donde se hace click
                Cont_Seccion = document.getElementById(LS_ID_Cont_Seccion)

                Inp_Leyenda = document.getElementById(LS_ID_InputLeyenda)
        
                //Guarda en el objeto "AlContenedor", la leyenda del producto segun su contenedor de seccion, cada detalle en si es un array, por lo que AlContenedor es un array de objetos
                Contenedores = new ContenedorCar(LS_ID_Cont_Seccion, LS_ID_Cont_Leyenda, LS_ID_InputLeyenda, LS_ID_BotonAgregar, LS_ID_InputCantidad, LS_ID_InputProducto, LS_ID_InputOpcion, LS_ID_InputPrecio, LS_ID_InputTotal, LS_ID_InputDisplayCant, A, Separado[2], Separado[3], Separado[4], Separado[4])
            } 
            DisplayDestello()
        }
        AlContenedor.push(Contenedores)
        // console.log("Contenido de carrito", AlContenedor)

        // console.log(AlCarro)
    }

//************************************************************************************************
    //invocada desde opciones_V.php muestra en cada seccion los productos que tiene cargado en carrito
    function TransferirPedido(){
        // console.log("______Desde TransferirPedido()______")

        //Se especifica la seccion donde se va a insertar el nuevo elemento en vitrina_V.php, este localStoorage se creo en verOpciones()
        InputLeyendaDinamico = localStorage.getItem('ContSeccion')
        Padre = document.getElementById(InputLeyendaDinamico)

        //Se guarda la sección donde esta el producto cargado a pedido
        Seccion = localStorage.getItem('SeccionCLick')        

        //Se recorre todos los elementos que contengan la clase input_15 para eliminarlos
        //Se especifica a que seccion pertenecen los productos que se van a eliminar
        elementoHijo = Padre.getElementsByClassName("input_15")

        //Se cuentan cuantos productos exiten ene el contenedor
        Elementos = elementoHijo.length

        if(Elementos){
            for(let i = 0; i<Elementos; i++){ 
                //Por cada vuelta elimina el primer hijo con la clase "input_15"
                Padre.removeChild(elementoHijo[0])
            }
        }

        //Se evaluaran solo los elementos de AlCarro que correspondan a la sección donde se hizo click
        function ProductoEditado(Seccion){
            var existe = false;
            var filtered = AlCarro.filter(function(item){
                return item.Seccion == Seccion; 
            });

            let id_dinamico = 1
            for(let i = 0; i < filtered.length; i++){
                existe = true;
                //Se crean los input que cargaran las leyendas contenidas en el array filtered
                var NuevoElemento = document.createElement("input")
                
                //Se dan propiedades al nuevo elemento creado
                NuevoElemento.value = filtered[i].Cantidad + ' ' + filtered[i].Producto + ' ' + filtered[i].Opcion + ' = ' + filtered[i].Total + ' Bs.'
                NuevoElemento.classList.add("input_15")
                NuevoElemento.name = "leyenda"
                NuevoElemento.id = "Input_Leyenda_" + id_dinamico
                NuevoElemento.readOnly = true

                //Se especifica el elemento donde se va a insertar el nuevo elemento            
                var ElementoPadre = document.getElementById(InputLeyendaDinamico)
                
                //Se inserta en el DOM el input creado
                inputNuevo = ElementoPadre.appendChild(NuevoElemento) 
                id_dinamico++         
            }
            return existe;
        }
        ProductoEditado(Seccion)       
    }

//************************************************************************************************
    //invocada al cargarse llamar_Opciones() en Funciones_Ajax.js especifica los productos que ya estan cargados al carrito de compra y muestra su leyenda en la vista opciones_V.php
    function ProductosEnCarrito(){      
        // console.log("______Desde ProductosEnCarrito()______")        
    
        //Se filtran las leyendas que correspondan a la seccion seleccionada
        var filtered = AlContenedor.filter(function(item){
            return item.Cont_Seccion == LS_ID_Cont_Seccion 
        })

        for(let i = 0; i < filtered.length; i++){
            //Del objeto filtrado filtered se toman las propiedades Cont_Leyenda para rellenar la leyenda

            //Si el objeto "AlContenedor" tiene el array de un producto no se muestra el boton "Agregar" en este contenedor
            document.getElementById(filtered[i].ID_Boton_Agregar).style.display = "none"
            
            //Detectar el contenedor de la leyenda del producto en opciones_V.php donde se hizo click  
            document.getElementById(filtered[i].Cont_Leyenda).style.display = "block"
            
            //Dar valor al input de la leyenda   
            document.getElementById(filtered[i].ID_Input_Leyenda).style.display = "block"
            document.getElementById(filtered[i].ID_InputCantidad).value = filtered[i].Cantidad 
            document.getElementById(filtered[i].ID_InputProducto).value = filtered[i].Producto 
            document.getElementById(filtered[i].ID_InputOpcion).value = filtered[i].Opcion 
            document.getElementById(filtered[i].ID_InputPrecio).value = filtered[i].Precio 
            document.getElementById(filtered[i].ID_InputTotal).value = filtered[i].Total 

            document.getElementById(filtered[i].ID_InputDisplayCant).value = filtered[i].Cantidad      
            document.getElementById(filtered[i].ID_Input_Leyenda).value = filtered[i].Cantidad + ' ' + filtered[i].Producto + ' ' + filtered[i].Opcion + ' = ' + filtered[i].Total + ' Bs.'
        }        
        Pre_decremento()
        Pre_incremento()
        
        // console.log(AlContenedor)
        // console.log(AlCarro)
    }    

//************************************************************************************************
    //invocada desde A_Vitrina.js por medio de llamar_PedidoEnCarrito(), muestra "LaOrden" de compra
    function PedidoEnCarrito(){
        // console.log("______Desde PedidoEnCarrito()______")
        
        // console.log("monto de la compra", TotalDisplayCarrito)
        
        //Se muestra el monto de la compra en "La Orden". (sin comisión de plataforma y sin despacho)
        document.getElementById("MontoTienda").value = SeparadorMiles(TotalDisplayCarrito)

        //Se calcula la comisión de la aplicacion
        ComisionAplicacion = TotalDisplayCarrito * 0

        //Se muestra el monto de la comisión
        document.getElementById("Comision").value = SeparadorMiles(ComisionAplicacion)
        
        //Se calcula el monto total del pedido incluyendo comision y envio
        MontoTotal = Number(TotalDisplayCarrito) + Number(ComisionAplicacion) + Number(3000)

        //Se muestra el monto de total de la compra incluyendo comision y envio
        document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
        
        // console.log(AlCarro)
        //Se envia a Carrito_V.php todo el pedido que se encuentra en el array de objeto JSON AlCarro[]
        //1.- Se convierte el JSON en un string
        var sendJSON = JSON.stringify(AlCarro)
        //2.- Se envia al input que lo almacena en la vista carrito_V.php
        document.getElementById('Pedido').value = sendJSON

        //Se muestra todo el pedido (cantidad - producto - opcion - precio unitario - precio por productos)
        for(i = 0; i < AlCarro.length; i++){
            // console.log(AlCarro[i].Cantidad)
            document.getElementById("Tabla").innerHTML += '<tbody><tr><td class="td_1">' +  AlCarro[i].Cantidad + '</td><td class="td_2">' +  AlCarro[i].Producto + " / " + AlCarro[i].Opcion + '</td><td class="td_3">' + AlCarro[i].Precio + '</td><td class="td_3">' + AlCarro[i].Total + '</td></tr></tbody>'
        }
    }
    
//************************************************************************************************
    //invocada desde vitrina_V identifica los elementos de la sección donde se hizo click.
    function verOpciones(Cont_Seccion, Seccion){ 
        // console.log("______Desde verOpciones()______")     

        //Captura el valor del id dinanmico de la seccion donde se hizo click
        localStorage.setItem('ContSeccion', Cont_Seccion)         
        LS_ID_Cont_Seccion = localStorage.getItem('ContSeccion')

        //Captura la seccion donde se hizo click
        localStorage.setItem('SeccionCLick',Seccion)  
    }

//************************************************************************************************
    //Cambia el formato de total en el carrito de compras para mostrar en display
    function SeparadorMiles(Numero){
        if(Numero != 0){
            // console.log("______Desde SeparadorMiles()______") 
            Numero += ''
            var x = Numero.split('.')
            var x1 = x[0]
            var x2 = x.length > 1 ? '.' + x[1] : ''
            var rgx = /(\d+)(\d{3})/
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + '.' + '$2')
            }
            // console.log(x1 + x2)
            return x1 + x2;
        }
        else{
            return Numero
        }
    }

// **********************************************************************************************
    //invocada desde opciones_V  
    function Pre_incremento(){  
        // console.log("______Desde Pre_incremento()______")
       
        //Detectar el boton donde se hace click
        let mas = document.getElementsByClassName("mas")//Se obtienen los botones [+]
        let len = mas.length//Se cuenta cuanto botones mas existen
        let boton
        for(let i = 0; i < len; i++){
            boton = mas[i] //Encontrar el botón [+].
            boton.onclick = incrementar //Asignar la función incrementar(), al evento click.
        }
        function incrementar(e){
            console.log("______Desde Incrementar()______")
            //Se obtiene el elemento padre donde se encuentra el boton mas al que se hizo click
            let current = e.target.parentElement

            //Se busca el input del display que se quiere incrementar            
            let inputSeleccionado = current.getElementsByClassName("input_2")[0]

            //Se accede a la propiedad valor del input display 
            let valor = inputSeleccionado.value

            //Se obtiene el contenedor hermano a "current" para acceder a sus input
            let inputSeleccionadoLeyen = current.previousElementSibling  
            if(valor < 10){
                A = valor++
                A++

                //Muestra la cantidad en el input display
                inputSeleccionado.value = A
                
                //Input seccion Aqui se muestra la seccion de la tienda
                // let Seccion = inputSeleccionadoLeyen.getElementsByClassName("input_1g")[0].value

                //ID_Producto desde BD 
                let Producto = inputSeleccionadoLeyen.getElementsByClassName("input_1a")[0].value

                //Input opcion Aqui se muestra la Opcion del producto
                let Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1c")[0].value

                //input cantidad Aqui se mostrará la cantidad
                let Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = A
                                
                //Input precio Aqui se muestra el precio
                let Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value
                                
                //Se cambia el formato del precio
                Precio = Precio.replace(".","")
                Precio = Number(Precio)

                //Se calcula el total
                let Total = Cantidades * Precio  

                //Input total Aqui se mostrará el total
                inputSeleccionadoLeyen.getElementsByClassName("input_1f")[0].value = Total
                
                //Muestra la leyenda del pedido por producto
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto + ' ' + Opcion + " = " + SeparadorMiles(Total) + " Bs."

                //Se busca el ID_Opcion del producto selecionado (Este ID fue asignado en la BD) para saber que producto contiene y añadirlo en el carrito
                //input ID_Opcion en el elemento hermano del click correspondiente; Aqui se mostrará el ID_Opcion
                // let ID_Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1b")[0].value
           
                //Se añade el producto al array PedidoCarrito, basta con añadir el id_dinamico(ID_Opcion) por cada unidad de produto añadida
//                 PedidoCarrito.push(ID_Opcion)

                //Se añade el precio al array que contiene todos los montos individules por productos
                DisplayCarrito.push(Precio)

                //Se suma el precio del nuevo pedido al array que contiene el monto total del pedido
                TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b);
                
                //Muestra el monto del pedido en el display carrito(se encuentra en pie de página)
                MontoCarrito = document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
              
                //Se crea una nuevo array del objeto PedidoCar 
                PedidoGlobal = new PedidoCar(Seccion_tienda, Producto, Cantidades, Opcion, Precio, TotalDisplayCarrito);

                //Se verifica que el producto existe en el array AlCarro que contiene el pedidio y se edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Opcion){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = SeparadorMiles(Total)  
                        }
                    }
                    
                    var existe = false;
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            existe = true;
                            AlContenedor[i].Cantidad = Cantidades
                            AlContenedor[i].Total = Total
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Opcion)          
            }  
            DisplayDestello()
console.log(AlContenedor)
console.log(AlCarro)
        }  
    }   

//************************************************************************************************
    //invocada desde vitrina_V
    function Pre_decremento(){      
        // console.log("______Desde Pre_decremento()______") 

        //Detectar el boton de restar
        var menos = document.getElementsByClassName("menos")//Se obtienen los botones menos [-]
        var len = menos.length//Se cuentan cuantos botones menos hay  
        var boton
        for(let i = 0; i < len; i++){
            boton = menos[i]; //Se Encontrar el botón [-] seleccionado al hacer click
            boton.onclick = decrementar // Asignar la función decrementar() en su evento click.
        }    
        function decrementar(e){   
            console.log("______Desde decrementar()______") 
            
            //Se obtiene el div padre donde se encuentra el boton menos al que se hizo click
            current = e.target.parentElement

            //En el div padre se busca el input del display que se quiere incrementar(este es el input que muestra la cantidad entre los botones mas y menos)          
            let inputSeleccionado = current.getElementsByClassName("input_2")[0]

            //Se accede a la propiedad valor al input display 
            let valor = inputSeleccionado.value
            valor = Number(valor)

            //Se obtiene el contenedor hermano a "current" para acceder a sus input (este div contiene la leyenda entre otros input)
            let Cont_leyenda = current.previousElementSibling  
            
            if((valor > 1) && (valor < 10)){
                //Muestra la cantidad en el input display
                A = valor--
                A--

                //Muestra la cantidad en el input display
                inputSeleccionado.value = A

                //Input producto en el elemento hermano del click correspondiente; Aqui se muestra el producto
                let Producto = Cont_leyenda.getElementsByClassName("input_1a")[0].value

                //Input opcion en el elemento hermano del click correspondiente; Aqui se muestra el producto
                let Opcion = Cont_leyenda.getElementsByClassName("input_1c")[0].value

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                let Cantidades = Cont_leyenda.getElementsByClassName("input_1e")[0].value = A
 
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                let Precio = Cont_leyenda.getElementsByClassName("input_1d")[0].value

                //Se cambia el formato del precio
                Precio = Precio.replace(".","")
                Precio = Number(Precio)
                                
                //Se calcula el total
                let Total = Cantidades * Precio    
                 
                //Input total en el elemento hermano del click correspondiente; Aqui se mostrará el total
                Cont_leyenda.getElementsByClassName("input_1f")[0].value = Total

                //Se busca el ID_Opcion del producto selecionado (Este ID fue asignado en la BD) para saber que producto contiene y añadirlo en el carrito
                //input ID_Opcion en el elemento hermano del click correspondiente; Aqui se mostrará el ID_Opcion
                // ID_Opcion = Cont_leyenda.getElementsByClassName("input_1b")[0].value
                
                //Se añade el precio del pedido a remover del array que contiene el monto total del pedido
                // SinPunto = Precio.replace(".","")
                // PrecioARestar = Number(SinPunto)
                // DisplayCarrito.push(PrecioARestar)

                //Se resta el precio del pedido al array que contiene el monto total del pedido
                // TotalDisplayCarrito = Number(DisplayCarrito[0]) - Number(PrecioARestar);
                
                //Muestra la leyenda del pedido por producto
                Cont_leyenda.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto + ' ' + Opcion + " = " + SeparadorMiles(Total) + " Bs."    

                //Busca por el precio dado y devuelve la posición de la primera ocurrencia.
                let Eliminar = DisplayCarrito.indexOf(Precio)
                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                DisplayCarrito.splice(Eliminar, 1)

                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio

                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito = document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs."  

                //Se crea una nuevo array del objeto PedidoCar 
                PedidoGlobal = new PedidoCar(Seccion_tienda, Producto, Cantidades, Opcion, Precio, TotalDisplayCarrito);

                //Se verifica que el producto existe en el array AlCarro que contiene los productos pedidos y si edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden, de igual manera se verifica el array AlContenedor que contiene la información de cada leyenda
                function ProductoEditado(Opcion){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = SeparadorMiles(Total)
                        }
                    }
                    
                    var existe = false;
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            existe = true;
                            AlContenedor[i].Cantidad = Cantidades
                            AlContenedor[i].Total = Total
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Opcion) 
// console.log(AlContenedor) 
            }        
            else{//Si no hay mas producto que eliminar
                // confirm("Desea eliminar el pedido de ???")
                //Se da un aviso para confirmar que se va a elminar el pedido de ese producto
                // Llamar_AlertPersonalizado()
                
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                Precio = Cont_leyenda.getElementsByClassName("input_1d")[0].value
                Precio = Precio.replace(".","")
                Precio = Number(Precio)

                //Input producto en el elemento hermano del click correspondiente; Aqui se muestra el producto
                Producto = Cont_leyenda.getElementsByClassName("input_1a")[0].value

                //Input opcion en el elemento hermano del click correspondiente; Aqui se muestra el producto
                Opcion = Cont_leyenda.getElementsByClassName("input_1c")[0].value

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                Cantidades = Cont_leyenda.getElementsByClassName("input_1e")[0].value = 0

                //Se crea una nuevo array del objeto PedidoCar 
                PedidoGlobal = new PedidoCar(Seccion_tienda, Producto, Cantidades, Opcion, Precio, TotalDisplayCarrito);
// console.log(AlCarro)
console.log(AlContenedor)
                //Se elimina el producto del array que contiene el pedido, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Opcion){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            AlCarro.splice(i, 1);
                        }
                    }
                  
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlContenedor[i].Opcion == Opcion ){
                            AlContenedor.splice(i, 1);
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Opcion)
               
                //Busca por el precio del producto a liminar y devuelve la posición de la primera ocurrencia.
                let Eliminar = DisplayCarrito.indexOf(Precio)
// console.log(DisplayCarrito)
                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                DisplayCarrito.splice(Eliminar, 1)

                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio
// console.log(TotalDisplayCarrito)
                //Muestra el monto del pedido en el display carrito(se encuentra en vitrina.php)
                MontoCarrito = document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                                                    
                //Se oculta el contenedor donde se encuentra el boton menos y la leyenda del producto al que se hizo click
                current.parentElement.style.display = "none"

//                 Cont_leyenda.style.display = "none"
// console.log(Cont_leyenda)               
//                 //Se oculta el contenedor donde se encuentra  a eliminar
//                 current.style.display = "none"
// console.log(current)             



                //En los proximos tres pasos, se hace una "escala DOM" para obtener y mostrar la etiqueta "Agregar" del div que contiene el producto analizado
                //Se obtiene el div padre de los botones mas y menos
                PadreMasMenos = current.parentElement
                //Se obtiene el hermano del div PadreMasMenos
                HermanoMasMenos = PadreMasMenos.previousElementSibling 
                //Se muestra la etiqueta agregar del div HermanoMasMenos que se ocultó en 
                EtiquetaAgregar = HermanoMasMenos.getElementsByClassName("Label_3js")[0].style.display = "block"
console.log(EtiquetaAgregar)
console.log(HermanoMasMenos.getElementsByClassName("Label_3js")[0])

// console.log(AlCarro)
                //Se oculta el display carrito cuando el pedido sea de cero Bolivares y se muestra el boton de agregar opcion
                if(TotalDisplayCarrito == 0 ){ 
// console.log(LS_ID_Cont_Leyenda)
                    //Se oculta la leyenda del producto
                    // inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].style.visibility = "hidden"
                                        
                    //Se oculta el carrito de compras en el fondo del viewport
                    document.getElementById("Contenedor_61").style.visibility = "hidden"
                }
                else{
                    //Se busca el nodo padre que contiene el input donde esta el producto a eliminar
                    // let elementoHijo = current.parentElement
                    // let elementoPadre = elementoHijo.parentElement
                    // elementoPadre.removeChild(elementoHijo);      
// console.log("Aún quedan productos en el pedido")              
                }
            }  
            DisplayDestello()
console.log(AlContenedor)
console.log(AlCarro) 
        }    
    }

//************************************************************************************************ 
    //invocada desde carrito_V.php
    function ocultarPedido(){   
        // console.log("______Desde ocultarPedido()______") 
        //Coloca el cursor en el top de la pagina
        window.scroll(0, 0)
        document.getElementById("Mostrar_Orden").style.display = "none";
    }    

    //************************************************************************************************
    //ajusta el texarea con respecto al contenido que trae de la BD es llamado desde opciones_V.php
    function resize(){
        var text = document.getElementById("OpcionPro");
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
     
//************************************************************************************************ 
    //Verifca que el archivo opciones ya se haya cargado
    function verificarDiv(){
        // console.log("______Desde verificarDiv()______")  
        if(document.getElementById('Mostrar_Opciones').childElementCount < 1){
            // console.log("No hay elementos en el div id=\"Mostrar_Opciones\"")
            
        }
        else{
            // console.log("Los productos de la seccion son:", document.getElementsByClassName('contenedor_95'))            
        }

    }

//************************************************************************************************
    function stopInterval(){
    // console.log("______Desde stopInterval()______")
    clearInterval(interval)
    }

//************************************************************************************************ 
    //LLamada desde descr_Producto.php
    function cerrarVentana(){            
        window.close();
    }

//************************************************************************************************
    //Valida el formulario de despacho de producto
    function validarDespacho(){
        // console.log("______Desde validarDespacho()______")

        document.getElementsByClassName("botonJS")[0].value = "Enviando ..."
        document.getElementsByClassName("botonJS")[0].disabled = "disabled"
        document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("botonJS")[0].classList.add('borde_1')
        
        let Nombre = document.getElementById('NombreUsuario').value
        let Apellido = document.getElementById('ApellidoUsuario').value 
        let Cedula = document.getElementById('CedulaUsuario').value 
        let Telefono = document.getElementById('TelefonoUsuario').value 
        let Direccion = document.getElementById('DireccionUsuario').value  
        let Estado = document.getElementById('Estado').value 
        let Ciudad = document.getElementById('Ciudad').value
        let Pago = document.getElementsByName('pago') 
        //Recorremos todos los valores del radio button para encontrar el seleccionado
        for(let i = 0; i < Pago.length; i++){
            if(Pago[i].checked)
            var PagoSeleccionado = Pago[i].value
            // console.log(PagoSeleccionado)
        }
       
        let RegistroPago_Transferencia = document.getElementById('RegistroPago_Transferencia').value
        let RegistroPago_Pagomovil = document.getElementById('RegistroPago_Pagomovil').value
        
        //Patron de entrada solo acepta letras
        let P_Letras = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/

        //Patron de entrada solo acepta numeros,guion y puntos          
        let P_Telefono = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;

        // let P_LetrasNumero = /[A-Za-z0-9]/;
                
        if(Nombre == "" || Nombre.indexOf(" ") == 0 || Nombre.length > 40 || P_Letras.test(Nombre) == false){
            alert ("Nombre invalido");
            document.getElementById("NombreUsuario").value = "";
            document.getElementById("NombreUsuario").focus();
            document.getElementById("NombreUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(Apellido =="" || Apellido.indexOf(" ") == 0 || Apellido.length > 20 || P_Letras.test(Apellido) == false){
            alert ("Apellido invalido");
            document.getElementById("ApellidoUsuario").value = "";
            document.getElementById("ApellidoUsuario").focus();
            document.getElementById("ApellidoUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(Cedula =="" || Cedula.indexOf(" ") == 0 || Cedula.length < 9  || Cedula.length > 10){
            alert ("número de cedula invalido");
            document.getElementById("CedulaUsuario").value = "";
            document.getElementById("CedulaUsuario").focus();
            document.getElementById("CedulaUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(Telefono =="" || Telefono.indexOf(" ") == 0 || Telefono.length > 14){
            alert ("Telefono invalido");
            document.getElementById("TelefonoUsuario").value = "";
            document.getElementById("TelefonoUsuario").focus();
            document.getElementById("TelefonoUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(Estado == "Seleccione un estado"){
            alert ("Selecione un Estado");
            document.getElementById("Estado").value = "";
            document.getElementById("Estado").focus();
            document.getElementById("Estado").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(Ciudad == "Seleccione una ciudad"){
            alert ("Selecione una Ciudad");
            document.getElementById("Ciudad").value = "";
            document.getElementById("Ciudad").focus();
            document.getElementById("Ciudad").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(Direccion =="" || Direccion.indexOf(" ") == 0 || Direccion.length > 20){
            alert ("Direccion invalida");
            document.getElementById("DireccionUsuario").value = "";
            document.getElementById("DireccionUsuario").focus();
            document.getElementById("DireccionUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(PagoSeleccionado == undefined){
            alert ("Debe indicar un modo de pago");
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
        }
        else if(PagoSeleccionado == "Transferencia"){
            if(RegistroPago_Transferencia == "" ||  RegistroPago_Transferencia.indexOf(" ") == 0 || RegistroPago_Transferencia.length > 20){
                alert ("Código de transferencia invalido");
                document.getElementById("RegistroPago_Transferencia").value = "";
                document.getElementById("RegistroPago_Transferencia").focus();
                document.getElementById("RegistroPago_Transferencia").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("botonJS")[0].value = "Comprar"
                document.getElementsByClassName("botonJS")[0].disabled = false
                document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
                return false;
            }
        }
        else if(PagoSeleccionado == "PagoMovil"){
            if(RegistroPago_Pagomovil == "" ||  RegistroPago_Pagomovil.indexOf(" ") == 0 || RegistroPago_Pagomovil.length > 20){
            alert ("Código de PagoMovil invalido");
            document.getElementById("RegistroPago_Pagomovil").value = "";
            document.getElementById("RegistroPago_Pagomovil").focus();
            document.getElementById("RegistroPago_Pagomovil").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("botonJS")[0].value = "Comprar"
            document.getElementsByClassName("botonJS")[0].disabled = false
            document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
            return false;
            }
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }

//************************************************************************************************
    //Impide que se siga introduciendo caracteres al alcanzar el limite maximo en el telefono
    var contenidoTelefono = ""; 
    var num_caracteres_permitidos = 14; 

    function valida_LongitudTelefono(){ 
        // console.log("______Desde valida_LongitudTelefono()______")

        let num_caracteres_input = document.getElementById("TelefonoUsuario").value.length

        if(num_caracteres_input > 13){ 
            document.getElementById("TelefonoUsuario").value = contenidoTelefono; 
        }
        else{ 
            contenidoTelefono = document.getElementById("TelefonoUsuario").value;   
        } 
    } 

//************************************************************************************************
    //Abre la ventna de detalles de producto, invocado en opciones_V.php
    function mostrarDetalles(ContadorLabel, Nombre_Tienda, Slogan_Tienda, ID_Tienda, Producto, Opcion, Precio, Fotografia, ID_Producto){
        // console.log("______Desde mostrarDetalles()______")
        window.open(`../../Opciones_C/productoAmpliado/${'Etiqueta_' + ContadorLabel},${Nombre_Tienda},${Slogan_Tienda},${ID_Tienda},${Producto},${Opcion},${Precio},${Fotografia},${ID_Producto}`, "ventana1", "width=1300,height=650,scrollbars=YES")   
    }

//************************************************************************************************
    function CerrarModal_X(id){
        // console.log("______Desde CerrarModal_X()______")
        document.getElementById(id).style.display = "none"
    }
    
//************************************************************************************************
    //Desactiva el boton de volver atras del navegador
    function nobackbutton(){
        // console.log("______Desde nobackbutton()______")
        window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button" //chrome
        window.onhashchange=function(){window.location.hash="no-back-button";}
    }

//************************************************************************************************
   //Funcion anonima para ocultar el menu principal en responsive haciendo click por fuera del boton menu
   let div = document.getElementById("MenuResponsive")
   let span= document.getElementById("Span_6")
   let B = document.getElementById("Tapa")
   window.addEventListener("click", function(e){
       // console.log("_____Desde función anonima para ocultar menu_____")
       //obtiendo informacion del DOM del elemento donde se hizo click 
       var click = e.target
       // console.log("Click en: ", click)
       AltoVitrina = document.body.scrollHeight
       if((div.style.marginLeft == "0%") && (click != div) && (click != span)){
           div.style.marginLeft = "-60%"
           B.style.display = "none"
           //Se detiene la propagación de los eventos en caso de hacer click en un elemento que contenga algun evento
           event.stopPropagation();
       }
   }, true)

//************************************************************************************************
   //Muestra el menu principal en formato movil y tablet  
   function mostrarMenu(){  
       console.log("______Desde mostrarMenu()______")
       let A = document.getElementById("MenuResponsive")
       let B = document.getElementById("Tapa")

       if(A.style.marginLeft < "0%"){//Se muestra el menu
           A.style.marginLeft = "0%"
           B.style.display = "block"
       }
       else if(A.style.marginLeft = "0%"){//Se oculta el menu
           A.style.marginLeft = "-60%"
           B.style.backgroundColor = "none"
       }
   }

//************************************************************************************************
    //Coloca los puntos de miles en tiempo real al llenar el campo a cedula
    function formatoMiles(numero, id){
        // console.log("______Desde formatoMiles()______", numero + " / " + id)

        var num = numero.replace(/\./g,'')
        if(!isNaN(num) && numero.length < 11){
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.')
            num = num.split('').reverse().join('').replace(/^[\.]/,'')
            numero.value = num
            document.getElementById(id).value = num
        }
        else{ 
            alert('Número de cedula invalido')
            document.getElementById(id).value = ""
        }
    }
    
 //************************************************************************************************
    //Mascara de entrada para el telefono, agrega los puntos en tiempo real en tiempo real al llenar el campo    
    function mascaraTelefono(TelefonoRecibido, id){
        // console.log("______Desde mascaraTelefono()______", TelefonoRecibido + " / " + id)
        
        if(TelefonoRecibido.length == 4){
            document.getElementById(id).value += "-"; 
        }
        else if(TelefonoRecibido.length == 8){
            document.getElementById(id).value += ".";  
        }
        else if(TelefonoRecibido.length == 11){
            document.getElementById(id).value += ".";  
        }
    }

//************************************************************************************************
    //Quita el color de fallo en un input y lo deja en su color original
    function blanquearInput(id){        
        // console.log("______Desde blanquearInput()______", id)
        document.getElementById(id).style.backgroundColor = "white"
    }
   
//************************************************************************************************
    // Validar el formato de telefono
    function validarFormatoTelefono(NroTelefono,id){
        // console.log("______Desde validarFormatoTelefono()______",NroTelefono)

        var P_Telefono = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
            
        if(P_Telefono.test(NroTelefono) == true){            
            console.log("Telefono con formato correcto");
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById(id).value = "";
            document.getElementById(id).focus()
            document.getElementById(id).style.backgroundColor = 'var(--Fallos)'; 
            return false;
        }
    }

//************************************************************************************************
///Escucha en opciones_V.php por medio de delegación de eventos debido a que el evento no esta cargado en el DOM por ser una solicitud Ajax   
// document.getElementById('Mostrar_Opciones').addEventListener('click', function(event){    
//     if(event.target.id == 'Span_523'){
//         console.log("HOLA")
//     }
// }, false);
     