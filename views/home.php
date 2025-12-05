{{ include('layouts/header.php', {'title': 'Homepage'}) }}
<div class="section__nav-principale__hero">
    <div class="section__nav-principale__hero__contenu">
        <h2>No Reserve Auction Event</h2>
        <h3>Ends Tonight | 19th Century US & Worldwide Stamps</h3>
        <button class="bouton bouton-enchere">BID NOW</button>
    </div>
    <img src="{{ asset }}img/Denninger.webp" alt="image timbre hero">
</div>

<h1>{{ data }}</h1>
<section class="section__mission">
    <div class="image">
        <img src="{{ asset }}img/collection-de-timbres.jpg" alt="Plusieurs timbres de différentes couleurs étalés">
    </div>
    <div>
        <h2>Mission</h2>
        <p>La plateforme Stampee a pour mission d’offrir au monde philatélique un espace numérique prestigieux, fiable et accessible, où la passion du timbre rare rencontre la modernité. Fidèle à la vision de Lord Reginald Stampee, duc de Worcessteshear, elle vise à prolonger en ligne l’excellence et le raffinement de ses célèbres enchères, tout en les rendant disponibles aux collectionneurs du monde entier.</p>

        <h3>Ouvrir les enchères au plus grand nombre, dans un cadre sécuritaire et structuré.</h3>
        <p>Chaque membre peut créer un compte, publier des enchères, placer des offres et suivre son historique, afin de participer pleinement et en toute transparence au marché du timbre rare.</p>

        <h3>Permettre de trouver rapidement les enchères désirées, qu’elles soient actives ou archivées.</h3>
        <p>Grâce à une navigation simple et cohérente — « simple comme un timbre », selon le souhait du Lord — l’usager peut explorer les enchères selon une variété de critères : pays d’origine, année, condition, tirage, certification, et plus encore.</p>

        <h3>Assurer une accessibilité universelle sur tous les appareils.</h3>
        <p>L’interface, pensée dans un esprit classique, soigné et uniforme, est optimisée pour offrir une expérience fluide sur ordinateur, tablette et mobile, afin de permettre aux collectionneurs de partout de participer aux enchères.</p>

        <h3>Mettre en valeur les pièces d’exception.</h3>
        <p>Les Coups de cœur de Lord Stampee, soigneusement sélectionnés, sont mis de l’avant pour guider les collectionneurs vers les timbres les plus remarquables.</p>

        <h3>Offrir une immersion visuelle fidèle aux attentes des philatélistes.</h3>
        <p>En réponse au souhait spécial de Lord Stampee — « voir les timbres de proche » — la plateforme propose une exploration visuelle détaillée, incluant des images haute résolution et des fonctionnalités de zoom permettant d’apprécier pleinement la finesse et l’état des timbres.</p>

        <h3>Préserver et documenter l’histoire philatélique.</h3>
        <p>Les enchères archivées demeurent consultables, organisées et commentables, afin de constituer une mémoire vivante des ventes, des pièces exceptionnelles et de leurs parcours.</p>

        <h3>Offrir un environnement cohérent, élégant et digne du prestige de Lord Stampee.</h3>
        <p>L’esthétique du site, privilégiant le bleu ou le rouge selon le choix du Lord, reste sobre, classique et raffinée, répondant aux attentes d’une clientèle experte, exigeante et attachée aux traditions de la philatélie.</p>
    </div>
</section>
<section class="section__enchere"></section>
<section class="section__lord">
    <div class="image">
        <img src="{{ asset }}img/Lord-Stampee.webp" alt="Lord Stampee">
    </div>
    <div>
        <h2>Lord Reginald Stampee III</h2>
        <p>Depuis sa tendre enfance au milieu des années cinquante, Lord Reginald Stampee, duc de Worcessteshear, nourrit une passion inébranlable pour la philatélie. Collectionneur érudit, personnalité discrète mais influente parmi les grands amateurs de timbres rares, il a consacré sa vie à rassembler, étudier et mettre en valeur les pièces les plus précieuses de l’histoire postale.</p>

        <p>Reconnu dans tout le Royaume-Uni pour ses enchères exclusives, qui attirent chaque année les philatélistes les plus prestigieux du monde, Lord Stampee souhaite aujourd’hui franchir une nouvelle étape : offrir au marché global une plateforme numérique moderne, élégante et accessible, afin d’étendre son héritage bien au-delà des frontières britanniques.</p>

        <p>Dans cette optique, il vous a personnellement choisi pour assurer la conception et le développement de cette plateforme d’enchères ambitieuse, reflet de son expertise, de son raffinement et de sa vision.</p>
    </div>
</section>

{{ include('layouts/footer.php') }}