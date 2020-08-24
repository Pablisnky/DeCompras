//Cuando carga la página se registran los listener de clic para toda la ventana
document.addEventListener("click", Pre_decremento)
document.addEventListener("click", Pre_incremento)


//Si activo los listener deja de funcionar el menu responsive cuando se hace click por fuera del menu 



//Escucha en login_V.php                              
// document.getElementById('Submit').addEventListener('click', DesabilitarBoton, false)

//Escucha en inicio_V.php - cuenta_editar_V.php  - cuenta_publicar_V.php                          
document.getElementById("Label_1").addEventListener('click', function(){CerrarModal_X("Ejemplo_Secciones")})

//Declarar el array que contiene los ID_Opcion que se añaden al carrito
//Verificar para que sirve, creo que solo es util en la función decremento




let PedidoCarrito = []

//Declarar el array que contiene los detalles de cada pedido atomico(cantidad, producto, precio, total) cada detalle se inserta al array como un objeto JSON
let AlCarro = []

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito
function PedidoCar(Cantidad, Producto, Opcion, Precio, Total){
    this.Cantidad = Cantidad
    this.Producto = Producto
    this.Opcion = Opcion
    this.Precio = Precio
    this.Total = Total
}

//************************************************************************************************















//************************************************************************************************

//Llamada desde opciones_V.php es llalamada cuando se agrega un clon
let orden = 1
function AgregaOpcion(form, C_Padre, C_AClonar){
    console.log("______Desde Agrega Opcion______")
    let Opcion = form
    let DivPadre = C_Padre
    let DivHijo = C_AClonar
    //Se recorre la variable "Opcion" que contiene el elemento radioButomm seleccionado por el usaurio en opciones_V.php
    for(var i=0; i<Opcion.length; i++){
        if(Opcion[i].checked){
            Opcion = Opcion[i].value
        }
    }
    
    //En Let = Opcion se tiene el ID_Opcion(asignado en BD), el nombre y el precio separados por una coma, es necesario separar ambos valores
    let Separado = Opcion.split(",") 
    console.log(Separado)
    //Se verifica si el producto ya existe en le pedido 
    var results = AlCarro.filter(function(AlCarro){return AlCarro.Opcion == Separado[2];});
    if(results.length > 0){
        alert("Tu pedido ya tiene " + Separado[1]+ " " + Separado[2])

        //Se cancela el pedido repetido
        document.getElementById("Mostrar_Opciones").style.display = "none"
        return
    }

    //Contenedor a clonar 
    let clonar = document.getElementById(DivHijo)

    //Se crea el clon
    let Div_clon = clonar.cloneNode(true)

    //Se da un ID al nuevo elemento clonado
    Div_clon.style.id = orden  

    //El valor de la cantidad del pedido en el nuevo clon debe iniciar en 1 en el display de cantidad
    Div_clon.getElementsByClassName("input_2")[0].value = 1 

    //El valor de la cantidad del pedido en el nuevo clon debe iniciar en 1 en el input de peddido
    Div_clon.getElementsByClassName("input_1e")[0].value = 1 
    
    //Se especifica el ID_Opcion
    Div_clon.getElementsByClassName("input_1b")[0].value = Separado[0]

    //Se especifica el producto
    Div_clon.getElementsByClassName("input_1a")[0].value = Separado[1]

    //Se especifica el nombre de la opcion
    Div_clon.getElementsByClassName("input_1c")[0].value = Separado[2]

    //Se especifica el precio
    Div_clon.getElementsByClassName("input_1d")[0].value = Separado[3]    

    //Se especifica el monto total que debe ser igual al precio porque es solo una unidad
    Div_clon.getElementsByClassName("input_1f")[0].value = Separado[4]

    orden++
    
    //Se añade el producto carrito, basta con añadir el id_dinamico(ID_Opcion) por cada unidad de produto añadida
    PedidoCarrito.push(Separado[0]) 

    PedidoAtomico = new PedidoCar(1, Separado[1] , Separado[2], Separado[3], Separado[3]);
    AlCarro.push(PedidoAtomico) 

    //Se especifica el div padre, donde se insertará el nuevo nodo
    document.getElementById(DivPadre).appendChild(Div_clon)
        
    SinPunto = Separado[3].replace(".","")
    PrecioASumar = Number(SinPunto)
    DisplayCarrito.push(PrecioASumar)
    TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b);

    //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
    MontoCarrito =document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs."  
    
    //Muestra la leyenda del pedido
    Div_clon.getElementsByClassName("input_2a")[0].value = 1 + " " + Separado[2] + " = " + SeparadorMiles(Separado[3]) + " Bs."

    DisplayDestello()
    CerrarModal();
}

//************************************************************************************************
















//************************************************************************************************
    //Llamada desde cuenta_editar.php selecciona tres categorias en los tipos de tiendas
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


            id_dinamico = 1
            //Se da propiedades a los elementos creados
            for(var i = 0; i<TotalCategoria.length; i++){
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
    // Llamada desde Categorias_Ajax_V.php
    function CerrarCategoria(){        
        document.getElementById("Mostrar_Categorias").style.display = "none"
    }

//************************************************************************************************

















//************************************************************************************************
    //Guarda cada precio de los productos pedidos 
    DisplayCarrito = []  

    //Guarda el monto total del pedido que se muestra en el display
    TotalDisplayCarrito = []  

    //Llamada desde opciones:V.php
    function transferirOpcion(form){
        console.log("______Desde transferir Opcion______")
        Opcion = form.opcion
        console.log(Opcion)
        //Se sombrea el contenedor que tiene cargado un producto en el el carrito
        let I = localStorage.getItem("ID_cont_dinamico");                
        document.getElementById(I).style.backgroundColor = "rgba(51, 51, 51, 0.3)";
        document.getElementById(I).style.borderRadius = "15px";

        Cont_Somb_1 = document.getElementsByClassName("contenedor_14").id = localStorage.getItem('ID_cont_sombreado')
        Cont_Somb_2 = document.getElementsByClassName("contenedor_18").id = localStorage.getItem('ID_cont_sub_sombreado')

        //Se verifica que ya se entro a los productos por medio del DIV principal, luego solo se puede accederpor el boton de "Agregar otra pcion" el cual genera los clones
        if(document.getElementById(I).style.display != "block"){

            //Se sombrea la seccion del contenedor donde estan los botones de mas, menos y añadir
            document.getElementById(Cont_Somb_1).style.display = "block"   
            
            //Se remueve la clase que realiza el hover en el contenedor que contiene los productos
            Cont_Imagen = document.getElementsByClassName("contenedor_11").id = localStorage.getItem('ID_cont_imagen')
            document.getElementById(Cont_Imagen).classList.remove("contenedor_11a")
            
            //Se muestra la barra que contiene el icono del carrito
            document.getElementById("Contenedor_61").style.visibility = "visible"

            //Se captura el id dinamico del elemento que va a contener el producto seleccionado, este elemento se crea cuando se hace click en un producto 
            Pro = document.getElementsByClassName("input_1a").id = localStorage.getItem('ID_input_Producto')

            //Se captura el id dinamico del elemento que va a contener la opcion seleccionada, este elemento se crea cuando se hace click en un producto 
            Opc = document.getElementsByClassName("input_1c").id = localStorage.getItem('ID_Opcion')
            console.log(Opc)
            //Se captura el id dinamico del elemento que va a contener el precio, este elemento se crea cuando se hace click en un producto 
            let Pre = document.getElementsByClassName("input_1d").id = localStorage.getItem('id_input_precio')
            
            //Se captura el id dinamico del elemento que va a contener el ID_Opcion, este elemento se crea cuando se hace click en un producto 
            let ID_Opcion = document.getElementsByClassName("input_1b").id = localStorage.getItem('ID_input_opcion')
            
            //Se captura el id dinamico del elemento que va a contener el total,este elemento se crea cuando se hace click en un producto   
            let Input_total = localStorage.getItem('ID_inputtotal')
            
            //Se captura el id dinamico del elemento que va a contener la leyenda,este elemento se crea cuando se hace click en un producto   
            let input_leyenda = localStorage.getItem('ID_inputleyenda')
            console.log(input_leyenda)

            console.log(Opcion.length)
            //Se recorrer las opciones del producto 
            for(var i = 0; i<Opcion.length; i++){
                if(Opcion[i].checked){
                    Opcion = Opcion[i].value
                    console.log(Opcion[i].value)
                    //La Opcion seleccionada contiene el ID_Opcion(asignado en BD), el nombre y el precio separados por una coma, es necesario separar ambos valores
                    let Separado = Opcion.split(",")  
                    console.log(Separado[0])
                    //Se obtiene el ID_Opcion contenido en "Separado"
                    Separado[0]

                    //Se muestra el producto en vitrina.php
                    document.getElementById(Pro).value = Separado[1]   
                                    
                    //Se muestra la opcion en vitrina.php
                    document.getElementById(Opc).value = Separado[2] 

                    //Se muestra el precio en vitrina.php
                    Precio = document.getElementById(Pre).value = Separado[3] 
                    
                    //Se cambia el formato del precio
                    Precio = Precio.replace(".","")
                    Precio = Number(Precio)
                    
                    //Se muestra el total, sera igual al precio porque es una unidad de producto
                    document.getElementById(Input_total).value = Separado[3] 

                    //Muestra la leyenda del pedido
                    document.getElementById(input_leyenda).value = 1 + " " + Separado[2] + " = " + Separado[3] + " Bs." 

                    //Se muestra el ID_Opcion(necesario en la funcion incrementar())
                    document.getElementById(ID_Opcion).value = Separado[0] 
                
                    //Se añade el producto carrito(no lo suma), basta con añadir el id_dinamico(ID_Opcion) por cadd unidad de produto añadida
                    PedidoCarrito.push(Separado[0])
                    
                    //Se ingresa el monto del nuevo pedido al array que contiene el monto total del pedido, este es el monto que se muestra en el display del carrito e informa al usuario de como va la cuenta
                    
                    DisplayCarrito.push(Precio) 
                    TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b)
                    
                    //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                    MontoCarrito =document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                    
                    PedidoAtomico = new PedidoCar(1, Separado[1] , Separado[2], Separado[3], Separado[3])
                    AlCarro.push(PedidoAtomico) 
                    console.log(AlCarro)
                }
            }        
            DisplayDestello()
            CerrarModal()
        }
        else{
            console.log("No carga más producto")
        }
    }

//************************************************************************************************















//************************************************************************************************

//Llamada desde vitrina_V  
    function Pre_incremento(){  
        //Detectar el boton donde se hace click
        let mas = document.getElementsByClassName("mas")//Se obtienen los botones [+]
        let i 
        let len = mas.length//Se cuenta cuanto botones mas existen
        let button
        for(i = 0; i < len; i++){
            button = mas[i] //Encontrar el botón [+].
            button.onclick = incrementar //Asignar la función incrementar(), al evento click.
        }
        function incrementar(e){
            console.log("______Desde incremento______")
            //Se obtiene el elemento padre donde se encuentra el boton mas al que se hizo click
            let current = e.target.parentElement

            //En el elemento padre se busca el input del dispaly que se quiere incrementar            
            let inputSeleccionado = current.getElementsByClassName("input_2")[0]

            //Se accede a la propiedad valor al input display 
            let valor = inputSeleccionado.value

            //Se obtiene el contenedor hermano a "current" para acceder a sus input
            let inputSeleccionadoLeyen = current.previousElementSibling  
            if(valor < 10){
                A = valor++
                A++
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
                let ID_Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1b")[0].value
                               
                //Se añade el producto al carrito(no lo suma), basta con añadir el id_dinamico(ID_Opcion) por cada unidad de produto añadida
                PedidoCarrito.push(ID_Opcion)
                
                //Se añade el precio del nuevo pedido al array que contiene el monto
                DisplayCarrito.push(Precio)

                //Se suma el precio del nuevo pedido al array que contiene el monto total del pedido
                TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b);
                
                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito =document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                //Muestra la leyenda del pedido por producto
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Opcion + " = " + SeparadorMiles(Total) + " Bs."   
                
                //Se 
                PedidoGlobal = new PedidoCar(Cantidades, Producto , Opcion, Precio, TotalDisplayCarrito);
             
                //Se verifica que el producto existe en el array AlCarro que contiene el pedidio y si edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Opcion){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Opcion == Opcion ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = Total
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Opcion)  
                console.log(AlCarro)         
            }  
            DisplayDestello()
        }  
    }   

//************************************************************************************************















//************************************************************************************************
    //Llamada desde vitrina_V
    function Pre_decremento(){          
        //Detectar el boton de restar
        var menos = document.getElementsByClassName("menos")//Se obtienen los botones menos [-]
        var i
        var len = menos.length//Se cuentan cuantos botones menos hay  
        var button
        for(i = 0; i < len; i++){
            button = menos[i]; //Se Encontrar el botón [-] seleccionado al hacer click
            button.onclick = decrementar // Asignar la función decrementar() en su evento click.
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
                Producto = inputSeleccionadoLeyen.getElementsByClassName("input_1a")[0].value

                //Input opcion en el elemento hermano del click correspondiente; Aqui se muestra el producto
                let Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1c")[0].value

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = A
                                
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value
                Precio = Precio.replace(".","")
                Precio = Number(Precio)
                                
                //Se calcula el total
                let Total = Cantidades * Precio    
                
                //Input total en el elemento hermano del click correspondiente; Aqui se mostrará el total
                inputSeleccionadoLeyen.getElementsByClassName("input_1f")[0].value = Total

                //Se busca el ID_Opcion del producto selecionado (Este ID fue asignado en la BD) para saber que producto contiene y añadirlo en el carrito
                //input ID_Opcion en el elemento hermano del click correspondiente; Aqui se mostrará el ID_Opcion
                ID_Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1b")[0].value
                
                //Se añade el precio del pedido a remover del array que contiene el monto total del pedido
                // SinPunto = Precio.replace(".","")
                // PrecioARestar = Number(SinPunto)
                // DisplayCarrito.push(PrecioARestar)

                //Se resta el precio del pedido al array que contiene el monto total del pedido
                // TotalDisplayCarrito = Number(DisplayCarrito[0]) - Number(PrecioARestar);

                //Busca por el precio dado y devuelve la posición de la primera ocurrencia.
                let Eliminar = DisplayCarrito.indexOf(Precio)

                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                DisplayCarrito.splice(Eliminar, 1)

                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio

                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito =document.getElementById("Input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                //Muestra la leyenda del pedido por producto
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Opcion + " = " + SeparadorMiles(Total) + " Bs." 

                //Se 
                PedidoGlobal = new PedidoCar(Cantidades, Producto, Opcion, Precio, TotalDisplayCarrito);
                
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

                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
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
    //LLamada desde .php
    function PedidoEnCarrito(){
        //Se muestra el monto de la compra en tienda, sin comisión y sin despacho
        console.log("______Desde Pedido en carrito______")
        
        console.log(TotalDisplayCarrito)
        document.getElementById("MontoTienda").value = SeparadorMiles(TotalDisplayCarrito)

        //Se calcula la comisión de la aplicacion
        ComisionAplicacion = TotalDisplayCarrito * 0.02

        //Se muestra el monto de la comisión
        document.getElementById("Comision").value = SeparadorMiles(ComisionAplicacion)
        
        //Se calcula el monto total del pedido incluyendo comision y envio
        MontoTotal = Number(TotalDisplayCarrito) + Number(ComisionAplicacion) + Number(3000)

        //Se muestra el monto de total de la compra incluyendo comision y envio
        document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
        
        //Se envia todo el pedido que se encuenra en el array de objeto JSON 
        //1.- Se convierte el JSON en un string
        var sendJSON = JSON.stringify(AlCarro)
        //2.- Se envia al input que lo almacena en la vista
        document.getElementById('Pedido').value = sendJSON
        
        //Se muestra todo el pedido (cantidad - producto - opcion - precio unitario - precio por productos)
        for(i = 0; i < AlCarro.length; i++){
            console.log(AlCarro[i].Cantidad)
            document.getElementById("Tabla").innerHTML += '<tbody><tr><td class="td_1">' +  AlCarro[i].Cantidad + '</td><td class="td_2">' +  AlCarro[i].Producto + " / " + AlCarro[i].Opcion + '</td><td class="td_3">' + AlCarro[i].Precio + '</td><td class="td_3">' + AlCarro[i].Total + '</td></tr></tbody>'
        }
    }
    
//************************************************************************************************















//************************************************************************************************
    //Llamada desde carrito_V.php para seleccionar si el despacho sera enviado o recogido en tienda
    function formaEntrega(){    
        console.log("______Desde forma_Entrega______")
        console.log(TotalDisplayCarrito)
        console.log(ComisionAplicacion)
        let porNombre = document.getElementsByName("entrega");
        //Se recorren todos los valores del radio button para encontrar el seleccionado
        for(var i=0; i<porNombre.length; i++){
            if(porNombre[i].checked){
                E= porNombre[i].value;
            }
        }
        //Se muestra la condicion de despacho
        if(E == "Domicilio_No"){
            document.getElementById("Despacho").innerHTML = "Recoger personalmente en tienda:<input type='text' class='input_6' value='0' readonly='readondly'/> Bs."
            
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
   
//************************************************************************************************
    //Llamada desde login_V.php
    function DesabilitarBoton(){
        document.getElementsByClassName("submit_js")[0].value = "Creando tienda ..."
    }

//************************************************************************************************
    //Funcion anonima para ocultar el menu en responsive
    var div = document.getElementById("MenuResponsive")
    var span= document.getElementById("Span_6")
    window.addEventListener("click", function(e){
        // console.log("_____Desde función anonima para ocultar menu_____")
        //obtiendo informacion del DOM del elemento donde se hizo click 
        var click = e.target
        console.log(click)
        if((div.style.marginLeft == "0%") && (click != div) && (click != span)){
            div.style.marginLeft = "-48%"
        }
    }, false)

//************************************************************************************************
    //Muestra el menu responsive  
    function mostrarMenu(){  
        var A= document.getElementById("MenuResponsive")
        if(A.style.marginLeft < "0%"){//Se muestra el menu
                A.style.marginLeft = "0%"
            }
        else if(A.style.marginLeft = "0%"){//Se oculta el menu
                A.style.marginLeft = "-48%"
            }
    }

//************************************************************************************************
    // Llamada desde PedidoCarrito.php
    function verTransferenciaBancaria(){
        document.getElementById("Contenedor_60a").style.display = "block"
        document.getElementById("Contenedor_60b").style.display = "none"
    }

//************************************************************************************************

    // Llamada desde PedidoCarrito.php
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
 //Llamada desde inicio_V.php - opciones_V.php
 function CerrarModal_X(id){
    document.getElementById(id).style.display = "none"
    document.getElementsByTagName("html")[0].style.overflow = "visible"
}

//************************************************************************************************
    //Parapadeo display carrito, llamada desde Pre_incremento - Pre_decremento - transferirOpcion - AgregaOpcion
    function DisplayDestello(){    
        document.getElementById("Mostrar_Carrito").classList.add('Blink')

        setTimeout(function(){
            document.getElementById("Mostrar_Carrito").classList.remove('Blink')
        }, 3000);
    }

//************************************************************************************************
    //Funcion llamada desde tiendas_V.php
    function vitrina(ID_Tienda, pagina){  
        if(pagina == "tiendas_V"){
        window.open(`../../Vitrina_C/index/${ID_Tienda}`,"_self")
        }
        else if(pagina == "buscador_V"){
            window.open(`Vitrina_C/index/${ID_Tienda}`,"_self")
        }
    }
    
//************************************************************************************************
    //Llamada desde carrito.php 
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
    //Llamada desde funcionesVarias.js 
    function CerrarModal(){
        let Z = document.getElementsByClassName("contenedor_15").id = localStorage.getItem('ID_cont_sombreado'); 
        document.getElementById(Z).style.display = "block";
        document.getElementById(Z).style.backgroundColor = "rgb(252, 252, 252)";
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }

//************************************************************************************************
    //Oculta el div que contiene alert personalizado, llamada desde alert.php
    function ocultar(id){
        document.getElementById(id).style.display = "none";
    }
    
//************************************************************************************************
    //Llamada desde vitrina_V
    function verOpciones(Cont_imagen, Cont_Sombreado, Cont_SubSombreado, Cont_Dinamico, Producto, Opcion, Leyenda, Precio, Cantidad, Total, ID_Opcion, Incre_Decre){      
        //Se captura el valor de los id dinanmicos que se generan y contiene el id de los input respectivos
        window.localStorage.setItem('ID_cont_imagen', Cont_imagen)
        window.localStorage.setItem('ID_cont_sombreado', Cont_Sombreado)
        window.localStorage.setItem('ID_cont_sub_sombreado', Cont_SubSombreado)
        window.localStorage.setItem('ID_cont_dinamico', Cont_Dinamico)
        window.localStorage.setItem('ID_input_Producto', Producto)
        window.localStorage.setItem('ID_Opcion', Opcion)
        window.localStorage.setItem('ID_inputleyenda', Leyenda)
        window.localStorage.setItem('id_input_precio', Precio)
        window.localStorage.setItem('ID_cantidad', Cantidad)
        window.localStorage.setItem('ID_inputtotal', Total)
        window.localStorage.setItem('ID_incre_decre', Incre_Decre)
        window.localStorage.setItem('ID_input_opcion', ID_Opcion)
    }

//************************************************************************************************
    //Llamada desde carrito_V.php
    function ocultarPedido(){       
        document.getElementById("Mostrar_TodoPedido").style.display = "none";
    }



    
    // console.log("Se eliminan todos los objetos de un mismo producto menos el ultimo")
    // elementoEliminado = AlCarro.splice(-1);
    // console.log(elementoEliminado)  