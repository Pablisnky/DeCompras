<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  
    
        <p class="font--titulo">Mis clientes</p> 
        <a class="a--vendedor" href="<?php echo RUTA_URL . '/CuentaVendedor_C/agregarclienteVen'?>">Agregar</a> 
        
        <!-- LISTADO CLIENTES --> 
        <table class="tabla_inventario">            
            <thead class="tabla_inventario--thead">
                <th class="th--n"></th>
                <th class="th_10">Razon social</th>
                <th class="th_5">Código despacho</th>
            </thead>
            <?php
            if($Datos['clientes_ven'] != Array ()){ ?>
                <tbody class="tabla_inventario--tbody">
                    <?php 
                    $Iterador = 1;
                    foreach($Datos['clientes_ven'] as $row) :  
                        $ID_Minorista = $row['ID_AfiliadoMin'];?>
                        <tr class="tabla_inventario__tr" onclick="Llamar_clientesVen('<?php echo $ID_Minorista;?>')"> 
                        <td class="td--center"><?php echo $Iterador; ?></td>
                        <td><?php echo $row['nombre_AfiMin'];?></td>
                        <td class="font--mono"><?php echo $row['codigodespacho'];?></td>
                    </tr> <?php 
                    $Iterador ++;
                    endforeach; 
                    ?>
                </tbody>
                <?php
            }  
            else{   ?>
                <tr>
                    <td colspan="3"><p class="td--alerta">Sin clientes registrados</p></tr>
                <?php
            }   ?>
        </table> 
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_clientesVen() -->
    <div id="Mostrar_cliente"></div>


    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_clienteVen.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_clientesVen.js?v=' . rand();?>"></script> 
        
    <?php include(RUTA_APP . '/vistas/footer/footer.php');
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>