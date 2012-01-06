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
				$this->$obj = new $Class();
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
}
?>