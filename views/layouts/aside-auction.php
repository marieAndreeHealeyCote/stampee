<aside class="section__aparte">
    <form action="get">
        <h2>Filters</h2>
        <section class="section__aparte__certification">
            <h3>BY CERTIFICATION</h3>
            <label for="certified">
                <span>Certified</span>
                <input type="checkbox" id="certified" />
            </label>
            <label for="not-certified">
                <span>Not Certified</span>
                <input type="checkbox" id="not-certified" />
            </label>
        </section>
        <section class="section__aparte__condition">
            <h3>BY CONDITION</h3>
            <label for="perfect">
                <span>Perfect</span>
                <input type="checkbox" id="perfect" />
            </label>
            <label for="excellent">
                <span>Excellent</span>
                <input type="checkbox" id="excellent" />
            </label>
            <label for="good">
                <span>Good</span>
                <input type="checkbox" id="good" />
            </label>
            <label for="fair">
                <span>Fair</span>
                <input type="checkbox" id="fair" />
            </label>
            <label for="damaged">
                <span>Damaged</span>
                <input type="checkbox" id="damaged" />
            </label>
        </section>
        <section class="section__aparte__couleur">
            <h3>BY COLOR</h3>
            <label for="red">
                <span>Red</span>
                <input type="checkbox" id="red" />
            </label>
            <label for="blue">
                <span>Blue</span>
                <input type="checkbox" id="blue" />
            </label>
            <label for="gold">
                <span>Gold</span>
                <input type="checkbox" id="gold" />
            </label>
            <label for="black">
                <span>Black</span>
                <input type="checkbox" id="black" />
            </label>
        </section>
        <section class="section__aparte__pays">
            <h3>BY COUNTRY</h3>
            <label for="selection-pays">Select Country</label>
            <select name="selection-pays" id="selection-pays">
                <optgroup label="Select Country">
                    <option value="tous">All Countries</option>
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="great-britain">Great Britain</option>
                    <option value="united-states">United States</option>
                </optgroup>
            </select>
        </section>
        <section class="section__aparte__date">
            <h3>BY DATE</h3>
            <label for="debut-date">Select Start Date</label>
            <select name="debut-date" id="debut-date">
                <optgroup label="debut-date">
                    <option value="1800">1800-1850</option>
                    <option value="1850">1850-1900</option>
                    <option value="1900">1900-1950</option>
                    <option value="1950">1950-2000</option>
                    <option value="2000">2000-2050</option>
                </optgroup>
            </select>
            <label for="fin-date">Select End Date</label>
            <select name="fin-date" id="fin-date">
                <optgroup label="Select End Date">
                    <option value="1800">1800-1850</option>
                    <option value="1850">1850-1900</option>
                    <option value="1900">1900-1950</option>
                    <option value="1950">1950-2000</option>
                    <option value="2000">2000-2050</option>
                </optgroup>
            </select>
        </section>
        <section class="section__aparte__prix">
            <h3>BY PRICE</h3>
            <label for="selection-prix">Select price</label>
            <select name="selection-prix" id="selection-prix">
                <optgroup label="Select price">
                    <option value="10">0-10</option>
                    <option value="50">10-50</option>
                    <option value="100">50-100</option>
                    <option value="150">100-150</option>
                    <option value="200">150-200</option>
                </optgroup>
            </select>
        </section>
        <span>
            <button class="bouton bouton-rechercher">SEARCH</button>
        </span>
    </form>
</aside>