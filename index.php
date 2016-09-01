<?php
session_start();
$db = mysqli_connect("localhost", "root", "troiswa", "projet_link");
$error = "";
$error404 = "";
$page = "home";

$access = ["home", "login", "register", "articles"];
$accessIn = ["home", "login","articles", "create"];
if(isset($_SESSION["in"]))
{
	if(isset($_GET["page"]) && in_array($_GET["page"], $accessIn))
	{
		$page = $_GET["page"];
	}	
}
else
{
	if(isset($_GET["page"]) && in_array($_GET["page"], $access))
	{
		$page = $_GET["page"];
	}	
}

$traitementList = ["creation", "login", "modif", "delete", "register","single"];
if(in_array($page, $traitementList))
{
	require("apps/traitement_".$page.".php");
}
require("apps/skel.php");
?>