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

const PHPTAGS_FUNCTIONS_VERSION = '3.5.2';

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

//
$wgHooks['ParserFirstCallInit'][] = 'PhpTagsFunctionsHooks::onParserFirstCallInit';
$wgHooks['PhpTagsRuntimeFirstInit'][] = 'PhpTagsFunctionsHooks::onPhpTagsRuntimeFirstInit';
$wgHooks['UnitTestsList'][] = 'PhpTagsFunctionsHooks::onUnitTestsList';

// Preparing classes for autoloading
$wgAutoloadClasses['PhpTagsFunctionsHooks'] = __DIR__ . '/PhpTagsFunctions.hooks.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFunc'] = __DIR__ . '/includes/PhpTagsFunc.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFuncUseful'] = __DIR__ . '/includes/PhpTagsFuncUseful.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFuncNativeObject'] = __DIR__ . '/includes/PhpTagsFuncNativeObject.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsFuncDatePeriod'] = __DIR__ . '/includes/PhpTagsFuncDatePeriod.php';
$wgAutoloadClasses['PhpTagsObjects\\PhpTagsWebRequest'] = __DIR__ . '/includes/PhpTagsWebRequest.php';

// add parser tests
$wgParserTestFiles[] = __DIR__ . '/tests/parser/PhpTagsFunctionsTests.txt';
