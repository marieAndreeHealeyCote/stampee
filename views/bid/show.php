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
                    <li><a class="section__detail-enchere__carte-description__menu__lien-actif" href="{{base}}/bid/show">Details</a></li>
                    <li><a href="{{base}}/bid/history">History</a></li>
                    <li><a href="{{base}}/bid/question">Question</a></li>
                </ul>
            </div>
            <div class="section__detail-enchere__carte-description__contenu">
                {% for auction in listAuctions %}
                <div class="section__detail-enchere__carte-description__contenu__item-specifiques">
                    <h3>Item Specifics</h3>
                    <h4>Auction id: </h4>
                    <p>{auction.id}</p>
                    <h4>Current offer:</h4>
                    <p>{bid.bid}</p>
                    <h4>Floor price:</h4>
                    <p>{auction.floor_price}</p>
                    <h4>Close at :</h4>
                    <p>{auction.date_end}</p>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__item-description">
                    <h3>Item Description</h3>
                    <h4>Name :</h4>
                    <p>{stamp.name}</p>
                    <h4>Year:</h4>
                    <p>{stamp.year}</p>
                    <h4>Certification :</h4>
                    <p>{stamp.is_certified}</p>
                    <h4>Country :</h4>
                    <p>{stamp.country_name}</p>
                    <h4>Color :</h4>
                    <p>{stamp.color_name}</p>
                    <h4>Condition :</h4>
                    <p>{stamp.condition_name}</p>
                </div>
                {% endfor %}
                <div class="section__detail-enchere__carte-description__contenu__avertissement">
                    <p>
                        Please have a good look through our catalog.
                        There is a selection of Lord Stampee's favorites stamps
                        to suit all levels of stamp collecting.
                        Thank you!
                    </p>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__surveiller">
                    <button href="{{base}}/user/my-bids" class="bouton bouton-suivre" onclick="return confirm('Add to your favorites ?')">Add to favorites</button>
                </div>
            </div>
        </div>
    </article>
</div>

{{ include('layouts/footer.php') }}