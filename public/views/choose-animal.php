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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Wyszukaj</title>
</head>

<body>
    <div class="parent">
        <nav> 
           <a href="/"><img class="logo" src="public/materials/logo_dark.svg" alt="Guard logo"></a>
            <p class="login-container">
                <a id="login" href="/login">Zaloguj się</a>
                <a id="signup" href="/signUp">Rejestracja</a>
            </p>
        </nav>
    </div>
    <div class="container">
        <div id="img-container">
            <form id="choose-type-form">
                <div id="shelter">
                    <label class="input-text" for="shelter">Schronisko</label>
                    <div class="select">
                        <select name="shelter" id="shelter-list">
                            <option value="">Wybierz schronisko z naszej listy</option>
                            <option value="all">Wszystkie</option>
                            <option value="krakow">Schronisko w Krakowie</option>
                            <option value="nowy">Schronisko w Nowym Sączu</option>
                            <option value="tarnow">Schronisko w Tarnowie</option>
                        </select>
                    </div>
                </div>

                <div id="gender">
                    <label class="input-text" for="genderCheck">Płeć</label>
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
                    <label class="input-text" for="local">Lokalizacja</label>
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
                    <label class="input-text" for="local">Kolor</label>
                    <div id="checkboxes">
                        <input type="checkbox" name="Color" value="black" id="black"/>
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
                    <label class="input-text" for="age">Wiek</label>
                    <div id="input-container">
                        <div id="range-container">
                            <div class="age-value"><span>0</span></div>
                            <input class="slider" name="age" type="range" min="0" max="20" step="1" value="20" id="myRange">
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
                    <label class="input-text" for="chooseSize">Wielkość</label>
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
                <div id="button-container">
                    <a href="#" id="scroll-down"><i class="fas fa-arrow-down"></i></a>
                </div>
            </form>

        </div>
        <div class="left-side">
            <div id="main-text"><b>Wyszukaj</b></div>
            <div class="text-below">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse volutpat sagittis.</div>
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
        </div>
    </div>

    <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    </script>
</body>
</html>