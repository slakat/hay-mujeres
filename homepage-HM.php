<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * Template Name: Homepage Hay Mujeres
 *
 *
 * @package flat-bootstrap
 */

get_header(); ?>
<!--Info Area -->

<!--Datatable Area -->
<div class="container">
	<div id="main-grid" class="main-padding row">
  <div class="col-xs-12 col-sm-12 col-md-9 no-padding-right">
    <?php get_template_part('news','area'); ?>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-3 white-bg">
    <h2 class="twitter">Últimos tweets</h2>
    <a class="twitter-timeline" data-lang="es" data-width="100%" data-height="385" data-dnt="true" data-theme="light" data-link-color="#8db823" href="https://twitter.com/Hay_Mujeres" data-chrome="noheader nofooter noborders noscrollbar"   data-aria-polite="assertive"></a>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

  </div>
		
	</div><!-- .row -->
  <div class="main-padding row">
    <div class="col-xs-12 col-sm-12 col-md-3">
      <div class="white-bg height-main-second">
      <h4 class="green-text bolder underline"><i class="fa fa-star" aria-hidden="true"></i> Experta Destacada</h4>
      <?php
      $user_id = get_field('experta');
      $user = get_userdata( $user_id );
      $key = "account_status";
      $single = true; 
      $user_last = get_user_meta( $user_id, $key, $single ); 
    if($user_last == 'approved'){
      ?>
      <h4 class="light-green-text text-center">
      <?php 
    echo '<a href="'.get_site_url().'/perfil-experta/'.$user_id.'/">' . $user->first_name . ' '. $user->last_name .'</a>';
    ?>
    </h4> 
    <div><i class="fa fa-globe" aria-hidden="true"></i><div class="text-justify left-info-expert"> <?php echo $user->pais; ?></div></div>
     <div><i class="fa fa-graduation-cap" aria-hidden="true"></i> <div class="text-left margin-top-05 left-info-expert"><?php echo $user->profesion . '. ' . $user->ultimo_grado_academico; ?></div></div>
     <div><i class="fa fa-bookmark" aria-hidden="true"></i><div class="text-justify margin-top-05 left-info-expert">
    <?php
    $i = 0;
    foreach ($user->campos_de_expertise as $campo){
    $term = get_term( $campo, 'hm_expertas_especialidad' );
    $term_link = get_term_link( $term->term_id,'hm_expertas_especialidad' );
    echo '<a href="'. esc_url( $term_link ) .'">' . $term->name . '</a> &middot; ';
    $i++;
    if ($i==3){
      echo '<br>';
      $i=0;     
      }
  } 
      
  }?>
  </div></div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3">
      <div class="white-bg height-main-second">
      <h4 class="green-text underline"><i class="fa fa-plus" aria-hidden="true"></i> Más Noticias</h4>
      <?php get_template_part('news','short'); ?>
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
      <iframe width="100%" height="320" src="<?php the_field('video') ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    
  </div>
    
</div><!-- .container -->

<br/><br/>

<!--Links Area-->
<?php get_template_part('link','area'); ?>

<!--News Area -->
<div class="container">
	<div id="main-grid" class="row">
		<div id="primary" class="content-area col-xs-12 col-sm-6 col-md-5 col-md-offset-1">
 <h2 class="twitter">Newsletter</h2>
     <h5 class="green-light-text"><a class="btn btn-primary " href="http://haymujeres.us3.list-manage.com/subscribe?u=dbdb36365c1469e44a92a341c&id=7c2b3f2150">Suscribirse a información mensual</a></h5>
		</div><!-- #primary -->
		
		<div id="" class="content-area col-xs-12 col-sm-6 col-md-6">
     <h2 class="twitter">Síguenos en redes sociales</h2>
     <div class=""><a href="https://www.facebook.com/HayMujeresCL/" target="_blank"><i class="fa fa-facebook-square fa-3x color-light-gray" aria-hidden="true"></i></a>
              <a href="https://twitter.com/Hay_Mujeres" target="_blank"><i class="fa fa-twitter-square fa-3x color-light-gray" aria-hidden="true"></i></a>
              <a href="https://www.youtube.com/channel/UCAX9s24yLwmStMidXvXJl2g" target="_blank"><i class="fa fa-youtube-square fa-3x color-light-gray" aria-hidden="true"></i></a></div>
        	
		</div><!-- #primary -->		
	</div><!-- .row -->
    
</div><!-- .container -->
<br>
<?php get_footer(); ?>
