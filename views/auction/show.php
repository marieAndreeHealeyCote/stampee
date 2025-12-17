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
                    <li><a href="{{base}}/bid/create">Listing</a></li>
                    <li><a class="section__detail-enchere__carte-description__menu__lien-actif" href="{{base}}/auction/show">Details</a></li>
                    <li><a href="{{base}}/auction/history">History</a></li>
                    <li><a href="{{base}}/auction/question">Question</a></li>
                </ul>
            </div>
            <div class="section__detail-enchere__carte-description__contenu">
                <div class="section__detail-enchere__carte-description__contenu__item-specifiques">
                    <h3>Item Specifics</h3>
                    <h4>Auction id: </h4>
                    <p>{{ listAuctions.id }}</p>
                    <h4>Current offer:</h4>
                    <p>Price : CAD {{ listAuctions.highest_bid.bid}}</p>
                    <h4>Floor price:</h4>
                    <p>CAD {{ listAuctions.floor_price }}</p>
                    <h4>Close at :</h4>
                    <p>{{ listAuctions.date_end }}</p>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__item-description">
                    <h3>Item Description</h3>
                    <h4>Name :</h4>
                    <p>{{ selectStamp.name }}</p>
                    <h4>Year:</h4>
                    <p>{{ selectStamp.year }}</p>
                    <h4>Certification :</h4>
                    <p>{{ selectStamp.is_certified }}</p>
                    <h4>Country :</h4>
                    <p>{{ selectStamp.country_name }}</p>
                    <h4>Color :</h4>
                    <p>{{ selectStamp.color_name }}</p>
                    <h4>Condition :</h4>
                    <p>{{ selectStamp.condition_name }}</p>
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
                    {% if is_favorite %}
                    <a href="{{base}}/remove-favorite?id={{ listAuctions.id }}" class="bouton bouton-suivre" onclick="return confirm('Remove to your favorites ?')">Remove from favorites</a>
                    {% else %}
                    <a href="{{base}}/add-favorite?id={{ listAuctions.id }}" class="bouton bouton-suivre" onclick="return confirm('Add to your favorites ?')">Add to favorites</a>
                    {% endif %}
                </div>
            </div>
        </div>
    </article>
</div>

{{ include('layouts/footer.php') }}