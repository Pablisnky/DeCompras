<?php
//Archivo llamado desde Funciones_Ajax.js por medio de la función llamar_Opciones()
    class Opciones_C extends Controlador{

        public function __construct(){
            $this->ConsultaOpciones_M = $this->modelo("Opciones_M");
        }
        
        //Los parametros se resiven desde A_Vitrina.js
        public function index($ID_Tienda, $Seccion, $OpcionSelec){  
            //PENDIENTE - PENDIENTE estas variable se reciben desde ajax y pierden el formato, (cuando son dos palabras el espacio que las separa se pierde) por eso se realiza este switch para poder hacer la consulta con el texto como debe ser.
            // echo $ID_Tienda;
            // echo $Seccion;
            $Indicadores = $this->ConsultaOpciones_M->consultarOpciones($ID_Tienda, $Seccion);   
            $Consulta = $Indicadores->fetchAll(PDO::FETCH_ASSOC);

            $Datos=[
                'Opciones' => $Consulta, //seccion, ID_Opcion, fotografia, producto, opcion, precio
                'ProductoSelecion' => $OpcionSelec
            ];
                
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            
            $this->vista("paginas/opciones_V", $Datos);
        }  

        // Los parametros se reciven desde E_Inicio.js por medio de la funcion OpcionSeleccionada()
        public function PosicionarEnProducto($DatosAgrupados){ 
            //$DatosAgrupados contiene una cadena con el ID_Tienda y la seccion separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Tienda = $DatosAgrupados[0];
            $Seccion = $DatosAgrupados[1];         
           
            $Indicadores = $this->ConsultaOpciones_M->consultarOpciones($ID_Tienda, $Seccion);   
            $Consulta = $Indicadores->fetchAll(PDO::FETCH_ASSOC);

            $Datos=[
                "Opciones" => $Consulta, //opcion, ID_Opcion, precio, producto
            ];
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            //         exit();
            
            $this->vista("inc/header_Tienda");
            $this->vista("paginas/opciones_V", $Datos);
        }       
    }
?>    