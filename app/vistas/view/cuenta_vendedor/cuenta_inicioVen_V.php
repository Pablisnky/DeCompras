<?php 
    // $ID_Tienda = $_SESSION["ID_Tienda"];

    //Se verifica que la sesion del usuario halla sido creada y exista
    // if(isset($_SESSION["ID_Tienda"])){         
        ?>
        <section class="section_8">
            <div class="contenedor_112 borde_1">
                <ul>
                    <li>Proximas visitas para reposición</li>
                    <li>Grafico de barras horizontales con las ventas semanales.(compara las ultimas cinco semanas).</li>
                    <li>Tabla de cuentas por cobrar.</li>
                    <li>Tabla de despachos pendientes.</li>
                </ul>
            </div>
        </section>
        <?php
    // }
    // else{
    //     //la sesion no existe y se redirige a la pagina de inicio
    //     header("location:" . RUTA_URL);
    // }
    
    include(RUTA_APP . "/vistas/footer/footer.php");
    ?>