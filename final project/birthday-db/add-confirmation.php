<?php

    require '../config/config.php';
	echo "<link rel='stylesheet' href='style.css' />";
	echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous' />";

if ( !isset($_POST['input_name']) || empty($_POST['input_name']) 
	|| !isset($_POST['birthday']) || empty($_POST['birthday'])
	|| !isset($_POST['email']) || empty($_POST['email'])) {

	// Missing required fields.
	$error = "Please fill out all required fields.";

} 
else {
	// All required fields provided.


	// DB Connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

    // age
	if ( isset($_POST['age']) && !empty($_POST['age']) ) {
		// User entered an age
		$age = $_POST['age'];
	} else {
		// User did enter age
		$age = "null";
	}

    // address
	if ( isset($_POST['address']) && !empty($_POST['address']) ) {
		// User entered an address
		$address = "" . $_POST['address'] . "";
	} else {
		// User did not enter age
		$address= "null";
	}

    // phone number
	if ( isset($_POST['phone_number']) && !empty($_POST['phone_number']) ) {
		// User entered a phone number
		$phone_number = "" . $_POST['phone_number'] . "";
	} else {
		// User did not enter a phone number
		$phone_number = "null";
    }	
    
    // favorite food
    if ( isset($_POST['favorite_food']) && !empty($_POST['favorite_food']) ) {
		// User entered a favorite food
		$favorite_food = "" . $_POST['favorite_food'] . "";
	} else {
		// User did not enter a favorite food
		$favorite_food = "null";
    }	

    // favorite color
    if ( isset($_POST['favorite_color']) && !empty($_POST['favorite_color']) ) {
		// User selected album value.
		$favorite_color_id = $_POST['favorite_color'];
	} else {
		// User did not select album value.
		$favorite_color_id = "null";
    }
    
    // gift entry
    if ( isset($_POST['gift_idea']) && !empty($_POST['gift_idea']) ) {
		// User selected album value.
		$gift_idea_id = $_POST['gift_idea'];
	} else {
		// User did not select album value.
		$gift_idea_id = "null";
    }

    // birthstone
    if ( isset($_POST['birthstone']) && !empty($_POST['birthstone']) ) {
		// User selected album value.
		$birthstone_id = $_POST['birthstone'];
	} else {
		// User did not select album value.
		$birthstone_id = "null";
	}
    

    $input_name = $_POST["input_name"];
    $birthday = $_POST["birthday"];
    $email = $_POST["email"];

    $statement = $mysqli->prepare("INSERT INTO birthdays(name, birthday, age, address, email, phone_number, favorite_food, favorite_color_id, gift_idea_id, birthstone_id)
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $statement->bind_param("ssissssiii",
    $input_name,
    $birthday,
    $age,
    $address,
    $email,
    $phone_number,
    $favorite_food,
    $favorite_color_id,
    $gift_idea_id,
    $birthstone_id);

    $executed = $statement->execute();
    if(!$executed){
        echo $mysqli->error;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel ="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>Add Confirmation</title>
    <style>
        .container {
            text-align: center;
		}
		a {
			font-family: 'Poppins', sans-serif;
		}
		




    </style>
	
<body>
    <nav class="navbar navbar-expand-lg navbar-light" >
        <a class="navbar-brand" href="home-page.php">Birthday Reminder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="home-page.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link active" href="add-info.php">Add Info</a>
            <a class="nav-link" href="view-records.php">View Records</a>
            <a class="nav-link" href="login.php">Login</a>
        </div>
        </div>
    </nav>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">You have added a friend!</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">

	<?php if ( isset($error) && !empty($error) ) : ?>

		<div class="text-danger">
			<?php echo $error; ?>
		</div>

	<?php else : ?>

		<div class="text-success">
			<span class="font-italic"><?php echo $_POST['input_name']; ?></span> was successfully added!
		</div>

	<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="add-info.php" role="button" class="btn btn-primary">Add Another Person</a>
				<a href="view-records.php" role="button" class="btn btn-primary">Search Friends</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>