
//************************************************************************************************
    //Cambia la imagen de inicio
    document.getElementById('Botones_radios_Ven').addEventListener('click', function(event){ 
        if(event.target.id == "Pantall__1"){ 
            console.log(event.target.id )
            document.getElementById('Presentacion_1').style.marginLeft = "0%";
            document.getElementById('Presentacion_1').style.transition = ".5s"
        }
        else if(event.target.id == "Pantall__2"){ 
            console.log(event.target.id )
            document.getElementById('Presentacion_1').style.marginLeft = "-100%";
            document.getElementById('Presentacion_1').style.transition = ".5s" 
        }
    }, false); 