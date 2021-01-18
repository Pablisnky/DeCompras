<?php
// Se diseña el contolador principal, se encarga de cargar los modelos y las vistas
class Controlador{
    
    //Carga modelos dentro de la carpeta "modelos"
    public function modelo($modelo){
        //Se trae el archivo que contiene la clase recibida por parametro y se procede a instanciarla $modelo . "<br>";
        require_once("../app/modelos/" . $modelo . ".php");
        //Se instancia la clase respectiva que pide la información necesaria a la BD
        return new $modelo();
    }
    
    //Carga modelos dentro de la carpeta "modelos/complementos"
    public function complementos($complemento){
        //Se trae el archivo que contiene la clase recibida por parametro y se procede a instanciarla $modelo . "<br>";
        require_once("../app/modelos/complementos/" . $complemento . ".php");
        //Se instancia la clase respectiva que pide la información necesaria a la BD
        return new $complemento();
    }

    //Carga la vista
    public function vista($vista, $Datos=[]){
        // se chequea si el archivo vista existe
        if(file_exists("../app/vistas/" . $vista . ".php")){
            require_once("../app/vistas/" . $vista . ".php");
        }
        else{
            die("La vista no existe");
        }
    }

    //Carga una plantilla de correo
    public function correo($correo, $DatosCorreo=[]){
        require_once("../app/vistas/correo/" . $correo . ".php");
        //Se instancia la clase respectiva que pide la información necesaria a la BD
        // return new $correo();
    }
}