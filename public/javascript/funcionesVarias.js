//Llamada desde inicio_V.php
window.addEventListener('load', inicializarEventos, false);

function inicializarEventos(){
    //Este set de seis funciones son invocadas desde incio_V.php
    document.getElementById('H2_1').addEventListener('click',function(){ocultar("Mostrar_Delivery")});
    document.getElementById('H2_2').addEventListener('click',function(){ocultar("Mostrar_Ropa")});
    document.getElementById('H2_3').addEventListener('click',function(){ocultar("Mostrar_Bar")});
    document.getElementById('H2_4').addEventListener('click',function(){ocultar("Mostrar_Alimentos")});
    document.getElementById('H2_5').addEventListener('click',function(){ocultar("Mostrar_Productos")});
    document.getElementById('H2_6').addEventListener('click',function(){ocultar("Mostrar_Maquinas")});

    //Este set dos funciones son invocadas desde vitrina_V.php
    document.addEventListener('click', Pre_incremento, false)
    document.addEventListener('click', Pre_decremento, false)
}

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
    function verOpciones(Cont_Sombreado, Cont_Dinamico, Producto, contador_4, Leyenda, Precio, Cantidad, Incre_Decre){      
        //Se captura el valor de los id dinanmicos que se genern y se guarda en ID_cont_sombreado
        window.localStorage.setItem('ID_cont_sombreado', Cont_Sombreado);
        window.localStorage.setItem('ID_cont_dinamico', Cont_Dinamico);
        window.localStorage.setItem('ID_input_Producto', Producto);
        window.localStorage.setItem('ID_IntputTotal', contador_4);
        window.localStorage.setItem('ID_leyenda', Leyenda);
        window.localStorage.setItem('ID_precio', Precio);
        window.localStorage.setItem('ID_cantidad', Cantidad);
        window.localStorage.setItem('ID_incre_decre', Incre_Decre);

        let I = localStorage.getItem("ID_cont_dinamico");
        let H = localStorage.getItem("ID_cont_sombreado");
        let J = localStorage.getItem("ID_cantidad");
        let K = localStorage.getItem("ID_input_Producto");
        let L = localStorage.getItem("ID_precio");
        let O = localStorage.getItem("ID_leyenda");
        let P = localStorage.getItem("ID_incre_decre");
                 
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
        Opcion = form.opcion;

        //Se captura el valor del elemento con id dinanmico que contiene el tamaño de la prenda 
        let F = document.getElementsByClassName("label_1a").id = localStorage.getItem('ID_input_Producto'); 
        
        for(var i=0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion= Opcion[i].value;
                //Despues de recorrer las opciones se guarda la opcion checkeada en un localStorage
                window.localStorage.setItem('OpcionSeleccionada', Opcion);
    
                // Se muestra el valor de la opcion seleccionada   
                document.getElementById(F).value = localStorage.getItem("OpcionSeleccionada");           
            }
        }        
        pedidoParcial()
        CerrarModal();
    }

//************************************************************************************************
//Llamada desde vitrina_V     
    function Pre_incremento(){
        function incrementar(e){
            var elems = document.getElementsByClassName("input_2")//Elementos que contienen los input que acompañan cada boton de sumar o restar
            var len = elems.length;
                var current = e.target.parentElement;
                var inputSeleccionado = current.getElementsByClassName("input_2")[0]//Se obtiene el input del elemento recien clonado               
                var valor = inputSeleccionado.value
                if(valor < 10){
                    A = valor++;
                    A++;
                    inputSeleccionado.value = A; 
                }  
        }   
        // Detectar el boton donde se hace click
        var mas = document.getElementsByClassName("mas")//Se obtienen los botones [+]
        var i 
        var len = mas.length
        var button
        for(i = 0; i < len; i++){
            button = mas[i]; // Encontrar el botón [+].
            button.onclick = incrementar;//Asignar la función agregar(), en su evento click.
        } 
    }    

//************************************************************************************************
//Llamada desde vitrina_V
    function Pre_decremento(){
        function decrementar(e){   
            var elems = document.getElementsByClassName("input_2")
            var len = elems.length;
            var current = e.target.parentElement;
            var inputSeleccionado = current.getElementsByClassName("input_2")[0]                
            var valor = inputSeleccionado.value
            if((valor > 0) && (valor < 10)){
                A = valor--;
                A--;
                inputSeleccionado.value = A; 
            }        
            else if(valor < 1){
                confirm("Desea eliminar el pedido de Empanadas")
                //Se busca el nodo padre que contiene el input donde esta el producto a eliminar
                // let elementoHijo = current.parentElement
                // let elementoPadre = elementoHijo.parentElement
                // let ClonEliminado = elementoPadre.removeChild(elementoHijo);
            }  
        }                
        //Detectar el boton de restar
        var menos = document.getElementsByClassName("menos")//Se obtienen los botones menos [-]
        var i
        var len = menos.length//Se cuentan cuantos botones menos hay  
        var button
        for(i = 0; i < len; i++){
            button = menos[i]; //Se Encontrar el botón [-] seleccionado al hacer click
            button.onclick = decrementar; // Asignar la función decrementar() en su evento click.
        }    
    }

//************************************************************************************************
//Llamada desde funcionesVarias.js 
    function pedidoParcial(){
        let J = document.getElementsByClassName("label_1b").id = localStorage.getItem("ID_IntputTotal"); 
        let L = document.getElementsByClassName("input_2a").id = localStorage.getItem("ID_leyenda");  
        let M = document.getElementsByClassName("label_1d").value = localStorage.getItem("ID_precio"); 
        let N = document.getElementsByClassName("label_1e").id =localStorage.getItem('ID_cantidad');   
        
        let Precio = document.getElementById(M).value;
        let Cantidad = document.getElementById(N).value;

        let Total = Cantidad * Precio;   
        // console.log("Precio total: " + Total); 
        document.getElementById(J).value = Total;

        document.getElementById(L).value = Cantidad + " x " + localStorage.getItem("OpcionSeleccionada") + " = " + " $" + Total;    
        // console.log(Total);
    }

//************************************************************************************************
//Llamada desde opciones_V.php 
    let orden = 1;
    function AgregaOpcion(form, C_Padre, C_AClonar){
        let Opcion = form;
        let BB = C_Padre;
        let CC = C_AClonar;

        //Se recorre la variable "Opcion" que contiene el elemento radioButomm seleccionado por el usaurio en opciones_V.php
        for(var i=0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion= Opcion[i].value;
                // Despues de recorrer las opciones se guarda la opcion checkeada en un localStorage
                window.localStorage.setItem('OpcionAgregada', Opcion);
                console.log("Opcion seleccionada: " + localStorage.getItem("OpcionAgregada"));
            }
        }

        //Contenedor a clonar 
        let clonar = document.getElementById(BB);

        //Aqui se puede ver dos resultados diferentes del mismo elemento
        console.log("Contenedor a clonar: " + clonar);
        console.log(document.getElementById(BB))

        //Se crea el clon
        let clon_E = clonar.cloneNode(true);
        //Se da el valor a la cantidad del producto pedido
        clon_E.getElementsByClassName("input_2")[0].value = 1 

        //Se da un ID al nuevo elemento
        // let G = clon_E.style.id = orden;
        
        //Se especifica el producto del pedido del usuario
        clon_E.getElementsByClassName("input_2a")[0].value = "1" + " X " + localStorage.getItem("OpcionAgregada") + " = " + "$140"

        orden++;  
        
        //Se coloca un prefijo al ID del nuevo nodo
        // let NuevoNodo = G 
        // console.log('ID_nuevo_nodo: ' + NuevoNodo);  

        //Se especifica el div padre donde se insertará el nuevo nodo
        nodoPadre = clonar.id = document.getElementById(CC);
        document.getElementById(nodoPadre).appendChild(clon_E);
        
        pedidoParcial()
        CerrarModal();
    }

//************************************************************************************************
//Funcion llamada desde tiendas_V.php
function vitrina(ID_Tienda){    
    window.open(`Vitrina_C/index/${ID_Tienda}`,"_self")
}
