<?php
	//TEST
	//$user = "a";
	//$id_influenceur = '2';

	$user = $_GET["user"];
	$id_influenceur = $_GET["id_influenceur"];

	$bd = new PDO('mysql:host=localhost; dbname=instan', 'root', '');

	$req = $bd->prepare("SELECT ids_influenceurs_suivis FROM utilisateurs WHERE login='$user'");
 	$req->execute();
	$str_liste_ids = $req->fetch()['ids_influenceurs_suivis'];

	if (strpos($str_liste_ids, $id_influenceur)===false)
	{
		if ($str_liste_ids != "") $str_liste_ids .= ", " . $id_influenceur;

		else $str_liste_ids .= $id_influenceur;
	}

	else
	{
		echo "aaaaa ";
		$str_liste_ids = trim($str_liste_ids, ", " . $id_influenceur);
		$str_liste_ids = trim($str_liste_ids, $id_influenceur . ", ");
		$str_liste_ids = trim($str_liste_ids, $id_influenceur);
	}


	echo $str_liste_ids;

	$req2 = $bd->prepare("UPDATE utilisateurs SET ids_influenceurs_suivis='$str_liste_ids' WHERE login='$user'");
 	$req2->execute();
?>