document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

//Se cambia el color de la cinta del menu principal
window.addEventListener("scroll",function(){
    //Se consulta la distancia en px del borde superior de la segunda imagen  
    var ProfundidadImagen_2 = document.getElementById("Section_1")
    // console.log("Profundidad Imagen_2", ProfundidadImagen_2.getBoundingClientRect().top)
    let A = ProfundidadImagen_2.getBoundingClientRect().top
        
    if(A < 35){//35 es la altura del header_inicio
        document.getElementById("MenuResponsive").style.backgroundColor = "rgb(44, 45, 49)";
        document.getElementById("MenuResponsive").style.transitionDuration = "1s";
        let enlacesMenu = document.querySelectorAll("li a.a_3A");
        for(let i = 0; i < enlacesMenu.length; i++){
            enlacesMenu[i].style.color = "white";
        }
    }
    else{
        document.getElementById("MenuResponsive").style.backgroundColor = "rgb(206, 203, 222)";
        let enlacesMenu = document.querySelectorAll("li a.a_3A");
        for(let i = 0; i < enlacesMenu.length; i++){
            enlacesMenu[i].style.color = "black";
        }
    }  
})

//************************************************************************************************
    //Muestra el formulario de busqueda
    function muestraBusqueda(){
        document.getElementById("Busqueda").style.display = "block"
    }

//************************************************************************************************
    //Apunta el curso al producto seleccionado en la busqueda, invocada desde buscador_V.php
    function OpcionSeleccionada(ID_Tienda, NombreTienda, Seccion, Opcion, NoNecesario_1){
        // console.log("______Desde OpcionSeleccionada()______")

        window.open(`Vitrina_C/index/${ID_Tienda},${NombreTienda},${Seccion},${Opcion},${NoNecesario_1}`,"_self") 
    }

//************************************************************************************************