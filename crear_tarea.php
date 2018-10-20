<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['crear_tarea'] = true;
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
	-->
</SCRIPT>

<body onload="document.getElementById('tarea').focus();">
    <div id="site_content">
        <?php  
        include("menu.php");
        ?>
        <div id="content">
        	<h1>CREAR TAREA</h1>
        	<form name="formTarea" action="guardar_tarea.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Tarea</div></td>
							<td><input name="tarea" id="tarea" cols="30" rows="10" class="textin"></input></td>
						</tr>
						<tr>
							<td><div class="campos">Descripción</div></td>
							<td><textarea name="descrip" id="descrip" cols="30" rows="10" class="textin"></textarea></td>
						</tr>
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formTarea)"/>
								<input type="button" name="volver" class="botin" value="Volver" onClick="history.back()"/>
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
