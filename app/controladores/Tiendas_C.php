<?php    
    class Tiendas_C extends Controlador{

        public function __construct(){
            $this->ConsultaTienda_M = $this->modelo("Tienda_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        //Metodo llamado desde E_inicio.js por medio de VerTiendas() 
        public function index($Categoria){
            switch($Categoria){
                case 'Comida_Rapida':
                    $Categoria = 'Comida Rapida';   
                break;    
                case 'Merceria':
                    $Categoria = 'Mercería';   
                break; 
                case 'Repuesto_automotriz':
                    $Categoria = 'Repuesto automotriz';   
                break;    
                case 'Ropa_Zapato':
                    $Categoria = 'Zapatería';   
                break;     
                case 'Material_Medico_Quirurgico':
                    $Categoria = 'Material Médico Quirúrgico';   
                break;    
                case 'Relojes':
                    $Categoria = 'Joyas y relojería';   
                break;
                case 'Panaderia':
                    $Categoria = 'Panadería';   
                break;
                case 'Artesania':
                    $Categoria = 'Arte';   
                break;
                case 'Ferreteria':
                    $Categoria = 'Ferretería';   
                break;
                case 'Floristeria':
                    $Categoria = 'Floristería';   
                break;
                case 'Construccion':
                    $Categoria = 'Construcción';   
                break;
                case 'Papeleria':
                    $Categoria = 'Papelería';   
                break;  
            }
            
            //Se CONSULTAN las tiendas que estan afiliadas segun la categoria solicitada y que pueden ser publicadas en el catalogo de tiendas
            $IDs_Tiendas = [];
            $TiendasEnCategoria = $this->ConsultaTienda_M->consultarTiendas($Categoria);  

            //Se obtienen los IDs de las tiendas que se encuentran en la categoria

            foreach($TiendasEnCategoria AS $row) :
                $IDs_Tiendas = $row['ID_Tienda'];


            endforeach;
            
            echo $IDs_Tiendas . '<br>';
            exit;
            //SELECT para verificar tiendas con transferencias como metodo de pago
            $TiendasTransferencias = $this->ConsultaTienda_M->consultarTransferencias($IDs_Tiendas);
            
            //SELECT para buscar información de cuentas bancarias de la tienda

            $Datos = [
                'tiendas_categoria' => $TiendasEnCategoria,
                // 'tiendas_transferencias' => $Secciones,
                // 'tiendas_pagomovil' => $Slogan
            ];
            echo "<pre>";
            print_r($Datos['tiendas_categoria']);
            echo "</pre>";
            exit(); 

            $this->vista("inc/header", $Datos);
            $this->vista("paginas/tiendas_V",$Datos);
        }
    }
?>    