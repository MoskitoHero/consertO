<?php

/*
**
** dateHelper class
**
*/

class dateHelper {
	function createDateSelectElement($name, $min, $max, $selected){
		$buffer[] = "<select name=\"" . $name . "\" id=\"$name\">";
		for ($i = $min ; $i<=$max ; $i++ ){
			$ii = ($i<10)?"0".$i:$i;
			$sel = ($ii==$selected)?"selected":"";
			$buffer[] = "<option value=\"".$i."\" ".$sel.">".$ii."</option>";
		}
		$buffer[] = "</select>";
		return implode("\n",$buffer);
	}
	function createDateFormElement($date='') {
		if (!empty($date)) {
			$d = explode("-",$date);
		} else {
			$d[0] = date('Y');
			$d[1] = date('m');
			$d[2] = date('d');
		}
		$buffer[] = $this->createDateSelectElement('year', '2011', '2040', $d[0]);
		$buffer[] = $this->createDateSelectElement('month', '1', '12', $d[1]);
		$buffer[] = $this->createDateSelectElement('day', '1', '31', $d[2]);
		//$arr = array('year','month','day');
		//$buffer[] = $this->sumUpDate($arr,rand());
		return implode("\n",$buffer);
	}
	
	function createTimeFormElement($time='') {
		if (!empty($time)) {
			$am = substr($time,-2,2);
			$h = substr($time,0,6);
			$t = explode(":",$h);
			$t[] = $h;
		} else {
			$t[0] = '08';
			$t[1] = '00';
			$t[2] = 'PM';
		}
		$buffer[] = $this->createDateSelectElement('hour', '0', '12', $t[0]);
		$buffer[] = $this->createDateSelectElement('min', '0', '59', $t[1]);
		$buffer[] = "<select name=\"ampm\" id=\"ampm\">";
		$selected = ($t[2]=="AM")?"selected":"";
		$buffer[] = "<option value=\"AM\" ".$selected.">AM</option>";
		$selected = ($t[2]=="PM")?"selected":"";
		$buffer[] = "<option value=\"PM\" ".$selected.">PM</option>";
		$buffer[] = "</select>";
		//$arr = array('hour','min');
		//$buffer[] = $this->sumUpDate($arr,rand());
		return implode("\n",$buffer);
	}

	function sumUpDate($arr,$id) {
		$buffer[] = "<input type='text' id='".$id."' value='hey'/>";
		$buffer[] = "<script type='text/javascript'>";
		$buffer[] = "$(document).ready(function(){";
		$buffer[] = "var sendVal = ";
		$buffer[] = "$('#".$arr[0]."').val()+'-'";
		$buffer[] = "$('#".$arr[1]."').val()+'-'";
		$buffer[] = "$('#".$arr[2]."').val();";
		$buffer[] = "$('#".$id."').val(sendVal);";
		$buffer[] = "});";
		$buffer[] = "</script>";
		return implode("\n",$buffer);
	}
	
	function sumUpTime($arr,$id) {
		$buffer[] = "<input type='text' id='".$id."' value='hey'/>";
		$buffer[] = "<script type='text/javascript'>";
		$buffer[] = "$(document).ready(function(){";
		$buffer[] = "var sendVal = ";
		$buffer[] = "$('#".$arr[0]."').val()+':'";
		$buffer[] = "$('#".$arr[1]."').val()+' '";
		$buffer[] = "$('#".$arr[2]."').val();";
		$buffer[] = "$('#".$id."').val(sendVal);";
		$buffer[] = "});";
		$buffer[] = "</script>";
		return implode("\n",$buffer);
	}
}