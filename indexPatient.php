<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
	
        exit(); 
	}
    ?> 

 <?php  

                           
  require('config.php');

  
 
     $t=$_SESSION['username'];
    
      $query = "SELECT * FROM `users` WHERE username='$t'";
      $result = mysqli_query($conn,$query) or die(mysql_error());
      

       $user = mysqli_fetch_assoc($result);
          // vérifier si l'utilisateur est un administrateur ou un utilisateur
       $_SESSION['email'] =$user['email'] ;  
       $_SESSION['type'] =$user['type'] ;   
       $_SESSION['id'] =$user['id'] ;                  
       if($_SESSION["type"] =="secretaire"){
	    ?> 
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">
 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<style>
	.alert{position:relative;padding:1rem 1rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem}.alert-heading{color:inherit}.alert-link{font-weight:700}.alert-dismissible{padding-right:3rem}.alert-dismissible .btn-close{position:absolute;top:0;right:0;z-index:2;padding:1.25rem 1rem}.alert-primary{color:#084298;background-color:#cfe2ff;border-color:#b6d4fe}.alert-primary .alert-link{color:#06357a}.alert-secondary{color:#41464b;background-color:#e2e3e5;border-color:#d3d6d8}.alert-secondary .alert-link{color:#34383c}.alert-success{color:#0f5132;background-color:#d1e7dd;border-color:#badbcc}.alert-success .alert-link{color:#0c4128}.alert-info{color:#055160;background-color:#cff4fc;border-color:#b6effb}.alert-info .alert-link{color:#04414d}.alert-warning{color:#664d03;background-color:#fff3cd;border-color:#ffecb5}.alert-warning .alert-link{color:#523e02}.alert-danger{color:#842029;background-color:#f8d7da;border-color:#f5c2c7}.alert-danger .alert-link{color:#6a1a21}.alert-light{color:#636464;background-color:#fefefe;border-color:#fdfdfe}.alert-light .alert-link{color:#4f5050}.alert-dark{color:#141619;background-color:#d3d3d4;border-color:#bcbebf}.alert-dark .alert-link{color:#101214}
</style>
<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                  
 <h3 class="menu-title"> COMPTE <?PHP ECHO  $_SESSION['type']?> </h3><!-- /.menu-title -->					<li>
                        <a href="indexsecretaire.php"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
         
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i>   Gestion des Patients </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="ajouterpatient.php">Créer un compte patient</a></li>
                            <li><i class="fa fa-table"></i><a href="indexPatient.php">Liste des patients</a></li>
                         
                        </ul>
                    </li>
				
                  

         
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                           
                        </div>

                        <div class="dropdown for-message">
                            
                            <div class="dropdown-menu" aria-labelledby="message">
                                
                            </a>
                                
                            </a>
                               
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="profile.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
						<a class="nav-link" href="profile.php"><i class="fa fa-user"></i>  Profile</a>

                            

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> déconnexion</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
		<!-- <div class="breadcrumbs  bg-info">
            <div class="col-sm-4  bg-info">
                <div class="page-header float-left   bg-info ">
                    <div class="page-title  bg-info text-">
                        <h1>Gestion des Patients </h1>
                    </div>
                </div>
            </div>          
        </div> -->

		


			



		
			
		<div   style="margin : 30px;">
		<!-- <div><a class="btn btn-warning btn-sm"  href="ajouterpatient.php">+Ajouter un patient </a>  <a class="btn btn-primary btn-sm" style="width : 200px" href="indexPatient.php">Actualiser la page</a> </div></br>
                <div></div></br> -->
                <!-- <div><a   class="btn btn-outline-primary"  href="ajouterpatient.php"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter patient  </a>  <a  class="btn btn-outline-primary" style="width : 150px" href="indexPatient.php"><i class="fa fa-refresh" aria-hidden="true"></i>   Actualiser </a> </div></br> -->
                <div><a  class="btn btn-success"  href="ajouterpatient.php"><i class="fa fa-plus" aria-hidden="true"></i>  compte patient </a>  <a  class="btn btn-primary" style="width : 150px" href="indexPatient.php"><i class="fa fa-refresh" aria-hidden="true"></i>   Actualiser </a> </div></br>
                
        
			<table id="employee_data"  class="table table-hover" style="width : 1000px">
				<thead class="table-dark" >
					<tr>
						<th>Nom </th>
						<th>Email</th>
						
						<th>Date de naissance</th>
						<th>Nom de Médecin</th>
						<th></th>
					</tr>
				</thead>
				
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `patient`");
						$sql->execute();
						while($fetch = $sql->fetch()){
							$g=$fetch['id'];
							$sql1 = $conn->prepare("SELECT * FROM `medecin` where id in (select idm from `medecinpatient`  where idp='$g')");
						$sql1->execute();
						$fetch1=$sql1->fetch();
					?>
					<tr>
						<td><?php echo $fetch['fullname']?></td>
						<td><?php echo $fetch['email']?></td>
						<td><?php echo $fetch['dateDeNaissance']?></td>
						<td> Dr.<?php echo $fetch1['fullname']?></td>
						<td><button class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>">Modifier</button>
                        <a  class="btn btn-danger" href="deletePatient.php?id=<?php echo $fetch['id']?>">Supprimer</a></td>
					</tr>
					
					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="POST" action="updatePatient.php">
									<div class="modal-header">
										<h3 class="modal-title">Modifier patient</h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Nom</label>
												<input class="form-control" type="text" value="<?php echo $fetch['fullname']?>" name="fullname" />
												<input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
											</div>
											<div class="form-group">
												<label>Email</label>
												<input class="form-control" type="email" value="<?php echo $fetch['email']?>" name="email" />
											</div>
											
											<div class="form-group">
												<label>Date de naissance</label> 
												<input class="form-control" type="date" value="<?php echo $fetch['dateDeNaissance']?>" name="dateDeNaissance" />
											</div>
                                            <div class="form-group">
												
												<label>Nom de Médecin</label>
				                               <select class="form-control" name="nommedecin">
																	<option>Autre</option>
																	<?php
						                 require 'conn.php';
						                 $sql1 = $conn->prepare("SELECT distinct fullname FROM `medecin`");
					                	$sql1->execute();
					                 	while($fetch1 = $sql1->fetch()){
					                    ?>
						                   	<option value="<?php echo $fetch1['fullname'] ?> "> Dr.
							                <?php echo $fetch1['fullname']  ?> 
							                </option>
							                <?php } ?>
						                    </select>

											</div>
											<div class="form-group">
												<button class="btn btn-success" type="submit" name="update">Modifier</button>
											</div>
										</div>	
									</div>	
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Fermer</button>
										</div>
								</form>
							</div>
						</div>
					</div>	
					
					<?php
						}
					?>
			
			</table>
		</div>
	</div>
					</div>
					
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	


  

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
	<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
<?php } ?>