<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/casita/style_casita.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/camion/style_camion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>		

<?php
    //SDatos se recibe de Menu_C/noConformidad
    // echo '<pre>';
    // print_r($Datos);
    // echo '</pre>';
    // exit;
?> 

<section class="section_5">
    <div class="contenedor_42 contenedor_70">
        <h1 class="h1_1">Reporte de no conformidades</h1>
        <section>
            <div>
                <table class="tabla_1">
                    <thead>
                        <th>Código Despacho</th>
                        <th>Tienda</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $Datos['id_pedido']?></td>
                            <td><?php echo $Datos['tienda']?></td>
                            <td><?php echo $Datos['fecha']?></td>
                            <td><?php echo $Datos['hora']?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section>
            <div class=' borde_1'>
                <p>Especifique los fallos que encontró en el servicio</p> 
                <input type="checkbox" name=""/>
                <label>El despacho llego despues del tiempo especificado.</label>
                <br>
                <input type="checkbox" name=""/>
                <label>El producto no era lo que se pidio.</label>
                <br>
                <input type="checkbox" name=""/>
                <label>El producto llego en mal estado.</label>
                <br>
                <input type="checkbox" name=""/>
                <label>No despacho aún no llega.</label>
                <p>Otra condicion</p>
                <textarea></textarea>
                <input class="" type="text"/>                
            </div>
        </section>
        <div class="contenedor_41">
            <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroDespachador';?>">Cerrar</a>
            <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroComerciante';?>">Enviar</a>
        </div>  
    </div>
</section>
		
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>