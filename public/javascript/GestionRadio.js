//Todo este código deselecciona un radio buttom al hacer click sobre uno ya seleccionado
// La solución consiste en llevar un registro del elemento que está actualmente seleccionado
// Éste codigo, debe estar colocado después de todos los formularios de la página para que funcione. El motivo es que se realiza una inicialización dentro del código para la cual deben estar ya creados los contoles que se van a gestionar
// Éste código usa algunas cuestiones interesantes, como la generación dinámica de variables en memoria así como la comprobación de la existencia de éstas. 

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

    //generamos dinámicamente variables globales para contener la opción pulsada en cada uno de los grupos de radio buttom
    for(f = 0; f < document.forms.length; f++){
        for(i = 0; i< document.forms[f].elements.length; i++){
            var elementoExistente = document.forms[f].elements[i];
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
                if(elementoExistente.checked){
                    exprCrearVariable += "document.getElementById('" + elementoExistente.id + "')"
                }
                else{
                    exprCrearVariable += "null"
                }

                //Definimos la variable y asignamos el valor sólo si no existe o si el radio actual está marcado 
                if(!varExiste(pref_opcActual + elementoExistente.name) || elementoExistente.checked){
                    eval(exprCrearVariable)
                }
            }
        }
    }

    function gestionarClickRadio(opcPulsada){
        // console.log("____Desde gestionarClickRadio()____",opcPulsada)

        //El nombre de la variable que contiene el nombre del grupo actual
        var svarOpcAct = pref_opcActual + opcPulsada.name

        var opcActual = null
        
        //recupero dinámicamente una referencia al último radio pulsado de este grupo
        opcActual = eval(svarOpcAct);

        if(opcActual == opcPulsada){
            //deselecciono
            opcPulsada.checked = false 
            
            //y quito referencia (es como si nunca se hubiera pulsado)
            asignaVar(svarOpcAct, "null")  
        }
        else{
            //Anoto la última opción pulsada de este grupo
            asignaVar(svarOpcAct, "document.getElementById('" + opcPulsada.id + "')")  
        }
    }