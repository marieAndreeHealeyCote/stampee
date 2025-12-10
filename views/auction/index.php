{{ include ('layouts/header.php', {title:'Stamp'})}}
<div class="section__detail-enchere">
    <article>
        <div class="section__detail-enchere__carte-image">
            <figure class="section__detail-enchere__carte-image__timbre">
                <img
                    class="section__detail-enchere__carte-image__timbre-large"
                    src="{{ base }}/{{ inputs.upload }}"
                    alt="grand format timbre">
                <img
                    class="section__detail-enchere__carte-image__timbre-petit "
                    src="{{ base }}/{{ inputs.upload }}"
                    alt="petit format timbre">
            </figure>
        </div>
        <div class="section__detail-enchere__carte-description__contenu">
            <h2>
                {{ stamp.name }}
            </h2>
            <div class="section__detail-enchere__carte-description__contenu__montant">
                <div class="section__detail-enchere__carte-description__contenu__montant__limite">
                    <h3> &pound;{{ auction.floor_price }}</h3>
                    <h4>Start date: {{ auction.start_date }}</h4>
                    <h4>End date: {{ auction.end_date }}</h4>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__montant__saisie">
                    <div>
                        <label for="montant-enchere">Place Bid</label>
                        <input type="text" id="montant-enchere">
                        <sup id="montant-enchere-minimum">Minimum &pound;{{ auction.floor_price }}</sup>
                    </div>
                    <button class="bouton-action">Place Bid</button>
                    <sup id="montant-enchere-courant" class="bordure-au-dessus">Current Bid &pound;{{ auction.floor_price }}</sup>
                </div>
            </div>
            <div class="section__detail-enchere__carte-description__contenu__avertissement">
                <p>
                    Condition: No faults. Grade: F(Fine) Please have a good look
                    through our catalog. There is a selection of GB and British
                    Commonwealth stamps to suit all levels of stamp collecting.
                    Thank you!
                </p>
            </div>
            <div class="section__detail-enchere__carte-description__contenu__surveiller">
                <button class="bouton-suivre">WATCH ITEM</button>
            </div>
        </div>
    </article>
</div>

{{ include ('layouts/footer.php') }}