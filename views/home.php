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
    <h1>Welcome all philatelists</h1>
    <section class="section__mission">
        <div class="section__mission__image">
            <img src="{{ asset }}img/collection-de-timbres.jpg" alt="Plusieurs stamps de différentes couleurs étalés">
        </div>
        <div class="section__mission__description">
            <h2>Mission</h2>
            <p class="h4">The Stampee platform's mission is to offer the philatelic world a prestigious, reliable, and accessible digital space where the passion for rare stamps meets modernity. The mission is to :</p>

            <ul class="">
                <li>
                    Open up the auctions to the widest possible audience, within a safe and structured framework.
                </li>
                <li>
                    Allow users to quickly find the desired auctions, whether they are active or archived.
                </li>
                <li>
                    Ensure universal accessibility across all devices.
                </li>
                <li>
                    Showcase exceptional pieces.
                </li>
                <li>
                    Offer a visual immersion that faithfully meets the expectations of philatelists.
                </li>
                <li>
                    Preserve and document philatelic history.
                </li>
                <li>
                    Provide a cohesive, elegant environment worthy of Lord Stampee's prestige.
                </li>
            </ul>
        </div>
    </section>
    <div class="section__enchere">
        <section class="section__catalogue-enchere-en-cours">
            <h2>Featured auctions</h2>
            <div class="section__catalogue-enchere-en-cours__grille">
                {% for auction in listAuctions %}
                <article class="section__catalogue-enchere-archives__grille__carte">
                    <img class="section__catalogue-enchere-archives__grille__carte__image"
                        src="{{ base }}/{{ auction.stamp_image.url }}"
                        alt="image timbre carte">
                    <h3>
                        {{ auction.stamp_name }}
                    </h3>
                    <ul>
                        <li>
                            <h4>Period of activity</h4>
                            <ul>
                                <li>Start date: {{ auction.date_start }}</li>
                                <li>End Date: {{ auction.date_end }}</li>
                            </ul>
                        </li>
                        <li>
                            <h4>Floor price</h4>
                            <p>CAD {{ auction.floor_price }}</p>
                        </li>
                        <li>
                            <h4>Current Offer</h4>
                            <p>Price: CAD {{ auction.highest_bid.bid }}</p>
                        </li>
                        <li>
                            <h4>Bet Quantity</h4>
                            <p>{{ auction.total_bids }}</p>
                        </li>
                        <li>
                            <h4>Lord's Favorite</h4>
                            <p>{{ auction.lord_favorite ? "Selected" : "Not selected" }}</p>
                        </li>
                    </ul>
                    <a href="{{base}}/bid/create?auction_id={{ auction.id }}" class="bouton bouton-enchere">BID NOW</a>
                </article>
                {% endfor %}
            </div>
        </section>
    </div>
    <section class="section__lord">
        <div class="section__lord__image">
            <img src="{{ asset }}img/Lord-Stampee.webp" alt="Lord Stampee">
        </div>
        <div class="section__lord__description">
            <h2>Lord Reginald Stampee III</h2>
            <p class="h4">From his early childhood in the mid-1950s, <span class="h3">Lord Reginald Stampee</span>, Duke of Worcesseshear, nurtured an unwavering passion for philately. A learned collector, a discreet but influential figure among great enthusiasts of rare stamps, he dedicated his life to gathering, studying and showcasing the most precious pieces of postal history.
            </p>

            <p class="h4">Renowned throughout the United Kingdom for its exclusive auctions, which attract the world's most prestigious philatelists every year, <span class="h3">Lord Reginald Stampee</span> now wishes to take a new step: to offer the global market a modern, elegant and accessible digital platform, in order to extend its legacy far beyond British borders.</p>

            <p class="h4">With this in mind, he personally chose you to oversee the design and development of this ambitious auction platform, reflecting his expertise, refinement and vision.</p>

            <p class="h4">Faithful to the vision of <span class="h3">Lord Reginald Stampee</span>, it aims to extend the excellence and refinement of his renowned auctions online, making them available to collectors worldwide.</p>
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
                    <button class="bouton bouton-loupe" type="submit">Send</button>
                </form>
            </div>
            <div class="section__newsletter__contenu">
                <div>
                    <img src="{{ asset }}img/newspaper-svgrepo-com.png" alt="newsletter image">
                </div>
                <div class="section__newsletter__contenu__news">
                    <p class="h3">To follow the latest news on stamps, auctions and bridge.</p>
                    <button class="bouton bouton-loupe">News</button>
                </div>
            </div>
        </div>
    </section>
</div>

{{ include('layouts/footer.php') }}