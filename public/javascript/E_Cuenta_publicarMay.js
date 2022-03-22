document.getElementById("Disponible").addEventListener('click', function(){deshabilitarCantidad('Cantidad')}, false)

document.getElementById("PrecioBs").addEventListener('keyup', function(){CambioMonetarioBolivar(this.value, "PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('keyup', function(){CambioMonetarioDolar(this.value, "PrecioBs")}, false)

document.getElementById("PrecioBs").addEventListener('focus', function(){ReiniciaCampo("PrecioBs","PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('focus', function(){ReiniciaCampo("PrecioBs","PrecioDolar")}, false)

document.getElementById("ContenidoPro").addEventListener('keydown', function(){contarCaracteres('ContadorPro','ContenidoPro', 50)}, false)

document.getElementById("ContenidoPro").addEventListener('keydown', function(){valida_LongitudDes(50,'ContenidoPro')}, false)

document.getElementById("ContenidoDes").addEventListener('keydown', function(){contarCaracteres('ContadorDes','ContenidoDes', 500)}, false)

document.getElementById("ContenidoDes").addEventListener('keydown', function(){valida_LongitudDes(500,'ContenidoDes')}, false)  

document.getElementById("ContenidoDes").addEventListener('keydown', function(){autosize('ContenidoDes')}, false)

//************************************************************************************************

///Escucha en cuenta_publicarMay_V.php por medio de delegación de eventos debido ya que el evento no esta cargado en el DOM por ser una solicitud Ajax   
    document.getElementById('Contenedor_80May').addEventListener('click',function(event){    
    if(event.target.id == 'Span_5'){
        CerrarModal_X('MostrarSeccion')
    }
}, false);

//************************************************************************************************
    function CerrarModal_X(id){
        // console.log("______Desde CerrarModal_X()______", id)
        document.getElementById(id).style.display = "none"
    }

//************************************************************************************************
    //Llamada desde cuenta_publicar_V.php
    function mostrarSecciones(){
        document.getElementById("Ejemplo_Secciones").style.display = "grid"
    }   

//************************************************************************************************
//indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
    // function contar(){
    //     var max = 20; 
    //     var cadena = document.getElementById("ContenidoPro").value; 
    //     var longitud = cadena.length; 

    //         if(longitud <= max) { 
    //             document.getElementById("ContadorPro").value = max-longitud; 
    //         } else { 
    //             document.getElementById("ContenidoPro").value = cadena.subtring(0, max);
    //         } 
    // } 

// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
    // var contenido_producto = "";    
    // function valida_Longitud(){  
    //     var num_caracteres_permitidos = 20;

    //     //se averigua la cantidad de caracteres escritos
    //     num_caracteres = document.forms[0].producto.value.length; 

    //     if(num_caracteres > num_caracteres_permitidos){ 
    //         document.forms[0].producto.value = contenido_producto; 
    //     }
    //     else{ 
    //         contenido_producto = document.forms[0].producto.value; 
    //     } 
    // } 

//************************************************************************************************
// indica la cantidad de caracteres que quedan mientra se escribe, llamada desde cuenta_publicar.php
    // function contarDes(){
    //     var max = 20; 
    //     var cadena = document.getElementById("ContenidoDes").value; 
    //     var longitud = cadena.length; 

    //         if(longitud <= max) { 
    //             document.getElementById("ContadorDes").value = max-longitud; 
    //         } else { 
    //             document.getElementById("ContenidoDes").value = cadena.subtring(0, max);
    //         } 
    // } 

// -------------------------------------------------------------------------------------------
    // //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
    // var contenido_descripcion = "";    
    // function valida_LongitudDes(){  
    // var num_caracteres_permitidos = 20;

    // //se averigua la cantidad de caracteres escritos
    // num_caracteres = document.forms[0].descripcion.value.length; 

    // if(num_caracteres > num_caracteres_permitidos){ 
    //     document.forms[0].descripcion.value = contenido_descripcion; 
    // }
    // else{ 
    //     contenido_descripcion = document.forms[0].descripcion.value; 
    // } 
    // } 
    
//************************************************************************************************
    //invocada desde modal_SeccionesDIsponiblesMay_V.php selecciona una sección donde estará un producto
    function transferirSeccionMay(form, id){
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        // var TotalCategoria = []

        //Se reciben los elementos del formulario mediante su atributo name
        SeccionMay = form.seccionMay

        //Se recorre todos los elementos para encontrar el que esta seleccionado
        for(var i = 0; i<SeccionMay.length; i++){ 
            if(SeccionMay[i].checked){
                //Se toma el valor del seleccionado
                Seleccionado = SeccionMay[i].value
            }            
        } 

        //Se transfiere el valor del radio boton seleccionado al input del formulario
        document.getElementById(id).value = Seleccionado
             
        ocultar("MostrarSeccion") 
    }

//************************************************************************************************
    //Valida el formulario de cargar producto
    function validarPublicacion(){
        let Producto = document.getElementById('ContenidoPro').value
        let Descripcion = document.getElementById('ContenidoDes').value 
        // let ImagenPrin = document.getElementById('imgInp').value 
        let PrecioBs = document.getElementById('PrecioBs').value 
        let PrecioDolar = document.getElementById('PrecioDolar').value 
        let Seccion = document.getElementById('SeccionPublicar').value 
        let Fecha_Dotacion = document.getElementById('Fecha_Dotacion').value 
        let Incremento = document.getElementById('Incremento').value 
        let FechaReposicion = document.getElementById('Fecha_Reposicion').value 
        document.getElementsByClassName("boton")[0].value = "Guardando ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')    

        // //Patron de entrada solo acepta numeros
        let P_Numeros = /^[0-9,.]*$/

        //Patron de entrada para archivos de carga permitidos
        // var Ext_Permitidas = /^[.jpg|.jpeg|.png]*$/
        
        //Patron para fechas
        var P_Fecha = /^\d{1,2}\-\d{1,2}\-\d{2,4}$/;
        
        // if(Ext_Permitidas.exec(ImagenPrin) == false || ImagenPrin.size > 2000000){
        //     alert("Introduzca una imagen con extención .jpeg .jpg .png menor a 2 Mb")
        //     document.getElementById("imgInp").value = "";
        //     document.getElementsByClassName("boton")[0].value = "Guardar"
        //     document.getElementsByClassName("boton")[0].disabled = false
        //     document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        //     document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        //     document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        //     return false;
        // }
        if(Producto == "" || Producto.indexOf(" ") == 0 || Producto.length > 55){
            alert ("Necesita introducir un Producto")
            document.getElementById("ContenidoPro").value = "";
            document.getElementById("ContenidoPro").focus()
            document.getElementById("ContenidoPro").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Descripcion == "" || Descripcion.indexOf(" ") == 0 || Descripcion.length > 505){
            alert ("Introduzca una Descripcion")
            document.getElementById("ContenidoDes").value = ""
            document.getElementById("ContenidoDes").focus()
            document.getElementById("ContenidoDes").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(PrecioBs == "" || PrecioBs.indexOf(" ") == 0 || PrecioBs.length > 20 || P_Numeros.test(PrecioBs) == false){
            alert ("Introduzca un Precio (Solo números)")
            document.getElementById("PrecioBs").value = ""
            // document.getElementById("PrecioBs").focus()
            // document.getElementById("PrecioBs").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(PrecioDolar == "" || PrecioDolar.indexOf(" ") == 0 || PrecioDolar.length > 20 || P_Numeros.test(PrecioDolar) == false){
            alert ("Introduzca un Precio (Solo números)")
            document.getElementById("PrecioDolar").value = ""
            document.getElementById("PrecioDolar").focus()
            document.getElementById("PrecioDolar").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Seccion == "" || Seccion.indexOf(" ") == 0 || Seccion.length > 50){
            alert ("Introduzca una Sección")
            document.getElementById("SeccionPublicar").value = ""
            document.getElementById("SeccionPublicar").focus()
            document.getElementById("SeccionPublicar").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }        
        else if(P_Fecha.test(Fecha_Dotacion) == false || Fecha_Dotacion == "" || Fecha_Dotacion.indexOf(" ") == 0){
            alert ("Introduzca la fecha de dotación")
            document.getElementById("Fecha_Dotacion").value = ""
            document.getElementById("Fecha_Dotacion").focus()
            document.getElementById("Fecha_Dotacion").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Incremento == "" || Incremento.indexOf(" ") == 0){
            alert ("Introduzca el porcentaje de incremento")
            document.getElementById("Incremento").value = ""
            document.getElementById("Incremento").focus()
            document.getElementById("Incremento").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        } 
        else if(P_Fecha.test(FechaReposicion) == false || FechaReposicion == "" || FechaReposicion.indexOf(" ") == 0){
            alert ("Introduzca una fecha de reposicion")
            document.getElementById("FechaReposicion").value = ""
            document.getElementById("FechaReposicion").focus()
            document.getElementById("FechaReposicion").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        } 
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }

//************************************************************************************************ 