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

    $newUser = $_POST['author_id'];
    /*
    if($connection->query("INSERT INTO users (user_id) VALUES ('" . $newUser . "')") === true)
    {
      echo '<h3>New user ' . $newUser . ' created</h3>';
    }
    else
    {
      echo 'ERROR: The user id "' + $newUser + '" is already taken.';
    }
    */

    $connection->close();
    ?>
</div>
</body>
</html>
