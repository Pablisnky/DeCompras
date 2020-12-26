<!-- Vista cargada por medio de Menu_C/nuestroADN -->
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
</section>  

<section class="section_5" style="position: relative;">
    <div class='contenedor_146' id="Contactenos"><!--El id esta siendo utilizado coo ancla del menu principal-->   
        <h1 class="h1_1">Contactenos.</h1>
        <br>
        <form action="../../Menu_C/recibeContactenos/" method="POST" onsubmit="return validarContactenos()">
            <div class="contenedor_151">
                <!-- NOMBRE -->
                <input class="placeholder borde_1" type="text" name="nombreUsuario" id="NombreUsuario" autocomplete="off" placeholder="Nombre" onkeydown="blanquearInput('NombreUsuario')"/>

                <!-- TELEFONO -->
                <input class="placeholder borde_1" type="text" name="telefonoUsuario" id="TelefonoUsuario" autocomplete="off" placeholder="Telefono (solo números)" onkeydown="blanquearInput('TelefonoUsuario')"/>

                <!-- CORREO -->
                <input class="placeholder borde_1" type="text" name="correoUsuario" id="CorreoUsuario" autocomplete="off" placeholder="Correo" onkeydown="blanquearInput('TelefonoUsuario')"/>

                <!-- ASUNTO -->
                <div style="width:90%; margin:auto">
                    <textarea class=" textarea_4 borde_1 input_13 input_16" name="asunto" id="Asunto" autocomplete="off" placeholder="Asunto"></textarea>
                    <input class="contador_2 contador_3" type="text" id="ContadorAsunto" value="200"/>
                </div>
            </div> 
            <div class="contenedor_66">                    
                <input class="boton boton_4" type="submit" value="Enviar">
            </div>
        </form>       
    </div>
</section>  

<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_QuienesSomos.js';?>"></script>
        
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>