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

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'phptagsfunctions-desc' => 'Encadarma les funciones internes del PHP nativu pa la estensión PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'El delimitador nun pue ser un caráuter alfanumbéricu nin una barra invertida',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Nun s\'alcontró nengún delimitador final "$1"',
	'phptagsfunctions-preg-unknown-modifier' => 'Modificador desconocíu "$1"',
);

/** Chechen (нохчийн)
 * @author Умар
 */
$messages['ce'] = array(
	'phptagsfunctions-preg-no-ending-delimiter' => 'МогӀан «$1» юьхьигера символ цакарий',
	'phptagsfunctions-preg-unknown-modifier' => 'Йоьвзуш йоцу модификатор «$1»',
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

/** Spanish (español)
 * @author Fitoschido
 */
$messages['es'] = array(
	'phptagsfunctions-desc' => 'Implementa las funciones internas del PHP nativo para la extensión PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'El delimitador no debe ser un carácter alfanumérico o una barra inversa',
	'phptagsfunctions-preg-no-ending-delimiter' => 'No se encontró el delimitador final «$1»',
	'phptagsfunctions-preg-unknown-modifier' => 'El modificador «$1» es desconocido',
);

/** Persian (فارسی)
 * @author Armin1392
 */
$messages['fa'] = array(
	'phptagsfunctions-desc' => 'انجام عملیات داخلی پی‌اچ‌پی بومی برای توسعهٔ تگ‌های‌پی‌اچ‌پی',
	'phptagsfunctions-preg-bad-delimiter' => 'محدودکننده نباید الفبایی یا ممیزی باشد',
	'phptagsfunctions-preg-no-ending-delimiter' => 'هیچ پایان حائل " $1 " پیدا نشد',
	'phptagsfunctions-preg-unknown-modifier' => 'تعدیل‌کنندهٔ ناشناختهٔ "$1"',
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

/** Korean (한국어)
 * @author Priviet
 */
$messages['ko'] = array(
	'phptagsfunctions-desc' => '확장 PhpTags를 위한 native PHP 내부 함수를 구현',
	'phptagsfunctions-preg-bad-delimiter' => '구분 기호는 알파벳, 숫자, 백슬래시가 아니여야 합니다',
	'phptagsfunctions-preg-no-ending-delimiter' => '"$1" 끝 구분 기호를 찾을 수 없습니다',
	'phptagsfunctions-preg-unknown-modifier' => '알 수 없는 수식어 "$1"',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'phptagsfunctions-preg-bad-delimiter' => "Trennzeechen däerf net alphanumeeresch oder e 'Backslash' sinn",
	'phptagsfunctions-preg-no-ending-delimiter' => 'Kee Schlusstrennzeechen "$1" fonnt',
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

/** Polish (polski)
 * @author Chrumps
 */
$messages['pl'] = array(
	'phptagsfunctions-desc' => 'Realizuje funkcje wewnętrzne PHP dla rozszerzenia PhpTags',
	'phptagsfunctions-preg-unknown-modifier' => 'Nieznany modyfikator "$1"',
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

/** Scots (Scots)
 * @author John Reid
 */
$messages['sco'] = array(
	'phptagsfunctions-desc' => 'Implements the internal functions o native PHP fer the extension PhpTags',
	'phptagsfunctions-preg-bad-delimiter' => 'Delimiter maunna be alphanumeric or backslash',
	'phptagsfunctions-preg-no-ending-delimiter' => 'No ending delimiter "$1" foond',
	'phptagsfunctions-preg-unknown-modifier' => 'Onken\'t modifier "$1"',
);

/** Swedish (svenska)
 * @author WikiPhoenix
 */
$messages['sv'] = array(
	'phptagsfunctions-preg-bad-delimiter' => 'Avgränsningstecknet måste inte vara alfanumeriskt eller ett omvänt snedstreck',
	'phptagsfunctions-preg-no-ending-delimiter' => 'Inget avslutande avgränsningstecken "$1" hittades',
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

/** Simplified Chinese (中文（简体）‎)
 * @author Liuxinyu970226
 */
$messages['zh-hans'] = array(
	'phptagsfunctions-desc' => '实现用于PhpTags的本地PHP内部功能',
	'phptagsfunctions-preg-bad-delimiter' => '分隔符不得为字母、数字或反斜杠',
	'phptagsfunctions-preg-no-ending-delimiter' => '未找到结束分隔符“$1”',
	'phptagsfunctions-preg-unknown-modifier' => '未知修饰符“$1”',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Liuxinyu970226
 */
$messages['zh-hant'] = array(
	'phptagsfunctions-desc' => '實現用於PhpTags的本地PHP功能',
	'phptagsfunctions-preg-bad-delimiter' => '分割位元不可為字母、數位或反斜線',
	'phptagsfunctions-preg-no-ending-delimiter' => '並無找到分割位元“$1”',
	'phptagsfunctions-preg-unknown-modifier' => '未知修飾符“$1”',
);
