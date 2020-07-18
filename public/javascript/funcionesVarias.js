let Pulsar = false
function ocultarDiv(id){
    if(Pulsar == false){
        Pulsar = true;
        console.log(Pulsar);
        document.getElementById(id).style.display = "block";
    }
    else{
        Pulsar = false;
        console.log(Pulsar);
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
 
        console.log("ID_cont_dinamico= " + I); 
        console.log("ID_cont_sombreado= " + H);  
        console.log("ID_cantidad= " + J); 
        console.log("ID_talla= " + K);
        console.log("ID_Precio= " + L);
        console.log("ID_Leyenda= " + O);
        console.log("ID_incremento_decremento= " + P);
                
        document.getElementById("Mostrar_Opciones").style.display = "block";
        document.getElementsByTagName("html")[0].style.overflow = "hidden";
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
        let Z = document.getElementsByClassName("contenedor_14").id = localStorage.getItem('ID_cont_sombreado'); 
        console.log("ID contenedor dinamico: " + Z);
        document.getElementById(Z).style.display = "grid";
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }

//************************************************************************************************
//Envia el valor de la opcion del producto seleccionado aL html que llamada desde vitrina_V
    function transferirOpcion(){
        //Se captura el valor del elemento con id dinanmico que contiene el tamaño de la prenda 
        let F = document.getElementsByClassName("label_1a").id = localStorage.getItem('ID_input_talla'); 

        let Opcion = document.getElementsByName("talla");
        for(var i=0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion= Opcion[i].value;
                //Despues de recorrer las opciones se guarda la opcion checkeada en un localStorage
                window.localStorage.setItem('tamanioPrenda', Opcion);
                console.log("Talla de la prenda: " + localStorage.getItem("tamanioPrenda"));
                console.log("ID input talla= " + F);
    
                // Se cambia el valor de la talla    
                document.getElementById(F).value=localStorage.getItem("tamanioPrenda");           
            }
        }
        
        pedidoParcial()
        CerrarModal();
    }

//************************************************************************************************
//Llamada desde vitrina_V          
function incrementar(){
    // let J = localStorage.getItem("ID_cantidad");
    let C = document.getElementsByClassName("input2a").id = localStorage.getItem("ID_incre_decre"); 
    console.log("ID_producto a incrementar= " + C);

    let D =  document.getElementsByClassName("label_1e").id = localStorage.getItem("ID_cantidad");
      
    let valor = document.getElementById(C).value;
    console.log("Cantidad pedida= " + valor);
    
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
    valor = document.getElementById("Item");
    if(valor.value > 01){
        B = valor.value --;
        B--;
        document.getElementById("Cantidad").value = B;
        console.log(B);
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
    
    let Cantidad = document.getElementById(M).value;
    let Precio = document.getElementById(N).value;

    let Total = Cantidad * Precio;   
    console.log("Precio total: " + Total); 
    document.getElementById(J).value = Total;


    document.getElementById(L).value = Cantidad + " x " + localStorage.getItem("tamanioPrenda") + " = " + " $" + Total;    
    console.log(Total);
}

//************************************************************************************************
