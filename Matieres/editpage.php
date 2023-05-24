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
        $CodeMatiere = $_GET['CodeMatiere'];
        include('c_Matiere.php');
        $matiere = new c_Matiere();
        $res = $matiere->afficherMatiereparCode($CodeMatiere);
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
                <li>
                  <a href="CRUD_Etudiant.php">
                  <i class="fas fa-user-tie fa-lg"></i> Liste des Etudiants
                  </a>
                </li>
                <li>
                  <a href="../Enseignants/CRUD_Enseignant.php">
                    <i class="fas fa-user-tie fa-lg"></i> Liste des Enseignants
                  </a>
                </li>
                <li class="active">
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
                    <p>Modifier la Matiere.</p>
                </div>
                <div class="form-content">
                    <?php while ($get = $res->fetch_assoc()) { ?>
                        <input type="Number" name="CodeMatiere" value="<?php echo $get['CodeMatiere'];?>" hidden>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Nom du Matiere</label>
                             <input type="text" class="form-control" placeholder="Nom *" name="NomMatiere" value="<?php echo $get['NomMatiere'];?>"/>
                            </div>
                            <div class="form-group">
                              <label>Nombre d'heure du TD Par Semaine</label>
                              <input type="Number" class="form-control" placeholder="Heure du TD *" name="NbreHeureTDParSemaine" value="<?php echo $get['NbreHeureTDParSemaine'];?>"/>
                              </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Nombre d'heure du Cours Par Semaine</label>
                          <input type="Number" class="form-control" placeholder="Heure du Cours *" name="NbreHeureCoursParSemaine" value="<?php echo $get['NbreHeureCoursParSemaine'];?>"/>
                          </div>
                          <div class="form-group">
                            <label>Nombre d'heure du TP Par Semaine</label>
                                <input type="Number" class="form-control" placeholder="Heure du TP *" name="NbreHeureTPParSemaine" value="<?php echo $get['NbreHeureTPParSemaine'];?>"/>
                            </div>
                            <div class="form-group">
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