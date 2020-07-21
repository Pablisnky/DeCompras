let Pulsar = false
function ocultarDiv(id){
    if(Pulsar == false){
        Pulsar = true;
        document.getElementById(id).style.display = "block";
    }
    else{
        Pulsar = false;
        document.getElementById(id).style.display = "none";
    }
}

//************************************************************************************************
//Llamada desde vitrina_V
    function verOpciones(Cont_Sombreado, Cont_Dinamico, Talla, contador_4, Leyenda, Precio, Cantidad, Incre_Decre){      
        //Se captura el valor de los id dinanmicos que se genern y se guarda en ID_cont_sombreado
        window.localStorage.setItem('ID_cont_sombreado', Cont_Sombreado);
        window.localStorage.setItem('ID_cont_dinamico', Cont_Dinamico);
        window.localStorage.setItem('ID_input_talla', Talla);
        window.localStorage.setItem('ID_IntputTotal', contador_4);
        window.localStorage.setItem('ID_leyenda', Leyenda);
        window.localStorage.setItem('ID_precio', Precio);
        window.localStorage.setItem('ID_cantidad', Cantidad);
        window.localStorage.setItem('ID_incre_decre', Incre_Decre);

        let I = localStorage.getItem("ID_cont_dinamico");
        let H = localStorage.getItem("ID_cont_sombreado");
        let J = localStorage.getItem("ID_cantidad");
        let K = localStorage.getItem("ID_input_talla");
        let L = localStorage.getItem("ID_precio");
        let O = localStorage.getItem("ID_leyenda");
        let P = localStorage.getItem("ID_incre_decre");
 
        //  console.log("ID_cont_dinamico= " + I); 
        // console.log("ID_cont_sombreado= " + H);  
        // console.log("ID_cantidad= " + J); 
        // console.log("ID_talla= " + K);
        // console.log("ID_Precio= " + L);
        console.log("ID_Leyenda= " + O);
        console.log("ID_incremento_decremento= " + P);
                
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
        let F = document.getElementsByClassName("label_1a").id = localStorage.getItem('ID_input_talla'); 
        
        for(var i=0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion= Opcion[i].value;
                //Despues de recorrer las opciones se guarda la opcion checkeada en un localStorage
                window.localStorage.setItem('OpcionSeleccionada', Opcion);
                console.log("Opcion seleccionada: " + localStorage.getItem("OpcionSeleccionada"));
                // console.log("ID input t= " + F); 
    
                // Se muestra el valor de la opcion seleccionada   
                document.getElementById(F).value = localStorage.getItem("OpcionSeleccionada");           
            }
        }
        
        pedidoParcial()
        CerrarModal();
    }

//************************************************************************************************
//Llamada desde vitrina_V          
function incrementar(Boton_Inc){
    //Se accede al nodo donde esta el display de incremento/decremento
    window.localStorage.setItem('ID_boton_inc', Boton_Inc);   
    //Contenedor a clonar
    let BB = localStorage.getItem("ID_boton_inc"); 
    console.log("ID_Boton_Incremento= " + BB);
    let CC = localStorage.getItem("ID_nuevo_nodo");
    console.log("ID nuevo modo= " + CC);

    let C = document.getElementsByClassName("input2a").id = localStorage.getItem("ID_incre_decre"); 
    console.log("ID_DIsplay= " + C);

    let D =  document.getElementsByClassName("label_1e").id = localStorage.getItem("ID_cantidad");
      
    let valor = document.getElementById(C).value;
    // console.log("Cantidad pedida= " + valor);
    
    if(valor < 10){
        A = valor++;
        A++;
        document.getElementById(C).value = A;
        document.getElementById(D).value = A;

        console.log("Numero de productos= " + A);
    }
    pedidoParcial();
}

//************************************************************************************************
//Llamada desde vitrina_V
function decrementar(){
    let E = document.getElementsByClassName("input2a").id = localStorage.getItem("ID_incre_decre");
    // console.log("ID_producto a decrementar= " + E);
    let valor = document.getElementById(E).value;
    
    // console.log("Cantidad pedida= " + valor);
    let G =  document.getElementsByClassName("label_1e").id = localStorage.getItem("ID_cantidad");

    if(valor > 01){
        B = valor--;
        B--;
        document.getElementById(E).value = B;
        document.getElementById(G).value = B;
    }
    pedidoParcial();
} 

//************************************************************************************************
//Llamada desde funcionesVarias.js 
function pedidoParcial(){
    let J = document.getElementsByClassName("label_1b").id = localStorage.getItem("ID_IntputTotal"); 
    let L = document.getElementsByClassName("label_1c").id = localStorage.getItem("ID_leyenda");  
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
    Opcion = form.opcion;
    window.localStorage.setItem('ID_cont_agreg__opcion', C_Padre); 
    window.localStorage.setItem('ID_cont_a_clonar', C_AClonar);    
    console.log("Contenedor padre: " + localStorage.getItem("ID_cont_agreg__opcion"));
    console.log("Contenedor a clonar: " + localStorage.getItem("ID_cont_a_clonar"));

    // Se captura el valor del elemento con id dinanmico que contiene el tamaño de la prenda 
    // let F = document.getElementsByClassName("label_1a").id = localStorage.getItem('ID_input_talla'); 
    
    for(var i=0; i<Opcion.length; i++){
        if(Opcion[i].checked){
            Opcion= Opcion[i].value;
            // Despues de recorrer las opciones se guarda la opcion checkeada en un localStorage
            window.localStorage.setItem('OpcionSeleccionada', Opcion);
            console.log("Opcion seleccionada: " + localStorage.getItem("OpcionSeleccionada"));
            // console.log("ID input t= " + F); 

            // Se muestra el valor de la opcion seleccionada   
            // document.getElementById(F).value = localStorage.getItem("OpcionSeleccionada");           
        }
    }

    //Contenedor a clonar
    let BB = localStorage.getItem("ID_cont_a_clonar"); 
    let clonar = document.getElementById(BB);
    console.log("Contenedor a clonar: " + clonar);

    //Se crea el clon
    let clon_E = clonar.cloneNode(true); 

    //Se da un ID al nuevo elemento
    let G = clon_E.style.id = 'Nuevo_Clon_' + orden;
    orden++;  
    
    let H = clon_E.style.id ;
    console.log("ID_nuevo_nodo: " + H); 
    // window.localStorage.setItem('ID_nuevo_nodo', clon_E.style.id);  

    //Se especifica el div padre donde se insertará el nuevo nodo
    nodoPadre = clonar.id = localStorage.getItem("ID_cont_agreg__opcion");
    document.getElementById(nodoPadre).appendChild(clon_E);
    
    pedidoParcial()
    CerrarModal();
}

//************************************************************************************************
