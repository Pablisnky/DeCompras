<?php
    class OpcionesProducto_C extends Controlador{

        public function __construct(){
            $this->ConsultaOpcionesProducto_M = $this->modelo("OpcionesProducto_M");
        }
        
        //Los parametros se resiven desde funcionesVarias.js por medio de verOpciones()
        public function index($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con las variable Departamento y ID_Producto separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            // print_r($DatosAgrupados);
            
            $Departamento = $DatosAgrupados[0];
            $ID_Producto = $DatosAgrupados[1];

            $Indicadores = $this->ConsultaOpcionesProducto_M->consultarOpciones($Departamento, $ID_Producto);   
            $Datos = $Indicadores->fetchAll(PDO::FETCH_ASSOC);
                       
            foreach($Datos as $row){
                $Talla = $row['talla'];
            }

            $this->vista("paginas/opcionesProducto_V", $Datos);















            $Datos = $Indicadores ;

            $this->vista("paginas/vitrina_V", $Datos);
        }
        
    }
?>    