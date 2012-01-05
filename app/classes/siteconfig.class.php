<?php
/**
* 
*/

class siteConfig
{
	private $mainConfig; // object
	
	function __construct()
	{
		//$this->mainConfig = simplexml_load_file(APP_ROOT_DIR .'/config/config.xml');
		$json = file_get_contents(APP_ROOT_DIR .'/config/config.json');
		$this->jsonConfig = json_decode($json);
	}
	
	function getHeaderConfig(){
		foreach ($this->jsonConfig->header as $k => $v){
			$array[$k] = $v;
		}
		$array['css'] = $this->getCssConfig();
		$array['js'] = $this->getJsConfig();
		//print_r($array);
		return $array;
	}
	
	function getFooterConfig(){
		foreach ($this->jsonConfig->footer as $k => $v){
			$array[$k] = $v;
		}
		return $array;
	}
	
	function getCssConfig(){
		foreach ($this->jsonConfig->css as $k => $v){
			$array[] = $this->getAssetURI($v->source, 'css');
		}
		return $array;
	}
	
	function getJsConfig(){
		foreach ($this->jsonConfig->js as $k => $v){
			$array[] = $this->getAssetURI($v->source, 'js');
		}
		return $array;
	}
	
	private function getAssetURI($string, $type) {
		if (strstr($string, 'http://') == false ) {
			$string = APP_ROOT_URL . 'assets/' . $type . '/' . $string;
		}
		return $string;
	}
}
?>