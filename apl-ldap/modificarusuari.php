<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<LINK REL=StyleSheet HREF="estils.css" TYPE="text/css" MEDIA=all>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <title>Modificar usuari</title>
	<title>Modificar Usuari</title>
	</head>
 	<body class="p-3 mb-2 bg-info text-white">
		 <div class="container" style="text-align:center;margin-top:50px;">
		 <h1><u>Modificar dades usuari</u></h1></br>
			<form action="modificarusuari.php" method='post'>
				<table class="table table-hover table-dark">
				<tr>
					<td><h3>UID:</h3> </td>
					<td><input class="form-control" type='text' name='uid' size='16' maxlength='15' autocomplete="off"></td>
				</tr><tr>
					<td><h3>Unitat Organitzativa:</h3> </td>
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
					<td><h3>Nou UID:</h3> </td>
					<td><input class="form-control" type='text' name='uidNumber' size='16' maxlength='15' autocomplete="off"></td>
				</tr>
				<tr>
					<td><h3>Nou GID:</h3></td>
					<td><input class="form-control" type='text' name='gidNumber' size='16' maxlength='15' autocomplete="off"></td>
				</tr>
				<tr>
					<td colspan='2'></br>
						<center>
						<input class="button1 btn btn-success" style="vertical-align:middle" type='submit' value="Modificar">
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
if(isset($_POST['uid']) && ($_POST['ou'])){
$ldaphost = "ldap://localhost";
$ldappass = "fjeclot";
$ldapadmin= "cn=admin,dc=fjeclot,dc=net"; 

$ldapconn = ldap_connect($ldaphost) or die(header('Location: errorlogin.php'));

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

if ($ldapconn) {
$ldapbind = ldap_bind($ldapconn, $ldapadmin, $ldappass);

if($ldapbind) {
    $uid=trim($_POST['uid']);
    $ou=trim($_POST['ou']);
    $gid=trim($_POST['gidNumber']);
    $uidn=trim($_POST['uidNumber']);
    
    if($uid != NULL && $gid != NULL  ){
	$info["gidNumber"] = $gid;
	$info["uidNumber"] = $uidn;
	
	$dn = "uid=".$uid.",ou=".$ou.",dc=fjeclot,dc=net";

	$r = ldap_modify($ldapconn, "$dn", $info);
}
 if($uid == NULL && $gid != NULL ){
	$info["gidNumber"] = $gid;
	$dn = "uid=".$uid.",ou=".$ou.",dc=fjeclot,dc=net";
	$r = ldap_modify($ldapconn, "$dn", $info);
}
 if($gid == NULL && $uid != NULL ){
	$info["uidNumber"] = $uidn;
	$dn = "uid=".$uid.",ou=".$ou.",dc=fjeclot,dc=net";
	$r = ldap_modify($ldapconn, "$dn", $info);
}
	if($r) {
		header('Location: exitmodificar.php');
	}
	else {
		header('Location: errormodificar.php');
	}
	 ldap_close($ldapconn);
	} 
	else {
		header('Location: errorlogin.php'); 	
	}
}
}
?>
