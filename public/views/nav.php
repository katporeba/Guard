<p class="login-container">
    <?php if (!empty($_SESSION['user'])) { ?>
        <a class="desktop" href="/search"><i class="fas fa-search"></i></a>
        <a class="desktop" href="/favourites"><i class="fas fa-heart"></i></a>
        <?php if ($_SESSION['shelter'] != "personal") { ?>
            <a class="desktop" href="/addProject"><i class="fas fa-plus"></i></a>
        <?php } ?>
        <a class="desktop" href="/logout"><i class="fas fa-sign-out-alt"></i></a>
    <?php } else { ?>
        <a class="desktop" id="login" href="/login">Zaloguj się</a>
        <a class="desktop" id="signup" href="/signUp">Rejestracja</a>
    <?php } ?>
</p>

<?php include('mobile.php');?>
