import { getFavorites } from "./favorites.js";

let loggedIn = false

function checkLogin() {
    console.log("Checking session...")
    const formData = new URLSearchParams();
    formData.append('checkLogin', true);

    const options = {
        method: 'POST',
        body: formData
    };

    fetch("./login.php", options)
        .then((response) => {
            return response.text()
        })
        .then((data) => {
            console.log(data)
            if (data != "-1") {
                loggedIn = true
                document.querySelector(".boton-login").style = "background-color:orange ;"
                document.querySelector(".user-menu button").disabled = false
                document.querySelector(".user-menu button").innerHTML = data
                document.querySelector('.upload-photo-button').style.display = "block"
                document.querySelector('.show-photo-button').style.display = "block"
                return true
            }
            else {
                loggedIn = false
                document.querySelector(".boton-login").style = "background-color:lightblue ;"
                document.querySelector(".user-menu button").disabled = true
                document.querySelector(".user-menu button").innerHTML = ""
                document.querySelector('.upload-photo-button').style.display = "none"
                document.querySelector('.show-photo-button').style.display = "none"
                return false
            }
        })
        .then((result) => {
            if (result) {
                getFavorites()
                // getPhotos()
            }
        })
        .catch((error) => { console.log(error) })
}

function requestLogin(event) {
    console.log("logging in...")
    // event.preventDefault()
    let user = document.querySelector('form input[name="user"]').value
    let password = document.querySelector('form input[name="password"]').value
    const formData = new URLSearchParams();
    formData.append('user', user);
    formData.append('password', password);
    formData.append('login', true);
    // console.log(user, ",", password)
    const options = {
        method: 'POST',
        body: formData
    };

    fetch("./login.php", options)
        .then((response) => {
            return response.text()
        })
        .then((data) => {
            console.log(data)
            if (data == "1") {
                checkLogin()
            }
            $('#loginModal').modal('hide')

        })
        .catch((error) => { console.log(error) })
}

function requestLogout() {
    console.log("logging out...")
    const formData = new URLSearchParams();
    formData.append('logout', true);

    const options = {
        method: 'POST',
        body: formData
    };

    fetch("./login.php", options)
        .then((response) => {
            return response.text()
        })
        .then((data) => {
            console.log(data)
            checkLogin()
        })
        .catch((error) => { console.log(error) })
}

export { requestLogin, requestLogout, checkLogin, loggedIn }