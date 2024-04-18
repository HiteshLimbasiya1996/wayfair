jQuery(document).ready(function($) {
    /** timer counter */
    if( jQuery('.sparkle-maintenance-countdown').length > 0 ){
        jQuery(".sparkle-maintenance-countdown").each(function(){
            var dt = jQuery(this).data('date');
            if( dt ){
                jQuery(this).countdown({ date: dt });
            }       
        })
    }
});