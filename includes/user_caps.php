<?php
//Add user roles
add_action( 'after_switch_theme', 'wpse_create_user_roles' );

function wpse_create_user_roles() {

    $add_experta = add_role( 'experta',__( 'Experta'),
            array(
                'read' => true
            ));
    
        $add_medio = add_role( 'medio',__( 'Medio'),
            array(
                'read' => true
            ));

}

