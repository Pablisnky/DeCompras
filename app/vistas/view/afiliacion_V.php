<section class="section_5">
    <div class="contenedor_42 contenedor_70">
        <h1 class="h1_1">Planes de afiliación para comerciantes.</h1>
        <h2 class="h2_11 borde_3">1 mes gratis <br class="br_2"> al registrar tu tienda</h2>
        <div class='contenedor_84 borde_1'>
            <div class="contenedor_94">
                <P class="p_3 p_5 p_5--complemento">Básico</P>
                <p class="p_11">5 USD/mes</p>
                <p class="p_11 p_11--complemento"><?php echo $Datos['basico'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 50 productos.</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                </ul>   
            </div>
            <div class="contenedor_94">
                <P class="p_3 p_5">Medio</P>
                <p class="p_11">10 USD/mes</p>
                <p class="p_11 p_11--complemento"><?php echo $Datos['medio'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 200 productos</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                </ul>   
            </div>
            <div class="contenedor_94">
                <p class="p_3 p_5">Máximo</p>
                <p class="p_11">15 USD/mes</p>
                <p class="p_11 p_11--complemento"><?php echo $Datos['maximo'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 500 productos</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                </ul>
            </div>        
            <div class="contenedor_94">
                <P class="p_3 p_5">Full</P>
                <p class="p_11">20 USD/mes</p>
                <p class="p_11 p_11--complemento"><?php echo $Datos['full'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 1.500 productos</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                    <li class="li_3"><p>Subdominio</p></li>
                </ul>
            </div>
        </div>

        <div class="contenedor_41">
            <a class="boton boton--altoDosLinneas" href="<?php echo RUTA_URL . '/Registro_C/registroDespachador';?>">Unirme como despachador</a>
            <a class="boton boton--altoDosLinneas" href="<?php echo RUTA_URL . '/Registro_C/registroComerciante';?>">Unirme como comerciante</a>
        </div>  
    </div>
</section>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>