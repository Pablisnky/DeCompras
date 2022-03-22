<!-- invocado desde CarritoMayorista/listaMinorista() -->
<div class="sectionModal" id="ListadoMinorista">  

        <i class="fas fa-times spanCerrar spanCerrar--fijo" onclick="ocultarListadoMay('ListadoMinorista')"></i>
        <br>
    <!-- LISTADO DE PEDIDOS -->       
    <div class="sectionModal__div">
        <p class="font--titulo">Listado de clientes</p>
        </br>
            <?php
        if($Datos['minoristaVen'] != Array ()){
            foreach($Datos['minoristaVen'] as $row)  :  
                $CodigoDespacho = $row['codigodespacho'] ?>
                <div class="cont_clientesVen borde_1" onclick="Llamar_datosMinorista(<?php echo $CodigoDespacho;?>)">
                    <div style="grid-column-start: 1; grid-column-end: 3;">
                        <label class="cont_clientesVen--renglon">Razon social</label>
                        <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                    </div> 
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">Nº Orden</label>
                        <label><?php echo $row['rif_AfiMin'];?></label>
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Código despacho</label>
                        <label><?php echo $row['codigodespacho'];?></label>
                    </div> 
                </div><?php
            endforeach;  
        }
        else{   ?>
            <div class="contenedor_65 borde_1">
                <p class="bandaAlerta">ALERTA</p>
                <br>
                <P class="font--center">No tiene clientes registrados en su cuenta.</P>
            </div>
            <?php
        } ?>
    </div>
</div>