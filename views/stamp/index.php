{{ include ('layouts/header.php', {title:'Stamp'})}}
<div class="section__detail-enchere">
    {% for stamp in listStamps %}
    <article>
        <div class="section__detail-enchere__carte-image">
            <figure class="section__detail-enchere__carte-image__timbre">
                {% for image in stamp.listImages %}
                {% if loop.first %}
                <img
                    class="section__detail-enchere__carte-image__timbre-large"
                    src="{{ base }}/{{ image.url }}"
                    alt="grand format timbre">
                {% else %}
                <img
                    class="section__detail-enchere__carte-image__timbre-petit "
                    src="{{ base }}/{{ image.url }}"
                    alt="petit format timbre">
                {% endif %}
                {% endfor %}
            </figure>
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
                <p>{{ stamp.country_name }}</p>
                <h4>Color:</h4>
                <p>{{ stamp.color_name }}</p>
                <h4>Condition:</h4>
                <p>{{ stamp.condition_name }}</p>
            </div>
            <div class="section__detail-enchere__carte-description__contenu__surveiller">
                <a class="bouton bouton-suivre" href="{{base}}/stamp/show?id={{ stamp.id }}">Show item</a>
            </div>
        </div>
    </article>
    {% endfor %}
</div>
{{ include ('layouts/footer.php') }}