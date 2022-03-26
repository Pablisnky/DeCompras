<?php
    class Opciones_Mayorista_C extends Controlador{

        public function __construct(){
            $this->ConsultaOpcionesMayorista_M = $this->modelo("Opciones_Mayorista_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //llamado desde A_Vitrina_Mayorista.js por medio de la función llamar_OpcionesMayorista()
        public function index($ID_Mayorista, $ID_Seccion){  
            // echo $ID_Mayorista . '<br>';
            // echo $ID_Seccion . '<br>';
            // exit;
            
            $Opciones = $this->ConsultaOpcionesMayorista_M->consultarOpcionesMayorista($ID_Mayorista, $ID_Seccion); 

            //CONSULTA las caracteristicas de los productos del mayorista
            $Caracteristicas = $this->ConsultaOpcionesMayorista_M->consultarCaracterisicasProducto($ID_Mayorista);

            //CONSULTA la fotografia de cada producto 
            $Fotografia = $this->ConsultaOpcionesMayorista_M->consultarFotografiaPrincipal($ID_Mayorista, $ID_Seccion);

            $Datos=[
                'Opcionesmay' => $Opciones, //nombreMay, ID_ProductoMay, productoMay, ID_OpcionMay, opcionMay, precioBolivarMay, precioDolarMay, cantidadMay, disponibleMay, seccionMay, nombre_imgMay
                // 'ProductoSelecion' => $OpcionSelec,
                'ID_Mayorista' => $ID_Mayorista,
                // 'variosCaracteristicas' => $Caracteristicas, //ID_Producto, caracteristica 
                'fotografia' => $Fotografia //ID_Producto, nombre_img 
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("view/opciones_Mayorista_V", $Datos);
        }  

        //Cuando se viene del buscador, los parametros se reciben desde E_Inicio.js por medio de la funcion OpcionSeleccionada()
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
            // exit();
            
            $this->vista("header/header_Tienda");
            $this->vista("view/opciones_V", $Datos);
        }       
        
        //Invocado desde opciones_Mayorista_V.php por medio de mostrarDetalles()
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
            $ID_Tienda = substr($DatosAgrupados[2], 1);
            $Producto = substr($DatosAgrupados[3], 1);
            $Opcion = substr($DatosAgrupados[4], 1);
            $PrecioBolivar = substr($DatosAgrupados[5], 1);
            $Fotografia = substr($DatosAgrupados[6], 1);
            $ID_Producto = substr($DatosAgrupados[7], 1);
            $PrecioDolar = substr($DatosAgrupados[8], 1);
            $Existencia = substr($DatosAgrupados[9], 1);
            $Disponible = substr($DatosAgrupados[10], 1);

            $Datos=[ 
                'NombreTienda' => $NombreTienda, 
                'ID_Tienda' => $ID_Tienda,
                'Producto' => $Producto,
                'Opcion' => $Opcion,
                'PrecioBolivar' => $PrecioBolivar,
                'PrecioDolar' => $PrecioDolar,
                'Existencia' => $Existencia,
                'Disponible' => $Disponible,
                'Fotografia_1' => $Fotografia,
                'ID_Producto' => $ID_Producto, 
                'ID_EtiquetaAgregar' => $ID_EtiquetaAgregar
            ];      

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("header/headerProductoMay", $Datos);
            $this->vista("view/descr_ProductoMayorista_V", $Datos);
        } 
        
        public function imagenAmpliado($Fotografia){
            $Datos = $Fotografia;

            $this->vista("view/imagenApliada_V", $Datos);
        }
    }