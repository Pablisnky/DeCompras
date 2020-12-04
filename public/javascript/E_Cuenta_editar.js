document.getElementById("Label_4").addEventListener('click', nuevaCuentaBancaria, false)

document.getElementById("Label_5").addEventListener('click', clonarSeccion, false)

document.getElementById('Span_1').addEventListener('click', mostrarSecciones, false)

// document.getElementById("Cedula").addEventListener('keyup', function(){formatoMiles(this)})

// document.getElementById("Contenedor_107").addEventListener('click', muestraMenuSecundario, false)

document.addEventListener("keydown", contarDes, false); 
document.addEventListener("keyup", contarDes, false);
document.addEventListener("keydown", valida_LongitudDes, false);
document.addEventListener("keyup", valida_LongitudDes, false); 

// *****************************************************************************************************
//FUNCIONES ANONIMAS
// por medio de una función anonima debido a que el elemento no esta cargado en el DOM por ser una solicitud Ajax o porque el manejador de eventos se encuentra en otro archivo
document.getElementById('Label_13').addEventListener('click',function(){ 
    // console.log("______Desde funcion anonima que genera el alto de la ventana modal()______")
    //Coloca el cursor en el top de la pagina
    // document.getElementById("Ejemplo_Secciones").style.display = "grid"

    window.scroll(0, 0)
    var tapaFondo = document.getElementById("Contenedor_42")
    
    //Se consulta el alto de la página cuenta_editar_V.php, este tamaño varia segun las secciones que tenga un tienda, cuentas bancarias y categorias
    AltoVitrina = tapaFondo.scrollHeight
    
    //Este alto se estable al div padre en cuenta_editar_V.php para garantizar que cubra todo el contenido, ya que el div que Ejemplo_Secciones es cargado sobreeste
    document.getElementById("Mostrar_Categorias").style.height = AltoVitrina + "px"

    Llamar_categorias()
}, false);
//************************************************************************************************ 

// por medio de una función anonima debido a que el manejador de eventos se encuentra en otro archivo                   
document.getElementById("Label_1").addEventListener('click', function(){
    CerrarModal_X("Ejemplo_Secciones")
});

//************************************************************************************************  
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
    //Clona todo el div que contiene los inputs que capturan los datos de una cuenta bancaria
    var iterar = 1
    function nuevaCuentaBancaria(){
        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_67")

        //Se crea el clon
        let Div_clon = clonar.cloneNode(true)
        // console.log(Div_clon)

        //Se da un ID al nuevo elemento clonado
        Div_clon.style.id = iterar  
        iterar++

        //El value de los elementos que estan dentro del nuevo clon debe estar vacio
        Div_clon.getElementsByClassName("input_9JS")[0].value = ""
        Div_clon.getElementsByClassName("input_9JS")[1].value = ""
        Div_clon.getElementsByClassName("input_9JS")[2].value = ""
        Div_clon.getElementsByClassName("input_9JS")[3].value = ""

        //Se especifica el div padre, donde se insertará el nuevo nodo
        //Mostrar_CuentaBancaria = Div padre y Contenedor_67 = Div hijo      
        ElementoPadre = document.getElementById("Mostrar_CuentaBancaria")
        
        //Se especificael elmento que sera la referencia para insertar el nuevo nodo
        let Ref_Ubicacion= document.getElementById("Label_4")
        
        //Se especifica el div padre y la posición donde se insertará el nuevo nodo
        ElementoPadre.insertBefore(Div_clon, Ref_Ubicacion)
    }

//************************************************************************************************  
    //Añade un nuevo input clonado del div secciones
    var incremento = 1
    function clonarSeccion(){
        // console.log("______Desde CrearSección()______")
        
        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_80A")
        // console.log("div a clonar", clonar)
        
        //Contenedor padre
        let Padre = document.getElementById("Contenedor_79")
        // console.log("div padre", Padre)

        //Se crea el clon
        let Div_clon = clonar.cloneNode(true)
        // console.log("div clon", Div_clon)

        //Se da una clase 
        Div_clon.classList = "contenedorUnico"

        //Se da un ID al input que se encuentra en el nuevo elemento clonado
        Div_clon.getElementsByClassName("input_12")[0].id = 'InputClon_' + incremento 
        
        //Se da un name al input que se encuentra en el nuevo elemento clonado
        Div_clon.getElementsByClassName("input_12")[0].name = "seccion[]" 
        
        //Se da un ID al span que se encuentra en el nuevo elemento clonado
        // Div_clon.getElementsByClassName("span_12_js")[0].id = 'SpanClon_' + incremento 
        
        //El valor del nuevo input debe estar vacio
        Div_clon.getElementsByClassName("input_12")[0].value = "" 

        //El placeholder del nuevo input 
        Div_clon.getElementsByClassName("input_12")[0].placeholder="Indica una seccióne"
        
        //Se especifica el div padre, donde se insertará el nuevo nodo (aparecerá de ultimo)
        Padre.appendChild(Div_clon)
        incremento++
    }

//************************************************************************************************ 
    //Elimina los clones de seccion y banco
    function preEliminarSeccion(clase){
        // console.log("______Desde preEliminarSección()______ Recibe:",clase )

        let ConfirmaEleminar = confirm("Se eliminaran todos los productos de esta sección")

        if(ConfirmaEleminar == true){
            console.log("Entra al if")
            //Detectar el boton eliminar al cual se hizo click
            var Eliminar = document.getElementsByClassName(clase)//Se obtienen los botones Eliminar
            var len = Eliminar.length//Se cuentan cuantos botones Eliminar hay 
            console.log("Cantidad de botones \"Eliminar\"", len) 

            var button
            //Si hay solo una sección no entra en el ciclo
            for(var i = 1; i < len; i++){
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
    }

//************************************************************************************************  
//Establece el alto del fondo de la ventana modal para que sea igual a todo el contenido de la ista cuenta_editar_V.php de la tienda en curso
    function mostrarSecciones(){
        // console.log("______Desde mostrarSecciones()______")
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
    //Muestra el menu secundario de enlaces anclas
    function muestraMenuSecundario(){
        document.getElementById("Contenedor_83").style.display = "block"
    }
    
//************************************************************************************************
    //Recibe la categoria selecciona por el afiliado y la coloca dentro de un input nuevo en el formulario de configuracion de tienda
    function transferirCategoria(form){
        // console.log("______Desde transferirCategoria()______")

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

        //Se eliminan las categorias que estaban (En el cliente) y se colocan las que estan en el array TotalCategoria
        //Se buscan los nodos que contienen los input donde estan las categorias a eliminar
        let DivHijo = document.getElementsByClassName("imput_6js")

        //Se recorre todos los elementos que contengan la clase input_6js para eliminarlos, es decir, se borran las categorias que existian (solo si existian)
        Elementos = DivHijo.length
        // console.log("Elementos con la clase imput_6js", Elementos) 
        for(var i = 0; i<Elementos; i++){ 
            // console.log(Elementos) 
            // console.log("Eliminado")

            DivHijo_2 = document.getElementsByClassName("imput_6js")[0]
            // console.log("div_hijo", DivHijo_2)

            let DivPadre = document.getElementById("Contenedor_80js")
            // console.log("div_padre", DivPadre)

            //Finalmente se eliminan las categorias
            DivPadre.removeChild(DivHijo_2);  
        }

        //Se recorren las categorias para verficar cuales estan seleccionadas
        for(var i = 0; i<Categoria.length; i++){
            if(Categoria[i].checked){
                CantidadCategoria = Categoria[i].value 
                TotalCategoria.push(CantidadCategoria)   
            }
        }
           
        // console.log("Categorias seleccionadas", TotalCategoria.length)

        //Se recoge la seleccion enviada desde CantidadCategorias_Ajax_V.php
        Categoria = document.getElementsByClassName("categoria_js")

        //Se verifica que no hayan más de tres categorias selecionadas
        if(TotalCategoria.length <= 2){
            //Se recorren las categorias para verficar cuales estan seleccionadas
            // for(var i = 0; i<Categoria.length; i++){
            // if(Categoria[i].checked){
            //     // Categoria= Categoria[i].value 
            //     Categoria[i].value                  
            //     console.log(Categoria[i].value)        
                                 
            //Se carga la categoria al array, este solo permitie tres elementos
            // Limite.push(Categoria[i].value )
            // console.log("Las categorias seleccionadas son")
            // console.log(TotalCategoria)  

            let id_dinamico = 1
            //Se crean y se dan propiedades a los elementos creados con las nuevas categorias
            for(let i = 0; i<TotalCategoria.length; i++){
                //Se crean los input que cargara la categorias contenidas en el array TotalCategoria
                var NuevoElemento = document.createElement("input")
                // console.log("Nuevo elemento= ", NuevoElemento)
                
                NuevoElemento.value = TotalCategoria[i] 
                NuevoElemento.classList.add("input_13", "borde_1", "imput_6js")
                NuevoElemento.name = "categoria[]"
                NuevoElemento.id = "Input_6js"
                NuevoElemento.readOnly = true

                //Se especifica el elemento donde se va a insertar el nuevo elemento
                var ElementoPadre = document.getElementById("Contenedor_80js")
                // console.log("Elemento padre= ", ElementoPadre)

                //Se inserta en el DOM el input creado
                // inputNuevo = ElementoPadre.appendChild(NuevoElemento) 
                // console.log("Elemento Añadido= ", inputNuevo)

                //Se especifica el elemento que sera la referencia para insertar el nuevo nodo
                let Ref_Ubicacion= document.getElementById("Referencia_2")
                // console.log("Elemento referencia= ", Ref_Ubicacion)
                
                //Se especifica el div padre y la posición donde se insertará el nuevo nodo
                ElementoPadre.insertBefore(NuevoElemento, Ref_Ubicacion)
            }
            id_dinamico++   

            //Se coloca el foco al nuevo elemento
            NuevoElemento.focus()
        }
        else{
            alert("Solo pueden seleccionarse dos categorias")   
            //Se detiene el envio de las categorias y se deja al afiliado en el panel de selección e categorias para que corriga
            return
        }    
        CerrarCategoria('Mostrar_Categorias') 
    }

//************************************************************************************************ 
    // invocada desde Categorias_Ajax_V.php - transferirCategoria() en este archivo
    function CerrarCategoria(id){    
        // console.log("______Desde CerrarCategoria()______")   
        document.getElementById(id).style.display = "none"
        document.getElementsByClassName("imput_6js")[0].focus()  
        
        //Se consulta cuanto scroll vertical tiene el elemento con id = "Input_6js" el numero indica la posición vertical en fondo del viewport
        // console.log("Vertical: ", window.scrollY);
        // window.scrollY arrojo 399 de scroll vertical para el elemento id = "Input_6js"

        //Se da un scroll para que el elemento con el foco no quede al fondo de la pantalla
        window.scroll(0,800)
    }

//************************************************************************************************  
    //Indica la cantidad de caracteres que quedan mientras se escribe el slogan de la tienda
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

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo del el slagan de la tienda
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

//************************************************************************************************
    //Valida el formulario de datos de una tienda        
    function validarDatosTienda(){
        // console.log("_____Desde validarDatosTienda()_____")
        // DATOS AFILIADO
        let NombreAficom = document.getElementById('Nombre_Aficom').value
        let Apellido = document.getElementById('Apellido_Aficom').value      
        let Cedula = document.getElementById('Cedula_Aficom').value  
        let TelefonoAficom = document.getElementById('Telefono_Aficom').value
        let CorreoAficom = document.getElementById('Correo_Aficom').value         
        // DATOS TIENDA
        let NombreTien = document.getElementById('Nombre_Tien').value
        let TelefonoTien = document.getElementById('Telefono_Tien').value
        let Categoria = document.getElementById('Contenedor_80js')    
        // console.log("Cantidad de elementos dentro de \"Contenedor_80js\"", Categoria.childElementCount)
        let Seccion = document.getElementById('Seccion').value    
        let Estado = document.getElementById('Estado_Tien').value  
        let Municipio = document.getElementById('Municipio_Tien').value 
        let Parroquia = document.getElementById('Parroquia_Tien').value
        let Direccion = document.getElementById('Direccion_Tien').value
        // DATOS BANCO
        let Nombre_Banco = document.getElementById('Nombre_Banco').value  
        let Titular_Banco = document.getElementById('Titular_Banco').value 
        let NroCuenta_Banco = document.getElementById('NroCuenta_Banco').value
        let RIF_Banco = document.getElementById('RIF_Banco').value 
        let PagoMovil = document.getElementById('PagoMovil').value

        document.getElementsByClassName("boton")[0].value = "Guardando ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')

        //Patron de entrada solo acepta letras
        let P_Letras = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/

        //Patron de entrada para correos electronicos
        let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if(NombreAficom == "" || NombreAficom.indexOf(" ") == 0 || NombreAficom.length > 20 || P_Letras.test(NombreAficom) == false){
            alert ("Necesita introducir su nombre")
            document.getElementById("Nombre_Aficom").value = ""
            document.getElementById("Nombre_Aficom").focus()
            document.getElementById("Nombre_Aficom").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Apellido == "" || Apellido.indexOf(" ") == 0 || Apellido.length > 20 || P_Letras.test(Apellido) == false){
            alert("Necesita introducir su Apellido")
            document.getElementById("Apellido_Aficom").value = ""
            document.getElementById("Apellido_Aficom").focus()
            document.getElementById("Apellido_Aficom").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Cedula == "" || Cedula.indexOf(" ") == 0 || Cedula.length > 10 || (isNaN(Cedula)) || Cedula<2000000 || Cedula>999999999){
            alert("Introduzca su Cedula")
            document.getElementById("Cedula_Aficom").value = ""
            document.getElementById("Cedula_Aficom").focus()
            document.getElementById("Cedula_Aficom").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(TelefonoAficom == "" || TelefonoAficom.indexOf(" ") == 0 || TelefonoAficom.length > 11 || (isNaN(TelefonoAficom))){
            alert ("Introduzca un Telefono")
            document.getElementById("Telefono_Aficom").value = ""
            document.getElementById("Telefono_Aficom").focus()
            document.getElementById("Telefono_Aficom").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(CorreoAficom == "" || CorreoAficom.indexOf(" ") == 0 || CorreoAficom.length > 70 || P_Correo.test(CorreoAficom) == false){
            alert ("Introduzca un Correo")
            document.getElementById("Correo_Aficom").value = ""
            document.getElementById("Correo_Aficom").focus()
            document.getElementById("Correo_Aficom").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }        
        // else if(Div_AlertaCorreo.childElementCount >= 1){
        //     alert("El correo ya esta registrado")
        //     document.getElementById("CorreoAfiDes").value = ""
        //     document.getElementById("CorreoAfiDes").focus()
        //     document.getElementById("CorreoAfiDes").style.backgroundColor = "var(--Fallos)"
        //     //Se elimina el nodo hijo donde aparece el mensaje del alert
        //     while(Div_AlertaCorreo.firstChild){
        //         Div_AlertaCorreo.removeChild(Div_AlertaCorreo.firstChild);
        //       };
        //     document.getElementsByClassName("boton")[0].value = "Registrarse"
        //     document.getElementsByClassName("boton")[0].disabled = false
        //     document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        //     document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        //     document.getElementsByClassName("boton")[0].classList.remove('borde_1')
        //     return false;
        // }        
        else if(NombreTien == "" || NombreTien.indexOf(" ") == 0 || NombreTien.length > 50 || P_Letras.test(NombreTien) == false){
            alert ("Necesita introducir el nombre de la tienda")
            document.getElementById("Nombre_Tien").value = ""
            document.getElementById("Nombre_Tien").focus()
            document.getElementById("Nombre_Tien").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(TelefonoTien == "" || TelefonoTien.indexOf(" ") == 0 || TelefonoTien.length > 11 || (isNaN(TelefonoTien))){
            alert ("Introduzca un Telefono para la tienda")
            document.getElementById("Telefono_Tien").value = ""
            document.getElementById("Telefono_Tien").focus()
            document.getElementById("Telefono_Tien").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Estado == "" || Estado.indexOf(" ") == 0 || Estado.length > 20 || P_Letras.test(Estado) == false){
            alert ("Necesita introducir el estado")
            document.getElementById("Estado_Tien").value = ""
            document.getElementById("Estado_Tien").focus()
            document.getElementById("Estado_Tien").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Municipio == "" || Municipio.indexOf(" ") == 0 || Municipio.length > 20 || P_Letras.test(Municipio) == false){
            alert ("Necesita introducir el Municipio")
            document.getElementById("Municipio_Tien").value = ""
            document.getElementById("Municipio_Tien").focus()
            document.getElementById("Municipio_Tien").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Parroquia == "" || Parroquia.indexOf(" ") == 0 || Parroquia.length > 20 || P_Letras.test(Parroquia) == false){
            alert ("Necesita introducir la Parroquia")
            document.getElementById("Parroquia_Tien").value = ""
            document.getElementById("Parroquia_Tien").focus()
            document.getElementById("Parroquia_Tien").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Direccion == "" || Direccion.indexOf(" ") == 0 || Direccion.length > 50){
            alert ("Necesita introducir la dirección de la tienda")
            document.getElementById("Direccion_Tien").value = ""
            document.getElementById("Direccion_Tien").focus()
            document.getElementById("Direccion_Tien").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        //Si el div tiene solo dos elemento no se ha agregado ninguna categoria
        else if(Categoria.childElementCount < 4){
            alert("Necesita introducir al menos una categoría")
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')            
            return false;
        }
        else if(Seccion == "" || Seccion.indexOf(" ") == 0 || Seccion.length > 20 || P_Letras.test(Seccion) == false){
            alert ("Necesita introducir al menos una Seccion")
            document.getElementById("Seccion").value = ""
            document.getElementById("Seccion").focus()
            document.getElementById("Seccion").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Nombre_Banco == "" && PagoMovil == ""){
            alert ("Introduzca información de medios de pago")
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }

        if(Nombre_Banco != ""){
            if(Nombre_Banco.indexOf(" ") == 0 || Nombre_Banco.length > 20){
                alert ("Necesita introducir el nombre del banco")
                document.getElementById("Nombre_Banco").value = ""
                document.getElementById("Nombre_Banco").focus()
                document.getElementById("Nombre_Banco").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                document.getElementsByClassName("boton")[0].disabled = false
                document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                return false;
            }
            else if(Titular_Banco == "" || Titular_Banco.indexOf(" ") == 0 || Titular_Banco.length > 20){
                alert ("Necesita introducir el titular de la cuenta bancaria")
                document.getElementById("Titular_Banco").value = ""
                document.getElementById("Titular_Banco").focus()
                document.getElementById("Titular_Banco").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                document.getElementsByClassName("boton")[0].disabled = false
                document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                return false;
            }
            else if(NroCuenta_Banco == "" || NroCuenta_Banco.indexOf(" ") == 0 || NroCuenta_Banco.length > 25 || (isNaN(NroCuenta_Banco))){
                alert ("Introduzca el número de la cuenta bancaria")
                document.getElementById("NroCuenta_Banco").value = ""
                document.getElementById("NroCuenta_Banco").focus()
                document.getElementById("NroCuenta_Banco").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                document.getElementsByClassName("boton")[0].disabled = false
                document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                return false;
            }
            else if(RIF_Banco == "" || RIF_Banco.indexOf(" ") == 0 || RIF_Banco.length > 30){
                alert ("Necesita introducir el RIF/cedula del titular de la cuenta bancaria")
                document.getElementById("RIF_Banco").value = ""
                document.getElementById("RIF_Banco").focus()
                document.getElementById("RIF_Banco").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                document.getElementsByClassName("boton")[0].disabled = false
                document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                return false;
            }
        }

        if(PagoMovil != ""){
            if(PagoMovil.indexOf(" ") == 0 || PagoMovil.length > 14 || (isNaN(PagoMovil))){
            alert ("Introduzca un Telefono para pago movil")
            document.getElementById("PagoMovil").value = ""
            document.getElementById("PagoMovil").focus()
            document.getElementById("PagoMovil").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
            }
        }
    }