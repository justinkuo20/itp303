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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel ="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<title>Birthday Reminder's</title>
	<style> 
		.card {
			text-align: center;
			margin-left: auto;
			margin-right: auto;
		}
		.example {
			text-align: center;
			color: gray;
			font-size: 20px;
			font-family: 'Poppins', sans-serif;

		}
		h1 {
			font-family: 'Poppins', sans-serif;
		}
		h2 {
			font-family: 'Poppins', sans-serif;
		}
		.card {
			font-family: 'Poppins', sans-serif;
		}
		a {
			font-family: 'Poppins', sans-serif;
		}
	
	
	
	</style>
	
	
</head>
<body id="bootstrap-overrides">
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #7FBEEB;">
		<a class="navbar-brand" href="home-page.php">Birthday Reminder</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-link active" href="home-page.php">Home <span class="sr-only">(current)</span></a>
			<a class="nav-link" href="add-info.php">Add Info</a>
			<a class="nav-link" href="view-records.php">View Records</a>
		</div>
		</div>
	</nav>

	<!-- title area -->
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-1">Birthday Reminder's</h1>
			<h2 class="display-9">Never Forget a Friend or Family Member's Birthday Again!</h2>
		</div>
	</div>
	
	<p class="example">Search a Friend and Their Info Will Display Like This!</p>
	<div class="card bg-light mb-3" style="max-width: 18rem;">
		<div class="card-header">Name</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Birthday: yyyy-mm-dd</li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Phone Number: (123) 456-7890</li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Email: birthdays@birthday.com</li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Age: 30</li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Address: 123 Main St. San Francisco, CA 94016 </li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Favorite Food: Ramen</li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Favorite Color: Blue</li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Birthstone: Diamond</li>
		</ul>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Gift Ideas: Technology</li>
		</ul>
	</div>








<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>