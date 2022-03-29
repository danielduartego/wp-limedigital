<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
get_header('404');

global $dabble_option;
$error_bg = !empty($dabble_option['error_bg']['url']) ? 'style="background:url('.$dabble_option['error_bg']['url'].')"': '';?>

<div class="page-error <?php if($dabble_option){ echo esc_attr('not-found-bg');}?>" <?php echo wp_kses_post( $error_bg ); ?>>
    <div class="container">
        <div id="content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">    
                    <section class="error-404 not-found">    
                        <div class="page-content">
                            <h2>
                                <span>
                                    
                                    <?php
                                        if(!empty($dabble_option['title_404'])){
                                            echo esc_html($dabble_option['title_404']);
                                        }
                                        else{
                                            echo esc_html__( '404', 'dabble' ); 
                                        }
                                    ?>
                                </span>                      
                                <?php

                                 if(!empty($dabble_option['text_404'])){
                                      echo esc_html($dabble_option['text_404']);
                                 }
                                 else{
                                  echo esc_html__( 'oops! page not found', 'dabble' ); }
                                 ?>
                            </h2>
                            <a class="readon" href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php
                                 if(!empty($dabble_option['back_home'])){
                                     echo esc_html($dabble_option['back_home']);
                                 }
                                 else{
                                     esc_html_e('Or back to homepage', 'dabble'); 
                                  }
                                ?>
                            </a>
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>   
</div> <!-- .page-error -->
<?php
get_footer('404');