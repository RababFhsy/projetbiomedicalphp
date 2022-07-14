<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$type = $_POST['type'];
			$photo= $_POST['photo'];
			$ref = $_POST['ref'];
			$valeurmax = $_POST['valeurmax'];
			$valeurmin = $_POST['valeurmin'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `capteur`SET `type` = '$type', `photo` = '$photo', `ref` = '$ref', `valeurmax` = '$valeurmax' , `valeurmin` = '$valeurmin'  WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:indexcapteur.php');
	}
?>