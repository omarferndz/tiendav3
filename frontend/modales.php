<div class="modal fade" id="myModal"> 
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<form class="form-horizontal" action="backend/usuarios/insertar.php" method="post">
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
				<h4 class="modal-title">Registrese</h4> 
			</div>
			<div class="modal-body"> 
				
					<div class="form-group">
						<label class="col-md-4 text-right" for="ubicacion">Estado</label>
						<div class="col-md-8">
							<select name="ubicacion" id="ubicacion" class="form-control" required>
							<option value="-1">Seleccione una opción</option>
							<?php include("backend/combos/ubicacion.php"); ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 text-right" for="nombre">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 text-right" for="apellido">
							Apellido
						</label>
						<div class="col-md-8">
							<input type="text" name="apellido" id="apellido" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 text-right" for="correo">Correo</label>
						<div class="col-md-8">
							<input type="text" name="correo" id="correo" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 text-right" for="clave">clave</label>
						<div class="col-md-8">
							<input type="password" name="clave" id="clave" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 text-right" for="telefono">Telefono</label>
						<div class="col-md-8">
							<input type="number" name="telefono" id="telefono" class="form-control">
						</div>
					</div>
				</div> 
			<div class="modal-footer"> 
				<button type="submit" class="btn btn-info">Registrarme</button> 
			</div> 
			</form>
		</div> 
	</div>
</div>



<div class="modal fade" id="myModal2"> 
	<div class="modal-dialog"> 
	<div class="modal-content"> 
	<form class="form-horizontal" action="backend/validar.php" method="post"> 
		<div class="modal-header"> 
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
			<h4 class="modal-title">Iniciar Sesión</h4> 
		</div>
		<div class="modal-body"> 
			<div class="form-group"> 
				<label for="correo" class="col-md-4 control-label">Correo</label> 
				<div class="col-md-8">
					<input type="text" class="form-control" id="correo" placeholder="correo" name="correo" required> 
				</div>
			</div>
			<div class="form-group"> 
				<label for="clave" class="col-md-4 control-label">Clave</label> 
				<div class="col-md-8">
					<input type="password" class="form-control" id="clave" name="clave" placeholder="Password" required> 
				</div>
			</div> 
			
		</div> 
		<div class="modal-footer"> 
			<button type="submit" class="btn btn-info">Entrar</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button> 
		</div>
	</form>
	</div> 
</div>
</div>

    









</div>