<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CodeMatiere = $_POST['CodeMatiere'];
        $NomMatiere = $_POST['NomMatiere'];
        $NbreHeureCoursParSemaine = $_POST['NbreHeureCoursParSemaine'];
        $NbreHeureTDParSemaine = $_POST['NbreHeureTDParSemaine'];
        $NbreHeureTPParSemaine = $_POST['NbreHeureTPParSemaine'];
  include('c_Matiere.php');
  $Matiere = new c_Matiere;
  $Matiere->modifierMatiere($CodeMatiere, $NomMatiere, $NbreHeureCoursParSemaine, $NbreHeureTDParSemaine, $NbreHeureTPParSemaine);
  header('location:CRUD_Matieres.php');
      }
?>