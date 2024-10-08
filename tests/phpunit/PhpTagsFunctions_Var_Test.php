<?php
namespace PhpTags;

/**
 * @coversNothing
 */
class PhpTagsFunctions_Var_Test extends \PHPUnit\Framework\TestCase {

	public static function setUpBeforeClass(): void {
		if ( Renderer::$needInitRuntime ) {
			wfDebug( 'PHPTags: run hook PhpTagsRuntimeFirstInit ' . __FILE__ );
			\MediaWiki\MediaWikiServices::getInstance()->getHookContainer()->run( 'PhpTagsRuntimeFirstInit' );
			Hooks::loadData();
			Runtime::$loopsLimit = 1000;
			Renderer::$needInitRuntime = false;
		}
	}

	public function testRun_constant_1() {
		$this->assertEquals(
				[ M_PI ],
				Runtime::runSource( 'echo M_PI;' )
			);
	}

	public function testRun_boolval_1() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo boolval(0) ? "true" : "false";' )
				);
	}

	public function testRun_boolval_2() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo boolval(42) ? "true" : "false";' )
				);
	}

	public function testRun_boolval_3() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo boolval(0.0) ? "true" : "false";' )
				);
	}

	public function testRun_boolval_4() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo boolval(4.2) ? "true" : "false";' )
				);
	}

	public function testRun_boolval_5() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo boolval("") ? "true" : "false";' )
				);
	}

	public function testRun_boolval_6() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo boolval("string") ? "true" : "false";' )
				);
	}

	public function testRun_boolval_7() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo boolval(array(1,2)) ? "true" : "false";' )
				);
	}

	public function testRun_boolval_8() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo boolval(array()) ? "true" : "false";' )
				);
	}

	public function testRun_boolval_9() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo boolval([1, 2]) ? "true" : "false";' )
				);
	}

// @todo
// public function testRun_boolval_10() {
// $this->assertEquals(
// Runtime::runSource('echo boolval(new stdClass) ? "true" : "false";'),
// array('true')
// );
// }

	public function testRun_doubleval() {
		$this->assertEquals(
				[ '100000000.75' ],
				Runtime::runSource( 'echo doubleval(100000000.75);' )
				);
	}

	public function testRun_floatval_1() {
		$this->assertEquals(
				[ '122.34343' ],
				Runtime::runSource( '$var = "122.34343The"; $float_value_of_var = floatval($var); echo $float_value_of_var;' )
				);
	}

	public function testRun_get_defined_vars_1() {
		$this->markTestSkipped( 'php8+ throws "reset(): Argument #1 ($array) must be passed by reference, value given" somewhere' );
		$this->assertEquals(
				[ 'testRun_get_defined_vars_1' ],
				Runtime::runSource( '$foo = get_defined_vars(); echo $foo["argv"][0];', [ 'testRun_get_defined_vars_1' ] )
				);
	}

	public function testRun_get_defined_vars_2() {
		$this->markTestSkipped( 'php8+ throws "reset(): Argument #1 ($array) must be passed by reference, value given" somewhere' );
		$this->assertEquals(
				[ '4343', '3335' ],
				Runtime::runSource( '$b=[4343, 3335]; $foo = get_defined_vars(); $b[0]=999; echo $foo["b"][0], $foo["b"][1];' )
				);
	}

	public function testRun_gettype_1() {
		$this->assertEquals(
				[ 'integer' ],
				Runtime::runSource( 'echo gettype(1);' )
				);
	}

	public function testRun_gettype_2() {
		$this->assertEquals(
				[ 'double' ],
				Runtime::runSource( 'echo gettype(1.);' )
				);
	}

	public function testRun_gettype_3() {
		$this->assertEquals(
				[ 'NULL' ],
				Runtime::runSource( 'echo gettype(NULL);' )
				);
	}

	public function testRun_gettype_4() {
		$this->assertEquals(
				[ 'string' ],
				Runtime::runSource( 'echo gettype("foo");' )
				);
	}

// @todo
// public function testRun_gettype_5() {
// $this->assertEquals(
// Runtime::runSource('echo gettype("new stdClass");'),
// array('object')
// );
// }

	public function testRun_intval_1() {
		$this->assertEquals(
				[ '42' ],
				Runtime::runSource( 'echo intval(42);' )
				);
	}

	public function testRun_intval_2() {
		$this->assertEquals(
				[ '4' ],
				Runtime::runSource( 'echo intval(4.2);' )
				);
	}

	public function testRun_intval_3() {
		$this->assertEquals(
				[ '42' ],
				Runtime::runSource( 'echo intval("42");' )
				);
	}

	public function testRun_intval_4() {
		$this->assertEquals(
				[ '42' ],
				Runtime::runSource( 'echo intval("+42");' )
				);
	}

	public function testRun_intval_5() {
		$this->assertEquals(
				[ '-42' ],
				Runtime::runSource( 'echo intval("-42");' )
				);
	}

	public function testRun_intval_6() {
		$this->assertEquals(
				[ '34' ],
				Runtime::runSource( 'echo intval(042);' )
				);
	}

	public function testRun_intval_6_1() {
		$this->assertEquals(
				[ '-34' ],
				Runtime::runSource( 'echo intval(-042);' )
				);
	}

	public function testRun_intval_7() {
		$this->assertEquals(
				[ '42' ],
				Runtime::runSource( 'echo intval("042");' )
				);
	}

	public function testRun_intval_8() {
		$this->assertEquals(
				[ '10000000000' ], // 1410065408 ???

				Runtime::runSource( 'echo intval(1e10);' ) );
	}

	public function testRun_intval_9() {
		$this->assertEquals(
				Runtime::runSource( 'echo intval("1e10");' ),
				[ intval( "1e10" ) ]
				);
	}

	public function testRun_intval_10() {
		$this->assertEquals(
				[ '26' ],
				Runtime::runSource( 'echo intval(0x1A);' )
				);
	}

	public function testRun_intval_11() {
		$this->assertEquals(
				[ '42000000' ],
				Runtime::runSource( 'echo intval(42000000);' )
				);
	}

	public function testRun_intval_12() {
		$this->assertEquals(
				Runtime::runSource( 'echo intval(420000000000000000000);' ),
				[ intval( 420000000000000000000 ) ]
				);
	}

	public function testRun_intval_13() {
		$this->assertEquals(
				Runtime::runSource( 'echo intval("420000000000000000000");' ),
				[ intval( "420000000000000000000" ) ] // 2147483647 for 32 bit systems
				);
	}

	public function testRun_intval_14() {
		$this->assertEquals(
				[ '42' ],
				Runtime::runSource( 'echo intval(42, 8);' )
				);
	}

	public function testRun_intval_15() {
		$this->assertEquals(
				[ '34' ],
				Runtime::runSource( 'echo intval("42", 8);' )
				);
	}

	public function testRun_intval_16() {
		$this->assertEquals(
				[ '0' ],
				Runtime::runSource( 'echo intval(array());' )
				);
	}

	public function testRun_intval_17() {
		$this->assertEquals(
				[ '1' ],
				Runtime::runSource( 'echo intval(array("foo", "bar"));' )
				);
	}

	public function testRun_intval_18() {
		$this->assertEquals(
				[ '8' ],
				Runtime::runSource( 'echo intval(01090);' )
				);
	}

	public function testRun_intval_19() {
		$this->assertEquals(
				[ '42' ],
				Runtime::runSource( 'echo intval(+42);' )
				);
	}

	public function testRun_intval_20() {
		$this->assertEquals(
				[ '-42' ],
				Runtime::runSource( 'echo intval(-42);' )
				);
	}

	public function testRun_intval_21() {
		$this->assertEquals(
				[ '-34' ],
				Runtime::runSource( 'echo intval(-042);' )
				);
	}

	public function testRun_intval_math_1() {
		$this->assertEquals(
				[ '-4' ],
				Runtime::runSource( 'echo -intval(4.2);' )
				);
	}

	public function testRun_intval_math_2() {
		$this->assertEquals(
				[ '3' ],
				Runtime::runSource( 'echo 7-intval(4.2);' )
				);
	}

	public function testRun_intval_math_3() {
		$this->assertEquals(
				[ '10' ],
				Runtime::runSource( 'echo 2*7-intval(4.2);' )
				);
	}

	public function testRun_intval_math_4() {
		$this->assertEquals(
				[ '-26' ],
				Runtime::runSource( 'echo 2-7*intval(4.2);' )
				);
	}

	public function testRun_intval_math_5() {
		$this->assertEquals(
				[ '-26' ],
				Runtime::runSource( 'echo 2-7*intval(2.2+2);' )
				);
	}

	public function testRun_intval_math_6() {
		$this->assertEquals(
				[ '-124' ],
				Runtime::runSource( 'echo 2-7*intval(2.2+2*8);' )
				);
	}

	public function testRun_intval_math_7() {
		$this->assertEquals(
				[ '-82' ],
				Runtime::runSource( 'echo 2-7*intval(2.2*2+8);' )
				);
	}

	public function testRun_intval_math_8() {
		$this->assertEquals(
				[ '-77' ],
				Runtime::runSource( 'echo 2-7*intval(2.2*2+8)+5;' )
				);
	}

	public function testRun_intval_math_9() {
		$this->assertEquals(
				[ '-37' ],
				Runtime::runSource( 'echo 2-7*intval(2.2*2+8)+5*9;' )
				);
	}

	public function testRun_intval_math_10() {
		$this->assertEquals(
				[ '-427' ],
				Runtime::runSource( 'echo 2-7*intval(2.2*2+8)*5-9;' )
				);
	}

	public function testRun_intval_math_11() {
		$this->assertEquals(
				[ '413' ],
				Runtime::runSource( 'echo 2-7*-intval(2.2*2+8)*5-9;' )
				);
	}

	public function testRun_is_array_1() {
		$this->assertEquals(
				[ 'Array' ],
				Runtime::runSource( '$yes = array("this", "is", "an array"); echo is_array($yes) ? "Array" : "not an Array";' )
				);
	}

	public function testRun_is_array_2() {
		$this->assertEquals(
				[ 'not an Array' ],
				Runtime::runSource( '$no = "this is a string"; echo is_array($no) ? "Array" : "not an Array";' )
				);
	}

	public function testRun_is_bool_1() {
		$this->assertEquals(
				[ 'Yes, this is a boolean' ],
				Runtime::runSource( '$a = false; if (is_bool($a) === true) echo "Yes, this is a boolean";' )
				);
	}

	public function testRun_is_bool_2() {
		$this->assertEquals(
				[ 'No, this is not a boolean' ],
				Runtime::runSource( '$b = 0; if (is_bool($b) === false) {  echo "No, this is not a boolean"; }' )
				);
	}

	public function testRun_is_double() {
		$this->assertEquals(
				[ 'is float' ],
				Runtime::runSource( 'if (is_double(27.25)) { echo "is float"; } else { echo "is not float"; }' )
				);
	}

	public function testRun_is_float_1() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_float("abc") ? "true" : "false";' )
				);
	}

	public function testRun_is_float_2() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_float(23) ? "true" : "false";' )
				);
	}

	public function testRun_is_float_3() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_float(23.5) ? "true" : "false";' )
				);
	}

	public function testRun_is_float_4() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_float(1e7) ? "true" : "false";' )
				);
	}

	public function testRun_is_real() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_real(true) ? "true" : "false";' )
				);
	}

	public function testRun_is_int_1() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_int(23) ? "true" : "false";' )
				);
	}

	public function testRun_is_int_2() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_int("23") ? "true" : "false";' )
				);
	}

	public function testRun_is_int_3() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_int(23.5) ? "true" : "false";' )
				);
	}

	public function testRun_is_int_4() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_int("23.5") ? "true" : "false";' )
				);
	}

	public function testRun_is_int_5() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_int(null) ? "true" : "false";' )
				);
	}

	public function testRun_is_long() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_long(true) ? "true" : "false";' )
				);
	}

	public function testRun_is_integer() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_integer(false) ? "true" : "false";' )
				);
	}

	public function testRun_is_null_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo is_null($inexistent) ? "true" : "false";', [ 'Test' ] ),
				[
					(string)new PhpTagsException( \PhpTags\PhpTagsException::NOTICE_UNDEFINED_VARIABLE, 'inexistent', 1, 'Test' ),
					'true'
				]
			);
	}

	public function testRun_is_null_2() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( '$foo = NULL; echo is_null($foo) ? "true" : "false";' )
				);
	}

	public function testRun_is_null_3() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( '$foo = true; echo is_null($foo) ? "true" : "false";' )
				);
	}

	public function testRun_is_numeric_1() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_numeric("42") ? "true" : "false";' )
				);
	}

	public function testRun_is_numeric_2() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_numeric(1337) ? "true" : "false";' )
				);
	}

	public function testRun_is_numeric_3() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_numeric(0x539) ? "true" : "false";' )
				);
	}

	public function testRun_is_numeric_4() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_numeric(02471) ? "true" : "false";' )
				);
	}

// @todo
// public function testRun_is_numeric_5() {
// $this->assertEquals(
// Runtime::runSource('echo is_numeric(0b10100111001) ? "true" : "false";'),
// array('true')
// );
// }
	public function testRun_is_numeric_6() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_numeric(1337e0) ? "true" : "false";' )
				);
	}

	public function testRun_is_numeric_7() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_numeric("not numeric") ? "true" : "false";' )
				);
	}

	public function testRun_is_numeric_8() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_numeric(array()) ? "true" : "false";' )
				);
	}

	public function testRun_is_numeric_9() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_numeric(9.1) ? "true" : "false";' )
				);
	}

	public function testRun_is_scalar_1() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_scalar(3.1416) ? "true" : "false";' )
				);
	}

	public function testRun_is_scalar_2() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_scalar(array("foo","bar")) ? "true" : "false";' )
				);
	}

	public function testRun_is_string_1() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_string(false) ? "true" : "false";' )
				);
	}

	public function testRun_is_string_2() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_string(true) ? "true" : "false";' )
				);
	}

	public function testRun_is_string_3() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_string(null) ? "true" : "false";' )
				);
	}

	public function testRun_is_string_4() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_string("abc") ? "true" : "false";' )
				);
	}

	public function testRun_is_string_5() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_string("23") ? "true" : "false";' )
				);
	}

	public function testRun_is_string_6() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_string(23) ? "true" : "false";' )
				);
	}

	public function testRun_is_string_7() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_string("23.5") ? "true" : "false";' )
				);
	}

	public function testRun_is_string_8() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_string(23.5) ? "true" : "false";' )
				);
	}

	public function testRun_is_string_9() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_string("") ? "true" : "false";' )
				);
	}

	public function testRun_is_string_10() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_string(" ") ? "true" : "false";' )
				);
	}

	public function testRun_is_string_11() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( 'echo is_string("0") ? "true" : "false";' )
				);
	}

	public function testRun_is_string_12() {
		$this->assertEquals(
				[ 'false' ],
				Runtime::runSource( 'echo is_string(0) ? "true" : "false";' )
				);
	}

	public function testRun_print_r_1() {
		$return = Runtime::runSource( '$a = array("a" => "apple", "b" => "banana", "c" => ["x", "y", "z"]); print_r ($a);' );
		$this->assertInstanceOf(
				'PhpTags\\outPrint',
				$return[0]
				);
		$this->assertEquals(
				(string)new outPrint( null, print_r( [ "a" => "apple", "b" => "banana", "c" => [ "x", "y", "z" ] ], true ) ),
				(string)$return[0]
			);
	}

	public function testRun_print_r_2() {
		$return = Runtime::runSource( '$results = print_r ($a, true); echo $results;' );
		$this->assertEquals(
				(string)print_r( [ "a" => "apple", "b" => "banana", "c" => [ "x", "y", "z" ] ], true ),
				(string)$return[0]
			);
	}

	public function testRun_settype_1() {
		$this->assertEquals(
				[ 'true' ],
				Runtime::runSource( '$foo = "5bar"; settype($foo, "int"); echo $foo===5 ? "true" : "false";' )
				);
	}

	public function testRun_settype_2() {
		$this->assertEquals(
				[ 'string' ],
				Runtime::runSource( '$foo = true; settype($foo, "string"); echo $foo==="1" ? "string" : "not string";' )
				);
	}

	public function testRun_strval_1() {
		$this->assertEquals(
				[ 'string' ],
				Runtime::runSource( '$foo = true; $bar=strval($foo); echo $bar==="1" ? "string" : "not string";' )
				);
	}

	public function testRun_var_export_1() {
		$return = Runtime::runSource( '$a = array (1, 2, array ("a", "b", "c")); var_export($a);' );
		$this->assertEquals(
				(string)new outPrint( null, var_export( [ 1, 2, [ "a", "b", "c" ] ], true ) ),
				(string)$return[0]
			);
	}

	public function testRun_var_export_2() {
		$this->assertEquals(
				Runtime::runSource( '$b = 3.1; $v = var_export($b, true); echo $v;' ),
				[ var_export( 3.1, true ) ]
				);
	}

}
