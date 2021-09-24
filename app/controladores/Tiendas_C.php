<?php    
    class Tiendas_C extends Controlador{
        private $Categoria;
        private $IDs_Tiendas = [];
        private $TiendasEnCategoria;

        public function __construct(){
            session_start();
             
            $this->ConsultaTienda_M = $this->modelo('Tienda_M');

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        public function index($Categoria){
            switch($Categoria){
                case 'Comida_Rapida':
                    $this->Categoria = 'Comida Rapida';   
                break;    
                case 'Merceria':
                    $this->Categoria = 'Mercería';   
                break; 
                case 'Repuesto_automotriz':
                    $this->Categoria = 'Repuesto automotriz';   
                break;    
                case 'Ropa_Zapato':
                    $this->Categoria = 'Zapatería';   
                break;     
                case 'Material_Medico_Quirurgico':
                    $this->Categoria = 'Material Médico Quirúrgico';   
                break;    
                case 'Relojes':
                    $this->Categoria = 'Joyas y relojería';   
                break;
                case 'Panaderia':
                    $this->Categoria = 'Panadería';   
                break;
                case 'Artesania':
                    $this->Categoria = 'Arte';   
                break;
                case 'Ferreteria':
                    $this->Categoria = 'Ferretería';   
                break;
                case 'Floristeria':
                    $this->Categoria = 'Floristería';   
                break;
                case 'Construccion':
                    $this->Categoria = 'Construcción';   
                break;
                case 'Papeleria':
                    $this->Categoria = 'Papelería';   
                break;   
                case 'Licores':
                    $this->Categoria = 'Licorería';   
                break;     
                default:
                $this->Categoria = $Categoria;
            }

            return $this->Categoria;
        }

        //Metodo llamado desde E_Categorias.js por medio de VerTiendas()
        public function tiendasEnCatalogo($Categoria){ 
            $this->index($Categoria);

            //Sesion creada en Categorias_V.php      
            $Ciudad = $_SESSION['Parroquia'];

            //Se CONSULTAN las tiendas que estan afiliadas en una ciudad segun la categoria solicitada y que pueden ser publicadas en el catalogo de tiendas            
            $this->TiendasEnCategoria = $this->ConsultaTienda_M->consultarTiendas($this->Categoria, $Ciudad); 

            //Se obtienen los IDs de las tiendas que se encuentran en la categoria
            foreach($this->TiendasEnCategoria AS $row) :
                $Nuevo_ID_Tienda = $row['ID_Tienda'];

                //Se añade el ID de cada tienda al array $IDs_Tiendas
                array_push($this->IDs_Tiendas, $Nuevo_ID_Tienda);
            endforeach;
            
            //Se cambia el array $IDs_Tiendas por una cadena para enviarlo como parametro en la consulta a BD
            $this->IDs_Tiendas = implode(',', $this->IDs_Tiendas); 
            
            $this->Reputacion_ModosDePago();
        }

        public function Reputacion_ModosDePago(){    
            //SELECT para verificar tiendas que acepten transferencias como metodo de pago
            $TiendasTransferencias = $this->ConsultaTienda_M->consultarTransferencias($this->IDs_Tiendas);

            //SELECT para verificar tiendas que acepten PagoMovil como metodo de pago
            $TiendasPagoMovil = $this->ConsultaTienda_M->consultarPagoMovil($this->IDs_Tiendas);

            //SELECT para verificar tiendas que acepten Reserve como metodo de pago
            $TiendasReserve = $this->ConsultaTienda_M->consultarReserve($this->IDs_Tiendas);

            //SELECT para verificar tiendas que acepten Paypal como metodo de pago
            $TiendasPaypal = $this->ConsultaTienda_M->consultarPaypal($this->IDs_Tiendas);

            //SELECT para verificar tiendas que acepten Zelle como metodo de pago
            $TiendasZelle = $this->ConsultaTienda_M->consultarZelle($this->IDs_Tiendas);

            //SELECT para verificar tiendas que acepten otros medios de pago
            $TiendasOtrosPagos = $this->ConsultaTienda_M->consultarPagoBolivar($this->IDs_Tiendas);

            //SELECT para verificar la cantidad de despachos que ha realizado una tienda
            $TiendasDespachos = $this->ConsultaTienda_M->consultarDespachos($this->IDs_Tiendas);  
            
            //SELECT que trae los nueve productos destacados por tienda
            $TiendasProductosDestacados = $this->ConsultaTienda_M->consultarProductosDestacados($this->IDs_Tiendas);        

            //SELECT para verificar la cantidad de no conformidades de una tienda
            //$TiendasNoConformidades=$this->ConsultaTienda_M->consultarInconformidades($this->IDs_Tiendas;             
            
            //SELECT para verificar la cantidad de disputas de una tienda
            $TiendasDisputas = $this->ConsultaTienda_M->consultarDisputas($this->IDs_Tiendas);  

            // ******************************************* 
            //CALCULO DE CLIENTES SATISFECHOS

            //Total despachos solicitados
            $PorcentajeSatisfaccion = [];
            $Nuevo = [];
            foreach($TiendasDespachos as $row)  :
                $ID_Tienda = $row['ID_Tienda'];
                $TotalDespachos = $row['Despachos'];

                $TiendasNoConformidades = $this->ConsultaTienda_M->consultarInconformidades($ID_Tienda);

                // Total inconformidades
                if($TiendasNoConformidades == Array()){
                    $TotalIconformidades = 0;
                }
                else{
                    //Por cada tienda se busca la cantidad de no confomidades
                    foreach($TiendasNoConformidades as $Row)  :
                        if($ID_Tienda == $Row['ID_Tienda']){
                            $TotalIconformidades = $Row['Inconformidad'];
                        }
                    endforeach;
                }

                // $TotalIconformidades = empty($TotalIconformidades) ? 0 : $Row['Inconformidades'];
                 
                $Satisfaccion = ($TotalDespachos - $TotalIconformidades) * 100 / $TotalDespachos;

                //Se redondea el valor obtenido sin decimales
                $Satisfaccion = number_format($Satisfaccion); 
                // echo 'Clientes satisfechos = ' . $Satisfaccion . ' <br>';

                $Nuevo = ['ID_Tienda' => $ID_Tienda, 'Satisfaccion' => $Satisfaccion];
                array_push($PorcentajeSatisfaccion, $Nuevo);
            endforeach;

            if($TiendasDespachos == Array()) :
                $TiendasNoConformidades = 0;
            endif;
            
            // Se convierte $this->IDs_Tiendas en un array nuevamente
            $this->IDs_Tiendas = explode(",", $this->IDs_Tiendas);

            //CALCULO DE DISPONIBILIDAD HORARIA            
            require(RUTA_APP . '/controladores/complementos/CalculoApertura_C.php');
            $this->Horario = new CalculoApertura_C;
            
            $DisponibilidaHoraria = $this->Horario->disponibilidadHoraria($this->IDs_Tiendas);

            $Datos = [
                'tiendas_categoria' => $this->TiendasEnCategoria,//ID_Tienda, nombre_Tien, direccion_Tien,  fotografia_Tien, estado_Tien, parroquia_Tien, slogan_Tien, categoria, telefono_AfiCom,
                'tiendas_transferencias' => $TiendasTransferencias,
                'tiendas_pagomovil' => $TiendasPagoMovil,
                'tiendas_reserve' => $TiendasReserve,
                'tiendas_paypal' => $TiendasPaypal,
                'tiendas_zelle' => $TiendasZelle,
                'tiendasOtrosPagos' => $TiendasOtrosPagos, //ID_Tienda, efectivoBolivar, efectivoDolar, acordado
                'tiendas_despachos' => $TiendasDespachos, //ID_Tienda, count(ID_tienda)
                'tiendas_inconformidades' => $TiendasNoConformidades,//ID_Tienda, count(Inconformidad)
                'tiendas_satisfaccion' => $PorcentajeSatisfaccion,
                'tiendas_disputas' => $TiendasDisputas, //ID_Tienda, conunt(Disputas)
                'tiendas_disponibilidad' => $DisponibilidaHoraria,// ID_Tienda, disponibilidad, proximoApertura, horaApertura, Condicional
                'tiendas_productosDestacados' => $TiendasProductosDestacados//nombre_img, precioBolivar
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista('header/header', $Datos);
            $this->vista('view/tiendas_V',$Datos);
        }

        // Invocado en header_Tienda
        public function horarioTienda($DatosAgrupados){    
            //$DatosAgrupados contiene una cadena con el ID_Tienda, el nombre de tienda, la seccion y la opcion separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(',', $DatosAgrupados);
            $ID_Tienda = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1]; 

            require(RUTA_APP . '/controladores/complementos/CalculoApertura_C.php');

            $this->HorarioTienda = new CalculoApertura_C;
            $DisponibilidaHoraria = $this->HorarioTienda->horarioTienda($ID_Tienda);

            $Datos = [
                'id_tienda' => $ID_Tienda,
                'nombreTienda' => $NombreTienda,
                'disponibilidaHoraria' => $DisponibilidaHoraria
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista('header/header_Modal');
            $this->vista('view/tienda/horarioDespacho_V',$Datos);
        }
    }