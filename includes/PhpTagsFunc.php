<?php
namespace PhpTagsObjects;
use PhpTags;

/**
 *
 *
 * @file PhpTagsFunc.php
 * @ingroup PhpTagsFunctions
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */
class PhpTagsFunc extends \PhpTags\GenericObject {

	public static function __callStatic( $name, $arguments ) {
		list ( $callType, $subname ) = explode( '_', $name, 2 );

		if ( $callType === 'f' ) {
			if ( $subname === 'array_multisort' ) {
				return self::array_multisort( $arguments );
			}
			return call_user_func_array( $subname, $arguments );
		}
		return parent::__callStatic( $name, $arguments );
	}

	public static function array_multisort( $arguments ) {
		$n = 0;
		$current = 0;

		foreach ( $arguments as $v ) {
			$current++;
			if ( is_array( $v ) ) {
				$n = 0;
			} elseif ( is_int( $v ) ) {
				$n++;
				if ( $n > 2 ) {
					return new \PhpTags\PhpTagsException(
							\PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER,
							array( 'array_multisort', $current, 'array', gettype( $v ) )
						);
				}
			} else {
				return new \PhpTags\PhpTagsException(
						\PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER,
						array( 'array_multisort', $current, 'array or int', gettype( $v ) )
					);
			}
		}

		return call_user_func_array( 'array_multisort', $arguments );
	}

	public static function f_boolval( $var ) {
		return (bool)$var;
	}

	public static function f_get_defined_vars() {
		$variables = \PhpTags\Runtime::getVariables();
		return array_combine( array_keys( $variables ), array_map( "reset", array_chunk( $variables, 1) ) );
	}

	public static function f_get_defined_functions() {
		return \PhpTags\Hooks::getDefinedFunctions();
	}

	public static function f_function_exists( $function_name ) {
		$functions = \PhpTags\Hooks::getDefinedFunctions();
		return isset( $functions[$function_name] );
	}

	public static function f_printf() {
		$arguments = func_get_args();
		$ret = call_user_func_array( 'sprintf', $arguments );
		return new \PhpTags\outPrint( strlen($ret), $ret, false, false );
	}

	public static function f_vprintf() {
		$arguments = func_get_args();
		$ret = call_user_func_array( 'vsprintf', $arguments );
		return new \PhpTags\outPrint( strlen($ret), $ret, false, false );
	}

	public static function f_var_export( $expression, $return = false ) {
		if ( $expression instanceof \PhpTags\GenericObject ) {
			$expression = $expression->getValue();
		}
		$ret = var_export( $expression, true );
		return $return ? $ret : new \PhpTags\outPrint( null, $ret );
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
		return new \PhpTags\outPrint( null, ob_get_clean() );
	}

	public static function f_print_r( $expression, $return = false ) {
		if ( $expression instanceof \PhpTags\GenericObject ) {
			$expression = $expression->getValue();
		}
		$ret = print_r( $expression, true );
		return $return ? $ret : new \PhpTags\outPrint( true, $ret );
	}

	/**
	 * @todo remove it for PHP >= 5.4.0
	 */
	public static function f_preg_match_all ( $pattern , $subject, &$matches = null, $flags = PREG_PATTERN_ORDER, $offset = 0 ) {
//		1) PhpTags\PhpTagsFunctions_PCRE_Test::testRun_preg_match_all_1
//		Parameter 3 to preg_match_all() expected to be a reference, value given
//		2) PhpTags\PhpTagsFunctions_PCRE_Test::testRun_preg_match_all_2
//		Parameter 3 to preg_match_all() expected to be a reference, value given
//
//		// $trace = debug_backtrace();
//      // $args = $trace[1]['args'];
//		$args = func_get_args();
//		if ( ! array_key_exists( 2, $args ) ) {
//			$args[2] = null;
//		}
//		return call_user_func_array( 'preg_match_all', $args );

		return preg_match_all( $pattern , $subject, $matches, $flags, $offset );
	}

	protected static function f_preg_replace() {
		$args = func_get_args();
		try {
			if ( is_array($args[0]) ) {
				$tmp = array();
				foreach ( $args[0] as $key => $value ) {
					$tmp[$key] = self::getValidPattern( $value );
				}
				$args[0] = $tmp;
			}else{
				$args[0] = self::getValidPattern( $args[0] );
			}
		} catch ( \Exception $exc ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'preg_replace', new \PhpTags\HookException( $exc->getCode(), 'preg_replace(): ' . $exc->getMessage() ) );
		}

		return call_user_func_array( 'preg_replace', $args );
	}

	private static function getValidPattern ( $pattern_value ) {
		$pattern = str_replace( chr(0), '', $pattern_value );
		// Set basic statics
		$regexStarts = '`~!@#$%^&*-_+=.,?"\':;|/<([{';
		$regexEnds   = '`~!@#$%^&*-_+=.,?"\':;|/>)]}';
		$regexModifiers = 'imsxADU';

		$delimPos = strpos( $regexStarts, $pattern[0] );
		if ( $delimPos === false ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'preg_replace', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, wfMessage( 'phptagsfunctions-preg-bad-delimiter' )->text() ) );
		}

		$end = $regexEnds[$delimPos];
		$pos = 1;
		$endPos = null;
		while ( !isset( $endPos ) ) {
			$pos = strpos( $pattern, $end, $pos );
			if ( $pos === false ) {
				return \PhpTags\Hooks::getReturnsOnFailure( 'preg_replace', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, wfMessage( 'phptagsfunctions-preg-no-ending-delimiter', $end )->text() ) );
			}
			$backslashes = 0;
			for ( $l = $pos - 1; $l >= 0; $l-- ) {
				if ( $pattern[$l] == '\\' ) {
					$backslashes++;
				} else {
					break;
				}
			}
			if ( $backslashes % 2 == 0 ) {
				$endPos = $pos;
			}
			$pos++;
		}
		$startRegex = (string)substr( $pattern, 0, $endPos ) . $end;
		$endRegex = (string)substr( $pattern, $endPos + 1 );
		$len = strlen( $endRegex );
		for ( $c = 0; $c < $len; $c++ ) {
			if ( strpos( $regexModifiers, $endRegex[$c] ) === false ) {
				return \PhpTags\Hooks::getReturnsOnFailure( 'preg_replace', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, wfMessage( 'phptagsfunctions-preg-unknown-modifier', $endRegex[$c] )->text() ) );
			}
		}
		return $startRegex . $endRegex;
	}

	public static function f_settype ( &$var, $type ) {
		if ( false === in_array( $type, array( 'boolean', 'bool', 'integer', 'int', 'float', 'double', 'string', 'array', 'object', 'null' ) ) ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'settype', new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_INVALID_TYPE, 'settype()') );
		}
		if ( $var instanceof \PhpTags\GenericObject ) {
			if ( $type === 'object' ) {
				return true;
			}
			return \PhpTags\Hooks::getReturnsOnFailure( 'settype', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_NOTICE, "object  {$var->getName()} could not be converted to $type" ) );
		}
		return settype( $var, $type );
	}

	public static function f_max () {
		$values = func_get_args();
		if ( func_num_args() === 1 && false === is_array( $values[0] ) ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'max', new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array( 'max', 1, 'array', gettype( $values[0] ) ) ) );
		}
		return call_user_func_array( 'max', $values );
	}

	public static function f_min () {
		$values = func_get_args();
		if ( func_num_args() === 1 && false === is_array( $values[0] ) ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'min', new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array( 'min', 1, 'array', gettype( $values[0] ) ) ) );
		}
		return call_user_func_array( 'min', $values );
	}

	public static function f_implode () {
		$values = func_get_args();

		if ( func_num_args() === 1 ) {
			if ( false === is_array( $values[0] ) ) {
				return \PhpTags\Hooks::getReturnsOnFailure( 'implode', new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array( 'implode', 1, 'array', gettype( $values[0] ) ) ) );
			}
		} elseif ( false === is_string( $values[0] ) ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'implode', new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array( 'implode', 1, 'string', gettype( $values[0] ) ) ) );
		}

		return call_user_func_array( 'implode', $values );
	}

	public static function f_mt_rand () {
		switch ( func_num_args() ) {
			case 1:
				return mt_rand( func_get_arg(0), mt_getrandmax() );
			case 2:
				return mt_rand( func_get_arg(0), func_get_arg(1) );
		}
		return mt_rand();
	}

	public static function f_rand () {
		switch ( func_num_args() ) {
			case 1:
				return rand( func_get_arg(0), getrandmax() );
			case 2:
				return rand( func_get_arg(0), func_get_arg(1) );
		}
		return rand();
	}

	/**
	 * Make a string's first character lowercase
	 * @global \Language $wgContLang
	 * @param string $str
	 * @return string
	 */
	public static function f_lcfirst( $str ) {
		global $wgContLang;
		return $wgContLang->lcfirst( $str );
	}

	/**
	 * Make a string's first character uppercase
	 * @global \Language $wgContLang
	 * @param string $str
	 * @return string
	 */
	public static function f_ucfirst( $str ) {
		global $wgContLang;
		return $wgContLang->ucfirst( $str );
	}

	/**
	 * Uppercase the first character of each word in a string
	 * @global \Language $wgContLang
	 * @param string $str
	 * @return string
	 */
	public static function f_ucwords( $str ) {
		global $wgContLang;
		return $wgContLang->ucwords( $str );
	}

	/**
	 * Make a string lowercase
	 * @global \Language $wgContLang
	 * @param string $str
	 * @return string
	 */
	public static function f_strtolower( $str ) {
		global $wgContLang;
		return $wgContLang->lc( $str );
	}

	/**
	 * Make a string uppercase
	 * @global \Language $wgContLang
	 * @param string $str
	 * @return string
	 */
	public static function f_strtoupper( $str ) {
		global $wgContLang;
		return $wgContLang->uc( $str );
	}

	public static function f_levenshtein() {
		$argCount = func_num_args();

		switch ( $argCount ) {
			case 2:
			case 5:
				return call_user_func_array( 'levenshtein', func_get_args() );
		}

		return \PhpTags\Hooks::getReturnsOnFailure( 'levenshtein', new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_EXACTLY_PARAMETER, array( 'levenshtein', '2 or 5', $argCount ) ) );
	}

	public static function f_strtr( $str, $from, $to = null ) {
		switch ( func_num_args() ) {
			case 2:
				if ( is_array( $from ) ) {
					return strtr( $str, $from );
				}
				return \PhpTags\Hooks::getReturnsOnFailure( 'strtr', new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array( 'strtr', 2, 'array', gettype( $from ) ) ) );
			case 3:
				if ( false === is_array( $from ) ) {
					return strtr( $str, (string)$from, $to );
				}
				return \PhpTags\Hooks::getReturnsOnFailure( 'strtr', new \PhpTags\PhpTagsException(	\PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array( 'strtr', 2, 'string', gettype( $from ) ) ) );
		}
	}

	public static function f_array_chunk( $array , $size, $preserve_keys = false ) {
		if ( $size < 1 ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'strtr', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, 'array_chunk(): Size parameter expected to be greater than 0' ) );
		}
		return array_chunk( $array, $size, $preserve_keys );
	}

	public static function f_array_combine( $keys, $values ) {
		$k = count( $keys );
		if ( $k !== count( $values ) ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'strtr', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, 'array_combine(): Both parameters should have an equal number of elements' ) );
		}
		if ( $k === 0 ) { // @todo this is only for compatibility with PHP < 5.4.0
			return array();
		}
		return array_combine( self::mapArrayKeys( $keys ), $values );
	}

	public static function f_array_fill_keys( $keys, $values ) {
		return array_fill_keys( self::mapArrayKeys( $keys ), $values );
	}

	private static function mapArrayKeys( array $array ) {
		return array_map(
				function( $key ) {
					if ( is_array( $key ) ) {
						\PhpTags\Runtime::pushException( new PhpTags\PhpTagsException( PhpTags\PhpTagsException::NOTICE_ARRAY_TO_STRING ) );
						return 'Array';
					} elseif ( $key instanceof \PhpTags\GenericObject ) {
						throw new PhpTags\PhpTagsException( PhpTags\PhpTagsException::FATAL_OBJECT_COULD_NOT_BE_CONVERTED, array($key->getName(), 'string') );
					}
					return $key;
				},
				$array
			);
	}

	public static function f_array_count_values( $array ) {
		return array_count_values( self::filterArrayKeys($array) );
	}

	public static function f_array_flip( $array ) {
		return array_flip( self::filterArrayKeys( $array ) );
	}

	private static function filterArrayKeys( array $array ) {
		return array_filter(
				$array,
				function ( $value ) {
					return is_string($value) || is_int($value) || \PhpTags\Runtime::pushException( new PhpTags\HookException( PhpTags\HookException::EXCEPTION_WARNING, 'array_count_values(): Can only count STRING and INTEGER values!' ) );

				}
			);
	}

	public static function f_array_fill( $start_index , $num , $value ) {
		if ( $num < 1 ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'array_fill', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, 'array_fill(): Number of elements must be positive' ) );
		}
		return array_fill( $start_index , $num , $value );
	}

	public static function f_array_rand( $array, $num = 1 ) {
		if ( $num < 1 || $num > count($array) ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'array_rand', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, 'array_rand(): Second argument has to be between 1 and the number of elements in the array' ) );
		}
		return array_rand( $array, $num );
	}

	public static function f_range( $start, $end, $step = 1 ) {
		if ( is_numeric($start) && is_numeric($end) && abs( $step ) > abs( $start - $end ) ) {
			return \PhpTags\Hooks::getReturnsOnFailure( 'range', new \PhpTags\HookException( \PhpTags\HookException::EXCEPTION_WARNING, 'range(): step exceeds the specified range' ) );
		}
		return range( $start, $end, $step );
	}

	public static function f_compact() {
		return parent::f_compact(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_extract() {
		return parent::f_extract(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_diff_uassoc() { // @todo callback
		return parent::f_array_diff_uassoc(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_diff_ukey() { // @todo callback
		return parent::f_array_diff_ukey(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_filter() { // @todo callback
		return parent::f_array_filter(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_intersect_uassoc() { // @todo callback
		return parent::f_array_intersect_uassoc(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_intersect_ukey() { // @todo callback
		return parent::f_array_intersect_ukey(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_map() { // @todo callback
		return parent::f_array_map(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_reduce() { // @todo callback
		return parent::f_array_reduce(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_udiff_assoc() { // @todo callback
		return parent::f_array_udiff_assoc(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_udiff_uassoc() { // @todo callback
		return parent::f_array_udiff_uassoc(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_udiff() { // @todo callback
		return parent::f_array_udiff(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_uintersect_assoc() { // @todo callback
		return parent::f_array_uintersect_assoc(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_uintersect_uassoc() { // @todo callback
		return parent::f_array_uintersect_uassoc(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_uintersect() { // @todo callback
		return parent::f_array_uintersect(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_walk_recursive() { // @todo callback
		return parent::f_array_walk_recursive(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_array_walk() { // @todo callback
		return parent::f_array_walk(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_uasort() { // @todo callback
		return parent::f_uasort(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_uksort() { // @todo callback
		return parent::f_uksort(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_usort() { // @todo callback
		return parent::f_usort(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_preg_replace_callback() { // @todo callback
		return parent::f_preg_replace_callback(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_is_callable() { // @todo callback
		return parent::f_is_callable(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_setlocale() { // @todo use virtual locale???
		return parent::f_setlocale(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_import_request_variables() {
		return parent::f_import_request_variables(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_unserialize() {
		return parent::f_unserialize(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_fprintf() {
		return parent::f_fprintf(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_eval() {
		return parent::f_eval(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	public static function f_parse_str() {
		return parent::f_parse_str(); // Error message: WARNING_CALLFUNCTION_INVALID_HOOK
	}

	// @todo localeconv

}
