{{ include('layouts/header.php', {'title': 'Homepage'}) }}
<div class="section__nav-principale__hero">
    <div class="section__nav-principale__hero__contenu">
        <h2>No Reserve Auction Event</h2>
        <h3>Ends Tonight | 19th Century US & Worldwide Stamps</h3>
        <button class="bouton bouton-enchere">BID NOW</button>
    </div>
    <img src="{{ asset }}img/Denninger.webp" alt="image stamp hero">
</div>
<div class="main">
    {%if guest is empty %}
    Hi {{ session.user_name }} !
    {% endif %}
    <h1>{{ data }}</h1>
    <section class="section__mission">
        <div class="section__mission__image">
            <img src="{{ asset }}img/collection-de-timbres.jpg" alt="Plusieurs stamps de différentes couleurs étalés">
        </div>
        <div class="section__mission__description">
            <h2>Mission</h2>
            <p>The Stampee platform's mission is to offer the philatelic world a prestigious, reliable, and accessible digital space where the passion for rare stamps meets modernity. Faithful to the vision of Lord Reginald Stampee, Duke of Worcestershire, it aims to extend the excellence and refinement of his renowned auctions online, making them available to collectors worldwide.</p>

            <ul>
                <li>
                    Open up the auctions to the widest possible audience, within a safe and structured framework.
                </li>
                <li>
                    To allow users to quickly find the desired auctions, whether they are active or archived.
                </li>
                <li>
                    Ensure universal accessibility across all devices.
                </li>
                <li>
                    To showcase exceptional pieces.
                </li>
                <li>
                    To offer a visual immersion that faithfully meets the expectations of philatelists.
                </li>
                <li>
                    To preserve and document philatelic history.
                </li>
                <li>
                    To provide a cohesive, elegant environment worthy of Lord Stampee's prestige.
                </li>
            </ul>
        </div>
    </section>
    <div class="section__enchere">
        <section class="section__catalogue-enchere-en-cours">
            <h2>Current Auctions</h2>
            <div class="section__catalogue-enchere-en-cours__grille">
                <article class="section__catalogue-enchere-archives__grille__carte">
                    <img class="section__catalogue-enchere-archives__grille__carte__image" src="{{ asset }}img/lotsTimbre.webp" alt="image timbre carte 1">
                    <h3>
                        Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                        Lots 1-348
                    </h3>
                    <ul>
                        <li>
                            <h4>Period of activity</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Start date: June 1st, 2025</li>
                                <li>End Date: July, 20, 2025</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Floor price</h4>
                            <p>CAD 1,200</p>
                        </li>
                        <li>
                            <h4>Current Offer</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Price: CAD 1,200</li>
                                <li>Member Name: Ann-Mary B.</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Bet Quantity</h4>
                            <p>1</p>
                        </li>
                        <li>
                            <h4>Lord's Favorite</h4>
                            <p>Not selected</p>
                        </li>
                    </ul>
                    <button class="bouton bouton-enchere">BID NOW</button>
                </article>
                <article class="section__catalogue-enchere-archives__grille__carte">
                    <img class="section__catalogue-enchere-archives__grille__carte__image" src="{{ asset }}img/lotsTimbre.webp" alt="image timbre carte 2">
                    <h3>
                        Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                        Lots 1-348
                    </h3>
                    <ul>
                        <li>
                            <h4>Period of activity</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Start date: June 1st, 2025</li>
                                <li>End Date: July, 20, 2025</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Floor price</h4>
                            <p>CAD 1,200</p>
                        </li>
                        <li>
                            <h4>Current Offer</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Price: CAD 1,200</li>
                                <li>Member Name: Ann-Mary B.</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Bet Quantity</h4>
                            <p>1</p>
                        </li>
                        <li>
                            <h4>Lord's Favorite</h4>
                            <p>Not selected</p>
                        </li>
                    </ul>
                    <button class="bouton bouton-enchere">BID NOW</button>
                </article>
        </section>
        <section class="section__catalogue-enchere-en-cours">
            <h2>Lord's Favorites</h2>
            <div class="section__catalogue-enchere-en-cours__grille">
                <article class="section__catalogue-enchere-archives__grille__carte">
                    <img class="section__catalogue-enchere-archives__grille__carte__image" src="{{ asset }}img/lotsTimbre.webp" alt="image timbre carte 1">
                    <h3>
                        Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                        Lots 1-348
                    </h3>
                    <ul>
                        <li>
                            <h4>Period of activity</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Start date: June 1st, 2025</li>
                                <li>End Date: July, 20, 2025</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Floor price</h4>
                            <p>CAD 1,200</p>
                        </li>
                        <li>
                            <h4>Current Offer</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Price: CAD 1,200</li>
                                <li>Member Name: Ann-Mary B.</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Bet Quantity</h4>
                            <p>1</p>
                        </li>
                        <li>
                            <h4>Lord's Favorite</h4>
                            <p>Not selected</p>
                        </li>
                    </ul>
                    <button class="bouton bouton-enchere">BID NOW</button>
                </article>
                <article class="section__catalogue-enchere-archives__grille__carte">
                    <img class="section__catalogue-enchere-archives__grille__carte__image" src="{{ asset }}img/lotsTimbre.webp" alt="image timbre carte 2">
                    <h3>
                        Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                        Lots 1-348
                    </h3>
                    <ul>
                        <li>
                            <h4>Period of activity</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Start date: June 1st, 2025</li>
                                <li>End Date: July, 20, 2025</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Floor price</h4>
                            <p>CAD 1,200</p>
                        </li>
                        <li>
                            <h4>Current Offer</h4>
                            <ul
                                class="section__catalogue-enchere-archives__grille__carte__liste">
                                <li>Price: CAD 1,200</li>
                                <li>Member Name: Ann-Mary B.</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Bet Quantity</h4>
                            <p>1</p>
                        </li>
                        <li>
                            <h4>Lord's Favorite</h4>
                            <p>Not selected</p>
                        </li>
                    </ul>
                    <button class="bouton bouton-enchere">BID NOW</button>
                </article>
        </section>
    </div>
    <section class="section__lord">
        <div class="section__lord__image">
            <img src="{{ asset }}img/Lord-Stampee.webp" alt="Lord Stampee">
        </div>
        <div class="section__lord__description">
            <h2>Lord Reginald Stampee III</h2>
            <p class="h3">From his early childhood in the mid-1950s, Lord Reginald Stampee, Duke of Worcesseshear, nurtured an unwavering passion for philately. A learned collector, a discreet but influential figure among great enthusiasts of rare stamps, he dedicated his life to gathering, studying and showcasing the most precious pieces of postal history.</p>

            <p class="h3">Renowned throughout the United Kingdom for its exclusive auctions, which attract the world's most prestigious philatelists every year, Lord Stampee now wishes to take a new step: to offer the global market a modern, elegant and accessible digital platform, in order to extend its legacy far beyond British borders.</p>

            <p class="h3">With this in mind, he personally chose you to oversee the design and development of this ambitious auction platform, reflecting his expertise, refinement and vision.</p>
        </div>
    </section>
    <section class="section__newsletter">
        <h2>Newsletter</h2>
        <div class="section__newsletter__conteneur">
            <div class="section__newsletter__contenu">
                <div>
                    <img src="{{ asset }}img/newsletter-svgrepo-com.png" alt="newsletter image">
                </div>
                <form class="section__newsletter__contenu__email">
                    <label for="email" class="h3">To receive our latest news and philatelic advice.</label>
                    <input type="email" id="email" placeholder="john@doe.com">
                    <button class="bouton" type="submit">Send</button>
                </form>
            </div>
            <div class="section__newsletter__contenu">
                <div>
                    <img src="{{ asset }}img/newspaper-svgrepo-com.png" alt="newsletter image">
                </div>
                <div class="section__newsletter__contenu__news">
                    <h3>To follow the latest news.</h3>
                    <button class="bouton">News</button>
                </div>
            </div>
        </div>
    </section>
</div>

{{ include('layouts/footer.php') }}