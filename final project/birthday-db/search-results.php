<?php
	require '../config/config.php';
	echo "<link rel='stylesheet' href='style.css' />";
	echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous' />";


	if ( !isset($_GET['inputName']) || empty($_GET['inputName'])) {
		// Missing required fields.
		$error = "Please fill out all required fields.";

	}	 	
	else {
		// DB Connection
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ( $mysqli->connect_errno ) {
			echo $mysqli->connect_error;
			exit();
		}

		$mysqli->set_charset('utf8');

		$sql = "SELECT name, birthday, age, address, email, phone_number, favorite_food, favorite_color.color, gift_idea.gift_idea, birthstone.birthstone 
			FROM birthdays
			LEFT JOIN favorite_color
				ON birthdays.favorite_color_id = favorite_color.id
			LEFT JOIN birthstone
				ON birthdays.birthstone_id = birthstone.id
			LEFT JOIN gift_idea
				ON birthdays.gift_idea_id = gift_idea.id
			WHERE name LIKE '%" . $_GET['inputName'] . "%' AND name IS NOT NULL";

		

		
		$results = $mysqli->query($sql);

		if($results == false){
			echo $mysqli->error;
			exit();
		}

		$row = $results->fetch_assoc();
		

		$mysqli->close();
	}
?> 


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Birthday Reminders</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel ="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<title>Search Results</title>

	<style>
		.card {
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			font-family: 'Poppins', sans-serif;
		}

		a {
			margin-left: auto;
			margin-right: auto;
		}
		h1 {
			font-family: 'Poppins', sans-serif;
		}
		a {
			font-family: 'Poppins', sans-serif;
		}
		h2 {
			color: gray;
		}
		.box {
			width: 500px;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
		}

		.box .overlay {
			background-color: rgba(0, 0, 0, 0.6);
			color: #FFF;
			position: absolute;
			top: 0px;
			left: 0px;
			right: 0px;
			bottom: 0px;

			/* by default, hide the overlay. When using transition to hide/show any element, 
			use opacity*/
			opacity: 0;
			transition: opacity 1s 0s;
		}
		.box:hover .overlay {
			opacity: 1;
		}

	

	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #7FBEEB;">
		<a class="navbar-brand" href="home-page.html">Birthday Reminder</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-link" href="home-page.php">Home <span class="sr-only">(current)</span></a>
			<a class="nav-link" href="add-info.php">Add Info</a>
			<a class="nav-link active" href="view-records.php">View Records</a>
		</div>
		</div>
	</nav>


	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-1">
				<?php 
					echo $_GET['inputName'] . "'s";
				?>
				Birthday</h1>
				<h2 class="display-9">
					<?php
						if($row != NULL){
							echo $row['birthday'];
						}
						
					?>
					
				</h2>
		</div>
	</div>


	<?php if ( isset($error) && !empty($error) ) : ?>

		<div class="text-danger">
			<?php echo $error; ?>
		</div>

		<?php else : ?>
		<div class="box">
			<div class="overlay"></div>
			<div class="card bg-light mb-3" style="max-width: 18rem;">
			
				<div class="card-header">
					<?php 
						if($row != NULL){
							echo $_GET["inputName"];
						}
						else {
							echo $_GET['inputName'] . " not found";
							echo "<br>";
							echo "<span class='text-danger'>Please Add User First!</span>";
						}	
						?>
				</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Birthday:
							<?php 
							if($row != NULL){
								echo $row["birthday"];
							}
							else {
								echo "N/A";
							}
							?>
						</li>
						<li class="list-group-item">
						<?php

							if($row != NULL){
								echo "Phone Number: ";
								echo $row['phone_number'];
							}
							else {
								echo "Phone Number: N/A";
							}
							
						?>
						</li>
						<li class="list-group-item">
							<?php 
								if($row != NULL){
									echo "Email: ";
									echo $row['email'];
								}
								else {
									echo "Email: N/A";
								}

							?>
						</li>
						<li class="list-group-item">	
							<?php 
								if($row != NULL){
									echo "Age: ";
									echo $row['age'];
								}
								else {
									echo "Age: N/A";
								}

							?>
						</li>

						<li class="list-group-item">	
							<?php 
								if($row != NULL){
									echo "Address: ";
									echo $row['address'];
								}
								else {
									echo "Address: N/A";
								}
								
							?>
						</li>

						<li class="list-group-item">	
							<?php 
								if($row == 'null'){
									echo "Favorite Food: ";
									echo $row['favorite_food'];
								}
								else {
									echo "Favorite Food: ";
								}
							?>
						</li>

						<li class="list-group-item">	
							<?php 
								if($row != NULL){
									echo "Favorite Color: ";
									echo $row['color'];
								}
								else {
									echo "Favorite Color: ";
								}
									
							?>
						</li>

						<li class="list-group-item">	
							<?php 
								if($row != NULL){
									echo "Birthstone: ";
									echo $row['birthstone'];
								}
								else {
									echo "Birthstone: ";
								}
								
							?>
						</li>
						<li class="list-group-item">	
							<?php 
								if($row != NULL){
									echo "Gift Ideas: ";
									echo $row['gift_idea'];
								}
								else {
									echo "Gift Ideas: ";
								}
							?>
						</li>
					</ul>
			</div>
		</div>

		
		<?php endif; ?>
		

	<div class="form-group row">
		<div class="col-sm-12">
			<a href="view-records.php" role="button" class="btn btn-primary">Back to Search</a>
			<a href="add-info.php" role="button" class="btn btn-warning">Add Info</a>
		</div> <!-- .col -->
	</div> <!-- .row -->

	
</body>
</html>
