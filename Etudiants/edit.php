<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Code_Etudiant = $_POST['etudiant'];
        $Nom = $_POST['nom'];
        $Prenom = $_POST['prenom'];
        $DateNaissance = $_POST['naissance'];
        $Classe = $_POST['classe'];
        $NumInscription = $_POST['inscription'];
        $Adresse = $_POST['adresse'];
        $Email = $_POST['email'];
        $Telephone = $_POST['telephone'];
        include('c_Etudiant.php');
        $etudiant = new c_Etudiant;
        $etudiant->modifierEtudiant($Code_Etudiant, $Nom, $Prenom, $DateNaissance, $Classe, $NumInscription, $Adresse, $Email, $Telephone);
        header("Location:CRUD_Etudiant.php");
      }
?>