<p class="login-container">
    <?php if (!empty($_SESSION['user'])) { ?>
        <a href="/search"><i class="fas fa-search"></i></a>
        <a href="/favourites"><i class="fas fa-heart"></i></a>
        <!--                    <i class="far fa-comment"></i>-->
        <!--                    <a href="/search"><i class="fas fa-user"></i></a>-->
        <?php if ($_SESSION['shelter'] != "personal") { ?>
            <a href="/addProject"><i class="fas fa-plus"></i></a>
        <?php } ?>
        <a href="/logout"><i class="fas fa-sign-out-alt"></i></a>
    <?php } else { ?>
        <a id="login" href="/login">Zaloguj się</a>
        <a id="signup" href="/signUp">Rejestracja</a>
    <?php } ?>
</p>
