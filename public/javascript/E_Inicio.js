document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

// window.addEventListener("scroll",function(){
//     //Se consulta la distancia en px desde el borde superior de la ventana
//     var ProfundidadBotonRegistrar = document.getElementById("BotonRegistrar")
//     console.log("ProfundidadBotonRegistrar", ProfundidadBotonRegistrar.getBoundingClientRect().top)
//     let A = ProfundidadBotonRegistrar.getBoundingClientRect().top
    
//     //Se consulta la distancia en px desde el borde superior de la ventana
//     var ProfundidadBotonVer = document.getElementById("BotonVer")
//     console.log("ProfundidadBotonVer", ProfundidadBotonVer.getBoundingClientRect().top)
//     let B = ProfundidadBotonVer.getBoundingClientRect().top

    
//     if(A < B){
//         ProfundidadBotonVer.style.position = "relative"
//         ProfundidadBotonVer.style.top = "80%"
//     }
//     else{
//         ProfundidadBotonVer.style.position = "fixed"
//         ProfundidadBotonVer.style.top = "70%"
//     }  
// })
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