<?php
session_start();
require_once __DIR__."/controleur/Routeur.php";

$routeur=new Routeur();

$routeur->router();

?>
