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

//Escucha en inicio_V.php                               
document.getElementById("Input_9").addEventListener('keyup', function(){Llamar_buscador(this.value)})
// *****************************************************************************************************
    //Muestra la posicion en pantalla por medio de coordenadas
    // var posicion = document.getElementById('Section_2js').getBoundingClientRect()
    // console.log(posicion.top, posicion.right, posicion.bottom, posicion.left);

    //Actua en header_inicio.php
    function muestraBusqueda(){
        document.getElementById("Busqueda").style.display = "block"
    }
     
    //Actua desde inicio_V.php
    function VerTiendas(Tiendas){
        window.open(`Tiendas_C/index/${Tiendas}`,"_self")
    }
        
    //Busca un pedido segun lo que escriba el usuario en el input
    function Llamar_buscador(nombre){
        var divContenedor = document.getElementById("Buscar_Pedido")//se recibe desde inicio_V.php 
        console.log(divContenedor)       
        var xmlhttp
        if(window.XMLHttpRequest){ //Mozilla, Safari, Chrome...
            xmlhttp = new XMLHttpRequest()
            console.log(xmlhttp)
        } 
        else{ 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
            if(!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP')
                return false
            }
            else{
                alert("Instancia creada exitosamente")
            }     
        }
        if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML = ""
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status === 200){
                    divContenedor.innerHTML = xmlhttp.responseText
                    console.log(xmlhttp.readyState)
                }  
            }          
            document.getElementById("Buscar_Pedido").style.display = "grid"
            xmlhttp.open("GET", "Buscador_C/buscarPedido/" + nombre, true)
            //se envia la informacion cargada en el input al servidor, true, significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send()
        }
    }