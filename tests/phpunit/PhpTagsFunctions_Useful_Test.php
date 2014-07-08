<?php
namespace PhpTags;

class PhpTagsFunctions_Useful_Test extends \PHPUnit_Framework_TestCase {

	public function testRun_constant_1() {
		$this->assertEquals(
				Runtime::runSource('echo strlen( UUID );'),
				array( '36' )
			);
	}

	public function testRun_uuid_create_1() {
		$this->assertEquals(
				Runtime::runSource('echo strlen( uuid_create() );'),
				array('36')
				);
	}

}
