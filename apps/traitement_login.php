<?php

if(isset($_POST["name"], $_POST["pwd"]))
{
	$name = mysqli_real_escape_string($db, $_POST["name"]);
	$pwd = mysqli_real_escape_string($db, $_POST["pwd"]);

	if(empty($name) || empty($pwd))
	{
		$error = "Veuillez compléter tous les champs...";
	}
	else
	{
		$req = "SELECT * FROM users WHERE login = '".$name."'";
		$res = mysqli_query($db, $req);
		$user = mysqli_fetch_assoc($res);

		if($user)
		{
			if(password_verify($pwd, $user['password']))
			{
				$_SESSION["id"] = $user['id'];
				$_SESSION["login"] = $user['login'];

				header("Location: index.php?page=home");
				exit;
			}
			else
			{
				$error = "L'identifiant ou le mot de passe est incorrecte...";
			}
		}
		else{
			$error = "L'identifiant ou le mot de passe est incorrecte...";
		}
	}
}

?>