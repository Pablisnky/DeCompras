 document.addEventListener('DOMContentLoaded', function(){autofocus('Correo')}, false)

//  var Validar = document.getElementById('Submit').addEventListener('click', validarLogin, false)  

//************************************************************************************************
    //Valida el formulario
    function validarLogin(){
        console.log("______Desde validarLogin()______")

        document.getElementsByClassName("boton")[0].value = "Iniciando sesión ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        
        let usuario = document.getElementById('Correo').value
        let clave = document.getElementById('Clave').value  
        

        if(usuario =="" || usuario.indexOf(" ") == 0 || usuario.length > 70){
            alert ("Necesita introducir un usuario");
            document.getElementById("Correo").value = "";
            document.getElementById("Correo").focus();
            document.getElementsByClassName("boton")[0].value = "Entrar"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        else if(clave =="" || clave.indexOf(" ") == 0 || clave.length > 20){
            alert ("Introduzca una clave de acceso");
            document.getElementById("Clave").value = "";
            document.getElementById("Clave").focus();
            document.getElementsByClassName("boton")[0].value = "Entrar"
            document.getElementsByClassName("boton")[0].disabled = false
            return false;
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }