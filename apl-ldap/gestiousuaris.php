<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<LINK REL=StyleSheet HREF="estils.css" TYPE="text/css" MEDIA=all>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	<title>Gestió d'usuaris</title>
	</head>
	<body class="p-3 mb-2 bg-info text-white">
	 	<div class="container" style="text-align:center;margin-top:100px;width:50%;">
			<h1 id="central"><u>GESTIÓ D'USUARIS</u></h1>	
				<a href='crearusuari.php'>        
					<center>
          				<button type="button" class="button1 btn btn-success" style="vertical-align:middle">
            				<span>Crear Usuari</span>
          				</button>
					 </center> 
				</a></br>
				<a href='esborrarusuari.php'>
					<center>
          				<button type="button" class="button1 btn btn-success" style="vertical-align:middle">
            				<span>Esborrar Usuari </span>
          				</button>
					 </center> 
				</a></br> 
				<a href='mostrarusuari.php'>
					<center>
          				<button type="button" class="button1 btn btn-success" style="vertical-align:middle">
            				<span>Mostrar Dades Usuari </span>
          				</button>
					 </center> 
				</a></br>
				<a href='modificarusuari.php'>
					<center>
          				<button type="button" class="button1 btn btn-success" style="vertical-align:middle">
            				<span>Modificar Usuari </span>
          				</button>
					 </center> 
				</a></br>
				<?php
					echo "<a href='logout.php'>
					<center>
						<button type='button' class='button1 btn btn-success' style='vertical-align:middle'>
					  		<span>Tancar la sessió</span>
						</button>
			   		</center></a>";
				?>
		</div></br></br></br>
	  	<footer>
        	<p>Posted by: JS & GP</br>
        	Informacion de Contacto:</br>
        	<a href="mailto:15584684.clot@fje.edu">15584684.clot@fje.edu</a> /
        	<a href="mailto:15584275.clot@fje.edu">15584275.clot@fje.edu</a></p>        
    	</footer>
  	</body>
</html>
