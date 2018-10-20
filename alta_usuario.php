<?php  
@session_start();
include("cabecera.php");
include("conexion.php");
$_SESSION['grabo_usuario'] = true;
?>
<SCRIPT LANGUAGE="JavaScript"> 
	<!--

	function validar(form){
		Ctrl = form.usuario;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese el usuario!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.categoria;
		if (Ctrl.value == 0){
			alert ("Por favor ingrese la categoria!");
			Ctrl.focus();
			return;    	  
		}

		Ctrl = form.pass;
		if (Ctrl.value == ""){
			alert ("Por favor ingrese la contraseña!");
			Ctrl.focus();
			return;    	  
		}

		form.submit();
	}

	function cambia_de_pagina(){
	    location.href="index.php"
	}
	-->
</SCRIPT>

<body onload="document.getElementById('usuario').focus();">
    <div id="site_content">
        <div id="content">
        	<h1>ALTA USUARIO</h1>
        	<form name="formAltaUsuario" action="guardar_usuario.php" method="POST">
	        	<div class="datagrid2">
					<table>
						<tr>
							<td><div class="campos">Usuario</div></td>
							<td><input type="text" id="usuario" name="usuario" class="textin" maxlength="20" /></td>
						</tr>
						<tr>
							<td><div class="campos">Categoría</div></td>
							<td>
								<SELECT NAME="categoria" id="categoria" class="textin2">
									<OPTION VALUE="0" SELECTED>Seleccione Categoría
									<OPTION VALUE="em">Empresa
									<OPTION VALUE="es">Estudiante
								</SELECT>
							</td>
						</tr>
						<tr>
							<td><div class="campos">Contraseña</div></td>
							<td><input type="password" name="pass" id="pass" class="textin" value="" maxlength="8"/></td>
						</tr>
					</table>
					<div class="botones">
						<tr>
							<td colspan="2">
								<input type="button" name="guardar" class="botin" value="Guardar" onClick="validar(formAltaUsuario)"/>
								<input type="button" name="volver" class="botin" value="Volver" onclick="javascript:cambia_de_pagina();"/>
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