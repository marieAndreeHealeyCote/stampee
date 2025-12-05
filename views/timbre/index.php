{{ include ('layouts/header.php', {title:'Stamp'})}}
<div class="section__aparte__conteneur">
    <aside class="section__aparte">
        <form action="#">
            <h2>Filter Results</h2>
            <section class="section__aparte__certification">
                <h3>BY CERTIFICATION</h3>
                <label for="certified">
                    <span>Certified</span>
                    <input type="checkbox" id="certified">
                </label>
                <label for="not-certified">
                    <span>Not Certified</span>
                    <input type="checkbox" id="not-certified">
                </label>
            </section>
            <section class="section__aparte__condition">
                <h3>BY CONDITION</h3>
                <label for="perfect">
                    <span>Perfect</span>
                    <input type="checkbox" id="perfect">
                </label>
                <label for="excellent">
                    <span>Excellent</span>
                    <input type="checkbox" id="excellent">
                </label>
                <label for="good">
                    <span>Good</span>
                    <input type="checkbox" id="good">
                </label>
                <label for="fair">
                    <span>Fair</span>
                    <input type="checkbox" id="fair">
                </label>
                <label for="damaged">
                    <span>Damaged</span>
                    <input type="checkbox" id="damaged">
                </label>
            </section>
            <section class="section__aparte__couleur">
                <h3>BY COLOR</h3>
                <label for="red">
                    <span>Red</span>
                    <input type="checkbox" id="red">
                </label>
                <label for="blue">
                    <span>Blue</span>
                    <input type="checkbox" id="blue">
                </label>
                <label for="gold">
                    <span>Gold</span>
                    <input type="checkbox" id="gold">
                </label>
                <label for="black">
                    <span>Black</span>
                    <input type="checkbox" id="black">
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
    <section class="section__catalogue-enchere-en-cours">
        <h2>Current Auctions</h2>
        <div class="section__catalogue-enchere-en-cours__grille">
            <article class="section__catalogue-enchere-archives__grille__carte">
                <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 1">
                <h3>
                    Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                    Lots 1-348
                </h3>
                <ul>
                    <li>
                        <h4>Period of activity</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Start date: June 1st, 2025</li>
                            <li>End Date: July, 20, 2025</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Floor price</h4>
                        <p>CAD 1,200</p>
                    </li>
                    <li>
                        <h4>Current Offer</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Price: CAD 1,200</li>
                            <li>Member Name: Ann-Mary B.</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Bet Quantity</h4>
                        <p>1</p>
                    </li>
                    <li>
                        <h4>Lord's Favorite</h4>
                        <p>Not selected</p>
                    </li>
                </ul>
                <button class="bouton bouton-enchere">BID NOW</button>
            </article>
            <article class="section__catalogue-enchere-archives__grille__carte">
                <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 2">
                <h3>
                    Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                    Lots 1-348
                </h3>
                <ul>
                    <li>
                        <h4>Period of activity</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Start date: June 1st, 2025</li>
                            <li>End Date: July, 20, 2025</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Floor price</h4>
                        <p>CAD 1,200</p>
                    </li>
                    <li>
                        <h4>Current Offer</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Price: CAD 1,200</li>
                            <li>Member Name: Ann-Mary B.</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Bet Quantity</h4>
                        <p>1</p>
                    </li>
                    <li>
                        <h4>Lord's Favorite</h4>
                        <p>Not selected</p>
                    </li>
                </ul>
                <button class="bouton bouton-enchere">BID NOW</button>
            </article>
            <article class="section__catalogue-enchere-archives__grille__carte">
                <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 3">
                <h3>
                    Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                    Lots 1-348
                </h3>
                <ul>
                    <li>
                        <h4>Period of activity</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Start date: June 1st, 2025</li>
                            <li>End Date: July, 20, 2025</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Floor price</h4>
                        <p>CAD 1,200</p>
                    </li>
                    <li>
                        <h4>Current Offer</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Price: CAD 1,200</li>
                            <li>Member Name: Ann-Mary B.</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Bet Quantity</h4>
                        <p>1</p>
                    </li>
                    <li>
                        <h4>Lord's Favorite</h4>
                        <p>Not selected</p>
                    </li>
                </ul>
                <button class="bouton bouton-enchere">BID NOW</button>
            </article>
            <article class="section__catalogue-enchere-archives__grille__carte">
                <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 4">
                <h3>
                    Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                    Lots 1-348
                </h3>
                <ul>
                    <li>
                        <h4>Period of activity</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Start date: June 1st, 2025</li>
                            <li>End Date: July, 20, 2025</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Floor price</h4>
                        <p>CAD 1,200</p>
                    </li>
                    <li>
                        <h4>Current Offer</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Price: CAD 1,200</li>
                            <li>Member Name: Ann-Mary B.</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Bet Quantity</h4>
                        <p>1</p>
                    </li>
                    <li>
                        <h4>Lord's Favorite</h4>
                        <p>Not selected</p>
                    </li>
                </ul>
                <button class="bouton bouton-enchere">BID NOW</button>
            </article>
            <article class="section__catalogue-enchere-archives__grille__carte">
                <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 5">
                <h3>
                    Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                    Lots 1-348
                </h3>
                <ul>
                    <li>
                        <h4>Period of activity</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Start date: June 1st, 2025</li>
                            <li>End Date: July, 20, 2025</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Floor price</h4>
                        <p>CAD 1,200</p>
                    </li>
                    <li>
                        <h4>Current Offer</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Price: CAD 1,200</li>
                            <li>Member Name: Ann-Mary B.</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Bet Quantity</h4>
                        <p>1</p>
                    </li>
                    <li>
                        <h4>Lord's Favorite</h4>
                        <p>Not selected</p>
                    </li>
                </ul>
                <button class="bouton bouton-enchere">BID NOW</button>
            </article>
            <article class="section__catalogue-enchere-archives__grille__carte">
                <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 6">
                <h3>
                    Public Auction – The Denninger Collection Sale 4 – Canada Part Two -
                    Lots 1-348
                </h3>
                <ul>
                    <li>
                        <h4>Period of activity</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Start date: June 1st, 2025</li>
                            <li>End Date: July, 20, 2025</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Floor price</h4>
                        <p>CAD 1,200</p>
                    </li>
                    <li>
                        <h4>Current Offer</h4>
                        <ul
                            class="section__catalogue-enchere-archives__grille__carte__liste">
                            <li>Price: CAD 1,200</li>
                            <li>Member Name: Ann-Mary B.</li>
                        </ul>
                    </li>
                    <li>
                        <h4>Bet Quantity</h4>
                        <p>1</p>
                    </li>
                    <li>
                        <h4>Lord's Favorite</h4>
                        <p>Not selected</p>
                    </li>
                </ul>
                <button class="bouton bouton-enchere">BID NOW</button>
            </article>
        </div>
    </section>
</div>
<section class="section__catalogue-enchere-archives">
    <h2>Past Auctions</h2>
    <div class="section__catalogue-enchere-archives__grille">
        <article class="section__catalogue-enchere-archives__grille__carte">
            <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 7">
            <h3>
                Public Auction – The Hobart Collection of New Brunswick & Nova
                Scotia, Part II - Lots 501-715
            </h3>
            <ul>
                <li>
                    <h4>Period of activity</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Start date: July 1st, 2024</li>
                        <li>End Date: July, 20, 2024</li>
                    </ul>
                </li>
                <li>
                    <h4>Floor price</h4>
                    <p>CAD 200</p>
                </li>
                <li>
                    <h4>Current Offer</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Price: CAD 200</li>
                        <li>Member Name: Mary B.</li>
                    </ul>
                </li>
                <li>
                    <h4>Bet Quantity</h4>
                    <p>1</p>
                </li>
                <li>
                    <h4>Lord's Favorite</h4>
                    <p>Not selected</p>
                </li>
            </ul>
            <button class="bouton bouton-enchere">COMMENTS</button>
        </article>
        <article class="section__catalogue-enchere-archives__grille__carte">
            <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 8">
            <h3>
                Public Auction – The Hobart Collection of New Brunswick & Nova
                Scotia, Part II - Lots 501-715
            </h3>
            <ul>
                <li>
                    <h4>Period of activity</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Start date: June 1st, 2024</li>
                        <li>End Date: June 20, 2024</li>
                    </ul>
                </li>
                <li>
                    <h4>Floor price</h4>
                    <p>CAD 1,000</p>
                </li>
                <li>
                    <h4>Current Offer</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Price: CAD 1,000</li>
                        <li>Member Name: Henry P.</li>
                    </ul>
                </li>
                <li>
                    <h4>Bet Quantity</h4>
                    <p>1</p>
                </li>
                <li>
                    <h4>Lord's Favorite</h4>
                    <p>Selected</p>
                </li>
            </ul>
            <button class="bouton bouton-enchere">COMMENTS</button>
        </article>
        <article class="section__catalogue-enchere-archives__grille__carte">
            <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 9">
            <h3>
                Public Auction – The Hobart Collection of New Brunswick & Nova
                Scotia, Part II - Lots 501-7158
            </h3>
            <ul>
                <li>
                    <h4>Period of activity</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Start date: June 1st, 2024</li>
                        <li>End Date: June 20, 2024</li>
                    </ul>
                </li>
                <li>
                    <h4>Floor price</h4>
                    <p>CAD 1,000</p>
                </li>
                <li>
                    <h4>Current Offer</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Price: CAD 1,000</li>
                        <li>Member Name: Henry P.</li>
                    </ul>
                </li>
                <li>
                    <h4>Bet Quantity</h4>
                    <p>1</p>
                </li>
                <li>
                    <h4>Lord's Favorite</h4>
                    <p>Selected</p>
                </li>
            </ul>
            <button class="bouton bouton-enchere">COMMENTS</button>
        </article>
        <article class="section__catalogue-enchere-archives__grille__carte">
            <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 10">
            <h3>
                Public Auction – The Hobart Collection of New Brunswick & Nova
                Scotia, Part II - Lots 501-715
            </h3>
            <ul>
                <li>
                    <h4>Period of activity</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Start date: June 1st, 2024</li>
                        <li>End Date: June 20, 2024</li>
                    </ul>
                </li>
                <li>
                    <h4>Floor price</h4>
                    <p>CAD 1,000</p>
                </li>
                <li>
                    <h4>Current Offer</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Price: CAD 1,000</li>
                        <li>Member Name: Henry P.</li>
                    </ul>
                </li>
                <li>
                    <h4>Bet Quantity</h4>
                    <p>1</p>
                </li>
                <li>
                    <h4>Lord's Favorite</h4>
                    <p>Selected</p>
                </li>
            </ul>
            <button class="bouton bouton-enchere">COMMENTS</button>
        </article>
        <article class="section__catalogue-enchere-archives__grille__carte">
            <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 11">
            <h3>
                Public Auction – The Hobart Collection of New Brunswick & Nova
                Scotia, Part II - Lots 501-7158
            </h3>
            <ul>
                <li>
                    <h4>Period of activity</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Start date: July 1st, 2024</li>
                        <li>End Date: July, 20, 2024</li>
                    </ul>
                </li>
                <li>
                    <h4>Floor price</h4>
                    <p>CAD 200</p>
                </li>
                <li>
                    <h4>Current Offer</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Price: CAD 200</li>
                        <li>Member Name: Mary B.</li>
                    </ul>
                </li>
                <li>
                    <h4>Bet Quantity</h4>
                    <p>1</p>
                </li>
                <li>
                    <h4>Lord's Favorite</h4>
                    <p>Not selected</p>
                </li>
            </ul>
            <button class="bouton bouton-enchere">COMMENTS</button>
        </article>
        <article class="section__catalogue-enchere-archives__grille__carte">
            <img class="section__catalogue-enchere-archives__grille__carte__image" src="assets/img/lotsTimbre.webp" alt="image timbre carte 12">
            <h3>
                Public Auction – The Hobart Collection of New Brunswick & Nova
                Scotia, Part II - Lots 501-7158
            </h3>
            <ul>
                <li>
                    <h4>Period of activity</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Start date: July 1st, 2024</li>
                        <li>End Date: July, 20, 2024</li>
                    </ul>
                </li>
                <li>
                    <h4>Floor price</h4>
                    <p>CAD 200</p>
                </li>
                <li>
                    <h4>Current Offer</h4>
                    <ul
                        class="section__catalogue-enchere-archives__grille__carte__liste">
                        <li>Price: CAD 200</li>
                        <li>Member Name: Mary B.</li>
                    </ul>
                </li>
                <li>
                    <h4>Bet Quantity</h4>
                    <p>1</p>
                </li>
                <li>
                    <h4>Lord's Favorite</h4>
                    <p>Not selected</p>
                </li>
            </ul>
            <button class="bouton bouton-enchere">COMMENTS</button>
        </article>
    </div>
</section>
{{ include ('layouts/footer.php') }}