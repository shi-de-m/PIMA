<?php
  session_start();
	require( "../inc/inc.default.php" );
  require( "../inc/inc.login.php" );

  if (!empty($_SESSION)) echo '<meta http-equiv="refresh" content="1;url=index.php"/>';

	entete( "Login" );
  //menu( "login" );


  $bd = new PDO('mysql:host=localhost; dbname=instan', 'root', '');
  $req = $bd->prepare("SELECT * FROM influenceurs");
  $req->execute();
?>

<head>
        <title>YouTube, Twitch, Twitter,</title>
        <meta name="description" content="InStan - Website allows to track different metrics used to follow influencers">
        <meta name="keywords" content="InStan, InStan Stats, YouTube Stats, YouTube, Twitch, Twitch Stats, InStan Twitch, Instagram, Instagram Stats, InStan Instagram, InStan Partnership">
 
        <meta charset="UTF-8">
        <link href="../CSS/styles.css" type = "text/css" rel="stylesheet" >
		<link href="../CSS/login.css" type = "text/css" rel="stylesheet" >
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"  type='text/css' />
</head>


<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>




<body>

<!-- Navbar -->
<?php
menu();
?>


<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-center">

    <form method="POST" action="compte.php">
      <label for="identifiant">Identifiant : </label>
      <input type="text" size="20" maxlength="30" name="identifiant" id="identifiant"/>
      </br>
      <label for="password">Mot de passe : </label>
      <input type="password" size="20" maxlength="30" name="mdp" id="mdp"/>
      </br>
      <input type="submit" value="Connexion">
    </form>

    </br>


    <?php
	    if (isset($_GET['vide']) && $_GET['vide']==1) echo "Veuillez remplir tous les champs d'inscription. </br>" ;
	    if (isset($_GET['dif']) && $_GET['dif']==1) echo "Les deux mots de passe rentrés sont différents. </br>" ;
	    if (isset($_GET['pwd']) && $_GET['pwd']==0) echo "Le mot de passe doit contenir au moins 8 caractères. </br>" ;
	    if (isset($_GET['user']) && $_GET['user']==0) echo "Cet utilisateur existe déjà. </br>" ;
	    if (isset($_GET['signin']) && $_GET['signin']==0) echo "Identifiant ou mot de passe incorrect </br>";
    ?>


    </br>


    <h3 onclick="hide_for_newcomers()">Pas encore inscrit ?</h3>
    <div style="display: none;" id="hide_for_newcomers">
	<form method="POST" action="compte.php">
      <label for="identifiant">Identifiant : </label>
      <input type="text" size="20" maxlength="30" name="identifiant" id="identifiant"/>
      </br>
      <label for="mdp">Mot de passe : </label>
      <input type="password" size="20" maxlength="30" name="mdp" id="mdp"/>
      </br>
      <label for="mdp_verif">Vérification du mot de passe : </label>
      <input type="password" size="20" maxlength="30" name="mdp_verif" id="mdp_verif"/>
      </br>
      <input type="submit" value="Inscription">
    </form>
	</div>

  </div>
</div>



<!-- Footer -->
<?php
  pied();
?>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function hide_for_newcomers(){
  var x = document.getElementById("hide_for_newcomers");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

</body>
</html>