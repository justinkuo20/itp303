<?php
	// var_dump($_POST);
	require "config/config.php";

	if(!isset($_POST['title']) || empty($_POST['title'])){
		$error = "Please fill out all required fields";
	}

	else {
		// 2. To connect to DB we need to make an instance of the built in mySQLi class
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		// check for errors
		// correct_errno will return error code if there is an error when attempting to connect to db
		if($mysqli->connect_errno){
			echo $mysqli->connect_error;
			// exit() terminates program
			exit();
		}

		// optional fields

		// user has chosen a release date
		if(isset($_POST['release_date']) && !empty($_POST['release_date'])){
			$release = "'" . $_POST["release_date"] . "'";
		}
		else{
			$release = "null";
		}

		// user has chosen an award
		if(isset($_POST['award']) && !empty($_POST['award'])){
			$award_input = "'" . $_POST["award"] . "'";
		}
		else{
			$award_input = "null";
		}

		// user has chosen a label
		if(isset($_POST['label_id']) && !empty($_POST['label_id'])){
			$label_id = $_POST["label_id"];
		}
		else{
			$label_id = "null";
		}
		// user has chosen a sound
		if(isset($_POST['sound_id']) && !empty($_POST['sound_id'])){
			$sound_id = $_POST["sound_id"];
		}
		else{
			$sound_id = "null";
		}

		// user has chosen a genre
		if(isset($_POST['genre_id']) && !empty($_POST['genre_id'])){
			$genre_id = $_POST["genre_id"];
		}
		else{
			$genre_id = "null";
		}

		// user has chosen a rating
		if(isset($_POST['rating_id']) && !empty($_POST['rating_id'])){
			$rating_id = $_POST["rating_id"];
		}
		else{
			$rating_id = "null";
		}

		// user has chosen a format
		if(isset($_POST['format_id']) && !empty($_POST['format_id'])){
			$format_id = $_POST["format_id"];
		}
		else{
			$format_id = "null";
		}

		// quotations
		$dvd_title = $mysqli->real_escape_string($_POST["title"]);
		
		// generate insert statement 
		// $sql = "INSERT INTO dvd_titles(title, release_date, award, label_id, sound_id, genre_id, rating_id, format_id)
		// VALUES('" . $dvd_title . "',"
		// . $release . ","
		// . $award_input . ","
		// . $label_id .","
		// . $sound_id . ","
		// . $genre_id . ","
		// . $rating_id . ","
		// . $format_id . ");";

		// echo "<hr>" . $sql . "<hr>";

		// using prepared statements
		$statement = $mysqli->prepare("INSERT INTO dvd_titles(title, release_date, award, label_id, sound_id, genre_id, rating_id, format_id)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?)");

		$statement->bind_param("sssiiiii",
		$dvd_title,
		$release,
		$award_input,
		$label_id,
		$sound_id,
		$genre_id,
		$rating_id,
		$format_id);

		$executed = $statement->execute();
		if(!$executed){
			echo $mysqli->error;
		}

		$statement->close();

		$results = $mysqli->query($sql);
		if(!$results){
			echo $mysqli->error;
			exit();
		}

		// echo "inserted: " . $mysqli->affected_rows;

		$mysqli->close();

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Confirmation | DVD Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="add_form.php">Add</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Add a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

				<!-- display error message -->
				<?php if(isset($error) && !empty($error)): ?>
					<div class="text-danger font-italic">
						<?php echo $error; ?>
					</div>	
				<?php endif;?>

				<div class="text-success"><span class="font-italic">Display Title Here</span> was successfully added.</div>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="add_form.php" role="button" class="btn btn-primary">Back to Add Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>