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

	public function testRun_array_flip_1() {
		$return = Runtime::runSource('
$trans = array("a" => 1, "b" => 1, "c" => 2);
$trans = array_flip($trans);
print_r($trans);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(1=>'b', 2=>'c'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_intersect_assoc_1() {
		$return = Runtime::runSource('
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "b" => "yellow", "blue", "red");
$result_array = array_intersect_assoc($array1, $array2);
print_r($result_array);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('a'=>'green'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_intersect_key_1() {
		$return = Runtime::runSource('
$array1 = array("blue"  => 1, "red"  => 2, "green"  => 3, "purple" => 4);
$array2 = array("green" => 5, "blue" => 6, "yellow" => 7, "cyan"   => 8);
print_r(array_intersect_key($array1, $array2));');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('blue'=>1,'green'=>3), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_intersect_1() {
		$return = Runtime::runSource('
$array1 = array("a" => "green", "red", "blue");
$array2 = array("b" => "green", "yellow", "red");
$result = array_intersect($array1, $array2);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('a'=>'green', 0=>'red'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_key_exists_1() {
		$return = Runtime::runSource('
$search_array = array("first" => 1, "second" => 4);
if (array_key_exists("first", $search_array)) {
    echo "The \"first\" element is in the array";
}');
		$this->assertEquals(
				$return[0],
				'The "first" element is in the array'
			);
	}

	public function testRun_array_keys_1() {
		$return = Runtime::runSource('
$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0, 'color'), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_keys_2() {
		$return = Runtime::runSource('
$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0, 3, 4), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_keys_3() {
		$return = Runtime::runSource('
$array = array("color" => array("blue", "red", "green"),
               "size"  => array("small", "medium", "large"));
print_r(array_keys($array));');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('color', 'size'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_merge_recursive_1() {
		$return = Runtime::runSource('
$ar1 = array("color" => array("favorite" => "red"), 5);
$ar2 = array(10, "color" => array("favorite" => "green", "blue"));
$result = array_merge_recursive($ar1, $ar2);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('color'=>array('favorite'=>array('red','green'), 0=>'blue'),0=>5,1=>10), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_merge_1() {
		$return = Runtime::runSource('
$beginning = "foo";
$end = array(1 => "bar");
$result = array_merge((array)$beginning, (array)$end);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('foo', 'bar'), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_merge_2() {
		$return = Runtime::runSource('
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('color'=>'green', 0=>2, 1=>4, 2=>'a', 3=>'b', 'shape'=>'trapezoid', 4=>4,), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_merge_3() {
		$return = Runtime::runSource('
$array1 = array();
$array2 = array(1 => "data");
$result = array_merge($array1, $array2);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('data'), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_merge_4() {
		$return = Runtime::runSource('
$array1 = array(0 => "zero_a", 2 => "two_a", 3 => "three_a");
$array2 = array(1 => "one_b", 3 => "three_b", 4 => "four_b");
$result = $array1 + $array2;
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0=>'zero_a', 2=>'two_a', 3=>'three_a', 1=>'one_b', 4=>'four_b'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_multisort_1() {
		$return = Runtime::runSource('
$ar1 = array(10, 100, 100, 0);
$ar2 = array(1, 3, 2, 4);
array_multisort($ar1, $ar2);

print_r($ar1);
print_r($ar2);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0,10,100,100), true) ),
				(string) $return[0]
			);
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(4,1,2,3), true) ),
				(string) $return[1]
			);
	}
	public function testRun_array_multisort_2() {
		$return = Runtime::runSource('
$ar = array(
       array("10", 11, 100, 100, "a"),
       array(   1,  2, "2",   3,   1)
      );
array_multisort($ar[0], SORT_ASC, SORT_STRING,
                $ar[1], SORT_NUMERIC, SORT_DESC);
print_r($ar);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array( array('10',100,100,11,'a'), array(1,3,'2',2,1) ), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_pad_1() {
		$return = Runtime::runSource('
$input = array(12, 10, 9);
print_r( array_pad($input, 5, 0) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(12, 10, 9, 0, 0), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_pad_2() {
		$return = Runtime::runSource('print_r( array_pad($input, -7, -1) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(-1, -1, -1, -1, 12, 10, 9), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_pad_3() {
		$return = Runtime::runSource('print_r( array_pad($input, 2, "noop") );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(12, 10, 9), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_pop_1() {
		$return = Runtime::runSource('
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_pop($stack);
print_r($stack);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('orange', 'banana', 'apple'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_product_1() {
		$return = Runtime::runSource('
$a = array(2, 4, 6, 8);
echo "product(a) = " . array_product($a);
echo "product(array()) = " . array_product(array());');
		$this->assertEquals(
				$return,
				array('product(a) = 384', 'product(array()) = 1')
			);
	}

	public function testRun_array_push_1() {
		$return = Runtime::runSource('
$stack = array("orange", "banana");
array_push($stack, "apple", "raspberry");
print_r($stack);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('orange', 'banana', 'apple', 'raspberry'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_rand_1() {
		$return = Runtime::runSource('
$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";');
		$this->assertCount(2 ,$return);
	}

	public function testRun_array_replace_recursive_1() {
		$return = Runtime::runSource('
$base = array("citrus" => array( "orange") , "berries" => array("blackberry", "raspberry"), );
$replacements = array("citrus" => array("pineapple"), "berries" => array("blueberry"));

$basket = array_replace_recursive($base, $replacements);
print_r($basket);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('citrus'=>array('pineapple'),'berries'=>array('blueberry','raspberry')), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_replace_recursive_2() {
		$return = Runtime::runSource('
$base = array("citrus" => array("orange") , "berries" => array("blackberry", "raspberry"), "others" => "banana" );
$replacements = array("citrus" => "pineapple", "berries" => array("blueberry"), "others" => array("litchis"));
$replacements2 = array("citrus" => array("pineapple"), "berries" => array("blueberry"), "others" => "litchis");
$basket = array_replace_recursive($base, $replacements, $replacements2);
print_r($basket);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('citrus'=>array('pineapple'),'berries'=>array('blueberry','raspberry'),'others'=>'litchis'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_replace_1() {
		$return = Runtime::runSource('
$base = array("orange", "banana", "apple", "raspberry");
$replacements = array(0 => "pineapple", 4 => "cherry");
$replacements2 = array(0 => "grape");
$basket = array_replace($base, $replacements, $replacements2);
print_r($basket);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('grape','banana','apple','raspberry','cherry'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_reverse_1() {
		$return = Runtime::runSource('
$input  = array("php", 4.0, array("green", "red"));
$reversed = array_reverse($input);
print_r($reversed);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(array('green','red'),'4','php'), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_reverse_2() {
		$return = Runtime::runSource('
$input  = array("php", 4.0, array("green", "red"));
$preserved = array_reverse($input, true);
print_r($preserved);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(2=>array('green','red'),1=>'4',0=>'php'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_search_1() {
		$return = Runtime::runSource('
$array = array(0 => "blue", 1 => "red", 2 => "green", 3 => "red");
echo array_search("green", $array); // $key = 2;
echo array_search("red", $array);   // $key = 1;');
		$this->assertEquals(
				$return,
				array( 2, 1 )
			);
	}

	public function testRun_array_shift_1() {
		$return = Runtime::runSource('
$stack = array("orange", "banana", "apple", "raspberry");
$fruit = array_shift($stack);
print_r($stack);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("banana", "apple", "raspberry"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_slice_1() {
		$return = Runtime::runSource('
$input = array("a", "b", "c", "d", "e");
print_r( array_slice($input, 2) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("c", "d", "e"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_slice_2() {
		$return = Runtime::runSource('print_r( array_slice($input, -2, 1) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("d"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_slice_3() {
		$return = Runtime::runSource('print_r( array_slice($input, 0, 3) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("a", "b", "c"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_slice_4() {
		$return = Runtime::runSource('print_r( array_slice($input, 2, -1) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("c", "d"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_slice_5() {
		$return = Runtime::runSource('print_r( array_slice($input, 2, -1, true) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(2=>"c", 3=>"d"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_splice_1() {
		$return = Runtime::runSource('
$input = array("red", "green", "blue", "yellow");
array_splice($input, 2);
print_r( $input );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("red", "green"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_splice_2() {
		$return = Runtime::runSource('
$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, -1);
print_r( $input );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("red", "yellow"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_splice_3() {
		$return = Runtime::runSource('
$input = array("red", "green", "blue", "yellow");
array_splice($input, 1, count($input), "orange");
print_r( $input );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("red", "orange"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_splice_4() {
		$return = Runtime::runSource('
$input = array("red", "green", "blue", "yellow");
array_splice($input, -1, 1, array("black", "maroon"));
print_r( $input );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("red", "green", "blue", "black", "maroon"), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_splice_5() {
		$return = Runtime::runSource('
$input = array("red", "green", "blue", "yellow");
array_splice($input, 3, 0, "purple");
print_r( $input );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("red", "green", "blue", "purple", "yellow"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_sum_1() {
		$return = Runtime::runSource('
$a = array(2, 4, 6, 8);
echo "sum(a) = " . array_sum($a);');
		$this->assertEquals(
				$return,
				array( 'sum(a) = 20' )
			);
	}
	public function testRun_array_sum_2() {
		$return = Runtime::runSource('
$b = array("a" => 1.2, "b" => 2.3, "c" => 3.4);
echo "sum(b) = " . array_sum($b);');
		$this->assertEquals(
				$return,
				array( 'sum(b) = 6.9' )
			);
	}

	public function testRun_array_unique_1() {
		$return = Runtime::runSource('
$input = array("a" => "green", "red", "b" => "green", "blue", "red");
$result = array_unique($input);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('a'=>'green', 0=>'red', 1=>'blue'), true) ),
				(string) $return[0]
			);
	}
	public function testRun_array_unique_2() {
		$return = Runtime::runSource('
$input = array(4, "4", "3", 4, 3, "3");
$result = array_unique($input);
print_r($result);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0=>4, 2=>'3'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_values_1() {
		$return = Runtime::runSource('
$array = array("size" => "XL", "color" => "gold");
print_r(array_values($array));');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('XL', 'gold'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_array_unshift_1() {
		$return = Runtime::runSource('
$queue = array("orange", "banana");
array_unshift($queue, "apple", "raspberry");
print_r($queue);');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("apple", "raspberry", "orange", "banana"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_arsort_1() {
		$return = Runtime::runSource('
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
arsort($fruits);
print_r( $fruits );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("a" => "orange", "d" => "lemon", "b" => "banana", "c" => "apple"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_asort_1() {
		$return = Runtime::runSource('
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
asort($fruits);
print_r( $fruits );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("c" => "apple", "b" => "banana", "d" => "lemon", "a" => "orange"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_count_1() {
		$this->assertEquals(
				Runtime::runSource('$transport = array("foot", "bike", "car", "plane"); echo count($transport);'),
				array( '4' )
				);
	}
	public function testRun_current_1() {
		$this->assertEquals(
				Runtime::runSource('echo current($transport);'),
				array( 'foot' )
				);
	}
	public function testRun_next_1() {
		$this->assertEquals(
				Runtime::runSource('echo next($transport), next($transport);'),
				array( 'bike', 'car' )
				);
	}
	public function testRun_current_2() {
		$this->assertEquals(
				Runtime::runSource('echo current($transport);'),
				array( 'car' )
				);
	}
	public function testRun_each_1() {
		$this->assertEquals(
				Runtime::runSource('$a = each( $transport); echo $a[0], $a[1], $a["key"], $a["value"];'),
				array( '2', 'car', '2', 'car' )
				);
	}
	public function testRun_end_1() {
		$this->assertEquals(
				Runtime::runSource('echo end($transport);'),
				array( 'plane' )
				);
	}
	public function testRun_prev_1() {
		$this->assertEquals(
				Runtime::runSource('echo prev($transport);'),
				array( 'car' )
				);
	}
	public function testRun_key_1() {
		$this->assertEquals(
				Runtime::runSource('echo key($transport);'),
				array( '2' )
				);
	}
	public function testRun_reset_1() {
		$this->assertEquals(
				Runtime::runSource('echo reset($transport);'),
				array( 'foot' )
				);
	}
	public function testRun_key_2() {
		$this->assertEquals(
				Runtime::runSource('echo key($transport);'),
				array( '0' )
				);
	}

	public function testRun_each_2() {
		$this->assertEquals(
				Runtime::runSource('
$fruit = array("a" => "apple", "b" => "banana", "c" => "cranberry");
reset($fruit);
list($key, $val) = each($fruit);
echo "$key => $val";'),
				array('a => apple')
				);
	}
	public function testRun_echo_list_while_1() {
		$this->assertEquals(
				Runtime::runSource('
$fruit = array("a" => "apple", "b" => "banana", "c" => "cranberry");
reset($fruit);
while ( list($key, $val) = each($fruit) ) {
    echo "$key => $val";
}'),
				array('a => apple', 'b => banana', 'c => cranberry')
				);
	}
	public function testRun_echo_next_while_1() {
		$this->assertEquals(
				Runtime::runSource('
	$array = array(
    "fruit1" => "apple",
    "fruit2" => "orange",
    "fruit3" => "grape",
    "fruit4" => "apple",
    "fruit5" => "apple");
// this cycle echoes all associative array
// key where value equals "apple"
while ($fruit_name = current($array)) {
    if ($fruit_name == "apple") {
        echo key($array)."<br />";
    }
    next($array);
}'),
				array('fruit1<br />', 'fruit4<br />', 'fruit5<br />')
			);
	}
	public function testRun_echo_while_function_1() {
		$this->assertEquals(
				Runtime::runSource('
$foo = [1,2];
while ( count($foo) < 4 ) array_push($foo, 8);
echo $foo == [1,2,8,8] ? "true" : false;'),
				array('true')
				);
	}

	public function testRun_in_array_1() {
		$this->assertEquals(
				Runtime::runSource('
$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Нашел Irix";
}
if (in_array("mac", $os)) {
    echo "Нашел mac";
}'),
				array( 'Нашел Irix' )
				);
	}
	public function testRun_in_array_2() {
		$this->assertEquals(
				Runtime::runSource('
$a = array("1.10", 12.4, 1.13);

if (in_array("12.4", $a, true)) {
    echo "12.4 найдено со строгой проверкой";
}

if (in_array(1.13, $a, true)) {
    echo "1.13 найдено со строгой проверкой";
}'),
				array( '1.13 найдено со строгой проверкой' )
				);
	}

	public function testRun_krsort_1() {
		$return = Runtime::runSource('
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
krsort($fruits);
print_r( $fruits );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("d" => "lemon", "c" => "apple", "b" => "banana", "a" => "orange"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_ksort_1() {
		$return = Runtime::runSource('
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");
ksort($fruits);
print_r( $fruits );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array("a" => "orange", "b" => "banana", "c" => "apple", "d" => "lemon"), true) ),
				(string) $return[0]
			);
	}

	public function testRun_natcasesort_1() {
		$return = Runtime::runSource('
$array2 = array("IMG0.png", "img12.png", "img10.png", "img2.png", "img1.png", "IMG3.png");
natcasesort($array2);
print_r( $array2 );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0=>'IMG0.png', 4=>'img1.png', 3=>'img2.png', 5=>'IMG3.png', 2=>'img10.png', 1=>'img12.png'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_natsort_1() {
		$return = Runtime::runSource('
$array2 = array("img12.png", "img10.png", "img2.png", "img1.png");
natsort($array2);
print_r( $array2 );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(3=>'img1.png', 2=>'img2.png', 1=>'img10.png', 0=>'img12.png'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_range_1() {
		$return = Runtime::runSource('print_r( range(0, 3) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0, 1, 2, 3), true) ),
				(string) $return[0]
			);
	}
	public function testRun_range_2() {
		$return = Runtime::runSource('print_r( range(0, 30, 10) );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array(0, 10, 20, 30), true) ),
				(string) $return[0]
			);
	}

	public function testRun_rsort_1() {
		$return = Runtime::runSource('
$fruits = array("lemon", "orange", "banana", "apple");
rsort($fruits);
print_r( $fruits );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('orange', 'lemon', 'banana', 'apple'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_shuffle_1() {
		$return = Runtime::runSource('
$numbers = range(1, 20);
echo shuffle($numbers) === true ? "true" : "false";');
		$this->assertEquals(
				array( 'true' ),
				$return
			);
	}

	public function testRun_sort_1() {
		$return = Runtime::runSource('
$fruits = array("lemon", "orange", "banana", "apple");
sort($fruits);
print_r( $fruits );');
		$this->assertEquals(
				(string) new outPrint( null, print_r(array('apple', 'banana', 'lemon', 'orange'), true) ),
				(string) $return[0]
			);
	}

	public function testRun_echo_if_else_simple_function_1() {
		$this->assertEquals(
				Runtime::runSource('$foo = [1,2,3]; if ( true ) array_pop($foo); else array_push($foo, 4); echo  $foo == [1,2] ? "true" : "false";'),
				array('true')
				);
	}
	public function testRun_echo_if_else_simple_function__2() {
		$this->assertEquals(
				Runtime::runSource('$foo = [1,2,3]; if ( false ) array_pop($foo); else array_push($foo, 4); echo  $foo == [1,2,3,4] ? "true" : "false";'),
				array('true')
				);
	}
	public function testRun_echo_if_else_simple_function__3() {
		$this->assertEquals(
				Runtime::runSource('$foo = [1,2,3]; if ( true ) array_pop($foo); else array_push($foo, 4); echo  $foo == [1,2] ? "true" : "false"; echo " always!";'),
				array('true', ' always!')
				);
	}
	public function testRun_echo_if_else_simple_function__4() {
		$this->assertEquals(
				Runtime::runSource('$foo = [1,2,3]; if ( false ) array_pop($foo); else array_push($foo, 4); echo  $foo == [1,2,3,4] ? "true" : "false"; echo " always!";'),
				array('true', ' always!')
				);
	}
	public function testRun_echo_if_else_simple_variable_1() {
		$this->assertEquals(
				Runtime::runSource('if ( true ) $foo="true"; else $foo="false"; echo  $foo;'),
				array('true')
				);
	}
	public function testRun_echo_if_else_simple_variable_2() {
		$this->assertEquals(
				Runtime::runSource('if ( false ) $foo="true"; else $foo="false"; echo  $foo;'),
				array('false')
				);
	}

}
