{{ include('layouts/header.php', {title:'My favorites'}) }}

{{ include('layouts/aside-stamp.php') }}

{% if listFavorites is empty %}
<p class="h3">You have no favorite bids.</p>
{% else %}
<div class="section__liste-timbre__grille">
    {% for fav in listFavorites %}
    <article class="section__liste-timbre__grille__carte">
        <figure class="section__liste-timbre__grille__carte__image">
            {% if fav.stamp_image %}
            <img
                class="section__liste-timbre__grille__carte__image__timbre-petit"
                src="{{ base }}/{{ fav.stamp_image.url }}"
                alt="{{ fav.stamp_name }}">
            {% endif %}
        </figure>
        <div class="section__liste-timbre__grille__carte__item">
            <h3>Item Specifics</h3>
            <h4>Stamp name:</h4>
            <p>{{ fav.stamp_name }}</p>
            <h4>Floor price:</h4>
            <p>CAD {{ fav.floor_price }}</p>
            <h4>Auction dates:</h4>
            <p>{{ fav.date_start }} - {{ fav.date_end }}</p>
            <h4>Favorite marked by:</h4>
            <p>{{ fav.lord_favorite }}</p>
        </div>
        <div class="section__liste-timbre__grille__carte__surveiller">
            <a class="bouton bouton-suivre" href="{{ base }}/auction/show?auction_id={{ fav.auction_id }}">Show item</a>
        </div>
    </article>
    {% endfor %}
</div>
{% endif %}