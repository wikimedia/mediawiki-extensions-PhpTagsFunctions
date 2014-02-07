<?php
namespace PhpTags;

class PhpTagsFunctions_Math_Test extends \PHPUnit_Framework_TestCase {

	public function testRun_constant_1() {
		$this->assertEquals(
				Runtime::runSource('echo M_PI;'),
				array( M_PI )
			);
	}

	public function testRun_abs_1() {
		$this->assertEquals(
				Runtime::runSource('echo abs(-4.2);'),
				array( '4.2' )
			);
	}
	public function testRun_abs_2() {
		$this->assertEquals(
				Runtime::runSource('echo abs(5);'),
				array( '5' )
			);
	}
	public function testRun_abs_3() {
		$this->assertEquals(
				Runtime::runSource('echo abs(-5);'),
				array( '5' )
			);
	}

	public function testRun_acos_1() {
		$this->assertEquals(
				Runtime::runSource('echo acos(0.4);'),
				array( acos(0.4) )
			);
	}

	public function testRun_acosh_1() {
		$this->assertEquals(
				Runtime::runSource('echo acosh(1.4);'),
				array( acosh(1.4) )
			);
	}

	public function testRun_asin_1() {
		$this->assertEquals(
				Runtime::runSource('echo asin(0.4);'),
				array( asin(0.4) )
			);
	}

	public function testRun_asinh_1() {
		$this->assertEquals(
				Runtime::runSource('echo asinh(1.4);'),
				array( asinh(1.4) )
			);
	}

	public function testRun_atan2_1() {
		$this->assertEquals(
				Runtime::runSource('echo atan2(.4, .8);'),
				array( atan2(.4, .8) )
			);
	}

	public function testRun_atan_1() {
		$this->assertEquals(
				Runtime::runSource('echo atan(0.4);'),
				array( atan(0.4) )
			);
	}

	public function testRun_atanh_1() {
		$this->assertEquals(
				Runtime::runSource('echo atanh(0.4);'),
				array( atanh(0.4) )
			);
	}

	public function testRun_base_convert_1() {
		$this->assertEquals(
				Runtime::runSource('$hexadecimal = "A37334"; echo base_convert($hexadecimal, 16, 2);'),
				array( '101000110111001100110100' )
			);
	}

	public function testRun_bindec_1() {
		$this->assertEquals(
				Runtime::runSource('echo bindec("110011");'),
				array( '51' )
			);
	}
	public function testRun_bindec_2() {
		$this->assertEquals(
				Runtime::runSource('echo bindec("000110011");'),
				array( '51' )
			);
	}
	public function testRun_bindec_3() {
		$this->assertEquals(
				Runtime::runSource('echo bindec("111");'),
				array( '7' )
			);
	}

	public function testRun_ceil_1() {
		$this->assertEquals(
				Runtime::runSource('echo ceil(4.3);'),
				array( '5' )
			);
	}
	public function testRun_ceil_2() {
		$this->assertEquals(
				Runtime::runSource('echo ceil(9.999);'),
				array( '10' )
			);
	}
	public function testRun_ceil_3() {
		$this->assertEquals(
				Runtime::runSource('echo ceil(-3.14);'),
				array( '-3' )
			);
	}

	public function testRun_cos_1() {
		$this->assertEquals(
				Runtime::runSource('echo cos(.14);'),
				array( cos(.14) )
			);
	}

	public function testRun_cosh_1() {
		$this->assertEquals(
				Runtime::runSource('echo cosh(.14);'),
				array( cosh(.14) )
			);
	}

	public function testRun_decbin_1() {
		$this->assertEquals(
				Runtime::runSource('echo decbin(12);'),
				array( '1100' )
			);
	}
	public function testRun_decbin_2() {
		$this->assertEquals(
				Runtime::runSource('echo decbin(26);'),
				array( '11010' )
			);
	}

	public function testRun_dechex_1() {
		$this->assertEquals(
				Runtime::runSource('echo dechex(10);'),
				array( 'a' )
			);
	}
	public function testRun_dechex_2() {
		$this->assertEquals(
				Runtime::runSource('echo dechex(47);'),
				array( '2f' )
			);
	}

	public function testRun_decoct_1() {
		$this->assertEquals(
				Runtime::runSource('echo decoct(15);'),
				array( '17' )
			);
	}
	public function testRun_decoct_2() {
		$this->assertEquals(
				Runtime::runSource('echo decoct(264);'),
				array( '410' )
			);
	}

	public function testRun_deg2rad_1() {
		$this->assertEquals(
				Runtime::runSource('echo deg2rad(45);'),
				array( M_PI_4 )
			);
	}
	public function testRun_deg2rad_2() {
		$this->assertEquals(
				Runtime::runSource('echo deg2rad(45) === M_PI_4 ? "true" : "false";'),
				array( 'true' )
			);
	}

	public function testRun_exp_1() {
		$this->assertEquals(
				Runtime::runSource('echo exp(12);'),
				array( exp(12) )
			);
	}
	public function testRun_exp_2() {
		$this->assertEquals(
				Runtime::runSource('echo exp(5.7);'),
				array( exp(5.7) )
			);
	}

	public function testRun_expm1_1() {
		$this->assertEquals(
				Runtime::runSource('echo expm1(1.2);'),
				array( expm1(1.2) )
			);
	}

	public function testRun_floor_1() {
		$this->assertEquals(
				Runtime::runSource('echo floor(4.3);'),
				array( '4' )
			);
	}
	public function testRun_floor_2() {
		$this->assertEquals(
				Runtime::runSource('echo floor(9.999);'),
				array( '9' )
			);
	}
	public function testRun_floor_3() {
		$this->assertEquals(
				Runtime::runSource('echo floor(-3.14);'),
				array( '-4' )
			);
	}

	public function testRun_fmod_1() {
		$this->assertEquals(
				Runtime::runSource('echo fmod(5.7, 1.3);'),
				array( '0.5' )
			);
	}

	public function testRun_getrandmax_1() {
		$this->assertEquals(
				Runtime::runSource('echo getrandmax();'),
				array( getrandmax() )
			);
	}

	public function testRun_hexdec_1() {
		$this->assertEquals(
				Runtime::runSource('echo hexdec("See");'),
				array( '238' )
			);
	}
	public function testRun_hexdec_2() {
		$this->assertEquals(
				Runtime::runSource('echo hexdec("ee");'),
				array( '238' )
			);
	}
	public function testRun_hexdec_3() {
		$this->assertEquals(
				Runtime::runSource('echo hexdec("that");'),
				array( '10' )
			);
	}
	public function testRun_hexdec_4() {
		$this->assertEquals(
				Runtime::runSource('echo hexdec("a0");'),
				array( '160' )
			);
	}

	public function testRun_hypot_1() {
		$this->assertEquals(
				Runtime::runSource('echo hypot(5, 7);'),
				array( hypot(5, 7) )
			);
	}

	public function testRun_is_finite_1() {
		$this->assertEquals(
				Runtime::runSource('echo is_finite(5) ? "true" : "false";'),
				array( is_finite(5) ? "true" : "false" )
			);
	}
	public function testRun_is_infinite_1() {
		$this->assertEquals(
				Runtime::runSource('echo is_infinite(5) ? "true" : "false";'),
				array( is_infinite(5) ? "true" : "false" )
			);
	}

	public function testRun_is_nan_1() {
		$return = Runtime::runSource('$nan = acos( 8 ); print_r( $nan );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(acos(8), true) ),
				(string) $return[0]
			);
	}
	public function testRun_is_nan_2() {
		$return = Runtime::runSource('print_r( is_nan($nan) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(true, true) ),
				(string) $return[0]
			);
	}
	public function testRun_is_nan_3() {
		$return = Runtime::runSource('print_r( is_nan(NAN) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(true, true) ),
				(string) $return[0]
			);
	}

	public function testRun_lcg_value_1() {
		$return = Runtime::runSource('echo lcg_value();');
		$this->assertRegExp(
				'/0\.\d+/',
				(string) $return[0]
			);
	}

	public function testRun_log10_1() {
		$this->assertEquals(
				Runtime::runSource('echo log10(45);'),
				array( log10(45) )
			);
	}

	public function testRun_log1p_1() {
		$this->assertEquals(
				Runtime::runSource('echo log1p(45);'),
				array( log1p(45) )
			);
	}

	public function testRun_log_1() {
		$this->assertEquals(
				Runtime::runSource('echo log(45);'),
				array( log(45) )
			);
	}
	public function testRun_log_2() {
		$this->assertEquals(
				Runtime::runSource('echo log(45, 05);'),
				array( log(45, 05) )
			);
	}

	public function testRun_max_1() {
		$this->assertEquals(
				Runtime::runSource('echo max(1, 3, 5, 6, 7);'),
				array( '7' )
			);
	}
	public function testRun_max_2() {
		$this->assertEquals(
				Runtime::runSource('echo max(array(2, 4, 5));'),
				array( '5' )
			);
	}
	public function testRun_max_3() {
		$this->assertEquals(
				Runtime::runSource('echo max(0, "hello");'),
				array( '0' )
			);
	}
	public function testRun_max_4() {
		$this->assertEquals(
				Runtime::runSource('echo max("hello", 0);'),
				array( 'hello' )
			);
	}
	public function testRun_max_5() {
		$this->assertEquals(
				Runtime::runSource('echo max("42", 3);'),
				array( '42' )
			);
	}
	public function testRun_max_6() {
		$this->assertEquals(
				Runtime::runSource('echo max(-1, "hello");'),
				array( 'hello' )
			);
	}
	public function testRun_max_7() {
		$return = Runtime::runSource('print_r( max(array(2, 2, 2), array(1, 1, 1, 1)) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r( array(1, 1, 1, 1), true) ),
				(string) $return[0]
			);
	}
	public function testRun_max_8() {
		$return = Runtime::runSource('print_r( max("string", array(2, 5, 7), 42) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r( array(2, 5, 7), true) ),
				(string) $return[0]
			);
	}

	public function testRun_min_1() {
		$this->assertEquals(
				Runtime::runSource('echo min(1, 3, 5, 6, 7);'),
				array( '1' )
			);
	}
	public function testRun_min_2() {
		$this->assertEquals(
				Runtime::runSource('echo min(array(2, 4, 5));'),
				array( '2' )
			);
	}

	public function testRun_mt_getrandmax_1() {
		$this->assertEquals(
				Runtime::runSource('echo mt_getrandmax();'),
				array( mt_getrandmax() )
			);
	}

	public function testRun_mt_rand_1() {
		$return = Runtime::runSource('echo mt_rand();');
		$this->assertRegExp(
				'/\d+/',
				(string) $return[0]
			);
	}
	public function testRun_mt_rand_2() {
		$return = Runtime::runSource('echo mt_rand(4, 9);');
		$this->assertRegExp(
				'/[4-9]/',
				(string) $return[0]
			);
	}

	public function testRun_octdec_1() {
		$this->assertEquals(
				Runtime::runSource('echo octdec("77");'),
				array( '63' )
			);
	}
	public function testRun_octdec_2() {
		$this->assertEquals(
				Runtime::runSource('echo octdec(decoct(45));'),
				array( '45' )
			);
	}

	public function testRun_pi_1() {
		$this->assertEquals(
				Runtime::runSource('echo pi();'),
				array( M_PI )
			);
	}

	public function testRun_pow_1() {
		$this->assertEquals(
				Runtime::runSource('echo pow(2, 8);'),
				array( '256' )
			);
	}
	public function testRun_pow_2() {
		$this->assertEquals(
				Runtime::runSource('echo pow(-1, 20);'),
				array( '1' )
			);
	}
	public function testRun_pow_3() {
		$this->assertEquals(
				Runtime::runSource('echo pow(0, 0);'),
				array( '1' )
			);
	}

	public function testRun_rad2deg_1() {
		$this->assertEquals(
				Runtime::runSource('echo rad2deg(M_PI_4);'),
				array( '45' )
			);
	}

	public function testRun_rand_1() {
		$return = Runtime::runSource('echo rand();');
		$this->assertRegExp(
				'/\d+/',
				(string) $return[0]
			);
	}
	public function testRun_rand_2() {
		$return = Runtime::runSource('echo rand(4, 9);');
		$this->assertRegExp(
				'/[4-9]/',
				(string) $return[0]
			);
	}

	public function testRun_round_1() {
		$this->assertEquals(
				Runtime::runSource('echo round(3.4);'),
				array( '3' )
			);
	}
	public function testRun_round_2() {
		$this->assertEquals(
				Runtime::runSource('echo round(3.5);'),
				array( '4' )
			);
	}
	public function testRun_round_3() {
		$this->assertEquals(
				Runtime::runSource('echo round(3.6, 0);'),
				array( '4' )
			);
	}
	public function testRun_round_4() {
		$this->assertEquals(
				Runtime::runSource('echo round(1241757, -3);'),
				array( '1242000' )
			);
	}
	public function testRun_round_5() {
		$this->assertEquals(
				Runtime::runSource('echo round(9.5, 0, PHP_ROUND_HALF_UP);'),
				array( '10' )
			);
	}
	public function testRun_round_6() {
		$this->assertEquals(
				Runtime::runSource('echo round(9.5, 0, PHP_ROUND_HALF_DOWN);'),
				array( '9' )
			);
	}
	public function testRun_round_7() {
		$this->assertEquals(
				Runtime::runSource('echo round(-1.55, 1, PHP_ROUND_HALF_DOWN);'),
				array( '-1.5' )
			);
	}

	public function testRun_sin_1() {
		$this->assertEquals(
				Runtime::runSource('echo sin(deg2rad(60));'),
				array( sin(deg2rad(60)) )
			);
	}
	public function testRun_sin_2() {
		$this->assertEquals(
				Runtime::runSource('echo sin(60);'),
				array( sin(60) )
			);
	}

	public function testRun_sinh_1() {
		$this->assertEquals(
				Runtime::runSource('echo sinh(-0.304810621);'),
				array( sinh(-0.304810621) )
			);
	}

	public function testRun_sqrt_1() {
		$this->assertEquals(
				Runtime::runSource('echo sqrt(9);'),
				array( '3' )
			);
	}
	public function testRun_sqrt_2() {
		$this->assertEquals(
				Runtime::runSource('echo sqrt(10);'),
				array( sqrt(10) )
			);
	}

	public function testRun_tan_1() {
		$this->assertEquals(
				Runtime::runSource('echo tan(M_PI_4);'),
				array( '1' )
			);
	}

	public function testRun_tanh_1() {
		$this->assertEquals(
				Runtime::runSource('echo tanh(M_PI_4);'),
				array( tanh(M_PI_4) )
			);
	}

}
