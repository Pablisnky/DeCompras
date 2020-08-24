<?php 
    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php"); 

    //Se verifica que la sesion del usuario halla sido creada y exista
    if(isset($_SESSION["ID_Tienda"])){ 
        ?>
        <div class="contenedor_46"> 
            <p class="p_6">Empanadas La 13 C.A.</p>
            <p>PedidoRemoto es como si alquilaras un local, el cual debes organizar y acondicionar para mostrar tus productos, por eso te damos una guia para ayudarte a levantar tu tienda en línea y muestres tus productos a toda la ciudad.</p>
            <div>
                <div>
                    <ul>
                        <li>Organiza su tienda por categorias</li>
                        <p>Crea las categorias que creas conveniente para mostrar tus productos, te damos unos ejemplos de como pudieses ser las categorias, unavez creadas puedes modificarlas y agregar oquitar productos segun quieras oraganizar tu tienda</p>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>Ahora agrupa tus productos por secciones</li>
                        <p>Cada sección reune un mismo tipo de articulos, tu tienda en línea uede tener tantas secciones como tu quieras, puedes crear la sección de refrescos, la de jugos, la de cereales, la de repuestos de tren delanteros, etc. Todo según los productos que tu tienda tenga para mostrar.</p>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>Carga un producto</li>
                        <p>En la seccion cargar producto del menu principal tienes un formulario donde puedes cargar los productos que tu tienda va a ofrecer</p>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>Da las especificaciones del producto</li>
                        <p>Indica las caracteristicas de tu producto, tamaño, litros, peso, color, sabor  todo lo que describa tu producto. Ejemplo:</p>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>Indica el precio del producto</li>
                        <p>El precio que muestre debe ser el precio con IVA, de modo que el usuario no encuentre sorpresas al final de la compra</p>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>Carga una imagen del producto</li>
                    </ul>
                </div>
            </div>
        </div>

        <?php
    }
    else{
        //la sesion no existe y se redirige a la pagina de inicio
        header("location:" . RUTA_URL);
    }
    
    include(RUTA_APP . "/vistas/inc/footer.php");
    ?>