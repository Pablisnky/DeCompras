//Cuando carga la página se registran los listener de clic para toda la ventana
document.addEventListener("click", Pre_decremento);
document.addEventListener("click", Pre_incremento);
    
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
        
    // console.log("La cuenta va en")
    // console.log(DisplayCarrito)

    SinPunto = Separado[2].replace(".","")
    PrecioASumar = Number(SinPunto)
    DisplayCarrito.push(PrecioASumar)
    TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b);

    console.log("______Desde agregar_Opcion")
    console.log(DisplayCarrito)
    console.log(TotalDisplayCarrito)

    //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
    MontoCarrito =document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs."  
    
    //Muestra la leyenda del pedido
    Div_clon.getElementsByClassName("input_2a")[0].value = 1 + " " + Separado[1] + " = " + SeparadorMiles(Separado[2]) + " Bs."

    DisplayDestello()
    CerrarModal();
}

//************************************************************************************************















//************************************************************************************************

    //Guarda cada precio de los productos pedidos 
    DisplayCarrito = []  

    //Guarda el monto total del pedido que se muestra en el display
    TotalDisplayCarrito = []  

    function transferirOpcion(form){
        Opcion = form.opcion
        console.log("Entra en Transferir_Opcion")
        console.log(Opcion)
        //Se muestra el icono del carrito en el header
        document.getElementById("Mostrar_Carrito").style.visibility = "visible"



        Cont_Somb_1 = document.getElementsByClassName("contenedor_14").id = localStorage.getItem('ID_cont_sombreado')
        Cont_Somb_2 = document.getElementsByClassName("contenedor_18").id = localStorage.getItem('ID_cont_sub_sombreado')
        console.log(Cont_Somb_1)
        console.log(Cont_Somb_2)
        document.getElementById(Cont_Somb_1).style.display = "block"
        // document.getElementById(Cont_Somb_2).style.display = "block"




        //Se elimina el evento que llama al cuadro de opciones, ahora solo se puede llamar dede el boton de "Agregar otra opcion"
        // document.getElementsByClassName("contenedor_11")[0].removeEventListener("click", verOpciones)

        //Se captura el id dinamico del elemento que va a contener el producto seleccionado, este elemento se crea cuando se hace click en un producto 
        Pro = document.getElementsByClassName("input_1a").id = localStorage.getItem('ID_input_Producto')
        console.log("id input que contiene el producto")
        console.log(Pro)
        console.log(localStorage.getItem('ID_input_Producto'))

        //Se captura el id dinamico del elemento quse va a contener el precio, este elemento se crea cuando se hace click en un producto 
        let Pre = document.getElementsByClassName("input_1d").id = localStorage.getItem('id_input_precio')
        
        //Se captura el id dinamico del elemento quse va a contener el ID_Opcion, este elemento se crea cuando se hace click en un producto 
        let ID_Opcion = document.getElementsByClassName("input_1b").id = localStorage.getItem('ID_input_opcion')
        
        //Se captura el id dinamico del elemento que va a contener el total,este elemento se crea cuando se hace click en un producto   
        let Input_total = localStorage.getItem('ID_inputtotal')
        
        //Se captura el id dinamico del elemento que va a contener la leyenda,este elemento se crea cuando se hace click en un producto   
        let input_leyenda = localStorage.getItem('ID_inputleyenda')

        //Se recorrer las opciones del producto para 
        for(var i=0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion= Opcion[i].value
        
                //La Opcion seleccionada contiene el ID_Opcion(asignado en BD), el nombre y el precio separados por una coma, es necesario separar ambos valores
                let Separado = Opcion.split(",")  

                //Se obtiene el ID_Opcion contenido en "Separado"
                Separado[0]
                console.log(Separado[1])
                //Se muestra el producto    
                document.getElementById(Pro).value = Separado[1]   
                                
                //Se muestra el precio
                Precio = document.getElementById(Pre).value = Separado[2] 
                
                //Se cambia el formato del precio
                Precio = Precio.replace(".","")
                Precio = Number(Precio)

                //Se muestra el total, sera igual al precio porque es una unidad de producto
                document.getElementById(Input_total).value = Separado[2] 

                //Muestra la leyenda del pedido
                document.getElementById(input_leyenda).value = 1 + " " + Separado[1] + " = " + Separado[2] + " Bs." 

                //Se muestra el ID_Opcion(necesario en la funcion incrementar())
                document.getElementById(ID_Opcion).value = Separado[0] 
              
                //Se añade el producto carrito(no lo suma), basta con añadir el id_dinamico(ID_Opcion) por cadd unidad de produto añadida
                PedidoCarrito.push(Separado[0])
                
                //Se ingresa el monto del nuevo pedido al array que contiene el monto total del pedido, este es el monto que se muestra en el display del carrito e informa al usuario de como va la cuenta
                
                DisplayCarrito.push(Precio) 
                TotalDisplayCarrito = DisplayCarrito.reduce((a, b) => a + b)

                console.log("______Desde transferir_Opcion")
                console.log(DisplayCarrito)
                console.log(TotalDisplayCarrito)
                console.log("Formato precio")
                console.log(Precio)
                
                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito =document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                PedidoAtomico = new PedidoCar(1, Separado[1] , Separado[2], Separado[2])
                AlCarro.push(PedidoAtomico) 
            }
        }        
        DisplayDestello()
        CerrarModal()
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
                MontoCarrito =document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                //Muestra la leyenda del pedido por producto
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto + " = " + SeparadorMiles(Total) + " Bs."   
                
                //Se 
                PedidoGlobal = new PedidoCar(Cantidades, Producto , Precio, TotalDisplayCarrito);
             
                //Se verifica que el producto existe en el array AlCarro que contiene el pedidio y si edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Producto){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Producto == Producto ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = Total
                            console.log(AlCarro)
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto)   
                
                console.log("______Desde Pre_incremento")
                console.log(DisplayCarrito)
                console.log(TotalDisplayCarrito)
                console.log("Formato precio")
                console.log(Precio)
                console.log("El producto pasado es = ")
                console.log(PedidoGlobal.Producto)          
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
                console.log("Indice en array")
                console.log(Eliminar)

                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                DisplayCarrito.splice(Eliminar, 1)

                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio

                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito =document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 
                
                //Muestra la leyenda del pedido por producto
                inputSeleccionadoLeyen.getElementsByClassName("input_2a")[0].value = Cantidades + " " + Producto + " = " + SeparadorMiles(Total) + " Bs." 

                //Se 
                PedidoGlobal = new PedidoCar(Cantidades, Producto , Precio, TotalDisplayCarrito);
                
                //Se verifica que el producto existe en el array AlCarro que contiene el pedidio y si edita la cantidad y el monto total acumulado por ese producto, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Producto){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Producto == Producto ){
                            existe = true;
                            AlCarro[i].Cantidad = Cantidades
                            AlCarro[i].Total = Total
                            console.log(AlCarro)
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto)  
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

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = 0

                PedidoGlobal = new PedidoCar(Cantidades, Producto , Precio, TotalDisplayCarrito);

                //Se elimina el objeto del array que contiene el pedido, esta informacion es la que va al resumen de la orden
                function ProductoEditado(Producto){
                    var existe = false;
                    for(i = 0; i < AlCarro.length; i++){
                        if(AlCarro[i].Producto == Producto ){
                            AlCarro.splice(i, 1);
                        }
                    }
                    return existe;
                }
                ProductoEditado(PedidoGlobal.Producto) 
                
                //Busca por el precio dado y devuelve la posición de la primera ocurrencia.
                let Eliminar = DisplayCarrito.indexOf(Precio)

                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                DisplayCarrito.splice(Eliminar, 1)

                //Se resta del display carrito el producto eliminado
                TotalDisplayCarrito = TotalDisplayCarrito - Precio

                //Muestra el monto del pedido en el display carrito(se encuentra en header.php)
                MontoCarrito = document.getElementById("input_5").value = SeparadorMiles(TotalDisplayCarrito) + " Bs." 

                console.log("______Desde Pre_decremento - ELSE")
                console.log("Array precio atomico")
                console.log(DisplayCarrito)
                console.log("Display carrito")
                console.log(TotalDisplayCarrito)  
                console.log(Precio)
                console.log("El producto pasado es = ")
                console.log(PedidoGlobal.Producto)
                console.log(AlCarro)

                //Se oculta el display carrito cuando el pedido sea de cero Bolivares y se quita el boton de agregar opcion
                if(TotalDisplayCarrito == 0 ){ 
                    document.getElementById("Mostrar_Carrito").style.visibility = "hidden"
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

    //LLamada desde header.php
    function PedidoEnCarrito(){
        //Se muestra el monto de la compra en tienda, sin comisión y sin despacho
        console.log("______Desde Pedido_En_Carrito")
        console.log(TotalDisplayCarrito)
        document.getElementById("MontoTienda").value = SeparadorMiles(TotalDisplayCarrito)

        //Se calcula la comisión de la aplicacion
        ComisionAplicacion = TotalDisplayCarrito * 0.03

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
        
        //Se muestra todo el pedido (cantidad - producto - precio unitario - precio por productos)
        for(i = 0; i < AlCarro.length; i++){
            document.getElementById("Tabla").innerHTML += '<tbody><tr><td class="td_1">' +  AlCarro[i].Cantidad + '</td><td class="td_2">' +  AlCarro[i].Producto + '</td><td class="td_3">' + AlCarro[i].Precio + '</td><td class="td_3">' + AlCarro[i].Total + '</td></tr></tbody>'
        }
    }
    
//************************************************************************************************













//************************************************************************************************
    //Llamada desde registro_V.phph
    function AfilicacionDespachador(){
        document.getElementById("Mostrar_Despachador").style.display = "block"
    }

//************************************************************************************************
    //Llamada desde registro_V.phph
    function AfilicacionComerciante(){
        document.getElementById("Mostrar_Comerciante").style.display = "block"
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
    function verOpciones(Cont_Sombreado, Cont_SubSombreado, Cont_Dinamico, Producto, Leyenda, Precio, Cantidad, Total, ID_Opcion, Incre_Decre){      
        //Se captura el valor de los id dinanmicos que se generan y contiene el id de los input respectivos
        window.localStorage.setItem('ID_cont_sombreado', Cont_Sombreado);
        window.localStorage.setItem('ID_cont_sub_sombreado', Cont_SubSombreado);
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