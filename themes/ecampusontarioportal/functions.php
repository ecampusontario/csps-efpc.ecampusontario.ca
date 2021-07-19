<?php
/**
 * ecampusontarioportal only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
    //require get_template_directory() . '/inc/back-compat.php';
    return;
}

function ecampusontarioportal_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/ecampusontarioportal
     * If you're building a theme based on Twenty Seventeen, use a find and replace
     * to change 'ecampusontarioportal' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'ecampusontarioportal' );
    
    // This theme uses wp_nav_menu() in three locations.
    register_nav_menus( array(
        'english_top'    => __( 'English Top Menu', 'ecampusontarioportal' ),
        'english_footer-left'    => __( 'English Footer Left Menu', 'ecampusontarioportal' ),
        'english_footer-center'    => __( 'English Footer Center Menu', 'ecampusontarioportal' ),
        'english_footer-right'    => __( 'English Footer Right Menu', 'ecampusontarioportal' ),
        'french_top'    => __( 'French Top Menu', 'ecampusontarioportal' ),
        'french_footer-left'    => __( 'French Footer Left Menu', 'ecampusontarioportal' ),
        'french_footer-center'    => __( 'French Footer Center Menu', 'ecampusontarioportal' ),
        'french_footer-right'    => __( 'French Footer Right Menu', 'ecampusontarioportal' )
    ) );
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    
}
add_action( 'after_setup_theme', 'ecampusontarioportal_setup' );
add_filter('img_caption_shortcode_width', '__return_false');
// add tag and category support to pages
function tags_categories_support_all() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}

// ensure all tags and categories are included in queries
function tags_categories_support_query($wp_query) {
    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
    if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
}

// tag and category hooks
add_action('init', 'tags_categories_support_all');
add_action('pre_get_posts', 'tags_categories_support_query');
function ecampusontarioportal_widgets_init() {
    $languages=['english','french'];
    foreach($languages as $language){
        register_sidebar( array(
            'name'          => __( $language.' adopt', 'ecampusontarioportal' ),
            'id'            => $language.'_adopt-box',
            'description'   => __( 'Add widgets here to appear in the '.$language.' adopt box.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' adapt', 'ecampusontarioportal' ),
            'id'            => $language.'_adapt-box',
            'description'   => __( 'Add widgets here to appear in the '.$language.' adapt box.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' browse', 'ecampusontarioportal' ),
            'id'            => $language.'_browse-box',
            'description'   => __( 'Add widgets here to appear in the '.$language.' browse box.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' portal call out', 'ecampusontarioportal' ),
            'id'            => $language.'_portal-call-out',
            'description'   => __( 'Add widgets here to appear in '.$language.' portal call out.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' adopting a text', 'ecampusontarioportal' ),
            'id'            => $language.'_adopting-a-text',
            'description'   => __( 'Add widgets here to appear in '.$language.' adopting a text.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' peer review', 'ecampusontarioportal' ),
            'id'            => $language.'_peer-review',
            'description'   => __( 'Add widgets here to appear in '.$language.' peer review.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' footer eco_information', 'ecampusontarioportal' ),
            'id'            => $language.'_footer-eco_information',
            'description'   => __( 'Add widgets here to appear in '.$language.' footer ecampusontario contact information.', 'ecampusontarioportal' ),
            'before_widget' => '<span id="%1$s" class="widget %2$s">',
            'after_widget'  => '</span>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' footer copyright', 'ecampusontarioportal' ),
            'id'            => $language.'_footer-copyright',
            'description'   => __( 'Add widgets here to appear in '.$language.' footer copyright.', 'ecampusontarioportal' ),
            'before_widget' => '<span id="%1$s" class="widget %2$s">',
            'after_widget'  => '</span>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' footer services', 'ecampusontarioportal' ),
            'id'            => $language.'_footer-services',
            'description'   => __( 'Add widgets here to appear in '.$language.' footer services.', 'ecampusontarioportal' ),
            'before_widget' => '<span id="%1$s" class="widget %2$s">',
            'after_widget'  => '</span>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' front page title', 'ecampusontarioportal' ),
            'id'            => $language.'_front-page-title',
            'description'   => __( 'Add widgets here to appear in '.$language.' front page title.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="main_title">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' front page subtitle', 'ecampusontarioportal' ),
            'id'            => $language.'_front-page-subtitle',
            'description'   => __( 'Add widgets here to appear in '.$language.' front page subtitle.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="main_subtitle">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        ) );
        
        register_sidebar( array(
            'name'          => __( $language.' educator call to action 1', 'ecampusontarioportal' ),
            'id'            => $language.'_educator-cta1',
            'description'   => __( 'Add widgets here to appear in '.$language.' educator call to action 1.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.' educator call to action 2', 'ecampusontarioportal' ),
            'id'            => $language.'_educator-cta2',
            'description'   => __( 'Add widgets here to appear in '.$language.' educator call to action 2.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
        register_sidebar( array(
            'name'          => __( $language.'  educator call to action 3', 'ecampusontarioportal' ),
            'id'            => $language.'_educator-cta3',
            'description'   => __( 'Add widgets here to appear in '.$language.' educator call to action 3.', 'ecampusontarioportal' ),
            'before_widget' => '<div id="%1$s" class="widgetbox widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<hr><h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
    //non-language'd sidebars go here - catalogue / browser contents. See related plugin 
    register_sidebar( array(
        'name'          => __('catalogue browser', 'ecampusontarioportal' ),
        'id'            => 'browser',
        'description'   => __( 'Add widgets here to appear in the main catalogue browser.', 'ecampusontarioportal' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __('item review', 'ecampusontarioportal' ),
        'id'            => 'review',
        'description'   => __( 'Add widgets here to appear in the item review page.', 'ecampusontarioportal' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'ecampusontarioportal_widgets_init' );
add_image_size('testimonial-portrait', 400, 400, TRUE );

function enqueue_theme_css(){
    wp_enqueue_style(
        'default',
        get_template_directory_uri() . '/assets/css/style.css'
        );
    
}

add_action('wp_enqueue_scripts', 'enqueue_theme_css' );
add_theme_support( 'title-tag' );

function ecampusontarioportal_scripts() {
 // wp_enqueue_script('slick',get_template_directory_uri() .'/assets/js/vendor/slick/slick-min.js');
 wp_enqueue_script('bootstrap',get_template_directory_uri() .'/assets/js/bootstrap.min.js');
  wp_enqueue_script('basetheme',get_template_directory_uri() .'/assets/js/base/base_theme-min.js');
  wp_enqueue_script('localtheme',get_template_directory_uri() .'/assets/js/local/local_theme-min.js');
  //Muhammad Added this code to properly enqueue Jquery
  wp_enqueue_script('basetheme',get_template_directory_uri() .'/assets/js/vendor/jquery.js');
  wp_enqueue_script('localtheme',get_template_directory_uri() .'/assets/js/vendor/jquery.js');
  wp_enqueue_script('basetheme',get_template_directory_uri() .'/assets/js/vendor/jquery-ui.js');
  wp_enqueue_script('localtheme',get_template_directory_uri() .'/assets/js/vendor/jquery-ui.js');
  //End
}

add_action('wp_enqueue_scripts', 'ecampusontarioportal_scripts' );


function make_breadcrumbs(){
    $thisquery=''; //Moved by Steven 
	
	if(is_page()){
        $thispage=get_the_ID();
        $thisparent=wp_get_post_parent_id($thispage);
        $crumbs='';
        //$thisquery=''; //Not initialized in 'else' statement
        $parents=[];
        do {
            if(get_post_field('post_name',$thisparent)!=get_post_field('post_name', get_post())){
                $parents[]="<a href='".get_permalink($thisparent)."'>".get_post_field('post_name',$thisparent)."</a>";
            }
            $thisparent=wp_get_post_parent_id($thisparent);
        } while ($thisparent > 0);
        $parents=array_reverse($parents);
        if(get_post_field('post_name', get_post())=='review'){
            $thisquery='?'.$_SERVER['QUERY_STRING'];
        }
        $thisslug=' > '."<a href='".get_permalink().$thisquery."' id='crumb_".get_post_field('post_name', get_post())."'>".get_post_field('post_name', get_post())."</a>";
        if(!empty($parents)){
            $crumbs=' > '.implode(' &raquo; ',$parents);
        }

    }else{
        $object = get_post_type_object(get_post_type())->labels;
        $thisslug=' > '."<a href='".get_permalink().$thisquery."'>".get_the_title()."</a>";
        $crumbs=' > '."<a href='/".$object->name."'>".$object->name."</a>";
    }
    echo strtolower("<a href='/'>home</a>".$crumbs.$thisslug);
}

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   //Commented out by Muhammad to add Jquery
    //wp_deregister_script('jquery');

}
/**
 * Function Name: front_end_login_fail.
 * Description: This redirects the failed login to the custom login page instead of default login page with a modified url
**/
add_action( 'wp_login_failed', 'front_end_login_fail' );
function front_end_login_fail( $username ) {

// Getting URL of the login page
$referrer = $_SERVER['HTTP_REFERER'];    
// if there's a valid referrer, and it's not the default log-in screen
if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) {
    wp_redirect( "/login/?login=failed" ); 
    exit;
}

}

/**
 * Function Name: check_username_password.
 * Description: This redirects to the custom login page if user name or password is   empty with a modified url
**/
add_action( 'authenticate', 'check_username_password', 1, 3);
function check_username_password( $login, $username, $password ) {

// Getting URL of the login page
$referrer = $_SERVER['HTTP_REFERER'];

// if there's a valid referrer, and it's not the default log-in screen
if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) { 
    if( $username == "" || $password == "" ){
        wp_redirect( "/login/?login=empty" );
        exit;
    }
}

}
function logout_page() {
    wp_redirect(  "/login/?login=false" );
    exit;
  }
  add_action('wp_logout','logout_page');

  
  add_filter('frm_invalid_error_message', 'change_frm_form_error_message', 10, 2);
function change_frm_form_error_message( $invalid_msg, $args ) {
    
        $invalid_msg = 'Sorry, there was a problemem with your submission. Please check the form to see what you may have missed.';
    
    return $invalid_msg;
}