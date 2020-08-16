//Escucha desde opciones_V.php, archivo que se carga en vitrina_V.php desde Ajax; por medio de delegación de eventos, donde dentro de la función identificas cual fue el objetivo del click, ya sea por id o por clase o por etiqueta según sea tu necesidadtoma la etiqueta span donde se hace click
document.addEventListener('click',function(e){
    if(event.target.tagName.toLowerCase() === 'span'){
        CerrarModal_X('Section_3')
    }
})