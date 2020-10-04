window.addEventListener('load', function(){autofocus('Nombre')}, false)

//************************************************************************************************
    // desabilidad el boton de enviar formulario
    function validarAfiliacionCom(){
        console.log("_____Desde validarAfiliacionCom()_____")

        let Nombre = document.getElementById('Nombre').value
        let Correo = document.getElementById('CorreoAfiCom').value 
        let NombreTienda = document.getElementById('NombreTienda').value 
        let Clave = document.getElementById('Clave').value 
        let ConfirmarClave = document.getElementById('ConfirmarClave').value 

        document.getElementsByClassName("boton")[0].value = "Creando tienda ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')

        if(Nombre == "" || Nombre.indexOf(" ") == 0 || Nombre.length > 20){
            alert ("Necesita introducir su nombre")
            document.getElementById("Nombre").value = "";
            document.getElementById("Nombre").focus()
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70){
            alert ("Introduzca un Correo")
            document.getElementById("CorreoAfiCom").value = ""
            document.getElementById("CorreoAfiCom").focus()
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(NombreTienda == "" || NombreTienda.indexOf(" ") == 0  || NombreTienda.length > 50){
            alert ("Introduzca un nombre de tienda")
            document.getElementById("NombreTienda").value = ""
            document.getElementById("NombreTienda").focus()
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Clave == "" || Clave.indexOf(" ") == 0 || Clave.length > 70){
            alert ("Introduzca una clave")
            document.getElementById("Clave").value = ""
            document.getElementById("Clave").focus()
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(ConfirmarClave == "" || ConfirmarClave.indexOf(" ") == 0 || ConfirmarClave.length > 70){
            alert ("Introduzca la confirmación de la clave")
            document.getElementById("ConfirmarClave").value = ""
            document.getElementById("ConfirmarClave").focus()
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Clave != ConfirmarClave){
            alert ("La clave no coincide")
            document.getElementById("ConfirmarClave").value = ""
            document.getElementById("ConfirmarClave").focus()
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
    }

//************************************************************************************************
    // desabilidad el boton de enviar formulario
    // function validarAfiliacionDes(){
    //     console.log("_____Desde validarAfiliacionDes()_____")

    //     let Nombre = document.getElementById('Nombre').value
    //     let Apellido = document.getElementById('Apellido').value      
    //     let Correo = document.getElementById('CorreoAfiDes').value  
    //     let Cedula = document.getElementById('Cedula').value
    //     let Telefono = document.getElementById('Telefono').value          
    //     let Clave = document.getElementById('Clave').value 
    //     let ConfirmarClave = document.getElementById('ConfirmarClave').value 

    //     document.getElementsByClassName("boton")[0].value = "Creando cuenta ..."
    //     document.getElementsByClassName("boton")[0].disabled = "disabled"
    //     document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
    //     document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
    //     document.getElementsByClassName("boton")[0].classList.add('borde_1')

    //     if(Nombre == "" || Nombre.indexOf(" ") == 0 || Nombre.length > 20){
    //         alert ("Necesita introducir su nombre")
    //         document.getElementById("Nombre").value = "";
    //         document.getElementById("Nombre").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     if(Apellido == "" || Apellido.indexOf(" ") == 0 || Apellido.length > 20){
    //         alert ("Necesita introducir su Apellido")
    //         document.getElementById("Apellido").value = "";
    //         document.getElementById("Apellido").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70){
    //         alert ("Introduzca un Correo")
    //         document.getElementById("CorreoAfiCom").value = ""
    //         document.getElementById("CorreoAfiCom").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Cedula == "" || Cedula.indexOf(" ") == 0 || Cedula.length > 9 || (isNaN(Cedula)) || Cedula<2000000 || Cedula>999999999){
    //         alert ("Introduzca su Cedula")
    //         document.getElementById("Cedula").value = ""
    //         document.getElementById("Cedula").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Telefono == "" || Telefono.indexOf(" ") == 0 || Telefono.length > 11){
    //         alert ("Introduzca un Telefono")
    //         document.getElementById("Telefono").value = ""
    //         document.getElementById("Telefono").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Clave == "" || Clave.indexOf(" ") == 0 || Clave.length > 70){
    //         alert ("Introduzca una clave")
    //         document.getElementById("Clave").value = ""
    //         document.getElementById("Clave").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(ConfirmarClave == "" || ConfirmarClave.indexOf(" ") == 0 || ConfirmarClave.length > 70){
    //         alert ("Introduzca la confirmación de la clave")
    //         document.getElementById("ConfirmarClave").value = ""
    //         document.getElementById("ConfirmarClave").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Clave != ConfirmarClave){
    //         alert ("La clave no coincide")
    //         document.getElementById("ConfirmarClave").value = ""
    //         document.getElementById("ConfirmarClave").focus()
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    // }

//************************************************************************************************
    //Valida que la contraseña sea de solo letras y numeros
    // function literal_3(){ 
    //     var m = document.getElementById("Clave").value;
    //     var re = /^[\w ]+$/; /*Solo acepta caracrteres alfanumericos la coma se salta el filtro*/
        
    //     if(!re.test(m)){
    //       alert("Solo introduzca letras y numeros en su contraseña");
      
    //           document.getElementById("Clave").value = "";
    //           document.getElementById("Clave").focus();
    //           return false;
    //         }
    //   } 
//************************************************************************************************
    //Impide que se inserte un correo invalido invocada desde registro.php
    function validarFormatoCorreo(){ 
        console.log("_____Desde validarFormatoCorreo()_____")

        campo = event.target;
        var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        
        if(document.getElementById("CorreoAfiCom").style.backgroundColor == "var(--Fallos)"){
        document.getElementById("CorreoAfiCom").value = "";        
        document.getElementById("CorreoAfiCom").style.backgroundColor = "white";
        document.getElementById("CorreoAfiCom").focus();
        }
        else{
        if(emailRegex.test(campo.value)){      
            return true;
        } 
        else{
            alert("Correo no aceptado");      
            document.getElementById("CorreoAfiCom").style.backgroundColor = "var(--Fallos)"; 
            document.getElementById("CorreoAfiCom").value = "";
        }
        }  
    }
    
//---------------------------------------------------------------------------------------------
    //Coloca el campo correo en colr white
    function ColorearCorreo(){
        document.getElementById("CorreoAfiCom").style.backgroundColor = "white";
    }

//---------------------------------------------------------------------------------------------
