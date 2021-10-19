<?php

class AddNamesProc {
	// This function will clear names
	private function clearNamesFunc() {
		$_POST["clearNames"]= NULL;
		return NULL;    
	}

	// This function will add namess to a list
	private function addNameFunc() {

		// If no name is entered, send an alert to the screen
		if(($_POST["fullName"]) == NULL)
		{
			echo '<script language="javascript">';
			echo 'alert("Invalid Entry")';
			echo '</script>';
			return ($_POST["nameList"]);
		}

		// Seperate the full name with a coma 
		$newName = explode(" ",($_POST["fullName"]));
		$seperateName = $newName[1] .", " . $newName[0];
		$sortArray = ($_POST["nameList"]);

		// Sort the names
		if(isset($sortArray))
		{
			$sortArray .= "\n" .$seperateName;
			$sortArray = explode("\n",$sortArray);
			sort($sortArray, SORT_STRING | SORT_FLAG_CASE);
			$sortArray = implode("\n",$sortArray);
			$_POST["clearNames"] = NULL;
			$_POST["addName"]= NULL;
			return $sortArray;
		} 

		// If no names in the list, return the list
		else 
		{
			return $seperateName; 
		}
	}

	public function formValidateFunc() {
		$nameList = NULL;
		// If addName holder is set or clearNames is set then...
		if(isset($_POST["addName"]) || isset($_POST["clearNames"]))
		{
			// add the name in addName list
			if(isset($_POST["addName"])){
				$nameList = $this->addNameFunc();
				$_POST["addName"]= NULL;
			} 
			// if clearNames is clicked, clear the names
			elseif (isset($_POST["clearNames"])){
				$namelist = $this->clearNamesFunc();
				$_POST["clearNames"]= NULL;
			} 
			// anything else is invalid
			else{
				echo "invalid request";
			}
			return $nameList;
		}
	}
}
?>