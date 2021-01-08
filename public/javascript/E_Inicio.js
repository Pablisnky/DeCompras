///Escucha por medio de delegación de eventos, para no hacer un listener por cada click en cada contenedor, de esta manera se sabe automaticamente en que contenedor especifico se hizo click,(EL PROBLEMA ES QUE TARDA EN CARGAR) 
// window.addEventListener('click', function(e){
//     Elementos = document.getElementsByClassName("contenedor_6")
//     Cant_Elementos = Elementos.length
//     // console.log("Cantidad de categorias:", Cant_Elementos)
//     // console.log("Click sobre:", e.target.classList)  
//     //NOTA:No se puede obtener directamente el id del elemento "contenedor_6" porque tiene hijos y al hacer click sobre estos devuelve el id de los mismos, por lo tanto se busca el id del elemento padre para asi obtener el id del contenedor de la categoria
//     // console.log("ID elemento click:", e.target.parentNode.id)
//     //Se especifica sobre cuales elementos se puede hacer click para entrar en la categoria seleccionada
//     if(e.target.classList[1] == "span_8" || e.target.classList == "h2_1"){
//         for(i = 0; i < Cant_Elementos; i++){
//             // console.log("CLick efectivo en",e.target.parentNode.id)
//             //Encontrar el elemento donde se hizo click y colocar la función al evento onclick del elemento.
//             Elementos[i].onclick = VerTiendas(e.target.parentNode.id)
//         }
//     }
// }, false);

//DE ESTA MANERA SE TENDRIA QUE LLAMAR A CADA CATEGORIA PARA QUE LA APLICACIÓN RESPONDA MAS RAPIDO
document.getElementById("Comida_Rapida").addEventListener('click', function(){VerTiendas('Comida_Rapida')}, false)

document.getElementById("Mascotas").addEventListener('click', function(){VerTiendas('Mascotas')}, false)

document.getElementById("Merceria").addEventListener('click', function(){VerTiendas('Merceria')}, false)

document.getElementById("Repuesto_automotriz").addEventListener('click', function(){VerTiendas('Repuesto_automotriz')}, false)

document.getElementById("Bodega").addEventListener('click', function(){VerTiendas('Bodega')}, false)

document.getElementById("Minimarket").addEventListener('click', function(){VerTiendas('Minimarket')}, false)

document.getElementById("Material_Medico_Quirurgico").addEventListener('click', function(){VerTiendas('Material_Medico_Quirurgico')}, false)

document.getElementById("Ropa_Zapato").addEventListener('click', function(){VerTiendas('Ropa_Zapato')}, false)

document.getElementById("Artesania").addEventListener('click', function(){VerTiendas('Artesania')}, false)

document.getElementById("Farmacia").addEventListener('click', function(){VerTiendas('Farmacia')}, false)

document.getElementById("Ferreteria").addEventListener('click', function(){VerTiendas('Ferreteria')}, false)

document.getElementById("Panaderia").addEventListener('click', function(){VerTiendas('Panaderia')}, false)

document.getElementById("Licores").addEventListener('click', function(){VerTiendas('Licores')}, false)

document.getElementById("Relojes").addEventListener('click', function(){VerTiendas('Relojes')}, false)

document.getElementById("Deportes").addEventListener('click', function(){VerTiendas('Deportes')}, false)

document.getElementById("Floristeria").addEventListener('click', function(){VerTiendas('Floristeria')}, false)

document.getElementById("Construccion").addEventListener('click', function(){VerTiendas('Construccion')}, false)

document.getElementById("Telefonos").addEventListener('click', function(){VerTiendas('Telefonos')}, false)

document.getElementById("Papeleria").addEventListener('click', function(){VerTiendas('Papeleria')}, false)

document.getElementById("Contenedor_88").addEventListener('click', transicionTiendas, false)

document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

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
    function VerTiendas(Categoria){
        // console.log("_____Desde VerTiendas()_____", Categoria)
        window.open(`Tiendas_C/tiendasEnCatalogo/${Categoria}`,"_self")
    }

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
    function OpcionSeleccionada(ID_Tienda, NombreTienda, Seccion, Opcion, NoNecesario_1){
        // console.log("______Desde OpcionSeleccionada()______")

        window.open(`Vitrina_C/index/${ID_Tienda},${NombreTienda},${Seccion},${Opcion},${NoNecesario_1}`,"_self") 
    }

//************************************************************************************************