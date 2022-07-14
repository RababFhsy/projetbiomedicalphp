<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		try{
			$type = $_POST['type'];
			$photo= $_POST['photo'];
			$ref = $_POST['ref'];
			$valeurmax = $_POST['valeurmax'];
			$valeurmin = $_POST['valeurmin'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `capteur` (`type`, `photo`, `ref`,`valeurmax`,`valeurmin`) VALUES ('$type ', '$photo', '$ref','$valeurmax','$valeurmin')";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:indexcapteur.php');
	}
?>