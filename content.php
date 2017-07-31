<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The default template used for displaying page and article content. Note that certain
 * pages, index, articles may use a different template.
 *
 * @package flat-bootstrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
	<?php // Display the featured image on blog / archives ?>
	<?php if ( !is_single() ) : ?>
		<?php if ( has_post_thumbnail() AND !is_search() ) : ?>

		<div class="col-md-4">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
 			<div class="featured-news-img img-thumbnail" style="background-image:url('<?php echo $image[0]; ?>')"></div>
		</div>
		<?php else : ?>
		<div class="col-md-4"></div>
		<?php endif; ?>

	<?php // Show excerpt for all but single posts (and pages) ?>
	<div class="col-md-8 entry-summary">
		<?php get_template_part( 'content', 'post-header' ); ?>
		<?php the_excerpt(); ?>
		<hr>
	</div><!-- .entry-summary -->
</div>
	<?php // For single posts and pages, display the full content ?>
	<?php else : ?>
	<div class="row">
		<div class="col-md-12 entry-content">
		
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'flat-bootstrap' ) ); ?>

			<?php // For posts, show the categories and tags ?>
			<?php if ( 'post' == get_post_type() ) : ?>
			<?php get_template_part( 'content', 'post-footer' ); ?>
			<?php endif; ?>

			<?php // If multiple pages, display next/previous page links ?>
			<?php get_template_part( 'content', 'page-nav' ); ?>

		</div><!-- .entry-content -->
	</div>
		<?php //get_template_part( 'content', 'post-nav' ); ?>

	<?php endif; ?>
	
</article><!-- #post-## -->
