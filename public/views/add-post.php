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
    <title>Sign In</title>
</head>

<body>
    <div class="parent" id="not-sticky">
        <nav> 
           <a href="/"><img class="logo" src="public/materials/logo_dark.svg" alt="Guard logo"></a>
            <p class="login-container">
                <a id="login" href="/login">Zaloguj się</a>
                <a id="signup" href="signin.php">Rejestracja</a>
            </p>
        </nav>
    </div>

    <div class="container" id="add-post">
        <div class="left-side">
            <div id="main-text"><b>Dodaj ogłoszenie</b></div>
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

        <div id="img-container">
            <form id="choose-type-form" method="post" action="addProject" enctype="multipart/form-data">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <div id="first-one">
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

                    <div id="Lokalizacja" class="fav">
                        <label class="input-text" for="local">Lokalizacja</label>
                        <div class="local-container">
                            <input name="local" type="text" placeholder="Podaj lokalizację">
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
                                <div class="age-value"><span></span></div>
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
                        <a href="#second-one" id="scroll-down"><i class="fas fa-arrow-down"></i></a>
                    </div>
                </div>
                <div id="second-one">
                    <a href="#first-one" id="scroll-up"><i class="fas fa-arrow-up"></i></a>
                    <div id="name-animal" class="fav">
                        <label class="input-text" for="name-animal">Imie zwierzaka</label>
                        <div class="name-container">
                            <input name="name-animal" type="text" placeholder="Podaj imie">
                        </div>
                    </div>

                    <div id="weight" class="fav">
                        <label class="input-text" for="weight">Waga zwierzaka</label>
                        <div class="weight-container">
                            <input name="weight" type="text" placeholder="Podaj wagę">
                        </div>
                    </div>

                    <div id="post-desc" class="fav">
                        <label class="input-text" for="post-desc">Opis ogłoszenia</label>
                        <div class="desc-container">
                            <textarea name="post-desc" rows="10" cols="30">Min. 30 znaków</textarea>
                        </div>
                    </div>

                    <div id="file" class="fav">
                        <label class="input-text" for="file">Zdjęcia</label>
                        <div class="file-container">
                            <input name="file" type="file" placeholder="">
                        </div>
                    </div>
                    <button id="log-in" type="submit">Zarejestruj się</button>
                </div>
            </form>

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