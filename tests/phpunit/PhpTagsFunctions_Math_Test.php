<?php
namespace PhpTags;

class PhpTagsFunctions_Math_Test extends \PHPUnit\Framework\TestCase {

	public function testRun_constant_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo M_PI;' ),
				[ M_PI ]
			);
	}

	public function testRun_abs_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo abs(-4.2);' ),
				[ '4.2' ]
			);
	}

	public function testRun_abs_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo abs(5);' ),
				[ '5' ]
			);
	}

	public function testRun_abs_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo abs(-5);' ),
				[ '5' ]
			);
	}

	public function testRun_abs_4() {
		$this->assertEquals(
				Runtime::runSource( '$f = "abs"; echo $f(-5);' ),
				[ '5' ]
			);
	}

	public function testRun_abs_5() {
		$this->assertEquals(
				Runtime::runSource( '$f = "ABS"; echo $f(-5);' ),
				[ '5' ]
			);
	}

	public function testRun_acos_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo acos(0.4);' ),
				[ acos( 0.4 ) ]
			);
	}

	public function testRun_acosh_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo acosh(1.4);' ),
				[ acosh( 1.4 ) ]
			);
	}

	public function testRun_asin_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo asin(0.4);' ),
				[ asin( 0.4 ) ]
			);
	}

	public function testRun_asinh_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo asinh(1.4);' ),
				[ asinh( 1.4 ) ]
			);
	}

	public function testRun_atan2_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo atan2(.4, .8);' ),
				[ atan2( 0.4, 0.8 ) ]
			);
	}

	public function testRun_atan_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo atan(0.4);' ),
				[ atan( 0.4 ) ]
			);
	}

	public function testRun_atanh_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo atanh(0.4);' ),
				[ atanh( 0.4 ) ]
			);
	}

	public function testRun_base_convert_1() {
		$this->assertEquals(
				Runtime::runSource( '$hexadecimal = "A37334"; echo base_convert($hexadecimal, 16, 2);' ),
				[ '101000110111001100110100' ]
			);
	}

	public function testRun_bindec_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo bindec("110011");' ),
				[ '51' ]
			);
	}

	public function testRun_bindec_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo bindec("000110011");' ),
				[ '51' ]
			);
	}

	public function testRun_bindec_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo bindec("111");' ),
				[ '7' ]
			);
	}

	public function testRun_ceil_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo ceil(4.3);' ),
				[ '5' ]
			);
	}

	public function testRun_ceil_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo ceil(9.999);' ),
				[ '10' ]
			);
	}

	public function testRun_ceil_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo ceil(-3.14);' ),
				[ '-3' ]
			);
	}

	public function testRun_cos_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo cos(.14);' ),
				[ cos( 0.14 ) ]
			);
	}

	public function testRun_cosh_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo cosh(.14);' ),
				[ cosh( 0.14 ) ]
			);
	}

	public function testRun_decbin_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo decbin(12);' ),
				[ '1100' ]
			);
	}

	public function testRun_decbin_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo decbin(26);' ),
				[ '11010' ]
			);
	}

	public function testRun_dechex_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo dechex(10);' ),
				[ 'a' ]
			);
	}

	public function testRun_dechex_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo dechex(47);' ),
				[ '2f' ]
			);
	}

	public function testRun_decoct_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo decoct(15);' ),
				[ '17' ]
			);
	}

	public function testRun_decoct_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo decoct(264);' ),
				[ '410' ]
			);
	}

	public function testRun_deg2rad_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo deg2rad(45);' ),
				[ M_PI_4 ]
			);
	}

	public function testRun_deg2rad_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo deg2rad(45) === M_PI_4 ? "true" : "false";' ),
				[ 'true' ]
			);
	}

	public function testRun_exp_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo exp(12);' ),
				[ exp( 12 ) ]
			);
	}

	public function testRun_exp_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo exp(5.7);' ),
				[ exp( 5.7 ) ]
			);
	}

	public function testRun_expm1_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo expm1(1.2);' ),
				[ expm1( 1.2 ) ]
			);
	}

	public function testRun_floor_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo floor(4.3);' ),
				[ '4' ]
			);
	}

	public function testRun_floor_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo floor(9.999);' ),
				[ '9' ]
			);
	}

	public function testRun_floor_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo floor(-3.14);' ),
				[ '-4' ]
			);
	}

	public function testRun_fmod_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo fmod(5.7, 1.3);' ),
				[ '0.5' ]
			);
	}

	public function testRun_getrandmax_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo getrandmax();' ),
				[ getrandmax() ]
			);
	}

	public function testRun_hexdec_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo hexdec("See");' ),
				[ '238' ]
			);
	}

	public function testRun_hexdec_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo hexdec("ee");' ),
				[ '238' ]
			);
	}

	public function testRun_hexdec_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo hexdec("that");' ),
				[ '10' ]
			);
	}

	public function testRun_hexdec_4() {
		$this->assertEquals(
				Runtime::runSource( 'echo hexdec("a0");' ),
				[ '160' ]
			);
	}

	public function testRun_hypot_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo hypot(5, 7);' ),
				[ hypot( 5, 7 ) ]
			);
	}

	public function testRun_is_finite_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo is_finite(5) ? "true" : "false";' ),
				[ is_finite( 5 ) ? "true" : "false" ]
			);
	}

	public function testRun_is_infinite_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo is_infinite(5) ? "true" : "false";' ),
				[ is_infinite( 5 ) ? "true" : "false" ]
			);
	}

	public function testRun_is_nan_1() {
		$return = Runtime::runSource( '$nan = acos( 8 ); print_r( $nan );' );
		$this->assertEquals(
				(string)new outPrint( null, print_r( acos( 8 ), true ) ),
				(string)$return[0]
			);
	}

	public function testRun_is_nan_2() {
		$return = Runtime::runSource( 'print_r( is_nan($nan) );' );
		$this->assertEquals(
				(string)new outPrint( null, print_r( true, true ) ),
				(string)$return[0]
			);
	}

	public function testRun_is_nan_3() {
		$return = Runtime::runSource( 'print_r( is_nan(NAN) );' );
		$this->assertEquals(
				(string)new outPrint( null, print_r( true, true ) ),
				(string)$return[0]
			);
	}

	public function testRun_lcg_value_1() {
		$return = Runtime::runSource( 'echo lcg_value();' );
		$this->assertRegExp(
				'/\d\.\d+(E\-\d)?/',
				(string)$return[0]
			);
	}

	public function testRun_log10_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo log10(45);' ),
				[ log10( 45 ) ]
			);
	}

	public function testRun_log1p_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo log1p(45);' ),
				[ log1p( 45 ) ]
			);
	}

	public function testRun_log_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo log(45);' ),
				[ log( 45 ) ]
			);
	}

	public function testRun_log_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo log(45, 05);' ),
				[ log( 45, 05 ) ]
			);
	}

	public function testRun_max_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo max(1, 3, 5, 6, 7);' ),
				[ '7' ]
			);
	}

	public function testRun_max_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo max(array(2, 4, 5));' ),
				[ '5' ]
			);
	}

	public function testRun_max_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo max(0, "hello");' ),
				[ '0' ]
			);
	}

	public function testRun_max_4() {
		$this->assertEquals(
				Runtime::runSource( 'echo max("hello", 0);' ),
				[ 'hello' ]
			);
	}

	public function testRun_max_5() {
		$this->assertEquals(
				Runtime::runSource( 'echo max("42", 3);' ),
				[ '42' ]
			);
	}

	public function testRun_max_6() {
		$this->assertEquals(
				Runtime::runSource( 'echo max(-1, "hello");' ),
				[ 'hello' ]
			);
	}

	public function testRun_max_7() {
		$return = Runtime::runSource( 'print_r( max(array(2, 2, 2), array(1, 1, 1, 1)) );' );
		$this->assertEquals(
				(string)new outPrint( null, print_r( [ 1, 1, 1, 1 ], true ) ),
				(string)$return[0]
			);
	}

	public function testRun_max_8() {
		$return = Runtime::runSource( 'print_r( max("string", array(2, 5, 7), 42) );' );
		$this->assertEquals(
				(string)new outPrint( null, print_r( [ 2, 5, 7 ], true ) ),
				(string)$return[0]
			);
	}

	public function testRun_min_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo min(1, 3, 5, 6, 7);' ),
				[ '1' ]
			);
	}

	public function testRun_min_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo min(array(2, 4, 5));' ),
				[ '2' ]
			);
	}

	public function testRun_mt_getrandmax_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo mt_getrandmax();' ),
				[ mt_getrandmax() ]
			);
	}

	public function testRun_mt_rand_1() {
		$return = Runtime::runSource( 'echo mt_rand();' );
		$this->assertRegExp(
				'/\d+/',
				(string)$return[0]
			);
	}

	public function testRun_mt_rand_2() {
		$return = Runtime::runSource( 'echo mt_rand(4, 9);' );
		$this->assertRegExp(
				'/[4-9]/',
				(string)$return[0]
			);
	}

	public function testRun_octdec_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo octdec("77");' ),
				[ '63' ]
			);
	}

	public function testRun_octdec_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo octdec(decoct(45));' ),
				[ '45' ]
			);
	}

	public function testRun_pi_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo pi();' ),
				[ M_PI ]
			);
	}

	public function testRun_pow_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo pow(2, 8);' ),
				[ '256' ]
			);
	}

	public function testRun_pow_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo pow(-1, 20);' ),
				[ '1' ]
			);
	}

	public function testRun_pow_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo pow(0, 0);' ),
				[ '1' ]
			);
	}

	public function testRun_rad2deg_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo rad2deg(M_PI_4);' ),
				[ '45' ]
			);
	}

	public function testRun_rand_1() {
		$return = Runtime::runSource( 'echo rand();' );
		$this->assertRegExp(
				'/\d+/',
				(string)$return[0]
			);
	}

	public function testRun_rand_2() {
		$return = Runtime::runSource( 'echo rand(4, 9);' );
		$this->assertRegExp(
				'/[4-9]/',
				(string)$return[0]
			);
	}

	public function testRun_round_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo round(3.4);' ),
				[ '3' ]
			);
	}

	public function testRun_round_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo round(3.5);' ),
				[ '4' ]
			);
	}

	public function testRun_round_3() {
		$this->assertEquals(
				Runtime::runSource( 'echo round(3.6, 0);' ),
				[ '4' ]
			);
	}

	public function testRun_round_4() {
		$this->assertEquals(
				Runtime::runSource( 'echo round(1241757, -3);' ),
				[ '1242000' ]
			);
	}

	public function testRun_round_5() {
		$this->assertEquals(
				Runtime::runSource( 'echo round(9.5, 0, PHP_ROUND_HALF_UP);' ),
				[ '10' ]
			);
	}

	public function testRun_round_6() {
		$this->assertEquals(
				Runtime::runSource( 'echo round(9.5, 0, PHP_ROUND_HALF_DOWN);' ),
				[ '9' ]
			);
	}

	public function testRun_round_7() {
		$this->assertEquals(
				Runtime::runSource( 'echo round(-1.55, 1, PHP_ROUND_HALF_DOWN);' ),
				[ '-1.5' ]
			);
	}

	public function testRun_sin_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo sin(deg2rad(60));' ),
				[ sin( deg2rad( 60 ) ) ]
			);
	}

	public function testRun_sin_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo sin(60);' ),
				[ sin( 60 ) ]
			);
	}

	public function testRun_sinh_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo sinh(-0.304810621);' ),
				[ sinh( -0.304810621 ) ]
			);
	}

	public function testRun_sqrt_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo sqrt(9);' ),
				[ '3' ]
			);
	}

	public function testRun_sqrt_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo sqrt(10);' ),
				[ sqrt( 10 ) ]
			);
	}

	public function testRun_tan_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo tan(M_PI_4);' ),
				[ '1' ]
			);
	}

	public function testRun_tanh_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo tanh(M_PI_4);' ),
				[ tanh( M_PI_4 ) ]
			);
	}

}
