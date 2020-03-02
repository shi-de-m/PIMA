<?php
	session_start();
	require( "../inc/inc.default.php" );
	entete( "Accueil" );
?>


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

<!-- Header -->
<header class="w3-container w3-indigo w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo instan-font">InStan</h1>
  <p class="w3-xlarge">Suivez au plus près vos influenceurs</p>
  <input type=button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" onclick=window.location.href='./liste.php'; value=Découvrez />
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Explorez InStan en tant que fan </h1>
      <h5 class="w3-padding-32"> Marre de devoir utiliser 6 comptes différents pour essayer d'attirer l'attention de votre influenceur prégéré ? Fatigué de devoir aller sur 9 magasines people différents pour obtenir les informations et dernier selfie de votre idole ? Laissez nous faire ! </h5>

      <p class="w3-text-grey">InStan fait le travail pour vous ! Suivez vos personnalités préférées, rentrez vos préférences, personnalisez votre fil d'actualité. Asseyez vous, connectez vous, faites vous un thé, appréciez.
      Vous obtiendrez les mêmes informations que sur ces 9 autres plateformes, mais sur une seule. La description en 3 points (le 3ème va vous surprendre !)</p>
    </div>

    <div class="w3-third w3-center" style="font-size:180px">
      <i class="fa fa-instagram w3-padding-64 w3-text-tawny "></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center" style="font-size:180px">
      <i class="fa fa-youtube w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1></h1>
      <h5 class="w3-padding-32">Un rendu esthétique en une page</h5>

      <p class="w3-text-grey">InStan propose des statistiques pour chaque influenceur, plus particulièrement : en un clic, un récapitulatif de tout ce que vous préférez. Les détails sont toujours là, il suffit de cliquer !</p>
    </div>
  </div>
</div>

<!-- Third Grid -->
<style>
img.displayed {
  display: block;
  margin-left: auto;
  margin-right: auto;
  height: "1000";
  width: "500";
}
</style>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content w3-center">
    <img src="../img/t1.png" height="1000" width="750">
  </div>
</div>

<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content w3-center">
    <img src="../img/t2.png" height="1000" width="750">
  </div>
</div>
<!---------------->


<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Live life to the fullest</h1>
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

