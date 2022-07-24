







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

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
<style>
    body{
 background-image: url("medecin.webp");
    display: block;
    background-size: cover;
 
    }
    
   
   @media(max-width:576px){
      body{
    background-image: url("medecin.webp");
    display: block;
    background-attachment: fixed;
    background-size: cover;
    height: 100%;
   max-width: 100%;
   
   
    
      }
      
   }

</style>
    <?php
require('config.php');
session_start();

if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username);
	$_SESSION['username'] = $username;
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location: indexadmin.php');		  
		}elseif($user['type'] == 'secretaire') {
			header('location: indexsecretaire.php');
		}elseif($user['type'] == 'super admin') {
			header('location: indexsuperadmin.php');
		}elseif($user['type'] == 'medecin') {
			header('location: indexmed.php');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>


   
        
            <div class="login-content">
                <div class="login-logo">
                   
                </div>
                <div class="login-form" style=" border-radius: 20px">
                <form action="" method="post" name="login" >
                        <div class="form-group">
                            <label>Nom d'utilisateur </label>
                            <input type="text" class="form-control" name="username" placeholder="Nom">
                        </div>
                            <div class="form-group">
                                <label>Mot de passe </label>
                                <input type="password" class="form-control" name="password" placeholder="Mot de passe ">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox" style="color: #1977cc;"> Souvenez-vous de moi?
                            </label>
                          

                                </div>
                                <button type="submit" name="submit" class="btn btn-outline-primary"  style="border: 3px solid #1977cc;border-radius: 35px">Se connecter </button>
                                <div class="social-login-content">
                                  
                                </div>
                                <!-- <p class="box-register">Vous êtes nouveau ici? <a href="register.php" class="text-danger">S'inscrire</a></p> -->
	<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
                    </form>
              
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
