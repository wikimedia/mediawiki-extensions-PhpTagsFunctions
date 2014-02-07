<?php
/**
 * This class contains a list of supported constants, functions and objects to initialize the runtime of the extension PhpTags
 *
 * @file PhpTagsFunctions.init.php
 * @ingroup PhpTagsFunctions
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */

class PhpTagsFunctionsInit {

	public static function initializeRuntime() {
		\PhpTags\Runtime::setConstantsValue( self::getConstantsValue() );
		\PhpTags\Runtime::setFunctionsHook( 'PhpTagsFunctions', self::getFunctionsName() );
		return true;
	}

	private static function getConstantsValue() {
		return array(
			'PHPTAGS_FUNCTIONS_VERSION' => PHPTAGS_FUNCTIONS_VERSION,
			'PHP_VERSION' => PHP_VERSION,
			'PHP_MAJOR_VERSION' => PHP_MAJOR_VERSION,
			'PHP_MINOR_VERSION' => PHP_MINOR_VERSION,
			'PHP_RELEASE_VERSION' => PHP_RELEASE_VERSION,
			'PHP_INT_MAX' => PHP_INT_MAX,
			'PHP_INT_SIZE' => PHP_INT_SIZE,
			'PHP_OS' => PHP_OS,
			'DATE_ATOM' => DATE_ATOM,
			'DATE_COOKIE' => DATE_COOKIE,
			'DATE_ISO8601' => DATE_ISO8601,
			'DATE_RFC822' => DATE_RFC822,
			'DATE_RFC850' => DATE_RFC850,
			'DATE_RFC1036' => DATE_RFC1036,
			'DATE_RFC1123' => DATE_RFC1123,
			'DATE_RFC2822' => DATE_RFC2822,
			'DATE_RFC3339' => DATE_RFC3339,
			'DATE_RSS' => DATE_RSS,
			'DATE_W3C' => DATE_W3C,
			'CASE_UPPER' => CASE_UPPER,
			'CASE_LOWER' => CASE_LOWER,
			'SORT_ASC' => SORT_ASC,
			'SORT_DESC' => SORT_DESC,
			'SORT_REGULAR' => SORT_REGULAR,
			'SORT_NUMERIC' => SORT_NUMERIC,
			'SORT_STRING' => SORT_STRING,
			'SORT_LOCALE_STRING' => SORT_LOCALE_STRING,
		// @todo	'SORT_NATURAL', // PHP >= 5.4.0
		// @todo	'SORT_FLAG_CASE', // PHP >= 5.4.0
			'COUNT_RECURSIVE' => COUNT_RECURSIVE,
			'CRYPT_STD_DES' => CRYPT_STD_DES,
			'CRYPT_EXT_DES' => CRYPT_EXT_DES,
			'CRYPT_MD5' => CRYPT_MD5,
			'CRYPT_BLOWFISH' => CRYPT_BLOWFISH,
			'CRYPT_SHA256' => CRYPT_SHA256,
			'CRYPT_SHA512' => CRYPT_SHA512,
			'ENT_COMPAT' => ENT_COMPAT,
			'ENT_QUOTES' => ENT_QUOTES,
			'ENT_NOQUOTES' => ENT_NOQUOTES,
		// @todo	'ENT_HTML401', // PHP >= 5.4.0
		// @todo	'ENT_XML1', // PHP >= 5.4.0
		// @todo	'ENT_XHTML', // PHP >= 5.4.0
		// @todo	'ENT_HTML5', // PHP >= 5.4.0
			'ENT_IGNORE' => ENT_IGNORE,
		// @todo	'ENT_SUBSTITUTE', // PHP >= 5.4.0
		// @todo	'ENT_DISALLOWED', // PHP >= 5.4.0
			'STR_PAD_RIGHT' => STR_PAD_RIGHT,
			'STR_PAD_LEFT' => STR_PAD_LEFT,
			'STR_PAD_BOTH' => STR_PAD_BOTH,
			'ABDAY_1' => ABDAY_1,
			'ABDAY_2' => ABDAY_2,
			'ABDAY_3' => ABDAY_3,
			'ABDAY_4' => ABDAY_4,
			'ABDAY_5' => ABDAY_5,
			'ABDAY_6' => ABDAY_6,
			'ABDAY_7' => ABDAY_7,
			'DAY_1' => DAY_1,
			'DAY_2' => DAY_2,
			'DAY_3' => DAY_3,
			'DAY_4' => DAY_4,
			'DAY_5' => DAY_5,
			'DAY_6' => DAY_6,
			'DAY_7' => DAY_7,
			'ABMON_1' => ABMON_1,
			'ABMON_2' => ABMON_2,
			'ABMON_3' => ABMON_3,
			'ABMON_4' => ABMON_4,
			'ABMON_5' => ABMON_5,
			'ABMON_6' => ABMON_6,
			'ABMON_7' => ABMON_7,
			'ABMON_8' => ABMON_8,
			'ABMON_9' => ABMON_9,
			'ABMON_10' => ABMON_10,
			'ABMON_11' => ABMON_11,
			'ABMON_12' => ABMON_12,
			'MON_1' => MON_1,
			'MON_2' => MON_2,
			'MON_3' => MON_3,
			'MON_4' => MON_4,
			'MON_5' => MON_5,
			'MON_6' => MON_6,
			'MON_7' => MON_7,
			'MON_8' => MON_8,
			'MON_9' => MON_9,
			'MON_10' => MON_10,
			'MON_11' => MON_11,
			'MON_12' => MON_12,
			'AM_STR' => AM_STR,
			'PM_STR' => PM_STR,
			'D_T_FMT' => D_T_FMT,
			'D_FMT' => D_FMT,
			'T_FMT' => T_FMT,
			'T_FMT_AMPM' => T_FMT_AMPM,
			'ERA' => ERA,
			//'ERA_YEAR' => ERA_YEAR, @todo it is not defined in PHP
			'ERA_D_T_FMT' => ERA_D_T_FMT,
			'ERA_D_FMT' => ERA_D_FMT,
			'ERA_T_FMT' => ERA_T_FMT,
			/*//'INT_CURR_SYMBOL' => INT_CURR_SYMBOL, @todo it is not defined in PHP
			//'CURRENCY_SYMBOL' => CURRENCY_SYMBOL, @todo it is not defined in PHP
			'CRNCYSTR' => CRNCYSTR,
			//'MON_DECIMAL_POINT' => MON_DECIMAL_POINT, @todo it is not defined in PHP
			//'MON_THOUSANDS_SEP' => MON_THOUSANDS_SEP, @todo it is not defined in PHP
			//'MON_GROUPING' => MON_GROUPING, @todo it is not defined in PHP
			//'POSITIVE_SIGN' => POSITIVE_SIGN, @todo it is not defined in PHP
			//'NEGATIVE_SIGN' => NEGATIVE_SIGN, @todo it is not defined in PHP
			//'INT_FRAC_DIGITS' => INT_FRAC_DIGITS, @todo it is not defined in PHP
			//'FRAC_DIGITS' => FRAC_DIGITS, @todo it is not defined in PHP
			'P_CS_PRECEDES' => P_CS_PRECEDES,
			'P_SEP_BY_SPACE' => P_SEP_BY_SPACE,
			'N_CS_PRECEDES' => N_CS_PRECEDES,
			'N_SEP_BY_SPACE' => N_SEP_BY_SPACE,
			'P_SIGN_POSN' => P_SIGN_POSN,
			'N_SIGN_POSN' => N_SIGN_POSN,
			'DECIMAL_POINT' => DECIMAL_POINT,
			'RADIXCHAR' => RADIXCHAR,
			'THOUSANDS_SEP' => THOUSANDS_SEP,
			'THOUSEP' => THOUSEP,
			'GROUPING' => GROUPING,
			'YESEXPR' => YESEXPR,
			'NOEXPR' => NOEXPR,
			'YESSTR' => YESSTR,
			'NOSTR' => NOSTR,*/
			'CODESET' => CODESET,
			// @see http://www.php.net/manual/en/math.constants.php
			'M_PI' => M_PI,
			'M_E' => M_E,
			'M_LOG2E' => M_LOG2E,
			'M_LOG10E' => M_LOG10E,
			'M_LN2' => M_LN2,
			'M_LN10' => M_LN10,
			'M_PI_2' => M_PI_2,
			'M_PI_4' => M_PI_4,
			'M_1_PI' => M_1_PI,
			'M_2_PI' => M_2_PI,
			'M_SQRTPI' => M_SQRTPI,
			'M_2_SQRTPI' => M_2_SQRTPI,
			'M_SQRT2' => M_SQRT2,
			'M_SQRT3' => M_SQRT3,
			'M_SQRT1_2' => M_SQRT1_2,
			'M_LNPI' => M_LNPI,
			'M_EULER' => M_EULER,
			'PHP_ROUND_HALF_UP' => PHP_ROUND_HALF_UP,
			'PHP_ROUND_HALF_DOWN' => PHP_ROUND_HALF_DOWN,
			'PHP_ROUND_HALF_EVEN' => PHP_ROUND_HALF_EVEN,
			'PHP_ROUND_HALF_ODD' => PHP_ROUND_HALF_ODD,
			'NAN' => NAN,
			'INF' => INF,
			// @see http://www.php.net/manual/en/pcre.constants.php
			'PREG_PATTERN_ORDER' => PREG_PATTERN_ORDER,
			'PREG_SET_ORDER' => PREG_SET_ORDER,
			'PREG_OFFSET_CAPTURE' => PREG_OFFSET_CAPTURE,
			'PREG_SPLIT_NO_EMPTY' => PREG_SPLIT_NO_EMPTY,
			'PREG_SPLIT_DELIM_CAPTURE' => PREG_SPLIT_DELIM_CAPTURE,
			'PREG_SPLIT_OFFSET_CAPTURE' => PREG_SPLIT_OFFSET_CAPTURE,
			'PREG_NO_ERROR' => PREG_NO_ERROR,
			'PREG_INTERNAL_ERROR' => PREG_INTERNAL_ERROR,
			'PREG_BACKTRACK_LIMIT_ERROR' => PREG_BACKTRACK_LIMIT_ERROR,
			'PREG_RECURSION_LIMIT_ERROR' => PREG_RECURSION_LIMIT_ERROR,
			'PREG_BAD_UTF8_ERROR' => PREG_BAD_UTF8_ERROR,
			'PREG_BAD_UTF8_OFFSET_ERROR' => PREG_BAD_UTF8_OFFSET_ERROR,
			'PCRE_VERSION' => PCRE_VERSION,
			'PREG_GREP_INVERT' => PREG_GREP_INVERT,
		);
	}

	private static function getFunctionsName() {
		return array(
			// Array Functions
			// @see http://www.php.net/manual/en/ref.array.php
			'array_change_key_case',
			'array_chunk',
			// 'array_column', @todo (PHP 5 >= 5.5.0)
			'array_combine',
			'array_count_values',
			'array_diff_assoc',
			'array_diff_key',
			// 'array_diff_uassoc', @todo callback
			// 'array_diff_ukey', @todo callback
			'array_diff',
			'array_fill_keys',
			'array_fill',
			// 'array_filter', @todo callback
			'array_flip',
			'array_intersect_assoc',
			'array_intersect_key',
			// 'array_intersect_uassoc', @todo callback
			// 'array_intersect_ukey', @todo callback
			'array_intersect',
			'array_key_exists',
			'array_keys',
			// 'array_map', @todo callback
			'array_merge_recursive',
			'array_merge',
			'array_multisort',
			'array_pad',
			'array_pop',
			'array_product',
			'array_push',
			'array_rand',
			// 'array_reduce', @todo callback
			'array_replace_recursive',
			'array_replace',
			'array_reverse',
			'array_search',
			'array_shift',
			'array_slice',
			'array_splice',
			'array_sum',
			// 'array_udiff_assoc', @todo callback
			// 'array_udiff_uassoc', @todo callback
			// 'array_udiff', @todo callback
			// 'array_uintersect_assoc', @todo callback
			// 'array_uintersect_uassoc', @todo callback
			// 'array_uintersect', @todo callback
			'array_unique',
			'array_unshift',
			'array_values',
			// 'array_walk_recursive', @todo callback
			// 'array_walk', @todo callback
			'arsort',
			'asort',
			// 'compact', @todo variables
			'count',
			'current',
			'each',
			'end',
			// 'extract', @todo does it need really for someone?
			'in_array',
			'key_exists',
			'key',
			'krsort',
			'ksort',
			// 'list', implemented in the runtime
			'natcasesort',
			'natsort',
			'next',
			'pos',
			'prev',
			'range',
			'reset',
			'rsort',
			'shuffle',
			// 'sizeof',
			'sort',
			// 'uasort', @todo callback
			// 'uksort', @todo callback
			// 'usort', @todo callback

			// PCRE Functions
			// @see http://www.php.net/manual/en/ref.pcre.php
			'preg_filter',
			'preg_grep',
			'preg_last_error',
			'preg_match_all',
			'preg_match',
			'preg_quote',
			// 'preg_replace_callback', @todo callback
			'preg_replace',
			'preg_split',

			// Math Functions
			// @see http://www.php.net/manual/en/ref.math.php
			'abs',
			'acos',
			'acosh',
			'asin',
			'asinh',
			'atan2',
			'atan',
			'atanh',
			'base_convert',
			'bindec',
			'ceil',
			'cos',
			'cosh',
			'decbin',
			'dechex',
			'decoct',
			'deg2rad',
			'exp',
			'expm1',
			'floor',
			'fmod',
			'getrandmax',
			'hexdec',
			'hypot',
			'is_finite',
			'is_infinite',
			'is_nan',
			'lcg_value',
			'log10',
			'log1p',
			'log',
			'max', // @todo max(8) PHP Warning:  min(): When only one parameter is given, it must be an array
			'min', // @todo min(8) PHP Warning:  min(): When only one parameter is given, it must be an array
			'mt_getrandmax',
			'mt_rand',
			'mt_srand',
			'octdec',
			'pi',
			'pow',
			'rad2deg',
			'rand',
			'round',
			'sin',
			'sinh',
			'sqrt',
			'srand',
			'tan',
			'tanh',



			'print_r',
			'var_dump',
			'var_export',
		);
	}

}
