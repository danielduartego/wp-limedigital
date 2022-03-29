<?php
/* Top Header part for dabble Theme
*/

global $dabble_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($rs_top_bar != 'hide'){
  if(!empty($dabble_option['show-top']) || ($rs_top_bar=='show')){
     
       if( !empty($dabble_option['welcome-text']) || !empty($dabble_option['show-social'])){?> 
          <div class="toolbar-area">
            <div class="<?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-lg-7">
                  <div class="toolbar-contact">
                    <ul class="rs-contact-info">                   
                       <?php if(!empty($dabble_option['welcome-text'])) { ?>
                            <li> <?php echo esc_html($dabble_option['welcome-text']); ?> </li>
                  <?php } ?> 
                  </ul>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="toolbar-sl-share">
                    <ul class="clearfix">
                      <?php
                      if(!empty($dabble_option['show-social'])){
                        $top_social = $dabble_option['show-social']; 
                    
                          if($top_social == '1'){

                            if(!empty($dabble_option['facebook'])) { ?>
                            <li> <a href="<?php echo esc_url($dabble_option['facebook']);?>" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($dabble_option['twitter'])) { ?>
                            <li> <a href="<?php echo esc_url($dabble_option['twitter']);?> " target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($dabble_option['rss'])) { ?>
                            <li> <a href="<?php  echo esc_url($dabble_option['rss']);?> " target="_blank"> <i class="fas fa-rss"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($dabble_option['pinterest'])) { ?>
                            <li> <a href="<?php  echo esc_url($dabble_option['pinterest']);?> " target="_blank"> <i class="fab fa-pinterest-p"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($dabble_option['linkedin'])) { ?>
                            <li> <a href="<?php  echo esc_url($dabble_option['linkedin']);?> " target="_blank"> <i class="fab fa-linkedin-in"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($dabble_option['instagram'])) { ?>
                            <li> <a href="<?php  echo esc_url($dabble_option['instagram']);?> " target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($dabble_option['vimeo'])) { ?>
                            <li> <a href="<?php  echo esc_url($dabble_option['vimeo']);?> " target="_blank"> <i class="fab fa-vimeo-v"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($dabble_option['tumblr'])) { ?>
                            <li> <a href="<?php  echo esc_url($dabble_option['tumblr']);?> " target="_blank"> <i class="fab fa-tumblr"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($dabble_option['youtube'])) { ?>
                            <li> <a href="<?php  echo esc_url($dabble_option['youtube']);?> " target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
                            <?php } ?>

                                <?php }
                            }
                         ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php 
    }
  }
} ?>
