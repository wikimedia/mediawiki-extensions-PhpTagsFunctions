<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhpTagsFuncRef
 *
 * @author pastakhov
 */
class PhpTagsFuncRef extends PhpTagsFunc {

	private static $references = array(
		'array_multisort' => array( 1 => true, 2 => 1, 3 => 1, PHPTAGS_HOOK_VALUE_N => 1 ),
		'array_pop' => true,
		'array_push' => 1,
		'array_shift' => true,
		'array_splice' => 1,
		'array_unshift' => 1,
		'arsort' => 1,
		'asort' => 1,
		'current' => true,
		'each' => true,
		'end' => true,
		'key' => true,
		'krsort' => 1,
		'ksort' => 1,
		'natcasesort' => true,
		'natsort' => true,
		'next' => true,
		'pos' => true,
		'prev' => true,
		'reset' => true,
		'rsort' => true,
		'shuffle' => true,
		'sort' => 1,
		'preg_filter' => 16, // 00001
		'preg_match_all' => 4, // 00100
		'preg_match' => 4, // 00100
		'preg_replace' => 16, // 00001
		'settype' => 1,
	);


	public static function getFunctionReferences( $function_name ) {
		return isset( self::$references[$function_name] ) ? self::$references[$function_name] : false;
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
			throw new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::EXCEPTION_FROM_HOOK, array( 'preg_replace(): ' . $exc->getMessage(), $exc->getCode() ) );
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
					\PhpTags\PhpTagsException::EXCEPTION_WARNING
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
						\PhpTags\PhpTagsException::EXCEPTION_WARNING
					);
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
				throw new Exception(
						wfMessage( 'phptagsfunctions-preg-unknown-modifier', $endRegex[$c] )->text(),
						\PhpTags\PhpTagsException::EXCEPTION_WARNING
					);
			}
		}
		return $startRegex . $endRegex;
	}

	public static function f_settype ( &$var, $type ) {
		if ( $type == 'object' ) {
			return false; // @todo
		}
		return settype( $var, $type );
	}

}
