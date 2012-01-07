<?php

/*
**
** Paginator class
**
*/

namespace base;

class Paginator extends Main
{

	private $present;
	public $limit;
	private $nbpages;
	private $route;
	
	private static $instance;


	function init($path, $params=1, $table, $nb = 5) {
		if( $params=='' || preg_match('/\d/',$params) != 0 ) {
			$limit = ($params == '' || $params==1)?$nb:($params-1)*$nb . "," . $nb;
		}
		$nbrows = \R::count($table);
		$this->path = $path;
		$this->present = ($params == "")? "1" : $params;
		$this->limit = $limit;
		$this->nbpages = intval( $nbrows / $nb ) + 1 ;
	}
	
	function paginate() {
		if ( $this->nbpages > 30 ) {
			$return[] = "<ul class='paginator'>\n";
			if ( $this->present > 15 && $this->present < $this->nbpages - 15 ) {
				$return[] = "<li>";
				$return[] = "<a href='". $this->path . "1'>";
				$return[] = "&lt;&lt;&lt; ";
				$return[] = "</a>";
				$return[] = "</li>";
				$return[] = "<li>. . .</li>";
				if ( $this->present > 25 ) {
				$prev = $this->present - 10;
				$return[] = "<li>";
				$return[] = "<a href='". $this->path . $prev . "'>";
				$return[] = "&lt; prec";
				$return[] = "</a>";
				$return[] = "</li>";
				}
				$this->tneserp = $this->nbpages - $this->present;
				$max = ($this->tneserp>15)?$this->present+12:$this->tneserp;
				for( $i = $this->present-12 ; $i <= $max ; $i++ ) {
					if ( $i != $this->present ) {
						$a_before = "<a href='". $this->path . $i . "'>";
						$a_after = "</a>";
					} else {
						$a_before = "";
						$a_after = "";
					}
					$return[] = "<li>";
					$return[] = $a_before;
					$return[] = $i;
					$return[] = $a_after;
					$return[] = "</li>";
				}
				if ( $this->tneserp > 15 ) {
					$next = $this->present + 10;
					$return[] = "<li>";
					$return[] = "<a href='". $this->path . $next . "'>";
					$return[] = "next &gt;";
					$return[] = "</a>";
					$return[] = "</li>";
				}
				$return[] = "<li>. . .</li>";
				$return[] = "<li>";
				$return[] = "<a href='". $this->path . $this->nbpages . "'>";
				$return[] = " &gt;&gt;&gt;";
				$return[] = "</a>";
				$return[] = "</li>";
			} elseif ( $this->present <= 15) {
				if ( $this->present != 1 ) {
					$prev = $this->present - 1;
					$return[] = "<li>";
					$return[] = "<a href='". $this->path . $prev . "'>";
					$return[] = "&lt; prec";
					$return[] = "</a>";
					$return[] = "</li>";
				}
				for( $i = 1 ; $i <= 30 ; $i++ ) {
					if ( $i != $this->present ) {
						$a_before = "<a href='". $this->path . $i . "'>";
						$a_after = "</a>";
					} else {
						$a_before = "";
						$a_after = "";
					}
					$return[] = "<li>";
					$return[] = $a_before;
					$return[] = $i;
					$return[] = $a_after;
					$return[] = "</li>";
				}
				if ( $this->present != $this->nbpages ) {
					$next = $this->present + 10;
					$return[] = "<li>";
					$return[] = "<a href='". $this->path . $next . "'>";
					$return[] = "next &gt;";
					$return[] = "</a>";
					$return[] = "</li>";
					$return[] = "<li>. . .</li>";
					$return[] = "<li>";
					$return[] = "<a href='". $this->path . $this->nbpages . "'>";
					$return[] = " &gt;&gt;&gt;";
					$return[] = "</a>";
					$return[] = "</li>";
				}
			} else {
			//-->
				$return[] = "<li>";
				$return[] = "<a href='". $this->path . "1'>";
				$return[] = "&lt;&lt;&lt; ";
				$return[] = "</a>";
				$return[] = "</li>";
				$return[] = "<li>. . .</li>";
				$prev = $this->present - 10;
				$return[] = "<li>";
				$return[] = "<a href='". $this->path . $prev . "'>";
				$return[] = "&lt; prec";
				$return[] = "</a>";
				$return[] = "</li>";
				$this->tneserp = $this->nbpages - $this->present;
				$max = ($this->tneserp > 15)?$this->present+15:$this->nbpages;
				for( $i = $this->present-12 ; $i <= $max ; $i++ ) {
					if ( $i != $this->present ) {
						$a_before = "<a href='". $this->path . $i . "'>";
						$a_after = "</a>";
					} else {
						$a_before = "";
						$a_after = "";
					}
					$return[] = "<li>";
					$return[] = $a_before;
					$return[] = $i;
					$return[] = $a_after;
					$return[] = "</li>";
				}
				if ( $this->present != $this->nbpages ) {
					$next = $this->present + 1;
					$return[] = "<li>";
					$return[] = "<a href='". $this->path . $next . "'>";
					$return[] = "next &gt;";
					$return[] = "</a>";
					$return[] = "</li>";
				}
			//-->
			}
			$return[] = "\n</ul>\n";
		} else {
			if ( $this->nbpages > 1 ) {
				$return[] = "<ul class='paginator'>\n";
				if ( $this->present != 1 ) {
					$prev = $this->present - 1;
					$return[] = "<li>";
					$return[] = "<a href='". $this->path . $prev . "'>";
					$return[] = "&lt; prec";
					$return[] = "</a>";
					$return[] = "</li>";
				}
				for( $i = 1 ; $i <= $this->nbpages ; $i++ ) {
					if ( $i != $this->present ) {
						$a_before = "<a href='". $this->path . $i . "'>";
						$a_after = "</a>";
					} else {
						$a_before = "";
						$a_after = "";
					}
					$return[] = "<li>";
					$return[] = $a_before;
					$return[] = $i;
					$return[] = $a_after;
					$return[] = "</li>";
				}
				if ( $this->present != $this->nbpages ) {
					$next = $this->present + 1;
					$return[] = "<li>";
					$return[] = "<a href='". $this->path . $next . "'>";
					$return[] = "next &gt;";
					$return[] = "</a>";
					$return[] = "</li>";
				}
				$return[] = "\n</ul>\n";
			}
		}
		if(!empty($r)){
			$r = implode('', $return);
		} else {
			$r = false;
		}
		return $r;
	}
	
	public static function singleton()
    {
        if (!isset(self::$instance)) {
            //echo 'Creating new instance of : ';
            $className = __CLASS__;
            //echo $className;
            self::$instance = new $className;
        }
        return self::$instance;
    }
    
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Unserializing is not allowed.', E_USER_ERROR);
    }
}
?>