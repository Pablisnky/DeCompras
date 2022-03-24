window.addEventListener('DOMContentLoaded', function(){resize('ContenidoDes')}, false)

document.getElementById("Disponible").addEventListener('click', function(){deshabilitarCantidad('Cantidad')}, false)

document.getElementById("ContenidoDes").addEventListener('keydown', function(){autosize('ContenidoDes')}, false)

document.getElementById("PrecioBolivar").addEventListener('keyup', function(){CambioMonetarioBolivar(this.value, "PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('keyup', function(){CambioMonetarioDolar(this.value, "PrecioBolivar")}, false)

document.getElementById("PrecioBolivar").addEventListener('focus', function(){ReiniciaCampo("PrecioBolivar","PrecioDolar")}, false)

document.getElementById("PrecioDolar").addEventListener('focus', function(){ReiniciaCampo("PrecioBolivar","PrecioDolar")}, false)

//************************************************************************************************
    //Escucha por medio de delegación de eventos debido a que el evento no esta cargado en el DOM por ser una solicitud Ajax   
    document.querySelector('body').addEventListener('click',function(event){  
        // console.log("______Desde función anonima()______")  
        if(event.target.id == 'Span_5'){
            CerrarModal_X('MostrarSeccion')
        }
    }, false);

//************************************************************************************************
    //invocada desde Secciones_Ajax_V.php selecciona una sección donde estará un producto
    // function transferirSeccionActualizarMay(form){        
    //     //Se reciben los elementos del formulario mediante su atributo name
    //     let Seccion = form.secciones;
    //     let ID_Seccion = form.ID_Seccion;
        

    //     //Se recorre todos los elementos para encontrar el que esta seleccionado
    //     for(let i = 0; i<Seccion.length; i++){ 
    //         if(Seccion[i].checked){
    //             //Se toma el valor del seleccionado
    //             SeccionActulizada = Seccion[i].value
    //             ID_SeccionActulizada = ID_Seccion[i].value
    //         }            
    //     } 
    //     //Se transfiere el valor del radio boton seleccionado al input del formulario en cuenta_editar_prodMay_V.php
    //     document.getElementById("Seccion").value = SeccionActulizada
    //     document.getElementById("ID_Seccion").value = ID_SeccionActulizada

    //     //Se coloca el foco en el input sección del formulario
    //     document.getElementById("Seccion").focus()
             
    //     ocultar("MostrarSeccion") 
    // }

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
    //invocada desde modal_SeccionesDIsponiblesMay_V.php selecciona una sección donde estará un producto
    function transferirSeccionMay(form, seccion, id_seccion){
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        // var TotalCategoria = []

        //Se reciben los elementos del formulario mediante su atributo name
        SeccionMay = form.seccionMay
        ID_SeccionMay = form.id_seccion_may

        // console.log(SeccionMay);
        // console.log(ID_SeccionMay)

        //Se recorre todos los elementos para encontrar el que esta seleccionado
        for(var i = 0; i<SeccionMay.length; i++){ 
            if(SeccionMay[i].checked){
                //Se toma el valor del seleccionado
                Seleccionado = SeccionMay[i].value
                ID_SeccionMay = ID_SeccionMay[i].value
            }            
        } 

        //Se transfiere el valor del radio boton seleccionado al input del formulario
        document.getElementById(seccion).value = Seleccionado
        document.getElementById(id_seccion).value = ID_SeccionMay
             
        ocultar("MostrarSeccion") 
    }

//************************************************************************************************
    //Valida el formulario de ediición de producto
    function validarActualizacion(){
        let Producto = document.getElementById('ContenidoPro').value
        let Descripcion = document.getElementById('ContenidoDes').value 
        let ImagenesSecundarias = document.getElementsByClassName('imagen_6')
        let PrecioDolar = document.getElementById('PrecioDolar').value 
        let Seccion = document.getElementById('Seccion').value   
        let Fecha_Dotacion = document.getElementById('Fecha_Dotacion').value 
        let Incremento = document.getElementById('Incremento').value 
        let Fecha_Reposicion = document.getElementById('Fecha_Reposicion').value 
        
        document.getElementsByClassName("boton")[0].value = "Guardando ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')

        if(Producto == "" || Producto.indexOf(" ") == 0 || Producto.length > 55){
            alert ("Necesita introducir un Producto")
            document.getElementById("ContenidoPro").value = "";
            document.getElementById("ContenidoPro").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        else if(Descripcion == "" || Descripcion.indexOf(" ") == 0 || Descripcion.length > 505){
            alert ("Introduzca una Descripcion")
            document.getElementById("ContenidoDes").value = ""
            document.getElementById("ContenidoDes").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        else if(PrecioDolar == "" || PrecioDolar.indexOf(" ") == 0 || PrecioDolar.length > 30){
            alert ("Introduzca un Precio")
            document.getElementById("PrecioDolar").value = ""
            document.getElementById("PrecioDolar").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        else if(Seccion == "" || Seccion.indexOf(" ") == 0 || Seccion.length > 50){
            alert ("Introduzca una Sección")
            document.getElementById("Seccion").value = ""
            document.getElementById("Seccion").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }  
        else if(Fecha_Dotacion == "" || Seccion.indexOf(" ") == 0){
            alert ("Introduzca una fecha de dotación")
            document.getElementById("Fecha_Dotacion").value = ""
            document.getElementById("Fecha_Dotacion").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }          
        else if(Incremento == "" || Seccion.indexOf(" ") == 0){
            alert ("Introduzca el porcentaje de incremento")
            document.getElementById("Incremento").value = ""
            document.getElementById("Incremento").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }    
        else if(Fecha_Reposicion == "" || Seccion.indexOf(" ") == 0){
            alert ("Introduzca una fecha de reposicion")
            document.getElementById("Fecha_Reposicion").value = ""
            document.getElementById("Fecha_Reposicion").focus()
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }    
        else if(ImagenesSecundarias.length > 5){
            alert ("Solo puede introducir 4 imagenes adicionales")
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }        
        //Si el div tiene mas de cinco elementos no permite el envio del formulario
        else if(document.getElementById("muestrasImg").childElementCount > 4){
            alert("Maximo de imagenes alcanzado")
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            
                //Se eliminan las imagenes seleccionada
                document.getElementById("muestrasImg").innerHTML = '';          
            return false;
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }