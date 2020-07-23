(function($){
	$(function(){
		if(!JDCONST.IS_MOBILE){
			$("body").niceScroll({cursorcolor:"#f60000",cursorborder:"none",cursorwidth: "8px",zindex: "999",touchbehavior: false,emulatetouch: false,});
		}
	})
})(jQuery);
