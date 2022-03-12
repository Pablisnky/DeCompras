//Declarar el array que contiene los ID_Opcion que se añaden al carrito
//Verificar para que sirve, creo que solo es util en la función decremento
PedidoCarrito = []

//Declarar el array que contiene los detalles de cada producto pedido y la ubicación de cada uno dentro de una sección, cada detalle se inserta al array como un objeto JSON, es usado en opciones_V.php, es usado para alimentar "Tu Orden" en carrito_V.php y las leyendas en cada sección y en cada producto
AlContenedor = []

//Guarda cada precio de los productos pedidos 
// DisplayCarrito = []  

//Guarda la suma del monto total del pedido que se muestra en el display del carrito de compras
TotalDisplayCarrito = []  

//Guarda los contenedores que muestran productos que han sido cargados al carrito
ProductoEnCarrito = []

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito, este objeto edita al array AlContenedor[]
function PedidoCar(Producto, Cantidad, Total){
    this.Producto = Producto
    this.Cantidad = Cantidad
    this.Total = Total
}

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito, este objeto alimenta al array AlContenedor[]
function ContenedorCar(Cont_Seccion, Cont_Leyenda, ID_Input_Leyenda, ID_Boton_Agregar, ID_InputCantidad, ID_InputProducto, ID_InputOpcion, ID_InputPrecio, ID_InputTotal, ID_InputDisplayCant, Cantidad, Seccion, ID_Opcion, Producto, Opcion, Precio,Total, Existencia, ID_BotonMas, ID_BotonBloqueo){
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
    this.Seccion = Seccion
    this.ID_Opcion = ID_Opcion
    this.Producto = Producto
    this.Opcion = Opcion
    this.Precio = Precio
    this.Total = Total
    this.Existencia = Existencia
    this.ID_BotonMas = ID_BotonMas
    this.ID_BotonBloqueo = ID_BotonBloqueo
}

// ************************************************************************************************** 
//obtiendo informacion del DOM para identificar el elemento donde se hizo click 
// window.addEventListener("click", function(e){   
//     var click = e.target
//     console.log("Se hizo click en: ", click)
// }, false)
// ************************************************************************************************** 

//Cuando carga la página vitrina_V.php se registran listener para el evento clic en toda la ventana, es decir, cada vez que se hace click en esa página se esta llamanado a la función Pre_incremento  y Pre_decremento 
document.addEventListener("click", Pre_decremento)
document.addEventListener("click", Pre_incremento) 

//Escucha desde modal_fueraHorario_V.php
if(document.getElementById("Label_1")){
    document.getElementById("Label_1").addEventListener('click', function(){CerrarModal_X('Section_1')}, false)
}

//************************************************************************************************
   //Ocultar el menu principal en responsive haciendo click por fuera del boton menu
   let div = document.getElementById("MenuResponsive")
   let span= document.getElementById("Span_6")
   let B = document.getElementById("Tapa")
   window.addEventListener("click", function(e){
       //obtiendo informacion del DOM del elemento donde se hizo click 
       var click = e.target
       // console.log("Click en: ", click)
       AltoVitrina = document.body.scrollHeight
       if((div.style.marginLeft == "0%") && (click != div) && (click != span)){
           div.style.marginLeft = "-70%"
           B.style.display = "none"
           //Se detiene la propagación de los eventos en caso de hacer click en un elemento que contenga algun evento
           event.stopPropagation();
       }
   }, true)

// *****************************************************************************************************
//Escucha desde opciones_V.php, archivo que se carga via Ajax en vitrina_V.php; por medio de delegación de eventos
document.addEventListener('click', function(event){
    if(event.target.id == 'Span_3' || event.target.id == 'Label_9'){
        TransferirPedido()
        CerrarModal_X('Section_3')
    }
})

// *****************************************************************************************************
//seleccionar si el despacho sera enviado o recogido en tienda por medio de delegación de eventos en div Mostrar_OrdenMayorista ubicado en vitrina_V.php
document.getElementById('Mostrar_OrdenMayorista').addEventListener('click', function(event){ 
    if((event.target.id == "Domicilio_No") || (event.target.id == "Domicilio_Si")){  
        // console.log("______Desde forma_Entrega______")
        // console.log(TotalDisplayCarrito)
        let porNombre = document.getElementsByName("entrega")
        //Se recorren todos los valores del radio button para encontrar el seleccionado
        for(var i=0; i<porNombre.length; i++){
            if(porNombre[i].checked){
                E = porNombre[i].value;
                console.log(E)
            }
        }

        //Se obtiene el valor del domicilio, tarado a un 1,3 dolares (esto se esta haciendo dss veces en este archivo, corregir)
        envio = document.getElementById("PrecioEnvio").value

        //Se muestra la condicion de despacho
        if(E == "Domicilio_No"){
            document.getElementById("Despacho_2").value = 0
            
            //Se cambia el monto total del pedido incluyendo comision y envio
            MontoTotal = Number(TotalDisplayCarrito)

            //Se calcula el monto en Dolares
            MontoTotalDolares = MontoTotal / Local_ValorDolarHoy
            MontoTotalDolares = MontoTotalDolares.toFixed(2)

            //Se muestra el monto de total de la compra incluyendo envio en Bolivares
            document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
            
            //Se muestra el monto de total de la compra incluyendo envio en Dolares, con dos decimales
            document.getElementById("MontoTotalDolares").value = SeparadorMiles(MontoTotalDolares)
        }
        else{//Entra en ele ELSE en caso de pagar por despacho
            envio = Number.parseFloat(envio).toFixed(2);
            // console.log(envio)
            document.getElementById("Despacho_2").value = SeparadorMiles(envio)

            //Se cambia el monto total del pedido incluyendo comision y envio
            MontoTotal = Number(TotalDisplayCarrito) + Number(envio)
            MontoTotal = MontoTotal.toFixed(2)
            // console.log("MontoTotal", MontoTotal)
            
            //Se calcula el monto en Dolares
            MontoTotalDolares = MontoTotal / Local_ValorDolarHoy
            MontoTotalDolares = MontoTotalDolares.toFixed(2)

            //Se muestra el monto de total de la compra incluyendo comision y envio
            document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)

            //Se muestra el monto de total de la compra incluyendo envio en Dolares, con dos decimales
            document.getElementById("MontoTotalDolares").value = SeparadorMiles(MontoTotalDolares)
        }
    }
}, false);  

//************************************************************************************************
    //invocada desde opciones_Mayorista_V.php añade un producto al carrito   
    function agregarOpcion(form, ID_Etiqueta, ID_Cont_Leyenda, ID_InputCantidad, Seccion, ID_InputSeccion, ID_InputProducto, ID_InputOpcion, ID_InputPrecio, ID_InputTotal, ID_InputLeyenda, ID_Cont_Producto, ID_InputDisplayCan, existencia, ID_BotonMas, ID_BloqueoMas){
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
        // console.log("Existencia en BD", existencia)
        
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

        //Se recibe el ID del contenedor de la leyenda del producto y los botones de más y menos donde se hizo click
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
                Cantidad_uno = document.getElementById(Input_CantidadClick).value = 1
                // console.log("Cantidad agregada a carrito = ", A)

                //Se muestra el ID_Opcion en BD donde se hizo click
                document.getElementById(Input_ProductoClick).value = Separado[1]
                
                //Se muestra el producto donde se hizo click
                document.getElementById(Input_ProductoClick).value = Separado[2]             
                                
                //Se muestra la opcion de producto donde se hizo click
                document.getElementById(Input_OpcionClick).value = Separado[3]

                //Se muestra el precio del producto donde se hizo click
                Precio = document.getElementById(Input_PrecioClick).value = Separado[4]
                // console.log(Precio)
                   
                //Si un producto se eliminó en una entrada anterior es necesario activar nuevamente el input donde ira la leyenda y los botones de más y menos
                document.getElementById(Input_LeyendaClick).style.display = "block"          

                //Se muestra la leyenda del producto donde se hizo click
                InputLeyenda = document.getElementById(Input_LeyendaClick)
                InputLeyenda.value = 1 + ' ' + Separado[2] + ' = ' + Separado[4] + ' Bs.'
                                        
                //Detectar el contenedor de la seccion vitrina_V.php donde se hace click
                Cont_Seccion = document.getElementById(LS_ID_Cont_Seccion)

                Inp_Leyenda = document.getElementById(LS_ID_InputLeyenda)

                var ID_BotonMas = document.getElementById(ID_BotonMas).id
                var ID_BotonBloqueo = document.getElementById(ID_BloqueoMas).id
                // console.log(ID_BotonMas + " " + ID_BotonBloqueo )

                //Guarda en el objeto "AlContenedor", la leyenda del producto segun su contenedor de seccion, cada detalle en si es un array, por lo que AlContenedor es un array de objetos
                Contenedores = new ContenedorCar(LS_ID_Cont_Seccion, LS_ID_Cont_Leyenda, LS_ID_InputLeyenda, LS_ID_BotonAgregar, LS_ID_InputCantidad, LS_ID_InputProducto, LS_ID_InputOpcion, LS_ID_InputPrecio, LS_ID_InputTotal, LS_ID_InputDisplayCant, Cantidad_uno, Separado[0], Separado[1], Separado[2], Separado[3], Separado[4], Separado[4], existencia, ID_BotonMas, ID_BotonBloqueo)
                             
                //Si la existencia en BD es igual a 1 se oculta el boton de mas y menos para que no se añadan más productos al carrito
                if(existencia == Cantidad_uno){
                    document.getElementById(ID_BotonMas).style.display = "none" 
                    document.getElementById(ID_BloqueoMas).style.display = "inline" 
                }
                else{
                    document.getElementById(ID_BotonMas).style.display = "inline" 
                    document.getElementById(ID_BloqueoMas).style.display = "none" 
                }
            } 
        }

        AlContenedor.push(Contenedores)
        // console.log("AlContenedor desde agregar", AlContenedor)
        
        //Se muestra el div que contiene el icono del carrito
        DisplayDestello()
    }

//************************************************************************************************
    //Parapadeo display carrito, invocada desde Pre_incremento - Pre_decremento - transferirOpcion - AgregaOpcion
    function DisplayDestello(){    
        // console.log("______Desde DisplayDestello()______")
                
        //Este array contendra solo los precios individuales de los productos para luego sumarlos
        DisplayMonto = [];

        for(var i = 0; i < AlContenedor.length; i++){
            //Se toman los precios de cada producto
            PrecioDisplay = AlContenedor[i].Precio
            // console.log("PrecioDisplay", PrecioDisplay)
            // console.log(typeof PrecioDisplay)

            //Se cambia el formato del precio, la coma decimal se reemplazo por un punto
            PrecioDisplay = PrecioDisplay.replace(/,/g, '.')
            // console.log("PrecioDisplay", PrecioDisplay)

            PrecioDisplay = parseFloat(PrecioDisplay)
            // console.log(typeof PrecioDisplay)
            // console.log("PrecioDisplay", PrecioDisplay)
            
            //Se verifica la cantidad total de cada producto
            let Total = AlContenedor[i].Cantidad * PrecioDisplay 

            DisplayMonto.push(Total)
            // console.log("DisplayMonto", DisplayMonto)

            //Se suma el precio de todos los producto cargado a carrito
            TotalDisplayCarrito = DisplayMonto.reduce((a, b) => a + b, 0);

            //Se permiten solo dos decimales
            TotalDisplayCarrito = TotalDisplayCarrito.toFixed(2)
        }        

        if(AlContenedor.length == 0){
            //Se oculta el div que contiene el icono del carrito en vitrina_V.php
            document.getElementById("Contenedor_61").style.visibility = "hidden"
        }
        else if(TotalDisplayCarrito != 0){
            //Se muestra el div que contiene el icono del carrito en vitrina_V.php
            document.getElementById("Contenedor_61").style.visibility = "visible"

            //Muestra el monto del pedido en el display carrito(se encuentra en vitrina_V.php)
            document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs."

            document.getElementById("Mostrar_Carrito").classList.add('Blink')

            setTimeout(function(){
                document.getElementById("Mostrar_Carrito").classList.remove('Blink')
            }, 3000);
        }
    }

//************************************************************************************************
    //invocada desde opciones_V.php al regresar a vitrina_V.php, agrega las leyendas en cada seccion  con los productos que estas tienen cargado en carrito
    function TransferirPedido(){

        //Se especifica la seccion donde se va a insertar la leyenda en vitrina_V.php, este localStorage se creo en verOpciones()
        InputLeyendaDinamico = localStorage.getItem('ContSeccion')
        Padre = document.getElementById(InputLeyendaDinamico)
        // console.log("Cont_Seccion", Padre)

        //Se guarda la sección donde esta el producto cargado a pedido
        Seccion = localStorage.getItem('SeccionCLick')     
        // console.log("Seccion", Seccion)   

        //Se recorre todos los elementos que contengan la clase input_15 para eliminarlos
        //Se especifica a que seccion pertenecen los productos que se van a eliminar
        elementoHijo = Padre.getElementsByClassName("input_15")

        //Se cuentan cuantos productos exiten en el contenedor
        Elementos = elementoHijo.length

        if(Elementos){
            for(let i = 0; i<Elementos; i++){ 
                //Por cada vuelta elimina el primer hijo con la clase "input_15"
                Padre.removeChild(elementoHijo[0])
            }
        }

        //Se evaluaran solo los elementos del array "AlContenedor" que correspondan a la sección donde se hizo click
        function ProductoEditado(Seccion){
            var existe = false;

            // El método filter() crea una nueva matriz con todos los elementos que pasan la prueba dada por la función proporcionada
            var filtered = AlContenedor.filter(function(item){
                return item.Seccion == Seccion; 
            });

            let id_dinamico = 1
            for(let i = 0; i < filtered.length; i++){
                existe = true;
                //Se crean los input que cargaran las leyendas contenidas en el array filtered
                var NuevoElemento = document.createElement("input")

                //Se dan propiedades al nuevo elemento creado (leyenda)
                NuevoElemento.value = filtered[i].Cantidad + ' ' + filtered[i].Producto + ' = ' + filtered[i].Total + ' Bs.'
                NuevoElemento.classList.add("input_15")
                NuevoElemento.name = "leyenda"
                NuevoElemento.id = filtered[i].ID_Opcion 
                NuevoElemento.readOnly = true

                //Se especifica el elemento donde se va a insertar el nuevo elemento            
                var ElementoPadre = document.getElementById(InputLeyendaDinamico)
                
                //Se inserta en el DOM el input creado
                ElementoPadre.appendChild(NuevoElemento) 
                
                // -------------------------------------

                //Se crean los botones para dar la opción de eliminar las leyendas creadas
                var EliminarLeyenda = document.createElement("label")

                //Se dan propiedades al nuevo boton creado 
                EliminarLeyenda.innerHTML = "X"
                EliminarLeyenda.classList.add("input_15", "input_15--eliminar")
                // EliminarLeyenda.id = filtered[i].ID_Opcion      
                EliminarLeyenda.readOnly = true
                EliminarLeyenda.onclick = Eliminar_Leyenda
          
                localStorage.setItem('ID_Label_X', EliminarLeyenda.id)

                //Se especifica el elemento donde se va a insertar el nuevo elemento            
                var ElementoPadre = document.getElementById(InputLeyendaDinamico)
                
                //Se inserta en el DOM el input creado
                ElementoPadre.appendChild(EliminarLeyenda) 

                id_dinamico++         
            }
            return existe;
        }
        ProductoEditado(Seccion)       
    }

//************************************************************************************************
    function Eliminar_Leyenda(e){
        var ID_ProductoEliminar = e.target.previousSibling.id 
        
        for(var i = 0; i < AlContenedor.length; i++){
            //Se toma el nombre del producto
            if((AlContenedor[i].ID_Opcion) == ID_ProductoEliminar){
                // console.log(Producto = AlContenedor[i].ID_Opcion)
                Producto = AlContenedor[i].Producto
            }
        }

        let ConfirmaEliminar = confirm('\t\t\t' + Producto.toUpperCase() + '\t\t' + "\n \t\t\teliminar de carrito de compras \t\t")

        if(ConfirmaEliminar == true){                
            //Se busca en el array AlContenedor, el producto que corresponde a la leyenda que se va a liminar
            var filtrado = AlContenedor.filter(function(item_2){
                // console.log("ID_ProductoEliminar =", ID_ProductoEliminar);
                return item_2.ID_Opcion != ID_ProductoEliminar; 
            });

            //Array AlContenedor con el producto eliminado
            AlContenedor = filtrado
            
            e.target.parentElement.removeChild(e.target.previousSibling);
            e.target.parentElement.removeChild(e.target);

            //Se muestra el div que contiene el icono del carrito
            DisplayDestello();
        }
    }
//************************************************************************************************
    //invocada al cargarse llamar_Opciones() en Funciones_Ajax.js especifica los productos que ya estan cargados al carrito de compra y muestra su leyenda en la vista opciones_V.php
    function ProductosEnCarrito(){             
    
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
            // document.getElementById(filtered[i].ID_InputOpcion).value = filtered[i].Opcion 
            document.getElementById(filtered[i].ID_InputPrecio).value = filtered[i].Precio 
            document.getElementById(filtered[i].ID_InputTotal).value = filtered[i].Total 

            document.getElementById(filtered[i].ID_InputDisplayCant).value = filtered[i].Cantidad      
            document.getElementById(filtered[i].ID_Input_Leyenda).value = filtered[i].Cantidad + ' ' + filtered[i].Producto +  ' = ' + filtered[i].Total + ' Bs.'

            //Se busca el boton más y el respectivo boton de bloqueo de la leyenda analizada
            if(Number(filtered[i].Existencia) == filtered[i].Cantidad){
                document.getElementById(filtered[i].ID_BotonMas).style.display = "none" 
                document.getElementById(filtered[i].ID_BotonBloqueo).style.display = "inline" 
            }
            else{
                document.getElementById(filtered[i].ID_BotonMas).style.display = "inline" 
                document.getElementById(filtered[i].ID_BotonBloqueo).style.display = "none"

            }
            // console.log(Number(filtered[i].Existencia))
            // console.log(filtered[i].Cantidad)
        }        

        Pre_decremento()
        Pre_incremento()
    }    

//************************************************************************************************
    //invocada desde A_VitrinaMayorista.js por medio de llamar_PedidoEnCarrito(), pinta los datos de "La orden de compra"
    function PedidoEnCarrito(ValorDolar){
        console.log("______Desde PedidoEnCarrito()______", Number(ValorDolar))
        
        //Se muestra el monto de la compra en "La Orden". (sin carga por despacho)
        document.getElementById("MontoTienda").value = SeparadorMiles(TotalDisplayCarrito)
        
        //Se obtiene el monto del envio, esta tarado al precio de un dolar, la tarifa báscia, (Esto ya se hizo lineas arriba, corregir para que se haga una sola vez)
        envio = document.getElementById("PrecioEnvio").value

        //Se calcula el monto total de la compra incluyendo comision y envio
        MontoTotal = Number(TotalDisplayCarrito) + Number(envio)
        MontoTotal = Number.parseFloat(MontoTotal).toFixed(2);
        
        //Se calcula el monto en Dolares
        MontoTotalDolares = MontoTotal / Number(ValorDolar)

        // Se toman dos decimales del monto en dolares
        MontoTotalDolares = Number.parseFloat(MontoTotalDolares).toFixed(2);

        //Se muestra el monto de total de la compra incluyendo comision y envio
        document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
        
        //Se muestra el monto de total de la compra incluyendo comision y envio en Dolares
        document.getElementById("MontoTotalDolares").value = SeparadorMiles(MontoTotalDolares)
        
        //Se envia a Carrito_V.php todo el pedido que se encuentra en el array de objeto JSON AlContenedor[]
        console.log(AlContenedor)
        //1.- Se convierte el JSON en un string
        var sendJSON = JSON.stringify(AlContenedor)
        console.log(sendJSON)
        //2.- Se envia al input que lo almacena en la vista carritoMayorista_V.php
        document.getElementById('Pedido').value = sendJSON

        //Se muestra todo el pedido (cantidad - producto - precio unitario - precio por productos)
        for(i = 0; i < AlContenedor.length; i++){
            document.getElementById("Tabla").innerHTML += 
            '<tbody><tr><td class="td_1">' +  AlContenedor[i].Cantidad + 
            '</td><td class="td_2 hyphen">' +  AlContenedor[i].Producto + 
            '</td><td class="td_3">' + AlContenedor[i].Precio + " Bs." +
            '</td><td class="td_3">' + AlContenedor[i].Total + " Bs." + '</td></tr></tbody>'
        }
    }
    
//************************************************************************************************
    //Identifica los elementos de la sección donde se hizo click.
    function verOpcionesMayorista(Cont_Seccion, Seccion){ 
        //Captura el valor del id dinanmico de la seccion donde se hizo click
        localStorage.setItem('ContSeccion', Cont_Seccion)         
        LS_ID_Cont_Seccion = localStorage.getItem('ContSeccion')

        //Captura la seccion donde se hizo click
        localStorage.setItem('SeccionCLick', Seccion)  
    }

//************************************************************************************************
    //Cambia el formato de total en el carrito de compras para mostrar en display
    function SeparadorMiles(Numero){
        if(Numero != 0){
            // console.log("______Desde SeparadorMiles()______", Numero) 
             
            Numero = String(Numero)
            Numero = Numero.replace(/\./g, ',');
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
            
            //Se obtiene el valor de la cantidad de existencia del producto
            let BloquearMasJS = current.getElementsByClassName("BloquearMasJS")[0]
            // console.log(Number(BloquearMasJS.value))
            
            //Se obtiene el boton "más" respectivo al producto seleccionado
            let ID_LabelMas = current.getElementsByClassName("MasJS")[0].id
            // console.log(ID_LabelMas)

            //Se obtiene el boton "más" respectivo al producto seleccionado
            let ID_LabelBloqueo = current.getElementsByClassName("icono_7")[0].id
            // console.log(ID_LabelBloqueo)

            //Se busca el input del display que se quiere incrementar            
            let inputSeleccionado = current.getElementsByClassName("input_2")[0]
            // console.log(inputSeleccionado)

            //Se accede a la propiedad valor del input display 
            let valor = inputSeleccionado.value

            //Se obtiene el contenedor hermano a "current" para acceder a sus input
            let inputSeleccionadoLeyen = current.previousElementSibling  
            if(valor < 10){
                A = valor++
                A++

                //Muestra la cantidad en el input display
                inputSeleccionado.value = A
                // console.log(inputSeleccionado)
                
                //Input seccion Aqui se muestra la seccion de la tienda
                let Seccion = inputSeleccionadoLeyen.getElementsByClassName("input_1g")[0].value

                //ID_Producto desde BD 
                let Producto = inputSeleccionadoLeyen.getElementsByClassName("input_1a")[0].value
                
                //input cantidad Aqui se mostrará la cantidad
                var Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = A

                //Input precio Aqui se muestra el precio
                let Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value
                                
                //Se cambia el formato del precio, se reemplaza la coma por punto para poder hacer la multiplicacion, luego se convierte a numero 
                // console.log(typeof Precio)
                Precio = Precio.replace(/,/g, '.')
                Precio = Number(Precio)

                //Se calcula el total y se restringe a dos decimales
                let Total = (Cantidades * Precio).toFixed(2)

                //"Total" Se cambia a string y luego se cambia el formato, el punto decimal se convierte en coma
                Total = String(Total)
                Total = Total.replace(/\./g, ',')

                //Input total Aqui se mostrará el total(al parecer no hace falta)
                inputSeleccionadoLeyen.getElementsByClassName("input_1f")[0].value = Total
                
                //Muestra la leyenda del pedido por producto
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto + " = " + SeparadorMiles(Total) + " Bs."
              
                //Se crea una nuevo array del objeto PedidoCar 
                PedidoGlobal = new PedidoCar(Producto, Cantidades, TotalDisplayCarrito);

                //Se verifica que el producto existe en el array AlContenedor y que contiene el pedidio, se edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden y a cada leyenda
                function ProductoEditado(Producto){
                    // console.log("Entra en ProductoEditado()", Producto)
                    var existe = false;
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlContenedor[i].Producto == Producto ){ 
                            existe = true;
                            AlContenedor[i].Cantidad = Cantidades
                            
                            // console.log("AlContenedor = ", AlContenedor[i].Cantidad)  
                            AlContenedor[i].Total = SeparadorMiles(Total)  
                        }
                    }
                    
                    var existe = false;
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlContenedor[i].Producto == Producto ){
                            existe = true;
                            AlContenedor[i].Cantidad = Cantidades
                            AlContenedor[i].Total = Total
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto)                    
            }  
            
            //Se muestra el div que contiene el icono del carrito
            DisplayDestello()
                     
            //Si la existencia en BD es igual a 1 se oculta el boton de mas y menos para que no se añadan más productos al carrito
            if(Number(BloquearMasJS.value) == Cantidades){
                document.getElementById(ID_LabelMas).style.display = "none" 
                document.getElementById(ID_LabelBloqueo).style.display = "inline" 
            }
            else{
                document.getElementById(ID_LabelMas).style.display = "inline" 
                document.getElementById(ID_LabelBloqueo).style.display = "none" 
            }

            // console.log("AlContenedor desde incremento = ", AlContenedor)
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
            // console.log("______Desde decrementar()______") 
            
            //Se obtiene el div padre donde se encuentra el boton menos al que se hizo click
            current = e.target.parentElement

            //Se obtiene el valor de la cantidad de existencia del producto
            let BloquearMasJS = current.getElementsByClassName("BloquearMasJS")[0]
            // console.log("Existencia = ", Number(BloquearMasJS.value))
            
            //Se obtiene el boton "más" respectivo al producto seleccionado
            let ID_LabelMas = current.getElementsByClassName("MasJS")[0].id
            // console.log(ID_LabelMas)

            //Se obtiene el boton "más" respectivo al producto seleccionado
            let ID_LabelBloqueo = current.getElementsByClassName("icono_7")[0].id
            // console.log(ID_LabelBloqueo)

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
                var Cantidades = Cont_leyenda.getElementsByClassName("input_1e")[0].value = A
                // console.log("Cantidad en carrito", Cantidades)

                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                let Precio = Cont_leyenda.getElementsByClassName("input_1d")[0].value

                //Se cambia el formato del precio
                Precio = Precio.replace(/,/g, '.')
                Precio = Number(Precio)
                                
                //Se calcula el total
                let Total = Cantidades * Precio    

                //"Total" Se cambia a string y luego se cambia el formato, el punto decimal se convierte en coma
                Total = String(Total)
                Total = Total.replace(/\./g, ',')
                 
                //Input total en el elemento hermano del click correspondiente; Aqui se mostrará el total
                Cont_leyenda.getElementsByClassName("input_1f")[0].value = Total
                
                //Muestra la leyenda del pedido por producto
                Cont_leyenda.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto +  " = " + SeparadorMiles(Total) + " Bs."    

                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio

                //Muestra el monto del pedido en el display carrito
                MontoCarrito = document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs."  

                //Se crea una nuevo array del objeto PedidoCar 
                PedidoGlobal = new PedidoCar(Producto, Cantidades, TotalDisplayCarrito);

                //Se verifica que el producto existe en el array AlContenedor que contiene los productos pedidos y se edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden y a la información de cada leyenda
                function ProductoEditado(Producto){
                    var existe = false;
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlContenedor[i].Producto == Producto ){
                            existe = true;
                            AlContenedor[i].Cantidad = Cantidades
                            AlContenedor[i].Total = SeparadorMiles(Total)
                        }
                    }
                    
                    var existe = false;
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlContenedor[i].Producto == Producto ){
                            existe = true;
                            AlContenedor[i].Cantidad = Cantidades
                            AlContenedor[i].Total = Total
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto);
            }        
            else{//Si no hay mas producto que eliminar                
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                Precio = Cont_leyenda.getElementsByClassName("input_1d")[0].value
                Precio = Precio.replace(/[.]/g,'')
                Precio = Number(Precio)

                //Input producto en el elemento hermano del click correspondiente; Aqui se muestra el producto
                Producto = Cont_leyenda.getElementsByClassName("input_1a")[0].value

                //Input opcion en el elemento hermano del click correspondiente; Aqui se muestra el producto
                Opcion = Cont_leyenda.getElementsByClassName("input_1c")[0].value

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                Cantidades = Cont_leyenda.getElementsByClassName("input_1e")[0].value = 0

                //Se crea una nuevo array del objeto PedidoCar 
                PedidoGlobal = new PedidoCar(Producto, Cantidades, TotalDisplayCarrito);

                //Se elimina el producto del array que contiene el pedido, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Producto){
                    var existe = false;
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlContenedor[i].Producto == Producto ){
                            AlContenedor.splice(i, 1);
                        }
                    }
                  
                    for(i = 0; i < AlContenedor.length; i++){
                        if(AlContenedor[i].Producto == Producto ){
                            AlContenedor.splice(i, 1);
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto)//Antes Opcion NOTA = CAMBIAR POR ID DE PRODUCTO, ESTA FUNCION ES LLAMADA TAMBIEN EN PRE_INCREMENTE()
               
                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio
                // console.log(TotalDisplayCarrito)

                //Muestra el monto del pedido en el display carrito(se encuentra en vitrina.php)
                MontoCarrito = document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                                                    
                //Se oculta el contenedor donde se encuentra el boton menos y la leyenda del producto al que se hizo click
                current.parentElement.style.display = "none"

                //En los proximos tres pasos, se hace una "escala DOM" para obtener y mostrar la etiqueta "Agregar" del div que contiene el producto analizado
                //Se obtiene el div padre de los botones mas y menos
                PadreMasMenos = current.parentElement
                //Se obtiene el hermano del div PadreMasMenos
                HermanoMasMenos = PadreMasMenos.previousElementSibling 
                //Se muestra la etiqueta agregar del div HermanoMasMenos que se ocultó en 
                EtiquetaAgregar = HermanoMasMenos.getElementsByClassName("Label_3js")[0].style.display = "block"
                // console.log(EtiquetaAgregar)
                // console.log(HermanoMasMenos.getElementsByClassName("Label_3js")[0])

                // console.log(AlContenedor)
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
            
            //Se muestra el div que contiene el icono del carrito
            DisplayDestello()
                     
            //Si la existencia en BD es igual a 1 se oculta el boton de mas y menos para que no se añadan más productos al carrito
            if(Number(BloquearMasJS.value) >= Cantidades || Number(BloquearMasJS.value) == 0){
                document.getElementById(ID_LabelMas).style.display = "inline" 
                document.getElementById(ID_LabelBloqueo).style.display = "none" 
            }
            else{
                document.getElementById(ID_LabelMas).style.display = "none" 
                document.getElementById(ID_LabelBloqueo).style.display = "inline" 
            }
            // console.log("AlContenedor desde decremento = ",AlContenedor)
        }    
    }

//************************************************************************************************ 
    //invocada desde carrito_V.php
    function ocultarPedido(){   
        //Coloca el cursor en el top de la pagina
        window.scroll(0, 0)
        document.getElementById("Mostrar_OrdenMayorista").style.display = "none";
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

        document.getElementsByClassName("botonJS")[0].value = "Enviando ..."
        document.getElementsByClassName("botonJS")[0].disabled = "disabled"
        document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("botonJS")[0].classList.add('borde_1')
        
        let Nombre = document.getElementById('NombreUsuario').value
        let Apellido = document.getElementById('ApellidoUsuario').value 
        let Cedula = document.getElementById('CedulaUsuario').value 
        let Telefono = document.getElementById('TelefonoUsuario').value 
        let Correo = document.getElementById('CorreoUsuario').value 
        let Direccion = document.getElementById('DireccionUsuario').value  
        let Estado = document.getElementById('Estado').value 
        let Ciudad = document.getElementById('Ciudad').value
        let Pago = document.getElementsByName('formaPago')//transferencia, pagomovil, reserve, paypal, zelle, etc
        let FormaPago = document.getElementsByName('referenciaPago') 

        //Recorremos todos los valores del radio button para encontrar el metodo de pago seleccionado
        for(let i = 0; i < Pago.length; i++){
            if(Pago[i].checked){
                var PagoSeleccionado = Pago[i].value
                console.log("Pago", PagoSeleccionado)
            }
        }       
        //Recorremos todos los valores del radio button para encontrar el medio de pago seleccionado
        for(let i = 0; i < FormaPago.length; i++){
            if(FormaPago[i].checked){
                var FormaPagoSeleccionada = FormaPago[i].value
                console.log("FormaPago", FormaPagoSeleccionada)
            }
        }       
        let RegistroPago_Transferencia = document.getElementById('RegistroPago_Transferencia').value
        let CaptureTransferencia = document.getElementById('ImagenTransferencia').value  
        let CapturePagoMovil = document.getElementById('ImagenPagoMovil').value 
        let CapturePagoReserve = document.getElementById('ImagenPagoReserve').value
        let CapturePagoPaypal = document.getElementById('ImagenPagoPaypal').value
        
        //Patron de entrada solo acepta letras (Nombre - Apellido)
        let P_Letras = /^[ñA-Za-zÁÉÍÓÚáéíóú _]*[ñA-Za-zÁÉÍÓÚáéíóú][ñA-Za-zÁÉÍÓÚáéíóú _]*$/

        //Patron de entrada para archivos de carga permitidos
        var Ext_Permitidas = /^[.jpg|.jpeg|.png]*$/

        //Patron de entrada solo acepta numeros, guion y puntos          
        // let P_Telefono = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;

        // let P_LetrasNumero = /[A-Za-z0-9]/;
        
        //Patron de entrada para correos electronicos
        let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                
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
        else if(Cedula =="" || Cedula.indexOf(" ") == 0 || Cedula.length < 9  ||  Cedula.length > 10){
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
        else if(Telefono =="" || Telefono.indexOf(" ") == 0 || Telefono.length > 20){
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
        else if(Correo  == "" || Correo .indexOf(" ") == 0 || Correo .length > 70 || P_Correo.test(Correo ) == false){
            alert ("Correo invalido")
            document.getElementById("CorreoUsuario").value = ""
            document.getElementById("CorreoUsuario").focus()
            document.getElementById("CorreoUsuario").style.backgroundColor = "var(--Fallos)"
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
        else if(Direccion =="" || Direccion.indexOf(" ") == 0 || Direccion.length > 200){
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
            if(FormaPagoSeleccionada == undefined){
                alert ("Debe infomar el código o el capture del pago");
                document.getElementsByClassName("botonJS")[0].value = "Comprar"
                document.getElementsByClassName("botonJS")[0].disabled = false
                document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
                return false;
            }
        }
        else if(PagoSeleccionado == "Transferencia" && FormaPagoSeleccionada == "codigoTransferencia"){
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
        else if(PagoSeleccionado == "Transferencia" && FormaPagoSeleccionada == "CaptureTransferencia"){            
            if(Ext_Permitidas.exec(CaptureTransferencia ) == false || CaptureTransferencia .size > 20000){
                alert("Introduzca el capture de la transferencia")
                document.getElementsByClassName("botonJS")[0].value = "Comprar"
                document.getElementsByClassName("botonJS")[0].disabled = false
                document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
                return false;
            }
        }
        else if(PagoSeleccionado == "PagoMovil"){            
            if(Ext_Permitidas.exec(CapturePagoMovil) == false || CapturePagoMovil .size > 20000){
                alert("Introduzca el capture del PagoMovil")
                document.getElementsByClassName("botonJS")[0].value = "Comprar"
                document.getElementsByClassName("botonJS")[0].disabled = false
                document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
                return false;
            }
        }
        else if(PagoSeleccionado == "Reserve"){            
            if(Ext_Permitidas.exec(CapturePagoReserve) == false || CapturePagoReserve .size > 20000){
                alert("Introduzca el capture del pago en Reserve")
                document.getElementsByClassName("botonJS")[0].value = "Comprar"
                document.getElementsByClassName("botonJS")[0].disabled = false
                document.getElementsByClassName("botonJS")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("botonJS")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("botonJS")[0].classList.remove('borde_1')
                return false;
            }
        }
        else if(PagoSeleccionado == "Paypal"){            
            if(Ext_Permitidas.exec(CapturePagoPaypal) == false || CapturePagoPaypal .size > 20000){
                alert("Introduzca el capture del pago en Paypal")
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
    // var contenidoTelefono = ""; 
    // var num_caracteres_permitidos = 14; 

    // function valida_LongitudTelefono(){ 
    //     // console.log("______Desde valida_LongitudTelefono()______")

    //     // let num_caracteres_input = document.getElementById("TelefonoUsuario").value.length

    //     // if(num_caracteres_input > 13){ 
    //     //     document.getElementById("TelefonoUsuario").value = contenidoTelefono; 
    //     // }
    //     // else{ 
    //     //     contenidoTelefono = document.getElementById("TelefonoUsuario").value;   
    //     // } 
    // } 

//************************************************************************************************
    //Abre la ventana de detalles de producto, invocado en opciones_V.php
    function mostrarDetalles(ContadorLabel, Nombre_Tienda, Slogan_Tienda, ID_Tienda, Producto, Opcion, PrecioBolivar, Fotografia, ID_Producto, PrecioDolar, Existencia, Disponible){
        // console.log("______Desde mostrarDetalles()______", ContadorLabel +"/"+ Nombre_Tienda +"/"+ Slogan_Tienda +"/"+ ID_Tienda +"/"+ Producto +"/"+ Opcion +"/"+ PrecioBolivar +"/"+ Fotografia +"/"+ ID_Producto +"/"+ PrecioDolar)
        window.open(`../../Opciones_C/productoAmpliado/${'Etiqueta_' + ContadorLabel},${Nombre_Tienda},${Slogan_Tienda},${ID_Tienda},${Producto},${Opcion},${PrecioBolivar},${Fotografia},${ID_Producto},${PrecioDolar},${Existencia},${Disponible}`, "ventana1", "width=1300,height=650,scrollbars=YES")   
    }

//************************************************************************************************
    function CerrarModal_X(id, Inputfocus = ""){
        document.getElementById(id).style.display = "none"
        //Coloca el cursor en el top de la pagina
        window.scroll(0, 0)

        if(Inputfocus != ""){
            document.getElementById(Inputfocus).focus()
        }
    }
    
//************************************************************************************************
    //Desactiva el boton de volver atras del navegador
    function nobackbutton(){
        window.location.hash="no-back-button";
        window.location.hash="Again-No-back-button" //chrome
        window.onhashchange = function(){window.location.hash="no-back-button";}
    }

//************************************************************************************************
   //Muestra el menu principal en formato movil y tablet  
   function mostrarMenu(){  
    //    console.log("______Desde mostrarMenu()______")
       let A = document.getElementById("MenuResponsive")
       let B = document.getElementById("Tapa")

       if(A.style.marginLeft < "0%"){//Se muestra el menu
           A.style.marginLeft = "0%"
           B.style.display = "block"
       }
       else if(A.style.marginLeft = "0%"){//Se oculta el menu
           A.style.marginLeft = "-70%"
           B.style.backgroundColor = "none"
       }
   }

//************************************************************************************************
    //Coloca los puntos de miles en tiempo real al llenar el campo a cedula
    function formatoMiles(numero, id){
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
    //Quita el color de fallo en un input y lo deja en su color original
    function blanquearInput(id){        
        document.getElementById(id).style.backgroundColor = "white"
    }

//************************************************************************************************
//Muestra el contenedor del input transferencia
    function verInputTransferencia(){
        document.getElementById("InputTransferencia").style.display = "block"
        document.getElementById("CaptureTransferencia").style.display = "none"
    }

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al escribir el codigo de despacho
    function codigoDespacho(CodigoDespacho){
        console.log(CodigoDespacho)
        let TotalDigitos = CodigoDespacho.length
        if(TotalDigitos == 6){ //6 es la cantidad de digitos del codigo de despacho
            Llamar_datosMinorista(CodigoDespacho);
        }
    } 

//************************************************************************************************
    //Muestra el contenedor del capture transferencia
    function verCaptureTransferencia(){
        document.getElementById("InputTransferencia").style.display = "none"
        document.getElementById("CaptureTransferencia").style.display = "block"
    }

//************************************************************************************************
    //Da una vista previa del capture de transferencia bancaria
    function CaptureTransferencia(){
        var contenedor = document.getElementById("DivCaptureTransferencia");
        var archivos = document.getElementById("ImagenTransferencia").files;

        if(contenedor.childElementCount < 1){
            for(i = 0; i < archivos.length; i++){
                imgTag = document.createElement("img");
                imgTag.height = 400;
                imgTag.width = 280;   
                imgTag.objectFit = "cover" 
                imgTag.src = URL.createObjectURL(archivos[i]);
                contenedor.appendChild(imgTag);
            }
        }
        else{
            //Se elimina la imagen existente
            contenedor.removeChild(imgTag);

            CaptureTransferencia()
        }
    }
     
//************************************************************************************************
    //Da una vista previa del capture del pagoMovil
    function CapturePagoMovil(){
        var contenedor = document.getElementById("DivCapturePagoMovil");
        var archivos = document.getElementById("ImagenPagoMovil").files;

        if(contenedor.childElementCount < 1){
            for(i = 0; i < archivos.length; i++){
                imgTag = document.createElement("img");
                imgTag.height = 400;
                imgTag.width = 280;   
                imgTag.objectFit = "cover" 
                imgTag.src = URL.createObjectURL(archivos[i]);
                contenedor.appendChild(imgTag);
            }
        }
        else{
            //Se elimina la imagen existente
            contenedor.removeChild(imgTag);

            CapturePagoMovil()
        }
    }

//************************************************************************************************
    //Da una vista previa del capture del pagoMovil
    function CapturePagoReserve(){
        var contenedor = document.getElementById("DivCapturePagoReserve");
        var archivos = document.getElementById("ImagenPagoReserve").files;

        if(contenedor.childElementCount < 1){
            for(i = 0; i < archivos.length; i++){
                imgTag = document.createElement("img");
                imgTag.height = 400;
                imgTag.width = 280;   
                imgTag.objectFit = "cover" 
                imgTag.src = URL.createObjectURL(archivos[i]);
                contenedor.appendChild(imgTag);
            }
        }
        else{
            //Se elimina la imagen existente
            contenedor.removeChild(imgTag);

            CapturePagoReserve()
        }
    }

//************************************************************************************************
    //Da una vista previa del capture del pagoMovil
    function CapturePagoPaypal(){
        var contenedor = document.getElementById("DivCapturePagoPaypal");
        var archivos = document.getElementById("ImagenPagoPaypal").files;

        if(contenedor.childElementCount < 1){
            for(i = 0; i < archivos.length; i++){
                imgTag = document.createElement("img");
                imgTag.height = 400;
                imgTag.width = 280;   
                imgTag.objectFit = "cover" 
                imgTag.src = URL.createObjectURL(archivos[i]);
                contenedor.appendChild(imgTag);
            }
        }
        else{
            //Se elimina la imagen existente
            contenedor.removeChild(imgTag);

            CapturePagoPaypal()
        }
    }

//************************************************************************************************
    //Da una vista previa del capture del pagoMovil
    function CapturePagoZelle(){
        var contenedor = document.getElementById("DivCapturePagoZelle");
        var archivos = document.getElementById("ImagenPagoZelle").files;

        if(contenedor.childElementCount < 1){
            for(i = 0; i < archivos.length; i++){
                imgTag = document.createElement("img");
                imgTag.height = 400;
                imgTag.width = 280;   
                imgTag.objectFit = "cover" 
                imgTag.src = URL.createObjectURL(archivos[i]);
                contenedor.appendChild(imgTag);
            }
        }
        else{
            //Se elimina la imagen existente
            contenedor.removeChild(imgTag);

            CapturePagoZelle()
        }
    }

//************************************************************************************************
    //Coloca el cursor en el input automaticamente 
    function autofocus(id){
        // console.log("______Desde autofocus()______", id)

        //Si el elemento existe
        if(document.getElementById(id)){
            document.getElementById(id).focus()
            document.getElementById(id).value = ""
        }
    }


// ************************************************************************************************
    function mostrar_cedula(){
        document.getElementById("No_Registrado").style.display = "none";
        document.getElementById("Registrado").style.display = "none";
        document.getElementById("Mostrar_Cedula").style.display = "block";
    }

// ************************************************************************************************
    //Informa que se alcanzo máximo de producto en inventario
    function BotonBloqueado(){
        // console.log("______Desde BotonBloqueado()______")

        alert("Limite alcanzado, el producto a quedado sin inventario")
    }
    
// ************************************************************************************************
    function soloNumeros(valor, Cedula){
        let elemento = document.getElementById(Cedula).value;
        let P_Numeros = /^([0-9])*$/;

        if(P_Numeros.test(valor) == false || elemento == ''|| elemento.indexOf(" ") == 0 || elemento.length > 8 || elemento.length < 7){            
            alert ("Ingrese un número de cedula valido");
            document.getElementById("Cedula_Usuario").value = "";
            document.getElementById("Cedula_Usuario").focus();
        }        
        else{
            let NumeroFormateado = SeparadorMiles(valor)
            Llamar_UsuarioRegistrado(NumeroFormateado);
        }
        return false;
    }

// ************************************************************************************************
    function EliminarLeyendaVitrina(){
        alert("HOA")
    }

// ************************************************************************************************
//Se muestra el monto total de la compra en Reserve, Paypal o Zelle
    // function MontoPagarDolares(){
    //     // document.getElementById("PagarEnDolares").value = Number.parseFloat(MontoTotalDolares).toFixed(2)        
    // }
      
//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoTransferencia(){
        // console.log("______Desde verTransferenciaBancaria()______") 
        document.getElementById("Contenedor_60a").style.display = "block"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "none"
        document.getElementById("Contenedor_60d").style.display = "none"
        document.getElementById("Contenedor_60e").style.display = "none"
        document.getElementById("Contenedor_60f").style.display = "none"
        document.getElementById("Contenedor_60g").style.display = "none"
        document.getElementById("Contenedor_60h").style.display = "none"
        
        //Se muestra el monto total de la compra en Bolivares
        document.getElementById("PagarTransferencia").value = SeparadorMiles(MontoTotal) + " Bs."
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoMovil(){
        // console.log("______Desde verPagoMovil()______") 
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "block"
        document.getElementById("Contenedor_60c").style.display = "none"
        document.getElementById("Contenedor_60d").style.display = "none"
        document.getElementById("Contenedor_60e").style.display = "none"
        document.getElementById("Contenedor_60f").style.display = "none"
        document.getElementById("Contenedor_60g").style.display = "none"
        document.getElementById("Contenedor_60h").style.display = "none"

        //Se muestra el monto total de la compra en Bolivares
        document.getElementById("PagarPagoMovil").value = SeparadorMiles(MontoTotal) + " Bs."
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoReserve(){
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "none"
        document.getElementById("Contenedor_60d").style.display = "none"
        document.getElementById("Contenedor_60e").style.display = "none"
        document.getElementById("Contenedor_60f").style.display = "block"
        document.getElementById("Contenedor_60g").style.display = "none"
        document.getElementById("Contenedor_60h").style.display = "none"

        //Se muestra el monto total de la compra en Dolares
        document.getElementById("PagarDolaresReserve").value = SeparadorMiles(MontoTotalDolares) + " USD"
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoPaypal(){
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "none"
        document.getElementById("Contenedor_60d").style.display = "none"
        document.getElementById("Contenedor_60e").style.display = "none"
        document.getElementById("Contenedor_60f").style.display = "none"
        document.getElementById("Contenedor_60g").style.display = "block"
        document.getElementById("Contenedor_60h").style.display = "none"
        
        //Se muestra el monto total de la compra en Dolares
        document.getElementById("PagarDolaresPaypal").value = SeparadorMiles(MontoTotalDolares) + " USD"
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoZelle(){
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "none"
        document.getElementById("Contenedor_60d").style.display = "none"
        document.getElementById("Contenedor_60e").style.display = "none"
        document.getElementById("Contenedor_60f").style.display = "none"
        document.getElementById("Contenedor_60g").style.display = "none"
        document.getElementById("Contenedor_60h").style.display = "block"
        
        //Se muestra el monto total de la compra en Dolares
        document.getElementById("PagarDolaresZelle").value = SeparadorMiles(MontoTotalDolares) + " USD"
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoEfectivoBolivar(){
        // console.log("______Desde verPagoEfectivoBolivar()______") 
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "block"
        document.getElementById("Contenedor_60d").style.display = "none"
        document.getElementById("Contenedor_60e").style.display = "none"
        document.getElementById("Contenedor_60f").style.display = "none"
        document.getElementById("Contenedor_60g").style.display = "none"
        document.getElementById("Contenedor_60h").style.display = "none"
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoEfectivoDolar(){
        // console.log("______Desde verPagoEfectivoDolar()______") 
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "none"
        document.getElementById("Contenedor_60d").style.display = "block"
        document.getElementById("Contenedor_60e").style.display = "none"
        document.getElementById("Contenedor_60f").style.display = "none"
        document.getElementById("Contenedor_60g").style.display = "none"
        document.getElementById("Contenedor_60h").style.display = "none"
    }

//************************************************************************************************
    // invocada desde carrito_V.php
    function verPagoAcordado(){
        // console.log("______Desde verPagoAcordado()______") 
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "none"
        document.getElementById("Contenedor_60c").style.display = "none"
        document.getElementById("Contenedor_60d").style.display = "none"
        document.getElementById("Contenedor_60e").style.display = "block"
        document.getElementById("Contenedor_60f").style.display = "none"
        document.getElementById("Contenedor_60g").style.display = "none"
        document.getElementById("Contenedor_60h").style.display = "none"
    }
    