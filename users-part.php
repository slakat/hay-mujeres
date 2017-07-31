<script type="text/javascript" language="javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/responsive.bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/responsive.bootstrap.min.css"/>
<style>
table.dataTable.nowrap th, table.dataTable.nowrap td {
white-space: normal;
}
</style>
    <script type="text/javascript">
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr#filterrow td').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" onclick="stopPropagation(event);" placeholder="Search '+title+'" />' );
    } );
 
 
    // DataTable
    var table = $('#example').DataTable({
        "bSortCellsTop": true,
		"order": [[ 1, "asc" ]],
                "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ expertas",
        "sZeroRecords":    "No se encontraron expertas",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Expertas del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Expertas del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
        }
    });
    // Apply the search
    // Apply the filter
    $("#example thead input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );

  function stopPropagation(evt) {
        if (evt.stopPropagation !== undefined) {
            evt.stopPropagation();
        } else {
            evt.cancelBubble = true;
        }
    }
} );

    </script>

    <!-- table -->

<div class="row">
    <div class="table-responsive"> 
    <table id="example" class="table table-hover dt-responsive display nowrap" cellspacing="0">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especialidad</th>

            </tr>
            <tr id="filterrow">                        <td>Nombre</td>
                <td>Apellido</td>
                <td>Especialidad</td></tr>
        </thead>
        <tbody>        
<!-- Table content -->
<?php

// The Query
$user_query = new WP_User_Query( array( 'role' => 'experta' ) );

// User Loop
if ( ! empty( $user_query->results ) ) { ?>
<tr>
<?php
	foreach ( $user_query->results as $user ) {
        $user_id = $user->ID;
	$key='account_status';
	$single= true;
	$user_last = get_user_meta( $user_id, $key, $single ); 
		if($user_last == 'approved'){
		echo '<td><a href="'.get_site_url().'/perfil-experta/'.$user_id.'/"><span class="glyphicon glyphicon-search"></span></a> ' . $user->first_name . '</td>';
		echo '<td>' . $user->last_name . '</td>'; 
        ?>
        <td>
	<?php $i = 0;
		foreach ($user->campos_de_expertise as $campo){
		$term = get_term( $campo, 'hm_expertas_especialidad' );
		$term_link = get_term_link( $term->term_id,'hm_expertas_especialidad' );
		echo '<a class="green-light-text" href="'. esc_url( $term_link ) .'">' . $term->name . '</a> &middot; ';
		$i++;
		if ($i==3){
			echo '<br>';
			$i=0;			
			}
	} ?>
	

        </td></tr>
<?php }}
} ?>
<!-- Table content -->
    </tbody>
    </table>
    </div>
    </div>        
    