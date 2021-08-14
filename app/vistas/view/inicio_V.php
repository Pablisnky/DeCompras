    <!-- Se carga el preloader -->
    <div class="preloder_tapa--total">
        <div class='preloder preloaderCentrar'></div>
    </div>

    <section class="section_1">
        <div class="contenedor_37"  id="Contenedor_37">
            <h1 class="h1_2">PedidoRemoto</h1>
            <h2 class="h2_4">MarketPlace</h2>
        </div>

        <div class="borrar" style="background-image: url('<?php echo RUTA_URL?>/public/images/Portada.jpg');">
            <div class="contenedor_34" id="BotonVer">
                <a class="contenedor_34--boton" href="<?php echo RUTA_URL . '/Categoria_C';?>">Ver tiendas</a>
            </div>
            <p class="contenedor_34--p">Cambio oficial a tasa del BCV <br class="br_2">&nbsp&nbsp 1 $ = <?php echo number_format($Datos, 0, ",", ".");?> Bs.</p>
        </div>

        <div class="slider">
            <ul>
                <li>
                    <label><span>compras y despachos</span><br> en tiendas de tu ciudad.</label>
                </li>
                <li>
                    <label><span>e-commerce</span><br> para pequeños y medianos comercios.</label>
                </li> 
                <li>
                    <label>Registra tu tienda <br><span>totalmente gratis</span></label>
                </li>
                <li>
                    <label>Ideal para ventas de comida rapida, minimarket, fruterías, panaderías, ferreterías, bodegas, y más.</label>
                </li>
                <li>
                    <label>Permite a tus clientes realizar compras en tu <br class="br_2"><span>tienda virtual </span></label>
                </li>
            </ul>
        </div>
    </section>

    <div class="section_1 section_1--vh" id="Section_1">
        <div class="borrar" style="background-image: url('<?php echo RUTA_URL?>/public/images/Portada_2.jpg');">
            <div class="section_1__div">
                <div class="section_1__div1">
                    <p class="section_1__p">Muchos de tus clientes estan verdaderamente ocupados,</p>
                    <p class="section_1__p"><span class="span_22">¡ Ofreceles un <br class="br_2"> Servicio Premium ! </span><br> digitalizando tu tienda</p>
                </div>
                <div class="section_1__div2" id="BotonRegistrar">
                    <a class="section_1__boton" href="<?php echo RUTA_URL . '/menu_C/afiliacion';?>">Registrar tienda</a>
                </div>
            </div>
        </div>
    </div>

    <div><!--BUSCADOR-->
        <div class="contBuscador contBuscador__borrar" id="Busqueda">   
            <i class="fas fa-times spanCerrar" id="Span_5"></i>
            <div class="contBuscador__div">     
                <div class="contFlex50 contFlex--around">
                    <div class="contFlex__div">
                        <select class="contFlex__select">
                            <option>Estado</option>
                            <option selected>Yaracuy</option>
                        </select>
                    </div>
                    <div class="contFlex__div">
                        <select class="contFlex__select">
                            <option selected>San Felipe</option>
                        </select>
                    </div>
                </div>
                <div class="contBuscador__div__div">
                    <input class="placeholder borde_1" id="Input_9" type="text" placeholder="Ingrese un producto o tienda"/>
                </div>
            </div>
            
            <!--Carga mediante Ajax las tiendas disponibles para la busqueda solicitada desde buscador_V.php -->
            <div class="contenedor_58" id="Buscar_Pedido">
                cargo
            </div>
        </div>
    </div>

<script src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Inicio.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/convoca_SW.js';?>"></script>

			
<!-- Notificacion PUSH al realizar un pedido -->
<!--<script>
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
<script>
    //Aqui tambien se pudo usar una funcion IIEEF (autoejecutable)
    window.onload = function (){
        if(document.readyState == "complete"){
           document.querySelector(".preloder_tapa--total").style.display = "none"
        }
    }
</script>

<?php require(RUTA_APP . '/vistas/inc/footer.php'); ?>