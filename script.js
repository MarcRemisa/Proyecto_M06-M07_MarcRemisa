import { fetchLocation, defaultLocation, reverseGeocoding } from "./scripts/locations.js"
import { fetchMeteo } from "./scripts/meteoApi.js"
import { updateDashboard, updateSuggestions, setUserDashboard } from "./scripts/dashboards.js"
import { requestLogin, requestLogout, checkLogin, loggedIn } from "./scripts/login.js"
import { addFavorite, requestUploadPhoto, refreshPhotos } from "./scripts/favorites.js"

let targetLocation = null

window.onload = () => {
    // Add event listeners
    document.querySelector("#searchLocation").addEventListener("input", refreshSuggestions)
    document.querySelector('.search-button').addEventListener('click', searchLocation)
    document.querySelector('.button-login').addEventListener('click', requestLogin)
    document.querySelector('.boton-logout').addEventListener('click', requestLogout)
    document.querySelector('.current-location-button').addEventListener('click', getCurrentLocation)
    document.querySelector('.add-favorite-button').addEventListener('click', addFavoriteButton)
    document.querySelector('#uploadPhotoModal').addEventListener('show.bs.modal',uploadPhotoModalShow)
    document.querySelector('.button-upload-photo').addEventListener('click', requestUploadPhoto)
    document.querySelector('.show-photo-button').addEventListener('click', showOffcanvas)

    //Load default data
    let result = setUserDashboard()

    targetLocation = defaultLocation
    setInterval(refreshDashboard(targetLocation), 5000)
}

function showOffcanvas(event){
    event.preventDefault() 

    refreshPhotos(targetLocation)

    let offCanvas = new bootstrap.Offcanvas(document.querySelector('#offcanvasExample'))
    document.querySelector('#offcanvas-location').innerHTML = targetLocation.name
    document.querySelector('#offcanvas-lat').innerHTML = targetLocation.lat
    document.querySelector('#offcanvas-lon').innerHTML = targetLocation.lon
    offCanvas.show()

}

function uploadPhotoModalShow(){
    document.querySelector('#photoLocation').value = targetLocation.name
}

function addFavoriteButton() {
    let favorite = {
        "name": targetLocation.name,
        "lat": targetLocation.lat,
        "lon": targetLocation.lon
    }
    addFavorite(favorite)
}

function searchLocation() {
    let options = Array.from(document.querySelectorAll("#suggestions option"))
    let searchInput = document.querySelector("#searchLocation")

    let newLocation = {}
    for (let option of options) {
        if (option.value == searchInput.value) {
            newLocation.lon = option.getAttribute("lon")
            newLocation.lat = option.getAttribute("lat")
            newLocation.name = searchInput.value
        }
    }
    console.log(newLocation)
    targetLocation = newLocation
    refreshDashboard(targetLocation)
}

function getCurrentLocation() {
    navigator.geolocation.getCurrentPosition((position) => {
        let newLocation = {}
        newLocation.lon = position.coords.longitude
        newLocation.lat = position.coords.latitude
        // Reverse geocoding
        reverseGeocoding(newLocation.lat, newLocation.lon)
            .then(response => response.json())
            .then(data => {
                newLocation.name = data[0]["name"] + " (browser geolocation)"
                targetLocation = newLocation
                refreshDashboard(targetLocation)
            })
        newLocation.name = ""
        newLocation.isFavorite = false
        targetLocation = newLocation
        refreshDashboard(targetLocation)
    })
}

function refreshSuggestions(e) {
    console.log(e.target.value)
    if (e.target.value != "" & e.target.value.length > 1 & e.target.value.length < 8) {
        setTimeout((() => {
            fetchLocation(e.target.value)
                .then(response => response.json())
                .then(data => {
                    updateSuggestions(data["results"])
                })
                .catch((error) => console.log(error))
        }), 250)
    }
}

function refreshDashboard(location) {
    fetchMeteo(location)
        .then(response => response.json())
        .then(((data) => {
            // console.log(data)
            updateDashboard(data, location)
        }))
        .catch((error) => console.log(error)
        )
}

