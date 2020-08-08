    //Llamada desde inicio_V.phph; buscador un pedido segun lo que escriba el usuario en el input
    function Llamar_buscador(nombre){
        var divContenedor = document.getElementById("Buscar_Pedido");//se recibe desde inicio_V.php
        var xmlhttp;
        if(window.XMLHttpRequest){ //Mozilla, Safari, Chrome...
            xmlhttp = new XMLHttpRequest();
        } 
        else 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            if(!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
            // else{
            //     alert("Instancia creada exitosamente");
            // }     
    
            if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
                divContenedor.innerHTML = ""
            }
            else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
                xmlhttp.onreadystatechange = function(){
                    console.log(xmlhttp.readyState)
                if(xmlhttp.readyState === 4 && this.status === 200){
                    divContenedor.innerHTML = xmlhttp.responseText
                    console.log("listo")
                }                   
            }                   
            xmlhttp.open("GET", "Buscador_C/buscarPedido/" + nombre, true)//se envia la informacion cargada en el input al servidor, true, significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.                                                             
            xmlhttp.send()
        }
    }