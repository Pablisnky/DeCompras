<?php    
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];
      ?>        
      <section class="section_5">
        <div class="contenedor_70 contenedor_103 borde_1">    
            <h1 class="h1_1">Dashboard de Ventas</h1>
            <p class="p_7">Estamos construyendo un excelente panel de control para que administres tu tienda en tiempo real, en donde quiera que te encuentres y desde cualquier dispositivo.</p>
            <p class="p_7">Primera entrega 01/01/2021 (Versión Beta)</p>
            <p class="p_7">Segunda entrega 05/02/2021 (Versión Estable V_1.0)</p>
        </div>
      </section>        

    <!--div alimentado desde Ventas_Ajax_V.php con el grafico de ventas -->    
    <div id="Contenedor_80"></div>

    <!-- <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_ventas.js';?>"></script> 
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_ventas.js';?>"></script>  -->


    <?php include(RUTA_APP . "/vistas/inc/footer.php");
}
else{
    echo "Página no  autorizada";
    redireccionar("/Login_C/");
}   ?>

<!-- 
<label id="Btn">Enviar</label>
            <br>
            <label id="BtnClose">Cerrar</label>-->
            <!-- Se crea la conexión mediante websocket para obtener las ventas en tiempo real -->
            <!-- <script>
                const WS = new WebSocket("ws.//pedidoremoto.com/ws")

                WS.onopen = () => {
                    console.log("Conexión con websocket")
                }
                WS.onmessage = e => {
                    const msg = JSON.parse(e.data)
                    console.log(msg)
                }
                WS.onerror = e => {
                    console.log(e)
                }
                WS.onclose = e => {
                    console.log("Conexión cerrada")
                    console.log(e)
                }
                
                // Se envia la información al servidor
                const btnSend = document.getElementById("Btn")
                Btn.addEvenListerner('click', () => {
                    const Data = {
                        nombre: "Pedro",
                        mensage: "Saludos a todos"
                    }
                    WS.send(JSON.stringify(Data))
                })

                //Se cierra la conexion
                const BtnClose = document.getElementById("BtnClose")
                BtnClose.addEvenListerner('click', () => {
                    WS.close()
                })
            </script>  -->