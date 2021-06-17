<?php
session_start();
include "conexion.inc.php";
$flujo=$_GET["flujo"];
$proceso=$_GET["proceso"];
$formulario=$_GET["formulario"];
$tramite=$_GET["tramite"];
include "flujos/".strtolower($flujo)."/".strtolower($proceso).'/'.$formulario.".controlador.form.inc.php";

if (isset($_GET["Siguiente"]))
{
	$flagUser = false;
	$sql="select * from flujo where Flujo='$flujo' and proceso='$proceso'";
	$resultado=mysqli_query($conn, $sql);
	$fila=mysqli_fetch_array($resultado);
	$rolA = $fila["roles"];
	$procesosiguiente=$fila["procesosiguiente"];
	if (is_null($procesosiguiente))
	{
		$procesosiguiente = $procesoCondicional;
	}
	$dateTime = date("Y-m-d H:i:s");
	$today = new DateTime($dateTime); 

	$sql2 = "update seguimiento set fechafin='$dateTime' where codFlujo='$flujo' and codProceso='$proceso' and nroTramite='$tramite'";

	$resultado2=mysqli_query($conn, $sql2);

	if (isset($procesosiguiente) and $procesosiguiente != "Fin")
	{
		$sql="select * from flujo where Flujo='$flujo' and proceso='$procesosiguiente'";
		$resultado=mysqli_query($conn, $sql);
		$fila=mysqli_fetch_array($resultado);
		$rol = $fila["roles"];
		if ($rol != $rolA)
		{
			$flagUser = true;
			if ($rol != 'U')
			{
				$sql4 = "select * from usuario where rol='".$rol."'";
				$res4 = mysqli_query($conn, $sql4);

				$sql7 = "select * from cargatrabajo where codFlujo='".$flujo."' and codProceso='".$procesosiguiente."'";
				$res7 = mysqli_query($conn, $sql7);
				$fila7 = mysqli_fetch_array($res7);
				if (isset($fila7["idCarga"]))
				{
					$mat = array();
					$cont = 0;
					while ($fila4 = mysqli_fetch_array($res4))
					{ 
						$sql6 = "SELECT sum(c.Peso) as peso ";
						$sql6.= "from cargatrabajo c, seguimiento s ";
						$sql6.= "where c.codFlujo = s.codFlujo and c.codProceso = s.codProceso and s.fechafin is null and s.usuario = ".$fila4["id"];
	
						$res6 = mysqli_query($conn, $sql6);
						$fila6 = mysqli_fetch_array($res6);
						if ($fila6["peso"] == null)
							$fila6["peso"] = 0;
						array_push($mat, array($fila4["id"], $fila6["peso"]));
						$cont += 1;
					}
					$minPeso = array("none", 1e9);
					for ($i = 0; $i < sizeof($mat); $i++)
					{	
						if ($mat[$i][1] < $minPeso[1])
						{
							$minPeso = $mat[$i];
						}
					}
					$usuario = $minPeso[0];
				}
				else
				{
					$fila4 = mysqli_fetch_array($res4);
					$usuario = $fila4['id'];
					$sql4 = "select * from usuario where rol='".$rol."'";
					$res4 = mysqli_query($conn, $sql4);
					while($fila4 = mysqli_fetch_array($res4))
					{
						$sql5 = "select * from seguimiento where nroTramite='$tramite' and usuario='".$fila4['id']."'";
						echo $sql5;
						$res5 = mysqli_query($conn, $sql5);
						$fila5 = mysqli_fetch_array($res5);
						if (isset($fila5["usuario"]))
							$usuario = $fila4['id'];
					}
				}
			}
			else 
			{
				$sql4 = "select * from seguimiento where nroTramite='$tramite' and codFlujo='".$flujo."' and codProceso='P1'";
				$res4 = mysqli_query($conn, $sql4);
				$fila4 = mysqli_fetch_array($res4);
				$usuario = $fila4['usuario'];
			}
		}
		else 
			$usuario = $_SESSION["IdUser"];
		$sql3 = "INSERT INTO `seguimiento`(`nroTramite`, `codFlujo`, `codProceso`, `usuario`, `fechaini`)";
		$sql3.= "VALUES ('$tramite','$flujo','$procesosiguiente','".$usuario."','$dateTime')";
		$resultado = mysqli_query($conn, $sql3);
	}
	
	$sql5="select * from flujo where Flujo='$flujo' and proceso='$procesosiguiente'";
	$resultado5=mysqli_query($conn, $sql5);
	$fila=mysqli_fetch_array($resultado5);

	if ($fila["procesosiguiente"] == null or $fila["procesosiguiente"] == "Fin" or $flagUser)
		header("Location: bandeja.php");
	else 
		header("Location: motor.php?flujo=$flujo&proceso=$procesosiguiente&tramite=$tramite");
}
else
{
	header("Location: bandeja.php");
}

?>
