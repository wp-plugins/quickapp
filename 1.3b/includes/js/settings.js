jQuery(document).ready(function(e){
	
	//Font Enchancer
	function gettextSizes(){
		getFontSize = jQuery('.innerpage .cnt p').css('font-size').replace('px','');
		getHDs = jQuery('.innerpage .cnt').find('h1, h2, h3, h4, h5, h6');
	}
    jQuery('.fontExpander').on('click','.plus',function(e){
     	gettextSizes();		
		var newSize = parseInt(getFontSize)+7;
		var newSizeforHDs = parseInt(newSize)+10;
		
		if (getFontSize < 50){
			jQuery('.innerpage .cnt *').css('font-size' , newSize+'px');
			jQuery(getHDs).css('font-size' , newSizeforHDs+'px');
		}
    });
	
	jQuery('.fontExpander').on('click','.minus',function(e){
		gettextSizes();
		var newSize = parseInt(getFontSize)-7;
		var newSizeforHDs = parseInt(newSize)+16;
		
		if (getFontSize > 18){
			jQuery('.innerpage .cnt *').css('font-size' , newSize+'px');
			jQuery(getHDs).css('font-size' , newSizeforHDs+'px');
		}
    });    
});