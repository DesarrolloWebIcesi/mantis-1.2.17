<?php
	$g_hostname = 'mysql.icesi.edu.co';
	$g_db_type = 'mysql';
	$g_database_name = 'servicios_adm';
	//$g_database_name = 'sgs';
	$g_db_username = 'servicios';
	$g_db_password = 'MfePayDghK3';
	
	// Configuración de los paths
	if ( isset ( $_SERVER['SCRIPT_NAME'] ) ) {
		$t_protocol = 'http';
		if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) ) {
			$t_protocol= $_SERVER['HTTP_X_FORWARDED_PROTO'];
		} else if ( isset( $_SERVER['HTTPS'] ) && ( strtolower( $_SERVER['HTTPS'] ) != 'off' ) ) {
			$t_protocol = 'https';
		}
	
		# $_SERVER['SERVER_PORT'] is not defined in case of php-cgi.exe
		if ( isset( $_SERVER['SERVER_PORT'] ) ) {
				$t_port = ':' . $_SERVER['SERVER_PORT'];
						if ( ( ':80' == $t_port && 'http' == $t_protocol )
						|| ( ':443' == $t_port && 'https' == $t_protocol )) {
								$t_port = '';
		}
		} else {
		$t_port = '';
		}
	
			if ( isset( $_SERVER['HTTP_X_FORWARDED_HOST'] ) ) { // Support ProxyPass
		$t_hosts = explode( ',', $_SERVER['HTTP_X_FORWARDED_HOST'] );
		$t_host = $t_hosts[0];
		} else if ( isset( $_SERVER['HTTP_HOST'] ) ) {
            $t_host = $_SERVER['HTTP_HOST'];
		} else if ( isset( $_SERVER['SERVER_NAME'] ) ) {
		$t_host = $_SERVER['SERVER_NAME'] . $t_port;
		} else if ( isset( $_SERVER['SERVER_ADDR'] ) ) {
		$t_host = $_SERVER['SERVER_ADDR'] . $t_port;
		} else {
				$t_host = '192.168.220.28';
	}
	
		$t_path = str_replace( basename( $_SERVER['PHP_SELF'] ), '', $_SERVER['PHP_SELF'] );
		$t_path = basename( $t_path ) == "admin" ? dirname( $t_path ) . DIRECTORY_SEPARATOR : $t_path;
		$t_path = basename( $t_path ) == "soap" ? dirname( dirname( $t_path ) ) . DIRECTORY_SEPARATOR : $t_path;
	
		$t_url    = $t_protocol . '://' . $t_host . $t_path;
	
	} else {
		$t_path = '';
		$t_host = '';
		$t_protocol = '';
		$t_url = 'http://192.168.220.28/solicitud_servicios';
		}
	
		// Nombre único para la sesión
		$g_session_key = 'SGS';
		// Validación de sesión por IP
		$g_session_validation = ON;
		// No permitir crear su propia cuenta de usuario
        $g_allow_signup = OFF;
        // No permitir resetear la contraseña
		$g_send_reset_password = OFF;
       // Correo del administrador
		$g_administrator_email = 'webmaster@icesi.edu.co';
		// Correo del webmaster
		$g_webmaster_email = 'soporte-syri@listas.icesi.edu.co';
		// Correo remitente
		$g_from_email = 'soporte-syri@listas.icesi.edu.co';
		// Nombre remitente
		$g_from_name = 'Sistema de Gestión de Solicitudes';
		// Correo para mensajes rebotados
$g_return_path_email = 'soporte-syri@listas.icesi.edu.co';
	
// Notificaciones por correo para categorías de usuario
	$g_default_notify_flags	= array('reporter'	=> ON,
	'handler'	=> ON,
	'monitor'	=> ON,
	'bugnotes'	=> ON,
	'explicit'  => ON,
			'threshold_min'	=> NOBODY,
	'threshold_max' => NOBODY);
	// Notificaciones por correo al cambiar de estado un caso
$g_notify_flags['new'] = array( 'bugnotes'	=> OFF,
			'monitor'	=> OFF);
			$g_notify_flags['monitor'] = array(	'reporter'	=> OFF,
			'handler'	=> OFF,
					'monitor'	=> OFF,
					'bugnotes'	=> OFF,
							'explicit'  => ON,
							'threshold_min'	=> NOBODY,
									'threshold_max' => NOBODY);
	
									// Perfil mínimo al que se le habilita los enlaces Mailto
			$g_show_user_email_threshold = DEVELOPER;
// Perfil mínimo que puede ver los nombres reales
	$g_show_user_realname_threshold = DEVELOPER;
	// Separador 1 para los correos
$g_email_separator1 = str_pad('', 70, '=');
	// Separador 2 para los correos
	$g_email_separator2 = str_pad('', 70, '-');
	// Padding para los correos
	$g_email_padding_length = 28;
	// Lenguaje por defecto
	$g_default_language = 'spanish';
	// Arreglo de idiomas para elegir
$g_language_choices_arr    = array('spanish','english');
// Título de la ventana
	$g_window_title = 'Sistema de Gesti&oacute;n de Solicitudes - Universidad Icesi';
	// Logo
	$g_logo_image = 'images/logo_icesi.png';
	// Url donde redirecciona el logo
	$g_logo_url = 'http://www.icesi.edu.co';
	// NO requerir reautenticación para las opciones administrativas
	$g_reauthentication = OFF;
	// La opción de Documentos está obsoleta y se incluirá en un plugin en el futuro
	$g_enable_project_documentation = OFF;
	// Agregar menú abajo
	$g_show_footer_menu = ON;
	// Agregar menú con los proyectos disponibles
	$g_show_project_menu_bar = ON;
// Mostrar nombre del encargado en la opción Ver Casos
$g_show_assigned_names = OFF;
// Columnas a desplegar en Ver Casos
	$g_view_issues_page_columns = array ( 'selection', 'edit', 'priority', 'id', 'bugnotes_count', 'severity', 'status', 'handler_id', 'last_updated', 'summary', 'date_submitted', 'custom_Fecha de entrega' );
	// Columnas a imprimir
	$g_print_issues_page_columns = array ( 'selection', 'priority', 'id', 'severity', 'status', 'last_updated', 'summary', 'date_submitted', 'custom_Fecha de entrega' );
	// Columnas a exportar a CSV
		$g_csv_columns = array ( 'id', 'project_id', 'reporter_id', 'handler_id', 'priority', 'severity', 'date_submitted', 'last_updated', 'summary', 'status' );
		// Columnas a exportar a Excel
		$g_excel_columns = array ( 'id', 'project_id', 'reporter_id', 'handler_id', 'priority', 'severity', 'date_submitted', 'last_updated', 'summary', 'status', 'custom_Fecha de entrega' );
		// Posición de la barra de estados con colores
		$g_status_legend_position = STATUS_LEGEND_POSITION_TOP;
// Mostrar porcentaje por estado
	$g_status_percentage_legend = OFF;
// Botonera arriba y abajo
		$g_action_button_position = POSITION_BOTH;
		//Mostrar el nombre real de los usuarios
		$g_show_realname = ON;
		// Mostrar avatar de los usuarios
        $g_show_avatar = OFF;
		// Formato de fecha corto
		$g_short_date_format = 'd-M-Y';
		// Formato de fecha normal
		$g_normal_date_format = 'd-M-y H:i';
		// Formato de fecha completo
		$g_complete_date_format = 'd-M-Y h:i A';
		// Zona horaria por defecto
		$g_default_timezone = 'America/Bogota';
		// Notas por defecto privadas
		$g_default_bugnote_view_status = VS_PRIVATE;
		// Estado a ocultar
		$g_hide_status_default = NONE;
		// jdholguin se menciona el estado ACKNOWLEDGED para ocultarlos de la vista de "pendientes por aprobar"
		$g_hide_status_acknowledged = ACKNOWLEDGED;
		// Refresco por defecto en minutos
		$g_default_refresh_delay = 30;
		// Tiempo de refresco en minutos
		$g_min_refresh_delay = 10;
		// Tiempo de redireccionamiento
		$g_default_redirect_delay = 0;
		// Correo por defecto al reportar
		$g_default_email_on_new = OFF;
		// Límite de informadores a mostrar en Resumen
		$g_reporter_summary_limit = 10;
		// Mostrar el proyecto entre [] cuando se elija "Todos los proyectos" en Resumen
		$g_summary_category_include_project = ON;
		// Perfil mínimo para ver el enlace Resumen
		$g_view_summary_threshold = NOBODY;
		// Historial del caso no visible por defecto
		$g_history_default_visible = OFF;
		// No agregar como monitorizadores a los que reciben los recordatorios
		$g_reminder_recipients_monitor_bug = OFF;
		// Perfil mínimo para poder recibir recordatorios
		$g_reminder_receive_threshold = REPORTER;
		// destino de la carga de archivos
		 $g_file_upload_method = DATABASE;
		//$g_file_upload_method = DISK;
		// Máximo tamaño de los archivos que se cargan
		$g_max_file_size = 2097152;
		//$g_max_file_size = 2000000;
		// Extensiones de archivos permitidos
		$g_allowed_files = '';
		// Extensiones de archivos no permitidos
		$g_disallowed_files = '';
		// Hacer las urls y correos enlazables
		$g_html_make_links = ON;
		// Tags permitidos en los campos textarea
		$g_html_valid_tags = 'p, li, ul, ol, br, pre, i, b, u, em';
		// Tags permitidos en los campos text
		$g_html_valid_tags_single_line = 'i, b, u, em';
		// Los textos en las listas desplegables no se truncan
		$g_max_dropdown_length = 0;
	
		// Servidor LDAP
		$g_ldap_server = 'ldap://iden.icesi.edu.co/';
		// Puerto LDAP
		$g_ldap_port = 389;
		// dn LDAP
		//$g_ldap_root_dn = 'cn=users,dc=icesi,dc=edu,dc=co';
		// rjaramillo 2010-09-13
		// Agregando acceso a empleados temporales, estudiantes de pregrado, estudiantes de postgrado y profesores hora cátedra
		//$g_ldap_root_dn	= 'cn=colaboradores,cn=temporales,cn=pregrado,cn=postgrado,cn=profesores,cn=users,dc=icesi,dc=edu,dc=co';
//$g_ldap_root_dn	= 'cn=colaboradores,cn=users,dc=icesi,dc=edu,dc=co';
	$g_ldap_root_dn	= '';
	$g_ldap_root_dn_array	= array(
	'cn=colaboradores,cn=users,dc=icesi,dc=edu,dc=co',
	'cn=temporales,cn=users,dc=icesi,dc=edu,dc=co',
	'cn=pregrado,cn=users,dc=icesi,dc=edu,dc=co',
	'cn=postgrado,cn=users,dc=icesi,dc=edu,dc=co',
	'cn=profesores,cn=users,dc=icesi,dc=edu,dc=co'
	);
	// Organización LDAP
	$g_ldap_organization = '';
	// Campo UID
	$g_ldap_uid_field = 'uid';
	// Nombre real
	$g_ldap_realname_field = 'givenname';
	// Cadena LDAP
	$g_ldap_bind_dn = 'cn=busqueda,cn=dsistemas,cn=users,dc=icesi,dc=edu,dc=co';
	// Password LDAP
	$g_ldap_bind_passwd = 'lK3Bs0o';
// Uso del email de LDAP
$g_use_ldap_email = ON;
// El nombre real se saca de LDAP
//$g_use_ldap_realname = ON;
// Versión del protocolo LDAP
//$g_ldap_protocol_version = 0;
// ??
//$g_ldap_follow_referrals = ON;
// Ubicación del archivo de simulación de LDAP
	//$g_ldap_simulation_file_path = '';
	
	// Estado en el que los casos son de solo lectura
	$g_bug_readonly_status_threshold = CLOSED;
	// Estado en el que un caso puede ser Cerrado o Reabierto
$g_bug_resolved_status_threshold = RESOLVED;
	// Estado asignado (solo para los pendientes por aprobar)
	$g_bug_assigned_status_threshold = ASSIGNED;
	
	// Flujo de estados
	$g_status_enum_workflow[NEW_]='50:assigned,20:feedback';
	$g_status_enum_workflow[FEEDBACK] ='80:resolved,30:acknowledged';
	$g_status_enum_workflow[ACKNOWLEDGED] ='80:resolved,50:assigned';
	$g_status_enum_workflow[ASSIGNED] ='80:resolved,30:acknowledged,20:feedback';
	$g_status_enum_workflow[RESOLVED] ='40:confirmed,50:assigned';
	$g_status_enum_workflow[CONFIRMED] ='90:closed';
	$g_status_enum_workflow[CLOSED] ='';
	// Tamaño máximo de archivos a previsualizar
	$g_preview_attachments_inline_max_size = 256 * 1024;
	// Extensiones de archivos de texto a previsualizar
$g_preview_text_extensions = array( '', 'txt', 'diff', 'patch' );
// Extensiones de archivos de imagenes a previsualizar
	$g_preview_image_extensions = array( 'bmp', 'png', 'gif', 'jpg', 'jpeg' );
// Ancho máximo de previsualización de imágenes
	$g_preview_max_width = 200;
// Altura máxima de previsualización de imágenes
	$g_preview_max_height = 250;
	// Extensiones de archivos para ser visualizados sin descargar
	$g_inline_file_exts = 'gif,png,jpg,jpeg,bmp';
	// Perfil mínimo para descargar archivos adjuntos
	$g_download_attachments_threshold    = DEVELOPER;
	// Perfil mínimo para borrar archivos adjuntos
	$g_delete_attachments_threshold    = DEVELOPER;
	// Usar campo Tiempo Estimado
$g_enable_eta = OFF;
	// Usar campo Proyección
	$g_enable_projection = OFF;
	// Campos a mostrar en la página de Reportar caso
	$g_bug_report_page_fields = array( 'summary', 'description', 'attachments' );
	// Campos a mostrar en la página de Ver caso
	$g_bug_view_page_fields = array ( 'id', 'project', 'date_submitted', 'last_updated', 'reporter', 'handler', 'priority', 'severity', /*'reproducibility',*/
	'status', /*'resolution',*/ 'projection', 'eta', 'summary', 'description', 'additional_info', 'steps_to_reproduce', /*'tags',*/ 'attachments', /*'due_date'*/ );
	// Campos a mostrar en la página de Imprimir caso
	$g_bug_print_page_fields = array ( 'id', 'project', 'date_submitted', 'last_updated', 'reporter', 'handler', 'priority', 'severity', /*'reproducibility',*/
	'status', /*'resolution',*/ 'projection', 'eta', 'summary', 'description', 'additional_info', 'steps_to_reproduce', /*'tags',*/ );
// Campos a mostrar en la página de Actualizar caso
	$g_bug_update_page_fields = array ( 'id', 'project', 'date_submitted', 'last_updated', 'reporter', 'handler', 'priority', 'severity', /*'reproducibility',*/
	'status', /*'resolution',*/ 'projection', 'eta', 'summary', 'description', 'additional_info', 'steps_to_reproduce', 'attachments', /*'due_date'*/ );
	// Campos a mostrar en la página de Cambiar estado al caso
	$g_bug_change_status_page_fields = array ( 'id', 'project', 'date_submitted', 'last_updated', 'reporter', /*'handler',*/ 'priority', 'severity', /*'reproducibility',*/
	'status', /*'resolution',*/ 'projection', 'eta', 'summary', 'description', 'additional_info', 'steps_to_reproduce', /*'tags',*/ 'attachments', /*'due_date'*/ );
	// Perfil mínimo para actualizar un caso
//jlozano 19-06-2012 se cambio el perfil mínimo para actualizar un caso de aprobador (UPDATER) a desarrollador.
	$g_update_bug_threshold = DEVELOPER;
	//$g_update_bug_threshold = UPDATER;
	// Perfil mínimo que puede montorizar casos
$g_monitor_bug_threshold = DEVELOPER;
	// Pefil mínimo para agregar usuarios a la lista de usuarios monitorizando un caso
	$g_monitor_add_others_bug_threshold = ADMINISTRATOR;
// Pefil mínimo para borrar usuarios de la lista de usuarios monitorizando un caso
	$g_monitor_delete_others_bug_threshold = ADMINISTRATOR;
	// Perfil mínimo para ser listado en el campo Asignar A:
	//jlozano 14-06-2012 Se cambio el campo de perfil mínimo para ser listado en el campo Asignar A, de desarrollador
	//a aprobador (UPDATER), esto es para que aquellas personas que son de este rol se les pueda asignar los casos.
	//$g_handle_bug_threshold = DEVELOPER;
	$g_handle_bug_threshold = UPDATER;
	//fin cambio
	// Perfil mínimo que puede ver la asignación de un caso
	$g_view_handler_threshold = DEVELOPER;
	// Perfil mínimo que puede ver el histórico de un caso
	$g_view_history_threshold = DEVELOPER;
	// Perfil mínimo que puede actualizar notas de un caso
	$g_update_bugnote_threshold = DEVELOPER;
	// Perfil mínimo que puede borrar un caso
	$g_delete_bug_threshold = ADMINISTRATOR;
	// Ningún usuario puede actualizar ni borrar sus propias notas
	$g_bugnote_allow_user_edit_delete = OFF;
	// Perfil mínimo para mover un caso
	$g_move_bug_threshold = DEVELOPER;
	// Perfil mínimo para asignar el estado de un caso
	$g_set_view_status_threshold = ADMINISTRATOR;
	// Perfil mínimo para cambiar el estado de un caso
	//$g_change_view_status_threshold = UPDATER;
	$g_change_view_status_threshold = ADMINISTRATOR;
	// Perfil mínimo para usar consultas almacenadas
	$g_stored_query_use_threshold = DEVELOPER;
	// Perfil mínimo para ver el enlace Log de cambios
	$g_view_changelog_threshold = NOBODY;
	// Perfil mínimo para ver el enlace Roadmap
	$g_roadmap_view_threshold = NOBODY;
	// Perfil mínimo para actualizar roadmap, target_version, etc
	$g_roadmap_update_threshold = ADMINISTRATOR;
	// Perfil mínimo para cambiar de estado de un caso
	$g_update_bug_status_threshold = REPORTER;
	// Perfil mínimo para reabrir un caso cerrado
	$g_reopen_bug_threshold = ADMINISTRATOR;
	// Arreglo de estados por perfil
	//jlozano 14-06-2012: se cambio el nivel de actualizado de desarrollador a actualizador, para que este puede cambiar el estado a aprobado y/o no aprobado
	$g_set_status_threshold = array( FEEDBACK => UPDATER, ACKNOWLEDGED => UPDATER, CLOSED => DEVELOPER, ASSIGNED => DEVELOPER, RESOLVED => DEVELOPER );
	//$g_set_status_threshold = array( FEEDBACK => DEVELOPER, ACKNOWLEDGED => DEVELOPER, CLOSED => DEVELOPER, ASSIGNED => DEVELOPER, RESOLVED => DEVELOPER );
	//FIN CAMBIO
	// No usar el campo Categoría
	$g_allow_no_category = ON;
	// Método de autenticación LDAP
	$g_login_method = LDAP;
	// Los informadores solo pueden ver los casos que ellos reportaron
	// jdholguin - se pone en OFF, teniendo en cuenta las validaciones de las vistas disponibles para cada tipo de usuario
	// y permitir que los usuarios informadores que son aprobadores en un proyecto puedan ver los que tienen pendientes por aprobar
	$g_limit_reporters = OFF;
	// Los informadores no pueden reabrir casos
	$g_allow_reporter_reopen = OFF;
	// Permitir acceso anónimo
	$g_allow_anonymous_login = OFF;
	// Cuenta de acceso anónimo
	//$g_anonymous_account = 'anonimo';
	// Colores para los estados
	$g_status_colors = array(
	'new'          => '#FFA0A0',
	'feedback'     => '#FFBBDD',
	'acknowledged' => '#FFC68C',
	'assigned'     => '#D9FFD9',
	'resolved'     => '#E6E6E6',
	'confirmed'    => '#FFFFB0',
	'closed'       => '#FFFFFF'	
	);
	// Cantidad de campos personalizados por fila
	$g_filter_custom_fields_per_row = 8;
	// Perfil mínimo para crear enlaces permanentes para un filtro
	$g_create_permalink_threshold = ADMINISTRATOR;
	// Niveles de acceso
	$g_access_levels_enum_string = '25:reporter,40:updater,55:developer,90:administrator';
	// Prioridades
	$g_priority_enum_string = '10:none,20:low,30:normal,40:high,50:urgent,60:immediate';
// Importancia por defecto para los casos nuevos
$g_default_bug_severity = TRIVIAL;
	// Importancia
$g_severity_enum_string = '10:feature,20:trivial,30:text';
	// Orden de los estados
	//jlozano 15-06-2012 se agregó $g_updater_status_enum_string para que solo muestre el mensaje no aprobado y aprobado para el rol aprobador (UPDATER)
	$g_status_enum_string = '10:new,20:feedback,30:acknowledged,50:assigned,80:resolved,40:confirmed,90:closed';
	$g_updater_status_enum_string = '20:feedback,30:acknowledged';
//fin jlozano
// Proyecciones
	$g_projection_enum_string = '10:none,30:tweak,50:minor fix,70:major rework,90:redesign';
	// Tiempo estimado
	$g_eta_enum_string = '10:none,20:< 1 day,30:2-3 days,40:< 1 week,50:< 1 month,60:> 1 month';
	// Pie de página de la aplicación
	$g_bottom_include_page = 'gui/pie.php';
	// Encabezado de la aplicación
	$g_top_include_page = 'gui/encabezado.php';
	// Número de casos a desplegar por cada grupo
$g_my_view_bug_count = 10;
// Grupos a mostrar en Mi vista
	// jdholguin - se agrega el item 'acknowledge' para mostrar la caja con los casos "pendientes por aprobar"
$g_my_view_boxes = array (
'assigned'    => '1',
'unassigned'  => '2',
	'reported'    => '3',
'resolved'    => '7',
'recent_mod'     => '6',
'monitored'         => '5',
	'feedback'    => '8',
	'verify'      => '4',
	'my_comments'    => '0',
	'toacknowledge' => '0'
	);
	// rjaramillo 2010-10-27 Arreglo de cajas que verá el Informador
	// jdholguin - se agrega el item 'acknowledge' para mostrar la caja con los casos "pendientes por aprobar"
	// jdholguin - se quita la caja con los casos recientemente modificados para los informadores
	$g_my_view_boxes_reporter = array (
'assigned'    => '0',
'unassigned'  => '0',
'reported'    => '1',
'resolved'    => '0',
'recent_mod'  => '0',
'monitored'   => '0',
'feedback'    => '0',
'verify'      => '2',
'my_comments' => '0',
	'toacknowledge' => '3'
	);
	//jlozano 14-06-2012 Arreglo de cajas que vera el rol actualizador
	// jdholguin - se agrega el item 'acknowledge' para mostrar la caja con los casos "pendientes por aprobar"
	$g_my_view_boxes_updater = array (
	'assigned'    => '1',
	'unassigned'  => '0',
	'reported'    => '2',
	'resolved'    => '0',
	'recent_mod'  => '0',
	'monitored'   => '0',
	'feedback'    => '0',
	'verify'      => '3',
	'my_comments' => '0',
	'toacknowledge' => '4'
	);
// Los grupos en Mi vista pueden ser de diferentes tamaños
	$g_my_view_boxes_fixed_position = ON;
	// Deshabilita el RSS
	$g_rss_enabled = OFF;
	// Habilitar gráfico de relaciones de los casos
	$g_relationship_graph_enable = ON;
	// Habilitar el clic sobre casos en un gráfico de relaciones
	$g_relationship_graph_view_on_click = OFF;
// Cantidad de años hacia atrás
	$g_backward_year_count = 0;
// Cantidad de años hacia adelante
$g_forward_year_count = 2;
// Integración con una wiki
$g_wiki_enable = OFF;
// Máquina wiki
	$g_wiki_engine = 'mediawiki';
	// Nombre del directorio de la wiki
	$g_wiki_root_namespace = 'mantis';
	// Url de la wiki
	$g_wiki_engine_url = 'http://192.168.220.28/wiki/';
	// Mostrar los últimos casos visitados
	$g_recently_visited = ON;
	// Número máximo de casos a mostrar entre los visitados recientemente
	$g_recently_visited_count = 10;
	// Perfil mínimo para ver las etiquetas
	$g_tag_view_threshold = DEVELOPER;
	// Perfil mínimo para adjuntar etiquetas
	$g_tag_attach_threshold = DEVELOPER;
	// Perfil mínimo para quitar etiquetas propias
	$g_tag_detach_own_threshold = DEVELOPER;
	// Perfil mínimo para crear etiquetas
$g_tag_create_threshold = DEVELOPER;
	// Perfil mínimo para editar etiquetas propias
	$g_tag_edit_own_threshold = DEVELOPER;
	// Habilitar el seguimiento de tiempos
	$g_time_tracking_enabled = OFF;
	// Deshabilitar manejo de perfiles
	$g_enable_profiles = OFF;
	// Perfil mínimo para agregar perfiles
	$g_add_profile_threshold = ADMINISTRATOR;
	// Perfil mínimo para actualizar la fecha límite
	$g_due_date_update_threshold = DEVELOPER;
	// Perfil mínimo para ver la fecha límite
	$g_due_date_view_threshold = DEVELOPER;
	
	// Mostrar tiempo de carga
	$g_show_timer = OFF;
	// Para desarrollar
	$g_debug_timer = OFF;
	// Correo de pruebas
	//$g_debug_email = 'rjaramillo@icesi.edu.co';
	$g_debug_email = OFF;
	// Mostrar el número de consultas ejecutadas en el servidor
	$g_show_queries_count = OFF;
	// Perfil mínimo para ver el número de consultas ejecutadas en el servidor
	$g_show_queries_threshold = ADMINISTRATOR;
	// Muestra la lista de consultas ejecutadas en el servidor
	$g_show_queries_list = OFF;
	// Muestra un detalle de los errores
	$g_show_detailed_errors = OFF;
	//$g_show_detailed_errors = ON;
	// Errores a desplegar
	$g_display_errors = array(
	E_WARNING      => 'halt',
	// Se cambio para que no muestre las advertencias
	//E_WARNING      => DISPLAY_ERROR_NONE,
	E_NOTICE       => 'halt',
	E_USER_ERROR   => 'halt',
	E_USER_WARNING => 'none',
	E_USER_NOTICE  => 'none'
	);
	
	// Para efectos de desarrollo, detenerse por cada error
	$g_stop_on_errors = OFF;
	
	// Deshabilita la protección contra ataques Cross-Site
	$g_form_security_validation = OFF;
	
?>
