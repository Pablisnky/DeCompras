<?php
//Archivo llamado desde Funciones_Ajax.js por medio de llamar_PedidoEnCarrito()

    class Carrito_C extends Controlador{

        public function __construct(){
            $this->ConsultaCarrito_M = $this->modelo("Carrito_M");
        }
    
        public function index($PedidoCarrito){   
            //SELECT que contien el producto y el precio
            $Pedido = $this->ConsultaCarrito_M->consultarPedido($PedidoCarrito);   
            $Datos = $Pedido->fetchAll(PDO::FETCH_ASSOC);

            //Se obtiene la cantidad de cada producto(pero por ID_Opcon se debe transformar ese Id en nombre de producto)

            // echo "<br><br>";
            // print_r($PedidoCarrito);
            // $PedidoCarrito = explode(",", $PedidoCarrito);            
            // $Valores = array_count_values($PedidoCarrito);
            // print_r($Valores);

            $this->vista("paginas/carrito_V");
        }        
    }
?>    