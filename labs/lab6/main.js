$.ajax({
	method: "GET",
	url: "https://api.weatherbit.io/v2.0/current",
	data: {
		city: "Los+Angeles, California",
		key: "169ade7068fa4db48eb280e56fe4fc17",
		units: "I"
	}
})

.done(function(results){
	console.log(results);
	$("#weather").html("Today's weather in " + results.data[0].city_name + ": " + results.data[0].temp + "°. " + 
		results.data[0].weather.description + "." + " Feels like " + results.data[0].app_temp + "°");
})
