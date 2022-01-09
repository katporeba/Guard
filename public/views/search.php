<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Sign In</title>
</head>

<body id="search">
    <div id="main-container">
        <div class="parent" id="not-sticky">
            <nav>
                <a href="dashboard.php"><img class="logo" src="public/materials/logo_dark.svg" alt="Guard logo"></a>
                <p class="login-container">
                    <a id="login" href="login.php">Zaloguj się</a>
                    <a id="signup" href="signin.php">Rejestracja</a>
                </p>
            </nav>
            <div id="scroll-form">
                <form id="choose-type-form">
                    <div id="checkboxes">
                        <input type="checkbox" name="rGroup" value="dog" id="animal1" checked="checked" />
                        <label class="whatever" for="animal1">
                            <img id="dog-img" src="public/materials/search/dog.svg">
                            <span class="text-type">Pies</span>
                        </label>
                        <input type="checkbox" name="rGroup" value="cat" id="animal2" />
                        <label class="whatever" for="animal2">
                            <img id="cat-img" src="public/materials/search/cat.svg">
                            <span class="text-type">Kot</span>
                        </label>
                        <input type="checkbox" name="rGroup" value="other" id="animal3" />
                        <label class="whatever" for="animal3">
                            <img id="other-img" src="public/materials/search/other.svg">
                            <span class="text-type">Inne</span>
                        </label>
                        <input type="checkbox" name="rGroup" value="all" id="animal4" />
                        <label class="whatever" for="animal4">
                            <i class="fas fa-infinity"></i>
                            <span class="text-type">Wszystkie</span>
                        </label>
                    </div>

                    <div id="shelter">
                        <div class="select">
                            <select name="shelter" id="shelter-list">
                                <option value="">Wybierz schronisko</option>
                                <option value="all">Wszystkie</option>
                                <option value="krakow">Schronisko w Krakowie</option>
                                <option value="nowy">Schronisko w Nowym Sączu</option>
                                <option value="tarnow">Schronisko w Tarnowie</option>
                            </select>
                        </div>
                    </div>

                    <div id="gender">
                        <div id="checkboxes">
                            <input type="checkbox" name="genderCheck" value="man" id="man1" />
                            <label class="whatever" for="man1">
                                <i class="fas fa-mars"></i>
                                <span class="text-type">Samiec</span>
                            </label>
                            <input type="checkbox" name="genderCheck" value="woman" id="woman1" />
                            <label class="whatever" for="woman1">
                                <i class="fas fa-venus"></i>
                                <span class="text-type">Samica</span>
                            </label>
                        </div>
                    </div>

                    <div id="Lokalizacja">
                        <div class="local-container">
                            <input name="local" type="text" placeholder="Podaj lokalizację">
                            <div class="select">
                                <select name="distance" id="distance-list">
                                    <option value="">+0 km</option>
                                    <option value="5">+5 km</option>
                                    <option value="15">+15 km</option>
                                    <option value="50">+ 50 km</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="color">
                        <div id="checkboxes">
                            <input type="checkbox" name="Color" value="black" id="black" />
                            <label class="whatever" class="no-backgroud" for="black">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="gray" id="gray" />
                            <label class="whatever" class="no-backgroud" for="gray">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="brown" id="brown" />
                            <label class="whatever" class="no-backgroud" for="brown">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="orange" id="orange" />
                            <label class="whatever" class="no-backgroud" for="orange">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="white" id="white" />
                            <label class="whatever" class="no-backgroud" for="white">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="all" id="all" />
                            <label class="whatever" class="no-backgroud" for="all">
                                <span class="text-type"></span>
                            </label>
                        </div>
                    </div>

                    <div id="ageHealth">
                        <div id="input-container">
                            <div id="range-container">
                                <div class="age-value"><span>0</span></div>
                                <input class="slider" name="age" type="range" min="0" max="20" step="1" value="20"
                                    id="myRange">
                                <div class="age-value"><span id="demo"></span></div>
                            </div>
                            <div id="checkboxes">
                                <input type="checkbox" name="healthy" value="healthy" id="healthy" />
                                <label class="whatever" for="healthy">
                                    <span class="text-type">Zdrowy</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="size">
                        <div id="checkboxes">
                            <input type="checkbox" name="chooseSize" value="small" id="small" />
                            <label class="whatever" for="small">
                                <span class="text-type">Mały</span>
                            </label>
                            <input type="checkbox" name="chooseSize" value="medium" id="medium" />
                            <label class="whatever" for="medium">
                                <span class="text-type">Średni</span>
                            </label>
                            <input type="checkbox" name="chooseSize" value="big" id="big" />
                            <label class="whatever" for="big">
                                <span class="text-type">Duży</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="filter-div">
            <div id="filter">
                <div class="select">
                    <select name="filter" id="filter-list">
                        <option value="">Najnowsze</option>
                        <option value="all">Najstarsze</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="posts">
            <div id="first-post" class="post">
                <div id="first-column">
                    <div class="post-image">
                        <img src="public/uploads/<?= $project->getImage() ?>">
                    </div>
                    <div class="content">
                        <div class="post-informations">
                            <div class="post-name"><?= $project->getTitle() ?></div>
                            <div class="post-gender"><i class="fas fa-venus"></i></div>
                        </div>
                        <div class="post-rest">
                            <div class="first-line">
                                <div class="post-localization">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div class="post-text">Kraków</div>
                                </div>
                                <div class="post-age">3 lata</div>
                            </div>
                            <div class="second-line">
                                <div class="post-size">Mała</div>
                                <div class="post-health">Zdrowa</div>
                            </div>
                        </div>
                        <div class="post-date">Dodano <b>19.10.2021 16:30</b></div>
                    </div>
                </div>

                <div id="second-column">
                    <div id="post-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</div>
                    <div id="post-description"><?= $project->getDescription() ?></div>
                    <div id="map-container">
                        <i class="fas fa-map-marker-alt"></i>
                        <div id="map-text">
                            <div id="shelter-name">Schronisko w Krakowie</div>
                            <div id="shelter-address">ul Rybna 3</div>
                        </div>
                        <div id="icon-container">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                    </div>
                    <div id="post-graph">
                        <div id="graph-first">
                            <div class="bar">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="graph-description">Wymaga uwagi</div>
                        </div>
                        <div id="graph-second">
                            <div class="bar">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="graph-description">Akceptuje dzieci</div>
                        </div>
                        <div id="graph-third">
                            <div class="bar">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="graph-description">Akceptuje zwierzęta</div>
                        </div>
                        <div id="graph-fourth">
                            <div class="bar">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="graph-description">Poziom energii</div>
                        </div>
                        <div id="graph-fifth">
                            <div class="bar">
                                <div class="progress-bar"></div>
                            </div>
                            <div class="graph-description">Otwarty</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="second-post" class="post">
                <div class="post-image">
                    <img src="public/materials/jamie-street-uNNCs5kL70Q-unsplash.jpg">
                </div>
                <div class="content">
                    <div class="post-informations">
                        <div class="post-name">Ryszard</div>
                        <div class="post-gender"><i class="fas fa-mars"></i></div>
                    </div>
                    <div class="post-rest">
                        <div class="first-line">
                            <div class="post-localization">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="post-text">Nowy Sącz</div>
                            </div>
                            <div class="post-age">5 lat</div>
                        </div>
                        <div class="second-line">
                            <div class="post-size">Mały</div>
                            <div class="post-health">Zdrowy</div>
                        </div>
                    </div>
                    <div class="post-date">Dodano <b>19.10.2021 16:30</b></div>
                </div>
            </div>

            <div id="third-post" class="post">
                <div class="post-image">
                    <img src="public/materials/undine-tackmann-8mxSINYFoSw-unsplash.jpg">
                </div>
                <div class="content">
                    <div class="post-informations">
                        <div class="post-name">Stefan</div>
                        <div class="post-gender"><i class="fas fa-mars"></i></div>
                    </div>
                    <div class="post-rest">
                        <div class="first-line">
                            <div class="post-localization">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="post-text">Kraków</div>
                            </div>
                            <div class="post-age">6 mies.</div>
                        </div>
                        <div class="first-line">
                            <div class="post-size">Mały</div>
                            <div class="post-health">Wymaga leczenia</div>
                        </div>
                    </div>
                    <div class="post-date">Dodano <b>19.10.2021 16:30</b></div>
                </div>
            </div>

            <div id="first-post" class="post">
            </div>

            <div id="second-post" class="post">
            </div>

            <div id="third-post" class="post">
            </div>

            <div id="fourth-post" class="post">
            </div>
        </div>
    </div>

    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;
        slider.oninput = function () {
            output.innerHTML = this.value;
        }

        elements = document.getElementsByClassName("fas fa-mars");
        for (var i = 0; i < elements.length; i++) {
            var parent = elements[i].parentNode;
            if (parent.classList.contains("post-gender")) 
                parent.style.backgroundColor="#4678C5";
        }  
    </script>
</body>

</html>