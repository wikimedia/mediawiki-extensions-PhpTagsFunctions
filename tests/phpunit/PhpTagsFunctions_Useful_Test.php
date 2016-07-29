<?php
namespace PhpTags;

class PhpTagsFunctions_Useful_Test extends \PHPUnit_Framework_TestCase {

	public function testRun_constant_1() {
		$this->assertEquals(
				Runtime::runSource('echo strlen( UUID );'),
				array( '36' )
			);
	}

	public function testRun_constant_2() {
		$this->assertEquals(
				Runtime::runSource('echo PHPTAGS_FUNCTIONS_VERSION;'),
				array( \ExtensionRegistry::getInstance()->getAllThings()['PhpTags Functions']['version'] )
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

	public function testRun_get_args_1() {
		$this->assertEquals(
				Runtime::runSource( '$tmp = get_args(); echo $tmp[1], $tmp["foo"];', array( 'TestPage', 'one', 'foo'=>'bar' ) ),
				array('one', 'bar')
				);
	}
	public function testRun_get_args_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo implode( ", ", get_args() );', array( 'TestPage', 'one', 'foo'=>'bar' ) ),
				array('one, bar')
				);
	}
	public function testRun_get_arg_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo get_arg( 1 ), get_arg( "foo" ), get_arg( "bar", "not defined" );', array( 'TestPage', 'one', 'foo'=>'bar' ) ),
				array('one', 'bar', 'not defined')
				);
	}
	public function testRun_num_args_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo num_args(), $argc;', array( 'TestPage', 'one', 'foo'=>'bar' ) ),
				array('2', '3')
				);
	}

}
