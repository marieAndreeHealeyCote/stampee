<aside class="section__aparte">
    <form method="get">
        <h2>Filters</h2>
        <section class="section__aparte__certification">
            <h3>BY CERTIFICATION</h3>
            <label for="certified">
                <span>Certified</span>
                <input type="checkbox" name="certified[]" value="1" />
            </label>
        </section>
        <section class="section__aparte__condition">
            <h3>BY CONDITION</h3>
            {% for condition in listFilters.conditions %}
            <label for="{{ condition.name }}">
                <span>{{ condition.name | capitalize }}</span>
                <input type="checkbox" name="conditions[]" value="{{ condition.id }}" />
            </label>
            {% endfor %}
        </section>
        <section class="section__aparte__couleur">
            <h3>BY COLOR</h3>
            {% for color in listFilters.colors %}
            <label for="{{ color.name }}">
                <span>{{ color.name | capitalize }}</span>
                <input type="checkbox" name="colors[]" value="{{ color.id }}" />
            </label>
            {% endfor %}
        </section>
        <section class="section__aparte__pays">
            <h3>BY COUNTRY</h3>
            <label for="countries">Select Country</label>
            <select name="countries" id="countries">
                <option value="all">All Countries</option>
                {% for country in listFilters.countries %}
                <option value="{{ country.id }}">{{ country.name | capitalize }}</option>
                {% endfor %}
            </select>
        </section>
        <section class="section__aparte__date">
            <h3>BY YEAR</h3>
            <label for="date-start">Select starting year</label>
            <select name="date-start" id="date-start">
                <option value="any">Any</option>
                <option value="1800">1800</option>
                <option value="1850">1850</option>
                <option value="1900">1900</option>
                <option value="1950">1950</option>
            </select>
            <label for="date-end">Select ending year</label>
            <select name="date-end" id="date-end">
                <option value="any">Any</option>
                <option value="1850">1850</option>
                <option value="1900">1900</option>
                <option value="1950">1950</option>
                <option value="2000">2000</option>
            </select>
        </section>
        <section class="section__aparte__prix">
            <h3>BY PRICE</h3>
            <label for="start-price">Select starting price</label>
            <select name="start-price" id="start-price">
                <option value="any">Any</option>
                <option value="0">0</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="150">150</option>
            </select>
            <label for="end-price">Select ending price</label>
            <select name="end-price" id="end-price">
                <option value="any">Any</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="150">150</option>
                <option value="200">200</option>
            </select>
        </section>
        <div class="section__aparte__bouton">
            <button type="submit" class="bouton bouton-rechercher">SEARCH</button>
            <button type="reset" class="bouton bouton-reset">RESET</button>
        </div>
    </form>
</aside>