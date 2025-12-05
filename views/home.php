{{ include('layouts/header.php', {'title': 'Homepage'}) }}
<div class="section__nav-principale__hero">
    <div class="section__nav-principale__hero__contenu">
        <h2>No Reserve Auction Event</h2>
        <h3>Ends Tonight | 19th Century US & Worldwide Stamps</h3>
        <button class="bouton bouton-enchere">BID NOW</button>
    </div>
    <img src="{{ asset }}img/Denninger.webp" alt="image timbre hero">
</div>
<div class="main">
    {%if guest is empty %}
    Hi {{ session.user_name }} !
    {% endif %}
    <h1>{{ data }}</h1>
    <section class="section__mission">
        <div class="section__mission__image">
            <img src="{{ asset }}img/collection-de-timbres.jpg" alt="Plusieurs timbres de différentes couleurs étalés">
        </div>
        <div class="section__mission__description">
            <h2>Mission</h2>
            <p>The Stampee platform's mission is to offer the philatelic world a prestigious, reliable, and accessible digital space where the passion for rare stamps meets modernity. Faithful to the vision of Lord Reginald Stampee, Duke of Worcestershire, it aims to extend the excellence and refinement of his renowned auctions online, making them available to collectors worldwide.</p>

            <h3>Open up the auctions to the widest possible audience, within a safe and structured framework.</h3>
            <p>Each member can create an account, publish auctions, place bids and track their history, in order to participate fully and transparently in the rare stamp market.</p>

            <h3>To allow users to quickly find the desired auctions, whether they are active or archived.</h3>
            <p>Thanks to simple and consistent navigation — “as simple as a stamp”, as the Lord wished — the user can explore auctions according to a variety of criteria: country of origin, year, condition, print run, certification, and more.</p>

            <h3>Ensure universal accessibility across all devices.</h3>
            <p>The interface, designed in a classic, neat and uniform style, is optimized to offer a smooth experience on computer, tablet and mobile, so that collectors everywhere can participate in the auctions.</p>

            <h3>To showcase exceptional pieces.</h3>
            <p>Lord Stampee's carefully selected "Favorites" are highlighted to guide collectors to the most remarkable stamps.</p>

            <h3>To offer a visual immersion that faithfully meets the expectations of philatelists.</h3>
            <p>In response to Lord Stampee's special wish — "to see the stamps up close" — the platform offers a detailed visual exploration, including high-resolution images and zoom features to fully appreciate the fineness and condition of the stamps.</p>

            <h3>To preserve and document philatelic history.</h3>
            <p>The archived auctions remain available for consultation, organization and commentary, in order to constitute a living memory of the sales, exceptional pieces and their history.</p>

            <h3>To provide a cohesive, elegant environment worthy of Lord Stampee's prestige.</h3>
            <p>The site's aesthetics, favoring blue or red depending on the Lord's choice, remain understated, classic and refined, meeting the expectations of an expert, demanding clientele attached to the traditions of philately.</p>
        </div>
    </section>
    <section class="section__enchere"></section>
    <section class="section__lord">
        <div class="section__lord__image">
            <img src="{{ asset }}img/Lord-Stampee.webp" alt="Lord Stampee">
        </div>
        <div class="section__lord__description">
            <h2>Lord Reginald Stampee III</h2>
            <p>From his early childhood in the mid-1950s, Lord Reginald Stampee, Duke of Worcesseshear, nurtured an unwavering passion for philately. A learned collector, a discreet but influential figure among great enthusiasts of rare stamps, he dedicated his life to gathering, studying and showcasing the most precious pieces of postal history.</p>

            <p>Renowned throughout the United Kingdom for its exclusive auctions, which attract the world's most prestigious philatelists every year, Lord Stampee now wishes to take a new step: to offer the global market a modern, elegant and accessible digital platform, in order to extend its legacy far beyond British borders.</p>

            <p>With this in mind, he personally chose you to oversee the design and development of this ambitious auction platform, reflecting his expertise, refinement and vision.</p>
        </div>
    </section>
</div>

{{ include('layouts/footer.php') }}