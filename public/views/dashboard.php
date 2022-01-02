<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <script>
        window.scrollBy({ 
            top: 100, 
            left: 0, 
            behavior: 'smooth' 
        });

        var element = document.getElementById("background-pic3");
        element.src = "";  
        element.src = "public/materials/backgif5.gif?"+new Date().getTime();

    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <!-- <img id="background-pic" src="../materials/2.png"> -->
    <!-- <img id="background-pic2" src="../materials/2.png"> -->
    <img id="background-pic3" src="public/materials/dog-white.png">
    <div class="parent">
        <nav> 
            <a href="javascript:window.location.href=window.location.href"><img class="logo-light" src="../materials/logo2.svg" alt="Guard logo"></a>
            <p class="login-container">
                <a id="login" href="./login.html">Zaloguj się</a>
                <a id="signup" href="./signin.html">Rejestracja</a>
            </p>
        </nav>
    </div>
    <div class="container">
        <div class="pics" id="wave-dashboard">
            <img src="public/materials/wave/1_front.png" alt="" unselectable="on">
            <img src="public/materials/wave/2.png" alt="" unselectable="on">
            <img src="public/materials/wave/3.png" alt="" unselectable="on">
        </div>
        <div class="left-side">
            <div class="search-bar" onclick="location.href='./choose-animal.html'">
                <span class="iconify" data-icon="akar-icons:search" style="color: black;" data-height="23"></span>
                <span class="text-animation">Znajdź ogłoszenie  </span>
            </div>
            <div class="text">
                <div id="top-text">Schroniska w Twojej kieszeni</div>
                <div id="middle-text">Znajdź swojego <b>podopiecznego</b></div>
                <div id="bottom-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nibh morbi cursus augue vulputate enim volutpat cum. Nisi fames.</div>
            </div>
        </div>
        <!-- <div class="scroll">
            <span class="iconify" data-icon="bi:mouse" style="color: #ccc;" data-height="40"></span>
        </div> -->
    </div>
    <!-- <div class="scroll-container">
        <div class="pics">
            <img src="../materials/wave/1_front.png" alt="" unselectable="on">
            <img src="../materials/wave/2.png" alt="" unselectable="on">
            <img src="../materials/wave/3.png" alt="" unselectable="on">
        </div>
        <div class="world">
            <img src="../materials/back_light2.gif" alt="World" unselectable="on">
        </div>
        <div class="text-world">
            <div id="text-1">
                <div>Dlaczego <b>schronisko</b></div>
                <div>Uratowanie jednego psa nie zmieni całego <b>świata</b>, ale dla tego jednego psa zmieni się cały <b>świat</b>.</div>
            </div>
            <div id="text-2">
                <div>W <b>2019</b> roku</div>
                <div>w schroniskach dla zwierząt przebywało <b>105 188</b> psów oraz <b>31 116</b> kotów. W porównaniu do poprzedniego okresu referencyjnego, w 2019 r. odsetek psów przebywających w schroniskach spadł o 2%, zaś odsetek kotów przebywających w schroniskach wzrósł o 6%.</div>
            </div>
        </div>
        <div class="buttons">
            <button onclick="location.href='./login.html'" class="login-button">Zaloguj się</button>
            <button onclick="location.href='./signin.html'" class="sign-button">Zarejestruj się</button>
        </div> 
    </div> -->
    
</body>
</html>