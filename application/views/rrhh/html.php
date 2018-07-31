				



				
					
					
			    	
					
					
					
					
					<div class="form-group">
						<label for="">label</label>
						<input type="text" class="form-control" id="" placeholder="Input field">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>



<form action="user/edit" method="POST" role="form">					
					<input type="hidden" name="tipoEdit" id="inputTipoEdit" class="form-control" value="2">
					<div class="form-group">
						<label for="institucion">Institución</label>
						<input type="text" class="form-control" id="institucion" name="institucion" placeholder="Institución">
					</div>
					<div class="form-group">
						<label for="carrera_curso">Carrera - Curso</label>
						<input type="text" class="form-control" id="carrera_curso" name="carrera_curso" placeholder="Carrera - Curso">
					</div>
					<div class="form-group">
						<label for="nivelEstudio">Nivel de estudio</label>
						<input type="text" class="form-control" id="nivelEstudio" name="nivelEstudio" placeholder="Nivel de estudio">
					</div>
					<div class="form-group">
						<label for="paisFormacion">País</label>
						<input type="text" class="form-control" id="paisFormacion" name="paisFormacion" placeholder="País">
					</div>
					<div class="form-group">
						<label for="ciudadFormacion">Ciudad</label>
						<input type="text" class="form-control" id="ciudadFormacion" name="ciudadFormacion" placeholder="Ciudad">
					</div>
					<div class="form-group">
						<label for="fechaIngresoProfesion">Fecha de ingreso</label>
						<div class='input-group date' id='dtpfechaIngresoProfesion'>
							<input type="text" class="form-control" id="fechaIngresoProfesion" name="fechaIngresoProfesion" placeholder="Fecha de ingreso">		
							<span class="input-group-addon">
				                <span class="glyphicon glyphicon-calendar"></span>
				            </span>		
		                </div>
					</div>
					<div class="form-group">
						<label for="fechaSalidaProfesion">Fecha de Salida</label>
						<div class='input-group date' id='dtpfechaSalidaProfesion'>
							<input type="text" class="form-control" id="fechaSalidaProfesion" name="fechaSalidaProfesion" placeholder="Fecha de Salida">		
							<span class="input-group-addon">
				                <span class="glyphicon glyphicon-calendar"></span>
				            </span>		
		                </div>
					</div>
					<div class="form-group">
						<label for="cargaHoraria">Carga Horaria</label>
						<input type="text" class="form-control" id="cargaHoraria" name="cargaHoraria" placeholder="Carga Horaria">
					</div>
					<button type="submit" class="btn btn-primary">Añadir</button>
				</form>



<form action="user/edit" method="POST" role="form">
					<input type="hidden" name="tipoEdit" id="inputTipoEdit" class="form-control" value="3">
					<br>				
					<div class="form-group">
						<label for="cargoEmpresa">Cargo en la Empresa</label>
						<input type="text" class="form-control" id="cargoEmpresa" name="cargoEmpresa" placeholder="Cargo en la Empresa">
					</div>
					<div class="form-group">
						<label for="nombreEmpresa">Nombre de la Empresa</label>
						<input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" placeholder="Nombre de la Empresa">
					</div>
					<div class="form-group">
						<label for="industria">Industria</label>
						<input type="text" class="form-control" id="industria" name="industria" placeholder="Industria">
					</div>
					<div class="form-group">
						<label for="descripcionExperiencia">Descripción</label>
						<input type="text" class="form-control" id="descripcionExperiencia" name="descripcionExperiencia" placeholder="Descripción">
					</div>
					<div class="form-group">
						<label for="paisExperiencia">País</label>
						<input type="text" class="form-control" id="paisExperiencia" name="paisExperiencia" placeholder="País">
					</div>
					<div class="form-group">
						<label for="ciudadExperiencia">Ciudad</label>
						<input type="text" class="form-control" id="ciudadExperiencia" name="ciudadExperiencia" placeholder="Ciudad">
					</div>
					<div class="form-group">
						<label for="fechaInicioExperiencia">Fecha de inicio</label>
						<div class='input-group date' id='dtpfechaInicioExperiencia'>
							<input type="text" class="form-control" id="fechaInicioExperiencia" name="fechaInicioExperiencia" placeholder="Fecha de ingreso">		
							<span class="input-group-addon">
				                <span class="glyphicon glyphicon-calendar"></span>
				            </span>		
		                </div>
					</div>
					<div class="form-group">
						<label for="fechafinExperiencia">Fecha de finalización</label>
						<div class='input-group date' id='dtpfechafinExperiencia'>
							<input type="text" class="form-control" id="fechafinExperiencia" name="fechafinExperiencia" placeholder="Fecha de finalización">		
							<span class="input-group-addon">
				                <span class="glyphicon glyphicon-calendar"></span>
				            </span>		
		                </div>
					</div>
					<div class="form-group">
						<label for="personasCargo">Personas a su cargo</label>
						<input type="text" class="form-control" id="personasCargo" name="personasCargo" placeholder="Personas a su cargo">
					</div>
					<button type="submit" class="btn btn-primary">Añadir</button>
				</form>



<form action="user/edit" method="POST" role="form">
					<input type="hidden" name="tipoEdit" id="inputTipoEdit" class="form-control" value="4">
					<br>
					<div class="form-group">
						<label for="tipoRelacion">Tipo de relación</label>
						<select name="tipoRelacion" class="form-control" required>
							foreach
			        	</select>
					</div>
					<div class="form-group">
						<label for="apellidoPaternoFamiliar">Apelldo Paterno</label>
						<input type="text" class="form-control" id="apellidoPaternoFamiliar" name="apellidoPaternoFamiliar" placeholder="Apelldo Paterno">
					</div>
					<div class="form-group">
						<label for="apellidoMaternoFamiliar">Apelldo Materno</label>
						<input type="text" class="form-control" id="apellidoMaternoFamiliar" name="apellidoMaternoFamiliar" placeholder="Apelldo Materno">
					</div>
					<div class="form-group">
						<label for="nombresFamiliar">Nombres</label>
						<input type="text" class="form-control" id="nombresFamiliar" name="nombresFamiliar" placeholder="Nombres">
					</div>
					<div class="form-group">
						<label for="ciFamiliar">CI</label>
						<input type="text" class="form-control" id="ciFamiliar" name="ciFamiliar" placeholder="CI">
					</div>
					<div class="form-group">
						<label for="direccionFamiliar">Dirección</label>
						<input type="text" class="form-control" id="direccionFamiliar" name="direccionFamiliar" placeholder="Dirección">
					</div>
					<div class="form-group">
						<label for="telefonoFamiliar">Telefono</label>
						<input type="text" class="form-control" id="telefonoFamiliar" name="telefonoFamiliar" placeholder="Telefono">
					</div>
					<div class="form-group">
						<label for="codigoSeguroFamiliar">Codigo Seguro</label>
						<input type="text" class="form-control" id="codigoSeguroFamiliar" name="codigoSeguroFamiliar" placeholder="Codigo Seguro">
					</div>
					<button type="submit" class="btn btn-primary">Añadir</button>
				</form>

<form action="user/edit" method="POST" role="form">
					<input type="hidden" name="tipoEdit" id="inputTipoEdit" class="form-control" value="5">
					
				</form>