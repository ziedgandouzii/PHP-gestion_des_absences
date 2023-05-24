<?php
class c_Matiere {
    // Properties
    public $CodeMatiere;
    public $NomMatiere;
    public $NbreHeureCoursParSemaine;
    public $NbreHeureTDParSemaine;
    public $NbreHeureTPParSemaine;
  
    
    // Method to display matière information
    public function afficherlisteMatiere() {
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_matiere";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    public function afficherMatiereparCode($CodeMatiere) {
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_matiere WHERE CodeMatiere='$CodeMatiere'";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    

    // Method to add a new matière
    public  function ajouterMatiere() {
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req ="INSERT INTO t_matiere(CodeMatiere,NomMatiere,NbreHeureCoursParSemaine,NbreHeureTDParSemaine,NbreHeureTPParSemaine)";
        $req .= "VALUES ('$this->CodeMatiere','$this->NomMatiere','$this->NbreHeureCoursParSemaine','$this->NbreHeureTDParSemaine','$this->NbreHeureTPParSemaine')";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }

    // Method to delete the matière
    public function supprimerMatiere() {
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "DELETE FROM t_matiere WHERE CodeMatiere=$this->CodeMatiere";
        $res = $mysqli->query($req);
        $mysqli->close();
        
        
    }
 
    // Method to edit the matière information
    public function modifierMatiere($CodeMatiere,$NomMatiere,$NbreHeureCoursParSemaine,$NbreHeureTDParSemaine,$NbreHeureTPParSemaine)
    {
        include_once('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "UPDATE t_matiere SET NomMatiere='$NomMatiere',NbreHeureCoursParSemaine='$NbreHeureCoursParSemaine',NbreHeureTDParSemaine='$NbreHeureTDParSemaine',NbreHeureTPParSemaine='$NbreHeureTPParSemaine' WHERE CodeMatiere='$CodeMatiere'";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
    }
    //create a search function
    public function rechercherMatiere($CodeMatiere) {
        require('../config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);
        $req = "SELECT * FROM t_matiere WHERE CodeMatiere=$CodeMatiere";
        $res = $mysqli->query($req);
        $mysqli->close();
        return $res;
        }
}
?>