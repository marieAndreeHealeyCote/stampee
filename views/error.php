{{ include ('layouts/header.php', {title:'Registration'})}}

<div class="conteneur">
    <span class="h3 error">Error: {{ msg }}</span>
    <img src="{{ asset }}img/404.webp" alt="image erreur 404 ">
</div>
{{ include ('layouts/footer.php')}}