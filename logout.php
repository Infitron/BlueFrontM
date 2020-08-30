<?php
		session_start(); //to ensure you are using same session
		$session->signed_in = false;
		session_destroy(); //destroy the session
		//header("Location: login.php");
		echo "<script> window.open('login.php','_self'); </script>"; //to redirect back to "index.php" after logging out

?>