<?php
	if(ISSET($_GET['id'])){
		require_once 'conn.php';
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `boitier` WHERE `id`='$id'");
		$sql->execute();
		header('location:indexboitier.php');
	}
?>