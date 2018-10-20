<!-- #084575:   #6B8E23 -->
<!-- #0975b8: #9ACD32 -->
<style type="text/css">
	#cssmenu {
	  width: auto;
	  /*border: 1px solid #0975b8;*/
	  background: #0975b8;
	}

	#cssmenu > ul {
	  padding: 1px 0;
	  margin: 0px;
	  list-style: none;
	  width: 100%;
	  height: 21px;
	  /*border-top: 1px solid #FFFFFF;
	  border-bottom: 1px solid #FFFFFF;*/
	  font: normal 7.5pt 'Comic Sans MS', sans-serif;
	  letter-spacing: 0.1em;
	}

	#cssmenu > ul li {
	  margin: 0;
	  padding: 0;
	  display: block;
	  float: right;
	  position: relative;
	  width: 258px;
	}

	#cssmenu > ul li a:link,
	#cssmenu > ul li a:visited {
	  padding: 4px 0;
	  display: block;
	  text-align: center;
	  text-decoration: none;
	  background: #0975b8;
	  color: #f7f7f7;	  
	  width: 258px;
	}

	#cssmenu > ul li:hover a,
	#cssmenu > ul li a:hover,
	#cssmenu > ul li a:active {
	  padding: 4px 0;
	  display: block;
	  text-align: center;
	  text-decoration: none;
	  background: #084575;
	  color: #ffffff;
	  width: 258px;
	 /* border-left: 1px solid #ffffff;
	  border-right: 1px solid #ffffff;*/
	}

	#cssmenu > ul li ul {
	  margin: 0;
	  padding: 1px 1px 0;
	  list-style: none;
	  display: none;
	 /* background: #ffffff;*/
	  width: 258px;
	  position: absolute;
	  top: 21px;
	  left: -1px;
	  /*border: 1px solid #0975b8;
	  border-top: none;*/
	}

	#cssmenu > ul li:hover ul {
	  display: block;
	}

	#cssmenu > ul li ul li {
	  clear: left;
	  width: 258px;
	}

	#cssmenu > ul li ul li a:link,
	#cssmenu > ul li ul li a:visited {
	  clear: left;
	  background: #0975b8;
	  padding: 4px 0;
	  width: 258px;
	  /*border-top: 1px solid #ffffff;
	  border-bottom: 1px solid #ffffff;*/
	  position: relative;
	  z-index: 1000;
	}

	#cssmenu > ul li ul li:hover a,
	#cssmenu > ul li ul li a:active,
	#cssmenu > ul li ul li a:hover {
	  clear: left;
	  background: #084575;
	  padding: 4px 0;
	  width: 258px;
	  font-size: 12px;
	  color: #CDF63E;
	  /*border-top: 1px solid #ffffff;
	  border-bottom: 1px solid #ffffff;*/
	  position: relative;
	  z-index: 1000;
	}

	#cssmenu > ul li ul li ul.navigation-3 {
	  display: none;
	  margin: 0;
	  padding: 0;
	  list-style: none;
	  position: absolute;
	  left: 145px;
	  top: -2px;
	  padding: 1px 1px 0 1px;
	  /*border: 1px solid #0975b8;*/
	  /*border-right: 1px solid #0975b8;
	  border-left: 1px solid #0975b8;
	  background: #ffffff;*/
	  z-index: 900;
	}

	#cssmenu > ul li ul li:hover ul.navigation-3 {
	  display: block;
	}

	#cssmenu > ul li ul li ul.navigation-3 li a:link,
	#cssmenu > ul li ul li ul.navigation-3 li a:visited {
	  background: #0975b8;
	}
</style>
<div class="scrollable">
	<div class="items">
		<div class="item">
			<div class="header1"></div>                                    
		</div>
		<div class="item">
			<div class="header2"></div>						
		</div>
		<div class="item">
			<div class="header3"></div>						
		</div>			
	</div>
</div>
<div class="navi"></div>
<div id='cssmenu' >
	<ul>
		<li><a href="/eye/logout.php">CERRAR SESION</a></li>
		<?php 
    	if ($_SESSION['categoria'] == 'em') {
    		?>
    		<li style="float: left;"><a href="#">EMPRESA: <?php echo $_SESSION['usuario'] ?></a></li>
    		<?php
    	}elseif ($_SESSION['categoria'] == 'es') {
    		?>
    		<li style="float: left;"><a href="#">ESTUDIANTE: <?php echo $_SESSION['usuario'] ?></a></li>
    		<?php
    	}
    	?>
	</ul>
</div>