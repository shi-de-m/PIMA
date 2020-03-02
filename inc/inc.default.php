<?php
	function entete( $titre = "" )
	{
		echo '<head>';
		echo "<title>$titre</title>";
        echo '<meta name="description" content="InStan - Website allows to track different metrics used to follow influencers">';
        echo '<meta name="keywords" content="InStan, InStan Stats, YouTube Stats, YouTube, Twitch, Twitch Stats, InStan Twitch, Instagram, Instagram Stats, InStan Instagram, InStan Partnership">';
 
        echo '<meta charset="UTF-8">';
        echo '<link href="../CSS/styles.css" type = "text/css" rel="stylesheet" >';
        echo '<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet"  type="text/css" />';
		echo '</head>';
	}



	function pied()
	{
		echo '<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
		  <div class="w3-xlarge w3-padding-32">
		    <i class="fa fa-facebook-official w3-hover-opacity"></i>
		    <i class="fa fa-instagram w3-hover-opacity"></i>
		    <i class="fa fa-snapchat w3-hover-opacity"></i>
		    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
		    <i class="fa fa-twitter w3-hover-opacity"></i>
		    <i class="fa fa-linkedin w3-hover-opacity"></i>
		    <i class="fa fa-youtube w3-hover-opacity"></i>
		  </div>
		  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
		  </br>
		  <p class="texteBas">Mail de contact : <a href="mailto:random@ensiie.fr">random@ensiie.fr</a> </br> Adresse  : 1 place de la résistance 91025 Evry</p>
		</footer>';		
		
		
		/*echo "SESSION : " ; 
		if (isset($_SESSION)) print_r($_SESSION);
		else echo "vide" ;
		echo "</br>";*/
	}
	

	
	function menu()
	{	
		echo '<div class="w3-top">';
		echo '<div class="w3-bar w3-indigo w3-card w3-left-align w3-large">';
		echo '<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-indigo" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>';
		echo '<a href="../index.php" class="w3-bar-item w3-button w3-padding-large w3-white instan-font" style="font-size: 20px;padding:5px 10px;">Instan</a>';
		echo '<a href="./liste.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Influenceurs</a>';

		echo '<a href="./faqnhan.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">FAQ</a>';
		if(empty($_SESSION))
		{
			echo '<a href="../public/login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">login</a>';
		}
		else
		{
			echo '<form method="POST" action="compte.php">';
			echo '<input type="hidden" value="1" name="logout">';
            echo '<input type="submit" value="Déconnexion" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-black">';
            echo '</form>';
		}
		echo '</div>';

		echo '<!-- Navbar on small screens -->';
		echo '<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">';
		echo '<a href="./liste.php" class="w3-bar-item w3-button w3-padding-large">Influenceurs</a>';
		echo '<a href="./faqnhan.php" class="w3-bar-item w3-button w3-padding-large">FAQ</a>';
		if(empty($_SESSION))
		{
			echo '<a href="../public/login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">login</a>';
		}
		else
		{
			echo '<form method="POST" action="compte.php">
		      <input type="hidden" value="1" name="logout">
		      <input type="submit" value="Déconnexion" class="w3-bar-item w3-button w3-padding-large">
		    </form>';
		}
		echo '</div>';
		echo '</div>';
	}
?>