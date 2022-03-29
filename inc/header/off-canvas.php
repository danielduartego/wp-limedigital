<?php 
global $dabble_option;
$rs_offcanvas = get_post_meta(get_the_ID(), 'show-off-canvas', true);
$logo_height = !empty($dabble_option['logo-height']) ? 'style = "max-height: '.$dabble_option['logo-height'].'"' : '';
    //off convas here
?>
    
<nav class="menu-wrap-off nav-container nav menu-ofcn">       
<div class="inner-offcan">
    <div class="nav-link-container">  
        <a href='#' class="nav-menu-link close-button" id="close-button2">              
            <i class="flaticon-cross closes"></i>
        </a> 
    </div> 
    <div class="sidenav offcanvas-icon">
        <div id="mobile_menu" class="rs-offcanvas-inner-left">
            <?php
                if ( has_nav_menu( 'menu-1' ) ) {
                    // User has assigned menu to this location;
                    // output it
                    ?>                                
                        <div class="widget widget_nav_menu mobile-menus">      
                            <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu-single1',
                                ) );
                            ?>
                        </div>                                
                    <?php
                }
                ?>
        </div>            
        <?php 
        if(!empty( $dabble_option['off_canvas'] ) || ($rs_offcanvas == 'show') ){
            $off = $dabble_option['off_canvas'];
            if( ($off == 1) || ($rs_offcanvas == 'show')){?>            
            <div class="rs-innner-offcanvas-contents">

                <?php $offcanvas_logo_height = !empty($dabble_option['offcanvas_logo_height']) ? 'style="height: '.$dabble_option['offcanvas_logo_height'].'"' : '';

                if (!empty( $dabble_option['offcanvas_logo']['url'] ) ) { ?>
                    <div
                     class="offcanvas_logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($offcanvas_logo_height, 'educavo');?> src="<?php echo esc_url( $dabble_option['offcanvas_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
                    </div>
                <?php }

                dynamic_sidebar('sidebarcanvas-1');?>
            </div>            
            <?php }
        }?>

        <div class="mobile-topnars">
            <div class="mobile-topnar">  
                <?php if(!empty($dabble_option['top_address'])) { ?>
                <div class="rs-address-area">
                    <div class="rs-address-list">
                        <div class="info-icon">
                            <i class="glyph-icon flaticon-location"></i>
                        </div>
                        <div class="info-title">
                            <?php if (!empty($dabble_option['address__text'])) { ?>
                                <b><?php echo esc_html($dabble_option['address__text'])?></b>
                            <?php } else { ?>
                                <b><?php echo esc_html("Address", "dabble"); ?></b>
                            <?php } ?>
                            <em><?php echo esc_html($dabble_option['top_address']); ?></em>
                        </div>
                    </div>
                </div>
                <?php } ?> 

                <?php if(!empty($dabble_option['top-email'])) { ?>
                <div class="rs-address-area">
                    <div class="rs-address-list">
                        <div class="info-icon">
                            <i class="glyph-icon flaticon-email"></i>
                        </div>
                        <div class="info-title">
                            <?php if (!empty($dabble_option['email__text'])) { ?>
                                <b><?php echo esc_html($dabble_option['email__text'])?></b>
                            <?php } else { ?>
                                <b><?php echo esc_html("Email", "dabble"); ?></b>
                            <?php } ?>
                            <em><a href="mailto:<?php echo esc_attr($dabble_option['top-email'])?>"><?php echo esc_html($dabble_option['top-email'])?></a></em> 
                        </div>
                    </div>
                </div> 
                <?php } ?>


                <?php if(!empty($dabble_option['phone'])) { ?>
                <div class="rs-address-area">
                    <div class="rs-address-list">
                        <div class="info-icon">
                            <i class="glyph-icon flaticon-call"></i>
                        </div>
                        <div class="info-title">
                            <?php if (!empty($dabble_option['phone_line'])) { ?>
                                <b><?php echo esc_html($dabble_option['phone_line'])?></b>
                            <?php } else { ?>
                                <b><?php echo esc_html("Phone", "dabble"); ?></b>
                            <?php } ?>
                            <em> <a href="tel:<?php echo esc_attr(str_replace(" ","",($dabble_option['phone'])))?>"> <?php echo esc_html($dabble_option['phone']); ?></a> </em>
                        </div>
                    </div>
                </div>
                <?php } ?>                              
            </div>
        </div>

        <?php 
        if(!empty( $dabble_option['off_canvas'] ) || ($rs_offcanvas == 'show') ){
            $off = $dabble_option['off_canvas'];
            if( ($off == 1) || ($rs_offcanvas == 'show')){?>            
            <div class="rs-innner-offcanvas-contents"> 
                <?php get_template_part( 'inc/header/offcanvas-content' ); ?>
            </div>            
            <?php }
        }?>

    </div>
    </div>
</nav>