{{ include ('layouts/header.php', {title:'Profile'})}}

<div class="section__aparte__conteneur">
    <aside class="section__aparte">
        <h2>My Profile</h2>
        <section class="section__aparte__condition">
            <div>
                <a href="{{ base }}/user/my-stamps">
                    <h3>My Stamps</h3>
                </a>
            </div>
            <div>
                <a href="{{ base }}/user/my-bids">
                    <h3>My Bids</h3>
                </a>
            </div>
            <div>
                <a href="{{ base }}/user/my-auctions">
                    <h3>My Auctions</h3>
                </a>
            </div>
        </section>
    </aside>
</div>

<p class="h3">Hi {{ session.user_name }} !</p>

<div class="section__profil">
    <div class="section__profil__timbre">
        <h3>My Stamps</h3>
        {% for stamp in stamps %}
        <article>
            <div><img src="{{ asset }}img/britishLevant.webp"></div>
            <ul>
                <li><strong>Name : </strong>{{ stamp.name }}</li>
                <li><strong>Year : </strong>{{ stamp.year }}</li>
                <li><strong>Certification : </strong>{{ stamp.is_certified }}</li>
                <li><strong>Country : </strong>{{ stamp.country }}</li>
                <li><strong>Color : </strong>{{ stamp.color }}</li>
                <li><strong>Condition : </strong>{{ stamp.condition }}</li>
            </ul>
            <a href="{{ base }}/stamp/edit?id={{stamp.id}}">Edit</a>
            <a href="{{ base }}/stamp/delete?id={{stamp.id}}">Delete</a>
        </article>
        {% else %}
        <a href="{{ base }}/stamp/create">Add a first stamp</a>
        {% endfor %}
    </div>
    <div class="section__profil__mise">
        <h3>My Bids</h3>
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

{{ include ('layouts/footer.php')}}