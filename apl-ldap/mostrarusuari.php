<?php
echo "<center><h1><u>Dades de l'usuari</u></h1></center></br>";
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
				$r = ldap_search($ldapconn, "dc=fjeclot, dc=net","uid=".$uid);
					if($r) {
						$info = ldap_get_entries($ldapconn, $r);
						
						if($info['count']==0){
						
						header('Location: errormostrar.php'); 
					}else{
						for ($i=0; $i<$info["count"]; $i++)
						{
							echo "<h5><b>UID:</b> ".$info[$i]["uid"][0]. "</h5>";
							echo "<h5><b>OU:</b> ".$ou. "</h5>";
							echo "<h5><b>CN</b> ".$info[$i]["cn"][0]. "</h5>";
							echo "<h5><b>SN:</b> ".$info[$i]["sn"][0]. "</h5>";
							echo "<h5><b>Given Name:</b> ".$info[$i]["givenname"][0]. "</h5>";
							echo "<h5><b>Title:</b> ".$info[$i]["title"][0]. "</h5>";
							echo "<h5><b>Telephone Number:</b> ".$info[$i]["telephonenumber"][0]. "</h5>";
							echo "<h5><b>Mobile:</b> ".$info[$i]["mobile"][0]. "</h5>";
							echo "<h5><b>Postal Address:</b> ".$info[$i]["postaladdress"][0]. "</h5>";
							echo "<h5><b>GID Number:</b> ".$info[$i]["gidnumber"][0]. "</h5>";
							echo "<h5><b>UID Number:</b> ".$info[$i]["uidnumber"][0]. "</h5>";
							echo "<h5><b>Home Directory:</b> ".$info[$i]["homedirectory"][0]. "</h5>";
							echo "<h5><b>Description:</b> ".$info[$i]["description"][0]. "</h5>";
						} 
					}	
				}  
			} else {
				header('Location: errorlogin.php'); 	
			}
			}
			}
?>

<html>
	<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<LINK REL=StyleSheet HREF="estils.css" TYPE="text/css" MEDIA=all>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <title>Mostrar dades usuari</title>
	</head>
 	<body class="p-3 mb-2 bg-info text-white">
	 	<div class="container" style="text-align:center;margin-top:50px;">
			<form action="mostrarusuari.php" method='post'>
				<table class="table table-hover table-dark">
				<tr>
					<td><h3> UID:</h3></td>
					<td><input class="form-control" type='text' name='uid' size='16' maxlength='15' autocomplete="off"></td>
				</tr>
				<tr>
					<td><h3> OU:</h3></td>
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
					<td colspan='2'>
						<center></br>
						<input class="button1 btn btn-success" style="vertical-align:middle" type='submit' value="Mostrar">
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
		   </div></br>	   
		   
	</br></br></br>
	<footer>
        <p>Posted by: JS & GP</br>
        Informacion de Contacto:</br>
        <a href="mailto:15584684.clot@fje.edu">15584684.clot@fje.edu</a>/
        <a href="mailto:15584275.clot@fje.edu">15584275.clot@fje.edu</a></p>        
    </footer>
  	</body>
</html>

