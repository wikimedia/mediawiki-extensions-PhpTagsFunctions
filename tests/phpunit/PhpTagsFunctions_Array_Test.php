<?php
namespace PhpTags;

class PhpTagsFunctions_Array_Test extends \PHPUnit_Framework_TestCase {

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
	public function testRun_array_change_key_case_2() {
		$this->assertEquals(
				Runtime::runSource('$input_array = array("FirSt" => 1, "SecOnd" => 4); $res = array_change_key_case($input_array); echo $res["first"], $res["second"];'),
				array('1', '4')
				);
	}

	public function testRun_array_chunk_1() {
		$return = Runtime::runSource('$input_array = array("a", "b", "c", "d", "e"); print_r( array_chunk($input_array, 2) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0=>array('a','b'), 1=>array('c','d'), 2=>array('e')), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_chunk_2() {
		$return = Runtime::runSource('print_r( array_chunk($input_array, 2, true) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0=>array(0=>'a',1=>'b'), 1=>array(2=>'c', 3=>'d'), 2=>array(4=>'e')), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_combine_1() {
		$return = Runtime::runSource('$a = array("green", "red", "yellow"); $b = array("avocado", "apple", "banana"); $c = array_combine($a, $b); print_r($c);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('green'=>'avocado', 'red'=>'apple', 'yellow'=>'banana'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_count_values_1() {
		$return = Runtime::runSource('$array = array(1, "hello", 1, "world", "hello"); print_r(array_count_values($array));');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(1=>2, 'hello'=>2, 'world'=>1), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_diff_assoc_1() {
		$return = Runtime::runSource('
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_assoc($array1, $array2);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('b'=>'brown', 'c'=>'blue', 0=>'red'), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_diff_assoc_2() {
		$return = Runtime::runSource('
$array3 = array("red");
$result = array_diff_assoc($array1, $array2, $array3);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('b'=>'brown', 'c'=>'blue'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_diff_key_1() {
		$return = Runtime::runSource('
$array1 = array("blue"  => 1, "red" => 2, "green" => 3, "purple" => 4);
$array2 = array("green" => 5, "blue" => 6, "yellow" => 7, "cyan" => 8);
print_r(array_diff_key($array1, $array2));');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('red'=>2, 'purple'=>4), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_diff_1() {
		$return = Runtime::runSource('
$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(1=>'blue'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_fill_keys_1() {
		$return = Runtime::runSource('
$keys = array("foo", 5, 10, "bar");
$a = array_fill_keys($keys, "banana");
print_r($a);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('foo'=>'banana',5=>'banana',10=>'banana','bar'=>'banana'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_fill_1() {
		$return = Runtime::runSource('
$a = array_fill(5, 3, "banana");
print_r($a);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(5=>'banana',6=>'banana',7=>'banana'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_count_1() {
		$this->assertEquals(
				Runtime::runSource('$transport = array("foot", "bike", "car", "plane"); echo count($transport);'),
				array('4')
				);
	}
	public function testRun_current_1() {
		$this->assertEquals(
				Runtime::runSource('echo current($transport);'),
				array('foot')
				);
	}
	public function testRun_next_1() {
		$this->assertEquals(
				Runtime::runSource('echo next($transport), next($transport);'),
				array('bike', 'car')
				);
	}
	public function testRun_current_2() {
		$this->assertEquals(
				Runtime::runSource('echo current($transport);'),
				array('car')
				);
	}

}
