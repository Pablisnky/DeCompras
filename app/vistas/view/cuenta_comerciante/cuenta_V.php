<?php 
    $ID_Tienda = $_SESSION["ID_Tienda"];

    //Se verifica que la sesion del usuario halla sido creada y exista
    if(isset($_SESSION["ID_Tienda"])){         
        ?>
        <section class="section_8">
            <div class="contenedor_112 borde_1">
                <p class="p_7">Configurar tu tienda te llevará 10 minutos.</p>
                <br>
                <p class="p_7"> Cargar un producto solo unos segundos.</p>
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Completa tu perfil.</h2>
                <ol class="ol_1">
                    <li class="li_1">Entra en la sección configurar del menú principal y carga toda la información solicitada respecto al reponsable de la tienda.</li>
                    <li class="li_1">Indica la categoria, direccion y telefono de tu tienda</li>
                    <li class="li_1">Selecciona una o dos categorias en las que tu tienda se ajuste.</li>
                    <li class="li_1">Crea las secciones de tu tienda, en ellas colocaras los productos organizadamente.</li>
                    <li class="li_1">Cada sección reune un mismo tipo de producto, tu tienda puede tener tantas secciones como tu quieras, si tu tienda es una bodega, puedes crear la sección de refrescos, la de jugos, la de cereales, la de enlatados, la de granos, etc. Todo según los productos que tu tienda tenga para mostrar.</li>                   
                </ol> 
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Cargar un producto</h2>
                <ol class="ol_1">
                    <li class="li_1">Entra al menu principal en el item "Cargar producto" </li>
                    <li class="li_1">Da las especificaciones del producto</li>
                    <li class="li_1">Indica las caracteristicas de tu producto, tamaño, litros, peso, color, sabor  todo lo que describa tu producto.</li>
                    <li class="li_1">Indica el precio del producto</li>
                    <li class="li_1">El precio que muestre cada producto debe ser el precio con IVA, de modo que el usuario no encuentre sorpresas al final de la compra</li>
                    <li class="li_1">Carga una imagen principal del producto y luego imagenes adicionales si lo consideras necesario.</li>
                    <li class="li_1">Puedes añadir caracteristicas adicionales del producto ofrecido dnado click en "Ampliar especiicaciones"</li>
                </ol>
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Recibir un pedido</h2>
                <ol class="ol_1">    
                    <li class="li_1">Cuando un usuario realice una compra en tu tienda, recibiras una notificación en la aplicación.</li>                                    
                    <li class="li_1">Verificar una compra</li>
                    <li class="li_1">La notificación de compra contiene la información necesarias para identificar al comprador, el despachador, el pedido y el número de transferencia bancaria.</li>
                    <li class="li_1">Prepara el despacho</li>
                    <li class="li_1">Una vez verificado el pago de la compra, procede a armar el pedido para que el despachador o el cliente retiren el pedido.</li>
                    <li>Una vez realices la entrega del producto al despachador y notifique la</li>
                </ol>
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Cerrar mi tienda al publico</h2>
                <ol class="ol_1">    
                    <li class="li_1">Por defecto la tienda es mostrada las 24 horas del día una vez este completamente configurada, pero puedes ocultarla del marketplace en caso de que lo consideres necesario, en "Configurar" del menu principal existe el checklist para activar esta acción</li>                                    
                </ol>
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Tienda preparada para apertura al público</h2>
                <ol class="ol_1">    
                    <li class="li_1">Tu tienda será mostrada al público unicamente despues de configurar los aspectos básicos en "Configurar" del menu principal, estos son:</li>  
                    <ul class="ul_4">
                        <li>Datos de la persona responsable.</li>
                        <li>Nombre de la tienda</li>
                        <li>Imagen o logo de la tienda</li>
                        <li>Dirección de la tienda.</li>
                        <li>Telefono de la tienda.</li>
                        <li>Cuenta bancaria o número de telefono para pagomovil.</li>
                        <li>Al menos una categoria.</li>
                        <li>Al menos una sección.</li>
                        <li>Al menos un producto.</li>
                    </ul>                                  
                </ol>
            </div>
        </section>
        <?php
    }
    else{
        //la sesion no existe y se redirige a la pagina de inicio
        header("location:" . RUTA_URL);
    }
    
    include(RUTA_APP . "/vistas/footer/footer.php");
    ?>