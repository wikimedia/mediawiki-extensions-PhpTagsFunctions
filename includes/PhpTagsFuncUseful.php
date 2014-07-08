<?php

/**
 *
 *
 * @file PhpTagsFuncUseful.php
 * @ingroup PhpTagsFunctions
 * @author Pavel Astakhov <pastakhov@yandex.ru>
 * @licence GNU General Public Licence 2.0 or later
 */
class PhpTagsFuncUseful extends PhpTags\GenericFunction {

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
}
