<?php
$CodeEtudient =$_GET['etudiant'];
include('c_Etudiant.php');
$etudiant = new c_Etudiant();
$etudiant->CodeEtudiant =$CodeEtudient;
$etudiant->supprimerEtudiant();
header('location:CRUD_Etudiant.php');
?>