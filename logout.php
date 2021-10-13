<body style="text-align:center;">
	<?php
		//remove existing sessions
		session_start();
		session_destroy();

		// Direct user to Login page
		header("Location:Login.php");
	?>
</body>