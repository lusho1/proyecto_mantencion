/* Copyright (C) YOOtheme GmbH, http://www.gnu.org/licenses/gpl.html GNU/GPL */

jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);

	
	if (window.MooTools) {  
    Element.prototype.hide = function() {  
        return;  
    };  
}
	
});
