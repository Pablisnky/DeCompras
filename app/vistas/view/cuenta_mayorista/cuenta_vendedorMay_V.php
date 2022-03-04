<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];

    // //$Datos viene de Cuenta_C/Editar
    // foreach($Datos['datosResposable'] as $row){
    //     $Nombre_AfiCom =  $row['nombre_AfiCom'];
    //     $Apellido_AfiCom = $row['apellido_AfiCom']; 
    //     $Cedula_AfiCom = $row['cedula_AfiCom'];
    //     $Telefono_AfiCom = $row['telefono_AfiCom'];
    //     $Correo_AfiCom = $row['correo_AfiCom'];
    //     $Foto_AfiCom = $row['fotografia_AfiCom'];
    // }
    
    // //$Datos viene de Cuenta_C/Editar
    // foreach($Datos['datosTienda'] as $row){
    //     $Nombre_Tien =  $row['nombre_Tien'];
    //     $Estado_Tien = $row['estado_Tien'];
    //     $Municipio_Tien = $row['municipio_Tien'];
    //     $Parroquia_Tien = $row['parroquia_Tien'];
    //     $Direccion_Tien = $row['direccion_Tien']; 
    //     $Slogan_Tien = $row['slogan_Tien'];
    //     $Foto_Tien = $row['fotografia_Tien']; 
    //     $Desactivar_Tien = $row['desactivar_Tien'];
    // }  
    ?>
    
    <!-- CDN iconos de font-awesome-->
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>

    <!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  

        <!-- LISTADO VENDEDORES -->            
        <table class="tabla_inventario">
            <thead class="tabla_inventario--thead">
                <th class="">Nombre</th>
                <th class="">Apellido</th>
                <th class="">Zona</th>
                <th class="">Código</th>
                <th class="tabla_inventario__th--fecha">Fecha incorporación</th>
                <th class="tabla_inventario__th--fecha">Status</th>
                <th class="tabla_inventario__th--fecha">Fecha desincorporación</th>
            </thead>
            <tbody class="tabla_inventario--tbody">
                <?php 
                foreach($Datos['inventario'] as $row)  :   ?>
                <tr class="tabla_inventario__tr">
                    <td><?php echo $row['seccion'];?></td>
                    <td><?php echo $row['producto'];?></td>
                    <td><?php echo $row['opcion'];?></td> 
                    <td class="tabla_inventario__td"><?php echo $row['cantidad'];?></td>
                    <td class="tabla_inventario__td"><?php echo $row['fecha_dotacion'];?></td>
                    <td class="tabla_inventario__td"><?php echo $row['incremento'];?></td>  
                    <td class="tabla_inventario__td"><?php echo $row['fecha_reposicion'];?></td>  
                    <td><a href="#">historico</a></td>
                </tr> <?php
                endforeach; ?>
            </tbody>
        </table>

            <!-- DATOS TIENDA -->

            <!-- CATEGORIAS --> 

            <!-- SECCIONES -->
            
            <!-- HORARIO -->

            <!-- OFERTAS -->
            
            <!-- LO MÁS PEDIDO -->

            <!-- CUENTAS TRANSFERENCIAS -->          
            
            <!-- CUENTAS PAGOMOVIL -->           
            
            <!-- CUENTAS RESERVE -->    
            
            <!-- CUENTAS PAYPAL -->
            
            <!-- CUENTAS ZELLE -->
            
            <!-- OTROS MEDIOS DE PAGO -->
            
            <!-- MENU INDICE -->
        <section>   <!--id="Contenedor_83"--> 
            <div class="contenedor_83 borde_1">
                <a class="marcador" href="#marcador_01">Agregar</a>
                <div class="contenedor_49 contenedor_101">
                    <input class="ocultar" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>"/>
                    <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                </div>   
            </div>
        </section> 
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_vendedores() -->
    <div id="Mostrar_vendedor"></div>


    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_vendedoresMay.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/Municipios.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/parroquias.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/Bancos.js?v=' . rand();?>"></script> 
        
    <?php include(RUTA_APP . '/vistas/footer/footer.php');
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>