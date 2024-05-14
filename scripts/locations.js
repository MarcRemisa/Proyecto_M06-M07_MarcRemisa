function fetchLocation(location) {
    let apiData = fetch('https://geocoding-api.open-meteo.com/v1/search?' + new URLSearchParams({
        "name": location,
        "count": 10,
        "language": "en",
        "format": "json"
    }))
    return apiData
}

function reverseGeocoding(lat,lon){
    let apiData = fetch('http://api.openweathermap.org/geo/1.0/reverse?' + new URLSearchParams({
        "lat": lat,
        "lon": lon,
        "limit": 1,
        "appid": "1159a738a336bcc37eca65bc1acc4f11"
    }))
    return apiData
}

const defaultLocation = {
    "lat": 41.3888,
    "lon": 2.159,
    "name": "Barcelona, Catalonia, Spain",
    "isFavorite": true
}

export { fetchLocation, defaultLocation, reverseGeocoding }