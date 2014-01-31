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
			'ERA_YEAR' => ERA_YEAR,
			'ERA_D_T_FMT' => ERA_D_T_FMT,
			'ERA_D_FMT' => ERA_D_FMT,
			'ERA_T_FMT' => ERA_T_FMT,
			'INT_CURR_SYMBOL' => INT_CURR_SYMBOL,
			'CURRENCY_SYMBOL' => CURRENCY_SYMBOL,
			'CRNCYSTR' => CRNCYSTR,
			'MON_DECIMAL_POINT' => MON_DECIMAL_POINT,
			'MON_THOUSANDS_SEP' => MON_THOUSANDS_SEP,
			'MON_GROUPING' => MON_GROUPING,
			'POSITIVE_SIGN' => POSITIVE_SIGN,
			'NEGATIVE_SIGN' => NEGATIVE_SIGN,
			'INT_FRAC_DIGITS' => INT_FRAC_DIGITS,
			'FRAC_DIGITS' => FRAC_DIGITS,
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
			'NOSTR' => NOSTR,
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
		);
	}

	private static function getFunctionsName() {
		return array(
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

			'count',
			'current',
			'next',

			'print_r',
			'var_export',
		);
	}

}
