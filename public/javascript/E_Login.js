window.addEventListener('DOMContentLoaded', function(){autofocus('Correo')}, false)
document.getElementById("Label_7").addEventListener('click', ReestablecerContrasena, false)

//************************************************************************************************
    //Recupera contraseña olvidada
    function ReestablecerContrasena(){
        document.getElementById("Contenedor_43").style.display = "block";
        autofocus('Input_13_JS');        
    }

//************************************************************************************************ 
    //Impide que se sigan introduciendo caracteres al alcanzar el limite maximo en un elmento; invocado en quienesSomos_V.php - cuenta_publicar_V.php - registroCom_V.php - cuenta_editar_V.php
    var contenidoControlado = "";    
    function valida_LongitudDes(Max, ID_Contenido){
        console.log("______Desde valida_LongitudDes()______", Max + " / "+ ID_Contenido) 
                
        var num_caracteres_permitidos = Max;

        //se averigua la cantidad de caracteres escritos 
        num_caracteresEscritos = document.getElementById(ID_Contenido).value.length

        if(num_caracteresEscritos > num_caracteres_permitidos){ 
            document.getElementById(ID_Contenido).value = contenidoControlado; 
        }
        else{ 
            contenidoControlado = document.getElementById(ID_Contenido).value; 
        } 
    } 

//************************************************************************************************
    //Valida el formulario de login
    function validarLogin(){
        document.getElementsByClassName("boton")[0].value = "Iniciando sesión ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')
        
        let usuario = document.getElementById('Correo').value
        let clave = document.getElementById('Clave').value  
        
        //Patron de entrada para correos electronicos
        let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if(usuario =="" || usuario.indexOf(" ") == 0 || usuario.length > 70 || P_Correo.test(usuario) == false){
            alert ("Correo no valido");
            document.getElementById("Correo").value = "";
            document.getElementById("Correo").focus();
            document.getElementById("Correo").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Entrar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(clave =="" || clave.indexOf(" ") == 0 || clave.length > 20){
            alert ("Introduzca una clave de acceso");
            document.getElementById("Clave").value = "";
            document.getElementById("Clave").focus();
            document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Entrar"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        //Si se superan todas las validaciones la función devuelve verdadero
        return true
    }