<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */

function dabble_scripts() {
	//register styles
	global $dabble_option;
	wp_enqueue_style( 'boostrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css' );	
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() .'/assets/css/font-awesome.min.all.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css');	
	wp_enqueue_style( 'flaticon', get_template_directory_uri() .'/assets/css/flaticon.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() .'/assets/css/slick.css' );	
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css');
	wp_enqueue_style( 'dabble-style-default', get_template_directory_uri() .'/assets/css/default.css' );
	wp_enqueue_style( 'dabble-style-custom', get_template_directory_uri() .'/assets/css/custom.css' );		
	wp_enqueue_style( 'dabble-style-responsive', get_template_directory_uri() .'/assets/css/responsive.css' );

	wp_enqueue_style( 'dabble-style', get_stylesheet_uri() );	

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script('dabble-classie', get_template_directory_uri() . '/assets/js/classie.js', array('jquery'), '201513434', true);
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'waypoints-sticky', get_template_directory_uri() . '/assets/js/waypoints-sticky.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery-counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'isotope-dabble', get_template_directory_uri() . '/assets/js/isotope-dabble.js', array('jquery', 'imagesloaded'), '20151215', true );		
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '20151215', true );		

	
	// Mouse Pointer Scripts
	$rs_mouse_pointer="";
	$rs_mouse_pointer  = get_post_meta(get_queried_object_id(), 'mouse-pointer', true);
	
	if($rs_mouse_pointer != 'hide'){
		if(!empty($dabble_option['show_pointer']) || ($rs_mouse_pointer == 'show') ){
			wp_enqueue_script( 'pointer', get_template_directory_uri() . '/assets/js/pointer.js', array('jquery'), '20151215', true );
		} 
	}
    
    // Scroll Bar - Nice Scroll

	if(!empty($dabble_option['show_scrollbar'])){
		wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.min.js', array('jquery'), '20151215', true );
	} 


	if ( is_page_template( 'page-single.php' ) ) {
		wp_enqueue_script( 'jquery-nav', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'), '20151215', true );
	}
	
	wp_enqueue_script('dabble-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '201513434', true);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dabble_scripts' );

add_action( 'wp_enqueue_scripts', 'dabble_rtl_scripts', 1500 );
if ( !function_exists( 'dabble_rtl_scripts' ) ) {
	function dabble_rtl_scripts() {	
		// RTL
		if ( is_rtl() ) {
			wp_enqueue_style( 'dabble-rtl', get_template_directory_uri() . '/assets/css/rtl.css', array(), 1.0 );
		}		
		
	}
}
	

add_action( 'admin_enqueue_scripts', 'dabble_load_admin_styles' );
function dabble_load_admin_styles($screen) {
	wp_enqueue_style( 'dabble-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', true, '1.0.0' );
	wp_enqueue_script( 'dabble-admin-script', get_template_directory_uri() . '/assets/js/admin-script.js', array('jquery'), '20151215', true );
} 