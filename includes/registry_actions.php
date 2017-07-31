<?php

//Create post on registry
function create_new_user_posts($user_id){
        if (!$user_id>0)
                return;
        $user = get_user_by( 'id', $user_id );
        $usr_name = $user->first_name;
        // Create post object
        $my_bio_post = array(
        'post_author' => 1,
        'post_title' => $usr_name,
        'post_name' => $user_id . '-experta',
        'post_status' => 'draft',
        'post_type' => 'hm_expertas',
        'meta_input' => array('meta-box-dropdown' => 'Revisión'),
        );

        // Insert the post into the database
        $bio = wp_insert_post( $my_bio_post );

        //and if you want to store the post ids in 
        //the user meta then simply use update_user_meta
        //update_user_meta($user_id,'_bio_post',$bio);
}
add_action('user_register', 'create_new_user_posts');