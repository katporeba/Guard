<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/public/materials/favicon3.png"/>
    <link rel="stylesheet" type="text/css" href="/public/css/search.css">
    <link rel="stylesheet" type="text/css" href="/public/css/nav.css">
    <link rel="stylesheet" type="text/css" href="/public/css/graph.css">
    <link rel="stylesheet" type="text/css" href="/public/css/tooltip.css">

    <script type="text/javascript" src="/public/js/gender.js" defer></script>
    <script type="text/javascript" src="/public/js/likes.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
    <title><?=$projects[0]['project']->getTitle()?></title>
</head>

<body id="search">
<nav class="dark">
    <a href="/"><img class="logo" src="/public/materials/logo_dark.svg" alt="Guard logo"></a>
    <?php include('nav.php');?>
</nav>
<div id="two-rows">
    <div id="post-first-column">
        <div id="photo-container">
            <img src="/public/uploads/<?=$projects[0]['project']->getImage()?>">
        </div>
        <div id="container-info">
            <div class="content">
                <div class="post-informations">
                    <div class="post-name"><?=$projects[0]['project']->getTitle()?></div>
                    <div class="<?=$projects[0]['animal']->getGender()?>"></div>
                </div>
                <div class="post-rest">
                    <div class="first-line">
                        <div class="post-localization">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="post-text"><?=$projects[0]['shelter']->getCity()?></div>
                        </div>
                        <div class="post-age">Lat: <?=$projects[0]['animal']->getAge()?></div>
                    </div>
                    <div class="second-line">
                        <div class="post-size"><?=$projects[0]['animal']->getSize()?></div>
                        <div class="post-health"><?=$projects[0]['animal']->getHealth()?></div>
                    </div>
                </div>
            </div>
            <div id="post-graph">
                <div id="graph-first">
                    <div class="bar">
                        <div class="progress-bar" id="<?=$projects[0]['graph']->getRequiresAttention()?>"></div>
                    </div>
                    <div class="graph-description">Wymaga uwagi</div>
                </div>
                <div id="graph-second">
                    <div class="bar">
                        <div class="progress-bar" id="<?=$projects[0]['graph']->getAcceptsChildren()?>"></div>
                    </div>
                    <div class="graph-description">Akceptuje dzieci</div>
                </div>
                <div id="graph-third">
                    <div class="bar">
                        <div class="progress-bar" id="<?=$projects[0]['graph']->getAcceptsAnimals()?>"></div>
                    </div>
                    <div class="graph-description">Akceptuje zwierzęta</div>
                </div>
                <div id="graph-fourth">
                    <div class="bar">
                        <div class="progress-bar" id="<?=$projects[0]['graph']->getEnergyLevel()?>"></div>
                    </div>
                    <div class="graph-description">Poziom energii</div>
                </div>
            </div>
        </div>
    </div>

    <div id="post-second-column">
        <div class="row">
            <div class="post-full-name"><span id="brown-text"><?=$projects[0]['animal']->getName()?></span> poszukuje domu</div>
            <div class="fav <?=$projects['checkFav']?>" id="<?=$projects[0]['project']->getId()?>">
                <i class="far fa-heart" ></i>
            </div>
        </div>
        <div class="post-date">Dodano <b><?=$projects[0]['date']?></b></div>
        <div class="post-full-decription"><?=$projects[0]['project']->getDescription()?></div>
        <div class="row" id="contact">
            <a href="tel://<?=$projects[0]['shelter']->getPhoneNumber()?>" class="round-icon tooltip">
                <i class="fas fa-phone-alt"></i>
                <span class="tooltiptext"><?=$projects[0]['shelter']->getPhoneNumber()?></span>
            </a>
            <a class="round-icon tooltip" href="mailto: <?=$projects[0]['user']->getEmail()?>">
                <i class="fas fa-comment"></i>
                <span class="tooltiptext"><?=$projects[0]['user']->getEmail()?></span>
            </a>
            <a class="round-icon tooltip" href="https://<?=$projects[0]['shelter']->getWebsite()?>">
                <i class="fas fa-globe"></i>
                <span class="tooltiptext"><?=$projects[0]['shelter']->getWebsite()?></span>
            </a>

            <a class="tooltip" id="choose-visit" href="mailto:<?=$projects[0]['user']->getEmail()?>?subject=Rezerwacja spotkania - <?=$projects[0]['animal']->getName()?>&body=E-mail wysłany poprzez portal Guard.">
                <i class="fas fa-calendar-alt"></i>
                <div id="choose-visit-text">Umów się na wizytę</div>
                <span class="tooltiptext">Wyślij przygotowany e-mail</span>
            </a>
        </div>
        <div id="nav-container">
            <div id="nav-first">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <div>Schronisko w <?=$projects[0]['shelter']->getCity()?></div>
                    <div>ul. <?=$projects[0]['shelter']->getStreet()?> <?=$projects[0]['shelter']->getStreetNumber()?></div>
                    <div><?=$projects[0]['shelter']->getPostalCode()?> <?=$projects[0]['shelter']->getCity()?></div>
                </div>
            </div>
            <div class="tooltip" id="nav-second">
                <a href="https://www.google.com/maps/search/?api=1&query=<?=$projects[0]['shelter']->getCity()?>+<?=$projects[0]['shelter']->getStreet()?>+<?=$projects[0]['shelter']->getStreetNumber()?>">
                    <img id="map" src="/public/materials/Group 240.png">
                </a>
                <span class="tooltiptext">Pokaż schronisko na mapie</span>
            </div>
        </div>
    </div>
</div>

<script>
    elements = document.getElementsByClassName("fas fa-mars");
    for (var i = 0; i < elements.length; i++) {
        var parent = elements[i].parentNode;
        if (parent.classList.contains("post-gender"))
            parent.style.backgroundColor="#4678C5";
    }
</script>
</body>

</html>