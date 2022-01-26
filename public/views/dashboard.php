<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="public/materials/favicon3.png"/>
    <link rel="stylesheet" type="text/css" href="public/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <script type="text/javascript" src="./public/js/scroll.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <title>Guard</title>
</head>

<body>
<div id="img-container">
    <img id="background-pic" src="public/materials/dog-white.png" alt="background">
</div>
<div class="container">
    <div class="parent">
        <nav class="light">
            <a href="/"><img class="logo" src="public/materials/logo.svg" alt="Guard logo"></a>
            <?php include('nav.php')?>
        </nav>
    </div>
    <div class="left-side">
        <div id="left-content">
            <div class="search-bar" onclick="location.href='/search'">
                <i class="fas fa-search"></i>
                <span class="text-animation">Znajdź ogłoszenie  </span>
            </div>
            <div class="text">
                <div id="top-text">Schroniska w Twojej kieszeni</div>
                <div id="middle-text">Znajdź swojego <b>podopiecznego</b></div>
                <div id="bottom-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh morbi cursus augue vulputate enim volutpat cum. Nisi fames.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pics" id="wave-dashboard">
    <img src="public/materials/wave/1_front.png" alt="" unselectable="on">
    <img src="public/materials/wave/2.png" alt="" unselectable="on">
    <img src="public/materials/wave/3.png" alt="" unselectable="on">
</div>
</body>
</html>