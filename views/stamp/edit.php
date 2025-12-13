{{ include ('layouts/header.php', {title:'Edit Stamp'})}}
<div class="section__timbre">
    <form method="POST" enctype="multipart/form-data" class="section__timbre__form">
        <h2>Edit stamp</h2>
        <div>
            <label>Name :
                <input type="text" name="name" id="name" value="{{ inputs.name }}">
            </label>
        </div>
        {% if errors.name is defined %}
        <span class="error">{{ errors.name }}</span>
        {% endif %}

        <div>
            <label>Year :
                <input type="number" name="year" id="year" min="1901" max="2100" value="{{ inputs.year }}">
            </label>
        </div>
        {% if errors.year is defined %}
        <span class="error">{{ errors.year }}</span>
        {% endif %}

        <label>Is certified
            <input type="checkbox" name="is_certified" value="1" {% if is_certified == inputs.is_certified %} checked {% endif %}>
        </label>
        {% if errors.is_certified is defined %}
        <span class="error">{{ errors.is_certified }}</span>
        {% endif %}

        <div>
            <label>Country :
                <select name="country_id" id="country_id">
                    <option value="" disabled selected>-- Select --</option>
                    {% for country in listCountries %}
                    <option value="{{ country.id }}" {% if country.id == inputs.country_id %} selected {% endif %}>
                        {{ country.name }}
                    </option>
                    {% endfor %}
                </select>
            </label>

        </div>
        {% if errors.country_id is defined %}
        <span class="error">{{ errors.country_id }}</span>
        {% endif %}

        <div>
            <label>Color :
                <select name="color_id" id="color_id">
                    <option value="" disabled selected>-- Select --</option>
                    {% for color in listColors %}
                    <option value="{{ color.id }}" {% if color.id == inputs.color_id %} selected {% endif %}>
                        {{ color.name }}
                    </option>
                    {% endfor %}
                </select>
            </label>

        </div>
        {% if errors.color_id is defined %}
        <span class="error">{{ errors.color_id }}</span>
        {% endif %}

        <div>
            <label>Condition :
                <select name="condition_id" id="condition_id">
                    <option value="" disabled selected>-- Select --</option>
                    {% for condition in listConditions %}
                    <option value="{{ condition.id }}" {% if condition.id == inputs.condition_id %} selected {% endif %}>
                        {{ condition.name }}
                    </option>
                    {% endfor %}
                </select>
            </label>

        </div>
        {% if errors.condition_id is defined %}
        <span class="error">{{ errors.condition_id }}</span>
        {% endif %}

        <div class="section__timbre__upload">
            <label>Upload an image of your stamp
                <input type="file" name="upload[]" multiple required accept="image/png, image/jpeg, image/gif, image/webp">
            </label>
        </div>
        {% if errors.upload is defined %}
        <span class="error">{{ errors.upload }}</span>
        {% endif %}

        {% for image in listImages %}
        <img src="{{ base }}/{{ image.url }}">
        <a href="{{ base} }/image/delete?id={{ image.id }}" class="bouton bouton-supprimer" onclick="return confirm('Delete this image ?')">Delete</a>
        {% endfor %}

        <button type="submit" class="bouton bouton-modifier">Update</button>
        <a href="{{base}}/profile" class="bouton bouton-retour">Cancel</a>
    </form>
</div>

{{ include ('layouts/footer.php')}}