//Llamada desde inicio_V.php
// window.addEventListener('load', inicializarEventos, false);
//Declarar el array que contiene los productos que se añaden al carrito
let PedidoCarrito = []

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

    //La Opcion seleccionada contiene el ID_Opcion(asignado en BD), el nombre y el precio separados por una coma, es necesario separar ambos valores
    let Separado = Opcion.split(",") 

    //Contenedor a clonar 
    let clonar = document.getElementById(DivPadre)

    //Se crea el clon
    let Div_clon = clonar.cloneNode(true)

    //Se da un ID al nuevo elemento
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
    
    //Se añade el producto carrito, basta con añadir el id_dinamico(ID_Opcion) por cadd unidad de produto añadida
    PedidoCarrito.push(Separado[0]) 

    //Se especifica el div padre, donde se insertará el nuevo nodo
    nodoPadre = clonar.id = document.getElementById(DivHijo)
    document.getElementById(nodoPadre).appendChild(Div_clon)
    
    CerrarModal();
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
//Oculta el div que contiene las categorias de la aplicacion
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
        window.localStorage.setItem('ID_leyenda', Leyenda);
        window.localStorage.setItem('id_input_precio', Precio);
        window.localStorage.setItem('ID_cantidad', Cantidad);
        window.localStorage.setItem('ID_inputtotal', Total);
        window.localStorage.setItem('ID_incre_decre', Incre_Decre);
        window.localStorage.setItem('ID_input_opcion', ID_Opcion);

        let I = localStorage.getItem("ID_cont_dinamico");
                 
        document.getElementById(I).style.backgroundColor = "rgba(165, 42, 42, 0.3)";
    }

//************************************************************************************************
//Llamada desde vitrina_V.php
    function CerrarModal_X(){
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
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
//Envia el valor de la opcion del producto seleccionado aL html que llamada desde vitrina_V
    function transferirOpcion(form){
        Opcion = form.opcion
        
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

                //Se muestra el ID_Opcion(necesario en la funcion incrementar())
                document.getElementById(ID_Opcion).value = Separado[0] 
           
                //Se añade el producto carrito, vasta con añadir el id_dinamico(ID_Opcion) por cadd unidad de produto añadida
                PedidoCarrito.push(Separado[0])
            }
        }        

        CerrarModal()
    }

//************************************************************************************************
//Llamada desde vitrina_V     
    function Pre_incremento(){
        //Detectar el boton donde se hace click
        let mas = document.getElementsByClassName("mas")//Se obtienen los botones [+]
        let i 
        let len = mas.length//Se cuenta cuanto botones mas existen
        let button
        for(i = 0; i < len; i++){
            button = mas[i]; //Encontrar el botón [+].
            button.onclick = incrementar;//Asignar la función incrementar(), al evento click.
        } 

        function incrementar(e){
            //Se obtiene el elemento padre donde se encuentra el boton mas al que se hizo click
            let current = e.target.parentElement;

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
                               
                //Se añade el producto carrito, basta con añadir el id_dinamico(ID_Opcion) por cadd unidad de produto añadida
                PedidoCarrito.push(ID_Opcion)
                console.log(PedidoCarrito)
            }  
        }   
    }    

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

                //input cantidad en el elemento hermano del click correspondiente; Aqui se mostrará la cantidad
                let Cantidades = inputSeleccionadoLeyen.getElementsByClassName("input_1e")[0].value = A
                                
                //Input precio en el elemento hermano del click correspondiente; Aqui se muestra el precio
                let Precio = inputSeleccionadoLeyen.getElementsByClassName("input_1d")[0].value
                                
                //Se calcula el total
                let Total = Cantidades * Precio.replace(".","")    
                
                //Input total en el elemento hermano del click correspondiente; Aqui se mostrará el total
                inputSeleccionadoLeyen.getElementsByClassName("input_1f")[0].value = Total

                //input ID_Opcion en el elemento hermano del click correspondiente; Aqui se mostrará el ID_Opcion
                ID_Opcion = inputSeleccionadoLeyen.getElementsByClassName("input_1b")[0].value

                //Ordenar array con indexOf; Busca "ID_Opcion" dentro del array y devuelve la posición de la primera ocurrencia.
                let Eliminar = PedidoCarrito.indexOf(ID_Opcion)
                
                //Elimina de PedidoCarrito la posicion del array guardada en "Eliminar"
                PedidoCarrito.splice(Eliminar, 1);
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
//Funcion llamada desde tiendas_V.php
    function vitrina(ID_Tienda){    
        window.open(`Vitrina_C/index/${ID_Tienda}`,"_self")
    }