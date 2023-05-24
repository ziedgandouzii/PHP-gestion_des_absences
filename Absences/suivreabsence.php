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
    $classe = $_POST["Classe"];
    $nom_etudiant = $_POST["Nom"];
    $prenom_etudiant = $_POST["Prenom"];
?>
 <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Liste <b>des Absences:<?php echo $nom_etudiant; ?> <?php echo $prenom_etudiant; ?></b></h2>
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Matiere</th>
                        <th>Nombre d'absence</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('c_Stat.php');
                $stat = new c_Stat();
                $res=$stat->Liste_absence_etudient($nom_etudiant, $prenom_etudiant, $debut, $fin, $classe);
                while ($row =$res->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $row['Matiere']; ?></td>
                        <td><?php echo $row['NombreAbsences']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
<?php
} else {
    ?>
<div class="container register-form">
            <form class="form" action="suivreabsence.php" method="post">
                <div class="note">
                    <p>Suivre des absents.</p>
                </div>
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Date de Debut</label>
                             <input type="date" class="form-control" placeholder="Date de Debut *" name="Debut" />
                            </div>
                            <div class="form-group">
                            <label>Nom d'Etudiant</label>
                                <input type="tech" class="form-control" placeholder="Nom *" name="Nom" />
                            </div>
                            <div class="form-group">
                            <label>Classe</label>
                            <select class="form-control" name="Classe">
                            <?php
                            require_once('../config.php');
                            $mysql = new mysqli(db_host, db_user, db_password, db_database);
                            $req = "SELECT * FROM t_classe";
                            $res = $mysql->query($req);
                            $mysql->close();
                            while ($row = $res->fetch_assoc()) {
                                echo '<option value="' . $row['NomClasse'] . '">' . $row['NomClasse'] . '</option>';
                            }
                            ?>
                            </select>
                            </div>
                
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Date de Fin</label>
                            <input type="date" class="form-control" placeholder="Date de Fin *" name="Fin"/>
                            </div>
                
                            <div class="form-group">
                            <label>Prenom d'Etudiant</label>
                                <input type="text" class="form-control" placeholder="Prenom *" name="Prenom"/>
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