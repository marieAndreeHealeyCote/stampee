<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{title}}</title>
    <link
        rel="shortcut icon"
        href="{{ asset }}img/favicon.ico"
        type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset }}css/style.css">
    <script type="module" src="{{ asset }}js/index.js"></script>
</head>

<body>
    <section class="section__nav-secondaire">
        <ul class="section__nav-secondaire__menu">
            <li>
                <a href="#">
                    <h3>Premium Stamp Auction</h3>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Bid Now</h3>
                </a>
            </li>
        </ul>
    </section>
    <div class="section__nav">
        <nav>
            <div class="section__nav-principale">
                <div class="section__nav-principale__logo">
                    <a href="{{base}}/home"><img src="{{ asset }}img/logo.webp" alt="logo image stampee"></a>
                </div>
                <h1>Lord Reginald Stampee</h1>
                <form class="section__nav-principale__formulaire" action="#" role="search">
                    <input type="search" id="search" placeholder="Search..." aria-label="champ recherche">
                    <button class="bouton-loupe">&#x1F50E;&#xFE0E;</button>
                </form>
                <div>
                    <ul class="section__nav-principale__connexion">
                        {%if guest %}
                        <li>
                            <a class="section__nav-principale__connexion__lien" href="{{base}}/login">Sign in</a>
                        </li>
                        {% else %}
                        <li>
                            <a class="section__nav-principale__connexion__lien" href="{{base}}/logout">Sign out</a>
                        </li>
                        {% endif %}
                    </ul>
                </div>
            </div>
            <div class="section__nav-principale__menu">
                <label for="menu-mobile" class="section__nav-principale__menu-burger">
                    <img
                        src="https://s2.svgbox.net/hero-outline.svg?ic=menu&color=000"
                        width="32"
                        height="32"
                        alt="icone menu mobile">
                </label>
                <input type="checkbox" class="section__nav-principale__menu-burger-checkbox" id="menu-mobile">
                <ul class="section__nav-principale__menu__list" id="menu-deroulant">
                    <li>
                        <button type="button" class="pseudo-hyperlien">Auction</button>
                        <ul>
                            <li><a href="#"><s>Public Stamp Auction</s></a></li>
                            <li><a href="{{ base }}/auctions"><strong>Public Stamp Auction Catalog</strong></a></li>
                            <li><a href="#"><s>Premium Stamp Auction</s></a></li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="pseudo-hyperlien">About Lord Reginald Stampee</button>
                        <ul>
                            <li><a href="#">Philately, it's the life !</a></li>
                            <li><a href="#">Biography</a></li>
                            <li><a href="#">Family History</a></li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="pseudo-hyperlien">News</button>
                        <ul>
                            <li><a href="#">Stamps</a></li>
                            <li><a href="#">Auctions</a></li>
                            <li><a href="#">Bridge</a></li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="pseudo-hyperlien">How It Works</button>
                        <ul>
                            <li><a href="#">How to become a member</a></li>
                            <li><a href="#">How to create a profile</a></li>
                            <li><a href="#">How to make a bid</a></li>
                            <li><a href="#">How to follow an auction</a></li>
                            <li><a href="#">How to find a bid you want</a></li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="pseudo-hyperlien">Contact</button>
                        <ul>
                            <li><a href="#">Great Britain</a></li>
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">United States</a></li>
                            <li><a href="#">Australia</a></li>
                        </ul>
                    </li>
                    <li>
                        {%if guest %}
                        <a class="bouton bouton-login" href="{{base}}/register">Become a member</a>
                        {% else %}
                        <a class="bouton bouton-login" href="{{base}}/profile">My profile</a>
                        {% endif %}
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <main>