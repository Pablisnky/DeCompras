// var http_request = false
// var peticion= conexionAJAX()
// function conexionAJAX(){
//     http_request = false
//     if(window.XMLHttpRequest){ // Mozilla, Safari,...
//         http_request = new XMLHttpRequest()
//         if (http_request.overrideMimeType){
//             http_request.overrideMimeType('text/xml')
//         }
//     }
//     else if(window.ActiveXObject){ // IE
//         try{
//             http_request = new ActiveXObject("Msxml2.XMLHTTP")
//         }
//             catch(e){
//                 try{
//                     http_request = new ActiveXObject("Microsoft.XMLHTTP")
//                 } 
//                 catch(e){}
//             }
//         }
//         if(!http_request){
//             alert('No es posible crear una instancia XMLHTTP')
//             return false
//         }
//         //   else{
//         //     alert("Instancia creada exitosamente ok")
//         // }
//         return http_request
//     } 

//-------------------------------------------------------------------------------------------------         
document.getElementById("Input_9").addEventListener('keyup', function(){Llamar_buscador(this.value)})
    
//-------------------------------------------------------------------------------------------------
    //Busca un producto segun lo que escriba el usuario en el input
    function Llamar_buscador(nombre){
        console.log("______Desde Llamar_buscador()______")
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
            }          
            document.getElementById("Buscar_Pedido").style.display = "grid"
            xmlhttp.open("GET", "Buscador_C/buscarPedido/" + nombre, true)
            //se envia la informacion cargada en el input por el usuario al servidor, true, significa que se va a hacer de manera asincrona se utiliza el metodo send para enviar.               
            xmlhttp.send()
        }
    }

//-------------------------------------------------------------------------------------------------