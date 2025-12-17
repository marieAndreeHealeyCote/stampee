 {{ include ('layouts/header.php', {title:'Question'})}}

 <div class="section__detail-enchere">
     <article>
         <div class="section__detail-enchere__carte-image">
             <figure class="section__detail-enchere__carte-image__timbre">
                 {% for image in listImages %}
                 {% if loop.first %}
                 <div class="img-magnifier-container">
                     <img id="zoom-stamp" class="section__timbre__image__large" src="{{ base }}/{{ image.url }}">
                 </div>
                 {% endif %}
                 <img class="section__timbre__form__image"
                     src="{{ base }}/{{ image.url }}">
                 {% endfor %}
             </figure>
         </div>
         <div class="section__detail-enchere__carte-description">
             <div class="section__detail-enchere__carte-description__menu">
                 <ul>
                     <li><a href="{{base}}/bid/create?auction_id={{ auction_id }}">Listing</a></li>
                     <li><a href="{{base}}/auction/show?auction_id={{ auction_id }}">Details</a></li>
                     <li><a href="{{base}}/auction/history?auction_id={{ auction_id }}">History</a></li>
                     <li><a class="section__detail-enchere__carte-description__menu__lien-actif" href="{{base}}/bid/question?auction_id={{ auction_id }}">Question</a></li>
                 </ul>
             </div>
             <div class="section__detail-enchere__carte-description__contenu">
                 <div class="section__detail-enchere__carte-description__contenu__question">
                     <h3>Question</h3>
                     <p>You need to be logged in to ask a question.</p>
                 </div>
                 <div class="section__detail-enchere__carte-description__contenu__login">
                     <button href="{{base}}/login" class=" bouton bouton-login">Click Here To Login</button>
                 </div>
                 <div class="section__detail-enchere__carte-description__contenu__plus">
                     <h3>More Items from Lord Reginald Stampee</h3>
                     <div class="section__detail-enchere__carte-description__contenu__plus__liens">
                         <div class="section__detail-enchere__carte-description__contenu__plus__lien">
                             <a href="#"><img src="{{asset}}/img/falklandStamp.webp" alt="image timbre"></a>
                             <a href="#">Falkland Islands Qeii Sg434, 1982 10p Siskin WMK Uprig...</a>
                         </div>
                         <div class="section__detail-enchere__carte-description__contenu__plus__lien">
                             <a href="#"><img src="{{asset}}/img/falklandStamp.webp" alt="image timbre"></a>
                             <a href="#">Falkland Islands Qeii Sg434, 1982 10p Siskin WMK Uprig...</a>
                         </div>
                         <div class="section__detail-enchere__carte-description__contenu__plus__lien">
                             <a href="#"><img src="{{asset}}/img/falklandStamp.webp" alt="image timbre"></a>
                             <a href="#">Falkland Islands Qeii Sg434, 1982 10p Siskin WMK Uprig...</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </article>
 </div>
 {{ include('layouts/footer.php') }}