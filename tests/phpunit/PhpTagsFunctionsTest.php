<?php
namespace PhpTags;

class PhpTagsFunctionsTest extends \PHPUnit_Framework_TestCase {

	public function testRun_constant_1() {
		$this->assertEquals(
				Runtime::runSource('echo M_PI;'),
				array(M_PI)
				);
	}

	public function testRun_array_change_key_case_1() {
		$this->assertEquals(
				Runtime::runSource('$input_array = array("FirSt" => 1, "SecOnd" => 4); $res = array_change_key_case($input_array, CASE_UPPER); echo $res["FIRST"], $res["SECOND"];'),
				array('1', '4')
				);
	}

}
