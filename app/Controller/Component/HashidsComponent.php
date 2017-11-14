<?php
App::uses('Component', 'Controller');
App::import('Vendor', 'Hashids' . DS . 'HashGenerator');
App::import('Vendor', 'Hashids' . DS . 'Hashids');

/*

  
// encode several numbers into one id 
$id = HashidsComponent::encode(1337, 5, 77, 12345678);
// decode that id back 
$numbers = HashidsComponent::decode($id);
var_dump($id, $numbers);

 
*/

class HashidsComponent extends Component {

  private static $hashids;

  public function __construct(ComponentCollection $collection = null, $settings = array()) {
    $settings = Set::merge(array (
        'salt' => '',
        'min_hash_length' => 0,
        'alphabet' => ''
    ), $settings);

    self::$hashids = new Hashids\Hashids($settings['salt'], $settings['min_hash_length'], $settings['alphabet']);
  }

  public static function encode() {
    return call_user_func_array(array (
        self::$hashids,
        'encode'
    ), func_get_args());
  }

  public static function decode($hash, $array = false) {
    $result = self::$hashids->decode($hash);

    if ($array) {
        return $result;
    }

	if (!empty($result)) {
	    return $result[0];
	}
	
	return false;
  }

  public static function encode_hex($str) {
    return self::$hashids->encode_hex($str);
  }

  public static function decode_hex($hash) {
    return self::$hashids->decode_hex($hash);
  }

  public static function get_max_int_value() {
    return self::$hashids->get_max_int_value();
  }
}
