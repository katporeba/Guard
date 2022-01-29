<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <link rel="stylesheet" type="text/css" href="public/css/graph.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Dodaj ogłoszenie</title>
</head>

<body id="choose">
<form method="post" action="addProject" enctype="multipart/form-data">
    <div class="container" id="add-post">
        <div class="parent">
            <nav class="dark">
                <a href="/"><img class="logo" src="public/materials/logo_dark.svg" alt="Guard logo"></a>
                <?php include('nav.php');?>
            </nav>
        </div>
        <div class="left-side">
            <div id="main-text"><b>Dodaj ogłoszenie</b></div>
            <div class="text-below">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse volutpat sagittis.</div>
            <div id="checkboxes">
                <input type="radio" name="rGroup" value="dog" id="animal1" checked="checked" />
                <label class="whatever" for="animal1">
                    <img id="dog-img" src="public/materials/search/dog.svg">
                    <span class="text-type">Pies</span>
                </label>
                <input type="radio" name="rGroup" value="cat" id="animal2" />
                <label class="whatever" for="animal2">
                    <img id="cat-img" src="public/materials/search/cat.svg">
                    <span class="text-type">Kot</span>
                </label>
                <input type="radio" name="rGroup" value="other" id="animal3" />
                <label class="whatever" for="animal3">
                    <img id="other-img" src="public/materials/search/other.svg">
                    <span class="text-type">Inne</span>
                </label>
            </div>
        </div>

        <div id="img-container">
            <div id="choose-type-form">
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
                            <input type="radio" name="genderCheck" value="man" id="man1" />
                            <label class="whatever" for="man1">
                                <i class="fas fa-mars"></i>
                                <span class="text-type">Samiec</span>
                            </label>
                            <input type="radio" name="genderCheck" value="woman" id="woman1" />
                            <label class="whatever" for="woman1">
                                <i class="fas fa-venus"></i>
                                <span class="text-type">Samica</span>
                            </label>
                        </div>
                    </div>

                    <div id="color">
                        <label class="input-text" for="local">Kolor</label>
                        <div id="checkboxes">
                            <input type="radio" name="Color" value="black" id="black"/>
                            <label class="whatever" class="no-backgroud" for="black">
                                <span class="text-type"></span>
                            </label>
                            <input type="radio" name="Color" value="gray" id="gray" />
                            <label class="whatever" class="no-backgroud" for="gray">
                                <span class="text-type"></span>
                            </label>
                            <input type="radio" name="Color" value="brown" id="brown" />
                            <label class="whatever" class="no-backgroud" for="brown">
                                <span class="text-type"></span>
                            </label>
                            <input type="radio" name="Color" value="orange" id="orange" />
                            <label class="whatever" class="no-backgroud" for="orange">
                                <span class="text-type"></span>
                            </label>
                            <input type="radio" name="Color" value="white" id="white" />
                            <label class="whatever" class="no-backgroud" for="white">
                                <span class="text-type"></span>
                            </label>
                            <input type="radio" name="Color" value="all" id="all" />
                            <label class="whatever" class="no-backgroud" for="all">
                                <span class="text-type"></span>
                            </label>
                        </div>
                    </div>

                    <div id="ageHealth">
                        <label class="input-text" for="age">Wiek (w latach)</label>
                        <div id="input-container">
                            <div id="range-container">
                                <div class="age-value"><span></span></div>
                                <input class="slider" name="age" type="range" min="0" max="20" step="1" value="20" id="myRange">
                                <div class="age-value">20</div>
                            </div>
                            <div id="checkboxes">
                                <input type="checkbox" name="healthy" value="Zdrowy/a" id="healthy" />
                                <label class="whatever" for="healthy">
                                    <span class="text-type">Zdrowy</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="graph">
                        <div class="graph-container">
                            <label class="input-text" for="graph1">Wymaga uwagi</label>
                            <div class="slider-container">
                                <input class="slider" name="graph1" id="graph1" type="range" min="0" max="5" step="1" value="5">
                                <div class="age-value">5</div>
                            </div>
                        </div>
                        <div class="graph-container">
                            <label class="input-text" for="graph2">Akceptuje dzieci</label>
                            <div class="slider-container">
                                <input class="slider" name="graph2" type="range" min="0" max="5" step="1" value="5">
                                <div class="age-value">5</div>
                            </div>
                        </div>
                        <div class="graph-container">
                            <label class="input-text" for="graph3">Akceptuje zwierzęta</label>
                            <div class="slider-container">
                                <input class="slider" name="graph3" type="range" min="0" max="5" step="1" value="5">
                                <div class="age-value">5</div>
                            </div>
                        </div>
                        <div class="graph-container">
                            <label class="input-text" for="graph4">Poziom energii</label>
                            <div class="slider-container">
                                <input class="slider" name="graph4" type="range" min="0" max="5" step="1" value="5">
                                <div class="age-value">5</div>
                            </div>
                        </div>
                    </div>

                    <div id="size">
                        <label class="input-text" for="chooseSize">Wielkość</label>
                        <div id="checkboxes">
                            <input type="radio" name="chooseSize" value="Mały/a" id="small" />
                            <label class="whatever" for="small">
                                <span class="text-type">Mały</span>
                            </label>
                            <input type="radio" name="chooseSize" value="Średni/a" id="medium" />
                            <label class="whatever" for="medium">
                                <span class="text-type">Średni</span>
                            </label>
                            <input type="radio" name="chooseSize" value="Duży/a" id="big" />
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
                        <label class="input-text" for="weight">Waga zwierzaka (w kg)</label>
                        <div class="weight-container">
                            <input name="weight" type="text" placeholder="Podaj wagę">
                        </div>
                    </div>

                    <div id="post-desc" class="fav">
                        <label class="input-text" for="post-desc">Opis ogłoszenia</label>
                        <div class="desc-container">
                            <textarea minlength="30" maxlength="255" name="post-desc" rows="10" cols="30" placeholder="Min. 30 znaków"></textarea>
                        </div>
                    </div>

                    <div id="file" class="fav">
                        <div class="input-text">Zdjęcie</div>
                        <label for="file-custom" class="custom-file-upload">
                            <i class="fas fa-plus"></i>
                            <span id="file-name"></span>
                        </label>
                        <input name="file" type="file" id="file-custom" onchange="myFunction(this.value)">
                    </div>
                    <button id="log-in" type="submit">Dodaj ogłoszenie</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    var sliderArray = document.getElementsByClassName("slider");
    for (i=0;i<sliderArray.length;i++){
        sliderArray[i].setAttribute("oninput", "this.nextElementSibling.innerHTML = this.value");
    }

    function myFunction(val) {
        document.getElementById('file-name').innerHTML = val;
    }
</script>
</body>
</html>