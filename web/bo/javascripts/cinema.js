function handleMovies_actors_collection() {

    var $container = $('div#Movies_Actors');
    //console.log($container);
    // On ajoute un lien pour ajouter une nouvelle Acteur
    var $lienAjout = $('<a href="#" id="ajout_acteur" class="btn btn-success">Acteur ++</a>');
    $("div[id^='Movies_Actors_']").append($lienAjout);
    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $lienAjout.click(function(e) {
        ajouterActeur($container);
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });
// On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;
// On ajoute un premier champ directement s'il n'en existe pas déjà.

    if (index == 0) {
        ajouterActeur($container);
    } else {
        // Pour chaque acteur déjà existante, on ajoute un lien de suppression
        $container.children("div[class^='Movies_Actors_']").each(function() {
            ajouterLienSuppression($(this));
        });
    }
// La fonction qui ajoute un formulaire Acteur
    function ajouterActeur($container) {

// - le texte "__name__" qu'il contient par le numéro du champ
        var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, 'Acteur n°' +
        (index+1)).replace(/__name__/g, index));
        ajouterLienSuppression($prototype);
        $container.append($prototype);
        index++;
    }
// La fonction qui ajoute un lien de suppression d'une Acteur
    function ajouterLienSuppression($prototype) {
// Création du lien
        $lienSuppression = $('<a href="#" class="btn btn-danger">Supprimer</a>');
        // Ajout du lien
        $prototype.append($lienSuppression);
        // Ajout du listener sur le clic du lien
        $lienSuppression.click(function(e) {
            $prototype.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
}