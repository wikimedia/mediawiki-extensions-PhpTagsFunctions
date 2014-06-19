<?php

/**
 *
 *
 * @file PhpTagsFunc.php
 * @ingroup PhpTagsFunctions
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */
class PhpTagsFunc extends PhpTags\GenericFunction {

	public static function __callStatic( $name, $arguments ) {
		foreach ( $arguments as &$arg ) {
			if ( $arg instanceof PhpTags\GenericObject ) {
				$arg = $arg->getValue();
			}
		}
		$function_name = substr( $name, 2 );
		$return = call_user_func_array( $function_name, $arguments );
		if ( is_object($return) ) {
			$return = \PhpTags\Hooks::getObjectWithValue( get_class($return), $return );
		}
		return $return;
	}

	/**
	 * @todo remove it for PHP 5 >= 5.5.0
	 */
	public static function f_boolval( $var ) {
		return (bool)$var;
	}

	public static function f_get_defined_vars() {
		return array_combine(
               array_keys( \PhpTags\Runtime::$transit[PHPTAGS_TRANSIT_VARIABLES] ),
               array_map( "reset", array_chunk( \PhpTags\Runtime::$transit[PHPTAGS_TRANSIT_VARIABLES], 1) )
        );
	}

	public static function f_get_defined_functions() {
		return PhpTags\Hooks::getDefinedFunctions();
	}

	public static function f_function_exists( $function_name ) {
		$functions = PhpTags\Hooks::getDefinedFunctions();
		return isset( $functions[$function_name] );
	}

	public static function f_var_export( $expression, $return = false ) {
		if ( $expression instanceof \PhpTags\GenericObject ) {
			$expression = $expression->getValue();
		}
		$ret = var_export( $expression, true );
		return $return ? $ret : new PhpTags\outPrint( null, $ret );
	}

	public static function f_var_dump() {
		$args = func_get_args();
		foreach ( $args as &$value ) {
			if ( $value instanceof \PhpTags\GenericObject ) {
				$value = $value->getValue();
			}
		}
		ob_start();
		call_user_func_array( 'var_dump', $args );
		return new PhpTags\outPrint( null, ob_get_clean() );
	}

	public static function f_print_r( $expression, $return = false ) {
		if ( $expression instanceof \PhpTags\GenericObject ) {
			$expression = $expression->getValue();
		}
		$ret = print_r( $expression, true );
		return $return ? $ret : new PhpTags\outPrint( true, $ret );
	}

}
