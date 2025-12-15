{{ include ('layouts/header.php', {title:'Profile'})}}

{{ include ('layouts/aside-stamp.php')}}

<div class="section__profil">
    <div class="section__profil__timbre">
        <h3>My stamps</h3>
        {% for stamp in listStamps %}
        <article>
            <div>
                {% for image in listImages %}
                <img src="{{ base }}/{{ image.url }}">
                {% endfor %}
            </div>
            <ul>
                <li><strong>Name : </strong>{{ stamp.name }}</li>
                <li><strong>Year : </strong>{{ stamp.year }}</li>
                <li><strong>Certification : </strong>{{ stamp.is_certified }}</li>
                <li><strong>Country : </strong>{{ stamp.country }}</li>
                <li><strong>Color : </strong>{{ stamp.color }}</li>
                <li><strong>Condition : </strong>{{ stamp.condition }}</li>
            </ul>
            <a href="{{ base }}/stamp/edit?id={{stamp.id}}" class="bouton bouton-modifier" onclick="return confirm('Edit your stamp ?')">Edit</a>
            <a href="{{base}}/stamp/delete?id={{inputs.id}}" class="bouton bouton-supprimer" onclick="return confirm('Delete your stamp  ?')">Delete</a>
        </article>
        {% else %}
        <a href="{{ base }}/stamp/create">Add a first stamp</a>
        {% endfor %}
    </div>
    <div class="section__profil__mise">
        <h3>My bids</h3>
        {% for bid in bids %}
        <article>
            TODO
        </article>
        {% else %}
        <a href="{{ base }}/auctions">Look for auctions to bid on</a>
        {% endfor %}
    </div>
    <div class="section__profil__enchere">
        <h3>My auctions</h3>
        {% for auction in auctions %}
        <article>
            TODO
        </article>
        {% else %}
        <a href="{{ base }}/stamps">Create my first auction</a>
        {% endfor %}
    </div>
    <div class="section__profil__favoris">
        <h3>My favorites</h3>
        {% for favorite in favorites %}
        <article>
            TODO
        </article>
        {% else %}
        <a href="{{ base }}/auctions">Look for auctions</a>
        {% endfor %}
    </div>
</div>
</div>


{{ include ('layouts/footer.php')}}