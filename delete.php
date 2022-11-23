<?php
    include_once('includes/db.inc.php');

	$sql="delete from bbcal where id='{$_GET["delete"]}'";
	if($conn->query($sql)){
		header('location: index.php');
	}
?>
