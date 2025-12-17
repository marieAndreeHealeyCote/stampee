{{ include ('layouts/header.php', {title:'My favorites'})}}

{{ include ('layouts/aside-stamp.php')}}

<div class="section__liste-timbre__grille">
    {% for bid in listBids %}
    <article class="section__liste-timbre__grille__carte">
        <figure class="section__liste-timbre__grille__carte__image">
            <img
                class="section__liste-timbre__grille__carte__image__timbre-petit"
                src="{{ base }}/{{ bid.selectImage.url }}"
                alt="petit format timbre">
        </figure>
        <div class="section__liste-timbre__grille__carte__item ">
            <h3>Item Specifics</h3>
            <h4>Bid id:</h4>
            <p>{{ bid.id }}</p>
            <h4>Bid:</h4>
            <p>CAD {{ bid.bid }}</p>
            <h4>Date:</h4>
            <p>{{ bid.date }}</p>
            <div class="section__liste-timbre__grille__carte__item ">
                <h3>Item Description</h3>
                <h4>Name:</h4>
                <p>{{ bid.selectStamp.name }}</p>
                <h4>Year:</h4>
                <p>{{ bid.selectStamp.year }}</p>
                <h4>Certification:</h4>
                <p>{{ bid.selectStamp.is_certified ? "Certified" : "Not certified" }}</p>
                <div class="section__liste-timbre__grille__carte__item ">
                    <h3>Auction's information</h3>
                    <h4>Duration:</h4>
                    <p>{{ bid.selectAuction.date_start }} - {{ bid.selectAuction.date_end }}</p>
                    <h4>Price floor:</h4>
                    <p>CAD {{ bid.selectAuction.price_floor }}</p>
                </div>
            </div>
        </div>
        <div class="section__liste-timbre__grille__carte__surveiller">
            <a class="bouton bouton-suivre" href="{{base}}/auction/show?auction_id={{ bid.auction_id }}">Show item</a>
        </div>
    </article>
    {% endfor %}
</div>

{{ include ('layouts/footer.php')}}