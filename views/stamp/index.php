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
        <div class="section__detail-enchere__carte-description">
            <div class="section__detail-enchere__carte-description__menu">
                <ul>
                    <li><a href="#">Listing</a></li>
                    <li><a class="section__detail-enchere__carte-description__menu__lien-actif" href="#">Details</a></li>
                    <li><a href="#">History</a></li>
                    <li><a href="#">Question</a></li>
                </ul>
            </div>
            <div class="section__detail-enchere__carte-description__contenu">
                <div class="section__detail-enchere__carte-description__contenu__item-specifiques">
                    <h3>Item Specifics</h3>
                    <h4>Stamp id: </h4>
                    <p>{{ stamp.id }}</p>
                    <h4>Name:</h4>
                    <p>{{ stamp.name }}</p>
                    <h4>Year:</h4>
                    <p>{{ stamp.year }}</p>
                    <h4>Certification:</h4>
                    <p>{{ stamp.is_certified }}</p>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__item-description">
                    <h3>Item Description</h3>
                    <h4>Country:</h4>
                    <p>{{ stamp.country }}</p>
                    <h4>Color:</h4>
                    <p>{{ stamp.color }}</p>
                    <h4>Condition:</h4>
                    <p>{{ stamp.condition }}</p>
                </div>
                <div class="section__detail-enchere__carte-description__contenu__surveiller">
                    <button class="bouton-suivre">WATCH ITEM</button>
                </div>
            </div>
        </div>
    </article>
</div>
{{ include ('layouts/footer.php') }}