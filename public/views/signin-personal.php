<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <link rel="icon" type="image/png" href="public/materials/favicon3.png"/>
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Zarejestruj się</title>
</head>

<body>
    <div class="container personal">
        <div class="parent">
            <nav class="dark">
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
            <img id="background-pic3" src="public/materials/444.gif">
        </div>
        <div class="left-side">
            <div id="main-text"><b>Zarejestruj się</b> jako osoba prywatna</div>
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
            <form method="post" action="signUpPersonal" enctype="multipart/form-data">
                <div class="text-input">E-mail</div>
                <input name="e-mail" class="input-with-border" type="text" placeholder="Podaj swój e-mail">

                <div class="text-input">Hasło</div>
<!--                <div id="password-container">-->
                    <input name="password" class="input-with-border" type="password" placeholder="Podaj swoje hasło">
<!--                    <i id="input_img" class="far fa-eye"></i>-->
<!--                </div>-->
                <br>
<!--                <div id="password-container">-->
                    <input name="confirmed-password" class="input-with-border" type="password" placeholder="Podaj ponownie swoje hasło">
<!--                    <i id="input_img" class="far fa-eye"></i>-->
<!--                </div>-->

                <label class="logout-container">
                    <div id="logout-div">
                        <input type="checkbox" id="do-not-logout" name="terms" value="do-not-logout">
                        <span id="accept-terms">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu ut velit nunc gravida mattis quam phasellus.</span>
                    </div>
                </label>
                <button type="submit" id="log-in">Zarejestruj się</button>
            </form>
        </div>
    </div>
</body>
</html>