<?php

if(isset($_POST["register"]))
{
	$login = mysqli_real_escape_string($db, $_POST["pseudo"]);
	$email = mysqli_real_escape_string($db, $_POST["email"]);
	$password = mysqli_real_escape_string($db, $_POST["password"]);
	$password2 = mysqli_real_escape_string($db, $_POST["password2"]);
	if(empty($login) || empty($email) || empty($password) || empty($password2))
	{
		$error = "Merci de compléter tous les champs...";
	}
	else
	{
		$req = "SELECT email FROM users WHERE email='".$email."'";
		$emails = mysqli_query($db, $req);

		$emailTab = mysqli_fetch_assoc($emails);
		if($emailTab)
		{
			$error = "Cette adresse email est déjà utilisée.";
		}

		if($password != $password2)
		{
			$error = "Merci de saisir des mots de passe identiques";
		}
		else
		{
			$req = "INSERT INTO users (login, email, password) VALUES ('".$login."', '".$email."', '".md5($password)."')";
			$res = mysqli_query($db, $req);
			
			header("Location: index.php?page=login");
			exit;
		}
	}
}		