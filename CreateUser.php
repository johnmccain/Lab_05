
<!DOCTYPE html>
<html>
<head>
	<title>Lab 05 -- Create User</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!--jQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<!--Bootstrap JS-->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="style.css">

	<script>
	</script>
</head>
<body>
	<div class="content-box">
		<h1>Create User</h1>
		<br>
		<br>
		<div class="material-card">
			<?php
				$connection = new mysqli('mysql.eecs.ku.edu', 'jmccain', 'ruffalo', 'jmccain');

				if ($connection->connect_error)
				{
				    printf("Connect failed: %s\n", $connection->connect_error);
				    exit();
				}

				$newUser = $_POST['user_id'];

				if($connection->query("INSERT INTO users (user_id) VALUES ('" . $newUser . "')") === true)
				{
					echo '<h3>New user ' . $newUser . ' created</h3>';
				}
				else
				{
					echo '<h3 style="color:red;">ERROR: The user id "' + $newUser + '" is already taken.</h3>';
				}

				$connection->close();

				//SELECT COUNT(*) FROM ~tablename~  Gives you the count
			?>
			<button class="btn btn-primary" onclick="window.location.href='/~jmccain/EECS448/Lab_05/CreateUser.html'">back</button>
		</div>
  </div>
</body>
</html>
