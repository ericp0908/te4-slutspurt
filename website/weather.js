let xhRequest = new XMLHttpRequest

xhRequest.onload = function () {

	// Process our return data
	if (xhRequest.status >= 200 && xhRequest.status < 300) {
		// This will run when the request is successful
        console.log('success!', xhRequest.response);
        updateWeatherBox(xhRequest.response);
	} else {
		// This will run when it's not
        console.log('The request failed!');
        alert("it dont works");
	}

	// This will run either way
	// All three of these are optional, depending on what you're trying to do
    console.log('This always runs...');
    
    // The second argument is the endpoint URL
}
xhRequest.open('GET', 'https://cors-anywhere.herokuapp.com/https://api.darksky.net/forecast/9b63cb6bdb5839d6c41c3f3f9a79336e/57.708870,11.974560?units=si');
xhRequest.send();

function updateWeatherBox(json) {
    let time = JSON.parse(json).currently.time;
    let timezone = JSON.parse(json).timezone;
    let weatherSummary = JSON.parse(json).currently.summary; 
    let currentTime = toDateTime(time);
    let temperature = JSON.parse(json).currently.temperature;
    let rainchance = JSON.parse(json).currently.precipProbability;
    
    

    let location = document.querySelector(".Location");
    let timeAndDate = document.querySelector(".TimeAndDate");
    let weather = document.querySelector(".weather");
    let temp = document.querySelector(".Temp");
    let rain = document.querySelector(".rain");
    

    location.innerText = "Timezone: \n"+timezone+"\n\n";
    timeAndDate.innerText = "Time & Date: \n"+currentTime+"\n\n";
    weather.innerText = "Weather in Gothenburg: \n"+weatherSummary+"\n\n";
    temp.innerText = "Temperature: \n"+temperature+"°C\n\n";
    rain.innerText = "Percipitation: \n"+rainchance+"%";
}
function toDateTime(sec){
    var t = new Date(1970, 0, 1);
    t.setSeconds(sec+7200);
    return t;
}

