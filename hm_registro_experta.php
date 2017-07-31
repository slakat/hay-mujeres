<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * Template Name: Registro Expertas
 *
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area col-12-xs col-12-sm col-md-12 white-bg">

		    <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <strong> Ingresa tus datos para registrarte en la plataforma Hay Mujeres.<br> 
Una vez que completes el formulario revisa tu e-mail, en especial tu bandeja de correo no deseado (spam) en caso de que no recibas el correo de confirmación. </strong>
</div>
        
        
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<h2  class="single-page-title text-center"><?php the_title() ?></h2>

			<?php the_content(); ?>


		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .container -->

<?php get_footer(); ?>