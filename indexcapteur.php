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
       if($_SESSION["type"] =="admin"){
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


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

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
                 
                <h3 class="menu-title"> COMPTE <?PHP ECHO  $_SESSION['type']?> </h3><!-- /.menu-title -->

                    <li>
                        <a href="indexadmin.php"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i>   Gestion des Boitiers </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="addboitier.php">Créer un Boitier</a></li>
                            <li><i class="fa fa-table"></i><a href="indexboitier.php">Liste des boitiers</a></li>
                         
                        </ul>
                    </li>
 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des Capteurs </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="createcapteur.php">Créer un Capteur</a></li>
                            <li><i class="fa fa-table"></i><a href="indexcapteur.php">Liste des Capteurs</a></li>
                         
                        </ul>
                    </li>
                  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des Médecins </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-card-o"></i><a href="add_users1.php">Créer un compte Médecin</a></li>
                            <li><i class="fa fa-table"></i><a href="add_users.php">Liste des Médecins</a></li>
                         
                        </ul>
                    </li>
  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des Secrétaires </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-card-o"></i><a href="add_secretaires1.php">Créer un compte Secrétaire</a></li>
                            <li><i class="fa fa-table"></i><a href="add_secretaires.php">Liste des Secrétaires</a></li>
                         
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

   

                       
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="profile.jpg" >
                        </a>

                        <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> Profile</a>


                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> déconnexion</a>
                        </div>
                    </div>

  

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <!-- <div class="breadcrumbs bg-info">
            <div class="col-sm-4 bg-info">
                <div class="page-header float-left bg-info">
                    <div class="page-title bg-info text-light">
                        <h1>Gestion des Capteurs </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 bg-info">
                <div class="page-header float-right bg-info">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                          
                    </div>
                </div>
            </div>
        </div> -->

        <div class="content mt-3">
            <!--/.col-->

            
                <!-- <div><a class="btn btn-warning btn-sm" style="width : 150px" href="createcapteur.php">+ Créer un  Capteur  </a>  <a class="btn btn-primary btn-sm" style="width : 150px" href="indexcapteur.php">Actualiser la page</a> </div></br>
                <div></div></br>
        
                </div> -->
                <div><a  class="btn btn-outline-success"  href="createcapteur.php"> <i class="fa fa-plus" aria-hidden="true"></i> Créer un  Capteur </a>  <a  class="btn btn-outline-primary" style="width : 150px" href="indexcapteur.php"><i class="fa fa-refresh" aria-hidden="true"></i>   Actualiser </a> </div></br>
                <div class="container">
                    <table  class="table table-hover"  style="width: 100%;">
                        <thead  class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Photo</th>
                                <th>Référence</th>
                                <th>Valeurmax</th>
                                <th>Valeurmin</th>
                                <th>Action</th>
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
                                <td><button  class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>">Modifier</button>  <a class="btn btn-danger" href="deletecapteur.php?id=<?php echo $fetch['id']?>">Supprimer</a></td>
                            </tr>
                            
                            <div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="updatecapteur.php">
                                            <div class="modal-header">
                                                <h3 class="modal-title">modifier Capteur </h3>
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
                                                        <input class="form-control" type="text" value="<?php echo $fetch['ref']?>" name="ref"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>valeurmax</label> 
                                                        <input class="form-control" type="number" value="<?php echo $fetch['valeurmax']?>" name="valeurmax"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>valeurmin</label> 
                                                        <input class="form-control" type="number" value="<?php echo $fetch['valeurmin']?>" name="valeurmin"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-warning form-control" type="submit" name="update">Modifier</button>
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
                            
                        </tbody>
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