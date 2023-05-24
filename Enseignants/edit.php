<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $CodeEnseignant=$_POST['CodeEnseignant'];
  $Nom = $_POST['Nom'];
  $Prenom = $_POST['Prenom'];
  $DateRecrutement = $_POST['DateRecrutement'];
  $Adresse = $_POST['Adresse'];
  $Mail = $_POST['Mail'];
  $Tel = $_POST['Tel'];
  $CodeDepartement = $_POST['CodeDepartement'];
  $CodeGrade = $_POST['CodeGrade'];
  include('c_Enseignant.php');
  $enseignant = new c_Enseignant;
  $enseignant->modifierEnseignant($CodeEnseignant,$Nom,$Prenom,$DateRecrutement,$Adresse,$Mail,$Tel,$CodeDepartement,$CodeGrade);
  header("Location: CRUD_Enseignant.php");
   }
?>