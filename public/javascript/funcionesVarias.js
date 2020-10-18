   //Funcion anonima para ocultar el menu principal en responsive haciendo click por fuera del boton menu
    let div = document.getElementById("MenuResponsive")
    let span= document.getElementById("Span_6")
    let B = document.getElementById("Tapa")
    window.addEventListener("click", function(e){
        // console.log("_____Desde función anonima para ocultar menu_____")
        //obtiendo informacion del DOM del elemento donde se hizo click 
        var click = e.target
        // console.log(click)
        AltoVitrina = document.body.scrollHeight
        if((div.style.marginLeft == "0%") && (click != div) && (click != span)){
            div.style.marginLeft = "-48%"
            B.style.display = "none"
            //Se detiene la propagación de los eventos en caso de hacer click en un elemento que contenga algun evento
            event.stopPropagation();
        }
    }, true)

//************************************************************************************************
    //Muestra el menu principal en formato movil y tablet  
    function mostrarMenu(){  
        console.log("______Desde mostrarMenu()______")
        let A = document.getElementById("MenuResponsive")
        let B = document.getElementById("Tapa")

        if(A.style.marginLeft < "0%"){//Se muestra el menu
            A.style.marginLeft = "0%"
            B.style.display = "block"
        }
        else if(A.style.marginLeft = "0%"){//Se oculta el menu
            A.style.marginLeft = "-48%"
            B.style.backgroundColor = "none"
        }
    }

//************************************************************************************************
    //quita el color de fallo en un input y lo deja en su color original
    function blanquearInput(id){
        console.log("______Desde blanquearInput()______")
        document.getElementById(id).style.backgroundColor = "initial"
    }

//************************************************************************************************
    //coloca el cursor en el input automaticamente 
    function autofocus(id){
        console.log("______Desde autofocus()______")
        document.getElementById(id).focus()
        document.getElementById(id).value = ""
    }

//************************************************************************************************
    //invocada desde inicio_V.php - cuenta_productos_V.php - cuenta_editar_V.php
    function CerrarModal_X(id){
        // console.log("______Desde CerrarModal_X()______")
        document.getElementById(id).style.display = "none"
    }

//************************************************************************************************
    //invocada desde funcionesVarias.js 
    function CerrarModal(){
        console.log("______Desde CerrarModal()______") 
        let Z = document.getElementsByClassName("contenedor_15").id = localStorage.getItem('ID_cont_sombreado'); 
        document.getElementById(Z).style.display = "block";
        document.getElementById(Z).style.backgroundColor = "rgb(252, 252, 252)";
        document.getElementById("Mostrar_Opciones").style.display = "none";
        document.getElementsByTagName("html")[0].style.overflow = "visible";
    }

//************************************************************************************************
    //Oculta el div que contiene alert personalizado, invocada desde alert.php
    function ocultar(id){
        console.log("______Desde ocultar()______")
        document.getElementById(id).style.display = "none";
    }

//************************************************************************************************ 
    //Muestra que es una PWA Invocada desde footer.php
    function Documentacion_PWA(){  
        console.log("______Desde Documentacion_PWA()______")    
        window.open("http://localhost/proyectos/PidoRapido/Afiliacion_C/PWA/", "ventana1", "width=1000,height=650,scrollbars=YES");
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