<input id="toggle" type="checkbox"/>
<label for="toggle" class="hamburger" href="javascript:void(0);" onclick="menu()">
    <div class="top-bun"></div>
    <div class="meat"></div>
    <div class="bottom-bun"></div>
</label>

<ul id="myLinks">
    <?php if (!empty($_SESSION['user'])) { ?>
        <a class="mobile-link" href="/search">Wyszukaj <i class="fas fa-search"></i></a>
        <a class="mobile-link" href="/favourites">Obserwowane <i class="fas fa-heart"></i></a>
        <?php if ($_SESSION['shelter'] != "personal") { ?>
            <a class="mobile-link" href="/addProject">Dodaj ogłoszenie <i class="fas fa-plus"></i></a>
        <?php } ?>
        <a class="mobile-link" href="/logout">Wyloguj <i class="fas fa-sign-out-alt"></i></a>
    <?php } else { ?>
        <a class="mobile-link" id="login" href="/login">Zaloguj się</a>
        <a class="mobile-link" id="signup" href="/signUp">Rejestracja</a>
    <?php } ?>
</ul>

<script>
    function menu() {
        var mobileMenu = document.getElementById("myLinks");
        var mobileIcon = document.querySelector(".hamburger");
        if (mobileMenu.style.display === "flex") {
            mobileMenu.style.display = "none";
            mobileIcon.style.position = 'initial';

        } else {
            mobileMenu.style.display = "flex";
            mobileMenu.style.transform = 'translateY(0)';
            mobileIcon.style.position = 'fixed';
        }
    }
</script>