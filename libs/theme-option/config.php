<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "dabble_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'dabble/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        'page_priority'        => 8,
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Dabble Options', 'dabble' ),
        'page_title'           => esc_html__( 'Dabble Options', 'dabble' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,

        // OPTIONAL -> Give you extra features
        'page_priority'        => 20,        
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        'force_output' => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( 'Dabble Theme', 'dabble' ), $v );
    } else {
        $args['intro_text'] = esc_html__( 'Dabble Theme', 'dabble' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSdabble
      
     */     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Sections', 'dabble' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
        	array(
        	    'id'       => 'enable_global',
        	    'type'     => 'switch', 
        	    'title'    => esc_html__('Enable Global Settings', 'dabble'),
        	    'subtitle' => esc_html__('If you enable global settings all option will be work only theme option', 'dabble'),
        	    'default'  => false,
        	),
            array(
                'id'       => 'container_size',
                'title'    => esc_html__( 'Container Size', 'dabble' ),
                'subtitle' => esc_html__( 'Container Size example(1200px)', 'dabble' ),
                'type'     => 'text',
                'default'  => '1280px'                
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Default Logo', 'dabble' ),
                'subtitle' => esc_html__( 'Upload your logo', 'dabble' ),
                'url'=> true                
            ),

            array(
                'id'       => 'logo_light',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Light', 'dabble' ),
                'subtitle' => esc_html__( 'Upload your light logo', 'dabble' ),
                'url'=> true                
            ),
            array(
                'id'       => 'logo_icons',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload default icon logo', 'dabble' ),
                'subtitle' => esc_html__( 'Upload default icon logo', 'dabble' ),
                'url'=> true
            ),

            array(
                'id'       => 'logo_icons_light',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Light icon logo', 'dabble' ),
                'subtitle' => esc_html__( 'Upload Light icon logo', 'dabble' ),
                'url'=> true
            ),

            array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'dabble' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'dabble' ),
                    'type'     => 'text',
                    'default'  => '25px'                    
            ), 


            array(
                'id'       => 'logo-mobile',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Mobile Logo', 'dabble' ),
                'subtitle' => esc_html__( 'Upload your mobile logo', 'dabble' ),
                'url'=> true                
            ),

            array(
                    'id'       => 'logo-height-mobile',                               
                    'title'    => esc_html__( 'Mobile Logo Height', 'dabble' ),
                    'subtitle' => esc_html__( 'Mobile Logo max height example(50px)', 'dabble' ),
                    'type'     => 'text',
                    'default'  => '25px'                    
            ),

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Sticky Logo', 'dabble' ),
                'subtitle' => esc_html__( 'Upload your sticky logo', 'dabble' ),
                'url'=> true                
            ),

            array(
                'id'       => 'sticky_logo_height',                               
                'title'    => esc_html__( 'Sticky Logo Height', 'dabble' ),
                'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'dabble' ),
                'type'     => 'text',
                'default'  => '25px'
                    
            ),            
            array(
            'id'       => 'rs_favicon',
            'type'     => 'media',
            'title'    => esc_html__( 'Upload Favicon', 'dabble' ),
            'subtitle' => esc_html__( 'Upload your faviocn here', 'dabble' ),
            'url'=> true            
            ),
            
            array(
                'id'       => 'off_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Menu', 'dabble'),
                'subtitle' => esc_html__('You can show or hide sticky menu here', 'dabble'),
                'default'  => false,
            ),
               
             array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Search', 'dabble'),
                'subtitle' => esc_html__('You can show or hide search icon at menu area', 'dabble'),
                'default'  => false,
            ),
            
            array(
                'id'       => 'off_canvas',
                'type'     => 'switch', 
                'title'    => esc_html__('Show off Canvas', 'dabble'),
                'subtitle' => esc_html__('You can show or hide off canvas here', 'dabble'),
                'default'  => false,
            ),  
     
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Go to Top', 'dabble'),
                'subtitle' => esc_html__('You can show or hide here', 'dabble'),
                'default'  => false,
            ), 
           
        )
    ) );
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'dabble' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',       
         
        'fields'           => array(
        array(
            'id'     => 'notice_critical',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Top Area', 'dabble')            
        ),
        
        array(
                'id'       => 'show-top',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Top Bar', 'dabble'),
                'subtitle' => esc_html__('You can select top bar show or hide', 'dabble'),
                'default'  => false,
        ),   
       
      
        array(
                'id'       => 'show-social',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Social Icons at Header', 'dabble'),
                'subtitle' => esc_html__('You can select Social Icons show or hide', 'dabble'),
                'default'  => true,
            ),  
                    
          array(
            'id'     => 'notice_critical2',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Area', 'dabble')            
        ),

        array(
                'id'               => 'header-grid',
                'type'             => 'select',
                'title'            => esc_html__('Header Area Width', 'dabble'),                  
               
                //Must provide key => value pairs for select options
                'options'          => array(                                     
                
                    'container' => esc_html__('Container', 'dabble'),
                    'full'      => esc_html__('Container Fluid', 'dabble'),
                ),

                'default'          => 'container',            
            ),

        array(
                'id'       => 'phone_line',                               
                'title'    => esc_html__( ' Phone Number Pre Text', 'dabble' ),
                'subtitle' => esc_html__( 'Enter Phone Text', 'dabble' ),
                'type'     => 'text',     
        ),

        array(
                'id'       => 'phone',                               
                'title'    => esc_html__( ' Phone Number', 'dabble' ),
                'subtitle' => esc_html__( 'Enter Phone Number', 'dabble' ),
                'type'     => 'text',     
        ),

        array(
            'id'       => 'email__text',                               
            'title'    => esc_html__( ' Email Pre Text', 'dabble' ),
            'subtitle' => esc_html__( 'Enter Email Text', 'dabble' ),
            'type'     => 'text',     
        ),

               
        array(
            'id'       => 'top-email',                               
            'title'    => esc_html__( 'Email Address', 'dabble' ),
            'subtitle' => esc_html__( 'Enter Email Address', 'dabble' ),
            'type'     => 'text',
            'validate' => 'email',
            'msg'      => esc_html__('Email Address Not Valid', 'dabble')  
        ),  

        array(
           'id'       => 'address__text',                               
           'title'    => esc_html__( ' Address Pre Text', 'dabble' ),
           'subtitle' => esc_html__( 'Address Email Text', 'dabble' ),
           'type'     => 'text',     
        ),

        array(
            'id'       => 'top_address',                               
            'title'    => esc_html__( 'Address Address', 'dabble' ),
            'subtitle' => esc_html__( 'Enter Address Text', 'dabble' ),
            'type'     => 'text', 
        ),         

        array(
            'id'       => 'open_hours',                               
            'title'    => esc_html__( 'Opening Hours', 'dabble' ),
            'subtitle' => esc_html__( 'Enter Opening Hours', 'dabble' ),
            'type'     => 'text',
            
        ),  

        array(
            'id'       => 'quote_btns',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Quote Button', 'dabble'),
            'subtitle' => esc_html__('You can show or hide Quote Button', 'dabble'),
            'default'  => false,
        ),
            
        array(
                'id'       => 'quote',                               
                'title'    => esc_html__( 'Quote Button Text', 'dabble' ),                  
                'type'     => 'text',
                
        ),  
        
        array(
                'id'       => 'quote_link',                               
                'title'    => esc_html__( 'Quote Button Link', 'dabble' ),
                'subtitle' => esc_html__( 'Enter Quote Button Link Here', 'dabble' ),
                'type'     => 'text',
                
            ),      
        )
    ) 

);  
   

Redux::setSection( $opt_name, array(
'title'            => esc_html__( 'Header Layout', 'dabble' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection' =>true,      
'fields'    => array( 
                    
                array(
                    'id'       => 'header_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Header Layout', 'dabble'), 
                    'subtitle' => esc_html__('Select header layout. Choose between 1, 2 or 3 layout.', 'dabble'),
                    'options'  => array(
                    'style1'   => array(
                    'alt'      => 'Header Style 1', 
                    'img'      => get_template_directory_uri().'/libs/img/style_1.png'
                    ),                        
                    'style5' => array(
                        'alt'    => 'Header Style 2', 
                        'img'    => get_template_directory_uri().'/libs/img/style_2.png'
                    ),
                    'style8' => array(
                        'alt'    => 'Header Style 3', 
                        'img'    => get_template_directory_uri().'/libs/img/style_3.png'
                    ), 
                    'style9' => array(
                        'alt'    => 'Header Style 4', 
                        'img'    => get_template_directory_uri().'/libs/img/style_4.png'
                    ),                                  
                    ),
                    'default' => 'style5'
            ),                           
                
        )
    ) 
);

                                   
//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'dabble' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'dabble' ),        
        'subsection' =>true,  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ce1446',                        
                    'validate'  => 'color',                        
                ),
                array(
                    'id'        => 'toolbar_bg_skew_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Skew background Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),    

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'       => 'tool_dark_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Dark Color', 'dabble' ),
                    'subtitle' => esc_html__( 'Pick color', 'dabble' ),      
                    'default'  => array(
                        'color'     => '#0a0a0a',                   
                    ),
                    'output' => array(                 
                        'color'            => '#rs-header.header-style8 .rs-address-area .info-title, #rs-header.header-style8 .rs-address-area .info-des, #rs-header.header-style8 .rs-address-area .info-des a'
                    )           
                ),

                array(
                    'id'       => 'tool_dark_hover_color',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Dark Hover Color', 'dabble' ),
                    'subtitle' => esc_html__( 'Pick color', 'dabble' ),      
                    'default'  => array(
                        'color'     => '#ce1446',                   
                    ),
                    'output' => array(                 
                        'color'            => '#rs-header.header-style8 .rs-address-area .info-des a:hover'
                    )           
                ),

                array(
                    'id'        => 'transparent_toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Text Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'       => 'tool_border',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Toolbar Border Color', 'dabble' ),
                    'subtitle' => esc_html__( 'Pick color', 'dabble' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'border-color'            => '#rs-header .toolbar-area .toolbar-contact ul li a, #rs-header .toolbar-area .opening em, #rs-header.header-style5 .toolbar-area, #rs-header.header-style5 .toolbar-area .toolbar-contact ul li, #rs-header.header-style5 .toolbar-area .opening'
                    )           
                ),

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ), 

               

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'transparent_toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Link Hover Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Toolbar Font Size','dabble'),
                    'subtitle'  => esc_html__('Font Size', 'dabble'),    
                    'default'   => '14px',                                            
                ), 
                
        )
    )
); 



//Preloader settings
    Redux::setSection( $opt_name, array(
      'title'  => esc_html__( 'Preloader Style', 'dabble' ),
      'desc'   => esc_html__( 'Preloader Style Here', 'dabble' ),               
      'fields' => array( 
              array(
                  'id'       => 'show_preloader',
                  'type'     => 'switch', 
                  'title'    => esc_html__('Show Preloader', 'dabble'),
                  'subtitle' => esc_html__('You can show or hide preloader', 'dabble'),
                  'default'  => false,
              ), 

              array(
                  'id'        => 'preloader_bg_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Background Color','dabble'),
                  'subtitle'  => esc_html__('Pick color', 'dabble'),    
                  'default'   => '#fff',                        
                  'validate'  => 'color',                        
              ), 
              
              array(
                  'id'        => 'preloader_text_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Border Color','dabble'),
                  'subtitle'  => esc_html__('Pick color', 'dabble'),    
                  'default'   => '#ebebec',                        
                  'validate'  => 'color',                        
              ),  

              array(
                  'id'        => 'preloader_animate_color',
                  'type'      => 'color',                       
                  'title'     => esc_html__('Preloader Animate Circle Color','dabble'),
                  'subtitle'  => esc_html__('Pick color', 'dabble'),    
                  'default'   => '#CE1446',                        
                  'validate'  => 'color',                        
              ), 

              array(
                  'id'    => 'preloader_img', 
                  'url'   => true,     
                  'title' => esc_html__( 'Preloader Image', 'dabble' ),                 
                  'type'  => 'media',                                  
              ),       
        )
    )
); 


//End Preloader settings  
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Global Style', 'dabble' ),
        'desc'   => esc_html__( 'Style your theme', 'dabble' ),        
        'subsection' =>false,  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => esc_html__('Body Backgroud Color','dabble'),
                            'subtitle'  => esc_html__('Pick body background color', 'dabble'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => esc_html__('Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick text color', 'dabble'),
                            'default'   => '#454545',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                            'id'        => 'primary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Primary Color','dabble'),
                            'subtitle'  => esc_html__('Select Primary Color.', 'dabble'),
                            'default'   => '#061340',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'secondary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Secondary Color','dabble'),
                            'subtitle'  => esc_html__('Select Secondary Color.', 'dabble'),
                            'default'   => '#CE1446',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'third_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Third Color','dabble'),
                            'subtitle'  => esc_html__('Select Third Color.', 'dabble'),
                            'default'   => '#BA1266',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'link_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Link Color','dabble'),
                            'subtitle'  => esc_html__('Pick Link color', 'dabble'),
                            'default'   => '#CE1446',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'link_hover_text_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Link Hover Color','dabble'),
                            'subtitle'  => esc_html__('Pick link hover color', 'dabble'),
                            'default'   => '#CE1446',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'gradient_first_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('First Gradient Color','dabble'),
                            'subtitle'  => esc_html__('Pick Gradient color', 'dabble'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),  
                        array(
                            'id'        => 'gradient_snd_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Second Gradient Color','dabble'),
                            'subtitle'  => esc_html__('Pick Gradient color', 'dabble'),
                            'default'   => '',
                            'validate'  => 'color',                        
                        ),    
                       
                 ) 
            ) 
    ); 

    //Menu settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu Style', 'dabble' ),
        'desc'   => esc_html__( 'Main Menu Style Here', 'dabble' ),        
        'subsection' =>false,  
        'fields' => array( 

                        array(
                            'id'     => 'notice_critical_menu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Main Menu Settings', 'dabble'),                                           
                        ),

                        array(
                            'id'       => 'main_menu_center',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Center', 'dabble' ),
                            'on'       => esc_html__( 'Enabled', 'dabble' ),
                            'off'      => esc_html__( 'Disabled', 'dabble' ),
                            'default'  => false,
                        ),

                        array(
                            'id'       => 'main_menu_icon',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Main Menu Icon Hide', 'dabble' ),
                            'on'       => esc_html__( 'Enabled', 'dabble' ),
                            'off'      => esc_html__( 'Disabled', 'dabble' ),
                            'default'  => false,
                        ),

                        array(
                            'id'        => 'menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Background Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '#101010',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'transparent_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '#ffffff',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'transparent_menu_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Hover Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '#CE1446',                        
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'transparent_menu_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Trasparent Menu Active Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '#CE1446',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Hover Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),           
                            'default'   => '#CE1446',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),
                            'default'   => '#CE1446',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Left Right Gap','dabble'),   
                            'default'   => '10px',                             
                        ), 
                        array(
                            'id'        => 'menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Top Gap','dabble'),   
                            'default'   => '22px',                             
                        ),                        

                        array(
                            'id'        => 'menu_item_gap3',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Bottom Gap','dabble'),   
                            'default'   => '22px',                             
                        ),

                        array(
                            'id'       => 'menu_text_trasform',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Menu Text Uppercase', 'dabble' ),
                            'on'       => esc_html__( 'Enabled', 'dabble' ),
                            'off'      => esc_html__( 'Disabled', 'dabble' ),
                            'default'  => false,
                        ),

                        array(
                            'id'     => 'notice_critical_dropmenu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Dropdown Menu Settings', 'dabble'),                                           
                        ),
                                               
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','dabble'),
                            'subtitle'  => esc_html__('Pick bg color', 'dabble'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick text color', 'dabble'),
                            'default'   => '#101010',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick text color', 'dabble'),
                            'default'   => '#CE1446',
                            'validate'  => 'color',                        
                        ),                              
                     

                        array(
                            'id'       => 'menu_text_trasform2',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Text Uppercase', 'dabble' ),
                            'on'       => esc_html__( 'Enabled', 'dabble' ),
                            'off'      => esc_html__( 'Disabled', 'dabble' ),
                            'default'  => false,
                        ),

                        array(
                             'id'        => 'dropdown_menu_item_gap',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Left Right Gap','dabble'),   
                             'default'   => '20px',                             
                         ), 

                        array(
                             'id'        => 'dropdown_menu_item_separate',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Middle Gap','dabble'),   
                             'default'   => '10px',                             
                         ), 
                         array(
                             'id'        => 'dropdown_menu_item_gap2',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Boxes Top Bottom Gap','dabble'),   
                             'default'   => '21px',                             
                         ),
                         array(
                             'id'     => 'notice_critical3',
                             'type'   => 'info',
                             'notice' => true,
                             'style'  => 'success',
                             'title'  => esc_html__('Mega Menu Settings', 'dabble'),                                           
                         ),

                          array(
                            'id'        => 'meaga_menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Left Right Gap','dabble'),   
                            'default'   => '40px',                             
                        ), 

                         array(
                            'id'        => 'mega_menu_item_separate',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Middle Gap','dabble'),   
                            'default'   => '10px',                             
                        ),  
                        array(
                            'id'        => 'mega_menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Boxes Top Bottom Gap','dabble'),   
                            'default'   => '21px',                             
                        ),                       
                        
                        
                )
            )
        ); 

     //Sticky Menu settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sticky Menu Style', 'dabble' ),
        'desc'       => esc_html__( 'Sticky Menu Style Here', 'dabble' ),        
        'subsection' =>false,  
        'fields' => array(                       

                        array(
                            'id'        => 'stiky_menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Sticky Menu Area Background Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '#ffffff',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'stikcy_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '#101010',                        
                            'validate'  => 'color',                        
                        ), 
                       

                        array(
                            'id'        => 'sticky_menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Hover Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),           
                            'default'   => '#CE1446',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'stikcy_menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),
                            'default'   => '#CE1446',
                            'validate'  => 'color',                        
                        ),
                                               
                        array(
                            'id'        => 'sticky_drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','dabble'),
                            'subtitle'  => esc_html__('Pick bg color', 'dabble'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'stikcy_drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick text color', 'dabble'),
                            'default'   => '#101010',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'sticky_drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','dabble'),
                            'subtitle'  => esc_html__('Pick text color', 'dabble'),
                            'default'   => '#CE1446',
                            'validate'  => 'color',                        
                        ),                        
                )
            )
        ); 

    //Breadcrumb settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Breadcrumb Style', 'dabble' ),      
        'subsection' =>false,  
        'fields' => array( 

                      array(
                        'id'       => 'off_breadcrumb',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show off Breadcrumb', 'dabble'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'dabble'),
                        'default'  => true,
                    ),

                    array(
                        'id'        => 'breadcrumb_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#000000',                        
                        'validate'  => 'color',                        
                    ),                     

                     array(
                        'id'       => 'page_banner_main',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Background Banner', 'dabble' ),
                        'subtitle' => esc_html__( 'Upload your banner', 'dabble' ),                  
                    ), 
                    
                    array(
                        'id'        => 'breadcrumb_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#ffffff',                        
                        'validate'  => 'color',                        
                    ),

                    array(
                        'id'        => 'breadcrumb_seperator_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Breadcrumb Seperator Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#CE1446',                        
                        'validate'  => 'color',                        
                    ),  
                    
                  
                    array(
                        'id'        => 'breadcrumb_top_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap','dabble'),                          
                        'default'   => '250px',                        
                                            
                    ), 
                     array(
                        'id'        => 'breadcrumb_bottom_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap','dabble'),                          
                        'default'   => '190px',                        
                                            
                    ),     
                        
                )
            )
        );

    //Button settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Button Style', 'dabble' ),
        'desc'       => esc_html__( 'Button Style Here', 'dabble' ),        
        'subsection' =>false,  
        'fields' => array( 

                    array(
                        'id'        => 'btn_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#CE1446',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_hover',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Background','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#CE2350',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_hover_border',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Border Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#CE1446',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'btn_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#ffffff',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'btn_txt_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Text Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#ffffff',                        
                        'validate'  => 'color',                        
                    ),  
                )
            )
        );
    
    //offcanvas  settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Offcanvas Style', 'dabble' ),
        'desc'   => esc_html__( 'Offcanvas Style Here', 'dabble' ),        
        'subsection' =>false,  
        'fields' => array( 

                array(
                    'id'       => 'offcanvas_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Offcanvas Logo', 'dabble' ),
                    'subtitle' => esc_html__( 'Upload your  logo', 'dabble' ),                  
                ), 

                
                array(
                    'id'       => 'offcanvas_logo_height',                               
                    'title'    => esc_html__( 'Logo Height', 'dabble' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'dabble' ),
                    'type'     => 'text',
                    'default'  => '25px'                    
                ),

                array(
                    'id'        => 'offcan_bgs_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Background Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#000',                        
                    'validate'  => 'color',                        
                ), 
   

                array(
                    'id'        => 'offcan_link_social_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Social Icon Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'offcan_txt_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Text Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),
                 
                array(
                    'id'        => 'offcan_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),  
                array(
                    'id'        => 'offcan_link_hovers_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Link hover Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ce1446',                        
                    'validate'  => 'color',                        
                ),  

          
                array(
                    'id'        => 'offcanvas_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Dots Primary Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '#ce1446',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'offcan_iconss_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Icon Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
          
                array(
                    'id'        => 'offcanvas_dots_secondary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Dots Secondary Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'offcanvas_dots_close_secondary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Hamburger Close Color','dabble'),
                    'subtitle'  => esc_html__('Pick color', 'dabble'),    
                    'default'   => '',                        
                    'validate'  => 'color',                        
                ),
            )
        )
    );
    

    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'dabble' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'You can specify your body and heading font here','dabble'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'dabble' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'dabble' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '15px',
                    'font-family' => 'Montserrat',
                    'font-weight' => '400',
                ),
            ),
             array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'dabble' ),
                'subtitle' => esc_html__( 'Specify the menu font properties.', 'dabble' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#202427',                    
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '15px',                    
                    'font-weight' => '600',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H1', 'dabble' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'dabble' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '46px',
                    'line-height' => '56px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H2', 'dabble' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'dabble' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '36px',
                    'line-height' => '40px'
                    
                ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H3', 'dabble' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'dabble' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '28px',
                    'line-height' => '32px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H4', 'dabble' ),                
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'dabble' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '20px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H5', 'dabble' ),                
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'dabble' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H6', 'dabble' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'dabble' ),
                'default'     => array(
                    'color'       => '#0a0a0a',
                    'font-style'  => '700',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '16px',
                    'line-height' => '20px'
                ),
            ),
                
        )
    )                    
   
);

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'dabble' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
        );
        
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'dabble' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                                array(
                                    'id'    => 'blog_banner_main', 
                                    'url'   => true,     
                                    'title' => esc_html__( 'Blog Page Banner', 'dabble' ),                 
                                    'type'  => 'media',                                  
                                ),  

                                array(
                                    'id'        => 'blog_bg_color',
                                    'type'      => 'color',                           
                                    'title'     => esc_html__('Body Backgroud Color','dabble'),
                                    'subtitle'  => esc_html__('Pick body background color', 'dabble'),
                                    'default'   => '#ffffff',
                                    'validate'  => 'color',                        
                                ),
                                
                                array(
                                    'id'       => 'blog_title',                               
                                    'title'    => esc_html__( 'Blog  Title', 'dabble' ),
                                    'subtitle' => esc_html__( 'Enter Blog  Title Here', 'dabble' ),
                                    'type'     => 'text',                                   
                                ),
                                
                                array(
                                    'id'               => 'blog-layout',
                                    'type'             => 'image_select',
                                    'title'            => esc_html__('Select Blog Layout', 'dabble'), 
                                    'subtitle'         => esc_html__('Select your blog layout', 'dabble'),
                                    'options'          => array(
                                    'full'             => array(
                                    'alt'              => 'Blog Style 1', 
                                    'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
                                ),
                                    '2right'           => array(
                                    'alt'              => 'Blog Style 2', 
                                    'img'              => get_template_directory_uri().'/libs/img/2cr.png'
                                ),
                                '2left'            => array(
                                'alt'              => 'Blog Style 3', 
                                'img'              => get_template_directory_uri().'/libs/img/2cl.png'
                                ),                                  
                                ),
                                'default'          => '2right'
                                ),                      
                                
                                array(
                                    'id'               => 'blog-grid',
                                    'type'             => 'select',
                                    'title'            => esc_html__('Select Blog Gird', 'dabble'),                   
                                    'desc'             => esc_html__('Select your blog gird layout', 'dabble'),
                                //Must provide key => value pairs for select options
                                'options'          => array(
                                    '12'               => esc_html__('1 Column','dabble'),                                   
                                    '6'                => esc_html__('2 Column', 'dabble'),                                         
                                    '4'                => esc_html__('3 Column', 'dabble'),
                                    '3'                => esc_html__('4 Column', 'dabble'),
                                    ),
                                    'default'          => '12',                                  
                                ),  
                                
                                array(
                                'id'               => 'blog-author-post',
                                'type'             => 'select',
                                'title'            => esc_html__('Show Author Info ', 'dabble'),                   
                                'desc'             => esc_html__('Select author info show or hide', 'dabble'),
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','dabble'), 
                                'hide'             => esc_html__('Hide', 'dabble'),
                                ),
                                'default'          => 'show',
                                
                                ), 

                                array(
                                    'id'       => 'admin-link-blog',
                                    'type'     => 'switch', 
                                    'title'    => esc_html__('Show Author Link', 'dabble'),
                                    'subtitle' => esc_html__('You Can Show Author Link', 'dabble'),
                                    'default'  => false,
                                ), 

                                array(
                                'id'               => 'blog-category',
                                'type'             => 'select',
                                'title'            => esc_html__('Show Category', 'dabble'),                   
                               
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','dabble'), 
                                'hide'             => esc_html__('Hide', 'dabble'),
                                ),
                                'default'          => 'show',
                                
                                ),  
                                
                                array(
                                    'id'               => 'blog-date',
                                    'type'             => 'switch',
                                    'title'            => esc_html__('Hide Date', 'dabble'),                   
                                    'desc'             => esc_html__('You can show/hide date at blog page', 'dabble'),                                    
                                    'default'          => false,
                                ), 
                                array(
                                    'id'               => 'blog_readmore',                               
                                    'title'            => esc_html__( 'Blog  ReadMore Text', 'dabble' ),
                                    'subtitle'         => esc_html__( 'Enter Blog  ReadMore Here', 'dabble' ),
                                    'type'             => 'text',                                   
                                ),
                                
                            )
                        ) 
                                
                    );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post', 'dabble' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
                            array(
                                'id'       => 'blog_banner', 
                                'url'      => true,     
                                'title'    => esc_html__( 'Blog Single page banner', 'dabble' ),                  
                                'type'     => 'media',                                    
                            ),  
                           
                            array(
                               'id'       => 'blog-author',
                               'type'     => 'switch', 
                               'title'    => esc_html__('Hide Meta', 'dabble'),
                               'subtitle' => esc_html__('You can show or hide Meta', 'dabble'),
                               'default'  => false,
                            ), 
                            array(
                                'id'       => 'admin-link',
                                'type'     => 'switch', 
                                'title'    => esc_html__('Show Author Link', 'dabble'),
                                'subtitle' => esc_html__('You Can Show Author Link', 'dabble'),
                                'default'  => false,
                            ),    
                        )
                )    
    
    );

  
    /*Team Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Team Section', 'dabble' ),
        'id'               => 'team',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(

             array(
                'id'       => 'show-team-banner',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Team Page Banner', 'dabble'),
                'subtitle' => esc_html__('You can select banner show or hide', 'dabble'),
                'default'  => true,
            ), 
        
            array(
                    'id'       => 'team_single_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Team Single page banner image', 'dabble' ),                    
                    'type'     => 'media',
                    
            ),  

             array(
                    'id'        => 'team_single_bg_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Sinlge Team Body Backgroud Color','dabble'),
                    'subtitle'  => esc_html__('Pick body background color', 'dabble'),
                    'default'   => '#fffffffff',
                    'validate'  => 'color',                        
                ),
            
            array(
                    'id'       => 'team_slug',                               
                    'title'    => esc_html__( 'Team Slug', 'dabble' ),
                    'subtitle' => esc_html__( 'Enter Team Slug Here', 'dabble' ),
                    'type'     => 'text',
                    'default'  => esc_html__('teams', 'dabble'), 
                ), 

                array(
                    'id'       => 'team_sigle_txt',                               
                    'title'    => esc_html__( 'Team Single Banner Text', 'dabble' ),                  
                    'type'     => 'text',      
                ),              
                          
             )
         ) 
    );
    

    /*Service Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Service Section', 'dabble' ),
        'id'               => 'service',
        'customizer_width' => '450px',
        'icon' => 'el el-briefcase',
        'fields'           => array(
        
            array(
                    'id'       => 'service_single_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Service Single page banner image', 'dabble' ),                    
                    'type'     => 'media',
                    
            ),  
            
            array(
                    'id'       => 'service_slug',                               
                    'title'    => esc_html__( 'Service Slug', 'dabble' ),
                    'subtitle' => esc_html__( 'Enter Service Slug Here', 'dabble' ),
                    'type'     => 'text',
                    'default'  => 'service',
                    
                ),      
             )
         ) 
    );

    /*Department Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Section', 'dabble' ),
        'id'               => 'Portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-align-right',
        'fields'           => array(
        
            array(
                    'id'       => 'department_single_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Portfolio Single page banner image', 'dabble' ),                    
                    'type'     => 'media',
                    
            ),  

             array(
                    'id'       => 'portfolio_slug',                               
                    'title'    => esc_html__( 'Portfolio Slug', 'dabble' ),
                    'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'dabble' ),
                    'type'     => 'text',
                    'default'  => 'portfolio',
                    
                ), 
            )
         ) 
    );




    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'dabble' ),
        'desc'   => esc_html__( 'Add your social icon here', 'dabble' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                    array(
                        'id'       => 'facebook',                               
                        'title'    => esc_html__( 'Facebook Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Facebook Link', 'dabble' ),
                        'type'     => 'text',                     
                    ),
                        
                     array(
                        'id'       => 'twitter',                               
                        'title'    => esc_html__( 'Twitter Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Twitter Link', 'dabble' ),
                        'type'     => 'text'
                    ),
                    
                        array(
                        'id'       => 'rss',                               
                        'title'    => esc_html__( 'Rss Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Rss Link', 'dabble' ),
                        'type'     => 'text'
                    ),
                    
                     array(
                        'id'       => 'pinterest',                               
                        'title'    => esc_html__( 'Pinterest Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Pinterest Link', 'dabble' ),
                        'type'     => 'text'
                    ),
                     array(
                        'id'       => 'linkedin',                               
                        'title'    => esc_html__( 'Linkedin Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Linkedin Link', 'dabble' ),
                        'type'     => 'text',  
                    ),

                    array(
                        'id'       => 'instagram',                               
                        'title'    => esc_html__( 'Instagram Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Instagram Link', 'dabble' ),
                        'type'     => 'text',                       
                    ),

                     array(
                        'id'       => 'youtube',                               
                        'title'    => esc_html__( 'Youtube Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Youtube Link', 'dabble' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'tumblr',                               
                        'title'    => esc_html__( 'Tumblr Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Tumblr Link', 'dabble' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'vimeo',                               
                        'title'    => esc_html__( 'Vimeo Link', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Vimeo Link', 'dabble' ),
                        'type'     => 'text',                       
                    ),         
            ) 
        ) 
    );
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Mouse Pointer', 'dabble' ),
        'desc'   => esc_html__( 'Add your Mouse Pointer here', 'dabble' ),
        'icon'   => 'el el-hand-up',
        'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                        array(
                            'id'       => 'show_pointer',
                            'type'     => 'switch', 
                            'title'    => esc_html__('Show Pointer', 'dabble'),
                            'subtitle' => esc_html__('You can show or hide Mouse Pointer', 'dabble'),
                            'default'  => false,
                        ), 

                        array(
                            'id'        => 'pointer_border',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Pointer Border','dabble'),
                            'subtitle'  => esc_html__('Pick color', 'dabble'),    
                            'default'   => '#CE1446',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'       => 'border_width',                               
                            'title'    => esc_html__( 'Border Width', 'dabble' ),
                            'subtitle' => esc_html__( 'Enter Pointer Border Width', 'dabble' ),
                            'type'     => 'text',
                            'default'   => '2',                         
                        ), 

                        array(
                            'id'        => 'pointer_bg',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Pointer Background','dabble'),
                            'subtitle'  => esc_html__('Enter Pointer Background color', 'dabble'),    
                            'default'   => 'transparent',                        
                            'validate'  => 'color',                        
                        ),  


                        array(
                            'id'       => 'diameter',                               
                            'title'    => esc_html__( 'Diameter', 'dabble' ),
                            'subtitle' => esc_html__( 'Enter Pointer diameter Size', 'dabble' ),
                            'type'     => 'text',  
                            'default'   => '40',                    
                        ),   

                        array(
                            'id'       => 'speed',                               
                            'title'    => esc_html__( 'Pointer Speed', 'dabble' ),
                            'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'dabble' ),
                            'type'     => 'text',
                            'default'   => '4',                         
                        ),                     

                        array(
                            'id'       => 'scale',                               
                            'title'    => esc_html__( 'Hover Scale', 'dabble' ),
                            'subtitle' => esc_html__( 'Enter Pointer Scale Size', 'dabble' ),
                            'type'     => 'text',
                            'default'   => '1.3',                         
                        ),
            ) 
        ) 
    );

    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'ScrollBar', 'dabble' ),
    'desc'   => esc_html__( 'Add custom scrollbar options here', 'dabble' ),
    'icon'   => 'el el-hand-up',
    'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(
                    array(
                        'id'       => 'show_scrollbar',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show ScrollBar', 'dabble'),
                        'subtitle' => esc_html__('You can show or hide ScrollBar', 'dabble'),
                        'default'  => false,
                    ), 


                    array(
                        'id'        => 'cursorcolor',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Cursor Color','dabble'),
                        'subtitle'  => esc_html__('Pick color', 'dabble'),    
                        'default'   => '#CE1446',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'rail_bg',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Rail Background','dabble'),
                        'subtitle'  => esc_html__('Enter Rail Background color', 'dabble'),    
                        'default'   => '#010101',                        
                        'validate'  => 'color',                        
                    ),  


                    array(
                        'id'       => 'cursor_width',                               
                        'title'    => esc_html__( 'Cursor Width', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Cursor Width', 'dabble' ),
                        'type'     => 'text',
                        'default'   => '14',                         
                    ),                         

                    array(
                        'id'       => 'cursorminheight',                               
                        'title'    => esc_html__( 'Cursor Min Height', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Cursor Min Height', 'dabble' ),
                        'type'     => 'text',
                        'default'  => '120',                         
                    ),                         

                    array(
                        'id'       => 'scrollspeed',                               
                        'title'    => esc_html__( 'Scroll Speed', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Scroll Speed', 'dabble' ),
                        'type'     => 'text',
                        'default'   => '60',                         
                    ),                         


                    array(
                        'id'       => 'mousescrollstep',                               
                        'title'    => esc_html__( 'Mouse Scroll Step', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter Mouse Scroll Step', 'dabble' ),
                        'type'     => 'text',
                        'default'   => '110',                         
                    ), 

                 
            ) 
        ) 
    );
    if ( class_exists( 'WooCommerce' ) ) {
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'dabble' ),    
        'icon'   => 'el el-shopping-cart',    
        ) 
    ); 

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Shop', 'dabble' ),
        'id'               => 'shop_layout',
        'customizer_width' => '450px',
        'subsection' =>true,      
        'fields'           => array(                      
            array(
                'id'       => 'shop_banner', 
                'url'      => true,     
                'title'    => esc_html__( 'Shop page banner', 'dabble' ),                    
                'type'     => 'media',
            ), 
            array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'dabble'), 
                    'subtitle' => esc_html__('Select your shop layout', 'dabble'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => 'Shop Style 1', 
                            'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                        ),
                        'right-col' => array(
                            'alt'   => 'Shop Style 2', 
                            'img'   => get_template_directory_uri().'/libs/img/2cr.png'
                        ),
                        'left-col'  => array(
                            'alt'   => 'Shop Style 3', 
                            'img'   => get_template_directory_uri().'/libs/img/2cl.png'
                        ),                                  
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Page', 'dabble' ),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Row', 'dabble' ),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Icon Show At Menu Area', 'dabble' ),
                    'on'       => esc_html__( 'Enabled', 'dabble' ),
                    'off'      => esc_html__( 'Disabled', 'dabble' ),
                    'default'  => false,
                ), 

                 array(
                'id'       => 'disable-sidebar',
                'type'     => 'switch', 
                'title'    => esc_html__('Sidebar Disable For Single Product Page', 'dabble'),                
                'default'  => true,
            ), 
               
            )
        ) 
    );
}
   
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer Option', 'dabble' ),
    'desc'   => esc_html__( 'Footer style here', 'dabble' ),
    'icon'   => 'el el-th-large',   
    'fields' => array(
                array(
                        'id'       => 'footer_bg_image', 
                        'url'      => true,     
                        'title'    => esc_html__( 'Footer Background Image', 'dabble' ),                 
                        'type'     => 'media',                                  
                ),

                array(
                        'id'        => 'footer_bg_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Bg Color','dabble'),
                        'subtitle'  => esc_html__('Pick color.', 'dabble'),
                        'default'   => '#121212',
                        'validate'  => 'color',                        
                    ),  

                 array(
                    'id'               => 'header_grid2',
                    'type'             => 'select',
                    'title'            => esc_html__('Footer Area Width', 'dabble'),             
                   
                    'options'          => array(                                     
                    
                        'container' => esc_html__('Container', 'dabble'),
                        'full'      => esc_html__('Container Fluid', 'dabble')
                    ),

                    'default'          => 'container',            
                ),

                array(
                    'id'       => 'footer_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Footer Logo', 'dabble' ),
                    'subtitle' => esc_html__( 'Upload your footer logo', 'dabble' ),                  
                ), 

             
                array(
                    'id'       => 'footer-logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'dabble' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'dabble' ),
                    'type'     => 'text',
                    'default'  => '25px'                    
                ), 
                array(
                    'id'        => 'foot_social_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),                   

                array(
                    'id'        => 'foot_social_hover',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Hover','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '#CE1446',
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'footer_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Font Size','dabble'),
                    'subtitle'  => esc_html__('Font Size', 'dabble'),    
                    'default'   => '15px',                                            
                ),  

                array(
                    'id'        => 'footer_h3_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Title Font Size','dabble'),
                    'subtitle'  => esc_html__('Font Size', 'dabble'),    
                    'default'   => '20px',                                            
                ),  

                array(
                    'id'        => 'footer_link_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Footer Link Font Size','dabble'),
                    'subtitle'  => esc_html__('Font Size', 'dabble'),    
                    'default'   => '',                                            
                ), 
                array(
                    'id'        => 'footer_title_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Title Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),

                 array(
                    'id'        => 'footer_title_border_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Title Border Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'footer_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Text Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'footer_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Icon Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'footer_link_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Link Hover Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '#CE1446',
                    'validate'  => 'color',                        
                ),   

                array(
                    'id'        => 'footer_input_bg_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Button Background Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '',
                    'validate'  => 'color',                        
                ), 

                array(
                        'id'        => 'footer_input_hover_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Button Hover Background Color','dabble'),
                        'subtitle'  => esc_html__('Pick color.', 'dabble'),
                        'default'   => '',
                        'validate'  => 'color',                        
                    ),

                array(
                        'id'        => 'footer_input_border_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer input Border Color','dabble'),
                        'subtitle'  => esc_html__('Pick color.', 'dabble'),
                        'default'   => '#333333',
                        'validate'  => 'color',                        
                    ),  

                array(
                    'id'        => 'footer_input_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Footer Button Text Color','dabble'),
                    'subtitle'  => esc_html__('Pick color.', 'dabble'),
                    'default'   => '#ffffff',
                    'validate'  => 'color',                        
                ),                  
                       
                
                array(
                    'id'       => 'copyright',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Footer CopyRight', 'dabble' ),
                    'subtitle' => esc_html__( 'Change your footer copyright text ?', 'dabble' ),
                    'default'  => esc_html__( '2021 All Rights Reserved', 'dabble' ),
                ),  

                array(
                    'id'       => 'copyright_bg',
                    'type'     => 'color_rgba',
                    'title'    => esc_html__( 'Copyright Background', 'dabble' ),
                    'subtitle' => esc_html__( 'Copyright Background Color', 'dabble' ),      
                    'default'  => array(
                        'color'     => '',                   
                    ),
                    'output' => array(                 
                        'background'            => 'body .footer-bottom'
                    )           
                ),
         
                array(
                    'id'       => 'copyright_text_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Text Color', 'dabble' ),
                    'subtitle' => esc_html__( 'Copyright Text Color', 'dabble' ),      
                    'default'  => '#ffffff',            
                ), 
            ) 
        ) 
    );        
    
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Error Page', 'dabble' ),
    'desc'   => esc_html__( '404 details  here', 'dabble' ),
    'icon'   => 'el el-error-alt',    
    'fields' => array(

                array(
                        'id'       => 'title_404',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Title', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter title for 404 page', 'dabble' ), 
                        'default'  => esc_html__('404', 'dabble')                
                    ),  
                
                array(
                        'id'       => 'text_404',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Text', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter text for 404 page', 'dabble' ),  
                        'default'  => esc_html__('Page Not Found', 'dabble')             
                    ),                      
                       
                
                array(
                        'id'       => 'back_home',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Back to Home Button Label', 'dabble' ),
                        'subtitle' => esc_html__( 'Enter label for "Back to Home" button', 'dabble' ),
                        'default'  => esc_html__('Back to Homepage', 'dabble')  
                                    
                    ), 

                array(
                    'id'       => 'error_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload 404 Page Bg', 'dabble' ),
                    'subtitle' => esc_html__( 'Upload your image', 'dabble' ),
                    'url'=> true                
                ),                
            
                                  
            ) 
        ) 
    );   


    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";           
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.     
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'dabble' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'dabble' ),
                'icon'   => 'el el-paper-clip',              
                'fields' => array()
            );
            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';
            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );              
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }