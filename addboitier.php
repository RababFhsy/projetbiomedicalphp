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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des médecins </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-card-o"></i><a href="add_users1.php">Créer un compte médecin</a></li>
                            <li><i class="fa fa-table"></i><a href="add_users.php">Liste des médecins</a></li>
                         
                        </ul>
                    </li>
  
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des secretaires </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-card-o"></i><a href="add_secretaires1.php">Créer un compte secretaire</a></li>
                            <li><i class="fa fa-table"></i><a href="add_secretaires.php">Liste des secretaires</a></li>
                         
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

        <!-- <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Gestion des Boitiers </h1>
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
        </div> -->

        <div class="content mt-3">

           

		<div>

		<div class="content mt-3">
		<div class="col-sm-4 col-lg-5 alert alert-light"style="border: 4px solid white;border-radius: 30px">
		<div style="margin-left: 58px" >
		
		 <h3 class="text-dark">Formulaire Boitier </h3>
	     </div>
			<!-- <form method="POST"  action="indexboitier.php"> -->
			<form method="POST" action="" onsubmit="event.preventDefault();onFormSubmit();">
				<div class="form-group">
					<label>Type</label>					
					<select class="form-control" type="text" name="type" id="type">           
			 <option value="UNO">Uno</option>
			 <option value="MEGA">Mega</option>
			 <option value="Nano">Nano</option>
             <option value="Due">Due</option>
             <option value="One">One</option>
			 </select>
			 <label>Référence</label> 
					<input class="form-control" type="text" name="ref"  id="ref"/>
					<label>Nombre de branche</label> 
					<input class="form-control" type="number" min=0 name="nbrbranche" id="nbrbranche"/>
				</div>
				<div class="form-group">
				<label>Type Capteur</label>
				<select class="form-control" name="type1" id="type1">
										<option>Autre</option>
						<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `capteur`");
						$sql->execute();
						while($fetch = $sql->fetch()){
					?>
							<option value="<?php echo $fetch['type'] ?> ">
							<?php echo $fetch['type']  ?>   
							</option>
							<?php } ?>
						    </select>
																
					<label>Branche</label>
					<select class="form-control" type="text" name="branche" id="branche">           
			 <option value="Ao">Ao</option>
			 <option value="A1">A1</option>
			 <option value="A2">A2</option>
			 <option value="A3">A3</option>
			 <option value="A4">A4</option>

		     </select>
				</div>
				<div class="form-group">
					<label>Fréquence</label>
					<input class="  form-control" type="number" name="date" id="date"/>
				</div>
           
				<div class="form-group">
					<button class="btn btn-primary form-control" type="submit" name="submit"> <i class="fa fa-plus" aria-hidden="true"></i> Capteur</button>
				</div>
				
				<div class="form-group">
					<button class="btn btn-success form-control" type="button" id="insertData" name="save"><a href="indexboitier.php"><p class="text-light"> <i class="fas fa-save"></i> Save</p></a></button>
				</div>
			</form>
		<?php
	
	?>
	
			
	
	<script>function mafonction ()  {
	var type1 = document.getElementById("type1").value;      
	var branche= document.getElementById("branche").value;   
	var date = document.getElementById("date").value;
	     

	
      
           
        }
	</script>



		</div>
		
		<div class="col-md-7">
			<table  class="table table-hover"  id="table-boitier">
            
                <thead  class="table-dark">
					<tr>
						<th></th>
						<th>Type Capteur</th>
						<th>Branche</th> 
						<th>Fréquence</th> 
                        <th>Action</th> 
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
		</div>
		


	
	
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	var selectedRow = null

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["type1"] = document.getElementById("type1").value;
    formData["branche"] = document.getElementById("branche").value;
    formData["date"] = document.getElementById("date").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("table-boitier").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    cell1 = newRow.insertCell(0);
    cell1.innerHTML = "";
    cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.type1;
    cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.branche;
    cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.date;
    cell4 = newRow.insertCell(4);
    cell4.innerHTML = 
                       '<a class="btn btn-danger btn-sm" onClick="onDelete(this)" >Delete</a>';
    
}

function resetForm() {
    document.getElementById("type1").value = "";
    document.getElementById("branche").value = "";
    document.getElementById("date").value = "";
    selectedRow = null;
}


function onDelete(td) {
    if (confirm('Are you sure to delete this record ?')) {
        row = td.parentElement.parentElement;
        document.getElementById("table-boitier").deleteRow(row.rowIndex);
        resetForm();
    }
}
function validate() {
   return true;
}
function reset() {
    document.getElementById("type").value = "";
    document.getElementById("ref").value = "";
    document.getElementById("nbrbranche").value = "";
	selectedRow = null;

}
//
var tableBoitier = [];
$("#insertData").click(function(){
        $("#table-boitier tr").each(function() {
        	if(!$(this).hasClass("old-row")){
	            var arrayOfThisRow = [];
			    var tableData = $(this).find('td');
			    if (tableData.length > 0) {
			        tableData.each(function() { arrayOfThisRow.push($(this).text()); });
			        tableBoitier.push(arrayOfThisRow);
			    }
        	}
		    
		});
	
		 $.ajax({
	        type: "POST",
	        url: "insertBoitier.php",
	        data: {data : tableBoitier,type : $("#type").val(), ref: $("#ref").val(),nbrbranche :$("#nbrbranche").val()}, 
	        success: function(){
	           
	        }
	    });
 reset();
}); 
</script>
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