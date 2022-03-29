<?php
/*
Header Style
*/
global $dabble_option;
$rs_mouse_pointer="";
$rs_mouse_pointer  = get_post_meta(get_queried_object_id(), 'mouse-pointer', true);
if($rs_mouse_pointer != 'hide'){
	if(!empty($dabble_option['show_pointer']) || ($rs_mouse_pointer == 'show') ){
	    $pointer_localize_data = array(
	        'pointer_border' => $dabble_option['pointer_border'],
	        'border_width'   => $dabble_option['border_width'],
	        'pointer_bg'     => $dabble_option['pointer_bg'],
	        'diameter'       => $dabble_option['diameter'],
	        'scale'          => $dabble_option['scale'],
	        'speed'          => $dabble_option['speed'],     
	    );
	    wp_localize_script( 'dabble-main', 'pointer_data', $pointer_localize_data );
	}
}


if(!empty($dabble_option['show_scrollbar']) ){
    $scroll_localize_data 	= array(
        'cursorcolor' 		=> $dabble_option['cursorcolor'],
        'rail_bg'   		=> $dabble_option['rail_bg'],
        'cursor_width'     	=> $dabble_option['cursor_width'],
        'cursorminheight'   => $dabble_option['cursorminheight'],
        'scrollspeed'       => $dabble_option['scrollspeed'],
        'mousescrollstep'   => $dabble_option['mousescrollstep'],     
    );
    wp_localize_script( 'dabble-main', 'scroll_data', $scroll_localize_data );
}
