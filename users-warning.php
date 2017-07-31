<?php
if ( is_user_logged_in() ) {
    
} else {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <strong> Para ver este perfil completo y contactar a esta experta debes iniciar sesión como <a href="http://haymujeres.cl/ingreso-medios/">Medios/Organizaciones</a></strong>
</div>

<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Estimada Experta. No es posible editar los datos de forma manual, por favor envía las correcciones a <strong>comiteadmision@haymujeres.cl</strong> y te ayudaremos a la brevedad.
</div>
<?php
}
?>
    