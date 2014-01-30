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
		),
	);

	static function phptags_array_change_key_case_2( $param1, $param2 ) {
		return array_change_key_case( $param1, $param2 );
	}
}