//Escucha en cuenta_publicar_V.php                          
// document.getElementById("Label_1").addEventListener('click', function(){
//     // CerrarModal_X("Ejemplo_Secciones")
//     console.log("ENTRO")
// }); 

document.addEventListener("keydown", contarDes, false); 
document.addEventListener("keyup", contarDes, false);
document.addEventListener("keydown", valida_LongitudDes, false);//valida_Longitud() se encuentra en Funciones_varias.js 
document.addEventListener("keyup", valida_LongitudDes, false);//valida_Longitud() se encuentra en 
document.addEventListener("keydown", contar, false);//contar() se encuentra en Funciones_varias.js 
document.addEventListener("keyup", contar, false);//contar() se encuentra en Funciones_varias.js 
document.addEventListener("keydown", valida_Longitud, false);//valida_Longitud() se encuentra en Funciones_varias.js 
document.addEventListener("keyup", valida_Longitud, false);//valida_Longitud() se encuentra en 
//************************************************************************************************

//Escucha en cuenta_publicar_V.php por medio de delegación de eventos debido a que el evento no esta cargado en el DOM por ser una solicitud Ajax   
document.getElementById('Contenedor_80').addEventListener('click',function(event){    
    if(event.target.id == 'Span_5'){
        CerrarModal_X('MostrarSeccion')
    }
}, false);

//************************************************************************************************
    //Llamada desde cuenta_publicar_V.php
    function mostrarSecciones(){
        document.getElementById("Ejemplo_Secciones").style.display = "grid"
    }   

//************************************************************************************************
//indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
function contar(){
    var max = 20; 
    var cadena = document.getElementById("ContenidoPro").value; 
    var longitud = cadena.length; 

        if(longitud <= max) { 
             document.getElementById("ContadorPro").value = max-longitud; 
        } else { 
             document.getElementById("ContenidoPro").value = cadena.subtring(0, max);
        } 
} 

// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
var contenido_producto = "";    
function valida_Longitud(){  
    var num_caracteres_permitidos = 20;

    //se averigua la cantidad de caracteres escritos
    num_caracteres = document.forms[0].producto.value.length; 

    if(num_caracteres > num_caracteres_permitidos){ 
        document.forms[0].producto.value = contenido_producto; 
    }
    else{ 
        contenido_producto = document.forms[0].producto.value; 
    } 
} 

//************************************************************************************************
// indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
function contarDes(){
    var max = 20; 
    var cadena = document.getElementById("ContenidoDes").value; 
    var longitud = cadena.length; 

        if(longitud <= max) { 
             document.getElementById("ContadorDes").value = max-longitud; 
        } else { 
             document.getElementById("ContenidoDes").value = cadena.subtring(0, max);
        } 
} 

// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
var contenido_descripcion = "";    
    function valida_LongitudDes(){  
    var num_caracteres_permitidos = 20;

    //se averigua la cantidad de caracteres escritos
    num_caracteres = document.forms[0].descripcion.value.length; 

    if(num_caracteres > num_caracteres_permitidos){ 
        document.forms[0].descripcion.value = contenido_descripcion; 
    }
    else{ 
        contenido_descripcion = document.forms[0].descripcion.value; 
    } 
} 
//************************************************************************************************
    //invocada desde cuenta_publicar.php selecciona una sección donde estará un producto
    function transferirSeccionActualizar(form){
        console.log("______Desde transferirSeccion()______")
        
        //Se reciben los elementos del formulario mediante su atributo name
        Seccion = form.secciones
        ID_Seccion = form.ID_Seccion
        
        //Se recorre todos los elementos para encontrar el que esta seleccionado
        for(var i = 0; i<Seccion.length; i++){ 
            if(Seccion[i].checked){
                //Se toma el valor del seleccionado
                SeccionActulizada = Seccion[i].value
                ID_SeccionActulizada = ID_Seccion[i].value
            }            
        } 

        //Se transfiere el valor del radio boton seleccionado al input del formulario en cuenta_editar_prod_V.php
        document.getElementById("Seccion").value = SeccionActulizada
        document.getElementById("ID_Seccion").value = ID_SeccionActulizada
             
        ocultar("MostrarSeccion") 
    }

//************************************************************************************************ 
    //invocada desde cuenta_publicar.php selecciona una sección donde estará un producto
    function transferirSeccion(form){
        console.log("______Desde transferirSeccion()______")
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        // var TotalCategoria = []
        //Se reciben los elementos del formulario mediante su atributo name
        Seccion = form.seccion

        //Se recorre todos los elementos para encontrar el que esta seleccionado
        for(var i = 0; i<Seccion.length; i++){ 
            if(Seccion[i].checked){
                //Se toma el valor del seleccionado
                Seccion = Seccion[i].value
            }            
        } 

        //Se transfiere el valor del radio boton seleccionado al input del formulario
        document.getElementById("Seccion").value = Seccion
             
        ocultar("MostrarSeccion") 
    }

//************************************************************************************************
    //Valida el formulario
    function validarActualizacion(){
        console.log("______Desde validarActualizacion()______")

        let Producto = document.getElementById('ContenidoPro').value
        let Descripcion = document.getElementById('ContenidoDes').value 
        let Especificacion = document.getElementById('ContenidoEsp').value 
        let Precio = document.getElementById('Precio').value 
        let Seccion = document.getElementById('Seccion').value   
        
        document.getElementsByClassName("boton")[0].value = "Guardando ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')

        if(Producto == "" || Producto.indexOf(" ") == 0 || Producto.length > 20){
            alert ("Necesita introducir un Producto")
            document.getElementById("ContenidoPro").value = "";
            document.getElementById("ContenidoPro").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        else if(Descripcion == "" || Descripcion.indexOf(" ") == 0 || Descripcion.length > 20){
            alert ("Introduzca una Descripcion")
            document.getElementById("ContenidoDes").value = ""
            document.getElementById("ContenidoDes").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        // else if(Especificacion == "" || Especificacion.indexOf(" ") == 0 || Especificacion.length > 20){
        //     alert ("Introduzca una Especificacion")
        //     document.getElementById("ContenidoEsp").value = ""
        //     document.getElementById("ContenidoEsp").focus()
        //     document.getElementsByClassName("boton")[0].value = "Guardar"
        //     document.getElementsByClassName("boton")[0].disabled = false
        //     return false;
        // }
        else if(Precio == "" || Precio.indexOf(" ") == 0 || Precio.length > 20){
            alert ("Introduzca un Precio")
            document.getElementById("Precio").value = ""
            document.getElementById("Precio").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        else if(Seccion == "" || Seccion.indexOf(" ") == 0 || Seccion.length > 20){
            alert ("Introduzca una Sección")
            document.getElementById("Seccion").value = ""
            document.getElementById("Seccion").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }
    
//************************************************************************************************