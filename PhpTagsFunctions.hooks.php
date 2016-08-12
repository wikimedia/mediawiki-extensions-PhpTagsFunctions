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
	 * Check on version compatibility
	 * @return boolean
	 */
	public static function onParserFirstCallInit() {
		$extRegistry = ExtensionRegistry::getInstance();
		$phpTagsLoaded = $extRegistry->isLoaded( 'PhpTags' );
		//if ( !$extRegistry->isLoaded( 'PhpTags' ) ) { use PHPTAGS_VERSION for backward compatibility
		if ( !($phpTagsLoaded || defined( 'PHPTAGS_VERSION' )) ) {
			throw new MWException( "\n\nYou need to have the PhpTags extension installed in order to use the PhpTags Functions extension." );
		}
		if ( $phpTagsLoaded ) {
			$neededVersion = '5.9';
			$phpTagsVersion = $extRegistry->getAllThings()['PhpTags']['version'];
			if ( version_compare( $phpTagsVersion, $neededVersion, '<' ) ) {
				throw new MWException( "\n\nThis version of the PhpTags Functions extension requires the PhpTags extension $neededVersion or above.\n You have $phpTagsVersion. Please update it." );
			}
		}
		if ( !$phpTagsLoaded || PHPTAGS_HOOK_RELEASE != 8 ) {
			throw new MWException( "\n\nThis version of the PhpTags Functions extension is outdated and not compatible with current version of the PhpTags extension.\n Please update it." );
		}
		return true;
	}

	/**
	 *
	 * @return boolean
	 */
	public static function onPhpTagsRuntimeFirstInit() {
		$version = ExtensionRegistry::getInstance()->getAllThings()['PhpTags Functions']['version'];
		\PhpTags\Hooks::addJsonFile( __DIR__ . '/PhpTagsFunctions.json', $version . PHP_VERSION );
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
