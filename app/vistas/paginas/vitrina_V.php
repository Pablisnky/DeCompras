<?php 
    // header('Access-Control-Allow-Origin:*');
    // if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    //     // Indica los métodos permitidos.
    //     header('Access-Control-Allow-Methods: GET, POST, DELETE');
    //     // Indica los encabezados permitidos.
    //     header('Access-Control-Allow-Headers: Authorization');
    // }
    //$Datos proviene de Vitrina_C
    $ID_Tienda = $Datos['id_tienda'] ;
    $Fotografia = $Datos['fotografia']; 
?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>

<section class="section_5">	
    <div class="contenedor_109" style="background-image: url('http://localhost/proyectos/PidoRapido/public/images/tiendas/<?php echo $Fotografia[0]['fotografia_Tien'];?>')">
    </div>
    <!-- <div class="contenedor_109" style="background-image: url('http://www.pedidoremoto.com/public/images/tiendas/<?php echo $Fotografia[0]['fotografia_Tien'];?>')"> -->
    </div>
    <div class="contenedor_110" id="Section_4">
        <?php
        $Contador = 1;
        //Se cargan todas las secciones que tenga una tienda
        foreach($Datos['seccion'] as $row){
            $Seccion = $row['seccion'];       
            ?> 
            <div class='contenedor_11 contenedor_11a' id="<?php echo 'Cont_Seccion_' . $Contador;?>">
                <div id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpciones('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $Seccion;?>'); llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $Seccion;?>','NoAplica')"> 
                    <div class="contenedor_9 borde_1">
                        <img class="imagen_2" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/imagen.png"/>
                    </div>  
                   <!--  <div class="contenedor_9 borde_1">
                        <img class="imagen_2" alt="Fotografia del producto" src="http://www.pedidoremoto.com/public/images/imagen.png"/> 
                    </div>-->
                    <h2 class="h2_6"><?php echo $Seccion;?></h2>
                </div>

                <!-- Se agregan las leyendas desde TransferirPedido() -->
            </div>
            <?php
            $Contador++;
        }
        ?>
    </div>
    <!-- Se muestra el carrito de compras en el fondo del viewport-->
    <div class="contenedor_61" id="Contenedor_61">
        <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_PedidoEnCarrito()">
            <div class="contenedor_31">
                <span class="icon-cart span_2"></span>
                <input type="text" class="input_5" id="Input_5" readonly="readondly"/>
            </div>
        </div>
    </div>
</section>

<!-- "Mostrar_Opciones" Trae por medio de Ajax las productos de cada seccion, los valores los toma desde opciones_V.php que es invovado desde llamar_Opciones()-->
<div id="Mostrar_Opciones"></div>

<!-- Trae por medio de Ajax todo el pedido del usuario "La orden", la información es suministrada por carrito_V.php invocada por la función llamar_PedidoEnCarrito()  en este mismoarchivo-->
<div id="Mostrar_Orden"></div>

<!-- Trae por medio de Ajax la ventana de alerta que se va a eliminar un producto del pedido -->
<div id="Mostrar_Alert"></div>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Vitrina.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Vitrina.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js'?>"></script>
<!-- ******************************************************************************************* -->

<?php// require(RUTA_APP . '/vistas/inc/footer.php');  ?>


<!-- Si viene de buscador se realiza el procedimiento para cargar al carrito el producto seleccionado y colocar la leyenda en la vista opcion_V.php y vitrina_V.php -->
<?php
    //$Datos proviene de Vitrina_C
    if($Datos['Seccion'] != 'NoNecesario'){//'NoNecesario' es creado en tiendas porque comparte el controlador index de Vitrina_C 
        $SeccionSelecionada = $Datos['Seccion'];
        $OpcionSeleccionada = $Datos['Opcion']; 

        $Contador = 1;
        
        //Se cargan todas las secciones que tenga una tienda
        //$Datos proviene de Vitrina_C
        foreach($Datos['seccion'] as $row){
            $Seccion = $row['seccion'];  ?>
            <script>
                //Se busca el contenedor que corresponde con la sección del producto seleccionado
                if('<?php echo $SeccionSelecionada == $Seccion?>'){
                    verOpciones('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $SeccionSelecionada?>')
                    llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $SeccionSelecionada;?>','<?php echo $OpcionSeleccionada?>')
                }
            </script>
            <?php
            $Contador++;
        }   ?>   
        <?php
    }
?>

 <!--Si se llama un producto desde buscador, se verifica que el div id="Mostrar_Opciones" haya cargado todos los productos de la sección, para luego proceder a colocar la leyenda en el producto seleccionado en la busqueda,  esto es necesario cuando se hizo una busqueda por producto en inicio_V.php -->
<script>
    interval = setInterval('verificarDiv()',1000)

    //Detiene la llamada continua de verificarDiv a los 4 segundo de ser invocada con el setInterval
    setTimeout('stopInterval()',4000)   
</script> 

    
<script>
    //Invocada desde descr_Producto_V.php
    function activarBotonAgregar(ID_LabelAgregar){
        // console.log(ID_LabelAgregar)
        document.getElementById(ID_LabelAgregar).click();
    }
</script>