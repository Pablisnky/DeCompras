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
                $Nuevo_ID_Tienda = $row['ID_Tienda'];

                //Se añade el ID de cada tienda al array $IDs_Tiendas
                array_push($IDs_Tiendas, $Nuevo_ID_Tienda);
            endforeach;
            
            //Se cambia el array $IDs_Tiendas por una cadena para introducirla en la consulta tipo a BD
            $IDs_Tiendas = implode(",", $IDs_Tiendas);
            // echo $IDs_Tiendas;
            
            //SELECT para verificar tiendas que acepten transferencias como metodo de pago
            $TiendasTransferencias = $this->ConsultaTienda_M->consultarTransferencias($IDs_Tiendas);
            // echo '<pre>';
            // print_r($TiendasTransferencias);
            // echo '</pre>';
            // exit(); 

            //SELECT para verificar tiendas que acepten PagoMovil como metodo de pago
            $TiendasPagoMovil = $this->ConsultaTienda_M->consultarPagoMovil($IDs_Tiendas);
            // echo '<pre>';
            // print_r($TiendasTransferencias);
            // echo '</pre>';
            // exit();

            //SELECT para verificar tiendas que acepten otros medios de pago
            $TiendasOtrosPagos = $this->ConsultaTienda_M->consultarPagoBolivar($IDs_Tiendas);
            // echo '<pre>';
            // print_r($TiendasOtrosPagos);
            // echo '</pre>';
            // exit();

            //SELECT para verificar la cantidad de despachos que ha realizado una tienda
            $TiendasDespachos = $this->ConsultaTienda_M->consultarDespachos($IDs_Tiendas);            
            // echo '<pre>';
            // print_r($TiendasDespachos);
            // echo '</pre>';
            // exit;
            

            //SELECT para verificar la cantidad de despachos que ha realizado una tienda
            $TiendasInconformidades = $this->ConsultaTienda_M->consultarInconformidades($IDs_Tiendas);            
            // echo '<pre>';
            // print_r($TiendasInconformidades);
            // echo '</pre>';
            // exit;

            //CALCULO DE CLIENTES SATISFECHOS
            //Total despachos solicitados
            $PorcentajeSatisfaccion = Array();
            $Nuevo = Array();
            foreach($TiendasDespachos as $row)  :
                $TotalDespachos = $row['Despachos'];
                $ID_Tienda = $row['ID_Tienda'];
                // echo 'Despachos = ' . $TotalDespachos . ' <br>';
                // echo 'ID_Tienda = ' . $ID_Tienda . ' <br>';

                // Total inconformidades
                if($TiendasInconformidades == Array()){
                    $TotalIconformidades = 0;
                }
                else{
                    foreach($TiendasInconformidades as $Row)  :
                        $TotalIconformidades = $Row['Inconformidad'];
                        // echo 'inconformidades = ' . $TotalIconformidades . ' <br>';
                    endforeach;
                }

                // $TotalIconformidades = empty($TotalIconformidades) ? 0 : $Row['Inconformidades'];
                 
                $Satisfaccion = ($TotalDespachos - $TotalIconformidades) * 100 / $TotalDespachos;

                //Se redondea el valor obtenido sin decimales y se añade el simbolo porcentaje
                $Satisfaccion = number_format($Satisfaccion) . ' %'; 
                // echo 'Clientes satisfechos = ' . $Satisfaccion . ' <br>';

                $Nuevo = ['ID_Tienda' => $ID_Tienda, 'Satisfaccion' => $Satisfaccion];

                array_push($PorcentajeSatisfaccion, $Nuevo);
                
                // echo '<pre>';
                // print_r($PorcentajeSatisfaccion);
                // echo '</pre>';
            endforeach;
            
            $Datos = [
                'tiendas_categoria' => $TiendasEnCategoria,//ID_Tienda, nombre_Tien, direccion_Tien, telefono_Tien, fotografia_Tien, categoria 
                'tiendas_transferencias' => $TiendasTransferencias,
                'tiendas_pagomovil' => $TiendasPagoMovil,
                'tiendasOtrosPagos' => $TiendasOtrosPagos, //ID_Tienda, efectivoBolivar, efectivoDolar, acordado
                'tiendas_despachos' => $TiendasDespachos, //ID_Tienda, count(ID_tienda)
                'tiendas_inconformidades' => $TiendasInconformidades,//ID_Tienda, count(inconformidad)
                'tiendas_satisfaccion' => $PorcentajeSatisfaccion,
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("inc/header", $Datos);
            $this->vista("paginas/tiendas_V",$Datos);
        }
    }
?>    