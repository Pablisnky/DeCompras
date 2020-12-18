document.getElementById("Asunto").addEventListener('keydown', function(){contarCaracteres('ContadorAsunto','Asunto', 200)}, false)

document.getElementById("Asunto").addEventListener('keydown', function(){valida_LongitudDes(200,'Asunto')}, false)

document.querySelector('#Asunto').addEventListener('keydown', function(){autosize('Asunto')}, false); 

document.addEventListener('DOMContentLoaded', function(){autofocus('Correo')}, false)

document.getElementById("TelefonoUsuario").addEventListener('keyup', function(){mascaraTelefono(this.value, 'TelefonoUsuario')}, false)

document.getElementById("TelefonoUsuario").addEventListener('change', function(){validarFormatoTelefono(this.value,'TelefonoUsuario')}, false)

document.getElementById("Asunto").addEventListener('keydown', function(){blanquearInput('Asunto')}, false)
 
//************************************************************************************************
    //Valida el formulario de contactenos
    function validarContactenos(){
        console.log("_____Desde validarContactenos()_____")

        let Nombre = document.getElementById('NombreUsuario').value
        let Telefono = document.getElementById('TelefonoUsuario').value      
        let Correo = document.getElementById('CorreoUsuario').value  
        let Asunto = document.getElementById('Asunto').value

        document.getElementsByClassName("boton")[0].value = "Enviando..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')

        //Patron de entrada solo acepta letras
        let P_Letras = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/

        //Patron de entrada para correos electronicos
        let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if(Nombre == "" || Nombre.indexOf(" ") == 0 || Nombre.length > 20 || P_Letras.test(Nombre) == false){
            alert("Necesita introducir su nombre")
            document.getElementById("NombreUsuario").value = ""
            document.getElementById("NombreUsuario").focus()
            document.getElementById("NombreUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Enviar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Telefono == "" || Telefono.indexOf(" ") == 0 || Telefono.length > 14){
            alert ("Número de Telefono invalido")
            document.getElementById("TelefonoUsuario").value = ""
            document.getElementById("TelefonoUsuario").focus()
            document.getElementById("TelefonoUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Enviar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70 || P_Correo.test(Correo) == false){
            alert ("Introduzca un Correo")
            document.getElementById("CorreoUsuario").value = ""
            document.getElementById("CorreoUsuario").focus()
            document.getElementById("CorreoUsuario").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Enviar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Asunto == "" || Asunto.indexOf(" ") == 0 || Asunto.length > 200 || P_Letras.test(Asunto) == false){
            alert ("Necesita introducir su Asunto")
            document.getElementById("Asunto").value = ""
            document.getElementById("Asunto").focus()
            document.getElementById("Asunto").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Enviar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
    }