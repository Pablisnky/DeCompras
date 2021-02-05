function SeleccionarMunicipio(form){    
    // let Estado = document.getElementById('Estado').value;
    // let Municipio = document.getElementById('Municipio').value;

    var Estado = form.estado_com.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipio_com.options;//se captura el elemento select que contiene los municipios
    Municipio.length = null;

    if(Estado[0].selected == true){//Lara
        Municipio[0] = new Option("Seleccione municipio");
    }
    if(Estado[1].selected == true){//Lara
        Municipio[0] = new Option("Seleccione municipio");
        Municipio[1] = new Option("Andrés Eloy Blanco");
        Municipio[2]  = new Option("Crespo");
        Municipio[3] = new Option("Iribarren");
        Municipio[4] = new Option("Jiménez");
        Municipio[5] = new Option("Morán");
        Municipio[6] = new Option("Palavecino");
        Municipio[7] = new Option("Simón Planas");
        Municipio[8] = new Option("Torres");
        Municipio[9] = new Option("Uradneta");
    }
    if(Estado[2].selected == true){//Yaracuy tien la posicion 23 en el array del select estado
        Municipio[0] = new Option("Seleccione municipio");
        Municipio[1] = new Option("Cocorote");
        Municipio[2] = new Option("Independencia");
        Municipio[3] = new Option("Peña");
        Municipio[4] = new Option("San Felipe");
    }
}
