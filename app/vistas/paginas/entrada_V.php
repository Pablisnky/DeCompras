<?php 
require(RUTA_APP . "/vistas/inc/header_AfiCom.php"); 

    //Se verifica que la sesion del usuario halla sido creada y exista
    // if(isset($_SESSION["ID_Afiliado"])){ 
        // require(RUTA_APP . "/vistas/inc/header.php");
        
        //Se traen los datos obtenidos en la consulta Entrada_C
        // foreach($Datos["Nombre"] as $Nombres){
        //     $NombreAfiliado = $Nombres -> nombre;
        //     // echo "Nombre: " . $NombreAfiliado  . "<br>"; 
        // } 
        $Contador = 1;
        ?>

    <h1 class="h1_3">Empanadas la 13</h1>
        <div class="contenedor_46"> 
            <p class="p_6">Stock de productos ofertados</p>
            <table class="tabla_1">
                <thead class="">
                    <th class="th_5"></th>
                    <th class="">IMAGEN</th>
                    <th class="th_6">PRODUCTO</th>
                    <th class="th_7">DESCRIPCION</th>
                    <th class="th_8">PRECIO</th>
                    <th></th>
                </thead>   
                <tbody>     
                    <?php
                    foreach($Datos as $arr) :
                        $Producto = $arr["producto"];
                        $Opcion = $arr["opcion"];
                        $Precio = $arr["precio"];
                            ?>
                            <tr class="tr_1">
                                <td><?php echo $Contador;?></td>
                                <td class="">
                                <img class="imagen_4"  src="<?php echo RUTA_URL?>/images/<?php echo $FotoInm->nombre_img;?>" alt="Foto"> 
                                </td>
                                <td class="td_4"><?php echo $Producto;?></td>
                                <td class="td_4"><?php echo $Opcion;?></td>
                                <td class="td_4"><?php echo $Precio;?></td>
                                <td><a class="a_5" href="">Eliminar</a> / <a class="a_5" href="">Actualizar</a></td>
                                <td></td>
                            </tr> 
                            <?php  
                            $Contador ++;   
                    endforeach;  
                        ?> 
                </tbody>
            </table>   
        </div>

        <?php
    // }
    // else{
    //     //la sesion no existe y se redirige a la pagina de inicio
    //     header("location:" . RUTA_URL);
    // }
    
    // include(RUTA_APP . "/vistas/inc/footer.php");
    ?>