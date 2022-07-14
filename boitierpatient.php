<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['affecter'])){
		try{
			$type = $_POST['type'];
		    $id=$_POST['id'];
			$datedebut = $_POST['datedebut'];
			
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql2="select id from `boitier` where type ='$type'";
            $stmt = $conn->query($sql2);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$idb=$row['id'];
			$sql1 = "update   `patientboitier` set  `datefin`='$datedebut' where `datefin`='0000-00-00' and `idb` ='$idb' ";
            $conn->exec($sql1);
		   
			$sql2 = "INSERT INTO `patientboitier` (`idp`, `idb`, `datedebut`) VALUES ('$id','$idb','$datedebut')";
            $conn->exec($sql2);


		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:patientparmedecin.php');
	}
?>