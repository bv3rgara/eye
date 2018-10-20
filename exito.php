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
        	<h1>EJECUCION EXITOSA</h1>
	        	<div class="datagrid2">
					<table>
						<?php
						echo "<br><br><br>";					
						if (($_SESSION['tarea'])) {
							$_SESSION['tarea'] = false;							
							foreach($_POST as $os => $valor){
								$asignacion = "\$".$os."='".$valor."';"; 
								eval($asignacion);
							}
							$sql2 = "INSERT INTO resultados (id_tarea, resultado, usuario) VALUES ('$id_ex', 'exito', '".$_SESSION['usuario']."')";
							$query2 = mysql_query($sql2,$conexion);
							if(mysql_error() == ""){
								@mysql_free_result($query2);
								echo "<div class=mensaje>La tarea se ha ejecutado exitosamente. Muchas gracias por participar.</div>";
								?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
							}else{
								echo "<div class=mensaje>No se pudo ejecutar la tarea. El error es: ".mysql_error().".</div>";
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
