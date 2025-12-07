{{ include ('layouts/header.php', {title:'Register'})}}

<div class="section__aparte__conteneur">
    <aside class="section__aparte">
        <h2>My Profile</h2>
        <section class="section__aparte__certification">
            <a href="#">
                <h3>My Stamps</h3>
            </a>
            <a href="#">
                <h3>My Bids</h3>
            </a>
            <a href="#">
                <h3>My auctions</h3>
            </a>
        </section>
    </aside>
</div>

<p class="h3">Hi {{ session.user_name }} !</p>

<div class="section__profil">
    <form action="">
        <h2>Information</h2>
        <p>Name:</p>
        <p>Email:</p>
        <p>Password:</p>
    </form>
</div>

{{ include ('layouts/footer.php')}}