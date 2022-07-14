<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$firstname = $_POST['fullname'];
			$lastname = $_POST['email'];
			$address = $_POST['password'];
			$address1 = $_POST['age'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `medecin`SET `fullname` = '$firstname', `email` = '$lastname', `password` = '$address',`age` = '$address1' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:indexMedecin.php');
	}
?>