<?php
	if(isset($_GET["id"]) && !empty($_GET["id"]))
	{
		$idPage = mysqli_real_escape_string($db, $_GET["id"]);
		$req = "SELECT id, title, content, image, DATE_FORMAT(date, '%d-%m-%Y') date, DATE_FORMAT(date_last, '%d-%m-%Y à %H:%i:%s')date_last FROM articles WHERE id = '".$idPage."'";
		$thisDb = mysqli_query($db, $req);
		$single = mysqli_fetch_assoc($thisDb);
		$id = $single["id"];
		require("views/articles.phtml");
	}
?>