document.getElementById("Contenedor_34").addEventListener('click', muestraBusqueda, false)

document.getElementById("Contenedor_34").addEventListener('click', function(){autofocus('Input_9')}, false)
                              
document.getElementById("Span_5").addEventListener('click', function(){CerrarModal_X('Busqueda')})

//obtiendo informacion del DOM para identificar el elemento donde se hizo click 
//     window.addEventListener("click", function(e){   
//         var click = e.target
//         console.log("Se hizo click en: ", click)
//     }, false)

// //Se cambia el color de la cinta del menu principal
// window.addEventListener("scroll",function(){
//     //Se consulta la distancia en px del borde superior de la segunda imagen  
//     var ProfundidadImagen_2 = document.getElementById("ImgPortada_2")
//     // console.log("Profundidad Imagen_2", ProfundidadImagen_2.getBoundingClientRect().top)
//     let A = ProfundidadImagen_2.getBoundingClientRect().top
        
//     if(A < 35){//35 es la altura del header_inicio
//         document.getElementById("MenuResponsive").style.backgroundColor = "rgb(44, 45, 49)";
//         document.getElementById("MenuResponsive").style.transitionDuration = "1s";
//         let enlacesMenu = document.querySelectorAll("li a.a_3A");
//         for(let i = 0; i < enlacesMenu.length; i++){
//             enlacesMenu[i].style.color = "white";
//         }
//     }
//     else{
//         document.getElementById("MenuResponsive").style.backgroundColor = "rgb(206, 203, 222)";
//         let enlacesMenu = document.querySelectorAll("li a.a_3A");
//         for(let i = 0; i < enlacesMenu.length; i++){
//             enlacesMenu[i].style.color = "black";
//         }
//     }  
// })

//************************************************************************************************
//Detecta si se hace scrool hacia abajo para ocultar la cinta del precio del dolar (NO FUNCIONA)
var scrollPos = 0;
    window.addEventListener('scroll', function(){
    if((document.body.getBoundingClientRect()).top > scrollPos){
        document.getElementById("Contenedor_34--p").style.display = "none";
    }
    else{
        scrollPos = (document.body.getBoundingClientRect()).top;
        document.getElementById("Contenedor_34--p").style.display = "block";
    }
});

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
    //Cambia la imagen de portada y los colores de textos y cinta del menu principal
    document.getElementById('Botones_radios').addEventListener('click', function(event){ 
        if(event.target.id == "Portada_1"){ 
            document.getElementById('ImgPortada').style.marginTop = "-0vh";
            document.getElementById('ImgPortada').style.transition = ".5s ease" 
            
            document.getElementById("Contenedor_37").classList.remove('cont_background--titulo-2')
            document.getElementById("Contenedor_37").classList.remove('cont_background--titulo-3')
            document.getElementById("Aplicacion_PWA").classList.remove('cont_background') 
            document.getElementById("MenuResponsive").style.backgroundColor = "rgb(206, 203, 222)";
            document.getElementById("Titulo").classList.remove('font--white')
            document.getElementById("SubTitulo").classList.remove('font--white')
            let enlacesMenu = document.querySelectorAll("li a.a_3A");
            for(let i = 0; i < enlacesMenu.length; i++){
                enlacesMenu[i].style.color = "black";
            }
        }
        else if(event.target.id == "Portada_2"){ 
            // console.log(event.target.id )
            document.getElementById('ImgPortada').style.marginTop = "-100vh";
            document.getElementById('ImgPortada').style.transition = ".5s ease" 
            
            if(window.screen.width>800){
                document.getElementById("Contenedor_37").classList.add('cont_background--titulo-2')
                document.getElementById("Contenedor_37").classList.remove('cont_background--titulo-3')
            }
            document.getElementById("Aplicacion_PWA").classList.add('cont_background') 
            document.getElementById("MenuResponsive").style.backgroundColor = "rgb(44, 45, 49)";
            document.getElementById("MenuResponsive").style.transitionDuration = "1s";
            document.getElementById("Titulo").classList.add('font--white')
            document.getElementById("SubTitulo").classList.add('font--white')
            let enlacesMenu = document.querySelectorAll("li a.a_3A");
            for(let i = 0; i < enlacesMenu.length; i++){
                enlacesMenu[i].style.color = "white";
            }
        }
        else if(event.target.id == "Portada_3"){ 
            document.getElementById('ImgPortada').style.marginTop = "-200vh";
            document.getElementById('ImgPortada').style.transition = ".5s ease" 
            
            if(window.screen.width>800){
                document.getElementById("Contenedor_37").classList.add('cont_background--titulo-3')
                document.getElementById("Contenedor_37").classList.remove('cont_background--titulo-2')                
            }
            document.getElementById("Aplicacion_PWA").classList.remove('cont_background') 
            document.getElementById("MenuResponsive").style.backgroundColor = "rgb(225, 220, 216)";
            document.getElementById("MenuResponsive").style.transitionDuration = "1s";
            document.getElementById("Titulo").classList.remove('font--white')
            document.getElementById("SubTitulo").classList.remove('font--white')
            let enlacesMenu = document.querySelectorAll("li a.a_3A");
            for(let i = 0; i < enlacesMenu.length; i++){
                enlacesMenu[i].style.color = "black";
            }
        }
    }, false); 
    