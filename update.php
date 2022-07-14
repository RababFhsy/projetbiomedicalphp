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
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:indexboitier.php');
	}
?>