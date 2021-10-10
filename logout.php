<body>
	<?php
		session_start();
		session_destroy();
	?>
	<h1>Logout successful</h1>
	You have successfully logged out.
	<form action="Login.php">
		Click here to <input type="submit" value="Login" />
	</form>	
</body>