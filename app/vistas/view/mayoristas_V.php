<section class="section_11">
    <div class='contenedor_10'>
        <section class="contenedor_15--tarjeta">
            <div class="contenedor_15 borde_1 borde_1--color adelante">
                <div class="contenedor_120 contenedor_120__mayorista" style="background-image: url('public/images/proveedor/Don_Rigo/Portada_ant.jpg')">
        
                <!-- BOTONES POSTERIORES-->
                <?php
                foreach($Datos['mayoristas_afiliados'] as $Row) :
                    $ID_Mayorista = $Row['ID_Mayorista'];
                    $Nombre_Mayorista = $Row['nombreMay'];
                    ?>
                    <article class="Componente_boton">
                        <div class="contBoton contBoton--100" id="">
                            <label class="boton boton--corto" onclick="AtrasTarjetaMayorista()">Sobre nosotros</label>

                            <label class="boton boton--corto" onclick="mayorista('<?php echo $ID_Mayorista;?>','<?php echo $Nombre_Mayorista;?>')">Entrar</label>
                        </div>
                    </article>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
        </section>
    </div>
</section>
		
<script src="<?php echo RUTA_URL . '/public/javascript/E_Mayoristas.js';?>"></script>

<?php include(RUTA_APP . "/vistas/footer/footer.php");?>