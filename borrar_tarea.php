<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id = $_POST['id'];
$sql_e = "SELECT * FROM tareas WHERE id = '".$id."'";  
$query_e = mysql_query($sql_e,$conexion);
$tarea = mysql_fetch_array($query_e);
$nombre = $tarea["tarea"];
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>BORRAR TAREA</h1>
        	<?php
        	echo "<br><br><br>";
   			$sql = "DELETE FROM tareas WHERE id = '".$id."'";
			$res = mysql_query($sql,$conexion);
			if (mysql_error() == ''){
				echo "<div class=mensaje>La tarea <i><u>".$nombre."</u></i> ha sido eliminado satisfactoriamente.</div>";
				?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
			}else{
				echo "<div class=mensaje>No se pudo realizar la eliminación de la tarea <i><u>".$nombre."</u></i>.</div>";
				?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
			}
			?>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
