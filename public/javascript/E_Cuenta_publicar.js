// document.addEventListener('DOMContentLoaded', function(){autofocus('ContenidoPro')}, false)

document.getElementById("Label_5").addEventListener('click', AgregarCaracteristica, false)

document.getElementById("ContenidoPro").addEventListener('keydown', function(){contarCaracteres('ContadorPro','ContenidoPro', 50)}, false)

document.getElementById("ContenidoPro").addEventListener('keydown', function(){valida_LongitudDes(50,'ContenidoPro')}, false)

document.getElementById("ContenidoDes").addEventListener('keydown', function(){contarCaracteres('ContadorDes','ContenidoDes', 50)}, false)

document.getElementById("ContenidoDes").addEventListener('keydown', function(){valida_LongitudDes(50,'ContenidoDes')}, false)  

// document.addEventListener("keydown", contarDes, false); 
// document.addEventListener("keyup", contarDes, false);
// document.addEventListener("keydown", valida_LongitudDes, false);//valida_Longitud() se encuentra en Funciones_varias.js 
// document.addEventListener("keyup", valida_LongitudDes, false);//valida_Longitud() se encuentra en 

// document.addEventListener("keydown", contar, false);//contar() se encuentra en Funciones_varias.js 
// document.addEventListener("keyup", contar, false);//contar() se encuentra en Funciones_varias.js 
// document.addEventListener("keydown", valida_Longitud, false);//valida_Longitud() se encuentra en Funciones_varias.js 
// document.addEventListener("keyup", valida_Longitud, false);//valida_Longitud() se encuentra en 
//************************************************************************************************

///Escucha en cuenta_publicar_V.php por medio de delegación de eventos debido ya que el evento no esta cargado en el DOM por ser una solicitud Ajax   
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
    //invocada desde cuenta_publicar.php selecciona una sección donde estará un producto
    function transferirSeccion(form, id){
        console.log("______Desde transferirSeccion()______")
        //Se declara el array que contendra la cantidad de categorias seleccionadas
        // var TotalCategoria = []

        //Se reciben los elementos del formulario mediante su atributo name
        Seccion = form.seccion

        //Se recorre todos los elementos para encontrar el que esta seleccionado
        for(var i = 0; i<Seccion.length; i++){ 
            if(Seccion[i].checked){
                //Se toma el valor del seleccionado
                Seleccionado = Seccion[i].value
            }            
        } 

        //Se transfiere el valor del radio boton seleccionado al input del formulario
        document.getElementById(id).value = Seleccionado
             
        ocultar("MostrarSeccion") 
    }

//************************************************************************************************
    //Valida el formulario de cargar producto
    function validarPublicacion(){
        //console.log("______Desde validarPublicacion()______")

        let Producto = document.getElementById('ContenidoPro').value
        let Descripcion = document.getElementById('ContenidoDes').value 
        let ImagenPrin = document.getElementById('imgInp').value 
        let Precio = document.getElementById('Precio').value 
        let Seccion = document.getElementById('SeccionPublicar').value 
        
        document.getElementsByClassName("boton")[0].value = "Guardando ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')

        //Patron de entrada solo acepta letras
        let P_Numeros = /^[0-9]*$/

        //Patron de entrada para archivos de carga permitidos
        var Ext_Permitidas = /^[.jpg|.jpeg|.png]*$/
        
        if(Ext_Permitidas.exec(ImagenPrin) == false || ImagenPrin.size > 20000){
            alert("Introduzca una imagen con extención .jpeg .jpg .png menor a 20 Mb")
            document.getElementById("imgInp").value = "";
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Producto == "" || Producto.indexOf(" ") == 0 || Producto.length > 50){
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
        else if(Descripcion == "" || Descripcion.indexOf(" ") == 0 || Descripcion.length > 50){
            alert ("Introduzca una Descripcion")
            document.getElementById("ContenidoDes").value = ""
            document.getElementById("ContenidoDes").focus()
            document.getElementById("DireccionContenidoDes_Tien").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Precio == "" || Precio.indexOf(" ") == 0 || Precio.length > 20 || P_Numeros.test(Precio) == false){
            alert ("Introduzca un Precio, (Solo números)")
            document.getElementById("Precio").value = ""
            document.getElementById("Precio").focus()
            document.getElementById("Precio").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Seccion == "" || Seccion.indexOf(" ") == 0 || Seccion.length > 20){
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
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }
    
//************************************************************************************************
    //Muestra el div para ampliar informacicón del producto
    Desplegado = false
    function AmpliarDescripcion(){
        if(Desplegado == false){
            document.getElementById("Contenedor_128").style.display = "block"
            Desplegado = true
        }
        else{
            document.getElementById("Contenedor_128").style.display = "none"
            Desplegado = false
        }
    }

//************************************************************************************************
    //Añade un nuevo input para crear una nueva caracteristica del producto
    var incremento = 1
    function AgregarCaracteristica(){
        console.log("______Desde AgregarCaracteristica()______")
        
        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_82")

        //Contenedor padre
        let Padre = document.getElementById("Contenedor_128")
        console.log("div padre", Padre)

        //Se crea el clon
        let Div_clon = clonar.cloneNode(true)
        console.log("div clon", Div_clon)

        //Se da un ID al input que se encuentra en el nuevo elemento clonado
        Div_clon.getElementsByClassName("caract_js")[0].id = 'InputClon_' + incremento 
                
        //El valor del nuevo input debe estar vacio
        Div_clon.getElementsByClassName("caract_js")[0].value = "" 

        //El placeholder del nuevo input 
        Div_clon.getElementsByClassName("caract_js")[0].placeholder="Nueva caracteristica del producto "
        
        //Se indica el elemento que sera referencia para insertar el nuevo nodo
        let BotonAgregar = document.getElementById("Label_5")

        //Se especifica el div padre y la posición donde se insertará el nuevo nodo
        Padre.insertBefore(Div_clon, BotonAgregar)
        incremento++
    }

//************************************************************************************************ 
    //Elimina imagenes previsualizadas
    function EliminarImagenSecundaria(Etiqueta, SeleccionImagenes){
        console.log("______Desde EliminarImagenSecundaria______", Etiqueta + " / " + SeleccionImagenes)
        
        console.log("Array imagenes seleccionadas= ", SeleccionImagenes)
        //Se elimina un elemento del array que contiene las imagenes para evitar que se inserten más de cinco
        b = 1
        SeleccionImagenes.reduce((a, b) => a + b)
        console.log("Array imagenes seleccionadas= ", SeleccionImagenes)
        






        //Se busca el id de la etiqueta donde se hizo click
        let ID_Etiqueta = Etiqueta.id
        console.log(ID_Etiqueta)

        //Se busca la imagen que corresponde a la etiqueta "Eliminar" donde se hizo click
        imagen = document.getElementById(ID_Etiqueta).previousSibling
        console.log(imagen)

        //Detectar la imagen que acompaña la etiqueta
        // let ImagenEliminar = document.getElementById(ID_Imagen)
        // console.log(ImagenEliminar)
        // console.log(EtiquetaEliminar)
                
        //Se busca el nodo padre que contiene la imagen y la etiqueta a eliminar
        let PadreImagen = imagen.parentElement
        // let PadreEtiqueta = EtiquetaEliminar.parentElement
            
        //Se elimina la imagen
        PadreImagen.removeChild(imagen);  
        PadreImagen.removeChild(Etiqueta);
    }
    
//************************************************************************************************