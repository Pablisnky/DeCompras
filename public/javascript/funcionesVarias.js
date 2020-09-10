//Declarar el array que contiene los ID_Opcion que se añaden al carrito
//Verificar para que sirve, creo que solo es util en la función decremento
PedidoCarrito = []

//Declarar el array que contiene los detalles de cada pedido atomico(cantidad, producto, precio, total) cada detalle se inserta al array como un objeto JSON, es usado para alimentar "Tu Orden" en carrito_V.php
AlCarro = []

//Declarar el array que contiene los detalles de las leyendas y la ubicación de la misma dentro de una sección, cada detalle se inserta al array como un objeto JSON, es usado en opciones_V.php
AlContenedor = []

//Guarda cada precio de los productos pedidos 
DisplayCarrito = []  

//Guarda la suma del monto total del pedido que se muestra en el display del carrito de compras
TotalDisplayCarrito = []  

//Guarda los contenedores que muestran productos que han sido cargados al carrito
ProductoEnCarrito = []

// ************************************************************************************************** 
//Cuando carga la página vitrina_V.php se registran listener para el evento clic en toda la ventana, es decir, cada vez que se hace click en esa página se esta llamanado a la función Pre_incremento  y Pre_decremento (IMPORTANTE: por esta razon es necesario colocar estas funciones en su arhcio E_Vitrina.js para que solo se escuchen cuando ese archivo se abra)
document.addEventListener("click", Pre_decremento)
document.addEventListener("click", Pre_incremento)

//Escucha desde afiliacion_V.php - footer.php
document.getElementById('Desarrollo_PWA').addEventListener('click', Documentacion_PWA,false)
 
// **************************************************************************************************  

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito
function PedidoCar(Seccion, Producto, Cantidad, Opcion, Precio, Total){
    this.Seccion = Seccion
    this.Producto = Producto
    this.Cantidad = Cantidad
    this.Opcion = Opcion
    this.Precio = Precio
    this.Total = Total
}

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito
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















//************************************************************************************************
    //invocada desde cuenta_publicar.php selecciona una sección donde estará un producto
    function transferirSeccion(form){
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        // var TotalCategoria = []

        console.log("______Desde transferir Seccion______")

        //Se reciben los elementos del formulario mediante su atributo name
        Seccion = form.seccion

        //Se recorre todos los elementos para encontrar el que esta seleccionado
        for(var i = 0; i<Seccion.length; i++){ 
            if(Seccion[i].checked){
                //Se toma el valor del seleccionado
                Seleccionado = Seccion[i].value
            }            
        } 

        //Se transfiere el valor del radio boton seleccionado al input del formulario
        document.getElementById("Seccion").value = Seleccionado
             
        ocultar("MostrarSeccion") 
    }

//************************************************************************************************

















//************************************************************************************************
    //invocada desde cuenta_editar.php selecciona tres categorias en los tipos de tiendas
    function transferirCategoria(form){
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        var TotalCategoria = []

        console.log("______Desde transferir Categoria______")

        //Se reciben los elementos del formulario mediante su atributo name
        Categoria = form.categoria

        //Se convierte el parametro recibido en un array
        // var categoria = Categorias.split(',')
        // Se declara el array que contiene las categorias
        var Limite = []
        //Se verifica la cantidad de categorias seleccionadas
        console.log(Categoria)

            //Se eliminan las categorias que estaban y se colocan las que estan en el array TotalCategoria
            //Se busca el nodo padre que contiene el input donde esta el producto a eliminar
            let DivHijo = document.getElementsByClassName("imput_6js")

            //Se recorre todos los elementos que contengan la clase input_6js para eliminarlos
            Elementos = DivHijo.length
            for(var i = 0; i<Elementos; i++){ 
                console.log(Elementos) 
                console.log("Eliminado")

                DivHijo_2 = document.getElementsByClassName("imput_6js")[0]
                let DivPadre = document.getElementById("Fieldset")
                DivPadre.removeChild(DivHijo_2);  
            }

        //Se recorren las categorias para verficar cuales estan seleccionadas
        for(var i = 0; i<Categoria.length; i++){
            if(Categoria[i].checked){
                CantidadCategoria = Categoria[i].value 
                TotalCategoria.push(CantidadCategoria)   
            }
        }
           
        console.log(TotalCategoria.length)
        //Se recoge la seleccion enviada desde CantidadCategorias_Ajax_V.php
        // Categoria = document.getElementsByClassName("categoria_js")

        //Se verifica que no hayan más de tres categorias selecionadas
        if(TotalCategoria.length <= 3){
        //     //Se recorren las categorias para verficar cuales estan seleccionadas
        //     // for(var i = 0; i<Categoria.length; i++){
        //     // if(Categoria[i].checked){
        //     //     // Categoria= Categoria[i].value 
        //     //     Categoria[i].value                  
        //     //     // console.log(Categoria[i].value)        
                                 
            //Se carga la categoria al array, este solo permitie tres elementos
            // Limite.push(Categoria[i].value )
            console.log("Las categorias seleccionadas son")
            console.log(TotalCategoria)  

            let id_dinamico = 1
            //Se da propiedades a los elementos creados
            for(let i = 0; i<TotalCategoria.length; i++){
                //Se crean los input que cargara la categorias contenidas en el array TotalCategoria
                var NuevoElemento = document.createElement("input")
                
                NuevoElemento.value = TotalCategoria[i] 
                NuevoElemento.classList.add("input_9", "borde_2", "imput_6js")
                NuevoElemento.name = "categoria[]"
                NuevoElemento.id = "Input_6js_" + id_dinamico
                NuevoElemento.readOnly = true

                //Se especifica el elemento donde se va a insertar el nuevo elemento
                var ElementoPadre = document.getElementById("Fieldset")

                //Se inserta en el DOM el input creado
                inputNuevo = ElementoPadre.appendChild(NuevoElemento) 
            }
            id_dinamico++   
        }
        else{
            console.log("Máximo categorias seleccionadas")  
            alert("Solo pueden seleccionarse tres categorias")   
        }    
        CerrarCategoria() 
    }

//************************************************************************************************
    // invocada desde Categorias_Ajax_V.php
    function CerrarCategoria(){        
        document.getElementById("Mostrar_Categorias").style.display = "none"
    }

//************************************************************************************************















//************************************************************************************************
    //1- invocada desde vitrina_V identifica los elementos de la sección donde se hizo click.
    function verOpciones(Cont_Seccion, Seccion){ 
        console.log("______Desde verOpciones()______")     

        //Captura el valor del id dinanmico de la seccion donde se hizo click
        localStorage.setItem('ContSeccion', Cont_Seccion)         
        LS_ID_Cont_Seccion = localStorage.getItem('ContSeccion')
        console.log(LS_ID_Cont_Seccion)

        //Captura la seccion donde se hizo click
        localStorage.setItem('SeccionCLick',Seccion) 
    }

//************************************************************************************************















//************************************************************************************************
    //invocada desde opciones_V.php añade un producto al carrito
    function agregarOpcion(form, ID_Etiqueta, ID_Cont_Leyenda, ID_InputCantidad, Seccion, ID_InputSeccion, ID_InputProducto, ID_InputOpcion, ID_InputPrecio, ID_InputTotal, ID_InputLeyenda, ID_Cont_Producto, ID_InputDisplayCan){
        console.log("______Desde agregarOpcion()______")     
        
        //Se recibe el control con el nombre "opcion" del formulario desde opciones_V.php
        Opcion = form.opcion

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
        for(let i = 0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion = Opcion[i].value
                            
                //La Opcion seleccionada contiene el ID_Opcion(asignado en BD), el producto, la opcion y el precio separados por una coma, es necesario separar estos valores, por lo que se convierte en un array
                let Separado = Opcion.split(",")  

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
                MontoCarrito =document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                //Guarda en el objeto PedidoAtomico, detalles de cada articulo del pedido, cada detallees en si un array, por lo que se PedidoAtomico es un array de objetos
                PedidoAtomico = new PedidoCar(Separado[0], Separado[2], 1, Separado[3], Separado[4], Separado[4])
                AlCarro.push(PedidoAtomico) 

                //Se muestra la barra que contiene el icono del carrito
                document.getElementById("Contenedor_61").style.visibility = "visible"
            
                //Se muestra el ID_Opcion(necesario en la funcion incrementar())
                // document.getElementById(ID_Opcion).value = Separado[0] 
            
                //Detectar el contenedor del producto en opciones_V.php donde se hace click
                // Cont_Producto = localStorage.getItem('ID_ContenedorProductoDina')
                Cont_Seccion = document.getElementById(LS_ID_Cont_Seccion)
        
                Inp_Leyenda = document.getElementById(LS_ID_InputLeyenda)
        
                //Guarda en el objeto "AlContenedor", la leyenda del producto segun su contenedor de seccion, cada detalle en si es un array, por lo que AlContenedor es un array de objetos
                Contenedores = new ContenedorCar(LS_ID_Cont_Seccion, LS_ID_Cont_Leyenda, LS_ID_InputLeyenda, LS_ID_BotonAgregar, LS_ID_InputCantidad, LS_ID_InputProducto, LS_ID_InputOpcion, LS_ID_InputPrecio, LS_ID_InputTotal, LS_ID_InputDisplayCant, A, Separado[2], Separado[3], Separado[4], Separado[4])
            } 
            DisplayDestello()
        }
        AlContenedor.push(Contenedores)
        console.log(AlContenedor)
    }

//************************************************************************************************















//************************************************************************************************
    //invocada desde opciones_V.php muestra en cada seccion los productos que tiene cargado en carrito
    function TransferirPedido(){
        console.log("______Desde TransferirPedido()______")

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















//************************************************************************************************
    //invocada al cargarse llamar_Opciones() en Funciones_Ajax.js especifica los productos que ya estan cargados al carrito de compra y muestra su leyenda en la vista opciones_V.php
    function ProductosEnCarrito(){      
        console.log("______Desde ProductosEnCarrito()______")        
       
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
    }    

//************************************************************************************************















//************************************************************************************************
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
                            AlCarro[i].Total = Total
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
        }  
    }   

//************************************************************************************************















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
            console.log("______Desde decremento______") 
            
            //Se obtiene el elemento padre donde se encuentra el boton menos al que se hizo click
            current = e.target.parentElement

            //En el elemento padre se busca el input del dispaly que se quiere incrementar            
            let inputSeleccionado = current.getElementsByClassName("input_2")[0]

            //Se accede a la propiedad valor al input display 
            let valor = inputSeleccionado.value
            valor = Number(valor)

            //Se obtiene el contenedor hermano a "current" para acceder a sus input
            let inputSeleccionadoLeyen = current.previousElementSibling  
            
            if((valor > 1) && (valor < 10)){
                //Muestra la cantidad en el input display
                A = valor--
                A--

                //Muestra la cantidad en el input display
                inputSeleccionado.value = A

                //Input producto en el elemento hermano del click correspondiente; Aqui se muestra el producto
                let Producto = inputSeleccionadoLeyen.getElementsByClassName("input_1a")[0].value

                //Input opcion en el elemento hermano del click correspondiente; Aqui se muestra el producto
                let Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1c")[0].value

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                let Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = A
 
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                let Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value

                //Se cambia el formato del precio
                Precio = Precio.replace(".","")
                Precio = Number(Precio)
                                
                //Se calcula el total
                let Total = Cantidades * Precio    
                 
                //Input total en el elemento hermano del click correspondiente; Aqui se mostrará el total
                inputSeleccionadoLeyen.getElementsByClassName("input_1f")[0].value = Total

                //Se busca el ID_Opcion del producto selecionado (Este ID fue asignado en la BD) para saber que producto contiene y añadirlo en el carrito
                //input ID_Opcion en el elemento hermano del click correspondiente; Aqui se mostrará el ID_Opcion
                // ID_Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1b")[0].value
                
                //Se añade el precio del pedido a remover del array que contiene el monto total del pedido
                // SinPunto = Precio.replace(".","")
                // PrecioARestar = Number(SinPunto)
                // DisplayCarrito.push(PrecioARestar)

                //Se resta el precio del pedido al array que contiene el monto total del pedido
                // TotalDisplayCarrito = Number(DisplayCarrito[0]) - Number(PrecioARestar);
                
                //Muestra la leyenda del pedido por producto
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Opcion + " = " + SeparadorMiles(Total) + " Bs."    

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

                //Se verifica que el producto existe en el array AlCarro que contiene el pedidio y si edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Opcion){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = Total
                            console.log(AlCarro)
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
            else{//Si no hay mas producto que eliminar
                confirm("Desea eliminar el pedido de Empanadas")
                //Se da un aviso para confirmar que se va a elminar el pedido de ese prosducto
                // Llamar_AlertPersonalizado()
                
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value
                Precio = Precio.replace(".","")
                Precio = Number(Precio)

                //Input producto en el elemento hermano del click correspondiente; Aqui se muestra el producto
                Producto = inputSeleccionadoLeyen.getElementsByClassName("input_1a")[0].value

                //Input opcion en el elemento hermano del click correspondiente; Aqui se muestra el producto
                Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1c")[0].value

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = 0

                PedidoGlobal = new PedidoCar(Cantidades, Producto , Precio, TotalDisplayCarrito);

                //Se elimina el objeto del array que contiene el pedido, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Opcion){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            AlCarro.splice(i, 1);
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Opcion) 
                
                //Busca por el precio dado y devuelve la posición de la primera ocurrencia.
                let Eliminar = DisplayCarrito.indexOf(Precio)

                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                DisplayCarrito.splice(Eliminar, 1)

                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio

                //Muestra el monto del pedido en el display carrito(se encuentra en vitrina.php)
                MontoCarrito = document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 

                //Se oculta el display carrito cuando el pedido sea de cero Bolivares y se quita el boton de agregar opcion
                if(TotalDisplayCarrito == 0 ){ 
                    document.getElementById("Contenedor_61").style.visibility = "hidden"
                    Cont_Somb_A1 = document.getElementsByClassName("contenedor_14").id = localStorage.getItem('ID_cont_sombreado')
                    Cont_Somb_A2 = document.getElementsByClassName("contenedor_18").id = localStorage.getItem('ID_cont_sub_sombreado')
                    console.log(Cont_Somb_A1)
                    console.log(Cont_Somb_A2)
                    document.getElementById(Cont_Somb_A1).style.display = "none"
                    // document.getElementById(Cont_Somb_A2).style.display = "none"
                }
                else{
                    //Se busca el nodo padre que contiene el input donde esta el producto a eliminar
                    let elementoHijo = current.parentElement
                    let elementoPadre = elementoHijo.parentElement
                    elementoPadre.removeChild(elementoHijo);                    
                }
            }  
            DisplayDestello()
        }     
    }

//************************************************************************************************















//************************************************************************************************
    //invocada desde Funciones_Ajax.js por medior de llamar_PedidoEnCarrito()
    function PedidoEnCarrito(){
        console.log("______Desde PedidoEnCarrito()______")
        
        //Se muestra el monto de la compra en tienda, sin comisión y sin despacho
        document.getElementById("MontoTienda").value = SeparadorMiles(TotalDisplayCarrito)

        //Se calcula la comisión de la aplicacion
        ComisionAplicacion = TotalDisplayCarrito * 0.02

        //Se muestra el monto de la comisión
        document.getElementById("Comision").value = SeparadorMiles(ComisionAplicacion)
        
        //Se calcula el monto total del pedido incluyendo comision y envio
        MontoTotal = Number(TotalDisplayCarrito) + Number(ComisionAplicacion) + Number(3000)

        //Se muestra el monto de total de la compra incluyendo comision y envio
        document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
        
        //Se envia todo el pedido que se encuentra en el array de objeto JSON 
        //1.- Se convierte el JSON en un string
        var sendJSON = JSON.stringify(AlCarro)
        //2.- Se envia al input que lo almacena en la vista
        document.getElementById('Pedido').value = sendJSON
        
        //Se muestra todo el pedido (cantidad - producto - opcion - precio unitario - precio por productos)
        for(i = 0; i < AlCarro.length; i++){
            // console.log(AlCarro[i].Cantidad)
            document.getElementById("Tabla").innerHTML += '<tbody><tr><td class="td_1">' +  AlCarro[i].Cantidad + '</td><td class="td_2">' +  AlCarro[i].Producto + " / " + AlCarro[i].Opcion + '</td><td class="td_3">' + AlCarro[i].Precio + '</td><td class="td_3">' + AlCarro[i].Total + '</td></tr></tbody>'
        }
    }
    
//************************************************************************************************

















//************************************************************************************************
    //Funcion anonima para ocultar el menu principal en responsive haciendo click por fuera del boton menu
    let div = document.getElementById("MenuResponsive")
    let span= document.getElementById("Span_6")
    let B = document.getElementById("Tapa")
    window.addEventListener("click", function(e){
        // console.log("_____Desde función anonima para ocultar menu_____")
        //obtiendo informacion del DOM del elemento donde se hizo click 
        var click = e.target
        // console.log(click)
        AltoVitrina = document.body.scrollHeight
        if((div.style.marginLeft == "0%") && (click != div) && (click != span)){
            div.style.marginLeft = "-48%"
            B.style.display = "none"
            // document.getElementsByTagName("Tapa").style.backgroundColor = "red"
            //Se detiene la propagación de los eventos en caso de hacer click en un elemento que contenga algun evento
            event.stopPropagation();
        }
    }, true)

//************************************************************************************************
    //Muestra el menu principal responsive  
    function mostrarMenu(){  
        console.log("______Desde mostrarMenu()______")
        let A = document.getElementById("MenuResponsive")
        let B = document.getElementById("Tapa")

        if(A.style.marginLeft < "0%"){//Se muestra el menu
            A.style.marginLeft = "0%"
            B.style.display = "block"
        }
        else if(A.style.marginLeft = "0%"){//Se oculta el menu
            A.style.marginLeft = "-48%"
            B.style.backgroundColor = "none"
        }
    }

//************************************************************************************************
    //Coloca la lista de categorias en el borde superior de la página 
    function transicionTiendas(){  
        // console.log("______Desde transicionTiendas()______")
        let C = document.getElementById("Section_1")
        let D = document.getElementById("Section_2js")
        Coordenada = D.getBoundingClientRect()
        
        if(Coordenada.top > 100){
            C.style.height = "7%"
            document.getElementById("Contenedor_37").style.top = "-30%"
            document.getElementById("Contenedor_51").style.top = "-30%"
            document.getElementById("Contenedor_88").style.top = "-30%"
        }
    }

//************************************************************************************************
    // invocada desde PedidoCarrito.php
    function verTransferenciaBancaria(){
        document.getElementById("Contenedor_60a").style.display = "block"
        document.getElementById("Contenedor_60b").style.display = "none"
    }

//************************************************************************************************
    // invocada desde PedidoCarrito.php
    function verPagoMovil(){
        document.getElementById("Contenedor_60a").style.display = "none"
        document.getElementById("Contenedor_60b").style.display = "block"
    }

//************************************************************************************************
    //Da una vista previa de la fotografia antes de guardarla en la BD. usada en publicacion_V.php
    function muestraImg(){
        var contenedor = document.getElementById("muestrasImg");
        var archivos = document.getElementById("ImgInp").files;
        for(i = 0; i < archivos.length; i++){
            imgTag = document.createElement("img");
            imgTag.height = 200;//ESTAS LINEAS NO SON "NECESARIAS"
            imgTag.width = 400; //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN
            imgTag.id = i;      // ORDENADAS CON UN TAMAÑO ESTÁNDAR
            imgTag.src = URL.createObjectURL(archivos[i]);
            contenedor.appendChild(imgTag);
        }
    }
    
//************************************************************************************************
    //invocada desde inicio_V.php - opciones_V.php
    function CerrarModal_X(id){
    document.getElementById(id).style.display = "none"
}

//************************************************************************************************
    //Parapadeo display carrito, invocada desde Pre_incremento - Pre_decremento - transferirOpcion - AgregaOpcion
    function DisplayDestello(){    
        document.getElementById("Mostrar_Carrito").classList.add('Blink')

        setTimeout(function(){
            document.getElementById("Mostrar_Carrito").classList.remove('Blink')
        }, 3000);
    }

//************************************************************************************************
    //Funcion invocada desde tiendas_V.php
    function vitrina(ID_Tienda, NombreTienda){  
        console.log("______Desde vitrina()______")
        window.open(`../../Vitrina_C/index/${ID_Tienda},${NombreTienda}`,"_self")      
        console.log(ID_Tienda + NombreTienda)
    }
    
//************************************************************************************************
    //Invocada desde afiliacion_V.php
    function Documentacion_PWA(){  
        console.log("______Desde Documentacion_PWA()______")    
        window.open("http://localhost/proyectos/PidoRapido/Afiliacion_C/PWA/", "ventana1", "width=1000,height=650,scrollbars=YES");
    }
    
//************************************************************************************************
    //invocada desde carrito.php 
    function MuestraEnvioFactura(){
        document.getElementById("MuestraEnvioFactura").style.display = "block"
        document.getElementById("Contenedor_26").style.display = "none"
    }
    
//************************************************************************************************
    //Cambia el formato de total en el carrito de compras para mostrar en display
    function SeparadorMiles(Numero){
        Numero += ''
        var x = Numero.split('.')
        var x1 = x[0]
        var x2 = x.length > 1 ? '.' + x[1] : ''
        var rgx = /(\d+)(\d{3})/
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2')
        }
        return x1 + x2
    }

//************************************************************************************************
    //invocada desde funcionesVarias.js 
    function CerrarModal(){
        let Z = document.getElementsByClassName("contenedor_15").id = localStorage.getItem('ID_cont_sombreado'); 
        document.getElementById(Z).style.display = "block";
        document.getElementById(Z).style.backgroundColor = "rgb(252, 252, 252)";
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }

//************************************************************************************************
    //Oculta el div que contiene alert personalizado, invocada desde alert.php
    function ocultar(id){
        document.getElementById(id).style.display = "none";
    }
    
//************************************************************************************************
    //invocada desde carrito_V.php
    function ocultarPedido(){       
        document.getElementById("Mostrar_TodoPedido").style.display = "none";
    }
     
//************************************************************************************************
    //invocada desde header_inicio.php 
    // console.log("Se eliminan todos los objetos de un mismo producto menos el ultimo")
    // elementoEliminado = AlCarro.splice(-1);
    // console.log(elementoEliminado)  