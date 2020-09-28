document.addEventListener("click", preEliminarSeccion)

document.getElementById("Label_4").addEventListener('click', nuevaCuentaBancaria, false)

document.getElementById("Label_5").addEventListener('click', crearSeccion, false)

document.getElementById('Span_1').addEventListener('click', mostrarSecciones, false)

document.getElementById("Cedula").addEventListener('keyup', function(){formatoMiles(this)})

// document.getElementById("Contenedor_107").addEventListener('click', muestraMenuSecundario, false)

document.getElementById('Submit').addEventListener('click', DesabilitarBoton, false)

document.addEventListener("keydown", contarDes, false); 
document.addEventListener("keyup", contarDes, false);
document.addEventListener("keydown", valida_LongitudDes, false);
// *****************************************************************************************************
//FUNCIONES ANONIMAS
// por medio de una función anonima debido a que el evento no esta cargado en el DOM por ser una solicitud Ajax o porque el manejador de eventos se encuentra en otro archivo
document.getElementById('Label_13').addEventListener('click',function(event){ 
    Llamar_categorias()
}, false);

// por medio de una función anonima debido a porque el manejador de eventos se encuentra en otro archivo                   
document.getElementById("Label_1").addEventListener('click', function(){
    CerrarModal_X("Ejemplo_Secciones")
});
//************************************************************************************************   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


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
//************************************************************************************************   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    

//************************************************************************************************
//Añade un nuevo input con una nueva sección cargada desde Categoria_Ajax
   var incremento = 1
    function crearSeccion(){
        console.log("______Desde CrearSección()______")
        
        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_80")
console.log(clonar)
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
            // console.log("______Desde EliminarSeccion()______") 

            //Se obtiene el elemento padre donde se encuentra el boton donde se hizo click
            current = e.target.parentElement
            
            //Se busca el nodo padre que contiene el elemento current
            let elementoPadre = current.parentElement
            
            //Se elimina la sección
            elementoPadre.removeChild(current);  
        }           
    }
//************************************************************************************************   
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    

//************************************************************************************************
    function mostrarSecciones(){
        console.log("______Desde mostrarSecciones()______")
        //Coloca el cursor en el top de la pagina
        document.getElementById("Ejemplo_Secciones").style.display = "grid"

        //Si la resolucion de la pantalla del dispositivo es menor a 880 px
        if(window.screen.width<=800){
            window.scroll(0, 0)
            var tapaFondo = document.getElementById("Contenedor_42")
            
            //Se consulta el alto de la página cuenta_editar_V.php, este tamaño varia segun las secciones que tenga un tienda, cuentas bancarias y categorias
            AltoVitrina = tapaFondo.scrollHeight
            
            //Este alto se estable al div padre en cuenta_editar_V.php para garantizar que cubra todo el contenido, ya que el div que Ejemplo_Secciones es cargado sobreeste
            document.getElementById("Ejemplo_Secciones").style.height = AltoVitrina + "px"
        }
    }   
//************************************************************************************************   
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    

//************************************************************************************************
    //Muestra el menu secundario de enlaces anclas
    function muestraMenuSecundario(){
        document.getElementById("Contenedor_83").style.display = "block"

    }
//************************************************************************************************   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

//************************************************************************************************
    //invocada desde cuenta_editar.php selecciona tres categorias en los tipos de tiendas
    function transferirCategoria(form){
        console.log("______Desde transferirCategoria()______")
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        var TotalCategoria = []

        //Se reciben los elementos del formulario mediante su atributo name
        Categoria = form.categoria

        //Se convierte el parametro recibido en un array
        // var categoria = Categorias.split(',')
        // Se declara el array que contiene las categorias
        var Limite = []
        //Se verifica la cantidad de categorias seleccionadas
        // console.log(Categoria)

            //Se eliminan las categorias que estaban y se colocan las que estan en el array TotalCategoria
            //Se busca el nodo padre que contiene el input donde esta el producto a eliminar
            let DivHijo = document.getElementsByClassName("imput_6js")

            //Se recorre todos los elementos que contengan la clase input_6js para eliminarlos
            Elementos = DivHijo.length
            for(var i = 0; i<Elementos; i++){ 
                // console.log(Elementos) 
                // console.log("Eliminado")

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
           
        // console.log(TotalCategoria.length)
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
            // console.log("Las categorias seleccionadas son")
            // console.log(TotalCategoria)  

            let id_dinamico = 1
            //Se da propiedades a los elementos creados
            for(let i = 0; i<TotalCategoria.length; i++){
                //Se crean los input que cargara la categorias contenidas en el array TotalCategoria
                var NuevoElemento = document.createElement("input")
                
                NuevoElemento.value = TotalCategoria[i] 
                NuevoElemento.classList.add("input_13", "borde_1", "imput_6js")
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
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    

//************************************************************************************************
    // invocada desde Categorias_Ajax_V.php
    function CerrarCategoria(){    
        console.log("______Desde CerrarCategoria()______")    
        document.getElementById("Mostrar_Categorias").style.display = "none"
    }

//************************************************************************************************   
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
    
//************************************************************************************************
    // desabilidad el boton de enviar formulario
    function DesabilitarBoton(){
        console.log("______Desde DesabilitarBoton()______")     
        document.getElementsByClassName("boton_6")[0].value = "Guardando cambios..."
        document.getElementsByClassName("boton_6")[0].disabled = "disabled"
        document.getElementsByClassName("boton_6")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton_6")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton_6")[0].classList.add('borde_1')
        document.getElementsByClassName("boton_6")[0].form.submit()
    }
    
//************************************************************************************************  
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        
//************************************************************************************************
// indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
function contarDes(){
    var max = 40; 
    var cadena = document.getElementById("ContenidoSlo").value; 
    var longitud = cadena.length; 

        if(longitud <= max) { 
             document.getElementById("ContadorSlo").value = max-longitud; 
        } else { 
             document.getElementById("ContenidoSlo").value = cadena.subtring(0, max);
        } 
} 

// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
var contenido_slogan_com = "";    
    function valida_LongitudDes(){  
    var num_caracteres_permitidos = 40;

    //se averigua la cantidad de caracteres escritos
    num_caracteres = document.forms[0].slogan_com.value.length; 

    if(num_caracteres > num_caracteres_permitidos){ 
        document.forms[0].slogan_com.value = contenido_slogan_com; 
    }
    else{ 
        contenido_slogan_com = document.forms[0].slogan_com.value; 
    } 
} 