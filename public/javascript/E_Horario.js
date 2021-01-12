window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Sabado_M','InicioManana_Sab','CulminaManana_Sab')}, false)

window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Sabado_T','InicioTarde_Sab','CulminaTarde_Sab')}, false)

window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Domingo_M','InicioManana_Dom','CulminaManana_Dom')}, false)

window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Domingo_T','InicioTarde_Dom','CulminaTarde_Dom')}, false)

document.getElementById("Sabado_M").addEventListener('click',function(){HabilitarSelects('Sabado_M','InicioManana_Sab', 'CulminaManana_Sab')}, false)

document.getElementById("Sabado_T").addEventListener('click',function(){HabilitarSelects('Sabado_T','InicioTarde_Sab', 'CulminaTarde_Sab')}, false)

document.getElementById("Domingo_M").addEventListener('click',function(){HabilitarSelects('Domingo_M','InicioManana_Dom', 'CulminaManana_Dom')}, false)

document.getElementById("Domingo_T").addEventListener('click',function(){HabilitarSelects('Domingo_T','InicioTarde_Dom', 'CulminaTarde_Dom')}, false)

document.getElementById("Label_3").addEventListener('click', MostrarExepcionHorario, false)

document.getElementsByClassName('span_17_js')[0].addEventListener('click', OcultarExepcionHorario, false)

//************************************************************************************************
    //Habilita los selects que contienen las horas de apertura y cierre de la tienda
    function HabilitarSelects(Dia, HoraApertura, HoraCierre){
        console.log("_____Desde HabilitarSelects()_____",Dia + ' ' + HoraApertura + ' ' + HoraCierre)
        
        let Checkbox = document.getElementById(Dia)

        if(Checkbox.checked == true){
            document.getElementById(HoraApertura).disabled = false
            document.getElementById(HoraCierre).disabled = false
        }
        else{
            document.getElementById(HoraApertura).disabled = true
            document.getElementById(HoraCierre).disabled = true
        }
    }

//************************************************************************************************
    //Muestra todo el div que contiene la sección de horarios
    function MostrarExepcionHorario(){
        console.log("______Desde MostrarExepcionHorario()______") 
        
        document.getElementById("Contenedor_89").style.display = "flex"
    }

//************************************************************************************************   
    //Oculta todo el div que contiene la sección de horarios
    function OcultarExepcionHorario(){
        console.log("______Desde ocultarHorario()______") 
        
        document.getElementById("Contenedor_89").style.display = "none"
    }    

//************************************************************************************************ 
    //Verifica que si un horario ya existe, no desabilite los selects de las horas correspondientes
    function VerificarCheckbox(Dia, HoraApertura_M, HoraCierre_M){
        console.log("______Desde VerificarCHeckbox()______", Dia + ' ' +  HoraApertura_M) 

        let Checkbox = document.getElementById(Dia)

        if(Checkbox.checked == true){
            document.getElementById(HoraApertura_M).disabled = false
            document.getElementById(HoraCierre_M).disabled = false
        }
    }