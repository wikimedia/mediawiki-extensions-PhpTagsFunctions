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

	public static function onFunctionHook( $name, $params, &$transit ) {
		$transit[PHPTAGSFUNCTIONS_NAME] = $name;
		return parent::onFunctionHook( $name, $params, $transit );
	}

	protected static $functions_definition = array(
		'array_change_key_case' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => CASE_LOWER ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_chunk' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => false ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_combine' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_count_values' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_diff_assoc' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_diff_key' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_diff' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_fill_keys' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_fill' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_INT,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY, PHPTAGS_GROUP_UNLIMITED_MEMORY ),
		),
		'array_flip' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_intersect_assoc' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_intersect_key' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_intersect' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_key_exists' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_keys' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_MIXED,
			3 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => null, 3 => false ),
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function', 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_merge_recursive' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_merge' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_multisort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_MIXED,
			3 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_ASC, 3 => SORT_REGULAR ),
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => array( 1 => true, 2 => 1, 3 => 1, PHPTAGS_HOOK_VALUE_N => 1 ),
		),
		'array_pad' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY, PHPTAGS_GROUP_UNLIMITED_MEMORY ),
		),
		'array_pop' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'array_product' => array(
			0 => array( PHPTAGS_TYPE_NUMBER, false, 0 ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_push' => array(
			0 => array( PHPTAGS_TYPE_INT, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'array_rand' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => 1 ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_replace_recursive' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_replace' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_reverse' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => false ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_search' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_ARRAY,
			3 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => false ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_shift' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'array_slice' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_INT,
			4 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => null, 4 => false ),
			PHPTAGS_HOOK_INVOKE => array( 4 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_splice' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_INT,
			4 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function', 3 => 'call_php_native_function', 4 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'array_sum' => array(
			0 => array( PHPTAGS_TYPE_NUMBER, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_unique' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_STRING ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'array_unshift' => array(
			0 => array( PHPTAGS_TYPE_INT, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'array_values' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'arsort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_REGULAR ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'asort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_REGULAR ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'count' => array(
			0 => array( PHPTAGS_TYPE_INT, false, 0 ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => COUNT_NORMAL ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'current' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'each' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'end' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'in_array' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_ARRAY,
			3 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => false ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'key_exists' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'key' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'krsort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_REGULAR ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'ksort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_REGULAR ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'natcasesort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'natsort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'next' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'pos' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'prev' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'range' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_MIXED,
			3 => PHPTAGS_TYPE_NUMBER,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => 1 ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
		),
		'reset' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'rsort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_REGULAR ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),
		'shuffle' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => PHPTAGS_ONLY_LINKS,
		),
		'sort' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_ARRAY,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => SORT_REGULAR ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_ARRAY ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1,
		),


// PCRE Functions
// @see http://www.php.net/manual/en/ref.pcre.php
		'preg_filter' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_MIXED,
			3 => PHPTAGS_TYPE_MIXED,
			4 => PHPTAGS_TYPE_INT,
			5 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 4 => -1 ),
			PHPTAGS_HOOK_INVOKE => array( 4 => 'call_php_native_function', 5 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 16, // 00001
		),
		'preg_grep' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_ARRAY,
			3 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => 0 ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
		),
		'preg_last_error' => array(
			0 => array( PHPTAGS_TYPE_INT, false, null ),
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
		),
		'preg_match_all' => array(
			0 => array( PHPTAGS_TYPE_INT, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_STRING,
			3 => PHPTAGS_TYPE_ARRAY,
			4 => PHPTAGS_TYPE_INT,
			5 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 4 => PREG_PATTERN_ORDER, 5 => 0 ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_preg_match_all_2', 5 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 4, // 00100
		),
		'preg_match' => array(
			0 => array( PHPTAGS_TYPE_INT, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_STRING,
			3 => PHPTAGS_TYPE_ARRAY,
			4 => PHPTAGS_TYPE_INT,
			5 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 4 => 0, 5 => 0 ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function', 5 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 4, // 00100
		),
		'preg_quote' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, null ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => null ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
		),
		'preg_replace' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_MIXED,
			3 => PHPTAGS_TYPE_MIXED,
			4 => PHPTAGS_TYPE_INT,
			5 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 4 => -1 ),
			PHPTAGS_HOOK_INVOKE => array( 4 => 'phptags_preg_replace_n', 5 => 'phptags_preg_replace_n' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 16, // 00001
		),
		'preg_split' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_STRING,
			3 => PHPTAGS_TYPE_INT,
			4 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => -1, 4 => 0 ),
			PHPTAGS_HOOK_INVOKE => array( 4 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_PCRE ),
		),


// Math Functions
// @see http://www.php.net/manual/en/ref.math.php
		'abs' => array(
			0 => array( PHPTAGS_TYPE_NUMBER, false, false ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'acos' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'acosh' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'asin' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'asinh' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'atan2' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			2 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'atan' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'atanh' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'base_convert' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, null ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'bindec' => array(
			0 => array( PHPTAGS_TYPE_NUMBER, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'ceil' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'cos' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'cosh' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'decbin' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, false ),
			1 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'dechex' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, false ),
			1 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'decoct' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, false ),
			1 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'deg2rad' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'exp' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'expm1' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'floor' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'fmod' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			2 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'getrandmax' => array(
			0 => array( PHPTAGS_TYPE_INT, false, null ),
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'hexdec' => array(
			0 => array( PHPTAGS_TYPE_NUMBER, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'hypot' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			2 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'is_finite' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'is_infinite' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'is_nan' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'lcg_value' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, null ),
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'log10' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'log1p' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'log' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			2 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => M_E ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'max' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'min' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, false ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'mt_getrandmax' => array(
			0 => array( PHPTAGS_TYPE_INT, false, null ),
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'mt_rand' => array(
			0 => array( PHPTAGS_TYPE_INT, false, false ),
			1 => PHPTAGS_TYPE_INT,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function', 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'mt_srand' => array(
			0 => array( PHPTAGS_TYPE_VOID, false, null ),
			1 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function', 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'octdec' => array(
			0 => array( PHPTAGS_TYPE_NUMBER, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'pi' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, null ),
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'pow' => array(
			0 => array( PHPTAGS_TYPE_NUMBER, false, false ),
			1 => PHPTAGS_TYPE_NUMBER,
			2 => PHPTAGS_TYPE_NUMBER,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'rad2deg' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'rand' => array(
			0 => array( PHPTAGS_TYPE_INT, false, false ),
			1 => PHPTAGS_TYPE_INT,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function', 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'round' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => 0, 3 => PHP_ROUND_HALF_UP ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'sin' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'sinh' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'sqrt' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'srand' => array(
			0 => array( PHPTAGS_TYPE_VOID, false, null ),
			1 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_INVOKE => array( 0 => 'call_php_native_function', 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'tan' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),
		'tanh' => array(
			0 => array( PHPTAGS_TYPE_FLOAT, false, false ),
			1 => PHPTAGS_TYPE_FLOAT,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MATH ),
		),


// Variable handling Functions
// @see http://www.php.net/manual/en/ref.var.php
		'boolval' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'phptags_boolval_1' ), // @todo PHP 5 >= 5.5.0
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'doubleval' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'floatval' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'get_defined_vars' => array(
			0 => array( PHPTAGS_TYPE_ARRAY, false, null ),
			PHPTAGS_HOOK_INVOKE => array( 0 => 'phptags_get_defined_vars_0' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'gettype' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'intval' => array(
			0 => array( PHPTAGS_TYPE_INT, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_INT,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => 10 ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_array' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_bool' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_double' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_float' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_int' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_integer' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_long' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_null' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_numeric' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_real' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_scalar' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'is_string' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'print_r' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, true ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => false ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_print_r_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VARIABLE ),
		),
		'settype' => array(
			0 => array( PHPTAGS_TYPE_BOOL, false, false ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_settype_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
			PHPTAGS_HOOK_CONTAINS_LINKS => 1, // 10
		),
		'strval' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( 1 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VAR ),
		),
		'var_dump' => array(
			0 => array( PHPTAGS_TYPE_VOID, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_VALUE_N => PHPTAGS_TYPE_MIXED,
			PHPTAGS_HOOK_INVOKE => array( PHPTAGS_HOOK_VALUE_N => 'phptags_var_dump_n' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VARIABLE ),
		),
		'var_export' => array(
			0 => array( PHPTAGS_TYPE_MIXED, false, null ),
			1 => PHPTAGS_TYPE_MIXED,
			2 => PHPTAGS_TYPE_BOOL,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => false ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'phptags_var_export_2' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_VARIABLE ),
		),


// Multibyte String
// @see http://www.php.net/manual/en/book.mbstring.php
		'mb_convert_case' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, null ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_INT,
			3 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => 'UTF-8' ),
			PHPTAGS_HOOK_INVOKE => array( 3 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MBSTRING ),
		),
		'mb_stripos' => array(
			0 => array( PHPTAGS_TYPE_INT, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_STRING,
			3 => PHPTAGS_TYPE_INT,
			4 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => 0, 4 => 'UTF-8' ),
			PHPTAGS_HOOK_INVOKE => array( 4 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MBSTRING ),
		),
		'mb_strlen' => array(
			0 => array( PHPTAGS_TYPE_STRING, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 2 => 'UTF-8' ),
			PHPTAGS_HOOK_INVOKE => array( 2 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MBSTRING ),
		),
		'mb_strpos' => array(
			0 => array( PHPTAGS_TYPE_INT, false, false ),
			1 => PHPTAGS_TYPE_STRING,
			2 => PHPTAGS_TYPE_STRING,
			3 => PHPTAGS_TYPE_INT,
			4 => PHPTAGS_TYPE_STRING,
			PHPTAGS_HOOK_DEFAULT_VALUES => array( 3 => 0, 4 => 'UTF-8' ),
			PHPTAGS_HOOK_INVOKE => array( 4 => 'call_php_native_function' ),
			PHPTAGS_HOOK_GROUP => array( PHPTAGS_GROUP_MBSTRING ),
		),

	);

	protected static function call_php_native_function( $args, $transit ) {
		$functionName = $transit[PHPTAGSFUNCTIONS_NAME];
		return call_user_func_array( $functionName, $args );
	}

	/**
	 * @todo remove it for PHP >= 5.4.0
	 */
	protected static function phptags_preg_match_all_2( $args ) {
		$tmp = null;
		preg_match_all( $args[0], $args[1], $tmp );
	}

	protected static function phptags_preg_replace_n( $args, $transit ) {
		try {
			if ( is_array($args[0]) ) {
				$tmp = array();
				foreach ( $args[0] as $key => $value ) {
					$tmp[$key] = self::getValidPattern( $value, $transit );
				}
				$args[0] = $tmp;
			}else{
				$args[0] = self::getValidPattern( $args[0], $transit );
			}
		} catch ( \Exception $exc ) {
			throw new \PhpTags\ExceptionPhpTags( PHPTAGS_EXCEPTION_FROM_HOOK, array( $transit[PHPTAGSFUNCTIONS_NAME] . '(): ' . $exc->getMessage(), $exc->getCode() ) );
		}

		if ( is_array($args[0]) ) {
			$tmp = array();
			foreach ( $args[0] as $key => $value ) {
				$tmp[$key] = self::getValidPattern( $value, $transit );
			}
			$args[0] = $tmp;
		}else{
			$args[0] = self::getValidPattern( $args[0], $transit );
		}

		return call_user_func_array( 'preg_replace', $args );
	}

	private static function getValidPattern ( $pattern ) {
		$pattern = str_replace(chr(0), '', $pattern);
		// Set basic statics
		$regexStarts = '`~!@#$%^&*-_+=.,?"\':;|/<([{';
		$regexEnds   = '`~!@#$%^&*-_+=.,?"\':;|/>)]}';
		$regexModifiers = 'imsxADU';

		$delimPos = strpos( $regexStarts, $pattern[0] );
		if ( $delimPos === false ) {
			throw new Exception(
					wfMessage( 'phptagsfunctions-preg-bad-delimiter' )->text(),
					PHPTAGS_EXCEPTION_WARNING
				);
		}

		$end = $regexEnds[$delimPos];
		$pos = 1;
		$endPos = null;
		while ( !isset( $endPos ) ) {
			$pos = strpos( $pattern, $end, $pos );
			if ( $pos === false ) {
				throw new Exception(
						wfMessage( 'phptagsfunctions-preg-no-ending-delimiter', $end )->text(),
						PHPTAGS_EXCEPTION_WARNING
					);
			}
			$backslashes = 0;
			for ( $l = $pos - 1; $l >= 0; $l-- ) {
				if ( $pattern[$l] == '\\' ) $backslashes++;
				else break;
			}
			if ( $backslashes % 2 == 0 ) $endPos = $pos;
			$pos++;
		}
		$startRegex = (string)substr( $pattern, 0, $endPos ) . $end;
		$endRegex = (string)substr( $pattern, $endPos + 1 );
		$len = strlen( $endRegex );
		for ( $c = 0; $c < $len; $c++ ) {
			if ( strpos( $regexModifiers, $endRegex[$c] ) === false ) {
				throw new Exception(
						wfMessage( 'phptagsfunctions-preg-unknown-modifier', $endRegex[$c] )->text(),
						PHPTAGS_EXCEPTION_WARNING
					);
			}
		}
		return $startRegex . $endRegex;
	}

	/**
	 * @todo remove it for PHP 5 >= 5.5.0
	 */
	protected static function phptags_boolval_1( $args ) {
		return (bool)$args[0];
	}

	protected static function phptags_get_defined_vars_0 ( $args, $transit ) {
		return array_combine(
               array_keys( $transit[PHPTAGS_TRANSIT_VARIABLES] ),
               array_map( "reset", array_chunk($transit[PHPTAGS_TRANSIT_VARIABLES], 1) )
        );
	}

	protected static function phptags_print_r_2( $args ) {
		$ret = print_r( $args[0], true );
		return $args[1] ? $ret : new PhpTags\outPrint( true, $ret );
	}

	protected static function phptags_var_dump_n( $args ) {
		ob_start();
		call_user_func_array('var_dump', $args);
		return new PhpTags\outPrint( null, ob_get_clean() );
	}

	protected static function phptags_var_export_2( $args ) {
		$ret = var_export($args[0], true);
		return $args[1] ? $ret : new PhpTags\outPrint( null, $ret );
	}

	protected static function phptags_settype_2( $args ) {
		if ( $args[1] == 'object' ) {
			return false; // @todo
		}
		return settype( $args[0], $args[1] );
	}

}
