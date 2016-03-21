<!DOCTYPE html>
<html>
<head>
	<title>Lab_05 -- McCain's Forum</title>
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
		<h1>McCain's Forum</h1>
		<h3><i>Let's talk about John.</i></h3>
		<br>
		<br>
		<?php
		$connection = new mysqli('mysql.eecs.ku.edu', 'jmccain', 'ruffalo', 'jmccain');

		if ($connection->connect_error)
		{
				printf("Connect failed: %s\n", $connection->connect_error);
				exit();
		}

		$author = $_POST['user'];

		$query = "SELECT * FROM posts";

		$result;

		if($result = $connection->query($query))
		{
			$posts = $result->fetch_all();
			if(empty($posts))
			{
				echo '<div class="material-card"><h3>There are no posts to show!</h3></div>';
			}
			else
			{
				foreach($posts as $post)
				{
					echo '<div class="material-card"><h5> post id: ' . $post[0] . '</h5>';
					echo '<h5> author: ' . $post[2] . '</h5>';
					echo '<p>' . $post[1] . '</p></div>';
				}
			}
		}

		$connection->close();
		?>
		<button class="btn btn-primary" onclick="window.location.href='index.html'">back</button>
</div>
</body>
</html>
