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
		if ($this->session->var->route["method"] == "GET" ){
			$this->session->unsetVar("notice");
		}
	}
	
}

?>