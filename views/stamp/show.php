{{ include ('layouts/header.php', {title:'Stamp'})}}

<h1>Stamp created</h1>

<div class="conteneur">
    <img src="{{ base }}/{{ inputs.upload }}">
    <form method="post">
        <p><strong>Name: </strong>{{ inputs.name }}</p>
        <p><strong>Year: </strong>{{ inputs.year }}</p>
        <p><strong>Is certified: </strong>{{ inputs.is_certified }}</p>
        <p><strong>Country: </strong>{{ inputs.country }}</p>
        <p><strong>Color: </strong>{{ inputs.color }}</p>
        <p><strong>Condition: </strong>{{ inputs.color }}</p>
        <a href="{{ base }}/stamp/edit?id={{inputs.id}}" class="btn vert">Edit</a>
        <input type="hidden" name="id" value="{{ stamp.id }}">
        <a href="{{ base }}/stamps" class="btn bleu">Back</a>
    </form>
</div>

{{ include ('layouts/footer.php')}}