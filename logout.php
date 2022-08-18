<?php

	if(!isset($_SESSION)) {

		session_star();
	}

	session_destroy();

	header("Location: index.php");