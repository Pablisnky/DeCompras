document.getElementById("Label_4").addEventListener('click', clonarCuentaBancaria, false)

document.getElementById("Label_7").addEventListener('click', clonarCuentaPagoMovil, false)

document.getElementById("Label_5").addEventListener('click', clonarSeccion, false)

document.getElementById('Span_1').addEventListener('click', mostrarSecciones, false)

document.getElementById("ContenidoSlo").addEventListener('keydown', function(){contarCaracteres('ContadorSlo','ContenidoSlo', 50)}, false)

document.getElementById("ContenidoSlo").addEventListener('keydown', function(){valida_LongitudDes(50,'ContenidoSlo')}, false)

document.getElementById("Direccion_Tien").addEventListener('keydown', function(){contarCaracteres('ContadorDireccion','Direccion_Tien', 50)}, false)

document.getElementById("Direccion_Tien").addEventListener('keydown', function(){valida_LongitudDes(50,'Direccion_Tien')}, false)

document.getElementById("Cedula_Aficom").addEventListener('keyup', function(){formatoMiles(this.value, 'Cedula_Aficom')}, false)

document.getElementById("Telefono_Aficom").addEventListener('keyup', function(){mascaraTelefono(this.value, 'Telefono_Aficom')}, false)

document.getElementById("Telefono_Aficom").addEventListener('change', function(){validarFormatoTelefono(this.value,'Telefono_Aficom')}, false)

document.getElementById("Telefono_Tien").addEventListener('keyup', function(){mascaraTelefono(this.value, 'Telefono_Tien')}, false)

document.getElementById("Telefono_Tien").addEventListener('change', function(){validarFormatoTelefono(this.value,'Telefono_Tien')}, false)
    
//Por medio de delegación de eventos se detecta cada input debido a que son muchos elementos tipo input
document.getElementsByTagName("body")[0].addEventListener('keydown', function(e){
    // console.log("______Desde funcion anonima que aplica listerner a elementos tipo input de PagoMovil______")
    if(e.target.tagName == "INPUT"){
        var ID_Input = e.target.id
        
        document.getElementById(ID_Input).addEventListener('keyup', function(){blanquearInput(ID_Input)}, false)
    } 
}, false)
    
//Por medio de delegación de eventos se detecta la sección a eliminar
window.addEventListener('click', function(e){
    // console.log("______Desde funcion anonima que aplica listerner para eliminar secciones______")

    var ElementoSeleccionado = e.target.id
    // console.log(ElementoSeleccionado)

    if(e.target.classList[2] == "span_14_js"){
        let ConfirmaEliminar = confirm("Se eliminaran todos los productos de esta sección")
        if(ConfirmaEliminar == true){
            
            //Contenedor padre de secciones
            let PadreSecciones = document.getElementById("Contenedor_79")

            //Si hay más de una sección la elimina, si solo hay una borrar el contenido del input
            if(PadreSecciones.childElementCount > 4){
            
                // Se obtiene el elemento padre donde se encuentra el boton donde se hizo click
                current = e.target.parentElement
                // console.log("div a eliminar", current)
                
                //Se busca el nodo padre que contiene el elemento current
                let elementoPadre = current.parentElement
                
                //Se elimina la sección
                elementoPadre.removeChild(current);
            }
            else{
                document.getElementById("Seccion").value = ""
            }
        }  
    }  
}, false)

//Por medio de delegación de eventos debido a que no se sabe cuantas cuentas de PagoMovil se añadieron
ElementoPadrePagoMovil = document.getElementById("Mostrar_PagoMovil")
document.getElementById("Mostrar_PagoMovil").addEventListener('keydown', function(e){ 
    // console.log("______Desde funcion anonima que aplica listerner a input de PagoMovil______")
    var click = e.target

    if(e.target.classList[3] == "cedulaJS"){
        document.getElementById(click.id).addEventListener('keyup', function(){formatoMiles(click.value, click.id)}, false)
    }
    if(e.target.classList[3] == "TelefonoJS"){
        document.getElementById(click.id).addEventListener('keyup', function(){mascaraTelefono(click.value, click.id)}, false)
    }
}, false)

if(document.getElementById("CedulaPagoMovil")){
    // document.getElementById("CedulaPagoMovil").addEventListener('keyup', function(){formatoMiles(this.value, 'CedulaPagoMovil')}, false)

    // document.getElementById("TelefonoPagoMovil").addEventListener('keyup', function(){mascaraTelefono(this.value, 'TelefonoPagoMovil')}, false)
}
// ************************************************************************************************** 
//Cuando carga la página vitrina_V.php se registran listener para el evento clic en toda la ventana, es decir, cada vez que se hace click en esa página se esta llamanado a la función PreEliminarPagoMovil, PreEliminarSeccion y PreEliminarCuentaBanco
// document.addEventListener("DOMContentLoaded", PreEliminarSeccion)
document.addEventListener("DOMContentLoaded", PreEliminarCuentaBanco)
document.addEventListener("DOMContentLoaded", PreEliminarPagoMovil) 
document.addEventListener("DOMContentLoaded", function(){CaracteresAlcanzados('ContenidoSlo','ContadorSlo')}, false)    
document.addEventListener("DOMContentLoaded", function(){CaracteresAlcanzados('Direccion_Tien','ContadorDireccion')}, false) 
 

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
    //Cierra la ventana modal que muestra el ejemplo de secciones                 
    document.getElementById("Label_1").addEventListener('click', function(){
        CerrarModal_X("Ejemplo_Secciones")
    });
 
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
    //Clona todo el div que contiene los inputs que capturan los datos de una cuenta bancaria
    var iterar = 1
    function clonarCuentaBancaria(){
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
        //Mostrar_CuentaBancaria = Div padre y Contenedor_67 = Div hijo      
        ElementoPadre = document.getElementById("Mostrar_CuentaBancaria")
        
        //Se especificael el elemento que sera la referencia para insertar el nuevo nodo
        let Ref_Ubicacion= document.getElementById("Label_4")
        
        //Se especifica el div padre y la posición donde se insertará el nuevo nodo
        ElementoPadre.insertBefore(Div_clon, Ref_Ubicacion)
    }

//************************************************************************************************ 
    //Elimina los clones de Secciones
    function PreEliminarSeccion(e){
        // console.log("______Desde PreEliminarSeccion()______", e)

        // // let ConfirmaEleminar = confirm("Se eliminaran todos los productos de esta sección")

        // // if(ConfirmaEleminar == true){
        //     //Detectar el boton eliminar al cual se hizo click
        //     var SpanEliminar = document.getElementsByClassName('span_14_js')//Se obtienen los botones Eliminar 
        //     var ID_Input = e.target.id
        //     console.log(ID_Input)
        

        //     var len = SpanEliminar.length//Se cuentan cuantos botones Eliminar hay 
        //     // console.log("Cantidad de botones \"Eliminar\"", len) 

        //     var button
        //     for(var i = 0; i < len; i++){
        //         button = SpanEliminar[i]; //Se Encuentra el boton eliminar seleccionado al hacer click
        //         button.onclick = EliminarSeccion // Asignar la función EliminarSeccion() en su evento click.
        //         // console.log("______Boton seleccionado______", SpanEliminar[i]) 
        //     } 

            // function EliminarSeccion(e){   
            //     // console.log("______Desde EliminarSeccion()______") 

            //     //Se obtiene el elemento padre donde se encuentra el boton donde se hizo click
            //     current = e.target.parentElement
            //     // console.log("div a eliminar", current)
                
            //     //Se busca el nodo padre que contiene el elemento current
            //     let elementoPadre = current.parentElement
                
            //     //Se elimina la sección
            //     elementoPadre.removeChild(current);  
            // }  
        // }          
    }

//************************************************************************************************ 
    //Elimina las cuentas de PagoMovil
    function PreEliminarPagoMovil(){
        // console.log("______Desde PreEliminarPagoMovil()______")

        // let ConfirmaEleminar = confirm("Se va a eliminar una cuenta de PagoMovil")

        // if(ConfirmaEleminar == true){
            //Detectar el boton eliminar al cual se hizo click
            var SpanEliminar = document.getElementsByClassName('span_15_js')//Se obtienen los botones Eliminar
            // console.log(SpanEliminar) 

            var len = SpanEliminar.length//Se cuentan cuantos botones Eliminar hay 
            // console.log("Cantidad de botones \"Eliminar\"", len) 

            var button
            for(var i = 0; i < len; i++){
                button = SpanEliminar[i]; //Se Encuentra el boton eliminar seleccionado al hacer click
                button.onclick = EliminarPagoMovil // Asignar la función EliminarPagoMovil() en su evento click.
                // console.log("Boton seleccionado", SpanEliminar[i])                 
            } 

            function EliminarPagoMovil(e){   
                // console.log("______Desde EliminarPagoMovil()______") 
                
                //Se obtienen la cantidad de cuentas PagoMovil que existen
                let Eliminar_CuentaPagoMovil = document.getElementsByClassName('span_15_js')
                // console.log("Cantidad de iconos eliminar", Eliminar_CuentaPagoMovil.length) 
                
                if(Eliminar_CuentaPagoMovil.length == 1){            
                    document.getElementsByClassName("cedulaJS")[0].value = ""
                    document.getElementsByClassName("BancoJS")[0].value = ""
                    document.getElementsByClassName("TelefonoJS")[0].value = ""
                }
                else{
                    //Se obtiene el elemento padre donde se encuentra el boton donde se hizo click
                    current = e.target.parentElement
                    // console.log("div a eliminar", current)
                    
                    //Se busca el nodo padre que contiene el elemento current
                    let elementoPadre = current.parentElement
                    
                    //Se elimina la sección
                    elementoPadre.removeChild(current);  
                }
            } 
        // }          
    }

//************************************************************************************************ 
    //Elimina los clones de Cuentas banco
    function PreEliminarCuentaBanco(){
        // console.log("______Desde PreEliminarCuentaBanco()______")

        // let ConfirmaEleminar = confirm("Se eliminaran todos los productos de esta sección")

        // if(ConfirmaEleminar == true){
            //Detectar el boton eliminar al cual se hizo click
            var SpanEliminar = document.getElementsByClassName('span_16_js')//Se obtienen los botones Eliminar
            // console.log(SpanEliminar) 

            var len = SpanEliminar.length//Se cuentan cuantos botones Eliminar hay 
            // console.log("Cantidad de botones \"Eliminar\"", len) 

            var button
            for(var i = 0; i < len; i++){
                button = SpanEliminar[i]; //Se Encuentra el boton eliminar seleccionado al hacer click
                button.onclick = EliminarCuentaBanco // Asignar la función EliminarCuentaBanco() en su evento click.
                // console.log("______Boton seleccionado______", SpanEliminar[i]) 
            } 

            function EliminarCuentaBanco(e){   
                // console.log("______Desde EliminarCuentaBanco()______") 

                //Se obtienen la cantidad de cuentas bancarias existen
                let Eliminar_CuentaTransferencia = document.getElementsByClassName('span_16_js')
                // console.log("Cantidad de iconos eliminar", Eliminar_CuentaTransferencia.length) 
                
                if(Eliminar_CuentaTransferencia.length == 1){ 
                    let InputsTransferencias = 4
                    for(var i=0; i < InputsTransferencias; i++){           
                        document.getElementsByClassName("input_9JS")[i].value = ""
                    }
                }
                else{
                    //Se obtiene el elemento padre donde se encuentra el boton donde se hizo click
                    current = e.target.parentElement
                    // console.log("div a eliminar", current)
                    
                    //Se busca el nodo padre que contiene el elemento current
                    let elementoPadre = current.parentElement
                    
                    //Se elimina la sección
                    elementoPadre.removeChild(current); 
                } 
            }  
        // }          
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
        
        //Se consulta cuanto scroll vertical tiene el elemento con id = "Input_6js" el numero indica la posición vertical desde el top del viewport
        // console.log("Vertical: ", window.scrollY);
        // window.scrollY arrojo 399 de scroll vertical para el elemento id = "Input_6js"
        // window.onscroll = function(){
        //     console.log("Vertical: " + window.scrollY);
        //     console.log("Horizontal: " + window.scrollX);
          
        //   };

        //Se da un scroll para que el elemento con el foco no quede al fondo de la pantalla
        window.scroll(0,1100)
    }

//************************************************************************************************  
    //Clona todo el div que contiene los inputs que capturan los datos de pagoMovil
    // Calcula cuantas cuentas de PagoMovil existen tomando uno de sus requisitos (Cedula)
    let CuentasPagoMovil = ElementoPadrePagoMovil.getElementsByClassName("cedulaJS")
    // console.log("Cuentas PagoMovil existentes", CuentasPagoMovil.length)

    var iterador = CuentasPagoMovil != 0 ? CuentasPagoMovil.length : 1
    // console.log("Iterador =", iterador)

    function clonarCuentaPagoMovil(){
        // console.log("______Desde clonarCuentaPagoMovil()______")

        //Se verifica que no existan cuentas PagoMovil concampos sin llenar
        for(var i = 0; i < CuentasPagoMovil.length; i++){
            if(document.getElementsByClassName("cedulaJS")[i].value == "" || document.getElementsByClassName("BancoJS")[i].value == "" || document.getElementsByClassName("TelefonoJS")[i].value == ""){
                alert("Aún no completa la cuenta PagoMovil")
                return
            }
        }

        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_68")

        // Se crea el clon
        let Div_clon = clonar.cloneNode(true)
        // console.log(Div_clon)

        //Se da un ID al nuevo elemento clonado
        Div_clon.id = "ID_ClonPagoMovil_" + iterador  

        iterador++

        //El value de los elementos que estan dentro del nuevo clon debe estar vacio
        Div_clon.getElementsByClassName("input_10JS")[0].value = ""
        Div_clon.getElementsByClassName("input_10JS")[1].value = ""
        Div_clon.getElementsByClassName("input_10JS")[2].value = ""
        
        //Se da un id a los elementos que estan dentro del nuevo elemento clonado
        Div_clon.getElementsByClassName("input_10JS")[0].id = "CedulaPagoMovil_" + iterador 
        Div_clon.getElementsByClassName("input_10JS")[1].id = "BancoPagoMovil_" + iterador  
        Div_clon.getElementsByClassName("input_10JS")[2].id = "TelefonoPagoMovil_" + iterador 

        //Se añade una clase a los elementos que estan dentro del nuevo elemento clonado
        Div_clon.getElementsByClassName("input_10JS")[0].classList.add("Cedula_ClonPagoMovil","cedulaJS")
        Div_clon.getElementsByClassName("input_10JS")[1].classList.add("Banco_ClonPagoMovil","BancoJS") 
        Div_clon.getElementsByClassName("input_10JS")[2].classList.add("Telefono_ClonPagoMovil","TelefonoJS") 

        //Se especifica el div padre, donde se insertará el nuevo nodo     
        ElementoPadre = document.getElementById("Mostrar_PagoMovil")
        
        //Se especificael el elemento que sera la referencia para insertar el nuevo nodo
        let Ref_Ubicacion= document.getElementById("Label_7")
        
        //Se especifica el div padre y la posición donde se insertará el nuevo nodo
        ElementoPadre.insertBefore(Div_clon, Ref_Ubicacion)
    }

//************************************************************************************************ 
    //Valida los numero de cedula agregados dinamicamente
    //La variable Verifica es debido a que la funcion validarCedula() es llaada mediante el evente Avandono
    AnunciaAvandono = true
    function validarCedula(id){  
        // console.log("______Desde validarCedula()______", id + " | " + AnunciaAvandono)
        // if(AnunciaAvandono){         
        //     let CedulaPagoMovilDinamica = document.getElementById(id).value 
        //     console.log(CedulaPagoMovilDinamica.length)
        //     if(CedulaPagoMovilDinamica == ("") || CedulaPagoMovilDinamica.indexOf(" ") == 0 || CedulaPagoMovilDinamica.length > 10 || CedulaPagoMovilDinamica.length < 9){
        //         alert ("Introduzca la cedula para pago movil")
        //         document.getElementById(id).value = ""
        //         setTimeout(function(){document.getElementById(id).focus();}, 1);
        //         document.getElementById(id).style.backgroundColor = "var(--Fallos)"
        //         document.getElementsByClassName("boton")[0].value = "Guardar cambios"
        //         document.getElementsByClassName("boton")[0].disabled = false
        //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
        //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
        //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                
        //         AnunciaAvandono = false
        //         console.log(AnunciaAvandono)
        //         return false;
        //     }
        // }
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
        // DATOS CUENTA BANCO
        let Nombre_Banco = document.getElementById('Nombre_Banco').value  
        let Titular_Banco = document.getElementById('Titular_Banco').value 
        let NroCuenta_Banco = document.getElementById('NroCuenta_Banco').value
        let RIF_Banco = document.getElementById('RIF_Banco').value 
        // DATOS PAGOMOVIL (Valida cuando no existen cuentas cargadas en BD)
        if(document.getElementById('CedulaPagoMovil')){
            var Cedula_PagoMovil = document.getElementById('CedulaPagoMovil').value
            var Banco_PagoMovil = document.getElementById('BancoPagoMovil').value
            var Telefono_PagoMovil = document.getElementById('TelefonoPagoMovil').value
        }
        // DATOS PAGOMOVIL (Valida cuando existen cuentas cargadas en BD)
        let Cedula_ClonPagoMovil = document.getElementsByClassName('Cedula_ClonPagoMovil')
        let Banco_ClonPagoMovil = document.getElementsByClassName('Banco_ClonPagoMovil')
        let Telefono_ClonPagoMovil = document.getElementsByClassName('Telefono_ClonPagoMovil')

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
        else if(Cedula == "" || Cedula.indexOf(" ") == 0 || Cedula.length < 9 || Cedula.length > 10){
            alert("Número de cedula invalido")
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
        else if(TelefonoAficom == "" || TelefonoAficom.indexOf(" ") == 0 || TelefonoAficom.length > 14){
            alert ("Número de telefono invalido")
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
        else if(NombreTien == "" || NombreTien.indexOf(" ") == 0 || NombreTien.length > 50){
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
        else if(TelefonoTien == "" || TelefonoTien.indexOf(" ") == 0 || TelefonoTien.length != 14){
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
        else if((Nombre_Banco == "" && Cedula_PagoMovil == "") || (Nombre_Banco == "" && Cedula_ClonPagoMovil.length == 0)){
            alert ("Introduzca información de medios de pago")
            document.getElementsByClassName("boton")[0].value = "Guardar cambios"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        // Valida datos BANCO TRANSFERENCIA
        if(Nombre_Banco != "" || Titular_Banco != "" || NroCuenta_Banco != "" || RIF_Banco != ""){
            if(Nombre_Banco.indexOf(" ") == 0 || Nombre_Banco.length > 40){
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
            else if(Titular_Banco == "" || Titular_Banco.indexOf(" ") == 0 || Titular_Banco.length > 40){
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
        if(Cedula_PagoMovil != "" || Banco_PagoMovil != "" || Telefono_PagoMovil != ""){
            if(Cedula_PagoMovil.indexOf(" ") == 0 || Cedula_PagoMovil.length < 9 || Cedula_PagoMovil.length > 10){
                alert ("Introduzca la cedula para pago movil")
                document.getElementById("CedulaPagoMovil").value = ""
                document.getElementById("CedulaPagoMovil").focus()
                document.getElementById("CedulaPagoMovil").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                document.getElementsByClassName("boton")[0].disabled = false
                document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                return false
            }
            else if(Banco_PagoMovil == "" || Banco_PagoMovil.indexOf(" ") == 0 || Banco_PagoMovil.length > 14){
                alert ("Introduzca Banco para pago movil")
                document.getElementById("BancoPagoMovil").value = ""
                document.getElementById("BancoPagoMovil").focus()
                document.getElementById("BancoPagoMovil").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                document.getElementsByClassName("boton")[0].disabled = false
                document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                return false
            }
            else if(Telefono_PagoMovil == "" || Telefono_PagoMovil.indexOf(" ") == 0 || Telefono_PagoMovil.length != 14){
                alert ("Nº telefonico para pago movil invalido")
                document.getElementById("TelefonoPagoMovil").value = ""
                document.getElementById("TelefonoPagoMovil").focus()
                document.getElementById("TelefonoPagoMovil").style.backgroundColor = "var(--Fallos)"
                document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                document.getElementsByClassName("boton")[0].disabled = false
                document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                return false
            }
        }
            if(Cedula_ClonPagoMovil.length != 0 || Banco_ClonPagoMovil.length != 0 || Telefono_ClonPagoMovil.length != 0){            
                //Se validan los campos cedulas de los clones creados
                for(i=0; i<Cedula_ClonPagoMovil.length; i++){
                    if(Cedula_ClonPagoMovil[i].value == '' || Cedula_ClonPagoMovil[i].length < 9 || Cedula_ClonPagoMovil[i].length > 10){
                        alert("Número de cedula para pago movil invalido")
                        Cedula_ClonPagoMovil[i].focus()
                        Cedula_ClonPagoMovil[i].style.backgroundColor = "var(--Fallos)"
                        document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                        document.getElementsByClassName("boton")[0].disabled = false
                        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                        return false;
                    }
                }
                //Se validan los campos bancos de los clones creados
                for(i=0; i<Banco_ClonPagoMovil.length; i++){
                    if(Banco_ClonPagoMovil[i].value == ''){
                        alert("Banco para pago movil invalido")
                        Banco_ClonPagoMovil[i].focus()
                        Banco_ClonPagoMovil[i].style.backgroundColor = "var(--Fallos)"
                        document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                        document.getElementsByClassName("boton")[0].disabled = false
                        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                        return false;
                    }
                }
            
                //Se validan los campos telefono de los clones creados
                for(i=0; i<Telefono_ClonPagoMovil.length; i++){
                    if(Telefono_ClonPagoMovil[i].value == ''){
                        alert("Introduzca Nº telefonico para pago movil")
                        Telefono_ClonPagoMovil[i].focus()
                        Telefono_ClonPagoMovil[i].style.backgroundColor = "var(--Fallos)"
                        document.getElementsByClassName("boton")[0].value = "Guardar cambios"
                        document.getElementsByClassName("boton")[0].disabled = false
                        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
                        document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
                        document.getElementsByClassName("boton")[0].classList.remove('borde_1')
                        return false;
                    }
                }
            }
    }