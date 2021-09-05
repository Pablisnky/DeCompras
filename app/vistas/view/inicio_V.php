    <!-- Se carga el preloader -->
    <div class="preloder_tapa--total">
        <div class='preloder preloaderCentrar'></div>
    </div>

    <div class="section_1--cont__radios" id="Botones_radios">
        <input class="section_1--radios" type="radio" name="slider" id="Portada_1" checked/>
        <input class="section_1--radios" type="radio" name="slider" id="Portada_2"/>
        <input class="section_1--radios" type="radio" name="slider" id="Portada_3"/> 
    </div>
    
    <div class="contenedor_98 contenedor_98--inicio" id="Aplicacion_PWA">
        <div>
            <h3 class="footer__h3 footer__h3--inicio">APLICACIÓN</h3>
            <h3 class="footer__h3 footer__h3--inicio">MULTIPLATAFORMA</h3>
        </div>
        <img class="imagen_5 imagen_5--inicio" alt="Logo PWA" src="<?php echo RUTA_URL;?>/public/images/PWA.png"/>
    </div>

    <div class="contenedor_34--main" id="ImgPortada">
        <div class="borrar section_1" style="background-image: url('<?php echo RUTA_URL?>/public/images/Portada.jpg');">
            <div class="contenedor_37" id="Contenedor_37">
                <h1 class="h1_2" id="Titulo">PedidoRemoto</h1>
                <h2 class="h2_4" id="SubTitulo">MarketPlace</h2>
            </div>                
            
            <div class="div__Botones--uno" id="BotonVer">
                <a class="div__Botones--boton div__Botones--boton--uno" href="<?php echo RUTA_URL . '/Categoria_C';?>">Ver tiendas</a>
            </div>

            <p class="contenedor_34--p" id="Contenedor_34--p">Cambio oficial a tasa del BCV <br class="br_2">&nbsp&nbsp 1 $ = <?php echo number_format($Datos, 0, ",", ".");?> Bs.</p>

            <div class="slider">
                <ul>
                    <li>
                        <label><span>compras y despachos</span> en <br class="br_2">tiendas de tu ciudad.</label>
                    </li>
                    <li>
                        <label>Operamos en<br> <span>San Felipe e <br> Independencia</span><br> estado Yaracuy.</label>
                    </li>
                    <li>
                        <label>Pide desde tú casa, y<span> <br>llevamos hasta <br class="br_2">tú casa</span></label>
                    </li>
                    <li>
                        <label><span>Compra desde <br class="br_2">tu telefono</span> <br class="br_2"> viveres, repuestos, cosmeticos, empanadas<br class="br_2 br_3"> y más.</label>
                    </li>
                    <li>
                        <label><span>e-commerce</span><br> con las tiendas que ya conoces.</label>
                    </li> 
                </ul>    
                <!-- <div class="section_1--cont__radios--cinco" id="Botones_radios_slider">
                    <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_1" checked/>
                    <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_2"/>
                    <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_3"/> 
                    <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_4"/> 
                    <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_5"/> 
                </div> -->
            </div>    
        </div>

        <div class="borrar section_1" id="ImgPortada_2" style="background-image: url('<?php echo RUTA_URL?>/public/images/Portada_2.jpg');">            
            <div class="slider slider--portada">
                <span class="font--white">Muchos de tus clientes estan verdaderamente ocupados</span>
                <ul>
                    <li>
                        <label class="font--white">Sube tu cátalogo de productos, <br>y vende las 24 horas</label>
                    </li>
                    <li>
                        <label class="font--white">Crea tu tienda en línea y abre un nuevo canal de ventas.</label>
                    </li> 
                    <li>
                        <label class="font--white">Afilia tu tienda <br>totalmente gratis</label>
                    </li>
                    <li>
                        <label class="font--white">Comida rapida, panaderías, repuestos, bodegas, y más.</label>
                    </li>
                    <li>
                        <label class="font--white">Ofrece a tus clientes compras <br class="br_2">en tu tienda virtual </label>
                    </li>
                </ul>
            </div>
            <div class="div__Botones" id="BotonRegistrar">
                <a class="div__Botones--boton" href="<?php echo RUTA_URL . '/menu_C/afiliacion';?>">Afiliar tienda</a>
                <a class="div__Botones--boton" href="<?php echo RUTA_URL . '/Categoria_C';?>">Ver tiendas</a>
            </div>
        </div>    
            
        <div class="borrar section_1" id="Section_1" style="background-image: url('<?php echo RUTA_URL?>/public/images/Portada_3.jpg');">     
            <div class="slider slider--portada">   
                <span>Al registrar tu tienda, te<br class="br_2"> ayudamos con:</span>
                <ul>
                    <li>
                        <label>Control de inventario y notificaciones administrativas.</label>
                    </li>
                    <li>
                        <label>Reporte de ventas diarias, semanales y mensuales.</label>
                    </li> 
                    <li>
                        <label>Alertas por productos proximos a agotarse.</label>
                    </li>
                    <li>
                        <label>Ajuste diario automatico por cambio en tasa dolar BCV.</label>
                    </li>
                    <li>
                        <label>Ajuste semanal automatico por variación en indice de inflación.</label>
                    </li>
                </ul>
            </div>
            <div class="div__Botones" id="BotonRegistrar">
                <a class="div__Botones--boton" href="<?php echo RUTA_URL . '/menu_C/afiliacion';?>">Afiliar tienda</a>
                <a class="div__Botones--boton" href="<?php echo RUTA_URL . '/Categoria_C';?>">Ver tiendas</a>
            </div>
        </div>
    </div>
    
    <!--BUSCADOR-->
    <div>
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
            </div>
        </div>
    </div>

<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v='. rand();?>"></script>
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