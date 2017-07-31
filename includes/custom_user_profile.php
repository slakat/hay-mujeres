<?php

/*
*
*Custom user profile
*
*/

/* 1. Remove Default profile option */
function admin_del_options() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}

add_action('admin_head', 'admin_del_options');

function remove_website_row_wpse_94963_css()
{
    //echo '<style>tr.user-url-wrap{ display: none; }</style>';
    //echo '<style>tr.user-description-wrap{ display: none; }</style>';
    //echo '<style>tr.user-first-name-wrap{ display: none; }</style>';
    //echo '<style>tr.user-last-name-wrap{ display: none; }</style>';
}
add_action( 'admin_head-user-edit.php', 'remove_website_row_wpse_94963_css' );
add_action( 'admin_head-profile.php',   'remove_website_row_wpse_94963_css' );


/* 2. Add Custom fields */
add_action( 'show_user_profile', 'hm_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'hm_extra_user_profile_fields' );
function hm_extra_user_profile_fields( $user ) {
?>

<!--Profile HM Nombres, Apellidos, Fecha nacimiento, Nacionalidad, Pais de residencia -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <hr>
  <h1><?php _e("Información Perfíl haymujeres.cl", "blank"); ?></h1>
  <p><?php _e("Tus datos son relevantes, pues así podemos contactarte y los medios de comunicación pueden llegar a ti. Ya sea por mail o teléfono.", "blank"); ?></p>
  <hr>
  <table class="form-table">
    <!-- Nacionalidad -->  
    <tr>
      <th><label for="nacionalidad_hm"><?php _e("Nacionalidad"); ?></label></th>
      <td>
        <input type="text" name="nacionalidad" id="nacionalidad" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'nacionalidad', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Nacionalidad"); ?></span>
    </td>
    </tr>
    <!-- Residencia -->  
    <tr>
    <th><label for="residencia_hm"><?php _e("País de Residencia"); ?></label></th>
      <td>
        <input type="text" name="residencia" id="residencia" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'residencia', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("País de Residencia"); ?></span>
    </td>
    </tr>
    <!-- Fecha nacimiento -->  
    <tr>
    <th><label for="nacimiento_hm"><?php _e("Fecha de nacimiento"); ?></label></th>
      <td>
        <input type="text" name="nacimiento" id="nacimiento" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'nacimiento', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Fecha de nacimiento"); ?></span>
    </td>
    <!-- Script generador fecha -->    
    <script>
$(function () {
$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };    
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#nacimiento").datepicker({
dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0',
});
});
    </script>
    </tr>
</table>

<!--Profile HM Direccion, Telefono -->
<table class="form-table">
    <hr>
    <!-- Fono -->
    <tr>
    <th><label for="telefono_hm"><?php _e("Teléfono"); ?></label></th>
      <td>
        <input type="text" name="telefono" id="telefono" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'telefono', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Teléfono"); ?></span>
    </td>
    </tr>
    <!-- Región -->
    <tr>
    <th><label for="region_hm"><?php _e("Región"); ?></label></th>
      <td>
        <?php $selected = get_the_author_meta( 'region', $user->ID ); ?>
        <select name="region" id="region">
            <option value="value1" <?php echo ($selected == "value1")?  'selected="selected"' : '' ?>>Value One label</option>
            <option value="value2" <?php echo ($selected == "value2")?  'selected="selected"' : '' ?>>Value Two label</option>
        </select>
          <br />
        <span class="description"><?php _e("Si estás residiendo en Chile, especifica tu Región"); ?></span>
    </td>
    </tr>  
</table>
<hr>
<!--Profile HM Social -->
<table class="form-table">
  <h3><?php _e("Redes Sociales", "blank"); ?></h3>
  <p><?php _e("Queremos conocer tus redes sociales, para que puedas contactarte con otras mujeres expertas y así formar una comunidad.", "blank"); ?></p>
    <!-- Linked In -->
    <tr>
    <th><label for="linkedin_hm"><?php _e("Linked In"); ?></label></th>
      <td>
        <input type="text" name="linkedin" id="linkedin" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Linked In"); ?></span>
    </td>
    </tr>
    <!-- Facebook -->
    <tr>
    <th><label for="facebook_hm"><?php _e("Facebook"); ?></label></th>
      <td>
        <input type="text" name="facebook" id="facebook" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Facebook"); ?></span>
    </td>
    </tr>
    <!-- Twitter -->
    <tr>
    <th><label for="twitter_hm"><?php _e("Twitter"); ?></label></th>
      <td>
        <input type="text" name="twitter" id="twitter" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Twitter"); ?></span>
    </td>
    </tr>
    <!-- Otra -->
    <tr>
    <th><label for="otrars_hm"><?php _e("Otra"); ?></label></th>
      <td>
        <input type="text" name="otrars" id="otrars" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'otrars', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Otra"); ?></span>
    </td>
    </tr>
</table>
<!--Profile HM Profesional -->
<hr>
<table class="form-table">
  <h3><?php _e("Datos Profesionales", "blank"); ?></h3>
  <p><?php _e("Para poder establecer un perfil y que podamos contactarte, es necesario que nos indiques algunos datos.", "blank"); ?></p>
    <!-- Profesion -->
    <tr>
    <th><label for="profesion_hm"><?php _e("Profesión"); ?></label></th>
      <td>
        <input type="text" name="profesion" id="profesion" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'profesion', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Profesión"); ?></span>
    </td>
    </tr>
    <tr>
    <th><label for="trabajo_hm"><?php _e("Trabajo actual"); ?></label></th>
      <td>
        <input type="text" name="trabajo" id="trabajo" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'trabajo', $user->ID ) ); ?>" /><br />
        <span class="description"><?php _e("Trabajo actual"); ?></span>
    </td>
    </tr>
</table>

<!-- CV -->

<table class="form-table">
        <tr>
            <th>
                <label for="cv_hm">CV</label>
            </th>

            <td>

                <input type="text" name="cv" id="cv" value="<?php echo esc_attr( get_the_author_meta( 'cv', $user->ID ) ); ?>" class="regular-text" />
                <input type='button' class="button-primary" value="Cargar CV" id="uploadcv"/><br />

                <span class="description">Sube tu cv</span>
            </td>
        </tr>


    </table>

    <script type="text/javascript">
        (function( $ ) {
            $( '#uploadcv' ).on( 'click', function() {
                tb_show('test', 'media-upload.php?type=image&TB_iframe=1');

                window.send_to_editor = function( html ) 
                {
                    pdfurl = $(html).attr( 'href' );
                    $( '#cv' ).val(pdfurl);
                    tb_remove();
                }

                return false;
            });

        })(jQuery);
    </script>  


<?php
} 

/*end hm_extra_user_profile_fields*/

/*Save values*/
add_action( 'personal_options_update', 'hm_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'hm_save_extra_user_profile_fields' );
function hm_save_extra_user_profile_fields( $user_id ) {
  $saved = false;
  if ( current_user_can( 'edit_user', $user_id ) ) {
    update_user_meta( $user_id, 'nombres', $_POST['nombres'] );
    update_user_meta( $user_id, 'apellidos', $_POST['apellidos'] );
    update_user_meta( $user_id, 'nacionalidad', $_POST['nacionalidad'] );
    update_user_meta( $user_id, 'residencia', $_POST['residencia'] );
    update_user_meta( $user_id, 'nacimiento', $_POST['nacimiento'] );
    update_user_meta( $user_id, 'direccion', $_POST['direccion'] );
    update_user_meta( $user_id, 'telefono', $_POST['telefono'] );  
    update_user_meta( $user_id, 'region', $_POST['region'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'otrars', $_POST['otrars'] ); 
    update_user_meta( $user_id, 'profesion', $_POST['profesion'] ); 
    update_user_meta( $user_id, 'trabajo', $_POST['trabajo'] );  
    update_user_meta( $user_id, 'image', $_POST[ 'image' ] );
    update_user_meta( $user_id, 'cv', $_POST[ 'cv' ] );
    $saved = true;
  }
  return true;
}


add_action( 'admin_enqueue_scripts', 'enqueue_admin' );

function enqueue_admin()
{
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
}