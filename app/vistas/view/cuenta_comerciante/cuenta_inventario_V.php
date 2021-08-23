<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

    //$Datos viene del metodo Cuenta_C/actualizarProducto
    // foreach($Datos['especificaciones'] as $arr) :
    //     $ID_Producto = $arr['ID_Producto'];
    //     $ID_Opcion = $arr['ID_Opcion'];
    //     $ID_Seccion = $arr['ID_Seccion'];
    //     $ID_SP = $arr['ID_SP'];
    //     $Producto = $arr['producto'];
    //     $Opcion = $arr['opcion'];
    //     $PrecioBolivar = $arr['precioBolivar'];
    //     $PrecioDolar = $arr['precioDolar'];
    //     $Seccion = $arr['seccion'];
    //     $Disponible = $arr['disponible'];
    //     $Cantidad = $arr['cantidad'];
    // endforeach;  

    // //$Datos viene del metodo Cuenta_C/actualizarProducto
    // foreach($Datos['imagenesVarias'] as $arr) :
    //     $Imagenes = $arr['nombre_img']; 
    // endforeach;  

    // foreach($Datos['imagenPrin'] as $arr) :
    //     $ID_ImagenPrincipal = $arr['ID_Imagen'];
    //     $ImagenPrincipal = $arr['nombre_img'];
    //     $ImgSeccion = $arr['fotoSeccion'];
    // endforeach;  
    
    // echo "<pre>";
    // print_r($Datos);
    // echo "</pre>";
    // exit();  
    ?>
            
    <div class="contenedor_42">    
        <table class="tabla_inventario">
            <thead class="tabla_inventario--thead">
                <th class="">Seccion</th>
                <th class="">Producto</th>
                <th class="">Descripcion</th>
                <th class="">Precio Bs.</th>
                <th class="">Existencia</th>
                <th class="tabla_inventario__th--fecha">Fecha ultima reposición</th>
                <th class="tabla_inventario__th--fecha">Ajuste por reposición</th>
                <th class="tabla_inventario__th--fecha">Fecha ajuste precio proveedor</th>
                
            </thead>
            <tbody class="tabla_inventario--tbody">
                <?php 
                foreach($Datos['inventario'] as $row)  :   ?>
                <tr class="tabla_inventario__tr">
                    <td><?php echo $row['seccion'];?></td>
                    <td><?php echo $row['producto'];?></td>
                    <td><?php echo $row['opcion'];?></td> 
                    <td><?php echo number_format($row['precioBolivar'], 0, ",", ".");?></td> 
                    <td class="tabla_inventario__td"><?php echo $row['cantidad'];?></td>
                    <td class="tabla_inventario__td"><?php echo $row['fecha_dotacion'];?></td>
                    <td class="tabla_inventario__td"><?php echo $row['incremento'];?></td>  
                    <td class="tabla_inventario__td"><?php echo $row['fecha_reposicion'];?></td>  
                    <td><a href="#">historico</a></td>
                </tr> <?php
                endforeach; ?>
            </tbody>
        </table>
        <br>
        <P>Con esta información se mandan notificaciones via web socket cuando se debe ajustar el precio por inflación (semanalmente recomendado) al igual que notificación para repoer inventario</P>
    </div>
    

    <!-- <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar_prod.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar_prod.js?v=' . rand();?>"></script>  -->

    <?php include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    header("location:" . RUTA_URL. "/Login_C");
}   ?>