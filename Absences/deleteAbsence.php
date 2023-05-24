<?php
$CodeEtudiant=$_GET["CodeEtudiant"];
$CodeFicheAbsence=$_GET["CodeFicheAbsence"];
include('c_stat.php');
$stat = new c_Stat();
$stat->deleteabsence($CodeFicheAbsence,$CodeEtudiant);
header('location:listeabsences.php');
?>