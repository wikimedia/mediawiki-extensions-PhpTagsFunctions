<?php
namespace PhpTags;

class PhpTagsFunctions_String_Test extends \PHPUnit_Framework_TestCase {

	public function testRun_constant_1() {
		$this->assertEquals(
				Runtime::runSource('echo CRYPT_SALT_LENGTH;'),
				array(CRYPT_SALT_LENGTH)
				);
	}

	public function testRun_printf_exception_1() {
		$this->assertEquals(
				Runtime::runSource('sprintf();', array('Page') ),
				array( new \PhpTags\PhpTagsException( PHPTAGS_EXCEPTION_WARNING_EXPECTS_AT_LEAST_PARAMETER, array('sprintf', 1, 0), 1, 'Page' ) )
			);
	}
	public function testRun_printf_exception_2() {
		$this->assertEquals(
				Runtime::runSource('sprintf("%d обезьян сидят на %s", new DateTime(), "дереве");', array('Page') ),
				array( new \PhpTags\PhpTagsException( PHPTAGS_EXCEPTION_NOTICE_OBJECT_CONVERTED, array('DateTime', 'int'), 1, 'Page' ) )
			);
	}

}
