//Declarar el array que contiene los ID_Opcion que se añaden al carrito
//Verificar para que sirve, creo que solo es util en la función decremento
let PedidoCarrito = []

//Declarar el array que contiene los detalles de cada pedido atomico(cantidad, producto, precio, total) cada detalle se inserta al array como un objeto JSON
let AlCarro = []

//Mediante el constructor de objetos se crea un objeto con todos los productos del pedido, información solicitada al entrar al carrito
function PedidoCar(Cantidad, Producto, Precio, Total){
    this.Cantidad = Cantidad
    this.Producto = Producto
    this.Precio = Precio
    this.Total = Total
}

//************************************************************************************************
//Llamada desde opciones_V.php 
let orden = 1
function AgregaOpcion(form, C_Padre, C_AClonar){
    let Opcion = form
    let DivPadre = C_Padre
    let DivHijo = C_AClonar

    //Se recorre la variable "Opcion" que contiene el elemento radioButomm seleccionado por el usaurio en opciones_V.php
    for(var i=0; i<Opcion.length; i++){
        if(Opcion[i].checked){
            Opcion = Opcion[i].value
        }
    }

    //En Let=Opcion se tiene el ID_Opcion(asignado en BD), el nombre y el precio separados por una coma, es necesario separar ambos valores
    let Separado = Opcion.split(",") 

    //Se verifica si el producto ya existe en le pedido
    var results = AlCarro.filter(function(AlCarro){ return AlCarro.Producto == Separado[1];});
    if(results.length > 0){
        alert("Tu pedido ya tiene " + Separado[1])

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

    //Se especifica el nombre de la opcion
    Div_clon.getElementsByClassName("input_1a")[0].value = Separado[1]

    //Se especifica el precio
    Div_clon.getElementsByClassName("input_1d")[0].value = Separado[2]    

    //Se especifica el monto total que debe ser igual al precio porque es solo una unidad
    Div_clon.getElementsByClassName("input_1f")[0].value = Separado[2]

    orden++
    
    //Se añade el producto carrito, basta con añadir el id_dinamico(ID_Opcion) por cada unidad de produto añadida
    PedidoCarrito.push(Separado[0]) 

    PedidoAtomico = new PedidoCar(1, Separado[1] , Separado[2], Separado[2]);
    AlCarro.push(PedidoAtomico) 

    //Se especifica el div padre, donde se insertará el nuevo nodo
    document.getElementById(DivPadre).appendChild(Div_clon)
        
    SinPunto = Separado[2].replace(".","")
    PrecioASumar = Number(SinPunto)
    DisplayCarrito.push(PrecioASumar)
    TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b);

    //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
    MontoCarrito =document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs."  
    
    //Muestra la leyenda del pedido
    Div_clon.getElementsByClassName("input_2a")[0].value = 1 + " " + Separado[1] + " = " + SeparadorMiles(Separado[2]) + " Bs."

    CerrarModal();
}

//************************************************************************************************
//Envia el valor de la opcion del producto seleccionado aL html que llamada desde vitrina_V
    DisplayCarrito = []  
    function transferirOpcion(form){
        Opcion = form.opcion
        
        //Se oculta el nombre de la aplicación (solo en dispositivos moviles)
        // document.getElementById("Span_1").className += "span_1a";
        
        //Se muestra el icono del carrito
        document.getElementById("Mostrar_Carrito").style.visibility = "visible"

        //Se captura el id dinamico del elemento que va a contener el producto seleccionado, este elemento se crea cuando se hace click en un producto 
        let Pro = document.getElementsByClassName("input_1a").id = localStorage.getItem('ID_input_Producto')

        //Se captura el id dinamico del elemento quse va a contener el precio, este elemento se crea cuando se hace click en un producto 
        let Pre = document.getElementsByClassName("input_1d").id = localStorage.getItem('id_input_precio')
        
        //Se captura el id dinamico del elemento quse va a contener el ID_Opcion, este elemento se crea cuando se hace click en un producto 
        let ID_Opcion = document.getElementsByClassName("input_1b").id = localStorage.getItem('ID_input_opcion')
        
        //Se captura el id dinamico del elemento que va a contener el total,este elemento se crea cuando se hace click en un producto   
        let Input_total = localStorage.getItem('ID_inputtotal')
        
        //Se captura el id dinamico del elemento que va a contener la leyenda,este elemento se crea cuando se hace click en un producto   
        let input_leyenda = localStorage.getItem('ID_inputleyenda')

        //Se recorrer las opciones del producto y se guarda la opcion checkeada en un localStorage
        for(var i=0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion= Opcion[i].value
        
                //La Opcion seleccionada contiene el ID_Opcion(asignado en BD), el nombre y el precio separados por una coma, es necesario separar ambos valores
                let Separado = Opcion.split(",")  

                //Se obtiene el ID_Opcion contenido en "Separado"
                Separado[0]

                //Se muestra el producto    
                document.getElementById(Pro).value = Separado[1]   
                                
                //Se muestra el precio
                Precio = document.getElementById(Pre).value = Separado[2]      

                //Se muestra el total, sera igual al precio porque es una unidad de producto
                document.getElementById(Input_total).value = Separado[2] 

                //Muestra la leyenda del pedido
                document.getElementById(input_leyenda).value = 1 + " " + Separado[1] + " = " + Separado[2] + " Bs." 

                //Se muestra el ID_Opcion(necesario en la funcion incrementar())
                document.getElementById(ID_Opcion).value = Separado[0] 
              
                //Se añade el producto carrito(no lo suma), basta con añadir el id_dinamico(ID_Opcion) por cadd unidad de produto añadida
                PedidoCarrito.push(Separado[0])
                
                //Se suma el monto del nuevo pedido al array que contiene el monto total del pedido, este es el monto que se muestra en el display del carrito e informa al usuario de como va la cuenta
                SinPunto = Separado[2].replace(".","")
                SeparadoASumar = Number(SinPunto)
                DisplayCarrito.push(SeparadoASumar) 
                TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b)
                console.log("Desde transferirOpcion; como va la cuenta")
                console.log(TotalDisplayCarrito)
                
                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito =document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                PedidoAtomico = new PedidoCar(1, Separado[1] , Separado[2], Separado[2])
                AlCarro.push(PedidoAtomico) 
            }
        }        
        CerrarModal()
    }

//************************************************************************************************
//Llamada desde vitrina_V  
    //Cuando carga tu página se registra un listener de clic para toda la ventana
    document.addEventListener("click", Pre_incremento);

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

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                let Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = A
                                
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                let Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value
                                
                //Se calcula el total
                let Total = Cantidades * Precio.replace(".","")    
                
                //Input total en el elemento hermano del click correspondiente; Aqui se mostrará el total
                inputSeleccionadoLeyen.getElementsByClassName("input_1f")[0].value = Total
                
                //Se busca el ID_Opcion del producto selecionado (Este ID fue asignado en la BD) para saber que producto contiene y añadirlo en el carrito
                //input ID_Opcion en el elemento hermano del click correspondiente; Aqui se mostrará el ID_Opcion
                let ID_Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1b")[0].value
                               
                //Se añade el producto al carrito(no lo suma), basta con añadir el id_dinamico(ID_Opcion) por cada unidad de produto añadida
                PedidoCarrito.push(ID_Opcion)
                
                //Se añade el precio del nuevo pedido al array que contiene el monto
                SinPunto = Precio.replace(".","")
                PrecioASumar = Number(SinPunto)
                DisplayCarrito.push(PrecioASumar)

                //Se suma el precio del nuevo pedido al array que contiene el monto total del pedido
                TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b);
                
                console.log("Desde Pre_incremento; como va la cuenta")
                console.log(TotalDisplayCarrito)

                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito =document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                //Muestra la leyenda del pedido
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto + " = " + SeparadorMiles(Total) + " Bs."   
                
                PedidoGlobal = new PedidoCar(Cantidades, Producto , Precio, TotalDisplayCarrito);
             
                //Se verifica que el producto existe en el array AlCarro que contiene el pedidio y si edita la cantidad y el monto total acumulado por ese producto
                function ProductoEditado(Producto){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Producto == Producto ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = Total
                            console.log("Monto real desde Pre_incremeno")
                            console.log(Total)
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto)             
            }  
        }  
    }   

//************************************************************************************************
    //Llamada desde vitrina_V
    //Cuando carga tu página se registra un listener de clic para toda la ventana
    document.addEventListener("click", Pre_decremento);

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
            //Se obtiene el elemento padre donde se encuentra el boton menos al que se hizo click
            let current = e.target.parentElement

            //En el elemento padre se busca el input del dispaly que se quiere incrementar            
            let inputSeleccionado = current.getElementsByClassName("input_2")[0]

            //Se accede a la propiedad valor al input display 
            let valor = inputSeleccionado.value
            
            //Se obtiene el contenedor hermano a "current" para acceder a sus input
            let inputSeleccionadoLeyen = current.previousElementSibling  

            if((valor > 0) && (valor < 10)){
                //Muestra la cantidad en el input display
                A = valor--
                A--
                //Muestra la cantidad en el input display
                inputSeleccionado.value = A

                //Input producto en el elemento hermano del click correspondiente; Aqui se muestra el producto
                let Producto = inputSeleccionadoLeyen.getElementsByClassName("input_1a")[0].value

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                let Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = A
                                
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                let Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value
                                
                //Se calcula el total
                let Total = Cantidades * Precio.replace(".","")    
                
                //Input total en el elemento hermano del click correspondiente; Aqui se mostrará el total
                inputSeleccionadoLeyen.getElementsByClassName("input_1f")[0].value = Total

                //Se busca el ID_Opcion del producto selecionado (Este ID fue asignado en la BD) para saber que producto contiene y añadirlo en el carrito
                //input ID_Opcion en el elemento hermano del click correspondiente; Aqui se mostrará el ID_Opcion
                ID_Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1b")[0].value
                
                //Se resta el precio del nuevo pedido al array que contiene el monto total del pedido
                SinPunto = Precio.replace(".","")
                PrecioASumar = Number(SinPunto)
                DisplayCarrito.push(PrecioASumar)
                let total = DisplayCarrito.reduce((a, b) => a - b);
                
                
                console.log("Desde Pre_decremento; como va la cuenta")
                console.log(TotalDisplayCarrito)

                //Muestra la leyenda del pedido
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto + " = " + SeparadorMiles(Total) + " Bs."   
                
                //Ordenar array con indexOf; Busca "ID_Opcion" dentro del array y devuelve la posición de la primera ocurrencia.
                let Eliminar = PedidoCarrito.indexOf(ID_Opcion)

                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                PedidoCarrito.splice(Eliminar, 1)
                
                //Se verifica que el producto existe en el array AlCarro que contiene el pedidio y si edita la cantidad y el monto total acumulado por ese producto
                function ProductoEditado(Producto){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Producto == Producto ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = Total
                            console.log("Monto real desde Pre_decremeno")
                            console.log(Total)
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto) 
            }        
            else if(valor == 0){
                confirm("Desea eliminar el pedido de Empanadas")
                //Se busca el nodo padre que contiene el input donde esta el producto a eliminar
                // let elementoHijo = current.parentElement
                // let elementoPadre = elementoHijo.parentElement
                // let ClonEliminado = elementoPadre.removeChild(elementoHijo);
            }  
        }     
    }

//************************************************************************************************
    //LLamada desde header.php
    function PedidoEnCarrito(){
        //Se muestra el monto de la compra en tienda, sin comisión y sin despacho
        document.getElementById("MontoTienda").value = SeparadorMiles(TotalDisplayCarrito)

        //Se calcula la comisión de la aplicacion
        ComisionAplicacion = TotalDisplayCarrito * 0.06

        //Se muestra el monto de la comisión
        document.getElementById("Comision").value = SeparadorMiles(ComisionAplicacion)
        
        //Se calcula el monto total del pedido incluyendo comision y envio
        MontoTotal = Number(TotalDisplayCarrito) + Number(ComisionAplicacion) + Number(3000)

        //Se muestra el monto de total de la compra incluyendo comision y envio
        document.getElementById("MontoTotal").value = SeparadorMiles(MontoTotal)
        
        //Se muestra todo el pedido (cantidad - producto - precio unitario - precio por productos)
        for(i = 0; i < AlCarro.length; i++){
            document.getElementById("Tabla").innerHTML += '<tbody><tr><td class="td_1">' +  AlCarro[i].Cantidad + '</td><td class="td_2">' +  AlCarro[i].Producto + '</td><td class="td_3">' + AlCarro[i].Precio + '</td><td class="td_3">' + AlCarro[i].Total + '</td></tr></tbody>'
        }
    }
    
//************************************************************************************************
    //Funcion llamada desde tiendas_V.php
    function vitrina(ID_Tienda){    
        window.open(`../../Vitrina_C/index/${ID_Tienda}`,"_self")
    }
    
//************************************************************************************************
    //Llamada desde inicio_V.php
    function VerTiendas(Tiendas){
        window.open(`Tiendas_C/index/${Tiendas}`,"_self")
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
        // console.log("ID contenedor dinamico: " + Z);
        document.getElementById(Z).style.display = "block";
        document.getElementById(Z).style.backgroundColor = "rgb(252, 252, 252)";
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }

//************************************************************************************************
    //Oculta el div que contiene las categorias de la aplicacion - NO ESTA ACTIVA
    let Status = false
    function ocultar(id){
        if(Status == false){
            Status = true;
            document.getElementById(id).style.display = "block";
        }
        else{
            Status = false;
            document.getElementById(id).style.display = "none";
        }
    }

//************************************************************************************************
    //Llamada desde vitrina_V
    function verOpciones(Cont_Sombreado, Cont_Dinamico, Producto, Leyenda, Precio, Cantidad, Total, ID_Opcion, Incre_Decre){      
        //Se captura el valor de los id dinanmicos que se generan y contiene el id de los input respectivos
        window.localStorage.setItem('ID_cont_sombreado', Cont_Sombreado);
        window.localStorage.setItem('ID_cont_dinamico', Cont_Dinamico);
        window.localStorage.setItem('ID_input_Producto', Producto);
        window.localStorage.setItem('ID_inputleyenda', Leyenda);
        window.localStorage.setItem('id_input_precio', Precio);
        window.localStorage.setItem('ID_cantidad', Cantidad);
        window.localStorage.setItem('ID_inputtotal', Total);
        window.localStorage.setItem('ID_incre_decre', Incre_Decre);
        window.localStorage.setItem('ID_input_opcion', ID_Opcion);

        let I = localStorage.getItem("ID_cont_dinamico");
                
        document.getElementById(I).style.backgroundColor = "rgba(165, 42, 42, 0.3)";
        document.getElementById(I).style.borderRadius = "15px";
    }

//************************************************************************************************
    //Llamada desde carrito_V.php
    function ocultarPedido(){       
        document.getElementById("Mostrar_TodoPedido").style.display = "none";
    }

//************************************************************************************************
    //Llamada desde vitrina_V.php
    function CerrarModal_X(){
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }
    
//************************************************************************************************
// function inicializarEventos(){
    //Este set de seis funciones son invocadas desde incio_V.php
    // document.getElementById('H2_1').addEventListener('click',function(){ocultar("Mostrar_ComidaRapida")});
    // document.getElementById('H2_2').addEventListener('click',function(){ocultar("Mostrar_Supermercado")});
    // document.getElementById('H2_3').addEventListener('click',function(){ocultar("Mostrar_Bar")});
    // document.getElementById('H2_4').addEventListener('click',function(){ocultar("Mostrar_Alimentos")});
    // document.getElementById('H2_5').addEventListener('click',function(){ocultar("Mostrar_Productos")});
    // document.getElementById('H2_6').addEventListener('click',function(){ocultar("Mostrar_Maquinas")});

    //Este set dos funciones son invocadas desde vitrina_V.php
    // document.addEventListener('click', Pre_incremento, false)
    // document.addEventListener('click', Pre_decremento, false)
// }

//************************************************************************************************
    

    
    // console.log("Se eliminan todos los objetos de un mismo producto menos el ultimo")
    // elementoEliminado = AlCarro.splice(-1);
    // console.log(elementoEliminado)  