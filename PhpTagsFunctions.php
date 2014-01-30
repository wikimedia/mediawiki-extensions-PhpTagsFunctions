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

define( 'PHPTAGS_FUNCTIONS_VERSION' , '1.0.0' );

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
$wgExtensionMessagesFiles['PhpTagsFunctions'] =	__DIR__ . '/PhpTagsFunctions.i18n.php';

// Specify the function that will initialize the parser function.
/**
 * @codeCoverageIgnore
 */
$wgHooks['PhpTagsRuntimeFirstInit'][] = 'PhpTagsFunctionsInit::initializeRuntime';

// Preparing classes for autoloading
$wgAutoloadClasses['PhpTagsFunctions']		= __DIR__ . '/PhpTagsFunctions.class.php';
$wgAutoloadClasses['PhpTagsFunctionsInit']	= __DIR__ . '/PhpTagsFunctions.init.php';

/**
 * Add files to phpunit test
 * @codeCoverageIgnore
 */
$wgHooks['UnitTestsList'][] = function ( &$files ) {
	$testDir = __DIR__ . '/tests/phpunit';
	$files = array_merge( $files, glob( "$testDir/*Test.php" ) );
	return true;
};
