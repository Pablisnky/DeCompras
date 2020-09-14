<?php 
    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php"); 

    //Se verifica que la sesion del usuario halla sido creada y exista
    if(isset($_SESSION["ID_Tienda"])){         
        ?>
        <section>
            <div>
                <div class="">
                    <p class="p_6">Configurar tu tienda te llevará 20 minutos, y cargar un producto a penas unos segundos.</p>
                </div>
                <p>Comenzamos</p>
                <ol>
                    <li>Completa tu perfil.</li>
                    <p>Entra en la sección configurar del menú principal y carga toda la información solicitada respecto al reponsable de la tienda y amplia la información de la tienda.</p>
                    <li>Indica la categoria de tu tienda</li>
                        <p>Selecciona hasta tres categorias en las que tu tienda se ajuste, esto ayudará en las busquedas que relizan los usuarios de la plataforma.</p>
                    <li>Crea las secciones de tu tienda</li>
                        <p>Cada sección reune un mismo tipo de producto, tu tienda puede tener tantas secciones como tu quieras, si tu tienda es una bodega, puedes crear la sección de refrescos, la de jugos, la de cereales, la de enlatados, la granos, etc. Todo según los productos que tu tienda tenga para mostrar.</p></li>                   
                </ol> 
            </div>
            <br>
            <div>
                <ol>
                    <li>Carga un producto</li>
                    <p>Entra al menu principal en el item "cargar productos" tienes un formulario donde puedes cargar los productos que tu tienda va a ofrecer</p>
                    <li>Da las especificaciones del producto</li>
                    <p>Indica las caracteristicas de tu producto, tamaño, litros, peso, color, sabor  todo lo que describa tu producto.</p>
                    <li>Indica el precio del producto</li>
                    <p>El precio que muestre cada producto debe ser el precio con IVA, de modo que el usuario no encuentre sorpresas al final de la compra</p>
                    <li>Carga una imagen del producto</li>
                </ol>
            </div>
            <br>
            <div>
                <ol>
                    <li>Recibir un pedido</li>
                    <p>Cuando un usuario realice una compra en tu tienda, recibiras una notificación via whatsapp y una notificación en la aplicación, razón por la cual debes descargarla. </p>                    
                    <li>Verificar una compra</li>
                    <p>La notificación de compra contiene la información necesarias para identificar al comprador, el despachador, el pedido y el número de transferencia bancaria.</p>
                    <li>Prepara el despacho</li>
                    <p>Una vez verificado el pago de la compra, procede a armar el pedido para que el despachador o el cliente retiren el pedido.</p>
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