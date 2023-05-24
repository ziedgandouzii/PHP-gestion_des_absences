<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST["action"]=="add")
    {
        $Nom = $_POST['nom'];
        $Prenom = $_POST['prenom'];
        $DateNaissance = $_POST['naissance'];
        $Classe = $_POST['classe'];
        $NumInscription = $_POST['inscription'];
        $Adresse = $_POST['Adresse'];
        $Email = $_POST['Email'];
        $Telephone = $_POST['Telephone'];
        include('c_Etudiant.php');
        $etudiant = new c_Etudiant;
        $etudiant->Nom = $Nom;
        $etudiant->Prenom = $Prenom;
        $etudiant->DateNaissance = $DateNaissance;
        $etudiant->CodeClasse = $Classe;
        $etudiant->NumInscription = $NumInscription;
        $etudiant->Adresse = $Adresse;
        $etudiant->Mail = $Email;
        $etudiant->Tel = $Telephone;
        $etudiant->ajouterEtudiant();
        header('location:CRUD_Etudiant.php');
    }
}
?>