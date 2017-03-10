<?php

	if(isset($_REQUEST['logout']))
	{
		session_destroy();
		session_unset($_SESSION['']);

		//header("Location: ../*.php");
	}
?>