    //Si en la página existe el footer 
    if(document.getElementById('Aplicacion_PWA')){
        document.getElementById('Aplicacion_PWA').addEventListener('click', Documentacion_PWA, false)
    }

//************************************************************************************************
    //obtiendo informacion del DOM para identificar el elemento donde se hizo click 
    window.addEventListener("click", function(e){   
        var click = e.target
        console.log("Se hizo click en: ", click)
    }, false)

//************************************************************************************************
   //Oculta el menu principal en responsive haciendo click por fuera del boton menu
    let div = document.getElementById("MenuResponsive")
    let span= document.getElementById("Span_6")
    let B = document.getElementById("Tapa")
    window.addEventListener("click", function(e){
        // console.log("_____Desde función anonima para ocultar menu_____")
        //obtiendo informacion del DOM del elemento donde se hizo click 
        var click = e.target
        // console.log("Click en: ", click)
        AltoVitrina = document.body.scrollHeight
        if((div.style.marginLeft == "0%") && (click != div) && (click != span)){
            div.style.marginLeft = "-60%"
            B.style.display = "none"
            //Se detiene la propagación de los eventos en caso de hacer click en un elemento que contenga algun evento
            e.stopPropagation();
        }
    }, true)

//************************************************************************************************
    //Muestra el menu principal en formato movil y tablet  
    function mostrarMenu(){  
        // console.log("______Desde mostrarMenu()______")
        let A = document.getElementById("MenuResponsive")
        let B = document.getElementById("Tapa")

        if(A.style.marginLeft < "0%"){//Se muestra el menu
            A.style.marginLeft = "0%"
            B.style.display = "block"
        }
        else if(A.style.marginLeft = "0%"){//Se oculta el menu
            A.style.marginLeft = "-60%"
            B.style.backgroundColor = "none"
        }
    }

//************************************************************************************************
    //Quita el color de fallo en un input y lo deja en su color original
    function blanquearInput(id){        
        // console.log("______Desde blanquearInput()______", id)
        document.getElementById(id).style.backgroundColor = "white"
    }

//************************************************************************************************
    //Coloca el cursor en el input automaticamente 
    function autofocus(id){
        // console.log("______Desde autofocus()______", id)

        //Si el elemento existe
        if(document.getElementById(id)){
            document.getElementById(id).focus()
            document.getElementById(id).value = ""
        }
    }

//************************************************************************************************
    //Invocada desde inicio_V.php - cuenta_productos_V.php - cuenta_editar_V.php
    function CerrarModal_X(id){
        // console.log("______Desde CerrarModal_X()______")
        document.getElementById(id).style.display = "none"
    }

//************************************************************************************************
    //invocada desde funcionesVarias.js 
    function CerrarModal(){
        // console.log("______Desde CerrarModal()______") 
        let Z = document.getElementsByClassName("contenedor_15").id = localStorage.getItem('ID_cont_sombreado'); 
        document.getElementById(Z).style.display = "block";
        document.getElementById(Z).style.backgroundColor = "rgb(252, 252, 252)";
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }

//************************************************************************************************
    //Oculta el div que contiene alert personalizado, invocada desde alert.php
    function ocultar(id){
        // console.log("______Desde ocultar()______")
        document.getElementById(id).style.display = "none";
    }

//************************************************************************************************ 
    //Muestra que es una PWA
    function Documentacion_PWA(){  
        // console.log("______Desde Documentacion_PWA()______")      
        window.open("http://localhost/proyectos/PidoRapido/Menu_C/PWA/", "ventana1", "width=1000,height=650,scrollbars=YES");   
        // window.open("https://www.pedidoremoto.com/Menu_C/PWA", "ventana1", "width=1000,height=650,scrollbars=YES");   
    }

//************************************************************************************************
    //invocada desde pwa_V.php 
    function CerrarModal_2(){
        // console.log("______Desde CerrarModal_2()______")
        window.close() 
    }

//************************************************************************************************
    //Indica la cantidad de caracteres que quedan mientras se escribe; invocado en quienesSomos_V.php - cuenta_publicar_V.php - registroCom_V.php - cuenta_editar_V.php
    function contarCaracteres(ID_Contador, ID_Contenido, Max){
        // console.log("______Desde contarCaracteres()______", ID_Contador + " / " + ID_Contenido + " / " + Max) 
        var max = Max; 
        var cadena = document.getElementById(ID_Contenido).value; 
        var longitud = cadena.length; 

        if(longitud <= max) { 
            document.getElementById(ID_Contador).value = max-longitud; 
        } else { 
            document.getElementById(ID_Contador).value = cadena.subtring(0, max);
        } 
    } 

//************************************************************************************************
    //Indica la cantidad de caracteres que ya tiene el campo; invocado en cuenta_editar_V.php
    function CaracteresAlcanzados(Contenido, ID_Contador){
        // console.log("______Desde CaracteresAlcanzados()______",Contenido + " / " + ID_Contador) 

        var Contenido = document.getElementById(Contenido).value
        var ContadorContenido = document.getElementById(ID_Contador).value

        var CaracteresDisponibles = ContadorContenido - Contenido.length

        document.getElementById(ID_Contador).value = CaracteresDisponibles
    } 

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo en un elmento; invocado en quienesSomos_V.php - cuenta_publicar_V.php - registroCom_V.php - cuenta_editar_V.php
    var contenidoControlado = "";    
    function valida_LongitudDes(Max, ID_Contenido){
        // console.log("______Desde valida_LongitudDes()______", Max + " / "+ ID_Contenido) 
                
        var num_caracteres_permitidos = Max;

        //se averigua la cantidad de caracteres escritos 
        num_caracteresEscritos = document.getElementById(ID_Contenido).value.length

        if(num_caracteresEscritos > num_caracteres_permitidos){ 
            document.getElementById(ID_Contenido).value = contenidoControlado; 
        }
        else{ 
            contenidoControlado = document.getElementById(ID_Contenido).value; 
        } 
    } 

//************************************************************************************************
    //Ajusta la altura del texarea según se vaya escribiendo en el mismo; invocado en quienesSomos_V.php                
    function autosize(id){
        // console.log("______Desde autosize()______", id)
        var el = document.getElementById(id);
        
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

//************************************************************************************************ 
    //ajusta la altura de un texarea con respecto al contenido que trae de la BD
    function resize(id){
        // console.log("______Desde resize()______", id) 
        var text = document.getElementById(id);
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }

//************************************************************************************************
    //Coloca los puntos de miles en tiempo real, a medida que se llena el campo cedula en registroDes_V.php - cuenta_editar_V.php
    function formatoMiles(numero, id){
        // console.log("______Desde formatoMiles()______", numero + " / " + id)

        var num = numero.replace(/\./g,'')
        if(!isNaN(num) && numero.length < 11){
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.')
            num = num.split('').reverse().join('').replace(/^[\.]/,'')
            numero.value = num
            document.getElementById(id).value = num
        }
        else{ 
            alert('Número de cedula invalido')
            document.getElementById(id).value = ""
        }
    }
    
 //************************************************************************************************
    //Mascara de entrada para el telefono, agrega los puntos en tiempo real en tiempo real al llenar el campo    
    function mascaraTelefono(TelefonoRecibido, id){
        console.log("______Desde mascaraTelefono()______", TelefonoRecibido + " / " + id)

        if(TelefonoRecibido.length == 4){
            document.getElementById(id).value += "-"; 
        }
        else if(TelefonoRecibido.length == 8){
            document.getElementById(id).value += ".";  
        }
        else if(TelefonoRecibido.length == 11){
            document.getElementById(id).value += ".";  
        }
        else if(TelefonoRecibido.length >= 15){
            alert("Número telefonico invalido"); 
            document.getElementById(id).value = ""
            return 
        }
    }
     
//************************************************************************************************
    // Validar el formato de telefono
    function validarFormatoTelefono(NroTelefono,id){
        // console.log("______Desde validarFormatoTelefono()______",NroTelefono)

        var P_Telefono = /^\d{4}\-\d{3}\.\d{2}\.\d{2}$/;
            
        if(P_Telefono.test(NroTelefono) == true){            
            // console.log("Telefono con formato correcto");
            return true;
        }
        else{
            alert("Telefono con formato incorrecto");
            document.getElementById(id).value = "";
            document.getElementById(id).focus()
            document.getElementById(id).style.backgroundColor = 'var(--Fallos)'; 
            return false;
        }
    }

//************************************************************************************************ 
    //Realia el cambio de moneda Bolivar a Dolar
    function CambioMonetarioDolar(Monto, id){
        // console.log("______Desde CambioMonetarioDolar______", Monto + " " + id)

        let Bolivar = document.getElementById(id)
        let PrecioDolar = document.getElementById("CambioOficial").value

        let Cambio_Bolivar = Monto * PrecioDolar

        Bolivar.value = Cambio_Bolivar.toFixed(2)
    }
    
//************************************************************************************************
    //Realia el cambio de moneda Dolar a Bolivar
    function CambioMonetarioBolivar(Monto, id){
        // console.log("______Desde CambioMonetarioBolivar______", Monto + " " + id)

        let Dolar = document.getElementById(id)
        let PrecioDolar = document.getElementById("CambioOficial").value
        
        let Cambio_Dolar = Monto / PrecioDolar
       
        Dolar.value = Cambio_Dolar.toFixed(2)
    }
    
//************************************************************************************************
    function ReiniciaCampo(id_1, id_2){
        document.getElementById(id_1).value = ''
        document.getElementById(id_2).value = ''
    }

//************************************************************************************************
    //Coloca la clase "activa" en el item seleccionado del menu 
    // function ActivarLink(id){
        // console.log("______Desde ActivarLink()______") 

        // //Se identifica elemento activo
        // var elemento = document.getElementsByClassName("activo");
        // NumElementos = elemento.length

        // //Se recorrer todos los elementos, y el que tengan la clase "activo"  se le quita
        // for(var i = 0; i < NumElementos; i++){
        //     elemento[i].classList.remove('activo')
        // }

        // //Se añade la clase que resalta "activo" al elemento que se paso por parametro a la función
        // document.getElementById(id).classList.add('activo')
    // }
    
//************************************************************************************************ 