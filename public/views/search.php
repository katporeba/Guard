<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="public/materials/favicon3.png"/>
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <link rel="stylesheet" type="text/css" href="public/css/tooltip.css">

    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/selectPost.js" defer></script>
    <script type="text/javascript" src="./public/js/gender.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
    <title>Wyszukaj</title>
</head>

<body id="search">
<div id="main-container">
    <form method="post">
        <div class="parent" id="not-sticky">
            <nav>
                <a href="/"><img class="logo" src="public/materials/logo_dark.svg" alt="Guard logo"></a>
                <p class="login-container dark">
                    <?php if (!empty($_SESSION['user'])) { ?>
                        <a href="/search"><i class="fas fa-search"></i></a>
                        <a href="/favourites"><i class="fas fa-heart"></i></a>
                        <!--                    <i class="far fa-comment"></i>-->
                        <a href="/search"><i class="fas fa-user"></i></a>
                        <?php if ($_SESSION['shelter'] != "personal") { ?>
                            <a href="/addProject"><i class="fas fa-plus"></i></a>
                        <?php } ?>
                        <a href="/logout"><i class="fas fa-sign-out-alt"></i></a>
                    <?php } else { ?>
                        <a id="login" href="/login">Zaloguj się</a>
                        <a id="signup" href="/signUp">Rejestracja</a>
                    <?php } ?>
                </p>
            </nav>
            <div id="scroll-form">
                <div id="choose-type-form" method="post">
                    <div id="checkboxes">
                        <input type="radio" name="rGroup" value="dog" id="animal1"/>
                        <label class="whatever" for="animal1">
                            <img id="dog-img" src="public/materials/search/dog.svg">
                            <span class="text-type">Pies</span>
                        </label>
                        <input type="radio" name="rGroup" value="cat" id="animal2"/>
                        <label class="whatever" for="animal2">
                            <img id="cat-img" src="public/materials/search/cat.svg">
                            <span class="text-type">Kot</span>
                        </label>
                        <input type="radio" name="rGroup" value="other" id="animal3"/>
                        <label class="whatever" for="animal3">
                            <img id="other-img" src="public/materials/search/other.svg">
                            <span class="text-type">Inne</span>
                        </label>
                        <input type="radio" name="rGroup" value="all" id="animal4" checked/>
                        <label class="whatever" for="animal4">
                            <i class="fas fa-infinity"></i>
                            <span class="text-type">Wszystkie</span>
                        </label>
                    </div>

                    <!--                    <div id="shelter">-->
                    <!--                        <div class="select">-->
                    <!--                            <select name="shelter" id="shelter-list">-->
                    <!--                                <option value="">Wybierz schronisko</option>-->
                    <!--                                <option value="all">Wszystkie</option>-->
                    <!--                                <option value="krakow">Schronisko w Krakowie</option>-->
                    <!--                                <option value="nowy">Schronisko w Nowym Sączu</option>-->
                    <!--                                <option value="tarnow">Schronisko w Tarnowie</option>-->
                    <!--                            </select>-->
                    <!--                        </div>-->
                    <!--                    </div>-->

                    <div id="gender">
                        <div id="checkboxes">
                            <input type="checkbox" name="genderCheck" value="man" id="man1"/>
                            <label class="whatever" for="man1">
                                <i class="fas fa-mars"></i>
                                <span class="text-type">Samiec</span>
                            </label>
                            <input type="checkbox" name="genderCheck" value="woman" id="woman1"/>
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
                            <input type="checkbox" name="Color" value="black" id="black"/>
                            <label class="whatever" class="no-backgroud" for="black">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="gray" id="gray"/>
                            <label class="whatever" class="no-backgroud" for="gray">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="brown" id="brown"/>
                            <label class="whatever" class="no-backgroud" for="brown">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="orange" id="orange"/>
                            <label class="whatever" class="no-backgroud" for="orange">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="white" id="white"/>
                            <label class="whatever" class="no-backgroud" for="white">
                                <span class="text-type"></span>
                            </label>
                            <input type="checkbox" name="Color" value="all" id="all"/>
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
                                <input type="checkbox" name="healthy" value="healthy" id="healthy"/>
                                <label class="whatever" for="healthy">
                                    <span class="text-type">Zdrowy</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="size">
                        <div id="checkboxes">
                            <input type="checkbox" name="chooseSize" value="small" id="small"/>
                            <label class="whatever" for="small">
                                <span class="text-type">Mały</span>
                            </label>
                            <input type="checkbox" name="chooseSize" value="medium" id="medium"/>
                            <label class="whatever" for="medium">
                                <span class="text-type">Średni</span>
                            </label>
                            <input type="checkbox" name="chooseSize" value="big" id="big"/>
                            <label class="whatever" for="big">
                                <span class="text-type">Duży</span>
                            </label>
                        </div>
                    </div>
                    <a id="scroll-down"><i class="fas fa-arrow-down"></i></a>
                </div>
            </div>
        </div>
        <div id="filter-div">
            <div id="filter">
                <div class="select">
                    <select name="filter" id="filter-list">
                        <option value="DESC">Najnowsze</option>
                        <option value="ASC">Najstarsze</option>
                    </select>
                </div>
            </div>
        </div>
    </form>


    <div id="posts">
        <div class="post first-post" id="<?= $projects[0]['project']->getId() ?>">
            <div id="first-column">
                <div class="post-image">
                    <img src="public/uploads/<?= $projects[0]['project']->getImage() ?>">
                </div>
                <div class="content">
                    <div class="post-informations">
                        <div class="post-name"><?= $projects[0]['project']->getTitle() ?></div>
                        <div class="<?= $projects[0]['animal']->getGender() ?>"></div>
                    </div>
                    <div class="post-rest">
                        <div class="first-line">
                            <div class="post-localization">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="post-text"><?= $projects[0]['shelter']->getCity() ?></div>
                            </div>
                            <div class="post-age">Lat: <?= $projects[0]['animal']->getAge() ?></div>
                        </div>
                        <div class="second-line">
                            <div class="post-size"><?= $projects[0]['animal']->getSize() ?></div>
                            <div class="post-health"><?= $projects[0]['animal']->getHealth() ?></div>
                        </div>
                    </div>
                    <div class="post-date">Dodano <b><?= $projects[0]['date'] ?></b></div>
                </div>
            </div>

            <div id="second-column">
                <div id="post-title"><?= $projects[0]['project']->getTitle() ?> poszukuje domu</div>
                <div id="post-description"><?= $projects[0]['project']->getDescription() ?></div>
                <div id="map-container">
                    <i class="fas fa-map-marker-alt"></i>
                    <div id="map-text">
                        <div id="shelter-name"><?= $projects[0]['shelter']->getCity() ?></div>
                        <div id="shelter-address">
                            ul. <?= $projects[0]['shelter']->getStreet() ?> <?= $projects[0]['shelter']->getStreetNumber() ?></div>
                    </div>
                    <a class="tooltip" id="icon-container" href="https://www.google.com/maps/search/?api=1&query=<?=$projects[0]['shelter']->getCity()?>+<?=$projects[0]['shelter']->getStreet()?>+<?=$projects[0]['shelter']->getStreetNumber()?>">
                        <i class="fas fa-map-marked-alt"></i>
                        <span class="tooltiptext">Pokaż na mapie</span>
                    </a>
                </div>
                <div id="post-graph">
                    <div id="graph-first">
                        <div class="bar">
                            <div class="progress-bar" id="<?= $projects[0]['graph']->getRequiresAttention() ?>"></div>
                        </div>
                        <div class="graph-description">Wymaga uwagi</div>
                    </div>
                    <div id="graph-second">
                        <div class="bar">
                            <div class="progress-bar" id="<?= $projects[0]['graph']->getAcceptsChildren() ?>"
                            ">
                        </div>
                    </div>
                    <div class="graph-description">Akceptuje dzieci</div>
                </div>
                <div id="graph-third">
                    <div class="bar">
                        <div class="progress-bar" id="<?= $projects[0]['graph']->getAcceptsAnimals() ?>"
                        ">
                    </div>
                </div>
                <div class="graph-description">Akceptuje zwierzęta</div>
            </div>
            <div id="graph-fourth">
                <div class="bar">
                    <div class="progress-bar" id="<?= $projects[0]['graph']->getEnergyLevel() ?>"
                    ">
                </div>
            </div>
            <div class="graph-description">Poziom energii</div>
        </div>
    </div>
</div>
</div>
<?php for ($i = 1; $i < count($projects); $i++): ?>
    <div class="second-post post" id="<?= $projects[$i]['project']->getId() ?>">
        <div class="post-image">
            <img src="public/uploads/<?= $projects[$i]['project']->getImage() ?>">
        </div>
        <div class="content">
            <div class="post-informations">
                <div class="post-name"><?= $projects[$i]['project']->getTitle() ?></div>
                <div class="<?= $projects[$i]['animal']->getGender() ?>"></div>
            </div>
            <div class="post-rest">
                <div class="first-line">
                    <div class="post-localization">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="post-text"><?= $projects[$i]['shelter']->getCity() ?></div>
                    </div>
                    <div class="post-age">Lat: <?= $projects[$i]['animal']->getAge() ?></div>
                </div>
                <div class="second-line">
                    <div class="post-size"><?= $projects[$i]['animal']->getSize() ?></div>
                    <div class="post-health"><?= $projects[$i]['animal']->getHealth() ?></div>
                </div>
            </div>
            <div class="post-date">Dodano <b><?= $projects[$i]['date'] ?></b></div>
        </div>
    </div>
<?php endfor; ?>
</div>
</div>

<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;
    slider.oninput = function () {
        output.innerHTML = this.value;
    }
</script>

<template id="project-template-first">
    <div class="post first-post">
        <div id="first-column">
            <div class="post-image">
                <img src="">
            </div>
            <div class="content">
                <div class="post-informations">
                    <div class="post-name"></div>
                    <div></div>
                </div>
                <div class="post-rest">
                    <div class="first-line">
                        <div class="post-localization">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="post-text"></div>
                        </div>
                        <div class="post-age"></div>
                    </div>
                    <div class="second-line">
                        <div class="post-size"></div>
                        <div class="post-health"></div>
                    </div>
                </div>
                <div class="post-date"> </b></div>
            </div>
        </div>
        <div id="second-column">
            <div id="post-title"></div>
            <div id="post-description"></div>
            <div id="map-container">
                <i class="fas fa-map-marker-alt"></i>
                <div id="map-text">
                    <div id="shelter-name"></div>
                    <div id="shelter-address">ul. </div>
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
            </div>
        </div>
</template>

<template id="project-template-second">
    <div class="second-post post">
        <div class="post-image">
            <img src="">
        </div>
        <div class="content">
            <div class="post-informations">
                <div class="post-name"></div>
                <div></div>
            </div>
            <div class="post-rest">
                <div class="first-line">
                    <div class="post-localization">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="post-text"></div>
                    </div>
                    <div class="post-age"></div>
                </div>
                <div class="second-line">
                    <div class="post-size"></div>
                    <div class="post-health"></div>
                </div>
            </div>
            <div class="post-date"></b></div>
        </div>
    </div>
</template>
</body>

</html>