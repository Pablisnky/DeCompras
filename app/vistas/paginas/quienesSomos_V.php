<!-- Vista cargada por medio de Menu_C/nuestroADN -->
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/casita/style_casita.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/camion/style_camion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>		

<section class="section_5">
    <div class='contenedor_149'>
        <div class="contenedor_152">
            <h1 class="h1_1">Quienes somos</h1>
            <p class="p_16">PedidoRemoto es un producto de la casa de software hórebi C.A. con sede en San Felipe estado Yaracuy (Venezuela), iniciamos operaciones en junio de 2020 con el objetivo de dar soluciones informaticas a problemas citadinos e impactar positivamente a la sociedad.</p> 
        </div>
        <div class="contenedor_153">                      
            <img class="figure_2" alt="Logo PedidoRemoto" src="<?php echo RUTA_URL?>/public/images/logo.png"/>
        </div>
    </div>
    <!-- El div padre se posiciona relativamente para luego posicionar el div hijo en position absolute con respecto al padre -->
    <div class="contenedor_150">
        <div class="contenedor_148">
            <div>
                <span class="icon-cart span_6"></span>
            </div>
            <div>
                <span class="icon-truck span_6"></span>
            </div>
            <div>
                <span class="icon-home2 span_6"></span>
            </div>
            <div>
                <h3 class="h3_2" id="H3_3">Tu tienda en toda la ciudad</h3>
            </div>
        </div>
    </div>
</section>   

<section class="section_5" style="position: relative; background-color:rgb(239, 245, 245)">
    <div class='contenedor_149' id="QueHacemos"><!--El id esta siendo utilizado coo ancla del menu principal-->      
        <div class="contenedor_152">     
            <h1 class="h1_1">Que Hacemos.</h1>
            <p class="p_16">Nuestro marketplace "PedidoRemoto" esta enfocado en dar un mayor alcance a la experiencia de compra y venta en línea, por lo que involucramos al pequeño comerciante con el canal de venta directa digital e-commerce, entrega de mercancia y despachos automatizados de productos de compra cotidiana.</p>       
        </div>
        <div  class="contenedor_153" style="width: 20%;">                      
            <img class="figure_2" alt="Logo PedidoRemoto" src="<?php echo RUTA_URL?>/public/images/tiendas/tienda.png"/>
        </div>
    </div>
    <div class="contenedor_150">
        <div class="contenedor_148 contenedor_160">
            <div>
                <span class="icon-cart span_6"></span>
            </div>
            <div>
                <span class="icon-truck span_6"></span>
            </div>
            <div>
                <span class="icon-home2 span_6"></span>
            </div>
        </div>
    </div>
</section>  

<section class="section_5" style="position: relative;">
    <div class='contenedor_146' id="Contactenos"><!--El id esta siendo utilizado coo ancla del menu principal-->   
        <h1 class="h1_1">Contactenos.</h1>
        <br>
        <form action="../../Menu_C/recibeContactenos/" method="POST" onsubmit="return validarContactenos()" id="">
            <div class="contenedor_151">
                <!-- NOMBRE -->
                <input class="placeholder borde_1" type="text" name="nombreUsuario" id="NombreUsuario" autocomplete="off" placeholder="Nombre" onkeydown="blanquearInput('NombreUsuario')"/>

                <!-- TELEFONO -->
                <input class="placeholder borde_1" type="text" name="telefonoUsuario" id="TelefonoUsuario" autocomplete="off" placeholder="Telefono (solo números)" onkeydown="blanquearInput('TelefonoUsuario')"/>

                <!-- CORREO -->
                <input class="placeholder borde_1" type="text" name="correoUsuario" id="CorreoUsuario" autocomplete="off" placeholder="Correo" onkeydown="blanquearInput('TelefonoUsuario')"/>

                <!-- ASUNTO -->
                <div style="width:90%; margin:auto">
                    <textarea class=" textarea_4 borde_1 input_13 input_16" style="resize: none;" name="asunto" id="Asunto" autocomplete="off" placeholder="Asunto"></textarea>
                    <input class="contador_2 contador_3" type="text" id="ContadorAsunto" value="200"/>
                </div>
            </div> 
            <div class="contenedor_66">                    
                <input class="boton boton_4" type="submit" value="Enviar">
            </div>
        </form>       
    </div>
    <div class="contenedor_150">
        <div class="contenedor_148">
            <div>
                <span class="icon-cart span_6"></span>
            </div>
            <div>
                <span class="icon-truck span_6"></span>
            </div>
            <div>
                <span class="icon-home2 span_6"></span>
            </div>
            <div>
                <h3 class="h3_2" id="H3_3">Tu tienda en toda la ciudad</h3>
            </div>
        </div>
    </div>
</section>  

<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_QuienesSomos.js';?>"></script>
        
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>