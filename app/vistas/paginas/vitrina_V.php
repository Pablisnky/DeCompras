<!-- Archivo insertado via Ajax en inicio_V.php -->
<section class="section_1">
    <div class='contenedor_10'>
        <?php
            $Contador = 1;
            foreach($Datos as $row){
                $ID_Producto = $row[0];
                $Nombre = $row[1];
                $Precio = $row[2];
                $UnidadVenta = $row[3]; 
                $Departamento = $row['ID_Departamento'];
                
                ?> 
                <div class="contenedor_15" id="<?php echo 'Cont_Dinamico_' . $Contador;?>">
                    <input type="text" value="<?php echo $Contador;?>" name="contador">

                    <div class='contenedor_11' onclick="verOpciones('<?php echo 'Cont_Sombreado_' .$Contador;?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','<?php echo 'Talla_' . $Contador;?>','<?php echo 3 . $Contador;?>','<?php echo 'Leyenda_'. $Contador;?>','<?php echo 'Precio_' . $Contador;?>','<?php echo 'Cantidad_' . $Contador;?>','<?php echo 'Item_'. $Contador;?>')">
                        <div class="contenedor_12">
                            <h1 >imagen</h1>
                        </div>
                        <div>
                            <label class="label_1"><?php echo $Nombre;?></label>
                        </div>
                        <div style="text-align:right;">
                                <label class="label_1"><?php echo $Precio;?> </label>                           
                            <input class="" id="<?php echo 'Precio_' . $Contador;?>" value="<?php echo $Precio;?>" hidden>                           
                        </div>
                        <?php 
                        if(!empty($UnidadVenta)){ ?>
                            <div>
                                <label class="label_1">Por <?php echo $UnidadVenta;?> </label>                           
                            </div>  <?php  
                        }   ?>                    
                    </div>
                    <div class="contenedor_14" id="<?php echo 'Cont_Sombreado_' . $Contador;?>">
                        <div>
                            <!-- cantidad -->
                            <input type="text" class="label_1e" id="<?php echo 'Cantidad_' . $Contador;?>" value="3">
                            <!-- talla -->
                            <input type="text" class="label_1a" id="<?php echo 'Talla_' . $Contador;?>">
                            <!-- Precio -->
                            <input type="text" class="label_1d" id="<?php echo 3 . $Contador;?>">
                            <!-- Leyenda -->
                            <input type="text" class="label_1c" id="<?php echo 'Leyenda_'. $Contador;?>">  
                        </div> 

                        <div class="contenedor_16">
                            <button class="button_1" onclick="decrementar();">-</button>
                            <input class="input_2 input2a" type="text" id="<?php echo 'Item_'. $Contador;?>"  value="1" disabled>
                            <button class="button_2" onclick="incrementar();">+</button>
                        </div> 

                        <div class="contenedor_17">
                            <label class="label_5">Agregar otra opción</label> 
                        </div> 
                        <div style="grid-column-start: 1; grid-column-end: 3; ">
                            <input class="input_4" type="text" name="AgregarOpc" placeholder="Agregar aclaración">
                        </div> 
                    </div>  
                </div>
                <?php
                $Contador++;
            }   
        ?>
    </div>

<section class="section_3" id="Mostrar_Opciones">
    <div class="contenedor_13">
        <span class="span_5" onclick="CerrarModal_X()">X</span>
        <label class="label_3">Elija una opción</label>

        <label class="label_4" for="Talla_S" onclick="transferirOpcion()">S</label> 
        <input type="radio" name="talla" value="S" id="Talla_S" onclick="transferirOpcion()">

        <label class="label_4" for="Talla_M" onclick="transferirOpcion()"><input type="radio" name="talla" value="M" id="Talla_M" hidden>M</label>

        <label class="label_4" for="Talla_L" ><input type="radio" name="talla" value="L" id="Talla_L" onclick="transferirOpcion()" hidden>L</label>

        <label class="label_4" for="Talla_XL"><input type="radio" name="talla" value="XL" id="Talla_XL" onclick="transferirOpcion()" hidden>XL</label>
    </div>
</section> 








