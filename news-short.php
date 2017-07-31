<?php 
$args = array(
    'cat' => -189,
    'posts_per_page' => 4
 );
$query = new WP_Query( $args ); ?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

<!-- Display the Title as a link to the Post's permalink. -->
 <div class="sub-news"><a class="more-news color-dark-gray" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><span class="glyphicon glyphicon-share-alt green-light-text"></span>  <?php the_title(); ?></a></div>

 <?php endwhile; 
 wp_reset_postdata(); ?>
 <div class="sub-news"><a class="btn btn-primary btn-xs margin-logo" href="<?php echo get_site_url();?>/archivo-hay-mujeres/">Ver Todas las Noticias</a></div>
 <?php else : ?>
 <p><?php _e( 'Aquí no hay nada.' ); ?></p>
 <?php endif; ?>
