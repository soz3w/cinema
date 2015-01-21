function handleMovies_actors_collection() {

    var index = 0;
    var $container = $('div#Movies_Actors');

    var casNew=0;

    var $lienAjout = $('<a href="#" id="ajout_acteur" class="btn btn-success">Acteur ++</a>');

    if ($container.children('#ajout_acteur').length == 0)
    {
        $container.prepend($lienAjout);
    }

    //$("div[id^='Movies_Actors_']").append($lienAjout);

    $lienAjout.click(function(e) {
        casNew=1;
        ajouterActeur($container);
        e.preventDefault();
        return false;
    });


    //var index = $container.find(':input').length;
    var $actorDivs = $("div[id^='Movies_Actors_']");
    var index = $actorDivs.length;

    if (index == 0) {
        ajouterActeur();
    }
    else {
            //cas form non valide
                if (casNew==0)
                {
                    for (j=0;j<index;j++)
                    {
                        $prototype =$('#Movies_Actors_'+(j));
                        $('#Movies_Actors_'+(j)).parent().parent().children('label').text('Acteur n°'+(j+1));

                        if ($prototype.children('.supprimer').length == 0)
                            ajouterLienSuppression($prototype);
                    }
                }

        }


    function ajouterActeur() {
        //var $actorDivs = $("div[id^='Movies_Actors_']");

        var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, 'Acteur n°' +
        (index+1)).replace(/__name__/g, index));
        //console.log($prototype);
        //$prototype.prop('id', 'Movies_Actors_'+(index+1));

        if (casNew==1)
            ajouterLienSuppression($prototype.children('.col-sm-10'));
        $container.append($prototype);
        index++;
    }

    function ajouterLienSuppression($prototype) {

        //var $actorDiv = $prototype.children("div[id^='Movies_Actors_']");
        //console.log($prototype);
        $lienSuppression = $('<a href="#" class="pull-right supprimer btn btn-danger">Supprimer</a>');

        $prototype.append($lienSuppression);

        $lienSuppression.click(function(e) {
            $prototype.remove();
            e.preventDefault();
            return false;
        });
    }
}