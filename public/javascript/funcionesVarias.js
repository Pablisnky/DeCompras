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
    function verOpciones(contador, contador_2){      
        //Se captura el valor de los id dinanmicos que se genern y se guarda en ID_Dinamico
        window.localStorage.setItem('ID_Dinamico', contador);
        window.localStorage.setItem('ID_contenedorSombreado', contador_2);
        let H = localStorage.getItem("ID_Dinamico");
        let I = localStorage.getItem("ID_contenedorSombreado");
        console.log("ID_Dinamico= " + H);  
        console.log("ID_contenedorSombreado= " + I);  
                
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
        let Z = document.getElementsByClassName("contenedor_14").id = localStorage.getItem('ID_Dinamico'); 
        console.log("El ID del contenedor: " + Z);
        document.getElementById(Z).style.display = "grid";
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }

//************************************************************************************************
//Envia el valor de la opcion del producto seleccionado aL html que llamada desde vitrina_V
    function transferirOpcion(ID_inputTalla){
        //Se captura el valor del elemento con id dinanmico que contiene el tamaño de la prenda 
        window.localStorage.setItem('ID_InputTalla', ID_inputTalla);
        let F = document.getElementsByClassName("label_l").id = localStorage.getItem('ID_InputTalla');
        console.log("ID_InputT= " + F);  

        let Opcion = document.getElementsByName("talla");
        for(var i=0; i<Opcion.length; i++){
            if(Opcion[i].checked){
                Opcion= Opcion[i].value;
                //Despues de recorrer las opciones se guarda la opcion checkeada en un localStorage
                window.localStorage.setItem('tamanioPrenda', Opcion);
                console.log("La talla de la prenda es: " + localStorage.getItem("tamanioPrenda"));
                console.log("El ID del input talla= " + F);
    
                // Se cambia el valor de la talla            
                // document.getElementById(F).value = localStorage.getItem("tamanioPrenda");   
            }
        }
        
        pedidoParcial()
        CerrarModal();
    }


























//************************************************************************************************
//Llamada desde vitrina_V
function incrementar(){
    valor = document.getElementById("Item");
    if(valor.value < 10){
        A = valor.value ++;
        A++;
        document.getElementById("Cantidad").value = A;
        console.log(A);
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
//Llamada desde vitrina_V
function pedidoParcial(){
    
    let Cantidad = document.getElementById("Cantidad").value;
    let Precio = document.getElementById("Precio").value;

    let Total = Cantidad * Precio;    
    document.getElementById("Total").value = Total;

    document.getElementById("Leyenda").value = Cantidad + " x " + localStorage.getItem("tamanioPrenda") + " = " + Total;    
    console.log(Total);
}
