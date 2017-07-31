<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">

		<?php 
		$args = array(
		    'cat' => 189, 
		    'posts_per_page' => 3
		 );
		$active = "active";
		$query = new WP_Query( $args ); ?>
		 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		     <?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		  <div class="item <?php echo $active ?>">
			  <img src="<?php echo $image[0]; ?>" alt="...">
			  <div class="carousel-caption">
			     <h2><a target="_blank" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			     <div class="entry">
				  	<?php the_excerpt(); ?>
				  </div>
			  </div>
			</div>
 			<?php endif; $active = "";?>
		 <?php endwhile; 
		 wp_reset_postdata();
		 else : ?>
		 <p><?php _e( 'Aquí no hay nada.' ); ?></p>
		 <?php endif; ?>


    </div>

  <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>




