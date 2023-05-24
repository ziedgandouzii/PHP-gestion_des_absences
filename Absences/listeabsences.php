<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestion des absents</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="nav-side-menu">
    <div class="brand">Suivi des absences</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
        <ul id="menu-content" class="menu-content collapse">
                 <li class="active">
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
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-1">
      <h2>Liste <b>des Absences</b></h2>
     </div>
     <div class="col">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter une Absence</span></a>
      <a href="suivreabsence.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Suivre les absences d'un Etudiant</span></a>
      <a href="suivreabsenceparMatiere.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Suivre les absences par Matiere</span></a>

    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Seance</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Matiere</th>
                        <th>Enseignant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('c_Stat.php');
                $stat = new c_Stat();
                $res = $stat->getlisteabsences();
                while ($row =$res->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $row['DateJour']; ?></td>
                        <td><?php echo $row['Seance']; ?></td>
                        <td><?php echo $row['Nom']; ?></td>
                        <td><?php echo $row['Prenom']; ?></td>
                        <td><?php echo $row['Matiere']; ?></td>
                        <td><?php echo $row['NomEnseignant']; ?> <?php echo $row['PrenomEnseignant']; ?></td>
                        <td>
                    <a href="deleteAbsence.php?CodeEtudiant=<?php echo $row["CodeEtudiant"];?>&CodeFicheAbsence=<?php echo $row["CodeFicheAbsence"];?>"  class="delete"><i class="material-icons" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="addAbsence.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter une Absence</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
				  <input type="hidden" name="action" value="add">				
                          <div class="form-group">
                            <label>Nom Etudiant</label>
                            <input type="text" class="form-control" placeholder="Nom *" name="Nom" required/>
                            </div>
                            <div class="form-group">
                            <label>Prenom Etudiant</label>
                        <input type="text" class="form-control" placeholder="Prenom *" name="Prenom" required/>
                            </div>
                            <div class="form-group">
                              <label>Matiere</label>
                              <select class="form-control" name="matiere">
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
                            <div class="form-group">
                              <label>Enseignant</label>
                              <select class="form-control" name="enseignant">
                            <?php
                            require_once('../Enseignants/c_Enseignant.php');
                            $enseignant = new c_Enseignant;
                            $res = $enseignant->afficherEnseignant();
                            while($row = $res->fetch_assoc()){
                            echo '<option value="'.$row['CodeEnseignant'].'">'.$row['Nom']." ".$row['Prenom'].'</option>';
                            }
                            ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>Date Absence</label>
                                <input type="date" class="form-control" placeholder="Date d'absence*" name="dateabsence" required/>
                            </div>
                            <div class="form-group">
                            <label>Seance</label>
                            <select class="form-control" name="seance">
                            <?php
                            require_once('../config.php');
                            $mysql=new mysqli(db_host,db_user,db_password,db_database);
                            $req = "SELECT * FROM t_seance";
                            $res = $mysql->query($req);
                            $mysql->close();
                            while($row = $res->fetch_assoc()){
                            echo '<option value="'.$row['CodeSeance'].'">'.$row['NomSeance'].'</option>';
                            }
                        ?>
                            </select>
                            </div>
        </div>
        <div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Ajouter">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>