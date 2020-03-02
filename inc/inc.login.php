<?php
	function check_password($password)
	{
		$res = true;

		if (strlen($password) < 8)
		{
			//echo "Le mot de passe doit contenir au moins 8 caractères. </br>";
			$res = false;
		}

		return $res;
	}



	function check_username($user)
	{		
		$bd = new PDO('mysql:host=localhost; dbname=instan', 'root', '');
		$req = $bd->prepare("SELECT * FROM utilisateurs WHERE login='$user'");
		$req->execute();
		$res = $req->fetch();

		return empty($res);
	}



	function signup($user, $password, $password_check)
	{
		//echo "Inscription </br>";

		$ok = true;
		$vide = 0;
		$dif = 0;
		$pwd = 1;
		$us = 1;

		if (empty($user) or empty($password) or empty($password_check))
		{
			//echo "Veuillez remplir tous les champs. </br>";
			$ok = false;
			$vide = 1;
			#echo '<meta http-equiv="refresh" content="1;url=login.php?vide=1"/>';
		}

		if ($password != $password_check)
		{
			//echo "Veuillez rentrer 2 fois le même mot de passe. </br>";
			$ok = false;
			$dif = 1;
			#echo '<meta http-equiv="refresh" content="1;url=login.php?dif=1"/>';
		}

		if (check_password($password)==false)
		{
			$ok = false;
			$pwd = 0;
			#echo '<meta http-equiv="refresh" content="1;url=login.php?pwd=0"/>';
		}

		if (check_username($user)==false)
		{
			//echo "Nom d'utilisateur déjà pris. </br>";
			$ok = false;
			$us = 0;
			#echo '<meta http-equiv="refresh" content="1;url=login.php?user=0"/>';
		}

		if ($ok)
		{
			$_SESSION["username"] = $user;
			$bd = new PDO('mysql:host=localhost; dbname=instan', 'root', '');
			$req = $bd->prepare("INSERT INTO utilisateurs(login, password, ids_influenceurs_suivis) VALUES ('$user', '$password', '')");
			$req->execute();

			signin($user, $password);
		}

		else echo "<meta http-equiv='refresh' content='1;url=login.php?vide=$vide&dif=$dif&pwd=$pwd&user=$us'/>";
	}



	function signin($user, $password)
	{
		//echo "Connexion </br>";
		
		$bd = new PDO('mysql:host=localhost; dbname=instan', 'root', '');
		$req = $bd->prepare("SELECT * FROM utilisateurs WHERE login='$user'AND password='$password'");
		$req->execute();
		$res = $req->fetch();
		//print_r($res); echo "</br>";

		if (empty($res))
		{
			//echo "Identifiant ou mot de passe incorrect </br>";
			echo '<meta http-equiv="refresh" content="1;url=login.php?signin=0"/>';
		}
		else
		{
			$_SESSION["username"] = $user;
			//header("Location: index.php");
			echo '<meta http-equiv="refresh" content="1;url=index.php"/>';
		}

	}



	function logout()
	{
		//echo "Déconnexion </br>";
		session_unset();
		//header("Location: index.php");
		echo '<meta http-equiv="refresh" content="1;url=index.php"/>';
	}
?>