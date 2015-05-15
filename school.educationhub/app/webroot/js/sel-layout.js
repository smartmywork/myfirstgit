/*(function ($) {

})(jQuery);*/

jQuery(document).ready(function(){
	jQuery("#select-layout").change(function(){
		//alert(this.value);
		if(this.value == 'boxed'){
			jQuery('#pattern-holder').show();
			jQuery('body').addClass('boxed');
		}else{
			jQuery('#pattern-holder').hide();
			jQuery('body').removeClass('boxed');
			jQuery('body').css('background-image','none');
			jQuery('#field-background').val('');
		}
	});
	jQuery('.current-pattern').click(function(event){
		//alert(this.id);
		event.preventDefault();
		/*jQuery.post(_pattern_url+'/'+this.id,function(data){
		});*/
		jQuery('body').css('background-image','url('+_full_base+'/img/'+this.id+'.jpg)');
		jQuery('#field-background').val(this.id);
	});
});