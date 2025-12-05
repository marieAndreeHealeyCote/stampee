{{ include ('layouts/header.php', {title:'Register'})}}
<div class="section__login">
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
            <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form method="post" class="section__login__form" novalidate>
        <h2>Login</h2>
        <label>Username
            <input type="email" name="username" value="{{ user.username }}" placeholder="john@doe.com">
        </label>
        <label>Password
            <input type="password" name="password">
        </label>
        <input type="submit" class="bouton" value="Submit">
    </form>
</div>
{{ include ('layouts/footer.php')}}