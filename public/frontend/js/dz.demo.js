/*
Abstract : Demo Page Js File
File : dz.demo.js
*/
 jQuery(document).ready(function(){
	  dataFilter = getUrlParameter('f');
	  if (typeof dataFilter === "undefined") {
	  }else{
		  jQuery('.filters li').removeClass('active');
		  jQuery('[data-filter="'+dataFilter+'"]').addClass('active');
		  //Winkit.masonryBoxk(dataFilter);
		  /*jQuery("#masonry").masonryFilter({
				filter: function () {
					if (!dataFilter) return true;
					return $(this).hasClass(dataFilter);
				}
		   });*/
	  }
	  
	  jQuery('.win-filter').click(function(e){
		e.preventDefault();
		revHref = jQuery(this).attr('href');
		revFilter = jQuery('.filters  li.active').attr('data-filter');
		url = revHref+'&f='+revFilter;
		jQuery( location ).attr("href", url);
	});
	
	jQuery('.win-demo-select').change(function(){
		pval = jQuery(this).val();
		pTarget = jQuery(this).find('option:selected').attr("target");
		if (typeof pTarget === "undefined") {
			
		}else{
			if(jQuery.trim(pval) != ''){
				pHref = jQuery(this).find('option:selected').attr("href");
				purl = pHref+'?s='+pval;
				window.open(purl,pTarget);
			}else{
				pHref = jQuery(this).find('option:selected').attr("href");
				window.open(pHref,pTarget);
			}
		}
	});
	
	jQuery("#resizable").resizable();
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}; 