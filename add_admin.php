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
       if($_SESSION["type"] =="super admin"){
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
                        <a href="indexsuperadmin.php"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="add_admin.php"   aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Gestion des Admins </a>
  
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
                            <img class="user-avatar rounded-circle" src="profile.jpg" >
                        </a>

                        <div class="user-menu dropdown-menu">
						<a class="nav-link" href="profile.php"><i class="fa fa-user"></i> My Profile</a>

                           

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                    

                    <div class="language-select dropdown" id="language-select">
                      

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Gestion des Admins </h1>
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

       


 
	<div >
		
	<div class="content mt-3">
		<div class="col-sm-8 col-lg-6 alert alert-primary" style="margin-left: 200px">
		<div style="margin-left: 58px" >
		 <h1 class="text-dark">Formulaire Admin</h1>
	     </div>
			<form method="POST" action="add_a.php" >
			
				<div class="form-group"> 
					<label>username</label>
					<input class="form-control" type="text" name="username"/>
				</div>
				<div class="form-group">
					<label>email</label> 
					<input class="form-control" type="text" name="email"/>
				</div>
				<div class="form-group">
					<label>password</label> 
					<input class="form-control" type="password" name="password"/>
				</div>				
				<div class="form-group">
					<button class="btn btn-warning form-control" type="submit" name="save">Save</button>
				</div>
			</form>
		</div><div style="height: 100px"></div>
		<div style=" margin: 100px">
		</div>
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
					
						<th>Nom</th>
						<th>email</th>
						<th>fonction</th>
					
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `users` where type='admin' ");
						$sql->execute();
						while($fetch = $sql->fetch()){
					?>
					<tr>
						<td><?php echo $fetch['username']?></td>
						<td><?php echo $fetch['email']?></td>
						<td><?php echo $fetch['type']?></td>
						
						<td>| <a class="btn btn-danger btn-sm" href="deleteadmin.php?id=<?php echo $fetch['id']?>">Delete</a></td>
					</tr>
				
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
					
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	

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