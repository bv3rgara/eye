<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$id = $_GET['id'];
?>
<SCRIPT LANGUAGE="JavaScript"> 
	<!--
	function validar(form){
		form.submit();
	}
	-->
</SCRIPT>

<body onload="document.getElementById('tarea').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>EDITAR TAREA</h1>
    		<?php   		
		    if (@$_POST['tarea']){
				$sql = "UPDATE tareas SET tarea='".$_POST['tarea']."', descripcion='".$_POST['descrip']."' WHERE id='".$id."'";
				$r = mysql_query($sql,$conexion);
				if (mysql_error() == ""){
					@mysql_free_result($r);
					echo "<div class=mensaje>La edición en los datos de la tarea <i><u>".$_POST['tarea']."</u></i> se ha ejecutado satisfactoriamente.</div>";
					?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php						
				}else{
					echo "<div class=mensaje>No se pudo realizar la edición de la tarea <i><u>".$_POST['tarea']."</u></i></div>";
					?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
				}
			}
			$sql = "SELECT * FROM tareas WHERE id = '".$id."'";
		   	$r = @mysql_query($sql,$conexion);
			$tarea = @mysql_fetch_array($r);
			if (! $tarea){
				echo "<div class=mensaje>No se encontro información de la tarea <i><u>".$tarea['nombre']."</u></i></div>";
				?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
			} 			
			?>
			<form name="actualizar" action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Tarea</div></td>
							<td><input name="tarea" id="tarea" cols="30" rows="10" class="textin" value="<?php echo $tarea['tarea'] ?>"></input></td>
						</tr>
						<tr>
							<td><div class="campos">Descripción</div></td>
							<td><textarea name="descrip" id="descrip" cols="30" rows="10" class="textin" value=""><?php echo $tarea['descripcion'] ?></textarea></td>
						</tr>
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(actualizar)"/>
								<input title="Volver al listado" type="button" name="volver" class="botin" value="Volver" onClick="history.back()"/>
							</td>
						</tr>
					</div>
				</div>
			</form>    
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>
