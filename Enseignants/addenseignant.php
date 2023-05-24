<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["action"]=="add")
    {
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $DateRecrutement = $_POST['DateRecrutement'];
        $Adresse = $_POST['Adresse'];
        $Mail = $_POST['Mail'];
        $Tel = $_POST['Tel'];
        $CodeDepartement = $_POST['CodeDepartement'];
        $CodeGrade = $_POST['CodeGrade'];
        include('c_Enseignant.php');
        $enseignant = new c_Enseignant();
        $enseignant->Nom = $Nom;
        $enseignant->Prenom = $Prenom;
        $enseignant->DateRecrutement = $DateRecrutement;
        $enseignant->Adresse = $Adresse;
        $enseignant->Mail = $Mail;
        $enseignant->Tel = $Tel;
        $enseignant->CodeDepartement = $CodeDepartement;
        $enseignant->CodeGrade = $CodeGrade;
        $enseignant->ajouterEnseignant();
        header("Location: CRUD_Enseignant.php");
    }
}
?>