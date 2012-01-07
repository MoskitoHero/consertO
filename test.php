<?php 

namespace base;

Class App
{
	function __construct()
	{
		$this->t = new \base\alpha\Two();
	}
	
	function play()
	{
		echo "Play Yvette";
	}
}

namespace base\alpha;

Class One Extends \base\App

{
	function __construct()
	{
		echo "Class One loaded";
		parent::play();
		$a->play();
	}
}

namespace base\alpha;

Class Two Extends One
{
}

use App;
$a = new \base\App();


?>