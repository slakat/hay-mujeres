<?php

//CPT & Taxonomies
add_action( 'init', 'create_post_type' );
add_action( 'init', 'create_taxonomies' );
function create_post_type() {
  $labels = array(
    'name'               => 'Expertas',
    'singular_name'      => 'Experta',
    'menu_name'          => 'Expertas',
    'name_admin_bar'     => 'Experta',
    'add_new'            => 'Nueva experta',
    'add_new_item'       => 'Nueva experta',
    'new_item'           => 'Nueva experta',
    'edit_item'          => 'Editar experta',
    'view_item'          => 'Ver experta',
    'all_items'          => 'Todas las expertas',
    'search_items'       => 'Buscar Experta',
    'parent_item_colon'  => 'Jerarquía',
    'not_found'          => 'No se han encontrado expertas',
    'not_found_in_trash' => 'No se han encontrado expertas eliminadas'
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_nav_menus'   => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-id',
    'capability_type'     => 'post',
    'hierarchical'        => true,
    'supports'            => array( 'title', 'thumbnail',  ),
    'has_archive'         => true,
    'rewrite'             => array( 'slug' => 'experta' ),
    'query_var'           => true
  );

  register_post_type( 'hm_expertas', $args );
}

function create_taxonomies() {

  // Add a taxonomy like categories
  $labels = array(
    'name'              => 'Especialidades',
    'singular_name'     => 'Especialidad',
    'menu_name'         => 'Especialidades',
    'all_items'         => 'Todas las especialidades',
    'edit_item'         => 'Editar especialidad',
    'view_item'         => 'Ver especialidad',
    'update_item'       => 'Actualizar especialidad',
    'add_new_item'      => 'Añadir nueva especialidad',
    'new_item_name'     => 'Nombre de la nueva especialidad',
    'parent_item'       => 'Especialidad general',
    'parent_item_colon' => 'Especialidad general:',
    'search_items'      => 'Buscar especialidad',
    'popular_items'     => 'Especialidades populares',
    'separate_items_with_commas' => 'Especialidades separadas por comas',
    'add_or_remove_items' => 'Añadir o eliminar especialidades',
    'choose_from_most_used' => 'Elegir entre las más usadas',
    'not_found'         =>  'No se han encontrado especialidades',
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'especialidad' ),
  );

  register_taxonomy('hm_expertas_especialidad',array('hm_expertas'),$args);
}