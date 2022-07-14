<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		try{
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$age = $_POST['age'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `medecin` (`fullname`) VALUES ('$fullname', '$email', '$password','$age')";
			$conn->exec($sql);
			$sql1 = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$fullname', '$email', '$password')";
			$conn->exec($sql1);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:indexMedecin.php');
	}
?>