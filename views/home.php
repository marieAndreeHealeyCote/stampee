{{ include('layouts/header.php', {'title': 'Homepage'}) }}
<div class="section__nav-principale__hero">
    <div class="section__nav-principale__hero__contenu">
        <h2>No Reserve Auction Event</h2>
        <h3>Ends Tonight | 19th Century US & Worldwide Stamps</h3>
        <button class="bouton bouton-enchere">BID NOW</button>
    </div>
    <img src="{{ asset }}img/Denninger.webp" alt="image timbre hero">
</div>

<h1>{{ data }}</h1>
<div class="image">
    <img src="{{ asset }}img/Lord-Stampee.webp" alt="Lord Stampee">
</div>

{{ include('layouts/footer.php') }}