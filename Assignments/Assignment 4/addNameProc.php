<?php

class AddNamesProc {

	// This function will clear names
	private function clearNamesFunc() {
		return NULL;    
	}

	// This function will add namess to a list
	private function addNameFunc() {

		// If no name is entered, send an alert to the screen
		if($_POST["fullName"] == NULL)
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
			$sortArray = implode("\n",$sortArray);
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
			} 
			// if clearNames is clicked, clear the names
			elseif (isset($_POST["clearNames"])){
				$namelist = $this->clearNamesFunc();
			} 
			return $nameList;
		}
	}
}

// open issues
// *spacing format in textarea still needs work
// sorting might be causing the spacing issue

?>

