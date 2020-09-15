 document.addEventListener('DOMContentLoaded', function(){autofocus('Correo')}, false)

 document.getElementById('Submit').addEventListener('click', DesabilitarBoton, false)
//************************************************************************************************
    // desabilidad el boton de enviar formulario
    function DesabilitarBoton(){
        console.log("______Desde DesabilitarBoton()______")     
        document.getElementsByClassName("boton")[0].value = "Iniciando sesión ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].form.submit()
    }