{{ include ('layouts/header.php', {title:'Register'})}}
<div class="section__login">

    <form method="post" class="section__login__form" novalidate>
        <h2>Register</h2>
        {% if errors is defined %}
        <div class="error">
            <ul>
                {% for error in errors %}
                <li>{{ error }}</li>
                {% endfor %}
            </ul>
        </div>
        {% endif %}
        <label>Name
            <input type="text" name="name" value="{{ user.name }}">
        </label>
        <label>Email
            <input type="email" name="email" value="{{ user.email }}" placeholder="john@doe.com">
        </label>
        <label>Password
            <input type="password" name="password">
        </label>
        <input type="submit" class="bouton" value="Submit">
    </form>
</div>
{{ include ('layouts/footer.php')}}