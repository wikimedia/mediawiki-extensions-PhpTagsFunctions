<?php
namespace PhpTags;

class PhpTagsFunctions_DateTime_Test extends \PHPUnit_Framework_TestCase {

	public function testRun_constant_1() {
		$this->assertEquals(
				Runtime::runSource('echo SUNFUNCS_RET_DOUBLE;'),
				array(SUNFUNCS_RET_DOUBLE)
				);
	}

	public function testRun_checkdate_1() {
		$this->assertEquals(
				Runtime::runSource('echo checkdate(12, 31, 2000) === true ? "true" : "false";'),
				array('true')
			);
	}
	public function testRun_checkdate_2() {
		$this->assertEquals(
				Runtime::runSource('echo checkdate(2, 29, 2001) === false ? "true" : "false";'),
				array('true')
			);
	}
	public function testRun_checkdate_3() {
		$this->assertEquals(
				Runtime::runSource('$func = "checkdate"; echo $func(2, 29, 2001) === false ? "true" : "false";'),
				array('true')
			);
	}

	public function testRun_date_create_1() {
		$this->assertEquals(
				Runtime::runSource('$date = date_create(5); echo $date === false ? "false" : "not false";'),
				array('false')
			);
	}
	public function testRun_DateTime_exception_1() {
		$this->assertEquals(
				Runtime::runSource('$date = DateTime(5);', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_CALL_TO_UNDEFINED_FUNCTION, 'DateTime', 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_2() {
		$this->assertEquals(
				Runtime::runSource('$date = new DateTimeUndefined(5);', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_CLASS_NOT_FOUND, 'DateTimeUndefined', 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_3() {
		$return = Runtime::runSource('$date = new DateTime(5);', array('Page') );
		$this->assertStringStartsWith('<span class="error">', $return[0] );
	}
	public function testRun_DateTime_exception_4() {
		$this->assertEquals(
				Runtime::runSource('$date = new DateTime(); $date->undefined();', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_CALL_TO_UNDEFINED_METHOD, array('DateTime', 'undefined'), 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_5() {
		$this->assertEquals(
				Runtime::runSource('$date = date_create_undefined();', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_CALL_TO_UNDEFINED_FUNCTION, 'date_create_undefined', 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_6() {
		$this->assertEquals(
				Runtime::runSource('new DateTime() + 5;', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateTime', 'int'), 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_7() {
		$this->assertEquals(
				Runtime::runSource('5 + new DateInterval("P2Y4DT6H8M");', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateInterval', 'int'), 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_8() {
		$this->assertEquals(
				Runtime::runSource('new DateTime() + new DateInterval("P2Y4DT6H8M");', array('Page') ),
				array(
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateTime', 'int'), 1, 'Page' ),
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateInterval', 'int'), 1, 'Page' )
				)
			);
	}
	public function testRun_DateTime_exception_9() {
		$this->assertEquals(
				Runtime::runSource('new DateTime() . 5;', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateTime', 'string'), 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_10() {
		$this->assertEquals(
				Runtime::runSource('5 . new DateInterval("P2Y4DT6H8M");', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateInterval', 'string'), 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_11() {
		$this->assertEquals(
				Runtime::runSource('new DateTime() . new DateInterval("P2Y4DT6H8M");', array('Page') ),
				array(
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateTime', 'string'), 1, 'Page' ),
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_OBJECT_CONVERTED, array('DateInterval', 'string'), 1, 'Page' )
				)
			);
	}
	public function testRun_DateTime_exception_12() {
		$this->assertEquals(
				Runtime::runSource('echo date_format(5, "Y-m-d");', array('Page') ),
				array(
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array('date_format', '1', 'DateTime', 'integer'), 1, 'Page' ),
					false
				)
			);
	}
	public function testRun_DateTime_exception_13() {
		$this->assertEquals(
				Runtime::runSource('echo date_format( new DateTime(), new DateTime() );', array('Page') ),
				array(
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER, array('date_format', '2', 'string', 'object'), 1, 'Page' ),
					false
				)
			);
	}
	public function testRun_DateTime_exception_14() {
		$this->assertEquals(
				Runtime::runSource('echo date_format(new DateTime(), "Y-m-d", 5);', array('Page') ),
				array(
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_EXACTLY_PARAMETERS, array('date_format', '2', '3'), 1, 'Page' ),
					false
				)
			);
	}
	public function testRun_DateTime_exception_15() {
		$this->assertEquals(
				Runtime::runSource('echo date_format(new DateTime());', array('Page') ),
				array(
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::WARNING_EXPECTS_EXACTLY_PARAMETERS, array('date_format', '2', '1'), 1, 'Page' ),
					false
				)
			);
	}
	public function testRun_DateTime_exception_16() {
		$this->assertEquals(
				Runtime::runSource('echo DateTime::format("Y-m-d");', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_NONSTATIC_CALLED_STATICALLY, array('DateTime', 'format'), 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_17() {
		$this->assertEquals(
				Runtime::runSource('echo new DateTime();', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_OBJECT_COULD_NOT_BE_CONVERTED, array('DateTime', 'string'), 1, 'Page' ) )
			);
	}
	public function testRun_DateTime_exception_18() {
		$this->assertEquals(
				Runtime::runSource('$foo = "DateTime"; echo $foo->format("Y-m-d");', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_CALL_FUNCTION_ON_NON_OBJECT, 'format', 1, 'Page' ) )
			);
	}

	public function testRun_datetime_format_1() {
		$this->assertEquals(
				Runtime::runSource('$date = date_create("2000-01-01"); echo date_format($date, "Y-m-d");'),
				array('2000-01-01')
			);
	}
	public function testRun_datetime_format_2() {
		$this->assertEquals(
				Runtime::runSource('$date = new DateTime("2000-01-01"); echo date_format($date, "Y-m-d");'),
				array('2000-01-01')
			);
	}
	public function testRun_datetime_format_3() {
		$this->assertEquals(
				Runtime::runSource('$date = new DateTime("2000-01-01"); echo $date->format("Y-m-d");'),
				array('2000-01-01')
			);
	}
	public function testRun_datetime_add_1() {
		$this->assertEquals(
				Runtime::runSource('
$date = new DateTime("2000-01-01");
$date->add(new DateInterval("P10D"));
echo $date->format("Y-m-d");'),
				array('2000-01-11')
			);
	}
	public function testRun_datetime_add_2() {
		$this->assertEquals(
				Runtime::runSource('
$method = "add";
$date = new DateTime( "2000-01-01" );
$date->$method( new DateInterval("P10D") );
echo $date->format( "Y-m-d" );'),
				array('2000-01-11')
			);
	}

	public function testRun_DateInterval_1() {
		$this->assertEquals(
				Runtime::runSource('
$i = new DateInterval("P2Y4DT6H8M");
echo $i->y;
echo $i->yyyyyy;', array('Page') ),
				array(
					2,
					(string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_UNDEFINED_PROPERTY, array('DateInterval', 'yyyyyy'), 4, 'Page' ),
					null,
				)
			);
	}
	public function testRun_DateInterval_2() {
		$di = \DateInterval::createFromDateString("last thursday of next month");
		$this->assertEquals(
				Runtime::runSource( '$di = DateInterval::createFromDateString("last thursday of next month"); echo $di->d;' ),
				array( $di->d )
			);
	}

	public function testRun_DateTimeZone_1() {
		$date = new \DateTime("2000-01-01", new \DateTimeZone("Pacific/Nauru"));
		$this->assertEquals(
				Runtime::runSource('
$date = new DateTime("2000-01-01", new DateTimeZone("Pacific/Nauru"));
echo $date->format("Y-m-d H:i:sP");', array('Page') ),
				array( $date->format("Y-m-d H:i:sP") )
			);
	}

	public function testRun_date_date_set_1() {
		$this->assertEquals(
				Runtime::runSource('
$date = date_create();
date_date_set($date, 2001, 2, 3);
echo date_format($date, "Y-m-d");'),
				array('2001-02-03')
			);
	}
	public function testRun_date_date_set_2() {
		$this->assertEquals(
				Runtime::runSource('
$date = new DateTime();
$date->setDate(2001, 2, 3);
echo $date->format("Y-m-d");'),
				array('2001-02-03')
			);
	}

	public function testRun_DatePeriod_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo DatePeriod::EXCLUDE_START_DATE;' ),
				array( \DatePeriod::EXCLUDE_START_DATE )
			);
	}
	public function testRun_DatePeriod_2() {
		$this->assertEquals(
				Runtime::runSource( 'echo DatePeriod::UNDEFINED;', array('Page') ),
				array( (string) new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::NOTICE_UNDEFINED_CLASS_CONSTANT, array('DatePeriod', 'UNDEFINED'), 1, 'Page' ), null )
			);
	}
	public function testRun_DateTime_1() {
		$this->assertEquals(
				Runtime::runSource( 'echo DateTime::ATOM;' ),
				array( \DateTime::ATOM )
			);
	}

}