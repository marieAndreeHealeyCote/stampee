{{ include ('layouts/header.php', {title:'History'})}}

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
                    <li><a href="{{base}}/auction/show">Details</a></li>
                    <li><a class="section__detail-enchere__carte-description__menu__lien-actif" href="{{base}}/auction/history">History</a></li>
                    <li><a href="{{base}}/auction/question">Question</a></li>
                </ul>
            </div>
            <div class="section__detail-enchere__carte-description__contenu">
                <div class="section__detail-enchere__carte-description__contenu__historique">
                    {% for bid in listBids %}
                    <h3>Bids History</h3>
                    <p>{bid.bid} </p>
                    {% endfor %}
                </div>
                <div class="section__detail-enchere__carte-description__contenu__plus">
                    <h3>More Items from Lord Reginald Stampee</h3>
                    <div class="section__detail-enchere__carte-description__contenu__plus__liens">
                        <div class="section__detail-enchere__carte-description__contenu__plus__lien">
                            <a href="#"><img src="{{asset}}/img/falklandStamp.webp" alt="image timbre"></a>
                            <a href="#">Falkland Islands Qeii Sg434, 1982 10p Siskin WMK Uprig...</a>
                        </div>
                        <div class="section__detail-enchere__carte-description__contenu__plus__lien">
                            <a href="#"><img src="{{asset}}/img/falklandStamp.webp" alt="image timbre"></a>
                            <a href="#">Falkland Islands Qeii Sg434, 1982 10p Siskin WMK Uprig...</a>
                        </div>
                        <div class="section__detail-enchere__carte-description__contenu__plus__lien">
                            <a href="#"><img src="{{asset}}/img/falklandStamp.webp" alt="image timbre"></a>
                            <a href="#">Falkland Islands Qeii Sg434, 1982 10p Siskin WMK Uprig...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>

{{ include('layouts/footer.php') }}