<section id="">
	<a id="Horario" class="ancla_2"></a>
	<fieldset class="fieldset_1 fieldset_2" id="Fieldset_3">                                 
		<legend class="legend_1">Horario</legend>
		<span>Tú tienda digital esta disponible al publico las 24 horas de todos los días, pero los despachos no, indica el horario en el cual estarán disponibles los despachos desde tu tienda, cualquier pedido realizado fuera de este horario quedará aplazado para la proxima apertura de tu tienda, generalmente el horario de despacho es el mismo horario en el que tu tienda física esta abierta.</span>		

		<!-- LUNES - VIERNES -->
		<div class="contHorario">
			<h2 class="contHorario__h2 borde_1">Lunes - Viernes</h2>
			<!-- LUNES - VIERNES MAÑANA -->  
			<div class="contHorario__div borde_1">
				<div>
					<p class="contHorario__p">Mañana</p>    <?php 
					//$Datos proviene de Cuenta_C	                              
					foreach($Datos['horario_LV'] as $row) :   
					endforeach; ?>
					<div class="contInputRadio"> 
						<input type="checkbox" name="lunes_M" id="Lunes_M" value="Lunes" <?php if(!empty($row['lunes_m']) == 'Lunes'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Lunes_M">Lunes</label>
						<br class="br_1"/>
						<input type="checkbox" name="martes_M" id="Martes_M" value="Martes" <?php if(!empty($row['martes_m']) == 'Martes'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Martes_M">Martes</label>
						<br class="br_1"/>
						<input type="checkbox" name="miercoles_M" id="Miercoles_M" value="Miercoles" <?php if(!empty($row['miercoles_m']) == 'Miercoles'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Miercoles_M">Miercoles</label>
						<br class="br_1"/>
						<input type="checkbox" name="jueves_M" id="Jueves_M" value="Jueves" <?php if(!empty($row['jueves_m']) == 'Jueves'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Jueves_M">Jueves</label>
						<br class="br_1"/>
						<input type="checkbox" name="viernes_M" id="Viernes_M" value="Viernes" <?php if(!empty($row['viernes_m']) == 'Viernes'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Viernes_M">Viernes</label>  
						<br class="br_1"/>  
					</div>
					<div class="contSelectVert">
						<p class="contHorario__p">Apertura</p>
						<select class="contSelectVert__select borde_1" name="inicioManana" id="InicioManana">
							<option><?php echo !empty($row['inicio_m']) ? $row['inicio_m'] : '00:00';?></option> 
							<option></option>
							<option>05:00 am</option>
							<option>05:30 am</option>
							<option>06:00 am</option>
							<option>06:30 am</option>
							<option>07:00 am</option>
							<option>07:30 am</option>
							<option>08:00 am</option>
							<option>08:30 am</option>
							<option>09:00 am</option>
							<option>09:30 am</option>
							<option>10:00 am</option>
							<option>10:30 am</option>
						</select>
						<br>
						<p class="contHorario__p">Cierre</p>
						<select class="contSelectVert__select borde_1" name="culminaManana" id="CulminaManana">
							<option><?php echo !empty($row['culmina_m']) ? $row['culmina_m'] : '00:00';?></option> 
							<option></option>
							<option>10:00 am</option>
							<option>10:30 am</option>
							<option>11:00 am</option>
							<option>11:30 am</option>
							<option>12:00 pm</option>
							<option>12:30 pm</option>
							<option>01:00 pm</option>
							<option>01:30 pm</option>
							<option>02:00 pm</option>
						</select>
					</div> 
				</div>  
			</div>
                        
			<!-- LUNES - VIERNES TARDE -->  
			<div class="contHorario__div borde_1">                  
				<div>
					<p  class="contHorario__p">Tarde</p>	    <?php 	                              
					foreach($Datos['horario_LV'] as $row) :  
					endforeach;  ?>
					<div class="contInputRadio">
						<input type="checkbox" name="lunes_T" id="Lunes_T" value="Lunes" <?php if(!empty($row['lunes_t']) == 'Lunes'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Lunes_T">Lunes</label>
						<br class="br_1"/>
						<input type="checkbox" name="martes_T" id="Martes_T" value="Martes" <?php if(!empty($row['martes_t']) == 'Martes'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Martes_T">Martes</label>
						<br class="br_1"/>
						<input type="checkbox" name="miercoles_T" id="Miercoles_T" value="Miercoles" <?php if(!empty($row['miercoles_t']) == 'Miercoles'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Miercoles_T">Miercoles</label>
						<br class="br_1"/>
						<input type="checkbox" name="jueves_T" id="Jueves_T" value="Jueves" <?php if(!empty($row['jueves_t']) == 'Jueves'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Jueves_T">Jueves</label>
						<br class="br_1"/>
						<input type="checkbox" name="viernes_T" id="Viernes_T" value="Viernes" <?php if(!empty($row['viernes_t']) == 'Viernes'){echo 'checked';}?>/>
						<label class="contInputRadio__label" for="Viernes_T">Viernes</label>
						<br class="br_1"/>
					</div>
					<div class="contSelectVert">
						<p class="contHorario__p">Apertura</P>
						<select class="contSelectVert__select borde_1" name="iniciaTarde" id="IniciaTarde">
							<option><?php echo !empty($row['inicia_t']) ? $row['inicia_t'] : '00:00';?></option>
							<option></option>
							<option>12:00 m</option>
							<option>12:30 pm</option>
							<option>01:00 pm</option>
							<option>01:30 pm</option>
							<option>02:00 pm</option>
							<option>02:30 pm</option>
							<option>03:00 pm</option>
							<option>03:30 pm</option>
							<option>04:00 pm</option>
							<option>04:30 pm</option>
							<option>05:00 pm</option>
						</select>
						<br>
						<p class="contHorario__p">Cierre</P>
						<select class="contSelectVert__select borde_1" name="culminaTarde" id="CulminaTarde">
							<option><?php echo !empty($row['culmina_t']) ? $row['culmina_t'] : '00:00';?></option>
							<option></option>
							<option>04:00 pm</option>
							<option>04:30 pm</option>
							<option>05:00 pm</option>
							<option>05:30 pm</option>
							<option>06:00 pm</option>
							<option>06:30 pm</option>
							<option>07:00 pm</option>
							<option>07:30 pm</option>
							<option>08:00 pm</option>
							<option>08:30 pm</option>
							<option>09:00 pm</option>
							<option>09:30 pm</option>
							<option>10:00 pm</option>
							<option>10:30 pm</option>
							<option>11:00 pm</option>
							<option>11:30 pm</option>
							<option>12:00 am</option>
							<option>12:30 am</option>
							<option>01:00 am</option>
							<option>01:30 am</option>
							<option>02:00 am</option>
							<option>02:30 am</option>
							<option>03:00 am</option>
						</select>
					</div> 
				</div>
			</div>
		</div>

		<!-- SABADO -->
		<div class="contHorario"> 
			<h2 class="contHorario__h2 borde_1">Sábado</h2>  
			<!-- SABADO MAÑANA -->  
			<div class="contHorario__div borde_1"> 
				<p class="contHorario__p">Mañana</p>    <?php 	                              
				foreach($Datos['horario_Sab'] as $row) :  
				endforeach;  ?>
				<div class="contInputRadio"> 
					<input class="contInputRadio__input" type="checkbox" name="sabado_M" id="Sabado_M" value="Sabado" <?php if(!empty($row['sabado_m']) == 'Sabado'){echo 'checked';}?>/>
					<!-- <label class="contInputRadio__label" for="Sabado_M">Sábado</label> -->
				</div>
				<div class="contSelectVert">
					<p class="contHorario__p">Apertura</p>
					<select class="contSelectVert__select borde_1" name="inicioManana_Sab" id="InicioManana_Sab" disabled>
						<option><?php echo $row['sabado_m'] == 'Sabado' ? $row['inicia_m_Sab'] : '00:00';?></option> 
						<option></option>
						<option>05:00 am</option>
						<option>05:30 am</option>
						<option>06:00 am</option>
						<option>06:30 am</option>
						<option>07:00 am</option>
						<option>07:30 am</option>
						<option>08:00 am</option>
						<option>08:30 am</option>
						<option>09:00 am</option>
						<option>09:30 am</option>
						<option>10:00 am</option>
					</select>
					<br>
					<p class="contHorario__p">Cierre</p>
					<select class="contSelectVert__select borde_1" name="culminaManana_Sab" id="CulminaManana_Sab" disabled>
						<option><?php echo $row['sabado_m'] == 'Sabado' ? $row['culmina_m_Sab'] : '00:00';?></option> 
						<option></option>
						<option>10:00 am</option>
						<option>10:30 am</option>
						<option>11:00 am</option>
						<option>11:30 am</option>
						<option>12:00 m</option>
						<option>12:30 pm</option>
						<option>1:00 pm</option>
						<option>1:30 pm</option>
						<option>2:00 pm</option>
					</select>
				</div> 
			</div>
						
			<!-- SABADO TARDE -->                  
			<div class="contHorario__div borde_1">
				<div class="">
					<p class="contHorario__p">Tarde</p>    <?php 	                              
					foreach($Datos['horario_Sab'] as $row) :  
					endforeach;	  ?>
					<div class="contInputRadio"> 
						<input class="contInputRadio__input" type="checkbox" name="sabado_T" id="Sabado_T" value="Sabado" <?php if(!empty($row['sabado_t']) == 'Sabado'){echo 'checked';}?>/>
						<!-- <label class="contInputRadio__label" for="Sabado_T">Sábado</label> -->
					</div>
					<div class="contSelectVert">
						<p class="contHorario__p">Apertura</p>
						<select class="contSelectVert__select borde_1" name="inicioTarde_Sab" id="InicioTarde_Sab" disabled>
							<option><?php echo $row['sabado_t'] == 'Sabado' ? $row['inicia_t_Sab'] : '00:00';?></option> 
							<option></option>
							<option>12:00 m</option>
							<option>12:30 pm</option>
							<option>1:00 pm</option>
							<option>1:30 pm</option>
							<option>2:00 pm</option>
							<option>2:30 pm</option>
							<option>3:00 pm</option>
							<option>3:30 pm</option>
							<option>4:00 pm</option>
							<option>4:30 pm</option>
							<option>5:00 pm</option>
							<option>5:30 pm</option>
							<option>6:00 pm</option>
							<option>6:30 pm</option>
							<option>7:00 pm</option>
						</select>
						<br>
						<p class="contHorario__p">Cierre</p>
						<select class="contSelectVert__select borde_1" name="culminaTarde_Sab" id="CulminaTarde_Sab" disabled>
							<option><?php echo $row['sabado_t'] == 'Sabado' ? $row['culmina_t_Sab'] : '00:00';?></option> 
							<option></option>
							<option>4:00 pm</option>
							<option>4:30 pm</option>
							<option>5:00 pm</option>
							<option>5:30 pm</option>
							<option>6:00 pm</option>
							<option>6:30 pm</option>
							<option>7:00 pm</option>
							<option>7:30 pm</option>
							<option>8:00 pm</option>
							<option>8:30 pm</option>
							<option>9:00 pm</option>
							<option>9:30 pm</option>
							<option>10:00 pm</option>
							<option>10:30 pm</option>
							<option>11:00 pm</option>
							<option>11:30 pm</option>
							<option>12:00 am</option>
							<option>12:30 am</option>
							<option>1:00 am</option>
							<option>1:30 am</option>
							<option>2:00 am</option>
							<option>2:30 am</option>
							<option>3:00 am</option>
						</select>
					</div> 
				</div>
			</div>
		</div>

		<!-- DOMINGO -->
		<div class="contHorario">
			<h2 class="contHorario__h2 borde_1">Domingo</h2> 
			
			<!-- DOMINGO MAÑANA -->  
			<div class="contHorario__div borde_1"> 
				<div>
					<p class="contHorario__p">Mañana</p>    <?php 	                              
					foreach($Datos['horario_Dom'] as $row) :  
					endforeach;  ?>
					<div class="contInputRadio"> 
						<input class="contInputRadio__input" type="checkbox" name="domingo_M" id="Domingo_M" value="Domingo" <?php if(!empty($row['domingo_m']) == 'Domingo'){echo 'checked';}?>/>
						<!-- <label class="contInputRadio__label" for="Domingo_M">Domingo</label> -->
					</div>
					<div class="contSelectVert">
						<p class="contHorario__p">Apertura</p>
						<select class="contSelectVert__select borde_1" name="inicioManana_Dom" id="InicioManana_Dom" disabled>
							<option><?php echo $row['domingo_m'] == 'Domingo' ? $row['inicia_m_Dom'] : '00:00';?></option> 
							<option></option>
							<option>05:00 am</option>
							<option>05:30 am</option>
							<option>06:00 am</option>
							<option>06:30 am</option>
							<option>07:00 am</option>
							<option>07:30 am</option>
							<option>08:00 am</option>
							<option>08:30 am</option>
							<option>09:00 am</option>
							<option>09:30 am</option>
							<option>10:00 am</option>
						</select>
						<br>
						<p class="contHorario__p">Cierre</p>
						<select class="contSelectVert__select borde_1" name="culminaManana_Dom" id="CulminaManana_Dom" disabled>
							<option><?php echo $row['domingo_m'] == 'Domingo' ? $row['culmina_m_Dom'] : '00:00';?></option> 
							<option></option>
							<option>10:00 am</option>
							<option>10:30 am</option>
							<option>11:00 am</option>
							<option>11:30 am</option>
							<option>12:00 m</option>
							<option>12:30 pm</option>
							<option>1:00 pm</option>
							<option>1:30 pm</option>
							<option>2:00 pm</option>
						</select>
					</div> 
				</div> 
			</div>
						
			<!-- DOMINGO TARDE -->                        
			<div class="contHorario__div borde_1">
				<div class="">
					<p class="contHorario__p">Tarde</p>    <?php 	                              
					foreach($Datos['horario_Dom'] as $row) :  
					endforeach;	  ?>
					<div class="contInputRadio"> 
						<input class="contInputRadio__input" type="checkbox" name="domingo_T" id="Domingo_T" value="Domingo" <?php if(!empty($row['domingo_t']) == 'Domingo'){echo 'checked';}?>/>
						<!-- <label class="contInputRadio__label" for="Domingo_T">Domingo</label> -->
					</div>
					<div class="contSelectVert">
						<p class="contHorario__p">Apertura</p>
						<select class="contSelectVert__select borde_1" name="inicioTarde_Dom" id="InicioTarde_Dom" disabled>
							<option><?php echo $row['domingo_t'] == 'Domingo' ? $row['inicia_t_Dom'] : '00:00';?></option> 
							<option></option>
							<option>12:00 m</option>
							<option>12:30 pm</option>
							<option>1:00 pm</option>
							<option>1:30 pm</option>
							<option>2:00 pm</option>
							<option>2:30 pm</option>
							<option>3:00 pm</option>
							<option>3:30 pm</option>
							<option>4:00 pm</option>
							<option>4:30 pm</option>
							<option>5:00 pm</option>
						</select>
						<br>
						<p class="contHorario__p">Cierre</p>
						<select class="contSelectVert__select borde_1" name="culminaTarde_Dom" id="CulminaTarde_Dom" disabled>
							<option><?php echo $row['domingo_t'] == 'Domingo' ? $row['culmina_t_Dom'] : '00:00';?></option> 
							<option></option>
							<option>4:00 pm</option>
							<option>4:30 pm</option>
							<option>5:00 pm</option>
							<option>5:30 pm</option>
							<option>6:00 pm</option>
							<option>6:30 pm</option>
							<option>7:00 pm</option>
							<option>7:30 pm</option>
							<option>8:00 pm</option>
							<option>8:30 pm</option>
							<option>9:00 pm</option>
							<option>9:30 pm</option>
							<option>10:00 pm</option>
							<option>10:30 pm</option>
							<option>11:00 pm</option>
							<option>11:30 pm</option>
							<option>12:00 am</option>
							<option>12:30 am</option>
							<option>1:00 am</option>
							<option>1:30 am</option>
							<option>2:00 am</option>
							<option>2:30 am</option>
							<option>3:00 am</option>
						</select>
					</div> 
				</div>
			</div>
		</div>

		<div>
			<span>Añada una excepción si algún día de la semana tiene un horario en particular</span>
			<br><br>
			<label class="label_4 label_24" id="Label_3">Añadir excepción</label>
			
		<!-- EXCEPCIÓN -->	
		<div class="contHorario ocultar" id="Contenedor_89">
			<h2 class="contHorario__h2 borde_1">Día de excepción
			<span class="icon-cancel-circle span_10 span_14 span_17_js"></span></h2>
			<!-- EXEPCIÓN MAÑANA -->  
			<div class="contHorario__div borde_1" >
				<div>
					<p class="contHorario__p">Mañana</p>  <?php 					
					//$Datos proviene de Cuenta_C	 	                              
					foreach($Datos['horario_Esp'] as $row) :   
					endforeach; ?>
					<div class="contInputRadio"> 
						<input type="radio" name="horario_Espec_M" value="Lunes" id="LunesEsp_M" <?php if(!empty($row['especial_m']) == 'Lunes'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="LunesEsp_M">Lunes</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_M" value="Martes" id="MartesEsp_M"
						<?php if(!empty($row['especial_m']) == 'Martes'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="MartesEsp_M">Martes</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_M" value="Miercoles" id="MiercolesEsp_M"
						<?php if(!empty($row['especial_m']) == 'Miercoles'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="MiercolesEsp_M">Miercoles</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_M" value="Jueves" id="JuevesEsp_M"
						<?php if(!empty($row['especial_m']) == 'Jueves'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="JuevesEsp_M">Jueves</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_M" value="Viernes" id="ViernesEsp_M"
						<?php if(!empty($row['especial_m']) == 'Viernes'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="ViernesEsp_M">Viernes</label>   
						<br class="br_1"/>
					</div>
					<div class="contSelectVert">
						<p class="contHorario__p">Apertura</p>
						<select class="contSelectVert__select borde_1" name="inicioManana_Esp">
							<option><?php echo !empty($row['inicia_m_Esp']) ? $row['inicia_m_Esp'] : '00:00';?></option> 
							<option></option>
							<option>5:00 am</option>
							<option>5:30 am</option>
							<option>6:00 am</option>
							<option>6:30 am</option>
							<option>7:00 am</option>
							<option>7:30 am</option>
							<option>8:00 am</option>
							<option>8:30 am</option>
							<option>9:00 am</option>
							<option>9:30 am</option>
							<option>10:00 am</option>
						</select>
						<br>
						<p class="contHorario__p">Cierre</p>
						<select class="contSelectVert__select borde_1" name="culminaManana_Esp">
							<option><?php echo !empty($row['culmina_m_Esp']) ? $row['culmina_m_Esp'] : '00:00';?></option> 
							<option></option>
							<option>10:00 am</option>
							<option>10:30 am</option>
							<option>11:00 am</option>
							<option>11:30 am</option>
							<option>12:00 m</option>
							<option>12:30 pm</option>
							<option>1:00 pm</option>
							<option>1:30 pm</option>
							<option>2:00 pm</option>
						</select>
					</div> 
				</div>       
			</div>
			
			<!-- EXEPCIÓN TARDE -->  
			<div class="contHorario__div borde_1">             
				<div>
					<p class="contHorario__p">Tarde</p>	    <?php 	                              
					foreach($Datos['horario_LV'] as $row) :  
					endforeach;  ?>
					<div class="contInputRadio">
						<input type="radio" name="horario_Espec_T" value="Lunes" id="LunesEsp_T" <?php if(!empty($row['especial_t']) == 'Lunes'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="LunesEsp_T">Lunes</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_T" value="Martes" id="MartesEsp_T" <?php   if(!empty($row['especial_t']) == 'Martes'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="MartesEsp_T">Martes</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_T" value="Miercoles" id="MiercolesEsp_T" <?php if(!empty($row['especial_t']) == 'Miercoles'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="MiercolesEsp_T">Miercoles</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_T" value="Jueves" id="JuevesEsp_T" <?php  if(!empty($row['especial_t']) == 'Jueves'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="JuevesEsp_T">Jueves</label>
						<br class="br_1"/>
						<input type="radio" name="horario_Espec_T" value="Viernes" id="ViernesEsp_T" <?php if(!empty($row['especial_t']) == 'Viernes'){echo 'checked';}?> onclick="gestionarClickRadio(this)"/>
						<label class="contInputRadio__label" for="ViernesEsp_T">Viernes</label>
						<br class="br_1"/>
					</div>
					<div class="contSelectVert">
						<p class="contHorario__p">Apertura</p>
						<select class="contSelectVert__select borde_1" name="inicioTarde_Esp" >
							<option><?php echo !empty($row['inicia_t_Esp']) ? $row['inicia_t_Esp'] : '00:00';?></option>
							<option></option>
							<option>12:00 m</option>
							<option>12:30 pm</option>
							<option>1:00 pm</option>
							<option>1:30 pm</option>
							<option>2:00 pm</option>
							<option>2:30 pm</option>
							<option>3:00 pm</option>
							<option>3:30 pm</option>
							<option>4:00 pm</option>
							<option>4:30 pm</option>
							<option>5:00 pm</option>
							<option>5:30 pm</option>
							<option>6:00 pm</option>
							<option>6:30 pm</option>
							<option>7:00 pm</option>
						</select>
						<p class="contHorario__p">Cierre</p>
						<select class="contSelectVert__select borde_1" name="culminaTarde_Esp">
							<option><?php echo !empty($row['culmina_t_Esp']) ? $row['culmina_t_Esp'] : '00:00';?></option>
							<option></option>
							<option>4:00 pm</option>
							<option>4:30 pm</option>
							<option>5:00 pm</option>
							<option>5:30 pm</option>
							<option>6:00 pm</option>
							<option>6:30 pm</option>
							<option>7:00 pm</option>
							<option>7:30 pm</option>
							<option>8:00 pm</option>
							<option>8:30 pm</option>
							<option>9:00 pm</option>
							<option>9:30 pm</option>
							<option>10:00 pm</option>
							<option>10:30 pm</option>
							<option>11:00 pm</option>
							<option>11:30 pm</option>
							<option>12:00 am</option>
							<option>12:30 am</option>
							<option>1:00 am</option>
							<option>1:30 am</option>
							<option>2:00 am</option>
							<option>2:30 am</option>
							<option>3:00 am</option>
						</select>
					</div> 
				</div>
			</div>
		</div>
	</fieldset>
</section>

<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/GestionRadio.js';?>"></script> 
<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Horario.js';?>"></script> 