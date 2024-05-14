function fetchMeteo(location) {
    // TODO: include XMR version as polyfill
    let apiData = fetch(buildURL(location.lat,location.lon))
    return apiData  
}

function fetchMeteoXHR(location) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            console.log(JSON.parse(xhttp.responseText))
        }
    };
    xhttp.open("GET", buildURL(), true);
    xhttp.send();
}

function buildURL(lat,lon) {
    // URL para trabajr todos con ella
    const url = `https://api.open-meteo.com/v1/forecast?latitude=${lat}&longitude=${lon}&current=temperature_2m,relative_humidity_2m,is_day,precipitation,weather_code,surface_pressure,wind_speed_10m,wind_direction_10m&hourly=temperature_2m,weather_code,wind_direction_10m,is_day&daily=weather_code,temperature_2m_max,temperature_2m_min,sunrise,sunset`
    // console.log(url)
    // let params = new URLSearchParams()
    // params.append("latitude", lat)
    // params.append("longitude", lon)
    // params.append("current",[
    //     "temperature_2m",
    //     "relative_humidity_2m",
    //     "is_day,precipitation",
    //     "weather_code",
    //     "surface_pressure",
    //     "wind_speed_10m",
    //     "wind_direction_10"].join(','))
    // params.append("hourly", [
    //     "temperature_2m",
    //     "weather_code",
    //     "wind_direction_10m",
    //     "is_day"])
    // params.append("daily", [
    //     "weather_code",
    //     "temperature_2m_max",
    //     "temperature_2m_min",
    //     "sunrise",
    //     "sunset"].join(','))

    // let url = 'https://api.open-meteo.com/v1/forecast?' + params
    // console.log(url)
    // url = url.replace(",","%2C")
    // console.log(url)
    return url
}

export { fetchMeteo }