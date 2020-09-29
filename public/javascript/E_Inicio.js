document.getElementById("Contenedor_88").addEventListener('click', transicionTiendas, false)

document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

//Escucha en header_inicio.php
document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

document.getElementById("Contenedor_6a").addEventListener('click', function(){VerTiendas('Comida_Rapida')})
                              
document.getElementById("Contenedor_6m").addEventListener('click', function(){VerTiendas('Mascotas')})

// *****************************************************************************************************
    //Muestra la posicion en pantalla por medio de coordenadas
    // var posicion = document.getElementById('Section_2js').getBoundingClientRect()
    // console.log(posicion.top, posicion.right, posicion.bottom, posicion.left);

// *****************************************************************************************************
    //Muestra el formulario de busqueda
    function muestraBusqueda(){
        document.getElementById("Busqueda").style.display = "block"
    }

// *****************************************************************************************************
//Abre en la misma ventana las tiendas que pertenecen a una categoria
    function VerTiendas(Tiendas){
        console.log("_____Desde VerTiendas()_____")
        window.open(`Tiendas_C/index/${Tiendas}`,"_self")
    }

// *****************************************************************************************************
    //coloca el cursor en el input automaticamente (Esta funcion es común, debe estar en funcionesVarias.js cunado ese archivo ya este manejando solo las funciones que le correspondan)
	// function autofocus(input){
    //     console.log("______Desde autofocus()______")
	// 	document.getElementById(input).focus()
	// 	document.getElementById(input).value = ""
    // }

//************************************************************************************************
    //Coloca la lista de categorias de tiendas en el borde superior de la página 
    function transicionTiendas(){  
        // console.log("______Desde transicionTiendas()______")
        let C = document.getElementById("Section_1")
        let D = document.getElementById("Section_2js")
        Coordenada = D.getBoundingClientRect()
        
        if(Coordenada.top > 100){
            C.style.height = "7%"
            document.getElementById("Contenedor_37").style.top = "-30%"
            document.getElementById("Contenedor_51").style.top = "-30%"
            document.getElementById("Contenedor_88").style.top = "-30%"
            document.getElementById("H3_3").style.display = "none"
        }
    }

//************************************************************************************************
    //Apunta el curso al producto seleccionado en la busqueda, invocada desde buscador_V.php
    function OpcionSeleccionada(ID_Tienda, NombreTienda, Seccion, Opcion){
        console.log("______Desde OpcionSeleccionada()______")
        console.log(ID_Tienda)
        console.log(NombreTienda)
        console.log(Seccion)
        console.log(Opcion)

        window.open(`http://localhost/proyectos/PidoRapido/Vitrina_C/index/${ID_Tienda},${NombreTienda},${Seccion},${Opcion}`,"_self") 

        // llamar_Opciones(ID_Tienda, Seccion)
    }

//************************************************************************************************