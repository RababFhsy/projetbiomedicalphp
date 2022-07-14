<?php
	if(ISSET($_GET['id'])){
		require_once 'conn.php';
		$idc = $_GET['id'];
		$sql = $conn->prepare("DELETE from `association` WHERE `idc`='$idc'");
		$sql->execute();
		header('location:indexboitier.php');
	}
?>