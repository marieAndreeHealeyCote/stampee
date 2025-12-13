<div class="section__liste-timbres__conteneur">
    <h2>Welcome back, {{ session.user_name }}</h2>
    <aside class="section__liste-timbres__aparte">
        <a href="{{base}}/stamp/create" class="bouton bouton-ajouter">Add stamps</a>
        <a href="{{ base }}/my-stamps">
            <h3>My stamps</h3>
        </a>
        <a href="{{ base }}/my-bids">
            <h3>My bids</h3>
        </a>
        <a href="{{ base }}/my-auctions">
            <h3>My auctions</h3>
        </a>
        <a href="{{ base }}/my-favorites">
            <h3>My favorites</h3>
        </a>
    </aside>