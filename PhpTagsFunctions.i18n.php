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

/** Message documentation (Message documentation)
 * @author Shirayuki
 * @author pastakhov
 */
$messages['qqq'] = array(
	'phptagsfunctions-desc' => '{{desc|name=PhpTagsFunctions|url=http://www.mediawiki.org/wiki/Extension:PhpTags_Functions}}',
	'phptagsfunctions-preg-bad-delimiter' => 'The error message.

Valid delimiters are <code><nowiki>`~!@#$%^&*-_+=.,?"\':;|/<([{</nowiki></code>',
	'phptagsfunctions-preg-no-ending-delimiter' => 'The error message, Parameters:
* $1 - expected delimiter character. any one of the following characters: <code><nowiki>`~!@#$%^&*-_+=.,?"\':;|/>)]}</nowiki></code>',
	'phptagsfunctions-preg-unknown-modifier' => 'The error message, Parameters:
* $1 - modifier. Valid modifiers are: i, m, s, x, A, D, U',
);

/** German (Deutsch)
 * @author Metalhead64
 */
$messages['de'] = array(
	'phptagsfunctions-desc' => 'Implementiert die internen Funktionen von nativem PHP für die Erweiterung PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'Das Trennzeichen darf nicht alphanumerisch oder kein Backslash sein.',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Kein Schlusstrennzeichen „$1“ gefunden',
	'phptagsfunctions-preg-unknown-modifier' => 'Unbekannter Modifikator „$1“',
);

/** French (français)
 * @author Dr Brains
 * @author Gomoko
 */
$messages['fr'] = array(
	'phptagsfunctions-desc' => 'Implémente les fonctions PHP internes natives pour l’extension PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'Le délimiteur ne doit pas être alphanumérique ou une barre oblique inversée',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Aucun délimiteur de fin « $1 » trouvé',
	'phptagsfunctions-preg-unknown-modifier' => 'Modificateur « $1 » inconnu',
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'phptagsfunctions-desc' => 'Inclúe as funcións internas do PHP nativo para a extensión PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'O delimitador non pode ser un carácter alfanumérico nin unha barra invertida',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Non se atopou o delimitador de fin "$1"',
	'phptagsfunctions-preg-unknown-modifier' => 'Descoñécese o modificador "$1"',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'phptagsfunctions-desc' => 'PhpTags 拡張機能用のネイティブ PHP の内部関数を実装する',
	'phptagsfunctions-preg-bad-delimiter' => '区切り文字には英数字やバックスラッシュは使用できません',
	'phptagsfunctions-preg-no-ending-delimiter' => '終了の区切り文字「$1」が見つかりません',
	'phptagsfunctions-preg-unknown-modifier' => '不明な修飾子「$1」',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'phptagsfunctions-desc' => 'Ги воведува внатрешните функции на матичниот PHP за додатокот PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'Разграничувачот не може да биде азбучнобројчен или надесна коса црта',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Не пронајдов завршен разграничувач „$1“',
	'phptagsfunctions-preg-unknown-modifier' => 'Непознат изменител „$1“',
);

/** Portuguese (português)
 * @author Imperadeiro98
 */
$messages['pt'] = array(
	'phptagsfunctions-desc' => 'Implementa as funções internas do PHP nativo na extensão PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'O delimitador não deve ser alfanumérico nem a barra invertida',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Nenhum delimitador final "$1" encontrado',
	'phptagsfunctions-preg-unknown-modifier' => 'Modificador desconhecido "$1"',
);

/** Russian (русский)
 * @author Okras
 */
$messages['ru'] = array(
	'phptagsfunctions-desc' => 'Реализует внутренние функции PHP для расширения PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'Разделитель не должен быть буквенно-цифровым символом или обратной косой чертой',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Не найден символ конца строки «$1»',
	'phptagsfunctions-preg-unknown-modifier' => 'Неизвестный модификатор «$1»',
);

/** Ukrainian (українська)
 * @author Ата
 */
$messages['uk'] = array(
	'phptagsfunctions-desc' => 'Реалізує внутрішні функції рідного PHP для розширення PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'Роздільник не повинен бути буквенно-цифровим символом чи оберненою косою рискою',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Не знайдено символа кінця рядка «$1»',
	'phptagsfunctions-preg-unknown-modifier' => 'Невідомий модифікатор «$1»',
);
