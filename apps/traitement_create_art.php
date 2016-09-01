<?php
var_dump($_POST);
if(isset($_POST["title"], $_POST["content"], $_POST["image"]))
{
	$title = mysqli_real_escape_string($db, $_POST["title"]);
	$image = mysqli_real_escape_string($db, $_POST["image"]);
	$content = mysqli_real_escape_string($db, $_POST["content"]);

	$res = mysqli_query($db, "INSERT INTO articles (`date`, `title`, `content`, `image`, `id_author`) VALUES ( CURDATE(), '".$title."', '".$content."', '".$image."', '".$_SESSION["id"]."')");

	if($res == false)
	{
		$error = "Erreur interne";
	}
	else{
		header("Location: index.php?page=articles");
		exit;
	}
}
?>				