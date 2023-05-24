<?php
class c_Stat{
    function Liste_absence_etudient_parMatiere($code_etudiant,$code_matiere,$date_D,$date_F){
        include_once('../config.php');
        $mysql=new mysqli(db_host,db_user,db_password,db_database);
        $req = ("SELECT t_enseignant.Nom AS nomenseignant,t_enseignant.Prenom AS prenomenseignant, t_ficheabsence.DateJour AS datee, t_seance.NomSeance AS seance
        FROM t_ficheabsence
        INNER JOIN t_ficheabsenceseance ON t_ficheabsence.CodeFicheAbsence = t_ficheabsenceseance.CodeFicheAbsence
        INNER JOIN t_seance ON t_ficheabsenceseance.CodeSeance = t_seance.CodeSeance
        INNER JOIN t_enseignant ON t_ficheabsence.CodeEnseignant = t_enseignant.CodeEnseignant
        WHERE t_ficheabsence.CodeClasse IN (
            SELECT t_etudiant.CodeClasse
            FROM t_etudiant
            WHERE t_etudiant.CodeEtudiant = '$code_etudiant'
        )
        AND t_ficheabsence.CodeMatiere = '$code_matiere'
        AND t_ficheabsence.DateJour BETWEEN '$date_D' AND '$date_F'");
        $res = $mysql->query($req);
        $mysql->close();
        return $res;
    }
    function Liste_absence_etudient($nom_etudient,$prenom_etudient,$date_D,$date_F,$nom_classe){
        include_once('../config.php');
        $mysql=new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT t_matiere.NomMatiere AS Matiere, COUNT(t_ficheabsence.CodeFicheAbsence) AS NombreAbsences
        FROM t_ficheabsence
        INNER JOIN t_ligneficheabsence ON t_ficheabsence.CodeFicheAbsence = t_ligneficheabsence.CodeFicheAbsence
        INNER JOIN t_etudiant ON t_ligneficheabsence.CodeEtudiant = t_etudiant.CodeEtudiant
        INNER JOIN t_classe ON t_etudiant.CodeClasse = t_classe.CodeClasse
        INNER JOIN t_matiere ON t_ficheabsence.CodeMatiere = t_matiere.CodeMatiere
        WHERE t_etudiant.Nom ='$nom_etudient'
        AND t_etudiant.Prenom = '$prenom_etudient'
        AND t_ficheabsence.DateJour BETWEEN '$date_D' AND '$date_F'
        AND t_classe.NomClasse = '$nom_classe'
        GROUP BY t_matiere.NomMatiere";
        $res = $mysql->query($req);
        $mysql->close();
        return $res;
    }
    function getlisteabsences(){
        include_once('../config.php');
        $mysql=new mysqli(db_host,db_user,db_password,db_database);
        $req = "SELECT lfa.CodeFicheAbsence AS CodeFicheAbsence,lfa.CodeEtudiant AS CodeEtudiant, e.Nom AS Nom, e.Prenom AS Prenom, fa.DateJour AS DateJour, m.NomMatiere AS Matiere, s.NomSeance AS Seance, en.Nom AS NomEnseignant,en.Prenom AS PrenomEnseignant
        FROM t_etudiant e
        INNER JOIN t_ligneficheabsence lfa ON e.CodeEtudiant = lfa.CodeEtudiant
        INNER JOIN t_ficheabsence fa ON lfa.CodeFicheAbsence = fa.CodeFicheAbsence
        INNER JOIN t_matiere m ON fa.CodeMatiere = m.CodeMatiere
        INNER JOIN t_ficheabsenceseance fas ON fa.CodeFicheAbsence = fas.CodeFicheAbsence
        INNER JOIN t_seance s ON fas.CodeSeance = s.CodeSeance
        INNER JOIN t_enseignant en ON fa.CodeEnseignant = en.CodeEnseignant";
        $res = $mysql->query($req);
        $mysql->close();
        return $res;
    }
    function ajouterAbsence($codeEtudiant, $codeMatiere, $codeEnseignant, $dateAbsence, $codeSeance) {
                        require_once ('../config.php');
                        $mysql=new mysqli(db_host,db_user,db_password,db_database);
                        $queryEtudiant = "SELECT CodeClasse FROM t_etudiant WHERE CodeEtudiant = $codeEtudiant";
                        $resEtudiant = $mysql->query($queryEtudiant);
                        $row1 = $resEtudiant->fetch_assoc();
                        $CodeClasse = $row1['CodeClasse'];
                        //insert into t_ficheabsence
                        $req1 = "INSERT INTO t_ficheabsence (CodeMatiere, CodeEnseignant, DateJour, CodeClasse) VALUES ($codeMatiere, $codeEnseignant, '$dateAbsence', $CodeClasse)";
                         $res1= $mysql->query($req1);

                        $queryfiche = "SELECT CodeFicheAbsence FROM t_ficheabsence WHERE CodeMatiere ='$codeMatiere' AND CodeEnseignant='$codeEnseignant' AND DateJour='$dateAbsence' AND CodeClasse='$CodeClasse'";
                        $resfiche = $mysql->query($queryfiche);
                        $row2 = $resfiche->fetch_assoc();
                        $CodeFicheAbsence = $row2['CodeFicheAbsence'];
                        //Insert into t_ligneficheabsence
                        $req2 = "INSERT INTO t_ligneficheabsence (CodeFicheAbsence, CodeEtudiant) VALUES ($CodeFicheAbsence, $codeEtudiant)";
                        $res2 = $mysql->query($req2);
                         //Insert into t_ficheabsenceseance
                        $req3 = "INSERT INTO t_ficheabsenceseance (CodeFicheAbsence, CodeSeance) VALUES ($CodeFicheAbsence, $codeSeance)";
                        $res3 = $mysql->query($req3);
                        $mysql->close();
    }
    function deleteabsence($CodeFicheAbsence,$CodeEtudiant)
    {
    require_once ('../config.php');
    $mysql=new mysqli(db_host,db_user,db_password,db_database);
    $req = "DELETE FROM t_ligneficheabsence WHERE CodeFicheAbsence='$CodeFicheAbsence' AND CodeEtudiant='$CodeEtudiant'";
    $res = $mysql->query($req);
    $mysql->close();
    }
}
?>