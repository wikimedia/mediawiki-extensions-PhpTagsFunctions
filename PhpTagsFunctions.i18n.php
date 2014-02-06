<?php
/**
 * Internationalization file for the extension PhpTags Functions.
 *
 * @file PhpTags.i18n.php
 * @ingroup PhpTags
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 */
$messages = array();

/** English
 * @author pastakhov
 */
$messages['en'] = array(
	'phptagsfunctions-desc' => 'Implements the internal functions of native PHP for the extension PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'Delimiter must not be alphanumeric or backslash',
	'phptagsfunctions-preg-no-ending-delimiter' => 'No ending delimiter "$1" found',
	'phptagsfunctions-preg-unknown-modifier' => 'Unknown modifier "$1"',
);

/** Message documentation
 * @author pastakhov
 */
$messages['qqq'] = array(
	'phptagsfunctions-desc' => '{{desc|name=PhpTagsFunctions|url=http://www.mediawiki.org/wiki/Extension:PhpTags_Functions}}',
	'phptagsfunctions-preg-bad-delimiter' => 'The error message',
	'phptagsfunctions-preg-no-ending-delimiter' => 'The error message, Parameters:
* $1 - expected delimiter character',
	'phptagsfunctions-preg-unknown-modifier' => 'The error message, Parameters:
* $1 - modifier',
);
