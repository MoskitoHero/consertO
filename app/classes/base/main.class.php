<?php
/**
* 
*/

namespace base;

class Main

{	
	function dump(){
		echo "<h1>" . get_class($this) . " :</h1><p><pre>";
		var_dump($this);
		echo "</pre></p><p>&nbsp;</p>";
	}
}

?>