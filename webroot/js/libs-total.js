$(function() {
    //console.log('jquery loaded');
    
	$(".open-panel").click(function(){
		
        var $myurl = $(this).attr('href'),
		    $title = $(this).text(),
		    $ewrap = $('.modal-wrap');
		
        
        $ewrap.dialog({
            autoOpen  : false,
            title     : $title,
            bgiframe  : true,		
            modal     : true,
            height    : 300,
            width     : 400,
            resizable : true,
            buttons   : {
                        'Guardar' : function(){
                            $(this).find('form').submit();
                        }
            }
            
        });
        
        $ewrap.html('loading.gif');
		$ewrap.load($myurl);
		$ewrap.dialog('open');
		
        return false;
		
	});
    
});
