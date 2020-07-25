<?php
    class Opciones_C extends Controlador{

        public function __construct(){
            $this->ConsultaOpciones_M = $this->modelo("Opciones_M");
        }
        
        //Los parametros se resiven desde vFunciones_Ajax.js
        public function index($ID_Tienda, $Producto, $Agregacion, $Cont_Padre, $Cont_a_Clonar){            
            //PENDIENTE - PENDIENTE estas variable se reciben desde ajax y pierden el formato, (cuando son dos palabras el espacio que las separa se pierde) por eso se realiza este switch para poder hacer la consulta con el texto como debe ser.
            
            switch($Producto){ 
                case 'Bebidasconalcohol':
                    $Producto = 'Bebidas con alcohol';
                break;    
                case 'Bebidassinalcohol':
                    $Producto = 'Bebidas sin alcohol';
                break;    
                case 'PizzaGrande':
                    $Producto = 'Pizza Grande';
                break;    
            }

            $Indicadores = $this->ConsultaOpciones_M->consultarOpciones($ID_Tienda, $Producto);   
            $Consulta = $Indicadores->fetchAll(PDO::FETCH_ASSOC);
            
            $Datos=[
                "Inf_Consulta" => $Consulta,
                "AgregarNodo" => $Agregacion,
                "Cont_Pad" => $Cont_Padre,
                "Cont_a_Clonar" => $Cont_a_Clonar
            ];
            
            $this->vista("paginas/opciones_V", $Datos);
        }

            

            
        //Los parametros se resiven desde funcionesVarias.js por medio de verOpciones()
        // public function Delivery($DatosAgrupados){
        //     //$DatosAgrupados contiene una cadena con las variable Departamento y ID_Producto separados por coma, se convierte en array para separar los elementos
        //     $DatosAgrupados = explode(",", $DatosAgrupados);
        //     // print_r($DatosAgrupados);
            
        //     $Departamento = $DatosAgrupados[0];
        //     $ID_Producto = $DatosAgrupados[1];

        //     $Indicadores = $this->ConsultaOpcionesProducto_M->consultarOpcionesDelivery($Departamento, $ID_Producto);   

        //     $Datos = $Indicadores->fetchAll(PDO::FETCH_ASSOC);
                       
        //     foreach($Datos as $row){
        //         $Talla = $row[''];
        //     }

        //     $this->vista("paginas/opcionesProducto_V", $Datos);

        //     $Datos = $Indicadores ;

        //     $this->vista("paginas/vitrina_V", $Datos);
        // }
        
    }
?>    