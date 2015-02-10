<?php
namespace PhpTagsObjects;

/**
 * Description of PhpTagsFuncNativeObject
 *
 * @author pastakhov
 */
class PhpTagsFuncDatePeriod extends PhpTagsFuncNativeObject {

	public function m___construct() {
		$argCount = func_num_args();
		$arguments = func_get_args();

		switch ( $argCount ) {
			case 1:
				if ( false === is_string( $arguments[0] ) ) {
					return new \PhpTags\PhpTagsException(
						\PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER,
						array( 'DatePeriod::__construct', 2, 'string', gettype( $arguments[0] ) )
					);
				}
				break;
			case 2:
				if ( false === is_string( $arguments[0] ) ) {
					return new \PhpTags\PhpTagsException(
						\PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER,
						array( 'DatePeriod::__construct', 2, 'string', gettype( $arguments[0] ) )
					);
				}
				if ( false === is_int( $arguments[1] ) ) {
					return new \PhpTags\PhpTagsException(
						\PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER,
						array( 'DatePeriod::__construct', 2, 'int', gettype( $arguments[1] ) )
					);
				}
				break;
			case 3:
			case 4:
				if ( false === is_string( $arguments[0] ) ) {
					return new \PhpTags\PhpTagsException(
						\PhpTags\PhpTagsException::WARNING_EXPECTS_PARAMETER,
						array( 'DatePeriod::__construct', 2, 'string', gettype( $arguments[0] ) )
					);
				}
				break;
		}

		return parent::m___construct( $arguments );
	}

}
