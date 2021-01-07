<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/casita/style_casita.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/camion/style_camion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>		

<section class="section_5">
    <div class="contenedor_42 contenedor_70">
        <h1 class="h1_1">Planes de afiliación para comerciantes.</h1>
        <h2 class="h2_11">1 mes gratis <br class="br_2"> al registrar tu tienda</h2>
        <div class='contenedor_84 contenedor_93 borde_1'>
            <div class="contenedor_94">
                <P class="p_3 p_5">Emprendedor</P>
                <p class="p_11">2 USD/mes</p>
                <p class="p_1"><?php echo $Datos['emprendedor'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 5 productos.</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>   
            </div>
            <div class="contenedor_94">
                <P class="p_3 p_5">Básico</P>
                <p class="p_11">5 USD/mes</p>
                <p class="p_1"><?php echo $Datos['basico'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 30 productos.</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>   
            </div>
            <div class="contenedor_94">
                <P class="p_3 p_5">Medio</P>
                <p class="p_11">8 USD/mes</p>
                <p class="p_1"><?php echo $Datos['medio'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 200 productos</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>   
            </div>
            <div class="contenedor_94">
                <p class="p_3 p_5">Máximo</p>
                <p class="p_11">13 USD/mes</p>
                <p class="p_1"><?php echo $Datos['full'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 500 productos</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>
            </div>        
            <div class="contenedor_94">
                <P class="p_3 p_5">Full</P>
                <p class="p_11">20 USD/mes</p>
                <p class="p_1"><?php echo $Datos['maximo'];?> Bs./mes</p>
                <ul class="ul_1">
                    <li class="li_3"><p>Catalogo hasta 1.500 productos</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                    <li class="li_3"><p>Subdominio</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>
            </div>
            <!-- <div class="contenedor_94">
                <p class="p_3 p_5">Especial</p>
                <p class="p_11">10% de la venta</p>
                <ul>
                    <li class="li_3"><p>Aplica a obras de arte</p></li>
                    <li class="li_3"><p>Sin tarifa mensual de soporte</p></li>
                    <li class="li_3"><p>Link de acceso directo a tienda.</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>
            </div> -->
        </div>
        <div class="contenedor_41">
            <a class="boton boton--altoDosLinneas" href="<?php echo RUTA_URL . '/Registro_C/registroDespachador';?>">Unirme como despachador</a>
            <a class="boton boton--altoDosLinneas" href="<?php echo RUTA_URL . '/Registro_C/registroComerciante';?>">Unirme como comerciante</a>
        </div>  
    </div>
</section>
		
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>