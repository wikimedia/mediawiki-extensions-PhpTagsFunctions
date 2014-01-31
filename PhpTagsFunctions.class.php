<?php
/**
 *
 *
 * @file PhpTagsFunctions.class.php
 * @ingroup PhpTagsFunctions
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */

class PhpTagsFunctions extends PhpTags\BaseHooks {

	public static function getClassName() {
		return __CLASS__;
	}

	protected static $functions_definition = array(
		'array_change_key_case' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			2 => array( PHPTAGS_TYPE_INT, false, CASE_LOWER ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_array_change_key_case_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_chunk' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			2 => array( PHPTAGS_TYPE_INT, false ),
			3 => array( PHPTAGS_TYPE_BOOL, false, false ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'phptags_array_chunk_3' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_combine' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			2 => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_array_combine_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_count_values' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, null ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_INVOKE => array( 1 => 'phptags_array_count_values_1' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_diff_assoc' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, null ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			2 => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_VALUE_N => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'phptags_array_diff_assoc_n' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_diff_key' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, null ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			2 => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_VALUE_N => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'phptags_array_diff_key_n' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_diff' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, null ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			2 => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_VALUE_N => array( PHPTAGS_TYPE_ARRAY, false ),
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'phptags_array_diff_n' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_fill_keys' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, null ),
			1 => array( PHPTAGS_TYPE_ARRAY, false ),
			2 => array( PHPTAGS_TYPE_MIXED, false ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_array_fill_keys_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_fill' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, null ),
			1 => array( PHPTAGS_TYPE_INT, false ),
			2 => array( PHPTAGS_TYPE_INT, false ),
			3 => array( PHPTAGS_TYPE_MIXED, false ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'phptags_array_fill_3' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY, PHPTAGS_GROUP_EXPENSIVE ),
		),


		'count' => array(
			0 => array( PHPTAGS_TYPE_INT, 0 ),
			1 => array( PHPTAGS_TYPE_MIXED, false ),
			2 => array( PHPTAGS_TYPE_INT, false, COUNT_NORMAL ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_count_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'current' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false ),
			1 => array( PHPTAGS_TYPE_ARRAY, true ),
			PHPTAGS_HOOK_INVOKE => array( 1 => 'phptags_current_1' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'next' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false ),
			1 => array( PHPTAGS_TYPE_ARRAY, true ),
			PHPTAGS_HOOK_INVOKE => array( 1 => 'phptags_next_1' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),


		'print_r' => array(
			0 => array( PHPTAGS_TYPE_MIXED, true ),
			1 => array( PHPTAGS_TYPE_MIXED, false ),
			2 => array( PHPTAGS_TYPE_BOOL, false, false ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_print_r_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VARIABLE ),
		),
		'var_export' => array(
			0 => array( PHPTAGS_TYPE_MIXED, null ),
			1 => array( PHPTAGS_TYPE_MIXED, false ),
			2 => array( PHPTAGS_TYPE_BOOL, false, false ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_var_export_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VARIABLE ),
		),
	);

	static function phptags_array_change_key_case_2( $args ) {
		return array_change_key_case( $args[0], $args[1] );
	}

	static function phptags_array_chunk_3( $args ) {
		return array_chunk( $args[0], $args[1], $args[2] );
	}

	static function phptags_array_combine_2( $args ) {
		return array_combine( $args[0], $args[1] );
	}

	static function phptags_array_count_values_1( $args ) {
		return @ array_count_values( $args[0] );
	}

	static function phptags_array_diff_assoc_n( $args ) {
		return call_user_func_array('array_diff_assoc', $args);
	}

	static function phptags_array_diff_key_n( $args ) {
		return call_user_func_array('array_diff_key', $args);
	}

	static function phptags_array_diff_n( $args ) {
		return call_user_func_array('array_diff', $args);
	}

	static function phptags_array_fill_keys_2( $args ) {
		return array_fill_keys( $args[0], $args[1] );
	}

	static function phptags_array_fill_3( $args ) {
		return array_fill( $args[0], $args[1], $args[2] );
	}



	static function phptags_count_2( $args ) {
		return count( $args[0], $args[1] );
	}

	static function phptags_current_1( $args ) {
		return current( $args[0] );
	}

	static function phptags_next_1( $args ) {
		return next( $args[0] );
	}

	static function phptags_print_r_2( $args ) {
		$ret = print_r( $args[0], true );
		return $args[1] ? $ret : new PhpTags\outPrint( true, $ret );
	}

	static function phptags_var_export_2( $args ) {
		$ret = var_export($args[0], true);
		return $args[1] ? $ret : new PhpTags\outPrint( null, $ret );
	}

}
