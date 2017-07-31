<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * Category Templates
 *
 *
 * @package flat-bootstrap
 */

get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

            <?php $term_page = $wp_query->queried_object; ?>
            <h1>Expertas en la categoría: <?php echo $term_page->name; ?></h1>
            <?php 
            $term_query= $term_page->name;    
            $term_name = get_term_by('name', $term_query, 'hm_expertas_especialidad');
            $term_id = $term_name->term_id;
            ?>
<table class="table">
    <thead> 
        <tr>  
            <th style="width:20%">Nombre</th> 
            <th style="width:20%">Apellido</th> 
            <th style="width:60%">Especialidad/Subespecialidad</th> 
        </tr> 
    </thead>
    <tbody>

<!-- -->
<?php            
// The Query
$user_query = new WP_User_Query( array( 'role' => 'experta' ) );
// User Loop
if ( ! empty( $user_query->results ) ) { ?>
<?php
	foreach ( $user_query->results as $user ) {
        $user_id = $user->ID;
	$key='account_status';
	$single= true;
	$user_last = get_user_meta( $user_id, $key, $single ); 
		if($user_last == 'approved'){
            if (in_array($term_id,$user->campos_de_expertise)){
                    echo '<tr>';
                    echo '<td><a href="'. get_home_url() .'/perfil-experta/'.$user_id.'"><span class="glyphicon glyphicon-search"></span></a> ' . $user->first_name . '</td>';
                    echo '<td>'. $user->last_name . '</td><td>';
               foreach ($user->campos_de_expertise as $campo){
                $term = get_term( $campo, 'hm_expertas_especialidad' );
                $term_link = get_term_link( $term->term_id,'hm_expertas_especialidad' );
                echo '<a href="'. esc_url( $term_link ) .'">' . $term->name . '</a> &middot; ';      
	           }//foreach campo
                echo '</td></tr>';
            }//if in_array
        } //if approved
    }//foreach user
         ?>
	
<?php }//if

?>
    </tbody>
</table>            
<!-- -->           
            
		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
