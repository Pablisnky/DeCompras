<!-- Alimenta el select de Descripcion en publicacion_V.php -->
<select>
   <option></option>
   <?php 
   foreach($Datos as $row){
       $Opcion = $row['opcion']; ?>
   <option><?php echo $Opcion;?></option> 
       <?php
   }   ?>                
</select>    