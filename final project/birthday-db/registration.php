<?php
	require '../config/config.php';
	echo "<link rel='stylesheet' href='style.css' />";
	echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous' />";
?> 


<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Birthday Reminder's</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel ="stylesheet" href="style.css">
	<style>
		.form-group {
			text-align: center;
		}



	</style>
	<title>Registration</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #7FBEEB;">
		<a class="navbar-brand" href="home-page.html">Birthday Reminder</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-link active" href="home-page.html">Home <span class="sr-only">(current)</span></a>
			<a class="nav-link" href="add-info.html">Add Info</a>
			<a class="nav-link" href="view-records.html">View Records</a>
			<a class="nav-link" href="login.html">Login</a>
		</div>
		</div>
	</nav>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-1">Registration</h1>
		</div>
	</div>

	<form action="registration_confirmation.html" method="POST">
		<div class="form-group row">
	    	<label for="emailInput" class="col-sm-4 col-form-label text-sm-right">Email address</label>
	    	<input type="email" class="form-control col-sm-5" id="exampleInputEmail1" aria-describedby="emailHelp">
	  	</div>

	 	 <div class="form-group row">
	    	<label for="passwordInput" class="col-sm-4 col-form-label text-sm-right">Password</label>
	    	<input type="password" class="form-control col-sm-5" id="exampleInputPassword1">
	  	</div>

	 	<div class="form-group row">
	  		<div class="col-sm-12">
	  			<button type="submit" class="btn btn-primary">Submit</button>
	  		</div>
		</div>

	</form>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>