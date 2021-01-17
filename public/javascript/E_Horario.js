window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Sabado_M','InicioManana_Sab','CulminaManana_Sab')}, false)

window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Sabado_T','InicioTarde_Sab','CulminaTarde_Sab')}, false)

window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Domingo_M','InicioManana_Dom','CulminaManana_Dom')}, false)

window.addEventListener('DOMContentLoaded', function(){VerificarCheckbox('Domingo_T','InicioTarde_Dom','CulminaTarde_Dom')}, false)


window.addEventListener('DOMContentLoaded', function(){
    let DiaSemanaMan = document.getElementsByClassName("diaSemanaMan_JS")
    //Se recorren todos los valores del radio button para encontrar el seleccionado
    for(var j=0; j<DiaSemanaMan.length; j++){
        if(DiaSemanaMan[j].checked){
            let DiaLaboral_Man = DiaSemanaMan[j].id;
            VerificarCheckbox(DiaLaboral_Man,'InicioManana','CulminaManana')
        }
    }
}, false)

window.addEventListener('DOMContentLoaded', function(){
    let DiaSemanaTar = document.getElementsByClassName("diaSemanaTar_JS")
    //Se recorren todos los valores del radio button para encontrar el seleccionado
    for(var j=0; j<DiaSemanaTar.length; j++){
        if(DiaSemanaTar[j].checked){
            DiaLaboral_Tar = DiaSemanaTar[j].id;
            VerificarCheckbox(DiaLaboral_Tar,'IniciaTarde','CulminaTarde')
        }
    }
}, false)

document.addEventListener('click', function(event){
    if(event.target.classList == 'diaSemanaMan_JS'){
        //Se declara un array que contendra los dias de la semana LV marcado con checked
        DiaHabilitado = []
        let DiasSemana = document.getElementsByClassName("diaSemanaMan_JS")
        let DiaSeleccionado = event.target
        let ID_DiaSeleccionado = event.target.id

        console.log(DiaSeleccionado.checked)
        for(let k = 0; k < DiasSemana.length; k++){
            if(DiasSemana[k].checked){
                DiaHabilitado.push(DiasSemana[k].id)
            }
        }
        console.log(DiaHabilitado)
        if(DiaHabilitado == ""){
            HabilitarSelects(ID_DiaSeleccionado,'InicioManana','CulminaManana')
        }
        else if(DiaHabilitado.length > 0 && DiaSeleccionado.checked == true){
            HabilitarSelects(ID_DiaSeleccionado,'InicioManana','CulminaManana')
        }
    }
}, false)

document.addEventListener('click', function(event){
    if(event.target.classList == 'diaSemanaTar_JS'){
        //Se declara un array que contendra los dias de la semana LV marcado con checked
        DiaHabilitado = []
        let DiasSemana = document.getElementsByClassName("diaSemanaTar_JS")
        let DiaSeleccionado = event.target
        let ID_DiaSeleccionado = event.target.id

        for(let k = 0; k < DiasSemana.length; k++){
            if(DiasSemana[k].checked){
                DiaHabilitado.push(DiasSemana[k].id)
            }
        }
        console.log(DiaHabilitado)
        if(DiaHabilitado == ""){
            HabilitarSelects(ID_DiaSeleccionado,'IniciaTarde','CulminaTarde')
        }
        else if(DiaHabilitado.length > 0 && DiaSeleccionado.checked == true){
            HabilitarSelects(ID_DiaSeleccionado,'IniciaTarde','CulminaTarde')
        }
    }
}, false)

window.addEventListener('DOMContentLoaded', function(){
    let DiaEspecial = document.getElementsByName("horario_Espec_M")
    //Se recorren todos los valores del radio button para encontrar el seleccionado
    for(var i=0; i<DiaEspecial.length; i++){
        if(DiaEspecial[i].checked){
            DiaExcepcion = DiaEspecial[i].id;
            VerificarCheckbox(DiaExcepcion,'InicioManana_Esp','CulminaManana_Esp')
        }
    }
}, false)

window.addEventListener('DOMContentLoaded', function(){
    let DiaEspecial = document.getElementsByName("horario_Espec_T")
    //Se recorren todos los valores del radio button para encontrar el seleccionado
    for(var i=0; i<DiaEspecial.length; i++){
        if(DiaEspecial[i].checked){
            DiaExcepcion = DiaEspecial[i].id;
            VerificarCheckbox(DiaExcepcion,'InicioTarde_Esp','CulminaTarde_Esp')
        }
    }
}, false)

document.addEventListener('click', function(event){
    if(event.target.name == 'horario_Espec_M'){
        let DiaExcepcion = event.target.id
        HabilitarSelects(DiaExcepcion,'InicioManana_Esp','CulminaManana_Esp')
    }
}, false)

document.addEventListener('click', function(event){
    if(event.target.name == 'horario_Espec_T'){
        let DiaExcepcion = event.target.id
        HabilitarSelects(DiaExcepcion,'InicioTarde_Esp','CulminaTarde_Esp')
    }
}, false)

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
            document.getElementById(HoraApertura).value = '00:00'
            document.getElementById(HoraCierre).value = '00:00'
        }
        else{
            document.getElementById(HoraApertura).disabled = true
            document.getElementById(HoraCierre).disabled = true
            document.getElementById(HoraApertura).value = '00:00'
            document.getElementById(HoraCierre).value = '00:00'
        }
    }

//************************************************************************************************
    //Muestra todo el div que contiene la sección de horario especial
    function MostrarExepcionHorario(){
        // console.log("______Desde MostrarExepcionHorario()______") 
        
        document.getElementById("Contenedor_89").style.display = "flex"
    }

//************************************************************************************************   
    //Oculta todo el div que contiene la sección de horario especial
    function OcultarExepcionHorario(){
        // console.log("______Desde ocultarHorario()______") 
        
        document.getElementById("Contenedor_89").style.display = "none"
    }    

//************************************************************************************************ 
    //Verifica que si un horario ya existe en BD, no desabilite los selects de las horas correspondientes
    function VerificarCheckbox(Dia, HoraApertura_M, HoraCierre_M){
        // console.log("______Desde VerificarCHeckbox()______", Dia + ' ' +  HoraApertura_M + ' ' + HoraCierre_M) 

        let Checkbox = document.getElementById(Dia)

        if(Checkbox.checked == true){
            document.getElementById(HoraApertura_M).disabled = false
            document.getElementById(HoraCierre_M).disabled = false
        }
    }