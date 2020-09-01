
document.addEventListener("click", preEliminarSeccion)

//Escucha en cuenta_editar_V.php 
document.getElementById("Label_4").addEventListener('click', nuevaCuentaBancaria, false)

//Escucha en cuenta_editar_V.php 
document.getElementById("Label_5").addEventListener('click', crearSeccion, false)

//Escucha en cuenta_editar_V.php 
document.getElementById('Span_1').addEventListener('click', mostrarSecciones, false)

//Escucha en cuenta_editar_V.php 
document.getElementById("Cedula").addEventListener('keyup', function(){formatoMiles(this)})

//Escucha en cuenta_editar_V.php por medio de una función anonima debido a que el evento no esta cargado en el DOM por ser una solicitud Ajax o porque el manejador de eventos se encuentra en otro archivo
document.getElementById('Label_13').addEventListener('click',function(event){ 
    Llamar_categorias()
}, false);

//Escucha en cuenta_editar_V.php por medio de una función anonima debido a porque el manejador de eventos se encuentra en otro archivo                   
document.getElementById("Label_1").addEventListener('click', function(){
    CerrarModal_X("Ejemplo_Secciones")
});

// *****************************************************************************************************
//Da el formato de separador de miles
function formatoMiles(numero){
    var num = numero.value.replace(/\./g,'')
    if(!isNaN(num)){
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.')
        num = num.split('').reverse().join('').replace(/^[\.]/,'')
        numero.value = num
    }
    else{ 
        alert('Solo se permiten numeros')
    numero.value = numero.value.replace(/[^\d\.]*/g,'')
    }
}

// *****************************************************************************************************
//Clona todo el div que continen los inputs que capturan los datos de una cuenta bancaria
    let iterar = 1
    function nuevaCuentaBancaria(){
        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_67")

        //Se crea el clon
        let Div_clon = clonar.cloneNode(true)

        //Se da un ID al nuevo elemento clonado
        Div_clon.style.id = iterar  
        iterar++

        //El value de los elementos que estan dentro del nuevo clon debe estar vacio
        Div_clon.getElementsByClassName("input_9JS")[0].value = ""
        Div_clon.getElementsByClassName("input_9JS")[1].value = ""
        Div_clon.getElementsByClassName("input_9JS")[2].value = ""
        Div_clon.getElementsByClassName("input_9JS")[3].value = ""

        //Se especifica el div padre, donde se insertará el nuevo nodo
        //Contenedor_69 = Div padre y Contenedor_67 = Div hijo
        document.getElementById("Contenedor_69").appendChild(Div_clon)
    }

//************************************************************************************************
//Añade un nuevo input para agregar una nueva sección
   var incremento = 1
    function crearSeccion(){
        console.log("______Desde crear sección______")
        
        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_80")
    
        //Se crea el clon
        let Div_clon = clonar.cloneNode(true)
    
        //Se da un ID al input que se encuentra en el nuevo elemento clonado
        Div_clon.getElementsByClassName("input_12")[0].id = 'InputClon_' + incremento 
        
        //Se da un ID al span que se encuentra en el nuevo elemento clonado
        Div_clon.getElementsByClassName("span_12")[0].id = 'SpanClon_' + incremento 
        
        //El valor del nuevo input debe estar vacio, 
        Div_clon.getElementsByClassName("input_12")[0].value = "" 
        
        //Se especifica el div padre, donde se insertará el nuevo nodo
        document.getElementById("Contenedor_79").appendChild(Div_clon)
        incremento++
    }

//************************************************************************************************
//Elimina los clones de seccion y banco
    function preEliminarSeccion(){
        // console.log("______Desde pre Eliminar Sección______")

        //Detectar el boton eliminar al cual se hizo click
        var Eliminar = document.getElementsByClassName("span_12")//Se obtienen los botones Eliminar
        var len = Eliminar.length//Se cuentan cuantos botones Eliminar hay  
        var button
        for(var i = 0; i < len; i++){
            button = Eliminar[i]; //Se Encuentra el boton eliminar seleccionado al hacer click
            button.onclick = EliminarSeccion // Asignar la función EliminarSeccion() en su evento click.
        }    
        function EliminarSeccion(e){   
            // console.log("______Desde Eliminar Seccion______") 

            //Se obtiene el elemento padre donde se encuentra el boton donde se hizo click
            current = e.target.parentElement
            
            //Se busca el nodo padre que contiene el elemento current
            let elementoPadre = current.parentElement
            
            //Se elimina la sección
            elementoPadre.removeChild(current);  
        }           
    }

//************************************************************************************************
    //Llamada desde cuenta_editar_V.php
    function mostrarSecciones(){
        document.getElementById("Ejemplo_Secciones").style.display = "grid"
    }   