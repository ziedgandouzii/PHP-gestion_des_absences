<?php
class c_Enseignant{
    public $CodeEnseignant;
    public $Nom;
    public $Prenom;
    public $DateRecrutement;
    public $Adresse;
    public $Mail;
    public $Tel;
    public $CodeDepartement;
    public $CodeGrade;

    public function ajouterEnseignant(){
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req ="INSERT INTO t_enseignant(Nom,Prenom,DateRecrutement,Adresse,Mail,Tel,CodeDepartement,CodeGrade)";
        $req .= "VALUES ('$this->Nom','$this->Prenom','$this->DateRecrutement','$this->Adresse','$this->Mail','$this->Tel','$this->CodeDepartement','$this->CodeGrade')";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    public function afficherEnseignant(){
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_enseignant";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    public function afficherEnseignantByCode($CodeEnseignant){
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_enseignant WHERE CodeEnseignant='$CodeEnseignant'";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    public function modifierEnseignant($CodeEnseignant,$Nom,$Prenom,$DateRecrutement,$Adresse,$Mail,$Tel,$CodeDepartement,$CodeGrade){
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "UPDATE t_enseignant SET Nom='$Nom',Prenom='$Prenom',DateRecrutement='$DateRecrutement',Adresse='$Adresse',Mail='$Mail',Tel='$Tel',CodeDepartement='$CodeDepartement',CodeGrade='$CodeGrade' WHERE CodeEnseignant='$CodeEnseignant'";
        $res = $mysqli->query($req);
        $mysqli->close();
    }
    public function supprimerEnseignant(){
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "DELETE FROM t_enseignant WHERE CodeEnseignant='$this->CodeEnseignant'";
        $res = $mysqli->query($req);
        $mysqli->close();
    }
    public function rechercherEnseignant($CodeEnseignant) {
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_enseignant WHERE CodeEnseignant=$CodeEnseignant";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
        }
}
?>