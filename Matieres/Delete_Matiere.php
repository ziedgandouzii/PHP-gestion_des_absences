<?php
$CodeMatiere =$_GET['CodeMatiere'];
include('c_Matiere.php');
$matiere = new c_Matiere();
$matiere->CodeMatiere =$CodeMatiere;
$matiere->supprimerMatiere();
header('location:CRUD_Matieres.php');
?>