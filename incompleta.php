<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$fecha = date("Y-m-d H:i:s");
@$idtarea = $_POST['id_im'];
$_SESSION['tarea'] = "incompleta";
?>
	<SCRIPT LANGUAGE="JavaScript"> 
		<!--
		function validar(form){
			Ctrl = form.descrip;
			if (Ctrl.value == ""){
				alert ("Por favor ingrese una breve descripcion!");
				Ctrl.focus();
				return;    	  
			}

			form.submit();
		}
		-->
	</SCRIPT>

    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>EJECUCION INCOMPLETA</h1>
        	<div class="datagrid2">
				<table>
					<?php
					echo "<br><br><br>";					
					if (@$_POST['descrip']){
						$revisar = getimagesize($_FILES["image"]["tmp_name"]);
					    $image = $_FILES['image']['tmp_name'];
					    $imgContenido = addslashes(file_get_contents($image));
						@$sql2 = "INSERT INTO resultados (id_tarea, resultado, descripcion, usuario, img) VALUES ('".$_POST['id_task']."', '".$_SESSION['tarea']."', '".$_POST['descrip']."', '".$_SESSION['usuario']."',  '$imgContenido')";
						$query2 = mysql_query($sql2,$conexion);
						if(mysql_error() == ""){
							@mysql_free_result($query2);
							echo "<div class=mensaje>Tarea ejecutada incompleta.</div>";
							?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
						}else{
							echo "<div class=mensaje>No se pudo ejecutar la tarea. El error es: ".mysql_error().".</div>";
							?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
						}
						mysql_close($conexion);
					}else{
						?>
						<form name="actualizar" action="<?php $PHP_SELF ?>" method="post" enctype="multipart/form-data">
				        	<div class="datagrid2">
								<table>
									<input TYPE="hidden" NAME="id_task" ID="id_task" value="<?php echo $idtarea;?>">
									</input>
									<tr>
										<td><div class="campos">Descripción</div></td>
										<td><textarea placeholder="Por favor, indique una descripcion del error y los pasos para reproducirlos." name="descrip" id="descrip" cols="30" rows="10" class="textin" value=""></textarea></td>
									</tr>
									<tr>
										<td><div class="campos">Adjuntar</div></td>
										<td><input type="file" name="image" accept=".pdf,.jpg,.png" multiple>
										<br><br><span>Por favor , de ser posible agrege una captura de pantalla <br> donde se vea el error obtenido.</span></td>
									</tr>
								</table>
								<div class="botones">
									<tr>
										<td colspan="2">
											<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(actualizar)"/>
										</td>
									</tr>
								</div>
							</div>
						</form>
						<?php
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