<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["action"]=="add")
    {
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $CodeMatiere = $_POST['matiere'];
        $CodeEnseignant = $_POST['enseignant'];
        $dateabsence = $_POST['dateabsence'];
        $CodeSeance = $_POST['seance'];
        include('../Etudiants/c_Etudiant.php');
        $etudiant = new c_Etudiant;
        $res=$etudiant->rechercherEtudiantparNom($Nom, $Prenom);
        $row = $res->fetch_assoc();
        $CodeEtudiant = $row['CodeEtudiant'];
        include('c_Stat.php');
        $stat = new c_Stat;
        $stat->ajouterAbsence($CodeEtudiant,$CodeMatiere,$CodeEnseignant,$dateabsence,$CodeSeance);
        header("Location: listeabsences.php");
    }
}
?>