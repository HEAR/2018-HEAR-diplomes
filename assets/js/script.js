$(function(){

    console.log("HEAR site des diplômés Ready !")
    console.log("Atelier de communication graphique 2018•2019\nRéalisé par Julie Bassinot, Lucie Clause, Pauline Desombre, Valentin Maynadié, Marie Serrie, Julia Von Dorpp, Lucile Weber.\nAccompagné·es par Loïc Horellou.")

    // GESTION DU LOGO
    if( ! $("body").hasClass('home') ){
        $("#logo")
            .addClass("small");
            //.find("a")
            //.text("Hear diplomés");
    }

	$(window).scroll(function(){
      	// $(".home header span").text( $(document).scrollTop() );
        
        if( $(document).scrollTop() > 200){
        
        	$(".home header").addClass("small");
        	$(".home #logo")
                .addClass("small");
                //.find("a")
                //.text("Hear diplomés");
        	
        }else{
        	$(".home header").removeClass("small");
        	$(".home #logo")
                .removeClass("small");
                //.find("a")
                //.text("Hear diplomes");
        }

    });

    // GESTION DE L'ANNUAIRE
    $('#annuaire li').not('.filter').click(function(event){

        // event.preventDefault()

        // console.log( $(this).data("diplome") )

        console.log(  $(this).hasClass("open"))


        if( ! $(this).hasClass("open") ){

            $("#annuaire>li.open")
                .removeClass('open')
                .find(".content")
                .slideUp("fast", function(){
                    $(this)
                        .empty()
                })
 
            $(this)
                .addClass("open")
                .find(".content")
                .slideUp(0)

            let url = `${ $(this).data("url") }.json`

            console.log(url)

            $.ajax({
                url: url,
                data: { cache : new Date() }
            }).done(function(data) {
                // console.log(data)

                let htmlContent = "";

                htmlContent += `<div class="container">`;
                htmlContent += `<div id="content_vignette">`;
                htmlContent += `<figure>`;

                if( data.images.length > 0 ){
                htmlContent += `<a href="${data.url}"><img src="${data.images[0].image_url}"></a>`;
                htmlContent += `<figcaption>${data.images[0].image_caption}</figcaption>`;
                }
                htmlContent += `</figure>`;
                htmlContent += `</div>`;
                htmlContent += `<div id="content_informations"><p>${data.ville}, ${data.pays}<br>${data.telephone}<br>${data.mail}</p><p><a href="${data.url}">→ Aller sur la page</a></p></div>`;
                htmlContent += `</div>`;

                $(".open")
                    .find(".content")
                    .html( htmlContent )
                    .slideDown('fast')

            });

        }else{

            $("#annuaire>li.open")
                .removeClass('open')
                .find(".content")
                .slideUp("fast", function(){
                    $(this)
                        .empty()
                })
        }
    })	

    $('#annuaire li a').click(function(event){
        event.stopPropagation()
    })

    // défilement avec les touches clavier
    $( "body" ).keyup(function( event ) {

        console.log(event.which);
        // event.preventDefault();

        if(event.which == 38 || event.which == 37){ // top / left
            event.preventDefault()

            $('#annuaire').find('.open').prev().trigger("click")

            return false
        }

        if(event.which == 40 || event.which == 39){ // bottom / right
            event.preventDefault()

            $('#annuaire').find('.open').next().trigger("click")

            return false
        }

    });


    // gestion du tri
    
    $(".filter button").click(function(event){

        $(".filter button").removeClass('active')

        $(this).addClass('active')

        // console.log( $(this).data("tri"), $(this).parent().attr('class') )
        doSort( $(this).parent().attr('class'), $(this).data("tri") == 'asc' ? true : false )

    })

    
    // https://riptutorial.com/fr/jquery/example/11477/elements-de-tri
    var $annuaire   = $('#annuaire')
    var $noms       = $annuaire.children('li')
    var sortList    = Array.prototype.sort.bind( $noms )

    var doSort = function ( colonne, ascending ) {

        console.log(colonne, ascending)

        sortList(function ( a, b ) {

            switch(colonne){

				case "annee" :
					var aText = $(a).find(`.nom`).data('filter')
            		var bText = $(b).find(`.nom`).data('filter')

            		return aText < bText ? -1 : 1;

				break;
				case "groupe" :
					var aText = $(a).find(`.annee`).data('filter')
           			var bText = $(b).find(`.annee`).data('filter')
				break;
				case "nom" :
					var aText = $(a).find(`.groupe`).data('filter')
            		var bText = $(b).find(`.groupe`).data('filter')
				break;
				case "url" :
					var aText = $(a).find(`.nom`).data('filter')
            		var bText = $(b).find(`.nom`).data('filter')

            		return aText < bText ? -1 : 1;

				break;
			}

			// Returning -1 will place element `a` before element `b`
            if ( aText < bText ) {
                return ascending ? -1 : 1;
            }

            // Returning 1 will do the opposite
            if ( aText > bText ) {
                return ascending ? 1 : -1;
            }

            // Returning 0 leaves them as-is
            return 0;
        }).sort(function ( a, b ) {
        	// Cache inner content from the first element (a) and the next sibling (b)
            var aText = $(a).find(`.${colonne}`).data('filter')
            var bText = $(b).find(`.${colonne}`).data('filter')

			// Returning -1 will place element `a` before element `b`
            if ( aText < bText ) {
                return ascending ? -1 : 1;
            }

            // Returning 1 will do the opposite
            if ( aText > bText ) {
                return ascending ? 1 : -1;
            }

            // Returning 0 leaves them as-is
            return 0;


        return 0;
        });

        $annuaire.append($noms)
    };

});
