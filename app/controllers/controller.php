<?php
/**
* 
*/
namespace base;

class Controller extends Main

{
	public $status;
	
	function loadComponents($components){
		if (!empty($components)) {
			foreach ($components as $Class => $obj) {
				$this->$obj = $Class::singleton();
			}
		}
	}
	
	function index() {
	}
	
	function add() {
	}
	
	function edit() {
	}
	
	function delete() {
	}
	
	function view() {
	}
	
	public function __call($name, $arguments) {
		//echo "Calling object method '$name' " . implode(', ', $arguments). "\n";
		return false;
	}

	public static function __callStatic($name, $arguments) {
		//echo "Calling static method '$name' " . implode(', ', $arguments). "\n";
		return false;
	}
	
	function slug($str)
	{
		$str = strtolower(trim($str));
		$str = preg_replace('/[^a-z0-9-]/', '-', $str);
		$str = preg_replace('/-+/', "-", $str);
		return $str;
	}
}
?>