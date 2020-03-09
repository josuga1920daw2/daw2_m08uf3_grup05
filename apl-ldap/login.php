<html lang="cat">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<LINK REL=StyleSheet HREF="estils.css" TYPE="text/css" MEDIA=all>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	<title>Login Administrador</title>
	</head>
	<body class="p-3 mb-2 bg-info text-white">
		<div class="container" style="text-align:center;margin-top:50px;">
			<form action='login.php'method='post'>
				<h1 style="text-align:center"><u>INICIA SESSIÓ COM A ADMINISTRADOR</u></h1><br>	
					<table class="table table-hover table-dark">
		   				<tr>
							<td><h3>Nom d'usuari de l'administrador LDAP:<h3></td>
							<td ><input class="form-control" type='text' name='usuari' size='16' maxlength='15' autocomplete="off"></td>
						</tr>
		   				<tr>
							<td><h3>Contrasenya de l'administrador LDAP:<h3></td>
							<td ><input class="form-control" type='password' name='ctsny' size='16' maxlength='15'></td>
						</tr>
						<tr>
							<td colspan=2></br>
								<center>
								<input class="button1 btn btn-success" style="vertical-align:middle" type='submit' value="Validar">
								</center></br>
							</td>
						</tr>
					</table>
			</form>
		</div></br></br></br>
		<footer>
        	<p>Posted by: JS & GP</br>
        	Informacion de Contacto:</br>
        	<a href="mailto:15584684.clot@fje.edu">15584684.clot@fje.edu</a>/
        	<a href="mailto:15584275.clot@fje.edu">15584275.clot@fje.edu</a></p>        
    	</footer>
	</body>
</html>

<?php
session_start(); 
if(isset($_POST['usuari'])&&($_POST['ctsny']))
{
$ldaphost = "ldap://localhost";
$ldappass = trim($_POST['ctsny']);
$ldapadmin= "cn=".trim($_POST['usuari']).",dc=fjeclot,dc=net"; 
$ldapconn = ldap_connect($ldaphost) or die(header('Location: loginadminerror.php'));

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

if ($ldapconn) {
    $ldapbind = ldap_bind($ldapconn, $ldapadmin, $ldappass);
    if ($ldapbind) {
        echo header('Location: gestiousuaris.php');
	} 
	else {
		header('Location: errorlogin.php'); 
    }
}
}
?>