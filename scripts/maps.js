// const weatherCodes = {
    // TBD: map WMO to weather_icons
// }

const current = [
    "temperature_2m",
    "relative_humidity_2m",
    // "weather_code",
    "surface_pressure",
    "wind_speed_10m",
    "time",
    "precipitation"
]

const hourly = [
    "temperature_2m",
]

const daily = [
    "sunrise",
    "sunset",
    "temperature_2m_max",
    "temperature_2m_min",
    "time"
]

const variables = {
    "current": current,
    "hourly": hourly,
    "daily": daily
}

const images_current = [
    "weather_code",
    // "wind_direction_10m",    
]

const images_hourly = [
    "weather_code",
    "wind_direction_10m",
]

const images_daily = [
    "weather_code"
]

const imageVariables = {
    "current": images_current,
    "hourly": images_hourly,
    "daily": images_daily
}

export {variables, imageVariables}