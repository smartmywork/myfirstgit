$(document).ready(function(){
$(document).click( function(event){
	if( $(event.target).closest(".loginform").length ) 
	return;
	$(".loginform").slideUp("slow");
	event.stopPropagation();
});
$('.login').click( function() {
		$(this).siblings(".loginform").slideToggle("slow");
		return false;
	});
});