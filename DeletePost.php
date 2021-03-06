<!DOCTYPE html>
<html>
<head>
	<title>Lab_05 -- ADMIN: View User Posts</title>
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
		<h1>ADMIN: Delete Post</h1>
		<br>
		<br>
		<?php
		$connection = new mysqli('mysql.eecs.ku.edu', 'jmccain', 'ruffalo', 'jmccain');

		if ($connection->connect_error)
		{
				printf("Connect failed: %s\n", $connection->connect_error);
				exit();
		}

		$message = "<ul class='list-group'>";

		$posts = $_POST['delete'];

		$queryTemplate = "DELETE FROM posts WHERE post_id = '";

		foreach($posts as $post)
		{
			$query = $queryTemplate . $post . "';";
			if($connection->query($query))
			{
				$message = $message . "<li class='list-group-item'>Succesfully deleted post " . $post . "</li>";
			}
			else
			{
				$message = $message . "<li class='list-group-item'>Failed to delete post " . $post . "</li>";
			}
		}
		$message = $message . "</ul>";
		echo '<div class="material-card">' . $message . '</div>';
		?>
		<button class="btn btn-primary" onclick="window.location.href='DeletePost.html'">back</button>
	</div>
</body>
</html>
