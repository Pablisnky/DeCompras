function SeleccionarMunicipio(form){    
    // let Estado = document.getElementById('Estado').value;
    // let Municipio = document.getElementById('Municipio').value;

    var Estado = form.estado_com.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipio_com.options;//se captura el elemento select que contiene los municipios
    Municipio.length = null;

    if(Estado[1].selected == true){//Yaracuy tien la posicion 23 en el array del select estado
        Municipio[0] = new Option("Seleccione municipio");
        Municipio[1] = new Option("Cocorote");
        Municipio[2] = new Option("Independencia");
        Municipio[3] = new Option("Peña");
        Municipio[4] = new Option("San Felipe");
    }
}
