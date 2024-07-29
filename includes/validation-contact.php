<?php
add_filter( 'wpcf7_validate_text', 'wpcs_custom_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'wpcs_custom_validation_filter', 10, 2 );

function wpcs_custom_validation_filter( $result, $tag ) {
	$name = $tag->name;

	$value = isset( $_POST[$name] )
		? trim( wp_unslash( strtr( (string) $_POST[$name], "\n", " " ) ) )
		: '';

	if ( 'text' == $tag->basetype ) {
		if ( preg_match('/^[^a-zA-Z]*$/', $value ) ) {
			$result->invalidate( $tag, 'Sorry... Number exists..' );
//$result->invalidate( $tag, wpcf7_get_message( 'invalid_wpcs_custom_error' ) );
		} 
	}
    return $result;
}