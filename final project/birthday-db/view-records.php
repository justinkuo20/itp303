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

	$mysqli->close();
?> 


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>View Birthday's</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel ="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<style>
		.form-group {
			text-align: center;
	
		}
		form {
			margin-left: auto;
			margin-right: auto;
		}

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
		h2 {
			font-family: 'Poppins', sans-serif;
		}
		label {
			font-family: 'Poppins', sans-serif;
		}
		button {
			font-family: 'Poppins', sans-serif;
		}
		a {
			font-family: 'Poppins', sans-serif;
		}

		form{
  			display: block;
  			width: %;
		}

		button{
		position: relative;
		
		&:before {
			content: '';
			position: absolute;
			right: 16px;
			top: 50%;
			margin-top: -12px;
			width: 24px;
			height: 24px;
			border: 2px solid;
			border-left-color: transparent;
			border-right-color: transparent;
			border-radius: 50%;
			opacity: 0;
			transition: opacity 0.5s;
			animation: 0.8s linear infinite rotate;
		}
		&.sending{
			pointer-events: none;
			cursor: not-allowed;
			
			&:before {
			transition-delay: 0.5s;
			transition-duration: 1s;
			opacity: 1;
			}
		}
		}

		@keyframes rotate {
		0% {
			transform: rotate(0deg);
		}
		100% {
			transform: rotate(360deg);
		}
		}
		
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #7FBEEB;">
		<a class="navbar-brand" href="home-page.php">Birthday Reminder</a>
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
			<h1 class="display-1">View Birthdays</h1>
			<h2 class="display-9">Search based on name</h2>
		</div>
	</div>

		<form name ="myForm" id="form" action="search-results.php" method="GET">

			<div class="form row">
		  		<label for="name" class="col-sm-4 col-form-label text-sm-right">Name: 
				<span class="text-danger">*</span>
				</label>
		   		<div class="col-sm-5">
		      <input type="text" class="form-control" id="inputName" placeholder="Name" name="inputName">
			 	 <div class="error">Error message</div>
		    	</div>
		  	</div>

			<div class="form-group row ">
    			<div class="col-sm-12">
      				<button type="submit" class="btn btn-primary">Search</button>
    			</div>
  			</div>

		</form>
	</div> <!-- .container -->
	<script>
		
			document.querySelector("#form").onsubmit = function (event){
			// by default, forms are going to try to submit itself. we aer going to prevent the form from being submitted so we can do validataion checks
			event.preventDefault();
			console.log("onsubmit!!!");
			
			let nameInput = document.querySelector("#inputName").value;

			// .trim removes any leading or trailing whitespace
			if(nameInput.trim().length == 0) {
				console.log("name is empty!!");

				// show the error message
				document.querySelector("#inputName").nextElementSibling.style.visibility = "visible";
				document.querySelector("#inputName").nextElementSibling.innerHTML = "Name cannot be empty";

			}
			else {
				console.log("name is good!");
				
				
				
				// hide the error message
				document.querySelector("#inputName").nextElementSibling.style.visibility = "hidden";

				

				document.myForm.submit();
			}
		}
	</script>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>