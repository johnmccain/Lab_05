<!DOCTYPE html>
<html>
<head>
	<title>Lab_05 -- ADMIN: View Users</title>
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
	<div id="content-box">
		<h1>ADMIN: View Users</h1>
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

		$author = $_POST['author_id'];
		$content = $_POST['content'];

		$query = "SELECT user_id FROM users";

		$result = $connection->query($query);

		$users = $result->fetch_all();

		echo '<table id="user-table" class="table table-striped">';
		echo '<tr><th>Users:</th></tr>';
		foreach($users as $user)
		{
			echo '<tr>';
			foreach($user as $user_data)
			{
				echo '<td>' . $user_data . '</td>';
			}
			echo '</td>';
		}
	  echo '</table>';
		?>
		<button class="btn btn-primary" onclick="window.location.href='/~jmccain/EECS448/Lab_05/AdminHome.html'">back</button>
		</div>
	</div>
</body>
</html>
