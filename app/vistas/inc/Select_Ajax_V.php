<!-- Alimenta el select de categorias en cuenta_publicar_V.php viene de Funciones_Ajax.js-->
<select>
   <option></option> 
   <?php 
   foreach($Datos['seccion'] as $row){
       $SeccionTienda = $row['seccion']; ?>
    <option><?php echo $SeccionTienda;?></option> 
        <?php
   }  
 ?>                
</select>    