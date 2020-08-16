//Escucha en registroCom.php
document.getElementById("Label_4").addEventListener('click', nuevaCuenta, false)

// *****************************************************************************************************
    //Actua en header_inicio.php
    let iterar = 1
    function nuevaCuenta(){
        //Contenedor a clonar 
        let clonar = document.getElementById("Contenedor_67")

        //Se crea el clon
        let Div_clon = clonar.cloneNode(true)

        //Se da un ID al nuevo elemento clonado
        Div_clon.style.id = iterar  
        iterar++

        //El value de los elementos que estan dentro del nuevo clon debe estar vacio
        Div_clon.getElementsByClassName("input_9JS")[0].value = ""
        Div_clon.getElementsByClassName("input_9JS")[1].value = ""
        Div_clon.getElementsByClassName("input_9JS")[2].value = ""
        Div_clon.getElementsByClassName("input_9JS")[3].value = ""

        //Se especifica el div padre, donde se insertará el nuevo nodo
        //Contenedor_69 = Div padre y Contenedor_67 = Div hijo
        document.getElementById("Contenedor_69").appendChild(Div_clon)
    }