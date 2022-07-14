<?php 


	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		try{
			$username = $_POST['username'];
			$email= $_POST['email'];
			$password = $_POST['password'];
		
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `users` (`username`, `email`, `type`,`password`) VALUES ('$username', '$email', 'admin', '".hash('sha256', $password)."')";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:add_admin.php');
	}


    ?>