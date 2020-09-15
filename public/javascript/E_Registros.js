document.getElementById('Submit').addEventListener('click', DesabilitarBoton, false)

window.addEventListener('load', function(){autofocus('Nombre')}, false)
//************************************************************************************************
    // desabilidad el boton de enviar formulario
    function DesabilitarBoton(){
        document.getElementsByClassName("boton")[0].value = "Creando tienda ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].form.submit()
    }
