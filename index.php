<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	
		<title>Demandes Professeurs</title>

<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<style>
	#sectiono{
		width:19%;
		position: absolute;
		background-color: #4e73df;
		color:white;
		height: 100%;
	}
	#asido{
		margin-left:19%
	}
	ul{
		margin-bottom: 1rem;
	}
	li{
		padding: 8px;
		margin-right: 15px;
		margin:5px;
		
	}
	

span,i,a {
	color : white;
	margin-top: 5px;
}

	a:hover{
		text-decoration: none ;
	}
</style>
<style>
      .modalDialog {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.1);
        z-index: 99999;
        opacity: 0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
      }
      .modalDialog:target {
        opacity: 1;
        pointer-events: auto;
      }
      .modalDialog > div {
        width: 400px;
        position: relative;
        margin: 10% auto;
        padding: 5px 20px 13px 20px;
        border-radius: 10px;
        background: -moz-linear-gradient(#2edbe8, #01a6b2);
        background: -webkit-linear-gradient(#2edbe8, #01a6b2);
        background: -o-linear-gradient(#2edbe8, #01a6b2);
      }
      .close {
        background: #606061;
        color: #ffffff;
        line-height: 25px;
        position: absolute;
        right: -12px;
        text-align: center;
        top: -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
      }
      .close:hover {
        background: #6ed1d8;
      }
    </style>
	</head>

<body>
	<section id="sectiono">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


<div style="margin-top: 10px ; text-align: center ; font-size : 25px ;" class="nav-item active text-light ">
	
	
		<span class="text-light">Hi <?php echo $_SESSION['username']; ?></span>
</div>
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active text-light ">
	<a class="nav-link text-light" href="admin.php">
		<i class="fas fa-fw fa-user-alt"></i>
		<span class="text-light">Profile</span></a>
</li>


<!-- Nav Item - Etudiants table -->



	
 <!-- Nav Item - Demandes -->
 <li class="nav-item">
	<a class="nav-link" href="index.php">
		<i class="fas fa-fw fa-folder"></i>
		<span>GESTION CAPTEUR</span></a>
</li>

<!-- Nav Item - Table Professeurs -->
<li class="nav-item">
	<a class="nav-link" href="indexboitier.php">
		<i class="fas fa-fw fa-table"></i>
		<span>Gestion Boitier</span></a>
</li>
<li class="nav-item">
	<a class="nav-link" href="../admin/add_users.php">
		<i class="fas fa-fw fa-table"></i>
		<span >Gestion des medecins</span></a>
</li>

<li class="nav-item">
	<a class="nav-link" href="../admin/add_secretaires.php">
		<i class="fas fa-fw fa-table"></i>
		<span>Gestion des secretaires </span></a>
</li>

</ul>
</section>
<aside id="asido" >
	<nav class="navbar navbar-default">
	<div class="container-fluid"><span  style=" font-size: 30px; "  class="text-primary">Gestion des Capteurs</span>
		<a  href="../logout.php"><span  style="float: right;" class="text-danger" >Déconnexion</span>
 </a>
		
		</div>
	</nav>

		<div class="col-md-6" >
		<div><a class="btn btn-warning btn-sm" style="width : 150px" href="createcapteur.php">+ Creer un  Capteur  </a>  <a class="btn btn-primary btn-sm" style="width : 150px" href="index.php">Actualiser la pge</a> </div></br>
		<div></div></br>

		</div>
			<table class="table table-bordered" style="margin-left : 15px; width: 1000px;">
				<thead class="alert-info">
					<tr>
						<th>ID</th>
						<th>type</th>
						<th>photo</th>
						<th>ref</th>
						<th>valeurmax</th>
						<th>valeurmin</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `capteur`");
						$sql->execute();
						while($fetch = $sql->fetch()){
					?>
					<tr>
						<td><?php echo $fetch['id']?></td>
						<td><?php echo $fetch['type']?></td>
						<td> <img width="150px " src="<?php echo $fetch['photo']?>"/></td>
						<td><?php echo $fetch['ref']?></td>
						<td><?php echo $fetch['valeurmax']?></td>
						<td><?php echo $fetch['valeurmin']?></td>
						<td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>">Edit</button>  <a class="btn btn-danger btn-sm" href="deletecapteur.php?id=<?php echo $fetch['id']?>">Delete</a></td>
					</tr>
					
					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="POST" action="updatecapteur.php">
									<div class="modal-header">
										<h3 class="modal-title">modifier capteur </h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											
											<div class="form-group">
												<label>type</label>
												<input class="form-control" type="text" value="<?php echo $fetch['type']?>" name="type"/>
												<input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>

											</div>
											<div class="form-group">
												<label>photo</label> 
												<input class="form-control" type="file" value="<?php echo $fetch['photo']?>" name="photo"/>
											</div>
											<div class="form-group">
												<label>ref</label> 
												<input class="form-control" type="file" value="<?php echo $fetch['ref']?>" name="ref"/>
											</div>
											<div class="form-group">
												<label>valeurmax</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['valeurmax']?>" name="valeurmax"/>
											</div>
											<div class="form-group">
												<label>valeurmin</label> 
												<input class="form-control" type="file" value="<?php echo $fetch['valeurmin']?>" name="valeurmin"/>
											</div>
											<div class="form-group">
												<button class="btn btn-warning form-control" type="submit" name="update">Update</button>
											</div>
										</div>	
									</div>	
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
					
					<?php
						}
					?>
					
				</tbody>
			</table>
		</div>
	</div>
					</aside>
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	

</body>
</html>