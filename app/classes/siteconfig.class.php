<?php
/**
* 
*/
class siteConfig
{
	private $mainConfig; // object
	
	function __construct()
	{
		$this->mainConfig = simplexml_load_file(APP_ROOT_DIR .'/config/config.xml');
	}
	
	function getHeaderConfig(){
		foreach ($this->mainConfig->header->item as $k => $v){
			$attr_name = (string)$v->attributes()->name;
			$array[$attr_name] = $v;
		}
		$array['css']=$this->getCssConfig();
		$array['js']=$this->getJsConfig();
		//print_r($array);
		return $array;
	}
	
	function getFooterConfig(){
		foreach ($this->mainConfig->footer->item as $k => $v){
			$attr_name = (string)$v->attributes()->name;
			$array[$attr_name] = $v;
		}
		return $array;
	}
	
	function getCssConfig(){
		foreach ($this->mainConfig->css->item as $k => $v){
			$string = (string)$v;
			if (strstr($string, 'http://') == false ) {
				$string = APP_ROOT_URL . 'assets/css/' . $string;
			}
			$array[] = $string;
		}
		return $array;
	}
	
	function getJsConfig(){
		foreach ($this->mainConfig->js->item as $k => $v){
			$string = (string)$v;
			if (strstr($string, 'http://') == false ) {
				$string = APP_ROOT_URL . 'assets/js/' . $string;
			}
			$array[] = $string;
		}
		return $array;
	}
}
?>