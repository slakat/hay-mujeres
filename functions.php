<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 *
 * @package flat-bootstrap-child
 */
 
$xsbf_theme_options = array(
	//'background_color' 		=> 'f2f2f2',
	//'content_width' 			=> 1170,
	//'embed_video_width' 		=> 1170,
	//'embed_video_height' 		=> null, // i.e. calculate it automatically
	//'post_formats' 			=> null,
	//'touch_support' 			=> true,
	//'fontawesome' 			=> true,
	//'bootstrap_gradients' 	=> false,
	//'navbar_classes'			=> 'navbar-default navbar-static-top',
	//'custom_header_location' 	=> 'header',
	//'image_keyboard_nav' 		=> true,
	//'sample_widgets' 			=> true, // for possible future use
	//'sample_footer_menu'		=> true,
	//'testimonials'			=> true
);


function my_acf_input_admin_footer() {
	
?>
<script type="text/javascript">
(function($) {
	
	jQuery('select').select2();
	
})(jQuery);	
</script>
<?php
		
}

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
'page_title' => 'Header Options',
'menu_title' => 'Header Custom',
'menu_slug' => 'header-options-custom',
'capability' => 'edit_posts',
'redirect' => false
));


	
}

function acf_load_experts_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();


    
        
     // The Query
	$user_query = new WP_User_Query( array( 'role' => 'experta','orderby' => 'id','order' => 'ASC', ) );

	// User Loop
	if ( ! empty( $user_query->results ) ) { 
		foreach ( $user_query->results as $user ) {
	        $user_id = $user->ID;
			$key='account_status';
			$single= true;
			$user_last = get_user_meta( $user_id, $key, $single ); 
			if($user_last == 'approved'){
	            
	            // vars
	            $value = $user_id;
	            $label = $user_id . ' - ' . $user->first_name .' '. $user->last_name .' - '. $user->user_email;

	            
	            // append to choices
	            $field['choices'][ $value ] = $label;
	            
	        }
	    }
	}


    // return the field
    return $field;
    
}

add_filter('acf/load_field/name=experta', 'acf_load_experts_field_choices');

//Credits Filter
add_filter('xsbf_credits', 'xsbf_child_credits'); 
function xsbf_child_credits ( $site_credits ) {
		
	$theme = wp_get_theme();
	$site_credits = sprintf( __( '&copy; %1$s %2$s', 'xtremelysocial' ), 
		date ( 'Y' ),
		'<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a>'
	);
	return $site_credits;
}
//Custom Logo
function logo_theme_customizer( $wp_customize ) {
$wp_customize->add_section( 'theme_logo_section' , array(
'title' => __( 'Logo', 'HM' ),
'priority' => 30,
'description' => 'Sube tu imagen, reemplaza el logo',
) );
$wp_customize->add_setting( 'theme_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_logo', array(
'label' => __( 'Logo', 'HM' ),
'section' => 'theme_logo_section',
'settings' => 'theme_logo',
) ) );
}
add_action('customize_register', 'logo_theme_customizer');

// Unhook default functions
function unhook_theme_functions() {
remove_action( 'tgmpa_register', 'xsbf_bootstrap_register_required_plugins' );
remove_editor_styles( 'css/editor-style.css' );
remove_filter( 'get_the_excerpt', 'xsbf_get_the_excerpt' );    
}
add_action('init','unhook_theme_functions');

// Modify Excerpt 
add_filter( 'get_the_excerpt', 'HM_modify_excerpt' );
function HM_modify_excerpt( $excerpt ) {

	if ( ! is_attachment() ) {
		if ( $excerpt ) {
			$excerpt .= '&hellip; ';
		}
		$excerpt .= '<br><a class="keep-reading" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Seguir leyendo', 'flat-bootstrap' ) . '</a>';
	}
	return $excerpt;
}

//Remove menu items
function custom_menu_page_removing() {
    remove_menu_page('edit.php?post_type=jetpack-testimonial');
    remove_menu_page('shortcodes-ultimate');
    remove_menu_page('wpcf7');
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

//Remove sub-menu items
function remove_submenu_pages() {
	remove_submenu_page( 'edit.php?post_type=hm_expertas', 'post-new.php?post_type=hm_expertas' );
	remove_submenu_page( 'edit.php?post_type=hm_expertas', 'edit.php?post_type=hm_expertas' );
	remove_submenu_page( 'ultimatemember', 'um_options' );
}
add_action( 'admin_menu', 'remove_submenu_pages', 999 );


//Widget Sidebar
function remove_some_widgets(){

    // Unregister some sidebars
    unregister_sidebar( 'sidebar-1' );
    unregister_sidebar( 'sidebar-2' );
    unregister_sidebar( 'sidebar-3' );
    //unregister_sidebar( 'sidebar-4' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

//Call extra functions
require_once('includes/user_caps.php');
require_once('includes/taxonomies.php');
require_once('includes/metabox.php');
//require_once('includes/custom_user_profile.php');
//require_once('includes/registry_actions.php');
// hide update notifications
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes