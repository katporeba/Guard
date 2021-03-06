<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="public/materials/favicon3.png"/>
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="stylesheet" type="text/css" href="public/css/nav.css">
    <script type="text/javascript" src="./public/js/gender.js" defer></script>
    <script type="text/javascript" src="./public/js/selectPost.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5ab342c5ec.js" crossorigin="anonymous"></script>
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
    <title>Obserwowane</title>
</head>

<body>
<div class="parent" id="not-sticky">
    <nav class="dark">
        <a href="/"><img class="logo" src="/public/materials/logo_dark.svg" alt="Guard logo"></a>
        <?php include('nav.php');?>
    </nav>
</div>
<div id="main-text-fav">
    <div id="main-text-title">Obserwowane</div>
    <div id="main-text-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse volutpat sagittis.
    </div>
</div>
<div id="posts" class="fav">
    <?php for ($i = 0; $i < count($projects); $i++): ?>
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
</body>