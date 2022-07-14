<?php
	if(ISSET($_GET['id'])){
		require_once 'conn.php';
		$id = $_GET['id'];
		$sql = $conn->prepare("DELETE from `medecin` WHERE `fullname` in (select `username` from  `users`  where id='$id')");
		$sql->execute();
		$sql = $conn->prepare("DELETE from `users` WHERE `id`='$id'");
		$sql->execute();
		header('location:add_users.php');
	}
?>