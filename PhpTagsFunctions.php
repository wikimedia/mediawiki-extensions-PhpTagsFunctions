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

if ( !defined( 'PHPTAGS_VERSION' ) ) {
	die( 'ERROR: The <a href="https://www.mediawiki.org/wiki/Extension:PhpTags">extension PhpTags</a> must be installed for the extension PhpTags Functions to run!' );
}

$needVersion = '2.0.1';
if ( version_compare( PHPTAGS_VERSION, $needVersion, '<' ) ) {
	die(
		'<b>Error:</b> This version of extension PhpTags Functions needs <a href="https://www.mediawiki.org/wiki/Extension:PhpTags">PhpTags</a> ' . $needVersion . ' or later.
		You are currently using version ' . PHPTAGS_VERSION . '.<br />'
	);
}

if ( PHPTAGS_HOOK_RELEASE != 3 ) {
	die (
			'<b>Error:</b> This version of extension PhpTags Functions is not compatible to current version of extension PhpTags.'
	);
}

define( 'PHPTAGS_FUNCTIONS_VERSION' , '3.1.1' );

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
$wgMessagesDirs['PhpTagsFunctions'] =			__DIR__ . '/i18n';
$wgExtensionMessagesFiles['PhpTagsFunctions'] =	__DIR__ . '/PhpTagsFunctions.i18n.php';

// Specify the function that will initialize the parser function.
/**
 * @codeCoverageIgnore
 */
$wgHooks['PhpTagsRuntimeFirstInit'][] = 'PhpTagsFunctionsInit::initializeRuntime';

// Preparing classes for autoloading
$wgAutoloadClasses['PhpTagsFunctionsInit']	= __DIR__ . '/PhpTagsFunctions.init.php';
$wgAutoloadClasses['PhpTagsFunc']			= __DIR__ . '/includes/PhpTagsFunc.php';
$wgAutoloadClasses['PhpTagsFuncRef']		= __DIR__ . '/includes/PhpTagsFuncRef.php';
$wgAutoloadClasses['PhpTagsFuncUseful']		= __DIR__ . '/includes/PhpTagsFuncUseful.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFuncNativeObject']	= __DIR__ . '/includes/PhpTagsFuncNativeObject.php';

/**
 * Add files to phpunit test
 * @codeCoverageIgnore
 */
$wgHooks['UnitTestsList'][] = function ( &$files ) {
	$testDir = __DIR__ . '/tests/phpunit';
	$files = array_merge( $files, glob( "$testDir/*Test.php" ) );
	return true;
};
