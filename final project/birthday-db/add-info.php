<?php
	require '../config/config.php';
	echo "<link rel='stylesheet' href='style.css' />";
	echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous' />";

	// DB Connection
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');

	$sql_colors = "SELECT * FROM favorite_color;";
	$results_colors = $mysqli->query($sql_colors);
	if($results_colors == false){
		echo $mysqli->error;
		exit();
	}

	$sql_gift = "SELECT * FROM gift_idea;";
	$results_gift = $mysqli->query($sql_gift);
	if($results_gift == false){
		echo $mysqli->error;
		exit();
	}

	$sql_birthstone = "SELECT * FROM birthstone;";
	$results_birthstone = $mysqli->query($sql_birthstone);
	if($results_birthstone == false){
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();
	



?> 



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Add Birthday</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel ="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<style>
		.error {
			color: red;
			font-style: italic;
			margin-left: 10px;
			visibility: hidden;
			font-family: 'Poppins', sans-serif;
		}
		h1 {
			font-family: 'Poppins', sans-serif;
		}
		label {
			font-family: 'Poppins', sans-serif;
		}

		#info-break {
			font-family: 'Poppins', sans-serif;
		}
		button {
			font-family: 'Poppins', sans-serif;
		}
		a {
			font-family: 'Poppins', sans-serif;
		}
		p {
			font-size: 20px;
		}


	</style>
</head>
<body>
	<!-- navbar -->
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
		</div>
		</div>
	</nav>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-1">Add Information</h1>
		</div>
	</div>
<form id="form" name="myForm" action="add-confirmation.php" method="POST"> 

	<!-- first name -->
	<div class="form row">
		<label for="inputName" class="col-sm-4 col-form-label text-sm-right">Name: 
		<span class="text-danger">*</span>
		</label>
   		<div class="col-sm-5">
      <input type="text" class="form-control" id="inputName" placeholder="First Name Last Name" name="input_name">
	  	<div class="error">Error message</div>
    	</div>
  	</div>

  	<!-- birthday info -->
  	<div class="form row">
		<label for="date-id" class="col-sm-4 col-form-label text-sm-right">Birthday:
			<span class="text-danger">*</span>
		</label>
		<div class="col-sm-5">
			<input type="date" class="form-control mt-2" name="birthday" id="birthdayInput">
			<div class="error">Error message</div>
		</div> 
	</div>

	<!-- age input -->
	<div class="form row">
		<label for="inputAge" class="col-sm-4 col-form-label text-sm-right">Age: 
			<span class="text-danger">*</span>
		</label>
		
		<div class="col-sm-5">
			<input type="text" class="form-control" id="inputAge" placeholder="10" name="age">
			<div class="error">Error message</div>
		</div>
	</div>

	<!-- address input -->
	<div class="form row">
		<label for="inputAddress" class="col-sm-4 col-form-label text-sm-right">Address:
			<span class="text-danger">*</span>
		</label>
		
		<div class="col-sm-5">
			<input type="text" class="form-control" id="inputAddress" placeholder="123 West Side St. San Francisco, CA 12345" name="address">
			<div class="error">Error message</div>
		</div>
	</div>


  	<!-- email input -->
	<div class="form row">
    	<label for="inputEmail" class="col-sm-4 col-form-label text-sm-right">Email:
			<span class="text-danger">*</span>
		</label>
    	<div class="col-sm-5">
      		<input type="email" class="form-control" id="emailInput" placeholder="tommy@usc.edu" name="email">
			<div class="error">Error message</div>
    	</div>
	</div>

	<!-- phone number -->
	<div class="form row">
		<label for="inputNumber" class="col-sm-4 col-form-label text-sm-right">Phone Number:
			<span class="text-danger">*</span>
		</label>

		<div class="col-sm-5">
			<input type="text" class="form-control" id="inputNumber" placeholder="(123) 123-4567" name="phone_number">
			<div class="error">Error message</div>
		</div>
	</div>

	<hr></hr>
	<p id="info-break"> Interests </p>

	<!-- favorite food -->
	<div class="form-group row">
		<label for="inputFood" class="col-sm-4 col-form-label text-sm-right">Favorite Food:</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="inputFood" placeholder="Pizza" name="favorite_food">
		</div>
	</div>
	
	<!-- favorite color selection -->
	<div class="form-group row">
		<label for="favorite-color-id" class="col-sm-4 col-form-label text-sm-right">
			Favorite Color:
		</label>
		<div class="col-sm-5">
			<select name="favorite_color" id="favorite-color-id" class="form-control">
				<option value="" selected disabled>-- Select One --</option>

				<?php while( $row = $results_colors->fetch_assoc() ): ?>

					<option value="<?php echo $row['id']; ?>">
						<?php echo $row['color']; ?>
					</option>

				<?php endwhile; ?>

			</select>
		</div>
	</div> <!-- .form-group -->

	<!-- gift idea selection -->
	<div class="form-group row">
		<label for="gift-idea-id" class="col-sm-4 col-form-label text-sm-right">
			Gift Idea:
		</label>
		<div class="col-sm-5">
			<select name="gift_idea" id="gift_idea-id" class="form-control">
				<option value="" selected disabled>-- Select One --</option>

				<?php while( $row = $results_gift->fetch_assoc() ): ?>

					<option value="<?php echo $row['id']; ?>">
						<?php echo $row['gift_idea']; ?>
					</option>

				<?php endwhile; ?>

			</select>
		</div>
	</div> <!-- .form-group -->


	<!-- birthstone selection -->
	<div class="form-group row">
	<label for="birthstone-id" class="col-sm-4 col-form-label text-sm-right">
		Birthstone:
	</label>
	<div class="col-sm-5">
		<select name="birthstone" id="birthstone-id" class="form-control">
			<option value="" selected disabled>-- Select One --</option>

				<?php while( $row = $results_birthstone->fetch_assoc() ): ?>

					<option value="<?php echo $row['id']; ?>">
						<?php echo $row['birthstone']; ?>
					</option>

				<?php endwhile; ?>

			</select>
		</div>
	</div> <!-- .form-group -->

  
  <div class="form-group row">
    <div class="col-sm-12">
	  <button id="btn-click" type="submit" class="btn btn-primary">Submit</button>
	  <button type="reset" class="btn btn-light">Reset</button>
    </div>
  </div>

</form>

<script>

		
		
		document.querySelector("#form").onsubmit = function (event){
		
			// by default, forms are going to try to submit itself. we aer going to prevent the form from being submitted so we can do validataion checks
			event.preventDefault();
			console.log("onsubmit!!!");

			let nameInput = document.querySelector("#inputName").value;
			let birthdayInput = document.querySelector("#birthdayInput").value;
			let ageInput =  document.querySelector("#inputAge").value;
			let addressInput = document.querySelector("#inputAddress").value;
			let emailInput = document.querySelector("#emailInput").value;
			let numberInput = document.querySelector("#inputNumber").value;


			// .trim removes any leading or trailing whitespace
			if(nameInput.trim().length == 0 || birthdayInput.trim().length == 0 || emailInput.trim().length == 0
			|| ageInput.trim().length == 0 || addressInput.trim().length == 0 || numberInput.trim().length == 0) {

				if(nameInput.trim().length == 0){
					// show the error message
					document.querySelector("#inputName").nextElementSibling.style.visibility = "visible";
					document.querySelector("#inputName").nextElementSibling.innerHTML = "Name cannot be empty";
				
				}
				if(birthdayInput.trim().length == 0){
					document.querySelector("#birthdayInput").nextElementSibling.style.visibility = "visible";
					document.querySelector("#birthdayInput").nextElementSibling.innerHTML = "Birthday not entered";
				}
				if(emailInput.trim().length == 0){
					document.querySelector("#emailInput").nextElementSibling.style.visibility = "visible";
					document.querySelector("#emailInput").nextElementSibling.innerHTML = "Email not entered";
				}

				if(ageInput.trim().length == 0){
					document.querySelector("#inputAge").nextElementSibling.style.visibility = "visible";
					document.querySelector("#inputAge").nextElementSibling.innerHTML = "Age not entered";
				}
				if(addressInput.trim().length == 0){
					document.querySelector("#inputAddress").nextElementSibling.style.visibility = "visible";
					document.querySelector("#inputAddress").nextElementSibling.innerHTML = "Address not entered";
				}
				if(numberInput.trim().length == 0){
					document.querySelector("#inputNumber").nextElementSibling.style.visibility = "visible";
					document.querySelector("#inputNumber").nextElementSibling.innerHTML = "Phone Number not entered";
				}
			}
			else {
				console.log("name is good!");

				// hide the error message
				document.querySelector("#inputName").nextElementSibling.style.visibility = "hidden";
				document.querySelector("#birthdayInput").nextElementSibling.style.visibility = "hidden";
				document.querySelector("#emailInput").nextElementSibling.style.visibility = "hidden";
				document.querySelector("#inputAge").nextElementSibling.style.visibility = "hidden";
				document.querySelector("#inputAddress").nextElementSibling.style.visibility = "hidden";
				document.querySelector("#inputNumber").nextElementSibling.style.visibility = "hidden";

			

				document.myForm.submit();
			}
		}

</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>