function displayResults(results){
	let JSresponse = JSON.parse(results);
	console.log(JSresponse);
	console.log(JSresponse.results[0].title);

	// clear 
	let displayMovie = document.querySelector(".display-movie");
	while( displayMovie.hasChildNodes() ){
		displayMovie.removeChild(displayMovie.lastChild);
	}

	document.querySelector("#total-num-results").innerHTML = JSresponse.total_results;
	document.querySelector("#num-results").innerHTML = JSresponse.results.length;

	for (let i = 0; i < JSresponse.results.length; i++) {

		let entireContainer = document.createElement("div");
		entireContainer.classList.add("col", "col-6", "col-md-4", "col-lg-3", "movie");

		let posterContainer = document.createElement("div");
		posterContainer.classList.add("poster");

		let descriptionContainer = document.createElement("div");
		descriptionContainer.classList.add("description");

		// create image 
		let imgElement = document.createElement("img");
		// base image path
		let imgUrl = "https://image.tmdb.org/t/p/w500";
		// checks if image is avaiable
		if (JSresponse.results[i].poster_path != null) {
			// append poster path
			imgElement.src = imgUrl + JSresponse.results[i].poster_path;
		}
		else{
			imgElement.src = "images/no-image.png";
		}

		// add rating
		let ratingElement = document.createElement("p");
		ratingElement.innerHTML = "Rating: " + JSresponse.results[i].vote_average;
		

		// add num of voters
		let voteCountElement = document.createElement("p");
		voteCountElement.innerHTML = "Voters: " + JSresponse.results[i].vote_count;
		

		// add synposis
		let synopsisElement = document.createElement("p");
		// add "..." if greater than 200 characters
		if(JSresponse.results[i].overview.length <= 200) {
			synopsisElement.innerHTML = JSresponse.results[i].overview;
		}
		else{
			synopsisElement.innerHTML = JSresponse.results[i].overview.substring(0, 200) + '...';	
		}
		
		// title
		let titleElement = document.createElement("p");
		titleElement.innerHTML = JSresponse.results[i].title;
		

		// release date
		let releaseElement = document.createElement("p");
		releaseElement.innerHTML = JSresponse.results[i].release_date;
		

		// add respective clases to newly created element
		ratingElement.classList.add("rating");
		voteCountElement.classList.add("num-voters");
		synopsisElement.classList.add("synopsis");
		titleElement.classList.add("movie-title");
		releaseElement.classList.add("release-date");

		// append rating, count, and synposis under description
		descriptionContainer.appendChild(ratingElement);
		descriptionContainer.appendChild(voteCountElement);
		descriptionContainer.appendChild(synopsisElement);

		// append image and description under picture container
		posterContainer.appendChild(imgElement);
		posterContainer.appendChild(descriptionContainer);

		// append poster, title, and release date under entire movie container
		entireContainer.appendChild(posterContainer);
		entireContainer.appendChild(titleElement);
		entireContainer.appendChild(releaseElement);

		document.querySelector(".display-movie").appendChild(entireContainer);
	}
}


// ajax function
function ajax(url, returnFunction){
	// create request
	let httpRequest = new XMLHttpRequest();
	httpRequest.open("GET", url);
	httpRequest.send();

	httpRequest.onreadystatechange = function(){
		// check if successful request
		if(httpRequest.readyState == 4){
			if(httpRequest.status == 200){
				returnFunction(httpRequest.responseText);
			}
			else {
				// print error status
				console.log(httpRequest.status);
			}
		}
	}
}

document.querySelector("#search-form").onsubmit = function(event){
	event.preventDefault();

	// grabs user input
	let searchTerm = document.querySelector("#search-id").value.trim();
	
	let url = "https://api.themoviedb.org/3/search/movie?api_key=6b25a4386ae32e4baa62ae2540b1462c&query=" + searchTerm;
	ajax(url, displayResults);
}

// shows now playing when page is first loaded
function loadPage(){
	let url = "https://api.themoviedb.org/3/movie/now_playing?api_key=6b25a4386ae32e4baa62ae2540b1462c&language=en-US&page=1";
	ajax(url, displayResults);
}

loadPage();

