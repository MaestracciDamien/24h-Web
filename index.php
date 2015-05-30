<?php
require_once __DIR__."/controleur/Routeur.php";
session_start();

$routeur=new Routeur();

$routeur->router();

?>
