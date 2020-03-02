<?php
	session_start();
  	require( "../inc/inc.default.php" );
  	require("../inc/inc.class.instagram.php");
	entete( "Accueil" );
?>




<script type="text/javascript">
function maj_liste_ids_influenceurs($id_influenceur, $user)
{
	///alert($id_influenceur + ' ' + $user);

	var url = "../inc/inc.maj_liste_ids_influenceurs.php?id_influenceur=" + $id_influenceur + '&user=' + $user;

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
</script>




<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

<style>
	body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
	.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
	.fa-anchor,.fa-coffee {font-size:200px}
	table {
		margin: auto;
		border-width:1px; 
		/*border-style:solid; 
		border-color:black;*/
		width:50%;
	}
	td { 
		border-width:1px;
		/*border-style:solid; 
		border-color:red;*/
		width:50%;
	}
	tr:nth-child(even) {background: #CCC}
	tr:nth-child(odd) {background: #FFF}

	#customPopup {
     	position: fixed;
     	display: none;
     	left: 25%;
     	top: 25%;
    	padding: 20px;
     	width: 600px;
     	background-color: #EEEEEE;
     	font-size: 16px;
     	line-height: 16px;
     	color: #202020;
     	border : 3px outset #555555;
	}
	
</style>




<body>
<!--Pop up des infos youtube -->
<div id="customPopup">
		<input type="button" id="OK" value="X" style="position: absolute; right: 10;">
		<img id="youtube-img"/> 
		<h3 ><a id="youtube-name" target="_blank"></a></h3>
		<p id="youtube-description"></p>
		<h3>Subscribers : </h3><p id="youtube-subscribers"></p>
		<h3>Videos : </h3><p id="youtube-videos"></p>
		<h3>Total views : </h3><p id="youtube-views"></p>
</div>
<!-- Navbar -->
<?php
menu();
?>

<!-- Header -->
<header class="w3-container w3-indigo w3-center" style="padding:78px 10px">
  <h1 class="w3-margin w3-jumbo instan-font"><img src="../img/youtube_logo3.png" style="height:100px;width:auto;"></h1>
  <p class="w3-xlarge">Suivez au plus près vos influenceurs</p>
</header>

<div class="w3-row-padding w3-padding-64 w3-container">

<table>
	<thead>
		<tr>
			<td>Photo insta</td>
			<td>Nom</td>
			<td>Abonnés insta</td>
			<td>compte insta</td>
			<td>Youtube</td>
			<td>Profile</td>
		</tr>
	</thead>
	<tbody>
<?php
$bd = new PDO('mysql:host=localhost; dbname=instan', 'hicham', 'hicham'); 

//$bd = new PDO('mysql:host=localhost; dbname=instan', 'root', '');
$req = $bd->prepare("SELECT * FROM influenceurs");
$req->execute();
$requete_followers = $bd->prepare("SELECT id_influenceur, nom_compte, lien FROM comptes_influenceurs WHERE id_influenceur = :id_influenceur AND type_compte = :type_compte");



if (! empty($_SESSION))
{
	$user = $_SESSION["username"];

	$req2 = $bd->prepare("SELECT ids_influenceurs_suivis FROM utilisateurs WHERE login='$user'");
 	$req2->execute();
	$str_liste_ids = $req2->fetch();
	//echo $str_liste_ids['ids_influenceurs_suivis']; echo "</br>";
}


while (($data = $req->fetch()))
{
	$requete_followers->execute(array('id_influenceur' => $data['id'], 'type_compte' => "instagram"));
	$result = $requete_followers->fetch(PDO::FETCH_ASSOC);
	$requete_followers->execute(array('id_influenceur' => $data['id'], 'type_compte' => "youtube"));
	$result_youtube = $requete_followers->fetch(PDO::FETCH_ASSOC);
	$nom_compte_instagram = $result['nom_compte'];
	$id_influenceur = $result['id_influenceur'];

	$compte_instagram = new Instagram($nom_compte_instagram);
	?>

	<tr>
		<td><img src="<?= $compte_instagram->get_profile_picture() ?>" style="width:40%; height:40%;"/></td>
		<td><?= $data[1]?></td>
		<td><?= $compte_instagram->number_followers() ?></td>
		<td><a href="<?= $compte_instagram->url_2 ?>"><?= $compte_instagram->get_name()?></a></td>
		<td class="youtube <?=$result_youtube['lien']?>"></td>
		<td><form method="post" action="profile.phtml"><input type="hidden" name="id" value="<?= $data['id']?>"><input type="submit" value="voir"></form></td>
		<?php
			if (! empty($_SESSION))
			{
				if (strpos($str_liste_ids['ids_influenceurs_suivis'], $id_influenceur) !== false) //contient
				{
					echo "<td>
						<input type='checkbox'
							   onclick='maj_liste_ids_influenceurs(\"$id_influenceur\",\"$user\");'
							   checked/>
					</td>";
				}

				else
				{
					echo "<td>
						<input type='checkbox'
							   onclick='maj_liste_ids_influenceurs(\"$id_influenceur\",\"$user\");'
							   />
					</td>";
				}
			}
		?>
	</tr>

	<?php
}
?>

	</tbody>
</table>
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

//l'affichage des infos youtube
jQuery(document).ready(function(){

	function showPopup() {
		$("#customPopup").before('<div id="grayBack"></div>');
		$("#grayBack").css('opacity', 0).fadeTo(300, 0.5, function () { $("#customPopup").fadeIn(500); });
		}
	function hidePopup() {
		$("#grayBack").fadeOut('fast', function () { $(this).remove() });
		$("#customPopup").fadeOut('fast', function () { $(this).hide() });
	}

	$('#OK').on('click', function(){
		hidePopup();
	});
	$('.youtube').each(function(){
		if($(this).get(0).classList[1]){
			var $keepThis = $(this);
			var $button = $('<button/>');
			$button.text('Info');
			$button.on('click', function(){
				var channelId = $keepThis.get(0).classList[1];
				url = "https://www.googleapis.com/youtube/v3/channels?key=AIzaSyD__CJ5Q_oI8UqEml3-an3C_NRkB8Hb5p0&id="+channelId+"&part=snippet,contentDetails,statistics";
				$.get(url, function(data){
					var imageLink = data.items[0].snippet.thumbnails.default.url;
					var totalSubscribers = data.items[0].statistics.subscriberCount;
					var title = data.items[0].snippet.title;
					var totalViews = data.items[0].statistics.viewCount;
					var totalVideos = data.items[0].statistics.videoCount;
					var description = data.items[0].snippet.description;
					$('#youtube-img').attr('src', imageLink)
					$('#youtube-name').text(title);
					$('#youtube-name').attr('href', 'https://www.youtube.com/channel/'+channelId)
					$('#youtube-description').html(description);
					$('#youtube-subscribers').text(convert(totalSubscribers));
					$('#youtube-videos').text(totalVideos);
					$('#youtube-views').text(convert(totalViews));
				});
				showPopup();
			});
			$(this).append($button);
		}else{
			$(this).text("Non Disponible");
		}
	});

	function convert(value){
		if(value>=1000000000){
			value= (Math.round((value/1000000000) * 100)/100)+"Milliard"
		}
		else if(value>=1000000){
			value= (Math.round((value/1000000) * 100)/100)+"M"
		}
		else if(value>=1000){
			value= (Math.round((value/1000) * 100)/100)+"K";
		}
		return value;
	}
	
});
</script>

</body>
</html>

