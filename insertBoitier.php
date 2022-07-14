<?php
require_once 'conn.php';
$data = $_POST['data'];

$type = $_POST['type'];
$ref = $_POST['ref'];
$nbbranche = $_POST['nbrbranche'];

$sql = "INSERT INTO `boitier` (`type`, `ref`, `nbrbranche`) VALUES ('$type', '$ref', '$nbbranche')";
$conn->exec($sql);
header('location:indexboitier.php');
foreach($data as $item){
			$type1= $item[1];
			$branche= $item[2];
			$frequence = $item[3];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql2="select id from `capteur` where type ='$type1'";
            $stmt = $conn->query($sql2);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$idc=$row['id'];

			$sql3="select max(id) as id  from `boitier`";
			$stmt1 = $conn->query($sql3);
			$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
			$idb=$row1['id'];
			$sql1 = "INSERT INTO `association` (`idb`, `idc`, `branche`, `frequence`) VALUES ('$idb+1','$idc','$branche', '$frequence')";
            $conn->exec($sql1);
			header('location:indexboitier.php');

			

}

	header('location:indexboitier.php');
?>