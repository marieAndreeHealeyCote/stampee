{{ include ('layouts/header.php', {title:'Stamp'})}}

<div class="section__timbre">
    <div class="section__timbre__form">
        <h2>Stamp's informations</h2>
        <p><strong>Name : </strong>{{ inputs.name }}</p>
        <p><strong>Year : </strong>{{ inputs.year }}</p>
        <p><strong>Certification : </strong>{{ inputs.is_certified }}</p>
        <p><strong>Country : </strong>{{ inputs.country }}</p>
        <p><strong>Color : </strong>{{ inputs.color }}</p>
        <p><strong>Condition : </strong>{{ inputs.condition }}</p>
        <div>
            {% for image in listImages %}
            <img class="section__timbre__form__image"
                src="{{ base }}/{{ image.url }}">
            {% endfor %}
        </div>
        {% if isAuctioned == false %}
        <a href="{{base}}/stamp/edit?id={{inputs.id}}" class="bouton bouton-modifier" onclick="return confirm('Edit your stamp ?')">Edit</a>
        <a href="{{base}}/stamp/delete?id={{inputs.id}}" class="bouton bouton-supprimer" onclick="return confirm('Delete your stamp ?')">Delete</a>
        {% endif %}
        <input type="hidden" name="id" value="{{inputs.id}}">
        <a href="{{base}}/profile" class="bouton bouton-retour">Back</a>
    </div>
</div>

{{ include ('layouts/footer.php')}}