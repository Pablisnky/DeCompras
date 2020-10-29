window.addEventListener('load', function(){autofocus('Nombre')}, false)

//************************************************************************************************
    //Validar el formulario de afiliación de comerciante
    function validarAfiliacionCom(){
        // console.log("_____Desde validarAfiliacionCom()_____")
        
        let Nombre = document.getElementById('Nombre').value
        let Correo = document.getElementById('CorreoAfiCom').value 
        let NombreTienda = document.getElementById('NombreTienda').value 
        let Clave = document.getElementById('Clave').value 
        let ConfirmarClave = document.getElementById('ConfirmarClave').value  
        let Div_AlertaClave = document.getElementById('Mostrar_verificaClave')
        let Div_AlertaCorreo = document.getElementById('Mostrar_verificaCorreo')
        
        document.getElementsByClassName("boton")[0].value = "Creando tienda ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')
        
        //Patron de entrada solo acepta letras
        let P_Letras = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/

        //Patron de entrada para correos electronicos
        let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        // Patron de entrada solo acepta numeros y letras
        // let P_LetrasNumero = /[A-Za-z0-9]/;
                
        if(Nombre == "" || Nombre.indexOf(" ") == 0 || Nombre.length > 20 || P_Letras.test(Nombre) == false){
            alert ("Necesita introducir su nombre")
            document.getElementById("Nombre").value = ""
            document.getElementById("Nombre").focus()
            document.getElementById("Nombre").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70 || P_Correo.test(Correo) == false){
            alert ("Introduzca un correo valido")
            document.getElementById("CorreoAfiCom").value = ""
            document.getElementById("CorreoAfiCom").focus()
            document.getElementById("CorreoAfiCom").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(NombreTienda == "" || NombreTienda.indexOf(" ") == 0  || NombreTienda.length > 50 || P_Letras.test(NombreTienda) == false){
            alert ("Introduzca un nombre de tienda")
            document.getElementById("NombreTienda").value = ""
            document.getElementById("NombreTienda").focus()
            document.getElementById("NombreTienda").style.backgroundColor = "var(--Fallos)"
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
            document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
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
            document.getElementById("ConfirmarClave").style.backgroundColor = "var(--Fallos)"
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
            document.getElementById("ConfirmarClave").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Crear tienda"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Div_AlertaClave.childElementCount >= 1){
            alert("La clave no es permitida")
            document.getElementById("Clave").value = ""
            document.getElementById("Clave").focus()
            document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
            document.getElementById("ConfirmarClave").value = ""
            //Se elimina el nodo hijo donde aparece el mensaje del alert
            while(Div_AlertaClave.firstChild){
                Div_AlertaClave.removeChild(Div_AlertaClave.firstChild);
              };
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Div_AlertaCorreo.childElementCount >= 1){
            alert("El correo ya esta registrado")
            document.getElementById("CorreoAfiCom").value = ""
            document.getElementById("CorreoAfiCom").focus()
            document.getElementById("CorreoAfiCom").style.backgroundColor = "var(--Fallos)"
            //Se elimina el nodo hijo donde aparece el mensaje del alert
            while(Div_AlertaCorreo.firstChild){
                Div_AlertaCorreo.removeChild(Div_AlertaCorreo.firstChild);
              };
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
    }
    
//************************************************************************************************
    //Valida el formulario de afiliació de despachador
    function validarAfiliacionDes(){
        console.log("_____Desde validarAfiliacionDes()_____")

        let Nombre = document.getElementById('Nombre').value
        let Apellido = document.getElementById('Apellido').value      
        let Correo = document.getElementById('CorreoAfiDes').value  
        let Cedula = document.getElementById('Cedula').value
        let Telefono = document.getElementById('Telefono').value          
        let Clave = document.getElementById('Clave').value 
        let ConfirmarClave = document.getElementById('ConfirmarClave_AfiDes').value 
        let Div_AlertaClave = document.getElementById('Mostrar_verificaClave')
        let Div_AlertaCorreo = document.getElementById('Mostrar_verificaCorreo')

        document.getElementsByClassName("boton")[0].value = "Creando cuenta ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')

        //Patron de entrada solo acepta letras
        let P_Letras = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/

        //Patron de entrada para correos electronicos
        let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

        if(Nombre == "" || Nombre.indexOf(" ") == 0 || Nombre.length > 20 || P_Letras.test(Nombre) == false){
            alert ("Necesita introducir su nombre")
            document.getElementById("Nombre").value = ""
            document.getElementById("Nombre").focus()
            document.getElementById("Nombre").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        if(Apellido == "" || Apellido.indexOf(" ") == 0 || Apellido.length > 20 || P_Letras.test(Nombre) == false){
            alert ("Necesita introducir su Apellido")
            document.getElementById("Apellido").value = ""
            document.getElementById("Apellido").focus()
            document.getElementById("Apellido").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Cedula == "" || Cedula.indexOf(" ") == 0 || Cedula.length > 9 || (isNaN(Cedula)) || Cedula<2000000 || Cedula>999999999){
            alert ("Introduzca su Cedula")
            document.getElementById("Cedula").value = ""
            document.getElementById("Cedula").focus()
            document.getElementById("Cedula").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Telefono == "" || Telefono.indexOf(" ") == 0 || Telefono.length > 14){
            alert ("Introduzca un Telefono")
            document.getElementById("Telefono").value = ""
            document.getElementById("Telefono").focus()
            document.getElementById("Telefono").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70 || P_Correo.test(Correo) == false){
            alert ("Introduzca un Correo")
            document.getElementById("CorreoAfiDes").value = ""
            document.getElementById("CorreoAfiDes").focus()
            document.getElementById("CorreoAfiDes").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
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
            document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(ConfirmarClave == "" || ConfirmarClave.indexOf(" ") == 0 || ConfirmarClave.length > 70){
            alert ("Introduzca la confirmación de la clave")
            document.getElementById("ConfirmarClave_AfiDes").value = ""
            document.getElementById("ConfirmarClave_AfiDes").focus()
            document.getElementById("ConfirmarClave_AfiDes").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Clave != ConfirmarClave){
            alert ("La clave no coincide")
            document.getElementById("ConfirmarClave_AfiDes").value = ""
            document.getElementById("ConfirmarClave_AfiDes").focus()
            document.getElementById("ConfirmarClave_AfiDes").style.backgroundColor = "var(--Fallos)"
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Div_AlertaClave.childElementCount >= 1){
            alert("La clave no es permitida")
            document.getElementById("Clave").value = ""
            document.getElementById("Clave").focus()
            document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
            document.getElementById("ConfirmarClave_AfiDes").value = ""
            //Se elimina el nodo hijo donde aparece el mensaje del alert
            while(Div_AlertaClave.firstChild){
                Div_AlertaClave.removeChild(Div_AlertaClave.firstChild);
              };
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
        else if(Div_AlertaCorreo.childElementCount >= 1){
            alert("El correo ya esta registrado")
            document.getElementById("CorreoAfiDes").value = ""
            document.getElementById("CorreoAfiDes").focus()
            document.getElementById("CorreoAfiDes").style.backgroundColor = "var(--Fallos)"
            //Se elimina el nodo hijo donde aparece el mensaje del alert
            while(Div_AlertaCorreo.firstChild){
                Div_AlertaCorreo.removeChild(Div_AlertaCorreo.firstChild);
              };
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            return false;
        }
    }

//************************************************************************************************
    function evaluarElementosCcargados(){
        let DIV = document.getElementById('Mostrar_verificaClave')
        if(DIV.childElementCount < 1){
            console.log("No hay elementos en el div ")
        }
        else{
            console.log("Los elementos del DIV son:", DIV)
        }
    }

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
    //quita el color de fallo en un input y lo deja en su color original
    function blanquearInput(id){
        // console.log("______Desde blanquearInput()______")
        document.getElementById(id).style.backgroundColor = "white"
    }
//************************************************************************************************
    //Impide que se siga introduciendo caracteres al alcanzar el limite maximo en el telefono
    var contenidoTelefono = ""; 
    var num_caracteres_permitidos = 13; 
    function valida_LongitudTelefono(){ 
        console.log("______Desde valida_LongitudTelefono()______")

        let num_caracteres_input = document.getElementById("Telefono").value.length
        // num_caracteres_permitidos = Telefono.length; 

        if(num_caracteres_input > 13){ 
            document.getElementById("Telefono").value = contenidoTelefono; 
        }
        else{ 
            contenidoTelefono = document.getElementById("Telefono").value;   
        } 
    } 

//************************************************************************************************
    //Mascara de entrada para el telefono, agrega los puntos en tiempo real al llenar el campo    
    function mascaraTelefono(TelefonoRecibido){
        console.log("______Desde mascaraTelefono()______")
        
        if(TelefonoRecibido.length == 4){
            document.getElementById("Telefono").value += "-"; 
        }
        else if(TelefonoRecibido.length == 8){
            document.getElementById("Telefono").value += ".";  
        }
        else if(TelefonoRecibido.length == 11){
            document.getElementById("Telefono").value += ".";  
        }
    }

//************************************************************************************************
    function SeparadorMiles(nStr){
        console.log(nStr)
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        console.log(x1 + x2)
        return x1 + x2;
    }
    // const number = document.querySelector('.number');

    // function formatNumber (n) {
    //     n = String(n).replace(/\D/g, "");
    // return n === '' ? n : Number(n).toLocaleString();
    // }
    // number.addEventListener('keyup', (e) => {
    //     const element = e.target;
    //     const value = element.value;
    // element.value = formatNumber(value);
    // });