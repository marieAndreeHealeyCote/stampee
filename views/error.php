{{ include ('layouts/header.php', {title:'Registration'})}}

<div class="conteneur">
    <div class="error">Error: {{ msg }}</div>
    <img src="{{ asset }}img/404.webp" alt="image erreur 404 ">
</div>
{{ include ('layouts/footer.php')}}