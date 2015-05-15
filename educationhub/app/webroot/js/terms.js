$().ready(function(){
	$("#UserSignupForm").submit(function(event){
		if(!$("#terms").is(':checked')){
			alert('Accept the terms and conditions and privacy policies');
			event.preventDefault();
		}		
	});	
});