<?php
//Archivo llamado desde Funciones_Ajax.js por medio de la función llamar_Opciones()
    class Opciones_C extends Controlador{

        public function __construct(){
            $this->ConsultaOpciones_M = $this->modelo("Opciones_M");
        }
        
        //Los parametros se resiven desde Funciones_Ajax.js
        public function index($ID_Tienda, $Producto, $Agregacion, $Cont_Padre, $Cont_a_Clonar){            
            //PENDIENTE - PENDIENTE estas variable se reciben desde ajax y pierden el formato, (cuando son dos palabras el espacio que las separa se pierde) por eso se realiza este switch para poder hacer la consulta con el texto como debe ser.
            
            switch($Producto){ 
                case 'Arepa':
                    $Producto = 'Arepa';
                break;    
                case 'Bebidassinalcohol':
                    $Producto = 'Bebidas sin alcohol';
                break;    
                case 'PizzaGrande':
                    $Producto = 'Pizza Grande';
                break;    
                case 'Papasrellenas':
                    $Producto = 'Papas rellenas';
                break;    
            }

            $Indicadores = $this->ConsultaOpciones_M->consultarOpciones($ID_Tienda, $Producto);   
            $Consulta = $Indicadores->fetchAll(PDO::FETCH_ASSOC);
            $Datos=[
                "Opciones" => $Consulta, //opcion, ID_Opcion, precio, producto
                "AgregarNodo" => $Agregacion,
                "Cont_Pad" => $Cont_Padre,
                "Cont_a_Clonar" => $Cont_a_Clonar
            ];
                    
            $this->vista("paginas/opciones_V", $Datos);
        }        
    }
?>    