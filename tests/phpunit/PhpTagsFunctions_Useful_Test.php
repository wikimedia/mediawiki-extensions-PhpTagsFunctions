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

	public function testRun_uuid_mw_json_encode_1() {
		$this->assertEquals(
				Runtime::runSource('echo mw_json_encode( ["foo"=>"bar"] );'),
				array('{"foo":"bar"}')
				);
	}

	public function testRun_uuid_mw_json_decode_1() {
		$this->assertEquals(
				Runtime::runSource('echo ["foo"=>"bar"] == mw_json_decode( "{\"foo\":\"bar\"}" ) ? "true" : "false";'),
				array('true')
				);
	}

}
