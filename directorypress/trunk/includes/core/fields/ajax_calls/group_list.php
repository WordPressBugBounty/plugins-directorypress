<?php
// fields list
if( !function_exists('directorypress_fields_group_list') ){
	function directorypress_fields_group_list(){
		global $directorypress_object;             	
        $response 	= ''; 
		$response .= $directorypress_object->fields_handler_property->fields_group_list_ajax();
		echo wp_kses_post($response); 
		die();
		
	}
	add_action('wp_ajax_directorypress_fields_group_list', 'directorypress_fields_group_list');
    add_action('wp_ajax_nopriv_directorypress_fields_group_list', 'directorypress_fields_group_list');
}