$(function(){

	$(window).scroll(function(){
  	$("header span").text( $(document).scrollTop() );
    
    if( $(document).scrollTop() > 200){
    
    	$("header").addClass("small");
    	$("#logo").addClass("small");
    	
    }else{
    	$("header").removeClass("small");
    	$("#logo").removeClass("small");
    }
  });	

});