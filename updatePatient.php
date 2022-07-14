<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$firstname = $_POST['fullname'];
			$lastname = $_POST['email'];
			$address1 = $_POST['dateDeNaissance'];
			$nommedecin = $_POST['nommedecin'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `patient`SET `fullname` = '$firstname', `email` = '$lastname',`dateDeNaissance` = '$address1' WHERE `id` = '$id'";
			$conn->exec($sql);
			$sql2="select id from `medecin` where fullname ='$nommedecin'";
            $stmt = $conn->query($sql2);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$idm=$row['id'];
			$sql = "UPDATE `medecinpatient`SET `idm` = '$idm'  WHERE `idp` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:indexPatient.php');
	}
?>