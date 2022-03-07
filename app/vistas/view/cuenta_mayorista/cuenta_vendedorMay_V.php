<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>
    
    <!-- CDN iconos de font-awesome-->
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>

    <!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  

        <!-- LISTADO VENDEDORES -->      
        <a class="boton a--vendedor" href="<?php echo RUTA_URL . '/Mayorista_C/agregarVendedor'?>">Agregar</a>     
        <table class="tabla_inventario">
            <thead class="tabla_inventario--thead">
                <th class="">Nombre</th>
                <th class="">Apellido</th>
                <th class="">Cedula</th>
                <th class="">Telefono</th>
                <th class="">Zona</th>
                <th class="">Código</th>
                <th class="tabla_inventario__th--fecha">Status</th>
            </thead>
            <tbody class="tabla_inventario--tbody">
                <?php 
                foreach($Datos['vendedores'] as $row)  :   ?>
                <tr class="tabla_inventario__tr">
                    <td><?php echo $row['nombre_AfiVen'];?></td>
                    <td><?php echo $row['apellido_AfiVen'];?></td> 
                    <td><?php echo $row['cedula_AfiVen'];?></td> 
                    <td><?php echo $row['telefono_AfiVen'];?></td>
                    <td><?php echo $row['zona_AfiVen'];?></td> 
                    <td class="tabla_inventario__td"><?php echo $row['codigo_AfiVen'];?></td>
                    <td class="tabla_inventario__td"><?php echo $row['Status_AfiVen'];?></td>  
                </tr> <?php
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