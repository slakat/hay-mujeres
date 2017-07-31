<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package flat-bootstrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href= /favicon.ico />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66101046-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
<div id="page" class="hfeed site">

	<?php do_action( 'before' ); ?>
	
	<header id="masthead" class="site-header" role="banner">
		<?php
		/**
		  * CUSTOM HEADER IMAGE DISPLAYS HERE FOR THIS THEME, BUT CHILD THEMES MAY DISPLAY
		  * IT BELOW THE NAV BAR (VIA CONTENT-HEADER.PHP)
		  */
		global $xsbf_theme_options;
		$custom_header_location = isset ( $xsbf_theme_options['custom_header_location'] ) ? $xsbf_theme_options['custom_header_location'] : 'content-header';
		if ( $custom_header_location == 'header' ) :
		?>
			<div id="site-branding" class="site-branding custom-header-image" style="background-image: url('<?php echo header_image() ?>');">
           <div class="header-info row">
            <?php get_template_part('users','access'); ?>      
            <div class="social-buttons">
            	<a href="https://www.facebook.com/HayMujeresCL/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            	<a href="https://twitter.com/Hay_Mujeres" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            	<a href="https://www.youtube.com/channel/UCAX9s24yLwmStMidXvXJl2g" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
            </div>

			<?php
			// Get custom header image and determine its size
			if ( get_header_image() ) {
			?>
				
                <!-- logo -->
                <?php if ( get_theme_mod( 'theme_logo' ) ) : ?>
                    <div class='container col-xs-12 col-sm-12 col-md-3'>
                        <a href="<?php echo get_home_url(); ?>">
                        <img class="top-logo" src='<?php echo esc_url( get_theme_mod( 'theme_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                        </a>
                           
                    </div>   
                <?php endif; ?>
                <!-- /logo -->
                
			<?php

			// If no custom header, then just display the site title and tagline
			} else {
			?>
				<div class="container col-xs-12 col-sm-12 col-md-3">
                <?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
                <div class="site-branding-text">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' )?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>  
				</div>
			<?php
			} //endif get_header_image()
			?>

			            		<div class="info-area col-xs-12 col-sm-12 col-md-9">
					<p><?php the_field('vision','option') ?></p>
				</div>	
			</div><!-- .site-branding -->

		<?php			
		endif; // $custom_header_location
		?>	
		</div>	

		<?php
		/**
		  * ALWAYS DISPLAY THE NAV BAR
		  */
 		?>	
 	<?php get_template_part('principal','navbar'); ?>
	</header><!-- #masthead -->

	<?php // Set up the content area (but don't put it in a container) ?>	
	<div id="content" class="site-content">
