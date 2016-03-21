<!DOCTYPE html>
<html>
<head>
	<title>Lab_05 -- Create Post</title>
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
		<h1>Create Post</h1>
		<br>
		<br>
		<?php
		$connection = new mysqli('mysql.eecs.ku.edu', 'jmccain', 'ruffalo', 'jmccain');

		if ($connection->connect_error)
		{
				printf("Connect failed: %s\n", $connection->connect_error);
				exit();
		}

		$author = $_POST['author_id'];
		$content = $_POST['content'];

		$query = "SELECT user_id FROM users WHERE user_id = '" . $author . "'";

		$result;

		if($result = $connection->query($query))
		{
			if(empty($result->fetch_all()))
			{
				echo '<h3 style="color:red">ERROR: The author id "' . $author . '" does not exist.</h3>';
			}
			else if($connection->query("INSERT INTO posts (content, author_id) VALUES ('$content', '$author')") === true)
			{
				echo '<h3 style="color:green;">Post succesful!</h3>';
			}
			else
			{
				echo '<h3 style="color:red;">Post unsuccesful :(</h3> ';
			}
		}
		else
		{
			echo '<h3 style="color:red">ERROR: The author id "' . $author . '" does not exist.</h3>';
		}

		$connection->close();
		?>
		<button class="btn btn-primary" onclick="window.location.href='/~jmccain/EECS448/Lab_05/CreatePost.html'">back</button>
</div>
</body>
</html>
