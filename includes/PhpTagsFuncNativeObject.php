<?php
namespace PhpTagsObjects;

/**
 * Description of PhpTagsFuncNativeObject
 *
 * @author pastakhov
 */
class PhpTagsFuncNativeObject extends \PhpTags\GenericObject {

	public function m___construct() {
		$arguments = func_get_args();
		foreach ( $arguments as &$arg ) {
			if ( $arg instanceof \PhpTags\GenericObject ) {
				$arg = $arg->getValue();
			}
		}

		$reclass = new \ReflectionClass( $this->name );
		$object = $reclass->newInstanceArgs( $arguments );
		if ( is_object($object) ) {
			$this->value = $object;
			return true;
		}
		$this->value = null;
		return false;
	}

	public function __call( $name, $arguments ) {
		list ( $callType, $subname ) = explode( '_', $name, 2 );
		switch ( $callType ) {
			case 'm':
				if ( method_exists( $this->value, $subname ) ) {
					foreach ( $arguments as &$arg ) {
						if( $arg instanceof \PhpTags\GenericObject ) {
							$arg = $arg->getValue();
						}
					}
					$return = call_user_func_array( array($this->value, $subname), $arguments );
					if ( is_object($return) ) {
						$return = \PhpTags\Hooks::getObjectWithValue( get_class($return), $return );
					}
					return $return;
				}
				break;
			case 'p':
				$object_vars = get_object_vars( $this->value );
				if ( isset( $object_vars[$subname] ) ) {
					return $this->value->$subname;
				}
				break;
		}
		return parent::__call( $name, $arguments );
	}

	public static function __callStatic( $name, $arguments ) {
		list ( $callType, $subname ) = explode( '_', $name, 2 );
		$object = \PhpTags\Hooks::$objectName;
		switch ( $callType ) {
			case 's': // static method
				$reflect = new \ReflectionClass( $object );
				try {
					$method = $reflect->getMethod( $subname );
					if( true === $method->isStatic() ) {
						$return = call_user_func_array( array($object, $subname), $arguments );
						if ( is_object($return) ) {
							$return = \PhpTags\Hooks::getObjectWithValue( get_class($return), $return );
						}
						return $return;
					} else {
						throw new \PhpTags\PhpTagsException( \PhpTags\PhpTagsException::FATAL_NONSTATIC_CALLED_STATICALLY, array($object, $subname) );
					}
				} catch (ReflectionException $e) {}

				if ( method_exists( $object, $subname ) ) {
					foreach ( $arguments as &$arg ) {
						if( $arg instanceof \PhpTags\GenericObject ) {
							$arg = $arg->getValue();
						}
					}
					$return = call_user_func_array( array($object, $subname), $arguments );
					if ( is_object($return) ) {
						$return = \PhpTags\Hooks::getObjectWithValue( get_class($return), $return );
					}
					return $return;
				}
				break;
			case 'c': // constant
				$reflect = new \ReflectionClass( $object );
				if ( true === $reflect->hasConstant( $subname ) ) {
					return $reflect->getConstant( $subname );
				}
				break;
		}
		return parent::__callStatic( $name, $arguments );
	}

	public function isInstanceOf( $class_name ) {
		return $this->value instanceof $class_name;
	}

}
