<?php
	require("config/config.php");

	// var_dump($_POST);
	$isUpdated = false;
	
	if(!isset($_POST["title"]) || empty($_POST["title"])){
		$error = "Please fill out all required fields";
	}
	else{
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
		$release = $_POST["release_date"];
	}
	else{
		$release = "null";
	}

	// user has chosen an award
	if(isset($_POST['award']) && !empty($_POST['award'])){
		$award_input = $_POST["award"];
	}
	else{
		$award_input = "null";
	}

	// user has chosen a label
	if(isset($_POST['label']) && !empty($_POST['label'])){
		$label_id = $_POST["label"];
	}
	else{
		$label_id = "null";
	}
	// user has chosen a sound
	if(isset($_POST['sound']) && !empty($_POST['sound'])){
		$sound_id = $_POST["sound"];
	}
	else{
		$sound_id = "null";
	}

	// user has chosen a genre
	if(isset($_POST['genre']) && !empty($_POST['genre'])){
		$genre_id = $_POST["genre"];
	}
	else{
		$genre_id = "null";
	}

	// user has chosen a rating
	if(isset($_POST['rating']) && !empty($_POST['rating'])){
		$rating_id = $_POST["rating"];
	}
	else{
		$rating_id = "null";
	}

	// user has chosen a format
	if(isset($_POST['format']) && !empty($_POST['format'])){
		$format_id = $_POST["format"];
	}
	else{
		$format_id = "null";
	}

	// quotations
	$dvd_title = $mysqli->real_escape_string($_POST["title"]);

	// $sql = "UPDATE dvd_titles
	// SET title = '" . $_POST["title"] . "',
	// release_date = " . $release . ",
	// label_id = " . $label_id . ",
	// sound_id = " . $sound_id . ",
	// genre_id = " . $genre_id . ",
	// rating_id = " . $rating_id . ",
	// format_id = " . $format_id . ",
	// award = " . $award_input . "
	// WHERE dvd_title_id = " . $_POST["dvd_title_id"] . ";";

	// echo "<hr>" . $sql . "<hr>";

	// Using prepared statements
	$statement = $mysqli->prepare("UPDATE dvd_titles SET
	title = ?, 
	release_date  = ?, 
	label_id = ?, 
	sound_id = ?, 
	genre_id = ?, 
	rating_id = ?,
	format_id = ?, 
	award = ?
	WHERE dvd_title_id = ?");

	// bind parameters
	$statement->bind_param("ssiiiiisi", 
	$_POST["title"], 
	$release, 
	$label_id, 
	$sound_id, 
	$genre_id,
	$rating_id, 
	$format_id, 
	$award_input,
	$_POST["dvd_title_id"]);

	// execute 
	$executed = $statement->execute();
	if(!$executed){
		echo $mysqli->error;
	}

	if($statement->affected_rows == 1){
		$isUpdated = true;
	}

	$statement->close();

	$mysqli->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Confirmation | DVD Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
		<li class="breadcrumb-item"><a href="search_results.php">Results</a></li>
		<li class="breadcrumb-item"><a href="details.php">Details</a></li>
		<li class="breadcrumb-item"><a href="edit_form.php">Edit</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Edit a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

			<?php if(isset($error) && !empty($error)): ?>
				<div class="text-danger font-italic">
					<?php echo $error; ?>
				</div>
			<?php endif; ?>
			
			<?php if($isUpdated) : ?>
				<div class="text-success"><span class="font-italic"><?php echo $_POST['title']; ?></span> was successfully edited.</div>
			<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="details.php?dvd_title_id=<?php echo $_POST['dvd_title_id']; ?>" role="button" class="btn btn-primary">Back to Details</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>