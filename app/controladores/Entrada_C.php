<?php
    session_start();

    //Sesion creada en Login_C
    $ID_Tienda = $_SESSION["ID_Tienda"];

    class Entrada_C extends Controlador{
        public function __construct(){
            $this->ConsultaEntrada_M = $this->modelo("Entrada_M");
        }
        
        public function index($ID_Tienda){
            //CONSULTA los productos de una tienda en especifico
            $Consulta = $this->ConsultaEntrada_M->consultarProductosTienda($ID_Tienda);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $this->vista("paginas/entrada_V", $Datos);
        }
    }
?>    