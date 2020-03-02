<?php
 	session_start();
	require( "../inc/inc.default.php" );
 	require( "../inc/inc.login.php" );

  

	entete( "Accueil" );
?>

<head>
        <title>YouTube, Twitch, Twitter,</title>
        <meta name="description" content="InStan - Website allows to track different metrics used to follow influencers">
        <meta name="keywords" content="InStan, InStan Stats, YouTube Stats, YouTube, Twitch, Twitch Stats, InStan Twitch, Instagram, Instagram Stats, InStan Instagram, InStan Partnership">
 
        <meta charset="UTF-8">
        <link href="../CSS/styles.css" type = "text/css" rel="stylesheet" >
		 <link href="../CSS/loading.css" type = "text/css" rel="stylesheet" >
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
  <div class="box">
   <div class="b b1"></div>
   <div class="b b2"></div>
   <div class="b b3"></div>
   <div class="b b4"></div>
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
</script>

</body>
</html>

<?php
  if (count($_POST)==3) //si inscription
    signup($_POST['identifiant'], $_POST['mdp'], $_POST['mdp_verif']);

  elseif (count($_POST)==2) //si login
    signin($_POST['identifiant'], $_POST['mdp']);

  elseif (count($_POST)==1) //si logout
    logout();
	
?>