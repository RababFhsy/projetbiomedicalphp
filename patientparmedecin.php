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
       if($_SESSION["type"] =="medecin") {
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
                  
                    <h3 class="menu-title">Gestion</h3><!-- /.menu-title -->
					<li>
                        <a href="indexmed.php"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="patientparmedecin.php"  aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Gestion des Patients </a>
  
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
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i> Profile</a>

                          

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> déconnexion</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                       
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
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
                        <h1>Gestion des Patients </h1>
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

            <div class="col-sm-12">

            </div>

		<div class="col-md-6" >
		

		</div>
			<table class="table table-hover" style="margin-left : 15px; width: 1000px;">
				<thead class="table-dark">
					<tr>
						<th>Nom de Patient</th>
                        <th>Date de naissance </th>
						<th> Action</th>
                        <th>Information sur le boitier</th>
                        <th>Dashboard</th>

					
					
					
					</tr>
				</thead>
				<tbody>
				<?php
						require 'conn.php';
                        $t=$_SESSION['username'];
          
		   $sql = $conn->prepare("select * from `patient` WHERE `id`  in (select `idp` from `medecinpatient` where `idm` in ( select id from `medecin` where fullname ='$t')) and `id` not in ( select `idp` from `patientboitier` )");
		  $sql->execute();
		
						while($fetch = $sql->fetch()){

						


					?>
					<tr>
						<td><?php echo $fetch['fullname']?></td>
                        <td><?php echo $fetch['dateDeNaissance'] ?></td>	
					
								




				
	<td><input type="submit" onclick="$('.typebassoc').change();" class="btn btn-outline-dark" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>"  value ="Affecter un Boitier ">| <a class="btn btn-danger btn-sm" href="deletepatient.php?id=<?php echo $fetch['id']?>">Supprimer</a></td>

						
					  

	
				

				</tr>
					
					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								
								<form method="POST" action="boitierpatient.php">
									<div class="modal-header">
										<h3 class="modal-title">Affecter Boitier </h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-6 listassoc">
											
										</div>
										<div class="col-md-6">
											
											<div class="form-group">
                                            <input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
                                            <label> Type </label> 


                                            <select class="form-control typebassoc" name="type" >
																	<?php
						require 'conn.php';
						$sql21= $conn->prepare("SELECT distinct type,id FROM `boitier`");
						$sql21->execute();
						while($fetch21= $sql21->fetch()){

							$assoc = [];
                            $t=$fetch21['id'];
                            $sql7= $conn->prepare("SELECT * FROM capteur where id in (select idc from association where idb ='$t')");
                            $sql7->execute();

                             while($fetch7= $sql7->fetch()){
                            	$assoc[] = $fetch7;
                            }
					?>
							<option data-assoc=<?php echo "'".json_encode($assoc)."'"; ?> value="<?php echo $fetch21['type'] ?> ">
							<?php echo $fetch21['type']  ?> 
							</option>
							<?php } ?>
						    </select>
											</div>
                                            <div class="form-group">
					<label>Date </label> 
					<input class="form-control" type="date" name="datedebut"/>
				</div>
			
											<div class="form-group">
												<button class="btn btn-outline-dark" type="submit" name="affecter">Affecter</button>
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
					<?php  }?>
					<?php
						require 'conn.php';
                        $t=$_SESSION['username'];
          
		   $sql = $conn->prepare("select * from `patient` WHERE `id`  in (select `idp` from `medecinpatient` where `idm` in ( select id from `medecin` where fullname ='$t')) and `id` in ( select `idp` from `patientboitier` )");
		  $sql->execute();
		
						while($fetch = $sql->fetch()){

						


					?>
					<tr>
						<td><?php echo $fetch['fullname']?></td>
                        <td><?php echo $fetch['dateDeNaissance'] ?></td>	
					
								




				
	<td><input type="submit" class="btn btn-outline-dark" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>" onclick="$('.typebassoc').change();"  value ="Reaffecter un Boitier ">
	<a class="btn btn-outline-danger" href="deletepatient.php?id=<?php echo $fetch['id']?>">Supprimer</a></td>

    <td>
						<button  class="btn btn-outline-primary" data-toggle="modal"  data-target="#up<?php echo $fetch['id']?>">Voir détails de boitier </button>
			
					
						<div class="modal fade" id="up<?php echo $fetch['id']?>"  style="width=1000px" aria-hidden="true">
						<div class="modal-dialog" style="width=1000px">
							<div class="modal-content" style="width=1000px" >
								<div  class="text-danger alert alert-danger "  style="text-align:center">
								<label  >Boitier </label></div>
								<table id="example" class="table table-hover" style="width:100%">
									<thead class="table-dark" >
									
                                    <th>Type de Boitier </th>		
						<th>Date de l'affectation</th>
					
                        <th>Nombre de Capteur</th>
                       
                      

					
									</thead>
									<tbody>
									<?php
						$id = $fetch['id'];
						$sql1 = $conn->prepare("select * from `patientboitier` WHERE `idp`  in (select `id` from `patient` where `id`='$id')");
						$sql1->execute();
                        $sql3 = $conn->prepare("select * from `boitier` WHERE `id`  in (select `idb` from `patientboitier` where `idp`='$id')");
						$sql3->execute();
                      
						$sql50 = $conn->prepare("select * from `capteur` WHERE `id`  in (select `idc` from `association` where `idb`='$id')");
						$sql50->execute();
						
					while($fetch1 = $sql1->fetch()  ){
                        $fetch3=$sql3->fetch();
                        
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql3="select count(idc) as id  from `association` where idb in (select id from `boitier` WHERE `id`  in (select `idb` from `patientboitier` where `idp`='$id'))";
            $stmt1 = $conn->query($sql3);
            $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
            $idb=$row1['id'];

					
				?>
						<td><?php echo $fetch3['type']?></td>	
						<td><?php echo $fetch1['datedebut']?></td>
						
                        <td><?php echo $idb ?></td>	
         
</table>
				
							<div class="modal-footer">
										<button  class="btn btn-danger" data-dismiss="modal">Close</button>

									</div>		
						</div>
						</div>
					</div>
                        
                   </td>
                  
          

                    <td>
						<button  class="btn btn-outline-primary" data-toggle="modal" onclick="fat('<?php echo $idb ?>')" data-target="#p">  Voir ses Données
                    </button>
			
				

                    <?php } ?> 

					</tr>
                   
                  
                    </tbody>
					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
				
								
								<form method="POST" action="reaffecterboitier.php">
									<div class="modal-header">
										<h3 class="modal-title">Affecter Boitier </h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-6 listassoc">
										

										</div>
										<div class="col-md-6">
											
											<div class="form-group">
                                            <input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
											<input type="hidden" value="<?php echo $b?>" name="idp"/>

			
                                            <label> Type </label> 
                                            <select class="form-control typebassoc" name="type">
																	<?php
						require 'conn.php';
						$sql21= $conn->prepare("SELECT * FROM boitier ");
						$sql21->execute();
                        
                       
						while($fetch21= $sql21->fetch()){
							$assoc = [];
                            $t=$fetch21['id'];
                            $sql7= $conn->prepare("SELECT * FROM capteur where id in (select idc from association where idb ='$t')");
                            $sql7->execute();

                            while($fetch7= $sql7->fetch()){
                            	$assoc[] = $fetch7;
                            }

                           

					?>
							<option data-assoc=<?php echo "'".json_encode($assoc)."'"; ?> value="<?php echo $fetch21['type'] ?> ">
							<?php echo $fetch21['type'] ?></option>
							<?php } ?>
						    </select>
                            <div class="form-group">
											</div>
                                            <div class="form-group">
					<label>Date </label> 
					<input class="form-control" type="date" name="datedebut"/>
				</div>
                       
											<div class="form-group">
												<button class="btn btn-outline-dark" type="submit" name="affecter">ReAffecter</button>
											</div>
										</div>	
									</div>
								</div>
                                    </form>
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</form>
					
						
								
							</div>
						</div>
					</div>	
					<?php }  ?>
					
                   </td>
				
			</table>
                                   
            
                            
                            
                            
	
	</div>

<div class="modal fade" id="p"  style="height : 50% " >
            
					<div class="modal-dialog" >
							<div class="modal-content" >
                              <form action="patientparmedecin.php" >
								<div  class="text-dark alert alert-light "  style="text-align:center;">
                                <div style="height : 10% ">

                               <div id="chartContainer">


                             

                               </div>
                          

							<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Close</button>

									</div>	
                    </form>	
						</div>
                        
						</div>
                    
					</div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript" src="jquery.js"></script>
        <script>

$(document).ready(function() {
    $('#example').DataTable();
    

    
} );
function fat(nombrecapture){

//vider la zone des charts
$("#chartContainer").html("");

//pour chaque capture creer un chart element 
for (let i = 0; i < nombrecapture; i++) {
	if (i==0) {
		var chart = document.createElement('canvas');
        chart.id = 'LM200';
        chart.className = 'LM200';
        document.getElementById('chartContainer').appendChild(chart);
	}
  
	if (i==1) {
	    var chart = document.createElement('canvas');
	    chart.id = 'LM393';
	    chart.className = 'LM393';
	    document.getElementById('chartContainer').appendChild(chart);	
	}
 
	if (i==2) {
		var chart = document.createElement('canvas');
	    chart.id = 'pT100';
	    chart.className = 'pT100';
	    document.getElementById('chartContainer').appendChild(chart);
	}

  
}


   var tab = [];
            var html = "";
            var x_tab = [];
            var y_tab = [];
          


   var ws = new WebSocket("ws://localhost:5002");
            
            
            ws.onmessage = function (evt) {
                tab = JSON.parse(evt.data)[0];

                if(tab["LM200"] !== undefined) {
	                x_tab.push(Number(tab["LM200"].temps));
	                y_tab.push(Number(tab["LM200"].tention));

	                /*$( ".myChart" ).each(function() {
						   
					});*/

					if($("#LM200").length > 0){

						var ctx = $("#LM200");
				       var myChart = new Chart(ctx, {
				        type: 'line',
				                data: {
				                    labels: x_tab,
				                    datasets: [{
				                        data: y_tab,
				                      
				                        borderColor: [
				                            'rgba(255, 99, 132, 1)',
				                            'rgba(54, 162, 235, 1)',
				                            'rgba(255, 206, 86, 1)',
				                            'rgba(75, 192, 192, 1)',
				                            'rgba(153, 102, 255, 1)',
				                            'rgba(255, 159, 64, 1)'
				                        ],
				                        borderWidth: 1
				                    }]
				                },
				                options: {
				                 
				                    title: {
				                        display: true,
				                        text: '',
				                        fontSize: 21,
				                        padding: 20,
				                        fontFamily: 'Calibri',
				                        tooltips: {enabled: false},
				                        hover: {mode: null},
				                    },  
				                    legend: {
				                        display: false
				                       
				                       
				                    },
				                    type: 'line',
				                    scales: {
				                       
				                    yAxes: [{
				                            ticks: {
				                                beginAtZero: true
				                            },  
				                            scaleLabel: {
				                              display: true,
				                              labelString: 'la concentration d’alcool dans la haleine'
				                            }
				                    }],
				                    xAxes: [{
				                            scaleLabel: {
				                              display: true,
				                              labelString: 'temps'
				                            }
				                    }],
				                    }
				                }
				            });
					}
                       

                }




                if(tab["LM393"] !== undefined) {
	                x_tab.push(Number(tab["LM393"].temps));
	                y_tab.push(Number(tab["LM393"].tention));

	                /*$( ".myChart" ).each(function() {
						   
					});*/

					if($("#LM393").length > 0){

						var ctx = $("#LM393");
				       var myChart = new Chart(ctx, {
				        type: 'bar',
				                data: {
				                    labels: x_tab,
				                    datasets: [{
				                        data: y_tab,
				                      
				                        borderColor: [
				                            'rgba(255, 99, 132, 1)',
				                            'rgba(54, 162, 235, 1)',
				                            'rgba(255, 206, 86, 1)',
				                            'rgba(75, 192, 192, 1)',
				                            'rgba(153, 102, 255, 1)',
				                            'rgba(255, 159, 64, 1)'
				                        ],
				                        borderWidth: 1
				                    }]
				                },
				                options: {
				                 
				                    title: {
				                        display: true,
				                        text: '',
				                        fontSize: 21,
				                        padding: 20,
				                        fontFamily: 'Calibri',
				                        tooltips: {enabled: false},
				                        hover: {mode: null},
				                    },  
				                    legend: {
				                        display: false
				                       
				                       
				                    },
				                    type: 'line',
				                    scales: {
				                       
				                    yAxes: [{
				                            ticks: {
				                                beginAtZero: true
				                            },  
				                            scaleLabel: {
				                              display: true,
				                              labelString: 'tention'
				                            }
				                    }],
				                    xAxes: [{
				                            scaleLabel: {
				                              display: true,
				                              labelString: 'temps'
				                            }
				                    }],
				                    }
				                }
				            });
					}
                       

                }



                if(tab["pT100"] !== undefined) {
	                x_tab.push(Number(tab["pT100"].temps));
	                y_tab.push(Number(tab["pT100"].tention));

	                /*$( ".myChart" ).each(function() {
						   
					});*/

					if($("#pT100").length > 0){

						var ctx = $("#pT100");
				       var myChart = new Chart(ctx, {
				        type: 'line',
				                data: {
				                    labels: x_tab,
				                    datasets: [{
				                        data: y_tab,
				                      
				                        borderColor: [
				                            'rgba(255, 99, 132, 1)',
				                            'rgba(54, 162, 235, 1)',
				                            'rgba(255, 206, 86, 1)',
				                            'rgba(75, 192, 192, 1)',
				                            'rgba(153, 102, 255, 1)',
				                            'rgba(255, 159, 64, 1)'
				                        ],
				                        borderWidth: 1
				                    }]
				                },
				                options: {
				                 
				                    title: {
				                        display: true,
				                        text: '',
				                        fontSize: 21,
				                        padding: 20,
				                        fontFamily: 'Calibri',
				                        tooltips: {enabled: false},
				                        hover: {mode: null},
				                    },  
				                    legend: {
				                        display: false
				                       
				                       
				                    },
				                    type: 'line',
				                    scales: {
				                       
				                    yAxes: [{
				                            ticks: {
				                                beginAtZero: true
				                            },  
				                            scaleLabel: {
				                              display: true,
				                              labelString: 'Frequence Cardiaque'
				                            }
				                    }],
				                    xAxes: [{
				                            scaleLabel: {
				                              display: true,
				                              labelString: 'temps'
				                            }
				                    }],
				                    }
				                }
				            });
					}
                       

                }
               
                

                
                
            };


}
        
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script type="text/javascript" src="jquery.js"></script>
       
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

//listassoc
        $('.typebassoc').change(function(){
        	$('.listassoc').html('')
var as = JSON.parse($('option:selected', this).attr('data-assoc'));
	    $.each(as, function(index, value) {
		  $('<div />', {
		    'text': "***Type de capteur : " + value.type + ", Vmax: " + value.valeurmax + ", Vmin: " + value.valeurmin 
		  }).appendTo('.listassoc');
		});
	});
    </script>

</body>

</html>
<?php } ?>