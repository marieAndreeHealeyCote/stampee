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
                    <li><a class="section__detail-enchere__carte-description__menu__lien-actif" href="{{base}}/bid/create?auction_id={{ auction_id }}">Listing</a></li>
                    <li><a href="{{base}}/auction/show?auction_id={{ auction_id }}">Details</a></li>
                    <li><a href="{{base}}/auction/history?auction_id={{ auction_id }}">History</a></li>
                    <li><a href="{{base}}/bid/question?auction_id={{ auction_id }}">Question</a></li>
                </ul>
            </div>
            <div class="section__detail-enchere__carte-description__contenu">
                <h2>
                    {{ selectStamp.name }}, {{ selectStamp.year }}, {{ selectStamp.country_name }}, {{ selectStamp.condition_name }}.
                    At CAD {{selectAuction.floor_price}}. {{ selectStamp.is_certified ? "Certified" : "Not certified" }}
                </h2>
                <div class="section__detail-enchere__carte-description__contenu__montant">
                    <div class="section__detail-enchere__carte-description__contenu__montant__limite">
                        <h3>CAD {{ selectAuction.floor_price }}</h3>
                        <h4>Close at : {{ selectAuction.date_end }}</h4>
                    </div>
                    <form method="POST" class="section__detail-enchere__carte-description__contenu__montant__saisie">
                        <div>
                            <label for="montant-enchere">Place bid</label>
                            <input type="number" name="bid" id="montant-enchere">
                            <sup id="montant-enchere-minimum">Minimum CAD {{ selectAuction.floor_price }}</sup>
                        </div>
                        <button type="submit" class="bouton bouton-action">Place Bid</button>
                        <input type="hidden" name="auction_id" value="{{ auction_id }}">
                        <sup id="montant-enchere-courant" class="bordure-au-dessus">Current Bid CAD {{ selectAuction.highest_bid.bid }}</sup>
                    </form>
                    {% if errors.bid is defined %}
                    <span class="error">{{ errors.bid }}</span>
                    {% endif %}
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