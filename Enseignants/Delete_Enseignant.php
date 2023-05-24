<?php
$CodeEnseignant =$_GET['enseignant'];
include('c_Enseignant.php');
$enseignant = new c_Enseignant();
$enseignant->CodeEnseignant =$CodeEnseignant;
$enseignant->supprimerEnseignant();
header('location:CRUD_Enseignant.php');
?>