//     <body>
//         <form>
//             <input type="radio" id="01" name="grupo" value="Opción 1" onclick="gestionarClickRadio(this);"> 
//             <label for="01">Opción 1</label>
//             <br>
//             <input type="radio" id="02" name="grupo" value="Opción 2" onclick="gestionarClickRadio(this);">
//             <label for="02">Opción 2</label>
//         </form>
//     </body>

    //Para distinguir la opción actualmente pulsada en cada grupo
    var pref_opcActual = "opcActual_";

    //Verifica si una variable definida dinámicamente existe o no
    function varExiste(sNombre){
        return (eval("typeof(" + sNombre + ");") != "undefined");
    }

    //Asigna un valor a una variable creada dinámicamente a partir de su nombre
    function asignaVar(sNombre, valor){
        eval(sNombre + " = " + valor + ";");
    }

    //generamos dinámicamente variables globales para contener la opción pulsada en cada uno de los grupos
    console.log("Cantidad elementos en el formulario = ",document.forms.length)
    for(f= 0; f<document.forms.length; f++){
        for(i = 0; i< document.forms[f].elements.length; i++){
            var elementoExistente = document.forms[f].elements[i];
            console.log("elementos form existente", elementoExistente)
            var exprCrearVariable = "";

            if(elementoExistente.type == "radio"){
                //Si la variable no existe la definimos siempre, pero sólo la redefinimos en caso de que el elemento actual del grupo esté asignado
                if(!varExiste(pref_opcActual + elementoExistente.name)){
                    exprCrearVariable = "var " + pref_opcActual + elementoExistente.name + " = ";
                }
                else{
                    exprCrearVariable = pref_opcActual + elementoExistente.name + " = ";
                }
                
                //El valor será nulo o una referencia al radio actual en función de si está seleccionado o no
                if(elementoExistente.checked)
                    exprCrearVariable += "document.getElementById(‘" + elementoExistente.id + "‘)";
                else
                    exprCrearVariable += "null";

                //Definimos la variable y asignamos el valor sólo si no existe o si el radio actual está marcado 
                if(!varExiste(pref_opcActual + elementoExistente.name) || elementoExistente.checked)
                    eval(exprCrearVariable);
            }
        }
    }

    function gestionarClickRadio_M(opcPulsada){
        console.log("____Desde gestionarClickRadio()____",opcPulsada)
        //El nombre de la variable que contiene el nombre del grupo actual
        var svarOpcAct = pref_opcActual + opcPulsada.name;
        var opcActual = null;
        
        //recupero dinámicamente una referencia al último radio pulsado de este grupo
        opcActual = eval(svarOpcAct);  

        if(opcActual == opcPulsada){
            //deselecciono
            opcPulsada.checked = false; 
            
            //y quito referencia (es como si nunca se hubiera pulsado)
            asignaVar(svarOpcAct, "null");  
        }
        else{
            //Anoto la última opción pulsada de este grupo
            asignaVar(svarOpcAct, "document.getElementById('" + opcPulsada.id + "')");  
        }
    }