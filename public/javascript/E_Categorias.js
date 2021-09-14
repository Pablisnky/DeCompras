///Escucha por medio de delegación de eventos, en categoria_V.php
document.getElementById("Cont_Categorias").addEventListener('click', function(e){
    //Se especifica sobre cuales elementos se puede hacer click para entrar en la categoria seleccionada
    if(e.target.classList[2] == "icono_2" || e.target.classList == "h2_1"){
        console.log("Categoria: ", e.target.parentNode.id)
        VerTiendas(e.target.parentNode.id)
    }
}, false);  

// *****************************************************************************************************
    //Abre en la misma ventana las tiendas de una ciudad que pertenecen a una categoria
    function VerTiendas(Categoria){
        window.open(`../../Tiendas_C/tiendasEnCatalogo/${Categoria}`,"_self")
    }