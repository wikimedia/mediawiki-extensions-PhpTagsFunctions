<?php


/**
 * PhpTags Functions MediaWiki Hooks.
 *
 * @file PhpTagsFunctions.hooks.php
 * @ingroup PhpTags
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */
class PhpTagsFunctionsHooks {

	/**
	 *
	 * @return boolean
	 */
	public static function onParserFirstCallInit() {
		if ( !defined( 'PHPTAGS_VERSION' ) ) {
			throw new MWException( "\n\nYou need to have the PhpTags extension installed in order to use the PhpTags Functions extension." );
		}
		$needVersion = '5.1.0';
		if ( version_compare( PHPTAGS_VERSION, $needVersion, '<' ) ) {
			throw new MWException( "\n\nThis version of the PhpTags Functions extension requires the PhpTags extension $needVersion or above.\n You have " . PHPTAGS_VERSION . ". Please update it." );
		}
		if ( PHPTAGS_HOOK_RELEASE != 8 ) {
			throw new MWException( "\n\nThis version of the PhpTags Functions extension is outdated and not compatible with current version of the PhpTags extension.\n Please update it." );
		}
		return true;
	}

	/**
	 *
	 * @return boolean
	 */
	public static function onPhpTagsRuntimeFirstInit() {
		\PhpTags\Hooks::addJsonFile( __DIR__ . '/PhpTagsFunctions.json', PHPTAGS_FUNCTIONS_VERSION );
		return true;
	}

	/**
	 *
	 * @param array $files
	 * @return boolean
	 */
	public static function onUnitTestsList( &$files ) {
		$testDir = __DIR__ . '/tests/phpunit';
		$files = array_merge( $files, glob( "$testDir/*Test.php" ) );
		return true;
	}

}