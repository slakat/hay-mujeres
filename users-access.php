<div class="login-block">
<?php
if ( is_user_logged_in() ) {
    $current_user_base = wp_get_current_user();
    $user_info_base = get_userdata($current_user_base->ID);
    $user_role_base = implode(', ', $user_info_base->roles);

    echo 'Hola ' . $current_user_base->user_login . '!<br>';
    echo '<a href="'. wp_logout_url(home_url()) .'"><button type="button" class="btn btn-primary btn-xs">
    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>  Salir</button></a>';

	 if($user_role_base == 'medio'){
    		echo '<a href="http://haymujeres.cl/account"><button type="button" class="btn btn-danger btn-xs">
    		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Cambiar contraseña</button></a>';
	}else{}
	
} else {
    echo '<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Ingreso:  
    <a href="'.get_site_url().'/ingreso-medios/"><button type="button" class="btn btn-primary btn-xs">Medios/Organizaciones</button></a> ';
}
?>
</div>