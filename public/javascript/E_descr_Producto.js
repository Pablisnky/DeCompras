
//************************************************************************************************
    //Muestra en formato grande la miniatura seleccionada
    function verMiniatura(ID_Imagen){
        console.log("______Desde verMiniatura()______",ID_Imagen)

        let Desplazar = document.getElementById("Ul_1")

        //Se remueve la imagen principal para dar lugar a las vistas miniaturas
        document.getElementById("ImagenTemporal").style.display = "none"

        //Se activa la vista miniatura en formato grande
        Desplazar.style.display = "flex"

        //Se verifica cuantos elementos <li> trae "Desplazar" para colocar el ancho respectivo
        if(Desplazar.children.length == 1){
            Desplazar.classList.add("ul_3_100")
            switch(ID_Imagen) {
                case "Imagen_1":
                    Desplazar.style.marginLeft = "0%"
                break;
            } 
        }
        else if(Desplazar.children.length == 2){
            Desplazar.classList.add("ul_3_200")
            switch(ID_Imagen) {
                case "Imagen_1":
                    Desplazar.style.marginLeft = "0%"
                break;
                case "Imagen_2":             
                Desplazar.style.marginLeft = "-100%"
                break;
            } 
        }
        else if(Desplazar.children.length == 3){
            Desplazar.classList.add("ul_3_300")
            switch(ID_Imagen) {
                case "Imagen_1":
                    Desplazar.style.marginLeft = "0%"
                break;
                case "Imagen_2":             
                Desplazar.style.marginLeft = "-100%"
                break;
                case "Imagen_3":             
                Desplazar.style.marginLeft = "-200%"
                break;
            } 
        }
        else if(Desplazar.children.length == 4){
            Desplazar.classList.add("ul_3_400")
            switch(ID_Imagen) {
                case "Imagen_1":
                    Desplazar.style.marginLeft = "0%"
                break;
                case "Imagen_2":             
                Desplazar.style.marginLeft = "-100%"
                break;
                case "Imagen_3":             
                Desplazar.style.marginLeft = "-200%"
                break;
                case "Imagen_4":             
                Desplazar.style.marginLeft = "-300%"
                break;
            } 
        }
        else if(Desplazar.children.length == 5){
            Desplazar.classList.add("ul_3_500")
            switch(ID_Imagen) {
                case "Imagen_1":
                    Desplazar.style.marginLeft = "0%"
                break;
                case "Imagen_2":             
                Desplazar.style.marginLeft = "-100%"
                break;
                case "Imagen_3":             
                Desplazar.style.marginLeft = "-200%"
                break;
                case "Imagen_4":             
                Desplazar.style.marginLeft = "-300%"
                break;
                case "Imagen_5":             
                Desplazar.style.marginLeft = "-400%"
                break;
            } 
        }
    }

//************************************************************************************************
    // Muestra la imagen en ventana modal
    function verImagenModal(ID_Imagen){
        console.log("______Desde verImagenModal()______", ID_Imagen)

    }