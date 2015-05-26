<?php
/**
 * Main entry point for the PhpTags Functions extension.
 *
 * @link https://www.mediawiki.org/wiki/Extension:PhpTags_Functions Documentation
 * @file PhpTagsFunctions.php
 * @defgroup PhpTags
 * @ingroup Extensions
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */

// Check to see if we are being called as an extension or directly
if ( !defined('MEDIAWIKI') ) {
	die( 'This file is an extension to MediaWiki and thus not a valid entry point.' );
}

const PHPTAGS_FUNCTIONS_VERSION = '3.5.0';

// Register this extension on Special:Version
$wgExtensionCredits['phptags'][] = array(
	'path'				=> __FILE__,
	'name'				=> 'PhpTags Functions',
	'version'			=> PHPTAGS_FUNCTIONS_VERSION,
	'url'				=> 'https://www.mediawiki.org/wiki/Extension:PhpTags_Functions',
	'author'			=> '[https://www.mediawiki.org/wiki/User:Pastakhov Pavel Astakhov]',
	'descriptionmsg'	=> 'phptagsfunctions-desc'
);

// Allow translations for this extension
$wgMessagesDirs['PhpTagsFunctions'] = __DIR__ . '/i18n';

/**
 * @codeCoverageIgnore
 */
$wgHooks['ParserFirstCallInit'][] = function() {
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
};

/**
 * @codeCoverageIgnore
 */
$wgHooks['PhpTagsRuntimeFirstInit'][] = function() {
	\PhpTags\Hooks::addJsonFile( __DIR__ . '/PhpTagsFunctions.json', PHPTAGS_FUNCTIONS_VERSION );
};

// Preparing classes for autoloading
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFunc'] = __DIR__ . '/includes/PhpTagsFunc.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFuncUseful'] = __DIR__ . '/includes/PhpTagsFuncUseful.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFuncNativeObject'] = __DIR__ . '/includes/PhpTagsFuncNativeObject.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFuncDatePeriod'] = __DIR__ . '/includes/PhpTagsFuncDatePeriod.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsWebRequest'] = __DIR__ . '/includes/PhpTagsWebRequest.php';

/**
 * Add files to phpunit test
 * @codeCoverageIgnore
 */
$wgHooks['UnitTestsList'][] = function ( &$files ) {
	$testDir = __DIR__ . '/tests/phpunit';
	$files = array_merge( $files, glob( "$testDir/*Test.php" ) );
	return true;
};

$wgParserTestFiles[] = __DIR__ . '/tests/parser/PhpTagsFunctionsTests.txt';
