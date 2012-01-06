<?php

namespace base;

class Tweeg extends \Twig_Extension
{
    public function getName()
    {
        return 'project';
    }
	
	public function eraseNotice()
	{
		$this->session = new \base\Session();
		if ($_SERVER["REQUEST_METHOD"]==GET){
			$this->session->unsetVar("notice");
		}
	}
	
}

?>