<?php
	session_start();
	include "cabecera.inc.php";
	$ok = 0;
	if (isset($_GET['error']))
	{
		$error = $_GET["error"];
		if ($error == "si")
			$ok = 1;
	}
	$textError = "<h4> Error en el usuario o contraseña </h4>";

	if (isset($_SESSION["IdUser"]))
	{
		header("Location: bandeja.php");
		exit();
	}
?>


<div class="container" style="padding: 70px 0px 0px 0px;">
	<div class="row">
		<div class="col-8">
			<form method="POST" action="controlusuario.php">	
				<div class="wrapper fadeInDown">	
					<h3>
						<?php	if ($ok == 1)	echo $textError; ?>
					</h3>
					<div id="formContent">
						<h1>Ingresar</h1>
						<input type="text" id="login" class="fadeIn second" name="usuario" placeholder="Usuario">
						<input type="password" id="password" class="fadeIn third" name="contrasenia" placeholder="Constrasenia">
						<input type="submit" class="fadeIn fourth" value="Ingresar">
						<div id="formFooter" style="padding: 0px 0px 0px 0px;">
							<h2 style="margin: 10px 0px 10px 0px;">Sistema</h2>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-1">
			<h5>Lista de usuarios:</h5>
			<table class="table table-sm">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Rol</th>
				<th scope="col">User</th>
				<th scope="col">Pass</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<th scope="row">1</th>
				<td>Universitario</td>
				<td>sergio</td>
				<td>123456</td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Kardex</td>
					<td>zulema</td>
					<td>123456</td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td>Universitario</td>
					<td>juan</td>
					<td>123456</td>
				</tr>
				<tr>
					<th scope="row">4</th>
					<td>Universitario</td>
					<td>daniel</td>
					<td>123456</td>
				</tr>
				<tr>
					<th scope="row">5</th>
					<td>Kardex</td>
					<td>virginia</td>
					<td>123456</td>
				</tr>
				<tr>
					<th scope="row">6</th>
					<td>Gestiones</td>
					<td>maria</td>
					<td>123456</td>
				</tr>
				<tr>
					<th scope="row">7</th>
					<td>Decano</td>
					<td>grover</td>
					<td>123456</td>
				</tr>
				<tr>
					<th scope="row">8</th>
					<td>Director</td>
					<td>jose</td>
					<td>123456</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
</div>



<?php 
	include "pie.inc.php";
?>