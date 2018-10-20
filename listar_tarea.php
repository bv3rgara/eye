<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['ver_resultado'] = true;
if ($_SESSION['categoria'] == 'em') {
	$sql = "SELECT * FROM tareas WHERE usuario = '".$_SESSION['usuario']."' ORDER BY usuario ASC";  
}elseif ($_SESSION['categoria'] == 'es') {
	$sql = "SELECT * FROM tareas ORDER BY usuario ASC";  
}
$query = mysql_query($sql,$conexion);
$hay = mysql_num_rows($query);
?>
<SCRIPT LANGUAGE="JavaScript"> 
<!--
	function por_borrar(id){
		document.getElementById('id').value=id;
		var answer = confirm("Realmente desea borrar la tarea?")
		if (answer){
			document.borra_tarea.submit() 
		} else {
			return;
		}
	}

	function validar(form){
		form.submit();
	}		

	-->
</SCRIPT>
<FORM NAME="borra_tarea" METHOD="POST" ACTION="borrar_tarea.php">
	<INPUT TYPE="hidden" NAME="id"  ID="id">
</FORM>
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>LISTADO DE TAREAS</h1>
        	<?php
        	if ($hay == 0){
        		echo "<div class=mensaje>Ninguna tarea creada. Presione el siguiente boton:</div>";
        	}
		    if ($_SESSION['categoria'] == 'em') {?>
	        	<FORM NAME="crearTarea" METHOD="POST" ACTION="crear_tarea.php">	
					<div class="botones">
		        		<tr>
							<td colspan="2">
								<input type="button" name="crear" class="botin" value="Crear Tarea" onClick="validar(crearTarea)"/>
							</td>
						</tr>
					</div>
				</FORM>
				<?php
			}?>
			<form name="confirmar" method="post" />
	        	<div class="datagrid2">
					<br>
					<br>
		            <div style="padding-right: 30px">
		                <table id="myTable" class="table table-hover" style="width: 95%;">
		                	<?php 
		                	if ($hay > 0){
		                		?>
			                    <thead>
			                        <tr class="active">
			                            <th a>TAREA</th>
			                            <th a>DESCRIPCION</th>
				                        <th a>FECHA</th>
			                            <?php
			                            if ($_SESSION['categoria'] == 'es'){
			                            	?>
			                            	<th a>EMPRESA</th>
				                            <th a>EJECUTAR</th>
			                            	<?php
			                        	}elseif ($_SESSION['categoria'] == 'em'){
			                        		?>
				                            <th a>ACCION</th>
			                            	<?php
			                            }
			                            ?>
			                        </tr>
			                    </thead>
		                		<?php 
		                	}
		                	?>		                		
		                    <tbody>     
		                        <?php
		                        while ($fila = mysql_fetch_array($query)) {
		                            ?> 
		                            <tr>
		                                <td><?php echo $fila['tarea']; ?></td>
		                                <td title="<?php echo $fila['descripcion'];?>"><?php echo substr($fila["descripcion"], 0, 35)."..."; ?></td>
		                                <td><?php echo $fila['fecha']; ?></td>
		                                <?php
			                            if ($_SESSION['categoria'] == 'es'){
			                            	?>
			                            	<td><?php echo $fila['usuario']; ?></td> 
			                            	<?php
			                        	}
			                            ?>               
		                                <td>
		                                <?php
		                                if ($_SESSION['categoria'] == 'es'){
		                                	?>
		                                	<input type="button" name="reset" class="imareset" title="Ejecutar Tarrea" onClick="this.form.action='ejecutar_tarea.php?indice=<?php echo $fila["id"];?>' ;this.form.submit();"/>
		                                	<?php
		                                }elseif ($_SESSION['categoria'] == 'em'){?>
		                                	<input type="button" name="modi" class="imaeditar" title="Editar Tarea" onClick="this.form.action='editar_tarea.php?id=<?php echo $fila["id"];?>';this.form.submit();"/>
											<input class="imaborrar" type="button" name="dele" title="Borrar Tarea" onClick="por_borrar(<?php echo  $fila["id"];?>);">
											<input type="button" name="modi" class="imaver" title="Ver Resultados" onClick="this.form.action='ver_resultados.php?id=<?php echo $fila["id"];?>';this.form.submit();"/>
											<?php
		                                }
		                                ?> 
		                            	</td>
		                            </tr>
		                            <?php
		                        }?>
		                    </tbody>
		                </table>
		            </div>  	        	
				</div>
			</form>    
        </div>
    </div>
</body>
<?php  
include("pie.php");
?>