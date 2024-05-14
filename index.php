<!doctype html>

<html lang="es-ES" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Meteodaw</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" \
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" \ crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="theme-color" content="#712cf9">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="text-bg-dark bg-dark">
    <div class="main-container container-fluid p-3 d-flex flex-column justify-content-between">
        <header class="mb-2 d-flex flex-row align-items-center justify-content-between w-100 px-5 flex-wrap">
            <div class="page-logo d-flex flex-row align-items-center justify-content-between">
                <i class="page-icon bi bi-rainbow"></i>
                <!-- <h3 class="float-md-start mb-0">_METEODAW</h3> -->
                <h3 class="float-md-start mb-0">_METEODAW</h3>
            </div>
            <div class="d-flex">
                <input id="searchLocation" class="search-input form-control me-2 bg-dark bg-gradient" type="search"
                    placeholder="Search" aria-label="Search" list="suggestions" autocomplete="off">
                <datalist id="suggestions">
                </datalist>
                <button class="search-button btn btn-outline-secondary" type="submit">Search</button>
                <button class="current-location-button btn btn-outline-secondary mx-2" type="button">
                    <i class="geoloc-icon bi bi-crosshair"></i>
                </button>
            </div>
            <div class="d-flex flex-row gap-3 align-items-center">
                <button class="upload-photo-button btn btn-outline-secondary mx-2" type="button" data-bs-toggle="modal"
                    data-bs-target="#uploadPhotoModal">
                    <i class="bi bi-camera"></i>
                </button>
                <button class="show-photo-button btn btn-outline-secondary mx-2" type="button">
                    <i class="bi bi-eye"></i>
                </button>

                <div class="dropdown user-menu">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" disabled>
                    </button>
                    <ul class="favorites-list dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">El Cairo</a></li>
                        <li><a class="dropdown-item" href="#">Karnak</a></li>
                        <li><a class="dropdown-item" href="#">Giza</a></li> -->
                    </ul>
                </div>

                <button type="button" class="boton-login btn btn-info" data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                    <i class="bi bi-person"></i>
                </button>
                <button type="button" class="boton-logout btn btn-danger">
                    <i class="bi bi-person"></i>
                </button>
            </div>

        </header>
        <!-- WEATHER INFO CARDS -->
        <main class="h-100">
            <div class="row h-100 mt-3">
                <!-- LEFT SIDE CARDS -->
                <div class="col-12 col-md-3 d-flex flex-column row-gap-3 justify-content-start align-items-start">
                    <!-- Card Ara-->
                    <div class="card-ara card bg-dark bg-gradient">
                        <div class="card-body d-flex flex-column">
                            <span class="card-text-ara card-text">Ara</span>
                            <div class="d-flex flex-row justify-content-evenly align-items-center">
                                <span class="ph-current-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-current-weather_code card-img card-img-top" alt="...">
                            </div>
                            <span class="ph-current-description card-text-description-current card-text">--</span>
                            <hr>
                            <div class="d-flex flex-row justify-content-start align-items-center">
                                <i class="card-icon bi bi-calendar"></i>
                                <span class="ph-current-time card-text-data-current card-text">--</span>
                            </div>
                            <div class="d-flex flex-row justify-content-start align-items-center">
                                <i class="bi bi-geo-alt card-icon"></i>
                                <span class="ph-current-location card-text-lloc-current card-text w-75">--</span>
                                <button class="add-favorite-button btn btn-outline-secondary mx-2" type="button">
                                    <i class="geoloc-icon bi bi-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Card Previsió 5 dies-->
                    <div class="card-previsio-5dies card bg-dark bg-gradient">
                        <div class="card-body d-flex flex-column gap-3">
                            <div class="d-flex flex-row justify-content-evenly align-items-center">
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-daily-weather_code card-img card-img-top" alt="...">
                                <span class="ph-daily-temperature_2m_max card-text-temp-current card-text">--</span>
                                <span class="ph-daily-temperature_2m_min card-text-temp-current card-text">--</span>
                                <span class="ph-daily-time card-text-data-current card-text">--</span>
                                <!-- <span class="ph-daily-day card-text-dia card-text">--</span> -->
                            </div>
                            <div class="d-flex flex-row justify-content-evenly align-items-center">
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-daily-weather_code card-img card-img-top" alt="...">
                                <span class="ph-daily-temperature_2m_max card-text-temp-current card-text">--</span>
                                <span class="ph-daily-temperature_2m_min card-text-temp-current card-text">--</span>
                                <span class="ph-daily-time card-text-data-current card-text">--</span>
                                <!-- <span class="ph-daily-day card-text-dia card-text">--</span> -->
                            </div>
                            <div class="d-flex flex-row justify-content-evenly align-items-center">
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-daily-weather_code card-img card-img-top" alt="...">
                                <span class="ph-daily-temperature_2m_max card-text-temp-current card-text">--</span>
                                <span class="ph-daily-temperature_2m_min card-text-temp-current card-text">--</span>
                                <span class="ph-daily-time card-text-data-current card-text">--</span>
                                <!-- <span class="ph-daily-day card-text-dia card-text">--</span> -->
                            </div>
                            <div class="d-flex flex-row justify-content-evenly align-items-center">
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-daily-weather_code card-img card-img-top" alt="...">
                                <span class="ph-daily-temperature_2m_max card-text-temp-current card-text">--</span>
                                <span class="ph-daily-temperature_2m_min card-text-temp-current card-text">--</span>
                                <span class="ph-daily-time card-text-data-current card-text">--</span>
                                <!-- <span class="ph-daily-day card-text-dia card-text">--</span> -->
                            </div>
                            <div class="d-flex flex-row justify-content-evenly align-items-center">
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-daily-weather_code card-img card-img-top" alt="...">
                                <span class="ph-daily-temperature_2m_max card-text-temp-current card-text">--</span>
                                <span class="ph-daily-temperature_2m_min card-text-temp-current card-text">--</span>
                                <span class="ph-daily-time card-text-data-current card-text">--</span>
                                <!-- <span class="ph-daily-day card-text-dia card-text">--</span> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RIGHT SIDE CARDS -->
                <div class="col-12 col-md-9 d-flex flex-column justify-content-start align-items-center gap-4">
                    <!-- BRIEFING CARDS -->
                    <div
                        class="card-briefing container-fluid d-flex flex-row gap-2 flex-wrap justify-content-between w-100">
                        <!-- Card: Qualitat de l'aire -->
                        <div class="card-qualitat-aire card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <span class="card-text-titol card-text">Qualitat de l'aire</span>
                                    <span class="badge rounded-pill text-bg-warning">Pobra</span>
                                </div>
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    <i class="card-icon bi bi-clipboard-data"></i>
                                    <div class="d-flex flex-column gap-3 justify-content-between align-items-center">
                                        <span class="card-text-variable card-text">PM25</span>
                                        <span class="ph-pm25 card-text-mesura card-text">--</span>
                                    </div>
                                    <div class="d-flex flex-column gap-3 justify-content-between align-items-center">
                                        <span class="card-text-variable card-text">SO2</span>
                                        <span class="ph-so2 card-text-mesura card-text">--</span>
                                    </div>
                                    <div class="d-flex flex-column gap-3 justify-content-between align-items-center">
                                        <span class="card-text-variable card-text">NO2</span>
                                        <span class="ph-no2 card-text-mesura card-text">--</span>
                                    </div>
                                    <div class="d-flex flex-column gap-3 justify-content-between align-items-center">
                                        <span class="card-text-variable card-text">O3</span>
                                        <span class="ph-o3 card-text-mesura card-text">--</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card: Sortida i posta de sol -->
                        <div class="card-sol card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex flex-row justify-content-start align-items-center">
                                    <span class="card-text-titol card-text">Sortida i posta de sol</span>
                                </div>
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    <i class="card-icon bi bi-brightness-high"></i>
                                    <div class="d-flex flex-column gap-3 justify-content-between align-items-center">
                                        <span class="card-text-variable card-text">Sortida</span>
                                        <span class="ph-daily-sunrise card-text-mesura card-text">--</span>
                                    </div>
                                    <i class="card-icon bi bi-moon"></i>
                                    <div class="d-flex flex-column gap-3 justify-content-between align-items-center">
                                        <span class="card-text-variable card-text">Posta</span>
                                        <span class="ph-daily-sunset card-text-mesura card-text">--</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card: Humitat -->
                        <div class="card-humitat card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex flex-row justify-content-start align-items-center">
                                    <span class="card-text-titol card-text">Humitat</span>
                                </div>
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    <i class="card-icon bi bi-moisture"></i>
                                    <span class="ph-current-relative_humidity_2m card-text-mesura card-text">--</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card: Pressió -->
                        <div class="card-pressio card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex flex-row justify-content-start align-items-center">
                                    <span class="card-text-titol card-text">Pressió atmosfèrica</span>
                                </div>
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    <i class="card-icon bi bi-hurricane"></i>
                                    <span class="ph-current-surface_pressure card-text-mesura card-text">--</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card: Precipitació -->
                        <div class="card-visibilitat card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex flex-row justify-content-start align-items-center">
                                    <span class="card-text-titol card-text">Precipitació</span>
                                </div>
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    <i class="card-icon bi bi-cloud-drizzle"></i>
                                    <span class="ph-current-precipitation card-text-mesura card-text">--</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card: Vent -->
                        <div class="card-vent card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3">
                                <div class="d-flex flex-row justify-content-start align-items-center">
                                    <span class="card-text-titol card-text">Vent</span>
                                </div>
                                <div class="d-flex flex-row justify-content-around align-items-center">
                                    <i class="card-icon bi bi-wind"></i>
                                    <span class="ph-current-wind_speed_10m card-text-mesura card-text">--</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PREVISIÓ HORÀRIA -->
                    <div
                        class="card-previsio-horaria container-fluid d-flex flex-row gap-1 flex-wrap justify-content-between w-100">
                        <!-- Controls cards/gràfica -->
                        <i class="icon-grafica bi bi-graph-up"></i>
                        <div class="control-grafica form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Gràfica</label> -->
                        </div>
                        <!-- Previsió per hores -->
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">2 AM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">5 AM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">8 AM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">11 AM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">2 PM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">5 PM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">8 PM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="card-previsio-per-hores card bg-dark bg-gradient">
                            <div class="card-body d-flex flex-column gap-3 align-items-center justify-content-evenly">
                                <span class="card-text-hora card-text">11 PM</span>
                                <img src="./assets/images/weather_icons/dummy.png"
                                    class="ph-hourly-weather_code card-img card-img-top" alt="...">
                                <span class="ph-hourly-temperature_2m card-text-temp-current card-text">--</span>
                                <img src="./assets/images/weather_icons/direction.png"
                                    class="ph-hourly-wind_direction_10m card-img img-vent card-img-top" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- LOGIN MODAL -->
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="loginModalLabel">Log in</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputUser" class="form-label">User</label>
                                    <input type="text" class="form-control" id="inputUser" name="user">
                                    <div id="inputUserHelp" class="form-text">We'll never share your username with anyone
                                        else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="inputPassword" name="password">
                                </div>
                                <button type="button" class="button-login btn btn-primary" name="login">Entra</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>

        <!-- UPLOAD PHOTO MODAL -->
        <div class="modal fade" id="uploadPhotoModal" tabindex="-1" aria-labelledby="uploadPhotoLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="uploadPhotoLabel">Upload photo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="photoLocation" class="form-label">Location</label>
                                <input type="text" class="form-control" id="photoLocation" name="photoLocation"
                                    readonly>
                            </div>
                            <!-- Image input -->
                            <div class="mb-3">
                                <label for="photoFile" class="form-label">Select photo to upload</label>
                                <input class="form-control" type="file" id="photoFile" name="photoFile">
                            </div>
                            <button type="button" class="button-upload-photo btn btn-primary"
                                name="login">Upload</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- OFFCANVAS  PHOTO DISPLAY-->
        <div class="offcanvas offcanvas-bottom bg-dark h-100" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel" data-bs-backdrop="false">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                <button type="button" class="btn-close offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-row align-items-center justify-content-evenly">
                <!-- Location card -->
                <div class="card bg-dark-subtle" style="width: 18rem;">
                    <div class="card-body">
                        <h6 class="card-title text-secondary-emphasis">Location:</h6>
                        <span class="mb-5" id="offcanvas-location">wwww</span>
                        <h6 class="card-title my-4">Latitude:
                            <span id="offcanvas-lat"></span>
                        </h6>
                        <h6 class="card-title my-4">Longitude:
                            <span id="offcanvas-lon"></span>
                        </h6> 
                    </div>
                </div>
                <!-- Carousel -->
                <div id="carouselExample" class="carousel slide w-50">
                    <div class="carousel-inner d-flex flex-row align-items-center">
                        <!-- <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                        </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!--funcionalidad añadida (comparacines del tiempo) -->
        <h1 class="text-align: center">Comparacions del temps</h1>
        <div class="comparison-container" style="display: flex; gap: 20px; align-items: flex-start;">
            <div>
                <div class="row">
                    <div class="col-auto">
                        <input class="search-input form-control me-2 bg-dark bg-gradient form-control-xs" placeholder="Localitzacio 1" type="text" id="location1" style="height: 36px;">
                    </div>
                    <div class="col-auto">
                        <input class="search-input form-control me-2 bg-dark bg-gradient form-control-xs" placeholder="Localitzacio 2" type="text" id="location2" style="height: 36px;">
                    </div>
                    <div class="col-auto">
                        <button class="search-button btn btn-outline-secondary btn-sm form-control form-control-xs" onclick="compareWeather()" style="height: 36px;">Compare</button>
                    </div>
                </div>
                <div style="max-width: 600px;">
                    <canvas id="temperatureChart" width="500" height="300"></canvas>
                </div>
            </div>
            <div>
                <h2>Historial de Comparacions</h2>
                <table id="locationsTable" class="table">
                    <thead>
                        <tr>
                            <th>Localizació 1</th>
                            <th>Localizació 2</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="comparasion.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="comparasion.js"></script>

        <footer class="w-100 mt-3 text-white-50 d-flex flex-columns justify-content-around">
            <span>ETP XAVIER CFGS DAW M6-M7 2023/2024</span>
            <span>Dades ofertes per <a target="_blank" href="https://open-meteo.com/">Open-Meteo.com</a></span>
        </footer>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" \
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" \
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="./script.js" type="module"></script>

</html>