<?php
namespace PhpTagsObjects;

/**
 * PhpTagsWebRequest is wrapper of WebRequest class
 *
 * @author pastakhov
 */
class PhpTagsWebRequest extends \PhpTags\GenericObject {

	public static function checkArguments( $object, $method, $arguments, $expects = false ) {
		switch ( $method ) {
			case 'getval':
			case 'getint':
			case 'getbool':
			case 'getarray':
			case 'getcookie':
			case 'gettext':
				$expects = array(
					\PhpTags\Hooks::TYPE_STRING,
					\PhpTags\Hooks::TYPE_MIXED,
					\PhpTags\Hooks::EXPECTS_MINIMUM_PARAMETERS => 1,
					\PhpTags\Hooks::EXPECTS_MAXIMUM_PARAMETERS => 2,
				);
				break;
			case 'getcheck':
				$expects = array(
					\PhpTags\Hooks::TYPE_STRING,
					\PhpTags\Hooks::EXPECTS_EXACTLY_PARAMETERS => 1,
				);
				break;
			case 'wasposted':
				$expects = array(
					\PhpTags\Hooks::EXPECTS_EXACTLY_PARAMETERS => 0,
				);
				break;
		}
		return parent::checkArguments( $object, $method, $arguments, $expects );
	}

	/**
	 * Get a scalar or null if the parameter was not passed
	 * @global \WebRequest $wgRequest
	 */
	public static function s_getVal( $name, $default = null ) {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->getVal( $name, $default );
	}

	/**
	 * Fetch a text string from the given array or return $default if it's not
	 * set. Carriage returns are stripped from the text, and with some language
	 * modules there is an input transliteration applied. This should generally
	 * be used for form "<textarea>" and "<input>" fields. Used for
	 * user-supplied freeform text input (for which input transformations may
	 * be required - e.g.  Esperanto x-coding).
	 */
	public static function s_getText( $name, $default = '' ) {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->getText( $name, $default );
	}

	/**
	 * Get an integer or 0 if the parameter was not passed
	 * @global \WebRequest $wgRequest
	 */
	public static function s_getInt( $name, $default = 0 ) {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->getInt( $name, $default );
	}

	/**
	 * Get a boolean or false if the parameter was not passed
	 * @global \WebRequest $wgRequest
	 */
	public static function s_getBool( $name, $default = false ) {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->getBool( $name, $default );
	}

	/**
	 * Get an array or null if the parameter was not passed.
	 * If the parameter is a scalar, it will return an array with a single element.
	 * @global \WebRequest $wgRequest
	 */
	public static function s_getArray( $name, $default = null ) {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->getArray( $name, $default );
	}

	/**
	 * Return a boolean whether the parameter was passed, this is useful for checkboxes.
	 * @global \WebRequest $wgRequest
	 */
	public static function s_getCheck( $name ) {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->getCheck( $name );
	}

	/**
	 * Returns a bool whether the request was posted
	 * @global \WebRequest $wgRequest
	 */
	public static function s_wasPosted() {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->wasPosted();
	}

	/**
	 * Get a cookie from the $_COOKIE jar
	 * @global \WebRequest $wgRequest
	 */
	public static function s_getCookie( $key, $default = null ) {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		return $wgRequest->getCookie( $key, 'ext.phptags.', $default );
	}

	/**
	 * Extracts the given named values into an array.
	 * If no arguments are given, returns all input values.
	 * @global \WebRequest $wgRequest
	 */
	public static function s_getValues() {
		global $wgRequest;
		\PhpTags\Runtime::disableParserCache();
		$names = func_get_args();
		array_walk( $names, function( &$value ){ if ( !is_string($value) ) { $value = ''; } } );
		return call_user_func_array( array($wgRequest, 'getValues'), $names );
	}

}
