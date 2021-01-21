<?php
    class Opciones_C extends Controlador{

        public function __construct(){
            $this->ConsultaOpciones_M = $this->modelo("Opciones_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //llamado desde A_Vitrina.js por medio de la función llamar_Opciones()
        public function index($ID_Tienda, $Seccion, $OpcionSelec){  
            //PENDIENTE - PENDIENTE estas variable se reciben desde ajax y pierden el formato, (cuando son dos palabras el espacio que las separa se pierde) por eso se realiza este switch para poder hacer la consulta con el texto como debe ser.
            // echo $ID_Tienda;
            // echo $Seccion;
          
            $Consulta = $this->ConsultaOpciones_M->consultarOpciones($ID_Tienda, $Seccion);   

            //CONSULTA las caracteristicas de los productos 
            $Caracteristicas = $this->ConsultaOpciones_M->consultarCaracterisicasProducto($ID_Tienda);

            $Datos=[
                'Opciones' => $Consulta, //nombreTienda, slogan, seccion,ID_Producto, ID_Opcion, fotografia, producto, opcion,especificacion, precioBolivar, precioDolar
                'ProductoSelecion' => $OpcionSelec,
                'ID_Tienda' => $ID_Tienda,
                'variosCaracteristicas' => $Caracteristicas //ID_Producto, caracteristica 
            ];
            
            // ******************************************* 
            //ACTUALIZA PRECIOS EN BOLIVARES          
            // require(RUTA_APP . "/controladores/complementos/CambioDolar_C.php");

            // $this->Reconversion = new CalculoDolar_C;
            // $Reconversion = $this->Reconversion->TasaCambio($Datos['']);

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("paginas/opciones_V", $Datos);
        }  

        //CUando se vene del buscador, los parametros se reciben desde E_Inicio.js por medio de la funcion OpcionSeleccionada()
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
        
        //Invocado desde opciones_V.php por rmedio de mostrarDetalles()
        public function productoAmpliado($DatosAgrupados){
            // echo $DatosAgrupados;
            //$DatosAgrupados contiene una cadena con el ID_Tienda y el producto separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode("|", $DatosAgrupados);
            // echo "<pre>";
            // print_r($DatosAgrupados);
            // echo "</pre>";
            // exit();
            
            $ID_EtiquetaAgregar = $DatosAgrupados[0];
            $NombreTienda = substr($DatosAgrupados[1], 1);
            $SloganTienda = substr($DatosAgrupados[2], 1);
            $ID_Tienda = substr($DatosAgrupados[3], 1);
            $Producto = substr($DatosAgrupados[4], 1);
            $Opcion = substr($DatosAgrupados[5], 1);
            $PrecioBolivar = substr($DatosAgrupados[6], 1);
            $Fotografia = substr($DatosAgrupados[7], 1);
            $ID_Producto = substr($DatosAgrupados[8], 1);
            $PrecioDolar = substr($DatosAgrupados[9], 1);
            
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
                'PrecioBolivar' => $PrecioBolivar,
                'PrecioDolar' => $PrecioDolar,
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
            
            $this->vista("inc/headerProducto", $Datos);
            $this->vista("paginas/descr_Producto_V", $Datos);
        } 
        
        public function imagenAmpliado($Fotografia){
            $Datos = $Fotografia;

            $this->vista("paginas/imagenApliada_V", $Datos);
        }
    }
?>    