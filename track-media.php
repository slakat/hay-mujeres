<?php
if ( is_user_logged_in() ){
    $current_user = wp_get_current_user();
    $user_info = get_userdata($current_user->ID);
    $user_role = implode(', ', $user_info->roles);
    
    if($user_role == 'medio'){
    $user_name = $user_info->user_login;
    $user_medio = $user_info ->nombre_del_medio;
    $current_time = current_time( 'mysql' );
    $url = home_url() . $_SERVER['REQUEST_URI'];

    $path = $_SERVER["REQUEST_URI"];
    $current_url = explode("/", $path);
    $current_view_user = $current_url[2];
    $user_id_current_view = get_user_by( 'id', $current_view_user );
    //echo 'Estoy viendo el perfil de: ' . $user_id_current_view->first_name . ' ' . $user_id_current_view->last_name;
    $user_name_current_view = '<a href="'. $url .'">' . $user_id_current_view->first_name . ' ' . $user_id_current_view->last_name . '</a>';


    $wpdb->insert( 
	'wp_track_media', 
	array( 
		'nombre_usuario' => $user_name,
        'nombre_del_medio' => $user_medio,
		'fecha_hora' => $current_time,
        'url' => $user_name_current_view
	), 
	array( 
		'%s', 
		'%s',
        '%s', 
		'%s'
	) 
);

        }
    
}
?>