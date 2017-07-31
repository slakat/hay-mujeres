<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * Template Name: Directorio Hay Mujeres
 *
 *
 * @package flat-bootstrap
 */
get_header(); ?>

<div class="container main-padding">
<div id="primary" class="content-area col-12-xs col-12-sm col-md-12">
<div class="white-bg">
	<h2 class="single-page-title ">Directorio de Expertas</h2>
	<?php get_template_part('users','part'); ?>  
	</div>
</div><!-- #primary -->

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

</div>
<?php get_footer(); ?>
