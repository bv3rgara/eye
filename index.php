<html>
		<head>
		    <title>EYE</title>
		    <link rel="shortcut icon" href="imagenes/favicon.ico" />
		    <link href='css/estilos.css' rel='stylesheet' type='text/css'>
			<style type="text/css">
				body {
				    background: url('imagenes/fondo-login.jpg') no-repeat fixed center center;
				    background-size: cover;
				}
			</style>
			<script type="text/javascript" src="js/alertify/alertify.js"></script>
			<link rel="stylesheet" href="css/alertify/themes/alertify.core.css" />
			<link rel="stylesheet" href="css/alertify/themes/alertify.default.css"/> 
			 <script type="text/javascript">
		        function mostrar_error() {
		            alert("Error!!! Ingrese nuevamente usuario y contrase�a"); 
		        }
		    </script>
		</head>
		<?php 
		@session_start();
		include_once "conexion.php"; 
		function verificar_login($usuario,$contrasena,&$result){ 
		    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND pass = '$contrasena'";
		    $rec = mysql_query($sql); 
		    $count = 0; 
		    while($row = mysql_fetch_object($rec)){ 
		        $count++; 
		        $result = $row; 
		    } 
		    if($count == 1){ 
		        return 1; 
		    }else{ 
		        return 0; 
		    } 
		}
		if(!isset($_SESSION['id'])){ //para saber si existe o no ya la variable de sesi? que se va a crear cuando el usuario se logee
		    if(isset($_POST['login'])){
		        if(verificar_login($_POST['usuario'],$_POST['contrasena'],$result) == 1){ 
		            $_SESSION['id'] = $result->id_usuario;
		            $_SESSION['usuario'] = $result->usuario;
		            $_SESSION['categoria'] = $result->categoria; 
					?>
					<meta http-equiv="refresh" content="0; url=index.php">  
					<?php 
		        }else{?>
		        	<body language=JavaScript onLoad="mostrar_error()"><?php       	
		        } 
		    }?>
				    <form name="formlogin" role="form" method="post">
						<div class="login-block">
						    <h1>L O G I N</h1>
						    <input type="text" value="" placeholder="Usuario" id="usuario" name="usuario" />
						    <input type="password" value="" placeholder="Contrase�a" id="contrasena" name="contrasena" />
				            <button type="submit" name="login"">Acceder</button>
                           	<p><b>No tienes usuario?</b> <a href="alta_usuario.php">Registrate</a></p>
						</div>
					</form>
				</body>
			</html>
			</form> 
			<?php 
		} else { 
			?><meta http-equiv="refresh" content="0;URL=http://localhost/eye/listar_tarea.php"><?php
		}?>