document.getElementById("Input_9").addEventListener('keyup', function(){Llamar_buscador(this.value)})
    
//*********************************************************************************************** 
    //Busca un producto segun lo que escriba el usuario en el input
    function Llamar_buscador(nombre){
        // console.log("______Desde Llamar_buscador()______")
        var divContenedor = document.getElementById("Buscar_Pedido")//se recibe desde inicio_V.php 
        var xmlhttp
        if(window.XMLHttpRequest){ //Mozilla, Safari, Chrome...
            xmlhttp = new XMLHttpRequest()
        } 
        else{ 
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
            if(!xmlhttp){
                alert('No es posible crear una instancia XMLHTTP')
                return false
            }
            else{
                alert("Instancia creada exitosamente")
            }     
        }

        if(nombre.length === ""){//sino hay nada escrito en el input de buscar, no se ejecuta ninguna accion
            divContenedor.innerHTML = ""
        }
        else{//si hay algo escrito en el input de buscar se ejecuta la peticion de Ajax
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status === 200){
                    divContenedor.innerHTML = xmlhttp.responseText
                } 
                else{ //en caso contrario, mostramos un gif simulando una precarga
                    document.getElementById('Buscar_Pedido').innerHTML ="<div class='preloder'></div>"                  
                    return   
                }  
            }          
            document.getElementById("Buscar_Pedido").style.display = "flex"
            xmlhttp.open("GET", "Buscador_C/index/" + nombre, true)
            //se envia la informacion cargada en el input por el usuario al servidor, true, significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.               
            xmlhttp.send()
        }
    }

//*********************************************************************************************** 