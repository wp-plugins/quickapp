//tool tip
jQuery(document).ready(function() {
		
	jQuery('img.tTip').tinyTips('light', 'title');
	//ColorBox
	
	//jQuery(".ocd").colorbox({inline:true});
	
	//Slider
	jQuery('#slides').slides({
		generateNextPrev: true
	});
	
	
	//Settins Menu Activator
	jQuery(".settinsMenu .vmenu").find('h2').each(function(index, element){
	   jQuery(this).click(function(e){	   					
			var getblockPro = jQuery(this).closest('.vmenu').find('.vmenubody').css('display');						
			if(getblockPro != "block"){ 
				jQuery(".settinsMenu").find('.active').removeClass('active').find('.vmenubody').slideUp('fast');
				jQuery(this).closest('.vmenu').addClass('active').find('.vmenubody').slideDown('fast');								
			}
							
    	});
    });
	
	//Browse
	jQuery('.btn-browse').click(function(e){
		e.preventDefault();
		
		jQuery('.orgBrowse').trigger('click');
		var getBrows = jQuery('.orgBrowse').val();
		
		jQuery('.txt-browse').val(getBrows);
        
    });
	
	//CheckList
	jQuery('.connectedSortable').find('input[checked]').closest('li').addClass('selected');
	jQuery('.connectedSortable').find('input[type=checkbox]').click(function(e){
		if(jQuery(this).is(':checked')){			
        	jQuery(this).closest('li').addClass('selected');
		} else {
			jQuery(this).closest('li').removeClass('selected');
		}
    });
	
	//Slpash Thumbs	
	jQuery('.splashSelect').on('click','a',function(e){
		jQuery(this).closest('.splashSelect').find('.selected').removeClass('selected');
		jQuery(this).addClass('selected');
	});
	
	
	jQuery('input[type=checkbox]').click(function( event ) {
		ajaxupdate();		
	});
		//plans
	jQuery(".find-plan").find("tr:even").addClass("bg-color-1");
	

});

function ajaxupdate(){
	jQuery.post(
	    ajaxurl, 
	    {
	        'action': 'update_settings',
	        'data':   jQuery("form").serializeArray()
	    },
	    function(response){
	        jQuery( '#mobile_frame' ).attr( 'src', function ( i, val ) { return val; }); // refesh iFrame
	    }
	);
}