<?php
/**
 * Theme: Hay Mujeres - Flat Bootstrap Child
 * 
 * Template Name: custompostype
 *
 *
 * @package flat-bootstrap
 */

get_header();  ?>

<?php
$tax='hm_expertas_especialidad';

// get the terms of taxonomy
$terms = get_terms( $tax, [
  'hide_empty' => false, // do not hide empty terms
  'depth' => 0,
]);

// loop through all terms
foreach( $terms as $term ) {

  // if no entries attached to the term
  if( 0 == $term->count )
    // display only the term name
    echo '<h4>' . $term->name . '</h4>';

  // if term has more than 0 entries
  elseif( $term->count > 0 )
    // display link to the term archive
    echo '<h4><a href="'. get_term_link( $term ) .'">'. $term->name .'</a></h4>';

}

?>
<?php get_footer(); ?>