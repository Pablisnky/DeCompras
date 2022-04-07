<?php   

// ventana hija de cuenta_pedidodetalleVen_V.php
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    

    <section class="sectionModal">
        <span class="material-icons-outlined spanCerrar spanCerrar--fijo" onclick="Regresa_A_Pedido_1()">arrow_back</span>
        <div class="contenedor_24">

            <div class="contenedor_108" id="Contenedor_42">     

                <!-- DETALLE DEL PEDIDO -->        
                <table class="tabla">       
                    <caption>Productos en pedido</caption>      
                    <thead class="tabla--thead">
                        <th class="tabla--thead--column--2">Producto</th>
                        <th class="">Precio</th>
                        <th class=""></th>
                    </thead>
                    <tbody class="">
                        <?php 
                        foreach($Datos['detallePedido'] as $row) :  ?>  
                            <tr class="tabla--tr_2"> 
                                <td class=""><?php echo $row['producto_May'] . ' ' . $row['opcion_May'];?></td>
                                <td class="font--mono"><?php echo $row['precio_May'];?></td>
                                <td onclick="Llamar_EliminarProducto('<?php echo $row['ID_DetallePedido_May']?>')"><span class="material-icons-outlined cursor--pointer">cancel</span></td>
                            </tr> 
                            <tr class="tabla--tr_1"></tr>
                            <?php 
                        endforeach; 
                        ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </section>

    <script src="<?php echo RUTA_URL . '/public/javascript/A_removeProductosVen.js?v=' . rand();?>"></script>     
    
    <script>
        function Regresa_A_Pedido_1(){
            window.close()
        }
        
        // invocada desde A_removeProductosVen.js
        function Regresa_A_Pedido_2(ID_Producto_A_Eliminar){
            window.opener.document.getElementById(ID_Producto_A_Eliminar).innerHTML = '';
            window.close()
        }
    </script> 
    
        
    <?php
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>