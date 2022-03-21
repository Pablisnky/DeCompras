window.addEventListener('load', function(){autofocus('Nombre')}, false)

document.getElementById("NombreTienda").addEventListener('keydown', function(){contarCaracteres('ContadorNombre','NombreTienda', 50)}, false)

document.getElementById("NombreTienda").addEventListener('keydown', function(){valida_LongitudDes(50,'NombreTienda')}, false)
    
//Por medio de delegación de eventos se detecta cada input donde se debe aplicar la funcion blanquearInput()
document.getElementsByTagName("body")[0].addEventListener('keydown', function(e){
    // console.log("______Desde función anonima que detecta INPUTS______")   
    if(e.target.tagName == "INPUT"){
        var ID_Input = e.target.id
        
        document.getElementById(ID_Input).addEventListener('keyup', function(){blanquearInput(ID_Input)}, false)
    } 
}, false)

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
        let Div_AlertaNombreTienda = document.getElementById('Mostrar_verificarNombreTienda')
        document.getElementsByClassName("boton")[0].value = "Creando tienda ..."
        document.getElementsByClassName("boton")[0].disabled = "disabled"
        document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
        document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
        document.getElementsByClassName("boton")[0].classList.add('borde_1')
        
        //Patron de entrada solo acepta letras
        let P_Letras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ _]*[A-Za-zÁÉÍÓÚáéíóúñÑ][A-Za-zÁÉÍÓÚáéíóúñÑ _]*$/
        
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
        else if(Div_AlertaCorreo.innerHTML != ""){
            alert("El correo ya esta registrado")
            document.getElementById("CorreoAfiCom").value = ""
            document.getElementById("CorreoAfiCom").focus()
            document.getElementById("CorreoAfiCom").style.backgroundColor = "var(--Fallos)"
            // // Se elimina el nodo hijo donde aparece el mensaje del alert
            while(Div_AlertaCorreo.firstChild){
                Div_AlertaCorreo.removeChild(Div_AlertaCorreo.firstChild);
              };
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            document.getElementById("Mostrar_verificaCorreo").style.visibility = "hidden";
            return false;
        }
        else if(NombreTienda == "" || NombreTienda.indexOf(" ") == 0  ||  NombreTienda.length > 50){
            alert ("Nombre de tienda invalido")
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
        else if(Div_AlertaNombreTienda.innerHTML != ""){
            alert("El nombre de tienda ya esta registrado")
            document.getElementById("NombreTienda").value = ""
            document.getElementById("NombreTienda").focus()
            document.getElementById("NombreTienda").style.backgroundColor = "var(--Fallos)"
            // // Se elimina el nodo hijo donde aparece el mensaje del alert
            while(Div_AlertaCorreo.firstChild){
                Div_AlertaCorreo.removeChild(Div_AlertaCorreo.firstChild);
              };
            document.getElementsByClassName("boton")[0].value = "Registrarse"
            document.getElementsByClassName("boton")[0].disabled = false
            document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
            document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
            document.getElementsByClassName("boton")[0].classList.remove('borde_1')
            document.getElementById("Mostrar_verificaCorreo").style.visibility = "hidden";
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
        else if(Div_AlertaClave.innerHTML != ""){
            console.log(Div_AlertaClave.childElementCount)
            alert("La clave no es permitida")
            document.getElementById("Clave").value = ""
            document.getElementById("Clave").focus()
            document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
            document.getElementById("ConfirmarClave").value = ""
            //Se elimina el nodo hijo donde aparece el mensaje del 
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
    }
    
//************************************************************************************************
    function removerContenidoDiv(){
        // console.log("_____Desde removerDiv()_____")

        let Div_AlertaCorreo = document.getElementById('Mostrar_verificaCorreo')

        if(Div_AlertaCorreo.firstChild){
            Div_AlertaCorreo.removeChild(Div_AlertaCorreo.firstChild)  
        }      
    }

//************************************************************************************************
    //Valida el formulario de afiliació de despachador
    // function validarAfiliacionDes(){
    //     // console.log("_____Desde validarAfiliacionDes()_____")

    //     let Nombre = document.getElementById('Nombre').value
    //     let Apellido = document.getElementById('Apellido').value      
    //     let Correo = document.getElementById('CorreoAfiDes').value  
    //     let Cedula = document.getElementById('Cedula').value
    //     let Telefono = document.getElementById('Telefono').value          
    //     let Clave = document.getElementById('Clave').value 
    //     let ConfirmarClave = document.getElementById('ConfirmarClave_AfiDes').value 
    //     let Div_AlertaClave = document.getElementById('Mostrar_verificaClave')
    //     let Div_AlertaCorreo = document.getElementById('Mostrar_verificaCorreo')

    //     document.getElementsByClassName("boton")[0].value = "Creando cuenta ..."
    //     document.getElementsByClassName("boton")[0].disabled = "disabled"
    //     document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialClaro)"
    //     document.getElementsByClassName("boton")[0].style.color = "var(--OficialOscuro)"
    //     document.getElementsByClassName("boton")[0].classList.add('borde_1')

    //     //Patron de entrada solo acepta letras
    //     let P_Letras = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/

    //     //Patron de entrada para correos electronicos
    //     let P_Correo = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    //     if(Nombre == "" || Nombre.indexOf(" ") == 0 || Nombre.length > 20 || P_Letras.test(Nombre) == false){
    //         alert ("Necesita introducir su nombre")
    //         document.getElementById("Nombre").value = ""
    //         document.getElementById("Nombre").focus()
    //         document.getElementById("Nombre").style.backgroundColor = "var(--Fallos)"
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     if(Apellido == "" || Apellido.indexOf(" ") == 0 || Apellido.length > 20 || P_Letras.test(Nombre) == false){
    //         alert ("Necesita introducir su Apellido")
    //         document.getElementById("Apellido").value = ""
    //         document.getElementById("Apellido").focus()
    //         document.getElementById("Apellido").style.backgroundColor = "var(--Fallos)"
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
    //         document.getElementById("Cedula").style.backgroundColor = "var(--Fallos)"
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Telefono == "" || Telefono.indexOf(" ") == 0 || Telefono.length > 14){
    //         alert ("Introduzca un Telefono")
    //         document.getElementById("Telefono").value = ""
    //         document.getElementById("Telefono").focus()
    //         document.getElementById("Telefono").style.backgroundColor = "var(--Fallos)"
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Correo == "" || Correo.indexOf(" ") == 0 || Correo.length > 70 || P_Correo.test(Correo) == false){
    //         alert ("Introduzca un Correo")
    //         document.getElementById("CorreoAfiDes").value = ""
    //         document.getElementById("CorreoAfiDes").focus()
    //         document.getElementById("CorreoAfiDes").style.backgroundColor = "var(--Fallos)"
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
    //         document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(ConfirmarClave == "" || ConfirmarClave.indexOf(" ") == 0 || ConfirmarClave.length > 70){
    //         alert ("Introduzca la confirmación de la clave")
    //         document.getElementById("ConfirmarClave_AfiDes").value = ""
    //         document.getElementById("ConfirmarClave_AfiDes").focus()
    //         document.getElementById("ConfirmarClave_AfiDes").style.backgroundColor = "var(--Fallos)"
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Clave != ConfirmarClave){
    //         alert ("La clave no coincide")
    //         document.getElementById("ConfirmarClave_AfiDes").value = ""
    //         document.getElementById("ConfirmarClave_AfiDes").focus()
    //         document.getElementById("ConfirmarClave_AfiDes").style.backgroundColor = "var(--Fallos)"
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Div_AlertaClave.childElementCount > 1){
    //         alert("La clave no es permitida")
    //         document.getElementById("Clave").value = ""
    //         document.getElementById("Clave").focus()
    //         document.getElementById("Clave").style.backgroundColor = "var(--Fallos)"
    //         document.getElementById("ConfirmarClave_AfiDes").value = ""
    //         //Se elimina el nodo hijo donde aparece el mensaje del alert
    //         while(Div_AlertaClave.firstChild){
    //             Div_AlertaClave.removeChild(Div_AlertaClave.firstChild);
    //           };
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    //     else if(Div_AlertaCorreo.childElementCount > 1){
    //         alert("El correo ya esta registrado")
    //         document.getElementById("CorreoAfiDes").value = ""
    //         document.getElementById("CorreoAfiDes").focus()
    //         document.getElementById("CorreoAfiDes").style.backgroundColor = "var(--Fallos)"
    //         //Se elimina el nodo hijo donde aparece el mensaje del alert
    //         while(Div_AlertaCorreo.firstChild){
    //             Div_AlertaCorreo.removeChild(Div_AlertaCorreo.firstChild);
    //           };
    //         document.getElementsByClassName("boton")[0].value = "Registrarse"
    //         document.getElementsByClassName("boton")[0].disabled = false
    //         document.getElementsByClassName("boton")[0].style.backgroundColor = "var(--OficialOscuro)"
    //         document.getElementsByClassName("boton")[0].style.color = "var(--OficialClaro)"
    //         document.getElementsByClassName("boton")[0].classList.remove('borde_1')
    //         return false;
    //     }
    // }

//************************************************************************************************
    // function evaluarElementosCcargados(){
    //     let DIV = document.getElementById('Mostrar_verificaClave')
    //     if(DIV.childElementCount < 1){
    //         console.log("No hay elementos en el div ")
    //     }
    //     else{
    //         console.log("Los elementos del DIV son:", DIV)
    //     }
    // }
 
//*********************************************************************************************
    //Valida que la contraseña introducida sea de solo letras y numeros
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

//*********************************************************************************************    