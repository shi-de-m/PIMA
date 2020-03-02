<?php
	session_start();
  require( "../inc/inc.default.php" );
  require("../inc/inc.class.instagram.php");
  /*require( "../inc/inc.login.php" );*/
  //PK vous avez mis 2 fichiers qui contient le meme code? 
  //ca fonctionne pas avec les 2 requires j'ai commenté le 2éme pour ajouté les stats d'insta dans l'affichage
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

/* Style pour lq FAQ */

.collapsible {
  	color: 	white;
  	cursor: pointer;
  	padding: 18px;
  	width: 100%;
  	border: none;
  	text-align: left;
  	outline: none;
  	font-size: 15px;
  	background-color: rgb(63,81,181);

}


.active, .collapsible:hover {
  background-color: 	#1E90FF;
}


.content {
	padding: 0 50px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease-out;
}


.collapsible:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: white;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}

</style>


<body>




<!-- Navbar -->
<?php
menu();
?>

<!-- Header -->
<header class="w3-container w3-indigo w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo instan-font">InStan</h1>
  <p class="w3-xlarge -">Frequently asked questions </p>
</header>



<div class="w3-row-padding w3-padding-32 w3-container">
	
	<div class="w3-content">
		<h1>Qu'est ce qu'Instan au juste ? </h1>
		<h5 class="w3-padding-24"> Instan est un service collectant les données de différents influenceurs comme leur nombre de like sur une publication Instagram, leur nombre d'abonnés sur Twitter etc et vous permet de visualiser ces informations de manière simple et concise. </h5>

		<button type="button" class="collapsible">Comment utiliser Instan ? </button>
		<div class="content">
 			<p>2 choix s'offrent à vous : vous pouvez soit choisir les influenceurs dont vous voulez visualiser les informations, soit d'avoir une vision d'ensemble de tous les influenceurs</p>
		</div>

		<button type="button" class="collapsible">Combien ca coûte tout ca aussi ?</button>
		<div class="content">
 			<p>Nos services sont totalement gratuits ! Ceci étant dit, nous accepterons volontier un tipeee si vous y tenez.</p>
		</div>

	</div>
</div>


<div class="w3-row-padding w3-padding-32 w3-container">
	<div class="w3-content">

		<h1>Comment utiliser Instan plus précisément ? </h1>
		<h5 class="w3-padding-24"> Nous proposons toutes sortes de fonctionnalités sur notre plateforme. En voici en échantillon : </h5>

		<button type="button" class="collapsible">Comment personnaliser ce qui apparaît sur mon écran ? </button>
		<div class="content">
			<p> Assurez vous dans un premier temps d'avoir un compte et de vous être connecté (si vous ne savez comment faire cette dernière manipulation, nous vous suggérons de regarder plus bas dans la FAQ). Vous pouvez ensuite chercher le nom d'un influenceur que vous souhaitez ajouter à votre page d'accueil via la barre de recherche en haut de la page. </p>
		</div>

		<button type="button" class="collapsible">Comment signaler un bug ? </button>
		<div class="content">
			<p> Vous pouvez nous contacter directement avec l'adresse mail fournie en pied de page. </p>
		</div>

		<button type="button" class="collapsible">Quels influenceurs sont présent sur InStan? </button>
		<div class="content">
			<p> Vous essayons d'avoir tous les plus grands influenceurs dans notre base de données, que nous tenons régulièrement pour répondre au mieux à vos attentes </p>
		</div>

		<button type="button" class="collapsible">D'où viennent les données sur InStan? </button>
		<div class="content">
			<p> Nous collectons des données directement sur les réseaux sociaux grâce aux API fournies par les développeurs de ces plateformes. Si vous ne savez pas ce qu'est une API, peut-être avez vous déjà une place dans notre base de données. </p>
		</div>

		<button type="button" class="collapsible">Les informations d'Instan sont-elles fiables ? </button>
		<div class="content">
			<p> Les données d'Instan proviennent directement des réseaux sociaux, elles sont plus que fiables !</p>
		</div>

	</div>
</div>


<div class="w3-row-padding w3-padding-32 w3-container">
	<div class="w3-content">

		<h1>Plus d'informations sur les paramètres de connection </h1>
		<h5 class="w3-padding-24"> Oui aujourd'hui encore des gens ne savent pas se connecter sur un site internet, mais charitables comme nous sommes, on vous explique comment.</h5>

		<button type="button" class="collapsible">Comment se connecter? </button>
		<div class="content">
			<p> Dans la barre de menu en haut de la page, se trouve un bouton "login" signifiant "s'identifier" bande d'illetrés, il suffit de cliquer dessus. Vous serez redirigé vers une page où il vous suffira de rentrer votre donc "login" et votre mot de passe. </p>
		</div>

		<button type="button" class="collapsible">Comment m'assurer que mes informations sont protégées? </button>
		<div class="content">
			<p> C'est so 2015 les données protégées, Cambridge Analytica a déjà tout de toute facon. </p>
		</div>


		<button type="button" class="collapsible">Comment se déconnecter? </button>
		<div class="content">
			<p> Une fois connecté, il y a un bouton dans la barre de menu en haut à droite "se déconnecter"> Rien de plus simple ! </p>
		</div>

	</div>
</div>



<div class="w3-row-padding w3-padding-32 w3-container">
	<div class="w3-content">

		<h1>Vie privée </h1>
			
		<button type="button" class="collapsible">Quelles données sont collectées sur moi ? </button>
		<div class="content">
			<p> Nous vous assurons qu'aucune donnée n'est collectée sur les utilisateurs d'Instan. </p>
		</div>


<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}
</script>


<?php
	pied();
?>

</body>
</html>