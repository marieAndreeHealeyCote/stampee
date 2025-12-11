{{ include ('layouts/header.php', {title:'Stamp'})}}

<h1>Stamp created</h1>

<div class="conteneur">
    <form method="post">
        <p><strong>Name : </strong>{{ inputs.name }}</p>
        <p><strong>Year : </strong>{{ inputs.year }}</p>
        <p><strong>Certification : </strong>{{ inputs.is_certified }}</p>
        <p><strong>Country : </strong>{{ inputs.country }}</p>
        <p><strong>Color : </strong>{{ inputs.color }}</p>
        <p><strong>Condition : </strong>{{ inputs.condition }}</p>
        {% for image in listImages %}
        <img src="{{ base }}/{{ image.url }}">
        {% endfor %}
        <a href="{{ base }}/stamp/edit?id={{inputs.id}}" class="bouton bouton-modifier">Edit</a>
        <input type="hidden" name="id" value="{{ inputs.id }}">
        <a href="{{ base }}/profile" class="bouton bouton-action">Back</a>
    </form>
</div>

{{ include ('layouts/footer.php')}}