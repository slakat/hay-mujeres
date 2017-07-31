<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * The Template for displaying all single posts.
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
	<?php
 	if( get_post_thumbnail_id( get_the_ID()) ):
	?>
	<div class="featured-news-img img-thumbnail" style="background-image:url('<?php echo $image[0]; ?>')"></div>
	<?php
	endif;
	?>
			
<div class="container">
	<div id="primary" class="content-area col-12-xs col-12-sm col-md-12">
		<main id="main" class="site-main white-bg" role="main">

	
			<h2  class="single-page-title text-center"><?php the_title() ?></h2>
			<?php get_template_part( 'content', 'single' ); ?>

			

		

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .container -->
<?php endwhile; // end of the loop. ?>

<?php
 if( have_rows('temas_relacionados') ):
?>
	<div class="content-area col-12-xs col-12-sm col-md-12">
	<div class="white-bg">
		<h2 class="twitter">Temas relacionados</h2>
		<?php 

			$rows = get_field('temas_relacionados');
			if($rows)
			{

				foreach($rows as $row)
				{
					echo '<div class="sub-news"><a class="more-news color-dark-gray" href="'. $row['url'] .'" rel="bookmark" title="Permanent Link to "><span class="glyphicon glyphicon-share-alt green-light-text"></span>'. $row['name'] .'</a><p class="color-light-gray">'. $row['description'] .'</p></div>';
				}

			}
		?>
		
	</div>
	</div>
<?php
endif;
?>


<?php get_footer(); ?>