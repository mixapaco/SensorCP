<?php
	session_start();
    if(session_destroy()) {
		$way='../index.php';
    	header("Location: $way");
    }
?>