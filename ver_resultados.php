<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$fecha = date("Y-m-d H:i:s");
$id = $_GET['id'];
?>
<script>
	function cambia_de_pagina(){
		location.href="listar_tarea.php"
	}
</script>

<div id="site_content">
    <?php  
    include("menu.php");
    ?>
    <div id="content">
    	<h1>RESULTADOS</h1>
    	<div class="datagrid2">
			<table>
				<?php
				echo "<br><br><br>";					
				if ($_SESSION['ver_resultado']) {
					$_SESSION['ver_resultado'] = false;							
					foreach($_POST as $os => $valor){
						$asignacion = "\$".$os."='".$valor."';"; 
						eval($asignacion);
					}
					$sql = "SELECT * FROM resultados WHERE id_tarea = '$id' ORDER BY id DESC";
					$query = mysql_query($sql,$conexion);
					$cantidad = mysql_num_rows($query);
					$fila = mysql_fetch_array($query);
					if ($cantidad == 0) {
						echo "<div class=mensaje>Aun no hay resultados disponibles.</div>";
					}elseif ($cantidad > 0) {
						$sql2 = "SELECT * FROM tareas WHERE id = '".$fila['id_tarea']."'";
						$query2 = mysql_query($sql2,$conexion);
						$fila2 = mysql_fetch_array($query2);
						$task = $fila2['tarea'];
						?>
						<div style="padding-right: 30px">
                			<table id="myTable" class="table table-hover" style="width: 95%;">
			                    <thead>
			                        <tr class="active">
			                            <th a>TAREA</th>
			                            <th a>DESCRIPCION DE LA EJECUCION</th>
				                        <th a>USUARIO</th>
				                        <th a>EJECUCION</th>
				                        <th a>IMAGEN</th>
			                        </tr>
			                    </thead>
			                    <tbody>
		                                <td><?php echo $task; ?></td>
		                                <td title="<?php echo $fila['descripcion'];?>"><?php echo substr($fila["descripcion"], 0, 65)."..."; ?></td>
		                                <td><?php echo $fila['usuario']; ?></td>
		                                <td>
		                                	<?php
		      		                    if ($fila['resultado'] == 'exito') {
											echo "<div class=mensajexito>Exitosa</div>";
										} elseif ($fila['resultado'] == 'fallo') {
											echo "<div class=mensajerror>Erronea</div>";
										} elseif ($fila['resultado'] == 'incompleta') {
											echo "<div class=mensajeincompleto>Incompleta</div>";
										}
		                                	?>
		                                </td>
		                                <td>
		                                	<?php
		                                	if ($fila['img']) {
		                                		?>
  		                                	<a title="Abrir imagen" href="ver_foto.php?id=<?php echo $fila['id'] ?>">
	  		                                	<?php
	  		                                	echo '<img style="border-style: solid; border-width: 3px; border-color:#b7ddf2; border-radius: 25%;" height="130px" src="data:image/jpeg;base64,'.base64_encode( $fila['img'] ).'"/>'
	  		                                	?>
  		                                	</a>
		                                		<?php
		                                	} else {
		                                		echo "Sin imagen";	
		                                	}
		                                	?> 		                                	
		                                </td>
		                            </tbody>
			                </table>
			            </div>					            
						<?php
					}
				}else{
					echo "<div class=mensaje>Imposible realizar la operación. Vuelva a intentarlo.</div>";
					?><meta http-equiv="refresh" content="3;URL=listar_tarea.php"><?php
				}
				?>
				<div class="botones">
					<tr>
						<td colspan="2">
							<input type="button" name="volver" class="botin" value="Volver" onclick="javascript:cambia_de_pagina();"/>
						</td>
					</tr>
				</div>
			</table>					
		</div>
    </div>
</div>
<?php  
include("pie.php");
?>