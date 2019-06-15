$(function(){

	$(window).scroll(function(){
      	$(".home header span").text( $(document).scrollTop() );
        
        if( $(document).scrollTop() > 200){
        
        	$(".home header").addClass("small");
        	$(".home #logo")
                .addClass("small")
                .text("Hear diplomés");
        	
        }else{
        	$(".home header").removeClass("small");
        	$(".home #logo")
                .removeClass("small")
                .text("Hear diplomes");
        }

    });



    $('#annuaire li').click(function(){

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



            $.ajax({
                url: "json/diplome.json",
                data: { cache : new Date() }
            }).done(function(data) {
                // console.log(data)

                let htmlContent = "";

                htmlContent += '<div class="container">';
                htmlContent += '<div id="content_vignette">';
                htmlContent += '<figure>';
                htmlContent += '<img src="'+data.image+'">';
                htmlContent += '<figcaption>'+data.legende+'</figcaption>';
                htmlContent += '</figure>';
                htmlContent += '</div>';
                htmlContent += '<div id="content_informations"><p>'+data.ville+', '+data.pays+'<br>'+data.telephone+'<br>'+data.mail+'</p></div>';
                htmlContent += '</div>';

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

});
