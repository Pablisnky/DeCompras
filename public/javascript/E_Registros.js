document.getElementById('Submit').addEventListener('click', DesabilitarBoton, false)

window.addEventListener('load', function(){autofocus('Nombre')}, false)

//************************************************************************************************
    //Activar la tecla enter para enviar formularios(esto debido a que no se esta usando tipo submit)
    window.addEventListener("keydown", (evento) => {
        console.log("______Desde enviar formulario con tecla Enter()______")

        DesabilitarBoton()
        
        if(evento.key == "Enter"){
            document.formRegistroCom.submit();
        }
    });

//************************************************************************************************
    // desabilidad el boton de enviar formulario
    function DesabilitarBoton(){
        document.getElementsByClassName("boton")[0].value = "Creando tienda ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].form.submit()
    }

//************************************************************************************************