<?php
/*
     Footer Social
*/
     global $dabble_option;
?>
<?php 
      if(!empty($dabble_option['show-social2'])){
            $footer_social = $dabble_option['show-social2'];
            if($footer_social == 1){?>
                  <ul class="footer_social">  
                        <?php
                         if(!empty($dabble_option['facebook'])) { ?>
                         <li> 
                              <a href="<?php echo esc_url($dabble_option['facebook'])?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
                         </li>
                        <?php } ?>
                        <?php if(!empty($dabble_option['twitter'])) { ?>
                        <li> 
                              <a href="<?php echo esc_url($dabble_option['twitter']);?> " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($dabble_option['rss'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['rss']);?> " target="_blank"><span><i class="fa fa-rss"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($dabble_option['pinterest'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['pinterest']);?> " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($dabble_option['linkedin'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['linkedin']);?> " target="_blank"><span><i class="fa fa-linkedin"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($dabble_option['google'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['google']);?> " target="_blank"><span><i class="fa fa-google-plus-square"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($dabble_option['instagram'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['instagram']);?> " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($dabble_option['vimeo'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['vimeo'])?> " target="_blank"><span><i class="fa fa-vimeo"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($dabble_option['tumblr'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['tumblr'])?> " target="_blank"><span><i class="fa fa-tumblr"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($dabble_option['youtube'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($dabble_option['youtube'])?> " target="_blank"><span><i class="fa fa-youtube"></i></span></a> 
                        </li>
                        <?php } ?>     
                  </ul>
       <?php } 
}?>
