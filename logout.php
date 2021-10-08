<body>
	<?php
		session_start();
		session_destroy();
		if(isset($_COOKIE['username']) && isset($_COOKIE["pw"])) {
			$name = $_COOKIE["username"];
			$password = $_COOKIE["pw"];
			setcookie("username", $name, time() - 1);
			setcookie("pw", $password, time() - 1);
		}
		//echo "<h1>Logout successful</h1>";
		//echo "You have successfully logged out.";
		//echo "Click here to <a href='rememberMeTest.php'>login again</a>"; test
	?>
	<h1>Logout successful</h1>
	You have successfully logged out.
	<form action="rememberMeTest.php">
		Click here to <input type="submit" value="Login" />
	</form>	
</body>