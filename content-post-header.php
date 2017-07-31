<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The template used for displaying single post header meta (posted on, by, etc.)
 *
 * @package flat-bootstrap
 */
?>

<header class="entry-header text-center">
	<div class="entry-meta">
	
		<?php if ( !is_single() AND !is_page() ) : ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php if ( ! in_array( get_post_type(), array ( 'jetpack-testimonial', 'jetpack-portfolio' ) ) ) : ?>

			<?php $the_date = get_the_date(); ?>
			<p><span class="posted-on"><span class="glyphicon glyphicon-calendar"></span>&nbsp;
			<?php echo $the_date; ?> 
			</span>
            <?php if ( ! function_exists( 'xsbf_categorized_blog' ) OR xsbf_categorized_blog() ) : ?>
			<?php $categories = get_the_category_list( ', ' ); ?> 
			<?php if ( $categories ) : ?>
				<span class="cat-links"><span class="glyphicon glyphicon-tag"></span>&nbsp;
				<?php echo $categories; ?>
				</span>
			<?php endif; ?>
		<?php endif; ?>    
	
			<?php if ( is_multi_author() ) : ?>
	 			&nbsp;|&nbsp;<span class="by-line">
	 			<span class="glyphicon glyphicon-user"></span>&nbsp;
	 			<span class="author vcard">
					<?php the_author_posts_link(); ?> 
				</span>
				</span>
			<?php endif; ?>

		<?php endif; ?>

		
	</div><!-- .entry-meta -->
</header><!-- .entry-header -->
