<?php 
include ("conexion.php"); 
$id = $_GET['id'];
$sql2 = "SELECT img FROM resultados WHERE id = '$id'";
$query = mysql_query($sql2, $conexion);
$datos = mysql_fetch_array($query);
echo '<img style="border-style: solid; border-width: 3px; border-color:#b7ddf2; border-radius: 10%;" height="100%" src="data:image/jpeg;base64,'.base64_encode( $datos['img'] ).'"/>'
?>
<meta http-equiv="refresh" content="6;URL=listar_tarea.php">