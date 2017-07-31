<!-- nav -->
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<h1 class="menu-toggle sr-only screen-reader-text"><?php _e( 'Primary Menu', 'flat-bootstrap' ); ?></h1>
			<div class="skip-link"><a class="screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content', 'flat-bootstrap' ); ?></a></div>

		<?php
		// Collapsed navbar menu toggle
		global $xsbf_theme_options;
		$navbar = '<div class="navbar ' . $xsbf_theme_options['navbar_classes'] . '">'
			.'<div class="container">'
        	.'<div class="navbar-header">'
          	.'<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
          	.'</button>';


		
        $navbar .= '</div><!-- navbar-header -->';

		// Display the desktop navbar
		$navbar .= wp_nav_menu( 
			array(  'theme_location' => 'primary',
			'container_class' => 'navbar-collapse collapse', //<nav> or <div> class
			'menu_class' => 'nav navbar-nav', //<ul> class
			'walker' => new wp_bootstrap_navwalker(),
			'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
			'echo'	=> false
			) 
		);
		echo apply_filters( 'xsbf_navbar', $navbar );
		?>

		</div><!-- .container -->
		</div><!-- .navbar -->
		</nav><!-- #site-navigation -->
                                        
<!-- end-nav -->    