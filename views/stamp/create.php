{{ include ('layouts/header.php', {title:'Stamp'})}}

<h2>Add a new stamp</h2>
<form method="POST" enctype="multipart/form-data">
    <div>
        <label for="name">Name :</label>
        <input type="text" name="name" id="name" value="{{ inputs.name ?? stamp.name }}">
    </div>
    {% if errors.name is defined %}
    <span class="error">{{ errors.name }}</span>
    {% endif %}

    <div>
        <label for="year">Year :</label>
        <input type="number" name="year" id="year" min="1900" max="2030" value="{{ inputs.year }}">
    </div>
    {% if errors.year is defined %}
    <span class="error">{{ errors.year }}</span>
    {% endif %}

    <div>
        <label for="is_certified">Certification :</label>
        <input type="text" name="is_certified" id="is_certified" value="{{ inputs.is_certified }}">
    </div>
    {% if errors.is_certified is defined %}
    <span class="error">{{ errors.is_certified }}</span>
    {% endif %}

    <div>
        <label for="country_id">Country :</label>
        <select name="country_id" id="country_id">
            <option value="" disabled>-- Sélectionner --</option>
            {% for country in listCountries %}
            <option value="{{ country_id }}" {% if country_id == country_id %} selected {% endif %}>
                {{ country.name }}
            </option>
            {% endfor %}
        </select>
    </div>
    {% if errors.country_id is defined %}
    <span class="error">{{ errors.country_id }}</span>
    {% endif %}

    <div>
        <label for="color_id">Color :</label>
        <select name="color_id" id="color_id">
            <option value="" disabled>-- Sélectionner --</option>
            {% for color in listColors %}
            <option value="{{ color_id }}" {% if editeur.id == inputs.color_id %} selected {% endif %}>
                {{ color.name }}
            </option>
            {% endfor %}
        </select>
    </div>
    {% if errors.color_id is defined %}
    <span class="error">{{ errors.color_id }}</span>
    {% endif %}

    <div>
        <label for="conditon_id">Condition :</label>
        <select name="conditon_id" id="conditon_id">
            <option value="" disabled>-- Sélectionner --</option>
            {% for color in listColors %}
            <option value="{{ conditon_id }}" {% if editeur.id == inputs.conditon_id %} selected {% endif %}>
                {{ condition.name }}
            </option>
            {% endfor %}
        </select>
    </div>
    {% if errors.conditon_id is defined %}
    <span class="error">{{ errors.conditon_id }}</span>
    {% endif %}

    <div>
        <label for="upload">Upload an image of your stamp</label>
        <input type="file" name="upload" id="upload">
    </div>
    {% if errors.upload is defined %}
    <span class="error">{{ errors.upload }}</span>
    {% endif %}

    <button type="submit" class="btn vert">Add</button>
    <a href="{{base}}/stamps" class="btn bleu">Cancel</a>
</form>

{{ include('layouts/footer.php') }}