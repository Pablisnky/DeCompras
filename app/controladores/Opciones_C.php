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

            //CONSULTA las caracteristicas de los productos 
            $Consulta_2 = $this->ConsultaOpciones_M->consultarCaracterisicasProducto($ID_Tienda);
            $Caracteristicas = $Consulta_2->fetchAll(PDO::FETCH_ASSOC); 

            $Datos=[
                'Opciones' => $Consulta, //nombreTienda, slogan, seccion, ID_Opcion, fotografia, producto, opcion, precio
                'ProductoSelecion' => $OpcionSelec,
                'ID_Tienda' => $ID_Tienda,
                'variosCaracteristicas' => $Caracteristicas //ID_Producto, caracteristica 
            ];
                
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("paginas/opciones_V", $Datos);
        }  

        // Los parametros se reciben desde E_Inicio.js por medio de la funcion OpcionSeleccionada()
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
        
        //Invocado desde opciones_V.php
        public function productoAmpliado($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Tienda y el producto separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            // echo "<pre>";
            // print_r($DatosAgrupados);
            // echo "</pre>";
            // exit();
            
            $ID_EtiquetaAgregar = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1];
            $SloganTienda = $DatosAgrupados[2];
            $ID_Tienda = $DatosAgrupados[3];
            $Producto = $DatosAgrupados[4];
            $Opcion = $DatosAgrupados[5];
            $Precio = $DatosAgrupados[6];
            $Fotografia = $DatosAgrupados[7];
            $ID_Producto = $DatosAgrupados[8];
            
            //CONSULTA las caracteristicas del producto seleccionado
            $Consulta = $this->ConsultaOpciones_M->consultarCaracterisicaProductoEsp($ID_Producto);
            $Caracteristicas = $Consulta->fetchAll(PDO::FETCH_ASSOC); 

            //CONSULTA las imagenes del producto seleccionado
            $Consulta_3 = $this->ConsultaOpciones_M->consultarImagenesProducto($ID_Producto);
            $Imagenes = $Consulta_3->fetchAll(PDO::FETCH_ASSOC); 

            $Datos=[
                'NombreTienda' => $NombreTienda, 
                'SloganTienda' => $SloganTienda,
                'ID_Tienda' => $ID_Tienda,
                'Producto' => $Producto,
                'Opcion' => $Opcion,
                'Precio' => $Precio,
                'Fotografia_1' => $Fotografia,
                'ID_Producto' => $ID_Producto, 
                'ID_EtiquetaAgregar' => $ID_EtiquetaAgregar, 
                'Caracteristicas' => $Caracteristicas,
                'Imagenes' => $Imagenes
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("paginas/descr_Producto_V", $Datos);
        }  
    }
?>    