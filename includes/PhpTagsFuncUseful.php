<?php
namespace PhpTagsObjects;

/**
 *
 *
 * @file PhpTagsFuncUseful.php
 * @ingroup PhpTagsFunctions
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */
class PhpTagsFuncUseful extends \PhpTags\GenericObject {

	public static function getConstantValue( $constantName ) {
		switch ( $constantName ) {
			case 'UUID':
				return self::f_uuid_create();
		}
		parent::getConstantValue( $constantName );
	}

	public static function f_uuid_create() {
		if ( function_exists( 'uuid_create' ) ) {
			// create random UUID use PECL uuid extension
			return uuid_create();
		}
		// Alternate creation method from http://aaronsaray.com/blog/2009/01/14/php-and-the-uuid/comment-page-1/#comment-1522
		// May not be as fast or as accurate to specification as php5-uuid
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
				mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
				mt_rand( 0, 0x0fff ) | 0x4000,
				mt_rand( 0, 0x3fff ) | 0x8000,
				mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
			);
	}

	public static function f_mw_json_decode( $value ) {
		return \FormatJson::decode( $value, true );
	}

	public static function f_mw_json_encode( $value ) {
		return \FormatJson::encode( $value, false, \FormatJson::UTF8_OK );
	}

	public static function f_get_arg( $index, $default = null ) {
		$args = self::f_get_args();
		if ( isset( $args[$index] ) || key_exists( $index, $args )) {
			return $args[$index];
		}
		return $default;
	}

	public static function f_get_args() {
		$variables = \PhpTags\Runtime::getVariables();
		$argv = $variables['argv'];
		unset( $argv[0] );
		return $argv;
	}

	public static function f_num_args() {
		$variables = \PhpTags\Runtime::getVariables();
		return $variables['argc'] - 1;
	}

	public static function f_transclude( $template, $parameters = array() ) {
		$parser = \PhpTags\Renderer::getParser();
		$frame = \PhpTags\Renderer::getFrame();
		if ( $frame->depth >= $parser->mOptions->getMaxTemplateDepth() ) {
			throw new \PhpTags\HookException( 'Template depth limit exceeded' );
		}

		if ( $template instanceof \PhpTags\GenericObject ) {
			$title = $template->value;
			if ( false === $title instanceof \Title ) {
				if ( $template->getName() !== 'WTitle' ) {
					throw new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_OBJECT_COULD_NOT_BE_CONVERTED, array($template->getName(), 'WTitle') );
				}
				throw new \PhpTags\HookException( 'Wrong WTitle object', \PhpTags\HookException::EXCEPTION_FATAL );
			}
		} elseif ( is_string( $template  ) ) {
			$title = \Title::newFromText( $template, NS_TEMPLATE );
		} else {
			throw new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array(1, 'string or WTitle', gettype($template))	);
		}

		if ( \MWNamespace::isNonincludable( $title->getNamespace() ) ) {
			throw new \PhpTags\HookException( 'Template inclusion denied' );
		}
		list( $dom, $finalTitle ) = $parser->getTemplateDom( $title );
		if ( $dom === false ) {
			throw new \PhpTags\HookException( "Template \"{$title->getPrefixedText()}\" does not exist" );
		}
		if ( !$frame->loopCheck( $finalTitle ) ) {
			throw new \PhpTags\HookException( 'Template loop detected' );
		}

		foreach ( $parameters as $key => $value ) {
			if ( is_scalar( $value ) ) {
				$parameters[$key] = (string)$value;
				continue;
			}
			throw new \PhpTags\HookException( 'Expects parameter 2 to be array that contains only string values' );
		}

		$fargs = $parser->getPreprocessor()->newPartNodeArray( $parameters );
		$newFrame = $frame->newChild( $fargs, $finalTitle, -1 );
		return $newFrame->expand( $dom );
	}

}
