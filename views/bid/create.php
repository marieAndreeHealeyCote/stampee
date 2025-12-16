{{ include ('layouts/header.php', {title:'Bid'})}}

<div class="section__detail-enchere">

    <article>
        <div class="section__detail-enchere__carte-image">
            <figure class="section__detail-enchere__carte-image__timbre">
                {% for image in listImages %}
                {% if loop.first %}
                <div class="img-magnifier-container">
                    <img id="zoom-stamp" class="section__timbre__image__large" src="{{ base }}/{{ image.url }}">
                </div>
                {% endif %}
                <img class="section__timbre__form__image"
                    src="{{ base }}/{{ image.url }}">
                {% endfor %}
            </figure>
        </div>
        <div class="section__detail-enchere__carte-description">
            <div class="section__detail-enchere__carte-description__menu">
                <ul>
                    <li><a class="section__detail-enchere__carte-description__menu__lien-actif" href="{{base}}/bid/create">Listing</a></li>
                    <li><a href="{{base}}/bid/show">Details</a></li>
                    <li><a href="{{base}}/bid/history">History</a></li>
                    <li><a href="{{base}}/bid/question">Question</a></li>
                </ul>
            </div>
            <div class="section__detail-enchere__carte-description__contenu">
                <h2>
                    {{ stamp.name }}, {{ stamp.year }}, {{ stamp.country_name }}, {{ stamp.condition_name }}.
                    At CAD {auction.floor_price}. {{ stamp.is_certified ? "Certified" : "Not certified" }}
                </h2>
                <div class="section__detail-enchere__carte-description__contenu__montant">
                    <div class="section__detail-enchere__carte-description__contenu__montant__limite">
                        <h3>CAD {{ bid.bid }}</h3>
                        <h4>Close at : {{ auction.date_end }}</h4>
                    </div>
                    <div class="section__detail-enchere__carte-description__contenu__montant__saisie">
                        <div>
                            <label for="montant-enchere">Place Bid</label>
                            <input type="text" id="montant-enchere">
                            <sup id="montant-enchere-minimum">Minimum CAD {auction.floor_price}</sup>
                        </div>
                        <button class="bouton-action">Place Bid</button>
                        <sup id="montant-enchere-courant" class="bordure-au-dessus">Current Bid CAD {{ bid.bid }}</sup>
                    </div>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__avertissement">
                    <p>
                        Please have a good look through our catalog.
                        There is a selection of Lord Stampee's favorites stamps
                        to suit all levels of stamp collecting.
                        Thank you!
                    </p>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__surveiller">
                    <button href="{{base}}/user/my-bids" class="bouton bouton-suivre">Add to favorites</button>
                </div>
            </div>
        </div>
    </article>

</div>

{{ include('layouts/footer.php') }}