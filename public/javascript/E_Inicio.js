document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

//Se cambia el color de la cinta del menu principal
window.addEventListener("scroll",function(){
    //Se consulta la distancia en px del borde superior de la segunda imagen  
    var ProfundidadImagen_2 = document.getElementById("Section_1")
    console.log("Profundidad Imagen_2", ProfundidadImagen_2.getBoundingClientRect().top)
    let A = ProfundidadImagen_2.getBoundingClientRect().top
        
    if(A < 35){
        document.getElementById("MenuResponsive").style.backgroundColor = "rgb(44, 45, 49)" //inferior
        document.getElementById("MenuResponsive").style.transitionDuration = "2s"
        let enlacesMenu = document.querySelectorAll("li a.a_3A")
        for(let i = 0; i < enlacesMenu.length; i++){
            console.log(enlacesMenu[i])
            enlacesMenu[i].style.color = "white"
        }
    }
    else{
        document.getElementById("MenuResponsive").style.backgroundColor = "rgb(206, 203, 222)" //superior
        let enlacesMenu = document.querySelectorAll("li a.a_3A")
        for(let i = 0; i < enlacesMenu.length; i++){
            console.log(enlacesMenu[i])
            enlacesMenu[i].style.color = "black"
        }
    }  
})

// *****************************************************************************************************
    //Por medio de delegación de eventos se controla el alto de los textarea que contienen el nombre del producto, esto es asi debido a que el archivo dondes estan es cargado mediante ajax    
    // document.getElementById('Buscar_Pedido').addEventListener('change', function(event){
    //     console.log("Cambio")
    // }, false); 

// *****************************************************************************************************
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

// *****************************************************************************************************
    //Muestra la posicion en pantalla por medio de coordenadas
    // var posicion = document.getElementById('Section_2js').getBoundingClientRect()
    // console.log(posicion.top, posicion.right, posicion.bottom, posicion.left);

//************************************************************************************************
    //Coloca la lista de categorias de tiendas en el borde superior de la página 
    // function transicionTiendas(){  
    //     // console.log("______Desde transicionTiendas()______")
    //     let C = document.getElementById("Section_1")
    //     let D = document.getElementById("Section_2js")
    //     Coordenada = D.getBoundingClientRect()
        
    //     if(Coordenada.top > 100){
    //         C.style.height = "7%"
    //         document.getElementById("Contenedor_37").style.top = "-30%"
    //         document.getElementById("Contenedor_51").style.top = "-30%"
    //         document.getElementById("Contenedor_88").style.top = "-30%"
    //         document.getElementById("H3_3").style.display = "none"
    //     }
    // }

//************************************************************************************************