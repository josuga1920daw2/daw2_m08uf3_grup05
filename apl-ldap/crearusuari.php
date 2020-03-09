<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<LINK REL=StyleSheet HREF="estils.css" TYPE="text/css" MEDIA=all>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crear Usuari</title>
	</head>
 <body class="p-3 mb-2 bg-info text-white">
	<div class="container" style="text-align:center;margin-top:50px;">
		<h1><u>Creació d'usuaris</u></h1></br>
		<form action='crearusuari.php' method='post'>
			<table class="table table-hover table-dark">
			<tr>
				<td><h3>UID:</h3></td>
				<td><input class="form-control" type='text' name='uid' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Nom:</h3></td>
				<td><input class="form-control" type='text' name='nom' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Cognom:</h3></td>
				<td><input class="form-control" type='text' name='cognom' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Unitat Organitzativa:</h3></td>
				<td>
					<div class="input-group mb-3">
						<select class="custom-select form-control" type='text' name='ou'>
							<option value="administradors">administradors</option>
							<option value="desenvolupadors">desenvolupadors</option>
							<option value="usuaris">usuaris</option>
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<td><h3>Càrrec:</h3></td>
				<td><input class="form-control" type='text' name='title' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Telèfon fixe:</h3></td>
				<td><input class="form-control"type='text' name='telephoneNumber' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Mòbil:</h3></td>
				<td><input  class="form-control"type='text' name='mobile' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Codi Postal:</h3></td>
				<td><input class="form-control" type='text' name='postalAddress' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Número UID:</h3></td>
				<td><input class="form-control" type='text' name='uidNumber' autocomplete="off"></td>
			</tr>
			<tr>
				<td><h3>Número GID:</h3></td>
				<td><input class="form-control" type='text' name='gidNumber' autocomplete="off"></td>
			</tr>
				<tr>
				<td><h3>Descripció:</h3></td>
				<td><input class="form-control" type='text' name='description' autocomplete="off"></td>
			</tr>
			<tr>
				<td colspan=2></br>
					<center>
					<input class="button1 btn btn-success" style="vertical-align:middle" type='submit' value="Crear">
					</center></br>
				</td>
			</tr>
			</table>
		</form>
		<?php
			echo "<a href='gestiousuaris.php'>
			<center>
				<button type='button' class='button1 btn btn-success' style='vertical-align:middle'>
					<span>Tornar</span>
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

<?php

if(isset($_POST['uid']) && ($_POST['nom']) && ($_POST['cognom']) && ($_POST['ou']) && ($_POST['title']) && ($_POST['telephoneNumber']) && ($_POST['mobile']) && ($_POST['postalAddress']) && ($_POST['gidNumber']) && ($_POST['uidNumber']) && ($_POST['description'])){
	$ldaphost = "ldap://localhost";
	$ldappass = "fjeclot";
	$ldapadmin= "cn=admin,dc=fjeclot,dc=net"; 

	$ldapconn = ldap_connect($ldaphost) or die(header('Location: errorlogin.php'));

	ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

	if ($ldapconn) {

		$ldapbind = ldap_bind($ldapconn, $ldapadmin, $ldappass);

		if($ldapbind) {
			$info["objectclass"][0] = 'top';
			$info["objectclass"][1] = 'person';
			$info["objectclass"][2] = 'organizationalPerson';
			$info["objectclass"][3] = 'inetOrgPerson';
			$info["objectclass"][4] = 'posixAccount';
			$info["objectclass"][5] = 'shadowAccount';
			$info["cn"] = $_POST['nom']." ".$_POST['cognom'];
			$info["sn"] = trim($_POST['cognom']);
			
			$info["givenname"] = trim($_POST['nom']);
			$info["title"] = trim($_POST['title']);
			$info["telephonenumber"] = trim($_POST['telephoneNumber']);
			$info["mobile"] = trim($_POST['mobile']);
			$info["postaladdress"] = trim($_POST['postalAddress']);
			$info["loginshell"] = '/bin/bash';
			$info["gidnumber"] = trim($_POST['gidNumber']);
			$info["uidnumber"] = trim($_POST['uidNumber']);
			$info["homedirectory"] = "/home/".trim($_POST['uid'])."/";
			$info["description"] = trim($_POST['description']);

			$dn = "uid=".trim($_POST['uid']).",ou=".trim($_POST['ou']).",dc=fjeclot,dc=net";
			$r = ldap_add($ldapconn, "$dn", $info);
			if($r) {
				header('Location: exitcrear.php');
			}
			else {
				header('Location: errorcrear.php'); 
			}
			ldap_close($ldapconn);
		} else {
			header('Location: errorlogin.php'); 	
		}
	}
}
?>