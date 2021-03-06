<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="public/materials/favicon3.png"/>
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Zarejestruj się</title>
</head>

<body>

<div class="container signin">
    <div class="parent">
        <nav class="light">
            <a href="/"><img class="logo" src="public/materials/logo_dark.svg" alt="Guard logo"></a>
            <?php include('nav.php');?>
        </nav>
    </div>
    <div id="img-container">
        <div class="pics">
            <img src="public/materials/wave/small/1_front.png" alt="" unselectable="on">
            <img src="public/materials/wave/small/2.png" alt="" unselectable="on">
            <img src="public/materials/wave/small/3.png" alt="" unselectable="on">
        </div>
        <img id="background-pic3" src="public/materials/handshake.gif">
    </div>
    <div class="left-side">
        <div id="main-text"><b>Zarejestruj się</b> i zyskaj dodatkowe funkcje</div>
        <div id="no-account">Posiadasz już konto? <a href="/login"><b>Zaloguj się</b></a></div>
        <div id="choose-type-container">
            <div onclick="location.href='/signUpPersonal'" style="cursor:pointer" id="personal-account">
                <img src="public/materials/person.svg">
                <span class="text-type">Jestem <b>osobą prywatną</b></span>
            </div>
            <div onclick="location.href='/signUpShelter'" style="cursor:pointer" id="shelter-account">
                <img src="public/materials/shelter.svg">
                <span class="text-type">Jestem <b>schroniskiem</b></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>