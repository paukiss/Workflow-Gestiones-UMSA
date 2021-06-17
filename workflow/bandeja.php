<?php
session_start();
include "conexion.inc.php";
include "cabecera.inc.php";
$sql="select * from seguimiento where fechafin is null and usuario=".$_SESSION["IdUser"];
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
	  <h1 class="text-slim text-default">Bandeja de Entrada</h1>
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
				<a href="bandeja.php" style="background-color: #8DDFD7;"><i class="fas fa-inbox"></i> Bandeja Entrada</a>
			</li>
			<li>
				<a href="bandejaS.php" style="background-color: #8DDFD7;" ><i class="fas fa-envelope"></i> Bandeja Salida</a>
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
			<th scope="col"> Proceso - Tramite </th>	
			<th scope="col">Tiempo Restante</th>
			<th scope="col">Accion</th>
			
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

		$empiezoTime = $fila["fechaini"];
		$dateTime = date("Y-m-d H:i:s");

		$a = new DateTime($empiezoTime);
		$b = new DateTime($dateTime);
		$sec = (abs($b->getTimestamp() - ($a)->getTimestamp()));

		$diff = intval(259200 - $sec);
		
		if ($diff < 0)
		{
			echo "<td>Nada</td>";
		}
		else 
		{
			$dia = intdiv($diff, 86400);
			$hora = intdiv(($diff % 86400), 3600);
			$minuto = intdiv((($diff % 86400) % 3600), 60);
			$segundo = ((($diff % 86400) % 3600) % 60);
			$mostrar = $dia." dias, ".$hora."h:".$minuto."m:".$segundo."s";
			echo "<td>".$mostrar."</td>";
		}
		
		echo "<td><a href='motor.php?flujo=".$fila["codFlujo"]."&proceso=".$fila["codProceso"]."&tramite=".$fila["nroTramite"]."'>Ver</a></td>";
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