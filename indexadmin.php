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
    <title>PFA</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">

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
                            <li><i class="menu-icon fa fa-th"></i><a href="addboitier.php">Créer un boitier</a></li>
                            <li><i class="fa fa-table"></i><a href="indexboitier.php">Liste des boitiers</a></li>
                         
                        </ul>
                    </li>
 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des capteurs </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="createcapteur.php">Créer un capteur</a></li>
                            <li><i class="fa fa-table"></i><a href="indexcapteur.php">Liste des capteurs</a></li>
                         
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
                            <li><i class="fa fa-id-card-o"></i><a href="add_secretaires.php">Créer un compte Secrétaire</a></li>
                            <li><i class="fa fa-table"></i><a href="add_Secrétaires1.php">Liste des Secrétaires</a></li>
                         
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
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> Profile</a>

                         

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> déconnexion</a>
                        </div>
                    </div>

                    

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                          
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                
            </div>


            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="indexboitier.php">Gestion Boitiers</a>
                                   
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                        <?php


require_once 'conn.php';
	
	
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     $sql3="select count(type) as id  from `boitier`";
                     $stmt1 = $conn->query($sql3);
                     $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                     $idb=$row1['id'];

					?>
							
                        
                
                           
                        </h4>
                        <p class="text-light"> Nombre de Boitiers</p>
                        <span style="font-size:30px;" class="count"><?php echo $idb ?></span>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="indexcapteur.php">Gestion Capteur</a>
                                    
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                        <?php


require_once 'conn.php';
	
	
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     $sql3="select count(type) as id  from `capteur`";
                     $stmt1 = $conn->query($sql3);
                     $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                     $idc=$row1['id'];

					?>
							
                        
                
                        </h4>
                        <p class="text-light"> Nombre de Capteurs</p>
                        <span style="font-size:30px;" class="count"><?php echo $idc ?></span>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="add_users.php">Gestion Médecin</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <?php


require_once 'conn.php';
	
	
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql3="select count(id) as id  from `users` where type='medecin'";
                     $stmt1 = $conn->query($sql3);
                     $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                     $idp=$row1['id'];

					?>
							
                        
                
                        </h4>
                        <p class="text-light">Nombre de Médecins</p>
                        <span style="font-size:30px;" class="count"><?php echo $idp ?></span>


                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="add_secretaires.php">Gestion Secrétaires</a>
                             
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                        <?php


require_once 'conn.php';
	
	
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                     $sql3="select count(username) as id  from `users`  where type='secretaire' ";
                     $stmt1 = $conn->query($sql3);
                     $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                     $idr=$row1['id'];

					?>
						
                        </h4>
                        <p class="text-light">Nombre de Secrétaire</p>
                        <span style="font-size:30px;" class="count"><?php echo $idr ?></span>


                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                        </div>

                    </div>
                </div>
            </div>

      

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
<?php } 
else {
    header("Location: login.php");
}?>