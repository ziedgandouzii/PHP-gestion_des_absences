<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="nav-side-menu">
    <div class="brand">Suivi des absences</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
        <ul id="menu-content" class="menu-content collapse">
                <li>
                  <a href="../Absences/listeabsences.php">
                  <i class="fas fa-user-tie fa-lg"></i> Liste des Absences
                  </a>
                </li>
                <li>
                  <a href="../Etudiants/CRUD_Etudiant.php">
                  <i class="fas fa-user-tie fa-lg"></i> Liste des Etudiants
                  </a>
                </li>
                <li>
                  <a href="../Enseignants/CRUD_Enseignant.php">
                    <i class="fas fa-user-tie fa-lg"></i> Liste des Enseignants
                  </a>
                </li>
                <li>
                 <a href="../Matieres/CRUD_Matieres.php">
                 <i class="fas fa-user-tie fa-lg"></i> Liste des Matieres
                 </a>
               </li>
            </ul>
     </div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $debut = $_POST["Debut"];
    $fin = $_POST["Fin"];
    $code_matiere = $_POST["Matiere"];
    $code_etudiant = $_POST["CodeEtudiant"];
 require_once('../Matieres/c_Matiere.php');
$matiere = new c_Matiere;
$res = $matiere->rechercherMatiere($code_matiere);
$row = $res->fetch_assoc();
$matierename=$row['NomMatiere'];
                
?>
 <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Liste <b>des Absences en:<?php echo $matierename; ?></b></h2>
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Enseignant</th>
                        <th>Date</th>
                        <th>Seance</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('c_Stat.php');
                $stat = new c_Stat();
                $res=$stat->Liste_absence_etudient_parMatiere($code_etudiant,$code_matiere, $debut, $fin);
                while ($row =$res->fetch_assoc())  
                {
                    ?>
                    <tr>
                        <td><?php echo $row['nomenseignant']; ?> <?php echo $row['prenomenseignant']; ?></td>
                        <td><?php echo $row['datee']; ?></td>
                        <td><?php echo $row['seance']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
<?php
} else {
    ?>
<div class="container register-form">
            <form class="form" action="suivreabsenceparMatiere.php" method="post">
                <div class="note">
                    <p>Suivre des absences par Matiere.</p>
                </div>
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Date de Debut</label>
                             <input type="date" class="form-control" placeholder="Date de Debut *" name="Debut" />
                            </div>
                            <div class="form-group">
                            <label>Code d'Etudiant</label>
                                <input type="Number" class="form-control" placeholder="Code d'etudiant *" name="CodeEtudiant" />
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de Fin</label>
                                <input type="date" class="form-control" placeholder="Date de Fin *" name="Fin"/>
                            </div>
                            <div class="form-group">
                            <label>Matiere</label>
                            <select class="form-control" name="Matiere">
                            <?php
                            require_once('../Matieres/c_Matiere.php');
                            $matiere = new c_Matiere;
                            $res = $matiere->afficherlisteMatiere();
                            while($row = $res->fetch_assoc()){
                            echo '<option value="'.$row['CodeMatiere'].'">'.$row['NomMatiere'].'</option>';
                            }
                        ?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit">Rechercher</button>
                </div>
            </form>
        </div>
<?php
}
?>
</body>
</html>