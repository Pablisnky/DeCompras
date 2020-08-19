//Escucha en header_inicio.php
document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

//Escucha en inicio_V.php                        
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

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

    //Actua en header_inicio.php
    function muestraBusqueda(){
        document.getElementById("Busqueda").style.display = "block"
    }

// *****************************************************************************************************

    //Actua desde inicio_V.php
    function VerTiendas(Tiendas){
        window.open(`Tiendas_C/index/${Tiendas}`,"_self")
    }

// *****************************************************************************************************