<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  

        <!-- LISTADO CLIENTES -->      
        <p class="font--titulo">Clientes</p> 
        <a class="a--vendedor" href="<?php echo RUTA_URL . '/CuentaVendedor_C/agregarclienteVen'?>">Agregar</a>     
        <table class="tabla_inventario">
            <thead class="tabla--thead">
                <th></th>
                <th class="">Razón social</th>
                <th class="ocultar-movil">Rif</th>
                <th class="">Telefono</th>
                <th class="ocultar-movil">Correo</th>
                <th class="ocultar-movil">Zona</th>
                <th class="ocultar-movil">Dirección</th>
                <th class="ocultar-movil">Código</th>
            </thead>
            <tbody class="tabla_inventario--tbody">
                <?php 
                $Iterador = 1;
                if($Datos['clientes_may'] != Array ()){
                    foreach($Datos['clientes_may'] as $row)  :   ?>
                    <tr class="tabla_inventario__tr"> 
                        <td class="td--center"><?php echo $Iterador; ?></td>
                        <td><?php echo $row['nombre_AfiMin'];?></td>
                        <td class="ocultar-movil"><?php echo $row['rif_AfiMin'];?></td> 
                        <td><?php echo $row['telefono_AfiMin'];?></td> 
                        <td class="ocultar-movil"><?php echo $row['correo_AfiMin'];?></td>
                        <td class="ocultar-movil"><?php echo $row['zona_AfiMin'];?></td>
                        <td class="ocultar-movil"><?php echo $row['direccion_AfiMin'];?></td> 
                        <td class="font--mono ocultar-movil"><?php echo $row['codigodespacho'];?></td>
                    </tr> <?php
                    $Iterador ++;
                    endforeach; 
                }
                else{   ?>
                    <tr class="tabla_inventario__tr">  
                        <td class="td--alerta" colspan="7">Sin clientes registrados</td>
                    </tr>
                    <?php
                }   ?>
            </tbody>
        </table>
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_vendedores() -->
    <div id="Mostrar_vendedor"></div>


    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/E_Cuenta_editarMayorista.js?v=' . rand();?>"></script>  -->
    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/A_Cuenta_vendedoresMay.js?v=' . rand();?>"></script> -->
        
    <?php include(RUTA_APP . '/vistas/footer/footer.php');
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>