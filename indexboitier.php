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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des Capteurs </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="createcapteur.php">Créer un Capteur</a></li>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i> Gestion des Secretaires </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-id-card-o"></i><a href="add_secretaires.php">Créer un compte Secretaire</a></li>
                            <li><i class="fa fa-table"></i><a href="add_secretaires1.php">Liste des Secretaires</a></li>
                         
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
						<a class="nav-link" href="profile.php"><i class="fa fa-user"></i>  Profile</a>

                            

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
                    <div class="page-title bg-info">
                        <h1>Gestion des Boitiers </h1>
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

            
                <!-- <div><a class="btn btn-warning btn-sm" style="width : 150px" href="addboitier.php">+ Créer un  Boitier  </a>  <a class="btn btn-primary btn-sm" style="width : 150px" href="indexboitier.php">Actualiser la page</a> </div></br>
                <div></div></br> -->
                <div><a  class="btn btn-outline-success"  href="addboitier.php"> <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Boitier  </a>  <a  class="btn btn-outline-primary" style="width : 150px" href="indexboitier.php"><i class="fa fa-refresh" aria-hidden="true"></i>   Actualiser </a> </div></br>
        
                </div>
                <div class="container">
                    <table  class="table table-hover"  style="width: 100%;">
                       
			
				<div></div>
                <thead  class="table-dark">
					<tr>
						
						<th>Type</th>
						<th>Référence </th>
						<th>Nombre de branche </th>
						<th>Action</th>
						<th>Voir ses capteurs:  </th>
					
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `boitier`");
						$sql->execute();
					
					
						while($fetch = $sql->fetch()){
						
					?>
					<tr>
						<td><?php echo $fetch['type']?></td>
						<td><?php echo $fetch['ref']?></td>
						<td><?php echo $fetch['nbrbranche']?></td>
						<td><button  class="btn btn-success" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>">Modifier</button> <a  class="btn btn-danger" href="delete.php?id=<?php echo $fetch['id']?>">Supprimer</a>
						<td>
						<button  class="btn btn-outline-primary" data-toggle="modal" data-target="#up<?php echo $fetch['id']?>">Afficher </button>
			
					
						<div class="modal fade" id="up<?php echo $fetch['id']?>"  aria-hidden="true">
						<div class="modal-dialog" style="width: 1000px;">
							<div class="modal-content" style="width: 800px;">
								<div  class="text-danger alert alert-danger "  style="text-align:center;width: 800px;">
								<label > Ses Capteurs </label></div>
								<table class="table table-hover" style= " width:400px;">
									<thead class="table-dark" style="width: 400px;">
									<th>Numero</th>
									
						<th>Type</th>
						<th>Photo</th>
						<th>Ref</th>
						<th>Valeurmax</th>
						<th>Valeurmin</th>
						<th>Branche</th>

                        <th>Frequence</th>
									</thead>
									<tbody>
									<?php
						$id = $fetch['id'];
						$sql1 = $conn->prepare("select * from `capteur` WHERE `id`  in (select `idc` from `association` where `idb`='$id')");
			
						$sql1->execute();
						$t=0;
					while($fetch1 = $sql1->fetch()){
						$t=$t+1;
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						$sql2="select * from `association` WHERE `idb`=$id";
						$stmt = $conn->query($sql2);
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$idc=$row['branche'];
                        $f=$row['frequence'];
				?>
						<td><?php echo $t?></td>	
						<td><?php echo $fetch1['type']?></td>
						<td> <img width="150px " src="<?php echo $fetch1['photo']?>"/></td>
						<td><?php echo $fetch1['ref']?></td>
						<td><?php echo $fetch1['valeurmax']?></td>
						<td><?php echo $fetch1['valeurmin']?></td>
					    <td><?php echo $idc ?></td>
                        <td><?php echo $f ?></td></tbody><?php } ?></table>
				
							<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Close</button>

									</div>		
						</div>
						</div>
					</div>
                        
                   </td>
					</tr>
						</tboby>	
					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true" style="width: 100%">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="post" >
									<div class="modal-header">
										<h3 class="modal-title">modifier boitier </h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											
											<div class="form-group">
												<label>Type</label>
												<input class="form-control" type="text" value="<?php echo $fetch['type']?>" name="type"/>
												<input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>

											</div>
											<div class="form-group">
												<label>Référence</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['ref']?>" name="ref"/>
											</div>
											<div class="form-group">

												<label>Nombre de branche </label> 
												<input class="form-control" type="number" value="<?php echo $fetch['nbrbranche']?>" name="nbrbranche"/>
											</div>
                    		
					
<?php
    $listcap = [];
	$id = $fetch['id'];
	$sql5 = $conn->prepare("select * from `capteur`");
	$sql5->execute();
	while($fetch5 = $sql5->fetch()){
		$listcap[] = $fetch5;
	}		
?>
<label >Ajouter un capteur :</label>
  <div class="row">
       <div class="col-md-9">
       	<select class="form-control typebassoc" name="addcap" >
       	 	<option disabled value="empty" selected></option>
	       	 <?php foreach($listcap as $key=>$value): ?>
	                <option value="<?= $value["id"]; ?>"><?= $value["type"]; ?></option>
	       	 <?php endforeach; ?>
       	</select>
       </div>
  </div><br>
								<div></div>		
                                <label >Ses Capteurs  </label>
					
									<?php
						$id = $fetch['id'];
						$sql5 = $conn->prepare("select * from `capteur` WHERE `id`  in (select `idc` from `association` where `idb`='$id')");
			
						$sql5->execute();
						$t=0;
					while($fetch5 = $sql5->fetch()){
				
				?>
				
                      
                        <div class=" form-group container alert-info">
  <div class="row">
    <div class="col">
    <?php echo $fetch5['type']?>
    </div>
    <div class="col">
    <a href="deletecapteur1.php?id=<?php echo $fetch5['id'] ?>" class="text-dark">Supprimer</a>
    </div>
  
  </div>
</div>


<?php } ?>

											
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

					</tboby>	
				
					
<?php } ?>
					</table>
                    </div>

	
                    <?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
	
		try{
			
			$id = $_POST['id'];
			$type = $_POST['type'];
			$ref = $_POST['ref'];
			$nbrbranche = $_POST['nbrbranche'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `boitier`SET `type` = '$type ', `ref` = '$ref', `nbrbranche` = '$nbrbranche' WHERE `id` = '$id'";
			$conn->exec($sql);

			if(ISSET($_POST['addcap'])){
				$idc = $_POST['addcap'];
				$sql1 = "INSERT INTO `association` (`idb`, `idc`) VALUES ('$id','$idc')";
				//echo $sql1;
                $conn->exec($sql1);
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
	}

  
?>
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