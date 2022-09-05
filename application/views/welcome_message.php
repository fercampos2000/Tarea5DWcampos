<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>tarea camposg</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
	<body>
	<div class="container">
		
<div class="row">
	<h2>Registro de alumnos Universitarios</h2>
</div>
<!--></!-->
<?php echo form_open('Welcome\agregar', ['id' => 'form-persona']); ?>
	<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Nombre</label>
							<input type="text" name="nombre" class="form-control" required placeholder="Nombre" id="nombre">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Apellido</label>
							<input type="text" name="apellido" class="form-control" required placeholder="Apellido" id="apellido">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Direccion</label>
							<input type="text" name="direccion" class="form-control" required placeholder="Direccion" id="direccion">
						</div>
					</div>
					<div class="row">
					    <div class="form-group col-sm-4">
							<label for="">Telefono</label>
							<input type="text" name="movil" class="form-control" required placeholder="Numero" id="movil">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Correo</label>
							<input type="email" name="email" class="form-control" required placeholder="Correo electronico" id="email">
						</div>
						<div class="form-group col-sm-4">
							<label for="">Usuario</label>
							<input type="text" name="usuario" class="form-control" required placeholder="Usuario" id="usuario">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-4">
							<label for="">Inactivo</label>
							<input type="text" name="inactivo" class="form-control" required placeholder="" id="inactivo">
						</div>
						<div class="form-group col-sm-4">
							<label for="">DPI</label>
							<input pattern="[0-9]{4}-[0-9]{5}-[0-9]{4}"  type="text" name="DPI" class="form-control" required placeholder="XXXX-XXXXX-XXXX" id="DPI">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block" onclick="guardar">Guardar</button>

	<!--></!-->
	<?php echo form_close(); ?>
	<div class="row">

	<div class="card col-12">
		<div class="card-header">
			<h4>Estudiantes UMG</h4>
		</div>
		<div class="card-body">
						<table class="table table-sm table-dark">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Nombre</th>
						<th scope="col">Apellido</th>
						<th scope="col">Direccion</th>
						<th scope="col">Telefono</th>
						<th scope="col">Correo</th>
						<th scope="col">Fecha</th>
						<th scope="col">Usuario</th>
						<th scope="col">Inactivo</th>
						<th scope="col">DPI</th>
						<th scope="col">Borrar</th>
						<th scope="col">Editar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$count = 0;
						foreach ($alumnos as $alumno){
							echo '
							<tr>
								<td>'.$alumno->alumno.'</td>
								<td>'.$alumno->nombre.'</td>
								<td>'.$alumno->apellido.'</td>
								<td>'.$alumno->direccion.'</td>
								<td>'.$alumno->movil.'</td>
								<td>'.$alumno->email.'</td>
								<td>'.$alumno->fecha_creacion.'</td>
								<td>'.$alumno->user.'</td>
								<td>'.$alumno->inactivo.'</td>
								<td>'.$alumno->DPI.'</td>
								<td><button target="_blank" type="button" class="btn btn-danger" onclick="clicked('.$alumno->alumno.')" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
								<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
								<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
								  </svg></button></td>
								<td><button type="button" class="btn btn-warning text-white" onclick="guardar('.$alumno->alumno.')","llenar_datos('.$alumno->alumno.',`'.$alumno->nombre.'`,`'.$alumno->apellido.'`,`'.$alumno->direccion.'`,`'.$alumno->movil.'`,`'.$alumno->email.'`,`'.$alumno->user.'`,`'.$alumno->inactivo.'`,`'.$alumno->DPI.'`)">✏️</button></td>
							</tr>
							';
						}
					?>
				</tbody>
				</table>
		</div>
	</div>
</div>
	</div>
		<script>
			let url = "<?php echo base_url('Welcome/editar'); ?>";
			const llenar_datos = (alumno, nombre, apellido, direccion, movil, email, usuario, inactivo, DPI)	=> {
				console.log(alumno, nombre, apellido, direccion, movil, email, usuario, inactivo, DPI);
				let path = url+"/"+alumno;
				console.log(path);
				document.getElementById('form-persona').setAttribute('action', path);
				document.getElementById('nombre').value = nombre;
				document.getElementById('apellido').value = apellido;
				document.getElementById('direccion').value = direccion;
				document.getElementById('movil').value = movil;
				document.getElementById('email').value = email;
				document.getElementById('usuario').value = usuario;
				document.getElementById('inactivo').value = inactivo;
				document.getElementById('DPI').value = DPI;
			};
		</script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>
		const clicked = (id) => {
			swal({
				title: "¿Estas seguro de eliminar el registro?",
				text: "Si lo eliminas no se podra recuperar",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
				if (willDelete) {
					swal("Presione OK si quiere eliminar el registro", {
					icon: "success",
					}).then((willDelete1) => {
						if (willDelete1) {
							location.replace("Welcome/eliminar/"+id);
						}
					});
				} else {
					swal("Ocurrio un error de eliminacion.");
				}
				});
		}
	</script>
	</body>
</html>