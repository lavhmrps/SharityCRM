  $(document).ready(function(){   
    $("#menu_panel_div").panel({
      toggleEvent : 'click',
      toggleSelector : '#menu_toggle'
    });   
  });
(function( $ ){

  var methods = {
    
    init : function( options ) { 
     
     return this.each(function() {
     
     	 $(this).data('settings',{
      	element : $(this),
      	handle : ".panel_tab",
      	content : ".panel_content",
      	opened : false,
      	hidden : false,
      	direction : "both",
      	openedSize : 500,
      	offset : 0,
      	closedSize : 0,
      	pos : $(this).position(),
      	animTime : 500, //animeringstid
      	toggleEvent : '',
      	openSelector : '',
      	closeSelector : '',
      	toggleSelector : '',
      	
      });
      
        var el = $(this);		
     	$.extend($(this).data('settings'), options);

     	


		$(el.data('settings').toggleSelector).live(el.data('settings').toggleEvent,function(e){
			methods.toggle(el);	
		});
		
		
		
	});
	
    }, 
    open : function(el){
 		
 		el.animate({width: el.data('settings').openedSize+"px"}, {duration:el.data('settings').animTime, queue:false});     
		$(el.data('settings').content).animate({width: el.data('settings').openedSize+"px"}, {duration:el.data('settings').animTime, queue:false}); 
        $(el.data('settings').handle).animate({width: "0px"}, {duration:el.data('settings').animTime, queue:false});
		//el.find('.panel_tab').find('.vertical').fadeOut('fast');
      	el.data('settings').opened = true;
    },
    
    
    forceClose : function(el){
    	el.animate({width: el.data('settings').offset+"px"}, {duration:el.data('settings').animTime, queue:false});
 		$(el.data('settings').content).animate({width: "0"}, {duration:el.data('settings').animTime, queue:false});
 		$(el.data('settings').handle).animate({width: el.data('settings').offset+"px"}, {duration:el.data('settings').animTime, queue:false});
 		el.data('settings').opened = false;
 		el.data('settings').hidden = false;
    },
    toggle : function(el){
    	if(el.data('settings').opened == true){
    		    	el.animate({width: el.data('settings').offset+"px"}, {duration:el.data('settings').animTime, queue:false});
 					$(el.data('settings').content).animate({width: "0"}, {duration:el.data('settings').animTime, queue:false});
 					$(el.data('settings').handle).animate({width: el.data('settings').offset+"px"}, {duration:el.data('settings').animTime, queue:false});
 					
    		el.data('settings').opened = false;
    		el.data('settings').hidden = false;
    	}else{
	    	el.animate({width: el.data('settings').openedSize+"px"}, {duration:el.data('settings').animTime, queue:false});     
			$(el.data('settings').content).animate({width: el.data('settings').openedSize+"px"}, {duration:el.data('settings').animTime, queue:false}); 
	        $(el.data('settings').handle).animate({width: "0px"}, {duration:el.data('settings').animTime, queue:false});
			//el.find('.panel_tab').find('.vertical').fadeOut('fast');
	   
    		el.data('settings').opened = true;
    		el.data('settings').hidden = false;
    	}
    	
    }
    
};

  $.fn.panel = function( method ) {
    
    // Method calling logic
    if ( methods[method] ) {
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
    }    
  
  };

})( jQuery );