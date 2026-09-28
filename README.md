# 🌤️ Weather App

A simple and user-friendly **Weather Web Application** that allows users to search for the current weather information of any city. The application fetches real-time weather data through an API and displays useful information such as temperature, humidity, wind speed, air quality, and more.

The project is developed using **HTML, CSS, JavaScript, and PHP**, with API and database integration. It also uses **Local Storage** to remember recently searched cities and improve the user experience.

## 🔗 Project Links

### 🌐 Live Website

https://sapanachaudharyweatherapp.infinityfreeapp.com/prototype2/?i=1

### 🎥 Working Video Demo

https://youtu.be/lW3tECX0Y04

---

## 📖 Introduction

This Weather App provides users with quick access to current weather information for any city they enter.

When a user enters a city name, the application sends a request through the backend to retrieve weather information from an external API. The received information is then displayed on the website in an easy-to-understand format.

The application is useful for:

* Daily weather checking
* Travel and trip planning
* Tourists
* Checking changing weather conditions
* Quickly viewing weather information for different cities

---

## ✨ Features

### 🌡️ Weather Information

The application provides weather information such as:

* Temperature
* Humidity
* Wind speed
* Air quality
* Other available weather information

### 🔍 City Search

Users can enter the name of a city and retrieve its current weather information.

### 💾 Local Storage

The updated version includes **browser Local Storage**.

It allows the application to:

* Remember previously searched cities
* Display recent searches
* Avoid repeatedly typing the same city
* Make the application more user-friendly
* Reduce unnecessary API requests
* Improve loading speed

The saved city information is stored directly in the user's browser.

---

## 🏗️ System Architecture

The application demonstrates how a frontend, backend, API, and database can work together.

```text
                    ┌──────────────────┐
                    │      User        │
                    └────────┬─────────┘
                             │
                             ▼
                    ┌──────────────────┐
                    │    Frontend      │
                    │ HTML/CSS/JS      │
                    └────────┬─────────┘
                             │
                             ▼
                    ┌──────────────────┐
                    │      PHP         │
                    │     Backend      │
                    └────────┬─────────┘
                             │
                 ┌───────────┴───────────┐
                 ▼                       ▼
        ┌─────────────────┐     ┌─────────────────┐
        │ Weather API     │     │    Database     │
        │ Real-time Data  │     │ Data Storage    │
        └────────┬────────┘     └─────────────────┘
                 │
                 ▼
        ┌─────────────────┐
        │ Weather Results │
        └────────┬────────┘
                 │
                 ▼
        ┌─────────────────┐
        │      User       │
        └─────────────────┘
```

---

## 🛠️ Technologies Used

| Technology    | Purpose                                        |
| ------------- | ---------------------------------------------- |
| HTML          | Website structure                              |
| CSS           | Styling and layout                             |
| JavaScript    | User interaction and API-related functionality |
| PHP           | Backend processing and API/database connection |
| Weather API   | Fetching real-time weather information         |
| Database      | Storing application data                       |
| Local Storage | Saving recently searched cities                |

The report describes PHP as the middle layer connecting the API and database and notes the use of prepared statements for improved security.

---

## 💾 Local Storage

Local Storage was added in the updated version of the application.

Previously, users needed to type the same city name repeatedly. Now, searched cities can be saved in the browser and displayed as recent searches.

### Example

```text
User searches:
Kathmandu
        ↓
Weather information displayed
        ↓
Kathmandu saved in Local Storage
        ↓
User can access Kathmandu from recent searches
```

This improves usability and can reduce unnecessary API calls.

---

## 🔄 How the System Works

1. The user opens the Weather App.
2. The user enters a city name.
3. JavaScript processes the user's input.
4. The request is sent through the backend.
5. PHP communicates with the weather API.
6. The API returns the current weather information.
7. The backend processes the response.
8. The weather information is displayed on the frontend.
9. The searched city can be saved in Local Storage.
10. Previously searched cities can be accessed again from recent searches.

---

## 🔐 Security

The backend uses **prepared statements in PHP**, which helps protect database operations against SQL injection.

---

## ✅ Strengths

* Clear separation between frontend and backend
* Simple and user-friendly interface
* Real-time weather information
* API integration
* Database integration
* PHP backend processing
* Prepared statements for safer database operations
* Local Storage for recent searches
* Modular structure
* Can be expanded to support additional cities and APIs
* Can potentially be scaled using backend and cloud services

---

## ⚠️ Limitations

* Limited error handling when the API fails
* Database optimization can be improved
* Frontend responsiveness can be further improved
* Loading indicators could be added
* Managing real-time data from multiple sources can be challenging
* Weather information may sometimes be delayed or inconsistent
* Internet connection is required
* The application depends on third-party APIs
* Changes to third-party API rules or pricing could affect the application

---

## 🚀 Future Improvements

Possible future improvements include:

* Better API error handling
* Improved responsive design
* Loading animations and indicators
* Better database optimization
* Support for multiple weather APIs
* Improved offline functionality
* More detailed weather information
* Weather notifications
* Additional user-friendly features

---

## 📸 Project Preview

Add screenshots of the application here.

```text
/screenshots
    ├── home-page.png
    ├── weather-result.png
    └── recent-searches.png
```

Example:

```markdown
![Weather App Home Page](screenshots/home-page.png)
```

---

## 🎥 Demo

Watch the working demonstration of the project:

https://youtu.be/lW3tECX0Y04

---

## 🌐 Live Demo

Visit the deployed Weather App:

https://sapanachaudharyweatherapp.infinityfreeapp.com/prototype2/?i=1

---

## 📌 Project Summary

This project demonstrates the development of a simple weather web application using frontend technologies, PHP backend processing, API integration, database connectivity, and browser Local Storage.

The main goal is to provide users with quick and convenient access to weather information while demonstrating how different web technologies can work together in a complete web application.




