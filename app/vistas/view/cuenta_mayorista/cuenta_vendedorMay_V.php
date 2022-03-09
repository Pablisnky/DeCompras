<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  

        <!-- LISTADO VENDEDORES -->      
        <a class="boton a--vendedor" href="<?php echo RUTA_URL . '/CuentaMayorista_C/agregarVendedor'?>">Agregar</a>     
        <table class="tabla_inventario">
            <thead class="tabla_inventario--thead">
                <th></th>
                <th class="">Nombre</th>
                <th class="">Apellido</th>
                <th class="">Cedula</th>
                <th class="">Telefono</th>
                <th class="">correo</th>
                <th class="">Zona</th>
                <th class="tabla_inventario__th--fecha">Status</th>
            </thead>
            <tbody class="tabla_inventario--tbody">
                <?php 
                $Iterador = 1;
                foreach($Datos['vendedores'] as $row)  :   ?>
                <tr class="tabla_inventario__tr">
                    <td><?php echo $Iterador; ?></td>
                    <td><?php echo $row['nombre_AfiVen'];?></td>
                    <td><?php echo $row['apellido_AfiVen'];?></td> 
                    <td><?php echo $row['cedula_AfiVen'];?></td> 
                    <td><?php echo $row['telefono_AfiVen'];?></td>
                    <td><?php echo $row['correo_AfiVen'];?></td>
                    <td><?php echo $row['zona_AfiVen'];?></td> 
                    <td class="tabla_inventario__td"><?php echo $row['Status_AfiVen'];?></td>  
                </tr> <?php
                $Iterador ++;
                endforeach; ?>
            </tbody>
        </table>
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_vendedores() -->
    <div id="Mostrar_vendedor"></div>


    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_vendedoresMay.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/Municipios.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/parroquias.js?v=' . rand();?>"></script> 
        
    <?php include(RUTA_APP . '/vistas/footer/footer.php');
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>