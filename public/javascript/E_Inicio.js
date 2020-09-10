//Escucha en header_inicio.php
document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

//Escucha en inicio_V.php                        
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

//Escucha en header_inicio.php
document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)

//Escucha en inicio_V.php                               
document.getElementById("Contenedor_6a").addEventListener('click', function(){VerTiendas('Comida_Rapida')})

//Escucha en inicio_V.php                               
document.getElementById("Contenedor_6b").addEventListener('click', function(){VerTiendas('Supermercado')})

//Escucha en inicio_V.php                               
document.getElementById("Contenedor_6c").addEventListener('click', function(){VerTiendas('Bar')})

//Escucha en inicio_V.php                               
document.getElementById("Contenedor_6e").addEventListener('click', function(){VerTiendas('Productos')})

//Escucha en inicio_V.php                               
document.getElementById("Contenedor_6f").addEventListener('click', function(){VerTiendas('Maquinas')})

// *****************************************************************************************************
    //Muestra la posicion en pantalla por medio de coordenadas
    // var posicion = document.getElementById('Section_2js').getBoundingClientRect()
    // console.log(posicion.top, posicion.right, posicion.bottom, posicion.left);

    function muestraBusqueda(){
        document.getElementById("Busqueda").style.display = "block"
    }

// *****************************************************************************************************
    function VerTiendas(Tiendas){
        console.log("_____Desde VerTiendas()_____")
        window.open(`Tiendas_C/index/${Tiendas}`,"_self")
    }

// *****************************************************************************************************
    //coloca el cursor en el input automaticamente (Esta funcion es común, debe estar en funcionesVarias.js cunado ese archivo ya este manejando solo las funciones que le correspondan)
	function autofocus(input){
        console.log("______Desde autofocus()______")
		document.getElementById(input).focus()
		document.getElementById(input).value = ""
	}