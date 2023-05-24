<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../style.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $codeEtudiant = $_GET['etudiant'];
        include('c_Etudiant.php');
        $etudient = new c_Etudiant;
        $res = $etudient->afficherEtudiantByCodeEtudiant($codeEtudiant);
    ?>
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
                <li class="active">
                  <a href="CRUD_Etudiant.php">
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
<div class="container register-form">
            <form class="form" action="edit.php" method="post">
                <div class="note">
                    <p>Modifier l'Etudiant.</p>
                </div>
                <div class="form-content">
                    <?php while ($get = $res->fetch_assoc()) { ?>
                        <input type="Number" name="etudiant" value="<?php echo $get['CodeEtudiant'];?>" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Nom</label>
                        <input type="text" class="form-control" placeholder="Nom *" name="nom" value="<?php echo $get['Nom']; ?>"/>
                            </div>
                            <div class="form-group">
                            <label>Date de Naissance</label>
                            <input type="date" class="form-control" placeholder="Date de naissance *" name="naissance" value="<?php echo $get['DateNaissance']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" class="form-control" placeholder="Prenom *" name="prenom" value="<?php echo $get['Prenom']; ?>"/>
                            </div>
                            <div class="form-group">
                            <label>Classe</label>
                            <select class="form-control" name="classe">
                            <?php
                            require_once('../config.php');
                            $mysql=new mysqli(db_host,db_user,db_password,db_database);
                            $req = "SELECT * FROM t_classe";
                            $res = $mysql->query($req);
                            $mysql->close();
                            while($row = $res->fetch_assoc()){
                            echo '<option value="'.$row['CodeClasse'].'">'.$row['NomClasse'].'</option>';
                            }
                        ?>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Numero d'inscription</label>
                                <input type="Number" class="form-control" placeholder="Numero d'inscription *" name="inscription" value="<?php echo $get['NumInscription']; ?>"/>
                            </div>
                            <div class="form-group">
                            <label>Adresse</label>
                                <input type="text" class="form-control" placeholder="Adresse *" name="adresse" value="<?php echo $get['Adresse']; ?>"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                                <input type="text" class="form-control" placeholder="Email *" name="email" value="<?php echo $get['Mail']; ?>"/>
                            </div>
                            <div class="form-group">
                            <label>Telephone</label>
                                <input type="Number" class="form-control" placeholder="Telephone *" name="telephone" value="<?php echo $get['Tel']; ?>"/>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <button type="submit" class="btnSubmit">Modifer</button>
                </div>
            </form>
        </div>
        <?php } ?> 
</body>
</html>