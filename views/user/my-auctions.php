{{ include ('layouts/header.php', {title:'My auctions'})}}
<div class="page-profil">
    <h2>Welcome back, {{ session.user_name }}</h2>
    <aside class="section__profil__aparte">
        <a href="{{ base }}/user/my-stamps">
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
        <div class="section__profil__encheres">
        </div>
    </div>

    {{ include ('layouts/footer.php')}}