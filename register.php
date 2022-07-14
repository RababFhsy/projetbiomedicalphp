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
    <link rel="stylesheet" href="style.css" />


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

<body style="background-color:#47bdeb; ">
    <?php
    require('config.php');
    
    if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username); 
        // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $type = stripslashes($_REQUEST['type']);
        $type = mysqli_real_escape_string($conn, $type);
        
        $query = "INSERT into `users` (username, email, type, password)
                    VALUES ('$username', '$email', '$type', '".hash('sha256', $password)."')";
        $res = mysqli_query($conn, $query);
    
        if($res){
            header('location: login.php');

           
        }
    }else{
    ?>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                   
                </div>
                <div class="login-form">
                <form class="box" action="" method="post">
                        <div class="form-group">
                            <label>Nom d'utilisateur </label>
                            <input type="text" class="form-control" placeholder="User Name" name="username">
                        </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                                <div class="form-group">
                                    <label>Mot de passe </label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                                    <div class="checkbox">
                                        <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                                    </div>
                                    <div class="form-group">
                                    <select class="box-input" name="type">
                                    <option value="admin">admin</options>
                                    <option value="super admin">super admin</options>
                                    <option value="secretaire">secretaire</options>
                                    <option value="medecin">medecin</options>
		
	    
                                       </select></div>
                                    <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30">Register</button>
                                    <div class="social-login-content">
                                        <div class="social-button">
                                            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                            <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                                        </div>
                                    </div>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="#"> Sign in</a></p>
                                    </div>
                    </form>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
