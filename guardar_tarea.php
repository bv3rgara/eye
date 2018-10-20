<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$fecha = date("Y-m-d H:i:s")
?>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>GUARDAR TAREA</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";					
						if (($_POST['tarea']) and ($_SESSION['crear_tarea'])) {
							foreach($_POST as $os => $valor){
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}	
							$_SESSION['crear_tarea'] = false;							
							$sql2 = "INSERT INTO tareas(tarea, descripcion, usuario, fecha) VALUES ('$tarea', '$descrip', '".$_SESSION['usuario']."', '$fecha')";
							$query2 = mysql_query($sql2,$conexion);
							if(mysql_error() == ""){
								@mysql_free_result($query2);
								echo "<div class=mensaje>La tarea se ha creado exitosamente.</div>";
								?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
							}else{
								echo "<div class=mensaje>No se pudo guardar ejecutar la operación. El error es: ".mysql_error().".</div>";
								?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
							}
							mysql_close($conexion);
						}else{
							echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
							?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
						}
						?>
					</table>					
				</div>
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>