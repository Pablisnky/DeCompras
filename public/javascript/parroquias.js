function SeleccionarParroquia(form){
    
    var Estado = form.estado_com.options;//se captura el elemento select que contiene los estados
    var Municipio = form.municipio_com.options;//se captura el elemento select que contiene los estados
    var Parroquia = form.parroquia_com.options;//se captura el elemento select que contiene los estados
    Parroquia.length = null;


    // ----------------------------------------------------------------------------------------------------------------------

    if(Estado[1].selected == true){//Lara
        if(Municipio[0].selected == true){
            Parroquia[0] = new Option("espere","");
        }
        if(Municipio[1].selected == true){//Andrés Eloy Blanco
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Quebrada honda");
            Parroquia[2] = new Option("Pio Tamayo");
            Parroquia[3] = new Option("Yacambú");   
        }
        if(Municipio[2].selected == true){//Crespo
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Freitez");
            Parroquia[2] = new Option("José María Blanco");
        }
        if(Municipio[3].selected == true){//Iribarren
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Aguedo Felipe Alvarado");
            Parroquia[2] = new Option("Buena Vista");
            Parroquia[3] = new Option("Catedral");
            Parroquia[4] = new Option("Concepción");
            Parroquia[5] = new Option("El Cují");
            Parroquia[6] = new Option("Juárez");
            Parroquia[7] = new Option("Juan de Villegas");
            Parroquia[8] = new Option("Santa Rosa");
            Parroquia[9] = new Option("Tamaca");
            Parroquia[10] = new Option("Unión");
        }
        if(Municipio[4].selected == true){//Jiménez
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Juan Bautista Rodriguez");
            Parroquia[2] = new Option("Cuara");
            Parroquia[3] = new Option("Diego de Lozada");
            Parroquia[4] = new Option("Paraíso de San José");
            Parroquia[5] = new Option("San Miguel");
            Parroquia[6] = new Option("Tintorero");
            Parroquia[7] = new Option("José Bernardo Dorante");
            Parroquia[8] = new Option("Coronel Mariano Peraza");
        }
        if(Municipio[5].selected == true){ //Morán
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Anzoátegui");
            Parroquia[2] = new Option("Bolivar");
            Parroquia[3] = new Option("Guarico");
            Parroquia[4] = new Option("Hilario Luna y Luna");
            Parroquia[5] = new Option("Humocaro Alto");
            Parroquia[6] = new Option("Humocaro Bajo");
            Parroquia[7] = new Option("La Candelaria");
            Parroquia[8] = new Option("Morán");
        }
        if(Municipio[6].selected == true){//Palavecino
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Cabudare");
            Parroquia[2] = new Option("José Gregorio Bastidas");
            Parroquia[3] = new Option("Agua VIva");
        }
        if(Municipio[7].selected == true){//Simón Planas
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Buría");
            Parroquia[2] = new Option("Gustavo Vega");
            Parroquia[3] = new Option("Sarare");
        }
        if(Municipio[8].selected == true){//Torres
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Altagracia");
            Parroquia[2] = new Option("Antonio Diaz");
            Parroquia[3] = new Option("Camacaro");
            Parroquia[4] = new Option("Castañeda");
            Parroquia[5] = new Option("Cecilio Subillaga");
            Parroquia[6] = new Option("Chiquinquira");
            Parroquia[7] = new Option("El Blanco");
            Parroquia[8] = new Option("Espinoza de los Monteros");
            Parroquia[9] = new Option("Heriberto Arrollo");
            Parroquia[10] = new Option("Lara");
            Parroquia[11] = new Option("Las Meredes");
            Parroquia[12] = new Option("Manuel Morillo");
            Parroquia[13] = new Option("Montaña Verde");
            Parroquia[14] = new Option("Montes de Oca");
            Parroquia[15] = new Option("Reyes de Vargas");
            Parroquia[16] = new Option("Torres");
            Parroquia[17] = new Option("Trinidad Samuel");
        }
        if(Municipio[9].selected == true){//Urdaneta
            Parroquia[0] = new Option("");
            Parroquia[1] = new Option("Xaguas");
            Parroquia[2] = new Option("Siquisique");
            Parroquia[3] = new Option("San Miguel");
            Parroquia[4] = new Option("Moroturo");
        }
    }
    if(Estado[2].selected == true){//Yaracuy
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