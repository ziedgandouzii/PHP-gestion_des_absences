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
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
      <h2>Gestion <b>des etudiants</b></h2>
     </div>
     <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ajouter un Etudient</span></a>
     </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Code Etudiant</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date de naissance</th>
                        <th>Classe</th>
                        <th>Numero d'inscription</th>
                        <th>Adresse</th>
                        <th>E-mail</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require_once('c_Etudiant.php');
                $etudiant = new c_Etudiant();
                $res = $etudiant->afficherEtudiant();
                while ($row =$res->fetch_assoc())
                {
                    ?>
                    <tr>
                        <td><?php echo $row['CodeEtudiant']; ?></td>
                        <td><?php echo $row['Nom']; ?></td>
                        <td><?php echo $row['Prenom']; ?></td>
                        <td><?php echo $row['DateNaissance']; ?></td>
                         <?php
                            $CodeClasse=$row['CodeClasse'];
                            require_once('../config.php');
                            $mysql=new mysqli(db_host,db_user,db_password,db_database);
                            $req1 = "SELECT NomClasse FROM t_classe WHERE CodeClasse='$CodeClasse'";
                            $res1 = $mysql->query($req1);
                            $row1 = $res1->fetch_assoc();
                            $classe = $row1['NomClasse'];
                        ?>
                        <td><?php echo $classe; ?></td>
                        <td><?php echo $row['NumInscription']; ?></td>
                        <td><?php echo $row['Adresse']; ?></td>
                        <td><?php echo $row['Mail']; ?></td>
                        <td><?php echo $row['Tel']; ?></td>
                        <td>
                        <a href="editpage.php?etudiant=<?php echo $row['CodeEtudiant'];?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="Delete_Etudiant.php?etudiant=<?php echo $row["CodeEtudiant"]; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="addetudient.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter un etudiant</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
				  <input type="hidden" name="action" value="add">		
                              <div class="form-group">		
                            <label>Nom</label>
                             <input type="text" class="form-control" placeholder="Nom *" name="nom"required/>
                            </div>
                            <div class="form-group">
                              <label>Prenom</label>
                              <input type="text" class="form-control" placeholder="Prenom *" name="prenom" required/>
                            </div>
                            <div class="form-group">
                            <label>Date de Naissance</label>
                            <input type="date" class="form-control" placeholder="Date de naissance *" name="naissance"required/>
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
                     
                            <div class="form-group">
                            <label>Numero d'inscription</label>
                                <input type="Number" class="form-control" placeholder="Numero d'inscription *" name="inscription" required/>
                            </div>
                            <div class="form-group">
                            <label>Adresse</label>
                                <input type="text" class="form-control" placeholder="Adresse *" name="Adresse"required/>
                            </div>
               
                        <div class="form-group">
                            <label>Email</label>
                                <input type="Email" class="form-control" placeholder="Email *" name="Email"required/>
                            </div>
                            <div class="form-group">
                            <label>Telephone</label>
                                <input type="Number" class="form-control" placeholder="Telephone *" name="Telephone"required/>
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