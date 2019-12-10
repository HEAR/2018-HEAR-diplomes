// HEAR site des Diplômés
// from atelier de communication graphique 2018•2019


$(function(){

	console.log("HEAR site des diplômés Ready !")
	console.log("Atelier de communication graphique 2018•2019\nRéalisé par Julie Bassinot, Lucie Clause, Pauline Dessombre, Valentin Maynadié, Marie Serrie, Julia Von Dorpp, Lucile Weber.\nAccompagné·es par Loïc Horellou.")


	$('#annuaire li').click(function(event){

		event.preventDefault()

		// console.log( $(this).data("diplome") )

		// console.log(  $(this).hasClass("open"))

		let jsonURL = `${$(this).find('a').attr("href")}.json`

		console.log(jsonURL)

		$.ajax({
			url: jsonURL,
			data: { cache : new Date() }
		}).done(function(data) {

			console.log(data)

		})

		return false

		// if( ! $(this).hasClass("open") ){

		// 	$("#annuaire>li.open")
		// 		.removeClass('open')
		// 		.find(".content")
		// 		.slideUp("fast", function(){
		// 			$(this)
		// 			.empty()
		// 		})

		// 	$(this)
		// 		.addClass("open")
		// 		.find(".content")
		// 		.slideUp(0)



		// 	$.ajax({
		// 		url: "json/diplome.json",
		// 		data: { cache : new Date() }
		// 	}).done(function(data) {

		// 		let htmlContent = "";

		// 		htmlContent += '<div class="container">';
		// 		htmlContent += '<div id="content_vignette">';
		// 		htmlContent += '<figure>';
		// 		htmlContent += '<img src="'+data.image+'">';
		// 		htmlContent += '<figcaption>'+data.legende+'</figcaption>';
		// 		htmlContent += '</figure>';
		// 		htmlContent += '</div>';
		// 		htmlContent += '<div id="content_informations"><p>'+data.ville+', '+data.pays+'<br>'+data.telephone+'<br>'+data.mail+'</p></div>';
		// 		htmlContent += '</div>';

		// 		$(".open")
		// 			.find(".content")
		// 			.html( htmlContent )
		// 			.slideDown('fast')

		// 		});

		// }else{

		// 	$("#annuaire>li.open")
		// 	.removeClass('open')
		// 	.find(".content")
		// 	.slideUp("fast", function(){
		// 		$(this)
		// 		.empty()
		// 	})
		// }
	})	

})