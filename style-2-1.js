async function getWeather(city) {
    let data;

    if (navigator.onLine) {
        try {
            const url = "https://sapanachaudharyweatherapp.infinityfreeapp.com/prototype2/connection.php?q=" + encodeURIComponent(city);
            const response = await fetch(url);
            data = await response.json();
            localStorage.setItem(city, JSON.stringify(data));
        } catch (error) {
            console.error("Fetch error:", error);
            alert("Unable to retrieve data. Please check your connection or try again later.");
            return;
        }
    } else {
        try {
            data = JSON.parse(localStorage.getItem(city));
            if (!data) {
                console.log("No cached data");
                alert("No cached data available for this city.");
                return;
            }
        } catch (error) {
            alert("Error loading cached data.");
            return;
        }
    }

    // Safely parse numeric values
    const temp = parseFloat(data.main.temp);
    const humidity = parseInt(data.main.humidity);
    const pressure = parseInt(data.main.pressure);
    const windSpeed = parseFloat(data.wind.speed);
    const windDeg = parseInt(data.wind.deg);
    const timezoneOffset = parseInt(data.timezone);

    // Update UI
    document.getElementById("City").innerHTML = data.name;
    document.getElementById("Date").innerHTML = new Date().toLocaleDateString();
    document.getElementById("weatherCondition").innerHTML = data.weather[0].description;
    document.getElementById("temp").innerHTML = `Temperature: ${temp}°C`;
    document.getElementById("humid").innerHTML = `Humidity: ${humidity}%`;
    document.getElementById("pressure").innerHTML = `Pressure: ${pressure} hPa`;
    document.getElementById("windSpeed").innerHTML = `Wind Speed: ${windSpeed} km/h`;
    document.getElementById("windDirection").innerHTML = `Wind Direction: ${windDeg}°`;

    const iconUrl = `http://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
    document.getElementById("weatherIcon").innerHTML = `<img src="${iconUrl}" alt="icon">`;

    // Convert timezone offset to local time
    const currentUniversalTime = new Date().getTime();
    const localTime = new Date(currentUniversalTime + timezoneOffset * 1000);
    const options = {
        weekday: 'short',
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        timeZoneName: 'short',
    };
    const currentNewDate = localTime.toLocaleString('en-US', options);
    document.getElementById("todayDate").innerText = currentNewDate;
}

function search() {
    const inputWeather = document.getElementById("locationinput").value;
    if (inputWeather.trim() !== "") {
        getWeather(inputWeather);
    } else {
        alert("Please enter a city name.");
    }
}

// Default call
getWeather("Dhankuta");
