<?php
class c_Etudiant{
    public $CodeEtudiant;
    public $Nom;
    public $Prenom;
    public $DateNaissance;
    public $CodeClasse;
    public $NumInscription;
    public $Adresse;
    public $Mail;
    public $Tel;

    public function ajouterEtudiant(){
        include_once('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req ="INSERT INTO t_etudiant(Nom,Prenom,DateNaissance,CodeClasse,NumInscription,Adresse,Mail,Tel)";
        $req .= "VALUES ('$this->Nom','$this->Prenom','$this->DateNaissance','$this->CodeClasse','$this->NumInscription','$this->Adresse','$this->Mail','$this->Tel')";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }

    public function afficherEtudiant(){
        include_once('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_etudiant";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }

    public function afficherEtudiantByCodeEtudiant($CodeEtudiant){
        include_once('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_etudiant WHERE CodeEtudiant='$CodeEtudiant'";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }

    public function modifierEtudiant($CodeEtudiant,$Nom,$Prenom,$DateNaissance,$CodeClasse,$NumInscription,$Adresse,$Mail,$Tel)
    {
        include_once('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "UPDATE t_etudiant SET Nom='$Nom',Prenom='$Prenom',DateNaissance='$DateNaissance',CodeClasse='$CodeClasse',NumInscription='$NumInscription',Adresse='$Adresse',Mail='$Mail',Tel='$Tel' WHERE CodeEtudiant='$CodeEtudiant'";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    public function supprimerEtudiant() {
        include_once('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "DELETE FROM t_etudiant WHERE CodeEtudiant='$this->CodeEtudiant'";
        $res = $mysqli->query($req);
        $mysqli->close();
    }

    public function rechercherEtudiant($CodeEtudiant) {
        include_once('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_etudiant WHERE CodeEtudiant='$CodeEtudiant'";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
        }
        public function rechercherEtudiantparNom($nom,$prenom) {
            include_once('../config.php');
            $mysqli = new mysqli(db_host, db_user, db_password, db_database);
            $req = "SELECT CodeEtudiant FROM t_etudiant WHERE Nom='$nom' and Prenom='$prenom'";
            $res = $mysqli->query($req);
            $mysqli->close();
            return $res;
            }
    

}
?>