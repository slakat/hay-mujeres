<?php

//Add Metabox: save profile state hm_expertas 
//State Metabox
function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="meta-box-text">Selecciona el estado de esta ficha</label>
            
            <br>

            <label for="meta-box-dropdown">Estado</label>
            <select name="meta-box-dropdown">
                <?php 
                    $option_values = array('Publicada', 'Revisión', 'Rechazada');

                    foreach($option_values as $key => $value) 
                    {
                        if($value == get_post_meta($object->ID, "meta-box-dropdown", true))
                        {
                            ?>
                                <option selected><?php echo $value; ?></option>
                            <?php    
                        }
                        else
                        {
                            ?>
                                <option><?php echo $value; ?></option>
                            <?php
                        }
                    }
                ?>
            </select>

        </div>
    <?php  
}

function add_custom_meta_box()
{
    add_meta_box("estado-experta", "Estado de la ficha", "custom_meta_box_markup", "hm_expertas", "side", "high", null);
}

add_action("add_meta_boxes", "add_custom_meta_box");

function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "hm_expertas";
    if($slug != $post->post_type)
        return $post_id;
    
    $meta_box_dropdown_value = "";
    
    if(isset($_POST["meta-box-dropdown"]))
    {
        $meta_box_dropdown_value = $_POST["meta-box-dropdown"];
    }   
    update_post_meta($post_id, "meta-box-dropdown", $meta_box_dropdown_value);

    
}

add_action("save_post", "save_custom_meta_box", 10, 3);

//Add custom column

// ONLY MOVIE CUSTOM TYPE POSTS
add_filter('manage_hm_expertas_posts_columns', 'head_estado', 10);
add_action('manage_hm_expertas_posts_custom_column', 'content_estado', 10, 2);
 
// CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
function head_estado($defaults) {
    $defaults['estado_name'] = 'Estado';
    return $defaults;
}

function content_estado($column_name, $post_ID) {
    if ($column_name == 'estado_name') {
        $experta_state = get_post_meta( $post_ID, 'meta-box-dropdown', true );
        echo $experta_state;
    }
}
