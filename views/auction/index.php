{{ include ('layouts/header.php', {title:'Auction'})}}

<div class="section__catalogue__conteneur">
    {{ include ('layouts/aside-auction.php') }}
    <div class="section__catalogue__contenu">
        <section class="section__catalogue-enchere-en-cours">
            <h2>Current Auctions</h2>
            <div class="section__catalogue-enchere-en-cours__grille">
                {% for auction in listAuctions %}
                <article class="section__catalogue-enchere-archives__grille__carte">
                    <img
                        class="section__catalogue-enchere-archives__grille__carte__image"
                        src="{{ base }}/{{ auction.stamp_image.url }}"
                        alt="image timbre carte" />
                    <div class="section__catalogue-enchere-archives__grille__carte__detail">
                        <h3>
                            {{ auction.stamp_name }}
                        </h3>
                        <ul>
                            <li>
                                <h4>Period of activity</h4>
                                <ul>
                                    <li>Start date : {{ auction.date_start }}</li>
                                    <li>End Date : {{ auction.date_end }}</li>
                                </ul>
                            </li>
                            <li>
                                <h4>Floor price</h4>
                                <p>CAD {{ auction.floor_price }}</p>
                            </li>
                            <li>
                                <h4>Current Offer</h4>
                                <p>Price : CAD {{ auction.highest_bid.bid}}</p>
                            </li>
                            <li>
                                <h4>Bet Quantity</h4>
                                <p>{{ auction.bid }}</p>
                            </li>
                            <li>
                                <h4>Lord's Favorite</h4>
                                <p>{{ auction.lord_favorite ? "Selected" : "Not selected" }}</p>
                            </li>
                        </ul>
                        <a href="{{base}}/bid/create?id={{ auction.id }}" class=" bouton bouton-enchere">BID NOW</a>
                    </div>
                </article>
                {% endfor %}
            </div>
        </section>

        <section class="section__catalogue-enchere-archives">
            <h2>Past Auctions</h2>
            <div class="section__catalogue-enchere-archives__grille">
                {% for auction in listAuctions %}
                <article class="section__catalogue-enchere-archives__grille__carte">
                    <img
                        class="section__catalogue-enchere-archives__grille__carte__image"
                        src="{{ base }}/{{ auction.stamp_image.url }}"
                        alt="image timbre carte 7" />
                    <div class="section__catalogue-enchere-archives__grille__carte__detail">
                        <h3>
                            {{ auction.stamp_name }}
                        </h3>
                        <ul>
                            <li>
                                <h4>Period of activity</h4>
                                <ul
                                    class="section__catalogue-enchere-archives__grille__carte__liste">
                                    <li>Start date : {{ auction.date_start }}</li>
                                    <li>End Date : {{ auction.date_end }}</li>
                                </ul>
                            </li>
                            <li>
                                <h4>Floor price</h4>
                                <p>CAD {{ auction.floor_price }}</p>
                            </li>
                            <li>
                                <h4>Current Offer</h4>
                                <ul
                                    class="section__catalogue-enchere-archives__grille__carte__liste">
                                    <li>Price : CAD {{ bid.bid }}</li>
                                    <li>Member Name : {{ user.name }}</li>
                                </ul>
                            </li>
                            <li>
                                <h4>Bet Quantity</h4>
                                <p>{{ auction.bid }}</p>
                            </li>
                            <li>
                                <h4>Lord's Favorite</h4>
                                <p>{{ auction.lord_favorite ? "Selected" : "Not selected" }}</p>
                            </li>
                        </ul>
                        <button class="bouton bouton-enchere">COMMENTS</button>
                    </div>
                </article>
                {% endfor %}
            </div>
        </section>
    </div>
</div>
{{ include ('layouts/footer.php') }}