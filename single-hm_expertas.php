<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * The Template for displaying all single posts.
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

<div class="container">

<div class="entry-content">
		<div class="row">
			
			<div class="col-md-3">
 				<div class="featured-news-img img-thumbnail" style="background-image:url('http://mujeres.exponente.cl/wp-content/uploads/2016/01/profile.png');height: 187px;"></div>	
				<button type="button" class="btn btn-primary btn-s" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
			</div>
			

			

			<div class="col-md-9">	
				
			</div>
		<?php // Show the categories and tags ?>

		</div> <!--Principal row -->
	</div><!-- .entry-content -->

</div><!-- .container -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Experta</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>