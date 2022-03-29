<?php 

global $dabble_option;
if(!empty($dabble_option['facebook']) || !empty($dabble_option['twitter']) || !empty($dabble_option['rss']) || !empty($dabble_option['pinterest']) || !empty($dabble_option['google']) || !empty($dabble_option['instagram']) || !empty($dabble_option['vimeo']) || !empty($dabble_option['tumblr']) ||  !empty($dabble_option['youtube'])){
?>

    <ul class="offcanvas_social">            

        <?php if(!empty($dabble_option['facebook'])) { ?>
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
        
    </ul>
<?php }

