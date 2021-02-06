<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>

    <section class="section_1">
        <div class="contenedor_37"  id="Contenedor_37">
            <h1 class="h1_2">PedidoRemoto</h1>
            <!-- <h2 class="h2_4">Tu tienda en toda la ciudad</h2> -->
            <h2 class="h2_4">MarketPlace</h2>
        </div>
        <div class="borrar" style="background-image: url('<?php echo RUTA_URL?>/public/images/Portada.jpg');">
            <div class="Contenedor_34" id="BotonVer">
                <label class="section_1__boton borde_1"><a class="a_3 a_3A" href="<?php echo RUTA_URL . '/Categoria_C';?>">Ver tiendas</a></label>
            </div>
        </div>
        <div class="slider">
            <ul>
                <li><label for="Li_1"><span>compras y despachos</span><br> en tiendas de tu ciudad.</label></li>
                <li><label for="Li_2"><span>e-commerce</span><br> para pequeños comercios y emprendimientos.</label></li> 
                <li><label for="Li_3">Ideal para ventas de comida rapida, minimarket, fruterías, panaderías, ferreterías, bodegas, y más.</label>
                <li><label>Registra tu tienda por<br class="br_2"> <span>98% menos</span> <br class="br_2">del costo de la renta de un local comercial.</label></li>
                <li><label for="Li_1">Permite a tus clientes realizar compras en tu tienda virtual con <span>Pagos directos</span> <br class="br_2"> a tus cuentas.</label></li>
            </ul>
        </div>
    </section>
    
    <section class="section_1 section_1--vh" id="Section_1">
        <div class="borrar" style="background-image: url('<?php echo RUTA_URL?>/public/images/Portada_2.jpg');">
            <div class="section_1__div">
                <div class="section_1__div1">
                    <p class="section_1__p">Muchos de tus clientes estan verdaderamente ocupados</p>
                    <p class="section_1__p"><span class="span_22">¡ Ofrece un servicio Premium ! </span><br> digitalizando tu tienda</p>
                </div>
                <div class="section_1__div2" id="BotonRegistrar">
                    <label class="section_1__boton"><a class="a_3 a_3A" href="<?php echo RUTA_URL . '/menu_C/afiliacion';?>">Registrar tienda</a></label>
                </div>
            </div>
        </div>
    </section>

    <section><!--BUSCADOR-->
        <div class="contBuscador contBuscador__borrar" id="Busqueda">   
            <span class="icon-cancel-circle spanCerrar" id="Span_5" onclick="CerrarModal_X('Mostrar_Categorias')"></span>
            <div class="contBuscador__div">     
                <div class="contFlex50 contFlex--around">
                    <div class="contFlex__div">
                        <select class="contFlex__select">
                            <option>Estado</option>
                            <option selected="true">Yaracuy</option>
                        </select>
                    </div>
                    <div class="contFlex__div">
                        <select class="contFlex__select">
                            <!-- <option>Ciudad</option>
                            <option>Cocorote</option>
                            <option>Independencia</option> -->
                            <option selected="true">San Felipe</option>
                            <!-- <option>Yaritagua</option> -->
                        </select>
                    </div>
                </div>
                <div class="contBuscador__div__div">
                    <input class="placeholder borde_1" id="Input_9" type="text" placeholder="Ingrese un producto"/>
                </div>
            </div>
            
            <!--Carga mediante Ajax las tiendas disponibles para la busqueda solicitada desde buscador_V.php -->
            <div class="contenedor_58" id="Buscar_Pedido"></div>
        </div>
    </section>

<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js?v=' . rand();?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/A_Inicio.js?v=' . rand();?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL.'/public/convoca_SW.js';?>"></script>

<!-- <script type="text/javascript" src ="<?php // echo RUTA_URL?>/public/javascript/push.min.js"></script>
			
<script>
    window.onload = function(){
        Push.Permission.request()
    }

    // Se crea la notifica pasando como parametro el titulo y objeto Json con varias propiedades
    Push.create("NUEVO PEDIDO",{
        body: "Un cliente va por un despacho. Ver orden de compra",
        icon: '<?php // echo RUTA_URL?>/public/images/logo.png',
        timeout: 7000,
        vibrate: [100,100,100],
        onClick: function(){
            window.focus();//LLeva a la pagina que invoca la notificación en casode encontrarse en ella
            this.close();//Cierra la notificación
        }
    });
</script> -->

<?php require(RUTA_APP . '/vistas/inc/footer.php'); ?>