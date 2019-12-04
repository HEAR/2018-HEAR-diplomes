$(function(){

    if( ! $("body").hasClass('home') ){
        $("#logo")
            .addClass("small")
            .find("a")
            .text("Hear diplomés");
    }

	$(window).scroll(function(){
      	$(".home header span").text( $(document).scrollTop() );
        
        if( $(document).scrollTop() > 200){
        
        	$(".home header").addClass("small");
        	$(".home #logo")
                .addClass("small")
                .find("a")
                .text("Hear diplomés");
        	
        }else{
        	$(".home header").removeClass("small");
        	$(".home #logo")
                .removeClass("small")
                .find("a")
                .text("Hear diplomes");
        }

    });

    $('#annuaire li').click(function(event){

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
                htmlContent += `<div id="content_informations"><p><a href="${data.url}">Aller sur la page</a></p><p>${data.ville}, ${data.pays}<br>${data.telephone}<br>${data.mail}</p></div>`;
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

});
