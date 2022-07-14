<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		try{
			$fullname = $_POST['fullname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$dateDeNaissance = $_POST['dateDeNaissance'];
			$NomMedecin = $_POST['NomMedecin'];
			$dateDebut = $_POST['dateDebut'];
			$dateFin = $_POST['dateFin'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `patient` (`fullname`, `email`, `password`,`dateDeNaissance`) VALUES ('$fullname', '$email', '$password','$dateDeNaissance')";
			$conn->exec($sql);
			$sql2="select id from `medecin` where fullname ='$NomMedecin'";
            $stmt = $conn->query($sql2);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$idm=$row['id'];
			$sql3=" select max(id) as id  from `patient` ";
			$stmt1 = $conn->query($sql3);
			$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
			$idp=$row1['id'];
			
			$sql1 = "INSERT INTO `medecinpatient` (`idm`, `idp`, `dateDebut`, `dateFin`) VALUES ('$idm+1','$idp','$dateDebut', '$dateFin')";
            $conn->exec($sql1);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:indexPatient.php');
	}
?>