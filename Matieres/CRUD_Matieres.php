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
                 <li class="active">
                  <a href="CRUD_Matieres.php">
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
                    <div class="col-sm-6">
      <h2>Gestion <b>des Matieres</b></h2>
     </div>
     <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter une Matiere</span></a>
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code Matiere</th>
                        <th>Nom Matiere</th>
                        <th>Nombre Heure de Cours par semaine</th>
                        <th>Nombre Heure de TD par semaine</th>
                        <th>Nombre Heure de TP par semaine</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('c_Matiere.php');
                $matiere = new c_Matiere();
                $res = $matiere->afficherlisteMatiere();
                while ($row =$res->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $row['CodeMatiere']; ?></td>
                        <td><?php echo $row['NomMatiere']; ?></td>
                        <td><?php echo $row['NbreHeureCoursParSemaine']; ?></td>
                        <td><?php echo $row['NbreHeureTDParSemaine']; ?></td>
                        <td><?php echo $row['NbreHeureTPParSemaine']; ?></td>
                        <td>
                        <a href="editpage.php?CodeMatiere=<?php echo $row['CodeMatiere'];?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="Delete_Matiere.php?CodeMatiere=<?php echo $row["CodeMatiere"]; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="addMatiere.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter une Matiere</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
				  <input type="hidden" name="action" value="add">				
                          <div class="form-group">
                            <label>Code Matiere</label>
                            <input type="Number" class="form-control" placeholder="Code du Matiere *" name="CodeMatiere" required/>
                            </div>
                            <div class="form-group">
                            <label>Nom du Matiere</label>
                        <input type="text" class="form-control" placeholder="Nom du Matiere *" name="NomMatiere" required/>
                            </div>
                            <div class="form-group">
                              <label>Nombre d'Heure du Cours Par Semaine</label>
                              <input type="Number" class="form-control" placeholder="Heure du Cours *" name="NbreHeureCoursParSemaine" required/>
                            </div>

                            <div class="form-group">
                            <label>Nombre d'Heure du TD Par Semaine</label>
                                <input type="Number" class="form-control" placeholder="Heure du TP *" name="NbreHeureTDParSemaine" required/>
                            </div>
                            <div class="form-group">
                            <label>Nombre d'Heure du TP Par Semaine</label>
                                <input type="Number" class="form-control" placeholder="Heure du TD *" name="NbreHeureTPParSemaine" required/>
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