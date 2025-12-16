{{ include ('layouts/header.php', {title:'Stamp'})}}
{{ include ('layouts/aside-stamp.php')}}

<div class="section__liste-timbre__grille">
    {% for stamp in listStamps %}
    <article class="section__liste-timbre__grille__carte">
        <figure class="section__liste-timbre__grille__carte__image">
            <img
                class="section__liste-timbre__grille__carte__image__timbre-petit"
                src="{{ base }}/{{ stamp.image.url }}"
                alt="petit format timbre">
        </figure>
        <div class="section__liste-timbre__grille__carte__item ">
            <h3>Item Specifics</h3>
            <h4>Stamp id:</h4>
            <p>{{ stamp.id }}</p>
            <h4>Name:</h4>
            <p>{{ stamp.name }}</p>
            <h4>Year:</h4>
            <p>{{ stamp.year }}</p>
            <h4>Certification:</h4>
            <p>{{ stamp.is_certified ? "certified" : "not certified" }}</p>

            <div class="section__liste-timbre__grille__carte__item ">
                <h3>Item Description</h3>
                <h4>Country:</h4>
                <p>{{ stamp.country_name }}</p>
                <h4>Color:</h4>
                <p>{{ stamp.color_name }}</p>
                <h4>Condition:</h4>
                <p>{{ stamp.condition_name }}</p>
            </div>
            <div class="section__liste-timbre__grille__carte__surveiller">
                <a class="bouton bouton-suivre" href="{{base}}/stamp/show?id={{ stamp.id }}">Show item</a>
            </div>
        </div>
    </article>
    {% endfor %}
</div>

{{ include ('layouts/footer.php') }}