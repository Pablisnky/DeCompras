function SeleccionarParroquia(form){
    
    var Estado = form.estado_com.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipio_com.options;//se captura el elemento select que contiene los estados
    var Parroquia = form.parroquia_com.options;//se captura el elemento select que contiene los estados
    Parroquia.length = null;


    // ----------------------------------------------------------------------------------------------------------------------

    if(Estado[1].selected == true){//Yaracuy
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Municipio Cocorote
            Parroquia[0] = new Option("Seleccione parroquia");
            Parroquia[1] = new Option("Cocorote");
        }
        if(Municipio[2].selected == true){//Municipio Independencia
            Parroquia[0] = new Option("Seleccione parroquia");
            Parroquia[1] = new Option("Independencia");
        }
        if(Municipio[3].selected == true){//Municipio Peña
            Parroquia[0] = new Option("Seleccione parroquia");
            Parroquia[1] = new Option("San Andres");
            Parroquia[2] = new Option("Yaritagua");
        }
        if(Municipio[4].selected == true){//Municipio San Felipe
            Parroquia[0] = new Option("Seleccione parroquia");
            Parroquia[1] = new Option("Albarico");
            Parroquia[2] = new Option("San Felipe");
            Parroquia[3] = new Option("San Javier");       
        }
    } 
}