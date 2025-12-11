{{ include ('layouts/header.php', {title:'My stamps'})}}

<div class="page-profil">
    <h2>Welcome back, {{ session.user_name }}</h2>
    <aside class="section__profil__aparte">
        <a href="{{ base }}/my-stamps">
            <h3>My stamps</h3>
        </a>
        <a href="{{ base }}/user/my-bids">
            <h3>My bids</h3>
        </a>
        <a href="{{ base }}/user/my-auctions">
            <h3>My auctions</h3>
        </a>
        <a href="{{ base }}/user/my-favorites">
            <h3>My favorites</h3>
        </a>
    </aside>
    <div class="section__profil">
        <div class="section__profil__timbre">
            <h3>My stamps</h3>
            {% for stamp in stamps %}
            <article>
                <div>
                    {% for image in listImages %}
                    <img src="{{ base }}/{{ image.url }}">
                    {% endfor %}
                </div>
                <ul>
                    <p><strong>Name : </strong>{{ inputs.name }}</p>
                    <p><strong>Year : </strong>{{ inputs.year }}</p>
                    <p><strong>Certification : </strong>{{ inputs.is_certified }}</p>
                    <p><strong>Country : </strong>{{ inputs.country }}</p>
                    <p><strong>Color : </strong>{{ inputs.color }}</p>
                    <p><strong>Condition : </strong>{{ inputs.condition }}</p>
                </ul>
                <a href="{{ base }}/stamp/edit?id={{stamp.id}}" class="bouton bouton-modifier" onclick="return confirm('Edit your stamp ?')">Edit</a>
                <a href="{{ base }}/stamp/delete?id={{inputs.id}}" class="bouton bouton-supprimer" onclick="return confirm('Delete your stamp ?')">Delete</a>
            </article>
            {% endfor %}
        </div>
    </div>

    {{ include ('layouts/footer.php')}}