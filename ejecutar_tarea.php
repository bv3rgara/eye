<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['tarea'] = true;
$id_tarea = $_GET['indice'];
$sql = "SELECT * FROM tareas WHERE id = '".$id_tarea."'";
$r = @mysql_query($sql,$conexion);
$tareas = @mysql_fetch_array($r);
?>
<SCRIPT LANGUAGE="JavaScript"> 
	<!--

	function validar(form){
		Ctrl = form.tarea;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese la tarea!");
			Ctrl.focus();
			return;    	  
		}

		form.submit();
	}

	function exito(id){
		document.getElementById('id_ex').value=id;
		document.exito_t.submit() 
	}

	function error(id){
		document.getElementById('id_er').value=id;
		document.error_t.submit() 
	}

	function incompleta(id){
		document.getElementById('id_im').value=id;
		document.incompleta_t.submit()
	}
	-->
</SCRIPT>

<FORM NAME="exito_t" METHOD="POST" ACTION="exito.php">
	<INPUT TYPE="hidden" NAME="id_ex" ID="id_ex">
</FORM>

<FORM NAME="error_t" METHOD="POST" ACTION="error.php">
	<INPUT TYPE="hidden" NAME="id_er"  ID="id_er">
</FORM>

<FORM NAME="incompleta_t" METHOD="POST" ACTION="incompleta.php">
	<INPUT TYPE="hidden" NAME="id_im"  ID="id_im">
</FORM>

<body onload="document.getElementById('tarea').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>EJECUTAR TAREA</h1>
        	<form name="formTarea" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Tarea</div></td>
							<td>
								<input name="tarea" id="tarea" cols="30" rows="10" class="textin" value="<?php  echo $tareas['tarea']?>" readonly></input>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Descripción</div></td>
							<td><textarea name="descrip" id="descrip" cols="30" rows="10" class="textin" value="" readonly><?php echo $tareas['descripcion'] ?></textarea></td>
						</tr>
						<tr>
							<td><div class="campos">Empresa</div></td>
							<td>
								<input name="empresa" id="empresa" cols="30" rows="10" class="textin" value="<?php  echo $tareas['usuario']?>" readonly></input>
							</td>
						</tr>
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input value="Exito" class="botin" type="button" name="exitox" title="Exito en la ejecucion" onClick="exito(<?php echo $tareas['id'];?>);">
								<input value="Error" class="botin" type="button" name="errorx" title="Error en la ejecucion" onClick="error(<?php echo $tareas['id'];?>);">
								<input value="Incompleta" class="botin" type="button" name="incompletax" title="No se puede ejecutar completamente" onClick="incompleta(<?php echo $tareas['id'];?>);">
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
