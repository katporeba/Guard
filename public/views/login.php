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
    <title>Zaloguj się</title>
</head>

<body>
<div class="container" id="login-file">
    <div class="parent">
        <nav class="dark">
            <a href="/"><img class="logo" src="public/materials/logo_dark.svg" alt="Guard logo"></a>
            <?php include('nav.php')?>
        </nav>
    </div>
    <div id="row-container">
        <div id="img-container">
            <div class="pics">
                <img src="public/materials/wave/small/1_front.png" alt="" unselectable="on">
                <img src="public/materials/wave/small/2.png" alt="" unselectable="on">
                <img src="public/materials/wave/small/3.png" alt="" unselectable="on">
            </div>
            <img id="background-pic3" src="public/materials/222.gif">

        </div>
        <div class="left-side">
            <div id="main-text"><b>Zaloguj się</b> i zyskaj dodatkowe funkcje</div>
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <form action="login" method="post">
                <div class="text-input">E-mail</div>
                <input name="email" class="input-with-border" type="text" placeholder="Podaj swój e-mail">
                <div class="text-input">Hasło</div>
                <input name="password" class="input-with-border" type="password" placeholder="Podaj swoje hasło">
                <button id="log-in" type="submit">Zaloguj się</button>
            </form>
            <div id="no-account">Nie posiadasz konta? <a href="/signUp"><b>Zarejestruj się</b></a></div>
        </div>
    </div>
</div>
</body>
</html>