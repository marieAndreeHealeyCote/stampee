{{ include ('layouts/header.php', {title:'Edit'})}}
<div class="section__timbre">
    <h2>Edit stamp</h2>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label>Name :
                <input type="text" name="name" id="name" value="{{ inputs.name ?? stamp.name }}">
            </label>
        </div>
        {% if errors.name is defined %}
        <span class="error">{{ errors.name }}</span>
        {% endif %}

        <div>
            <label>Year :
                <input type="number" name="year" id="year" min="1900" max="2030" value="{{ inputs.year }}">
            </label>
        </div>
        {% if errors.year is defined %}
        <span class="error">{{ errors.year }}</span>
        {% endif %}

        <div>
            <label>Certification :
                <input type="radio" name="is_certified" id="is_certified" value="{{ inputs.is_certified }}">
                <option value="true">Certified</option>
                <option value="false">Not Certified</option>
            </label>
        </div>
        {% if errors.is_certified is defined %}
        <span class="error">{{ errors.is_certified }}</span>
        {% endif %}

        <div>
            <label>Country :
                <select name="country_id" id="country_id">
                    <option value="" disabled>-- Select --</option>
                    {% for country in listCountries %}
                    <option value="{{ country_id }}" {% if country_id == country_id %} selected {% endif %}>
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
                    <option value="" disabled>-- Select --</option>
                    {% for color in listColors %}
                    <option value="{{ color_id }}" {% if color.id == inputs.color_id %} selected {% endif %}>
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
                    <option value="" disabled>-- Select --</option>
                    {% for color in listColors %}
                    <option value="{{ condition_id }}" {% if condition.id == inputs.condition_id %} selected {% endif %}>
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
            <label>1. Upload an image of your stamp
                <input type="file" name="upload" id="upload">
            </label>
        </div>
        {% if errors.upload is defined %}
        <span class="error">{{ errors.upload }}</span>
        {% endif %}

        <div class="section__timbre__upload">
            <label>2. Upload another image of your stamp
                <input type="file" name="upload" id="upload">
            </label>
        </div>
        {% if errors.upload is defined %}
        <span class="error">{{ errors.upload }}</span>
        {% endif %}

        <div class="section__timbre__upload">
            <label>3. Upload another image of your stamp
                <input type="file" name="upload" id="upload">
            </label>
        </div>
        {% if errors.upload is defined %}
        <span class="error">{{ errors.upload }}</span>
        {% endif %}

        <div class="section__timbre__upload">
            <label>4. Upload another image of your stamp
                <input type="file" name="upload" id="upload">
            </label>
        </div>
        {% if errors.upload is defined %}
        <span class="error">{{ errors.upload }}</span>
        {% endif %}

        <div class="section__timbre__upload">
            <label>5. Upload another image of your stamp
                <input type="file" name="upload" id="upload">
            </label>
        </div>
        {% if errors.upload is defined %}
        <span class="error">{{ errors.upload }}</span>
        {% endif %}

        <button type="submit" class="bouton bouton-ajouter">Add</button>
        <a href="{{base}}/profile" class="bouton bouton-action">Cancel</a>
    </form>
</div>

{{ include ('layouts/footer.php')}}