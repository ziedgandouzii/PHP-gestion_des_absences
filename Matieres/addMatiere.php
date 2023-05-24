<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["action"]=="add")
    {
        $CodeMatiere = $_POST['CodeMatiere'];
        $NomMatiere = $_POST['NomMatiere'];
        $NbreHeureCoursParSemaine = $_POST['NbreHeureCoursParSemaine'];
        $NbreHeureTDParSemaine = $_POST['NbreHeureTDParSemaine'];
        $NbreHeureTPParSemaine = $_POST['NbreHeureTPParSemaine'];
        include('c_Matiere.php');
        $matiere = new c_Matiere();
        $matiere->CodeMatiere = $CodeMatiere;
        $matiere->NomMatiere = $NomMatiere;
        $matiere->NbreHeureCoursParSemaine = $NbreHeureCoursParSemaine;
        $matiere->NbreHeureTDParSemaine = $NbreHeureTDParSemaine;
        $matiere->NbreHeureTPParSemaine = $NbreHeureTPParSemaine;
        $matiere->ajouterMatiere();
        header('location:CRUD_Matieres.php');
    }
}
?>