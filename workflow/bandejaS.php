<?php
session_start();
include "conexion.inc.php";
include "cabecera.inc.php";

$sql = "select seguimiento.nroTramite, seguimiento.codFlujo, seguimiento.codProceso, seguimiento.usuario, seguimiento.fechafin, seguimiento.fechaini ";
$sql .= "from seguimiento, (select * from seguimiento where usuario='".$_SESSION['IdUser']."') tmp ";
$sql .= "where tmp.usuario != seguimiento.usuario and tmp.nroTramite = seguimiento.nroTramite and seguimiento.fechafin is null and seguimiento.fechaini = tmp.fechafin";

$resultado=mysqli_query($conn, $sql);

if (isset($_POST["salir"]))
{
	$_SESSION["IdUser"] = null;
	header("Location: index.php");
	exit();
}

while ($fila=mysqli_fetch_array($resultado))
{
	$empiezoTime = $fila["fechaini"];
	$dateTime = date("Y-m-d H:i:s");

	$a = new DateTime($empiezoTime);
	$b = new DateTime($dateTime);
	$sec = (abs($b->getTimestamp() - ($a)->getTimestamp()));

	$diff = intval(259200 - $sec);
	
	if ($diff < 0)
	{
		$sql3 = "UPDATE `seguimiento` SET `fechafin`='$dateTime'";
		$sql3 .= " WHERE `nroTramite`='".$fila['nroTramite']."' and `codFlujo`='".$fila['codFlujo']."' and `codProceso`='".$fila['codProceso']."' and `usuario`='".$fila['usuario']."'";
		$res3 = mysqli_query($conn, $sql3);
	}
}
$resultado=mysqli_query($conn, $sql);

$sql4 = "SELECT r.tipo as tipo FROM usuario u, rol r ";
$sql4.= "WHERE u.id = ".$_SESSION["IdUser"]." and r.codRol = u.rol";
$res4 = mysqli_query($conn, $sql4);
$fila4=mysqli_fetch_array($res4);
?>



<div class="d-flex justify-content-around">
  <div class="p-2">
	  <h1 class="text-slim text-default">Bandeja de Salida</h1>
  </div>
  
	<div class="p-2">
		<form method="POST">
			<input type="submit" value="Salir" name="salir" style="background-color: red; padding: 10px 10px; margin-top: 50px;">
		</form>
	</div>
</div>

<div class="container">
	<div id="gmailTab" class="container-fluid">
		<ul class="nav nav-pills">
			<li> 
				<a href="bandeja.php" style="background-color: #8DDFD7;"><i class="fa fa-inbox"></i> Bandeja Entrada</a>
			</li>
			<li>
				<a href="bandejaS.php" style="background-color: #8DDFD7;" ><i class="fa fa-users"></i> Bandeja Salida</a>
			</li>

		</ul>
	</div>
	<br>
	<div class="d-flex justify-content-between">
      <div>
		<h3 > Bienvenido: <?php echo $_SESSION["user"] ?></h3>
      </div>
      <div>
         <h3> <?php echo $fila4["tipo"] ?></h3>
      </div>
 	</div>

	<table class="table">
	<thead>
		<tr>	
			<th scope="col">Nro Tramite</th>
			<th scope="col">Flujo</th>
			<th scope="col">Proceso</th>
			<th scope="col"> Proceso T </th>	
			<th scope="col">Estado</th>
		</tr>
	</thead>
		<?php
	while ($fila=mysqli_fetch_array($resultado))
	{
		echo "<tr>";
		echo "<th scope='row'>".$fila["nroTramite"]."</th>";
		echo "<td>".$fila["codFlujo"]."</td>";
		echo "<td>".$fila["codProceso"]."</td>";
		
		$sql2 = "select * from flujo where Flujo ='".$fila['codFlujo']."' and proceso = '".$fila['codProceso']."'";

		$res2 = mysqli_query($conn, $sql2);
		$fila2 = mysqli_fetch_array($res2);

		echo "<td>".$fila2["formulario"]."</td>";

		$sql4 = "select * from usuario where id = ".$fila["usuario"];
		$res4 = mysqli_query($conn, $sql4);
		$fila4 = mysqli_fetch_array($res4);
		echo "<td>Enviado a ".strtoupper($fila4["usuario"])."</td>";
		
		echo "</tr>";
	}
	?>
	</table>
</div>

<div class="d-flex justify-content-center">
  <div class="p-2">
	  <a href="nuevoflujo.php">Nuevo</a>
  </div>
  
  
</div>


<?php
	include("pie.inc.php");
?>