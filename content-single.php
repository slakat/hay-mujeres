<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * The template used for displaying a single article (blog post) with sidebar
 *
 * @package flat-bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_single () ) : ?>
			<?php get_template_part( 'content', 'post-header' ); ?>
		<?php endif; ?>
		
		<div class="entry-content">
			<div class="row">
				<div class="col-md-12">	
					<?php the_content(); ?>
					<?php get_template_part( 'content', 'post-footer' ); ?>
				</div>
			<?php // Show the categories and tags ?>

			</div> <!--Principal row -->
		</div><!-- .entry-content -->

		<?php get_template_part( 'content', 'post-nav' ); ?>

	</article><!-- #post-## -->