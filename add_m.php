<?php 


	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		try{
			$username = $_POST['username'];
			$email= $_POST['email'];
			$password = $_POST['password'];
			$age = $_POST['age'];
		
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `users` (`username`, `email`, `type`,`password`) VALUES ('$username', '$email', 'medecin', '".hash('sha256', $password)."')";
			$conn->exec($sql);
			$sql1 = "INSERT INTO `medecin` (`fullname`,`age`) VALUES ('$username','$age')";
			$conn->exec($sql1);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:add_users.php');
	}


    ?>