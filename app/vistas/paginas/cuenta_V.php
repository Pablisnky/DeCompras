<?php 
    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php"); 

    //Se verifica que la sesion del usuario halla sido creada y exista
    if(isset($_SESSION["ID_Tienda"])){         
        ?>
        <section class="section_5">
            <div class="contenedor_112">
                    <p class="p_7">Configurar tu tienda te llevará 20 minutos</p>
                    <p class="p_7"> y cargar un producto solo unos segundos.</p>
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Completa tu perfil.</h2>
                <ol class="ol_1">
                    <li class="li_1">Entra en la sección configurar del menú principal y carga toda la información solicitada respecto al reponsable de la tienda.</li>
                    <li class="li_1">Indica la categoria, direccion y telefono de tu tienda</li>
                    <li class="li_1">Selecciona una o hasta tres categorias en las que tu tienda se ajuste, esto ayudará en las busquedas que relizan los usuarios de la plataforma.</li>
                    <li class="li_1">Crea las secciones de tu tienda</li>
                    <li class="li_1">Cada sección reune un mismo tipo de producto, tu tienda puede tener tantas secciones como tu quieras, si tu tienda es una bodega, puedes crear la sección de refrescos, la de jugos, la de cereales, la de enlatados, la granos, etc. Todo según los productos que tu tienda tenga para mostrar.</li>                   
                </ol> 
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Carga un producto</h2>
                <ol class="ol_1">
                    <li class="li_1">Entra al menu principal en el item "cargar productos" tienes un formulario donde puedes cargar los productos que tu tienda va a ofrecer</li>
                    <li class="li_1">Da las especificaciones del producto</li>
                    <li class="li_1">Indica las caracteristicas de tu producto, tamaño, litros, peso, color, sabor  todo lo que describa tu producto.</li>
                    <li class="li_1">Indica el precio del producto</li>
                    <li class="li_1">El precio que muestre cada producto debe ser el precio con IVA, de modo que el usuario no encuentre sorpresas al final de la compra</li>
                    <li class="li_1">Carga una imagen del producto</li>
                </ol>
            </div>
            <div class="contenedor_113">
                <h2 class="h2_7">Recibir un pedido</h2>
                <ol class="ol_1">    
                    <li class="li_1">Cuando un usuario realice una compra en tu tienda, recibiras una notificación via whatsapp y una notificación en la aplicación, razón por la cual debes descargarla. </li>
                                    
                    <li class="li_1">Verificar una compra</li>
                    <li class="li_1">La notificación de compra contiene la información necesarias para identificar al comprador, el despachador, el pedido y el número de transferencia bancaria.</li>
                    <li class="li_1">Prepara el despacho</li>
                    <li class="li_1">Una vez verificado el pago de la compra, procede a armar el pedido para que el despachador o el cliente retiren el pedido.</li>
                </ol>
            </div>
        </section>
        <?php
    }
    else{
        //la sesion no existe y se redirige a la pagina de inicio
        header("location:" . RUTA_URL);
    }
    
    include(RUTA_APP . "/vistas/inc/footer.php");
    ?>